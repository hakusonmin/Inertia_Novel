<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNovelRequest;
use App\Http\Requests\UpdateNovelRequest;
use App\Models\Novel;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class NovelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $novels = Novel::all();
        return Inertia::render('User/Novel/Index', ['novels' => $novels]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('User/Novel/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNovelRequest $request)
    {
        Novel::create([
            'title' => $request->title,
            'user_id' => Auth::id(),
        ]);
        return redirect()->route('novels.index')->with('success', '小説を作成しました');
    }

    /**
     * Display the specified resource.
     */
    public function show(Novel $novel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Novel $novel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNovelRequest $request, Novel $novel)
    {
        $novel->update($request->validated());
        return redirect()->route('novels.index')->with('success', '小説を更新しました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Novel $novel)
    {
        $novel->delete();
        return redirect()->route('novels.index')->with('success', '小説を削除しました');
    }
}
