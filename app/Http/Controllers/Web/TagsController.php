<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tags\StoreRequest;
use App\Http\Requests\Tags\UpdateRequest;
use App\Models\Tag;

class TagsController extends Controller
{
    public function index()
    {
        $tags = Tag::all()->sortBy('name');
        return view('tags.index', compact('tags'));
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(StoreRequest $request)
    {
        $tag = Tag::create($request->validated());
        return redirect()->route('tags.index')->with('alert', array_merge(['params' => ['name' => $tag->name]], config('alerts.tags.created')));
    }

    public function edit(Tag $tag)
    {
        return view('tags.edit', compact('tag'));
    }

    public function update(UpdateRequest $request, Tag $tag)
    {
        $tag->update($request->validated());
        return redirect()->route('tags.index')->with('alert', array_merge(['params' => ['name' => $tag->name]], config('alerts.tags.edited')));
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index')->with('alert', array_merge(['params' => ['name' => $tag->name]], config('alerts.tags.destroyed')));
    }
}
