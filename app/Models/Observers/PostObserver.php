<?php

namespace App\Models\Observers;

use App\Models\Log;
use App\Models\Post;

class PostObserver
{
    /** Унифицированная запись лога */
    protected function write(string $event, Post $post, ?array $old, ?array $new): void
    {
        // Можно отфильтровать лишние поля:
        $filter = fn(array $arr) => collect($arr)
            ->except(['updated_at','created_at']) // добавьте поля, которые не хотите логировать
            ->all();

        $old = $old ? $filter($old) : null;
        $new = $new ? $filter($new) : null;

        Log::create([
            'model'      => $post->getMorphClass(), // или Post::class
            'model_id'   => $post->getKey(),
            'event'      => $event,
            'old_values' => $old,
            'new_values' => $new,
        ]);
    }

    /** Срабатывает при выборке из БД */
    public function retrieved(Post $post): void
    {
        $this->write('retrieved', $post, null, $post->attributesToArray());
    }

    /** Срабатывает после создания */
    public function created(Post $post): void
    {
        $this->write('created', $post, null, $post->attributesToArray());
    }

    /** Срабатывает после обновления */
    public function updated(Post $post): void
    {
        $changes = $post->getChanges();
        unset($changes['updated_at']);

        $old = [];
        foreach ($changes as $key => $newVal) {
            $old[$key] = $post->getOriginal($key);
        }

        $this->write('updated', $post, $old, $changes);
    }

    /** Срабатывает после удаления (и при soft delete тоже) */
    public function deleted(Post $post): void
    {

        $this->write('deleted', $post, $post->getOriginal(), null);
    }

}
