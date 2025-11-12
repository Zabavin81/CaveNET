<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Theme\StoreThemeRequest;
use App\Http\Requests\Api\Theme\UpdateThemeRequest;
use App\Http\Resources\Models\Theme;
use App\Services\ThemeService;
use Symfony\Component\HttpFoundation\Response;

class ThemeController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Theme::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreThemeRequest $request)
    {
        $data = $request->validated();
        Theme::create($data);
        return response(['message' => 'Theme created successfully.'],
          Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     */
    public function show(Theme $theme)
    {
        return $theme;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateThemeRequest $request, Theme $theme)
    {
        $data = $request->validated();
        ThemeService::update($theme, $data);
        return response(['message' => 'Theme updated successfully.'],Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Theme $theme)
    {
        $theme->delete();
        return response(['message' => 'Theme deleted successfully.'],Response::HTTP_OK);
    }

}
