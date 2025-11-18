<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class RelationshipCheckCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $profile = User::First();
        dd($profile->profile);
    }
}
