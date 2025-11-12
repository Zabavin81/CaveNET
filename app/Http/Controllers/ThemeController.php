<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use App\Http\Resources\Models\Theme;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

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
    public function store(Request $request)
    {
        Theme::create([
            "title" => Str::random(16),
            "description" => Str::random(16)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show( Theme $theme )
    {
        return $theme;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Theme $theme)
    {
        dump($theme);
        $theme->update([
            "title" => Str::random(16),
            "description" => Str::random(16)
        ]);
        return $theme;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Theme $theme)
    {
        dump($theme);
        $theme->delete();
        return response([
            "message" => "Theme deleted successfully"
        ], ResponseAlias::HTTP_OK);
    }
}
