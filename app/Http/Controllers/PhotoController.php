<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('photos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $savedFilePath = $request->file('image')->store('photos', 'public');
        Log::debug($savedFilePath);
        $filename = pathinfo($savedFilePath, PATHINFO_BASENAME);
        Log::debug($filename);

        return to_route('photos.show', ['photo' => $filename])->with('success', 'アップロードしました');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $filename)
    {
        return view('photos.show' , ['filename' => $filename]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $filename)
    {
        Storage::disk('public')->delete('photos/'. $filename);
        return to_route('photos.create')->with('success', '削除しました');
    }
    public function download($filename)
    {
        return storage::disk('public')->download('photos/'. $filename, 'アップロード画像.jpg') ;
    }
}
