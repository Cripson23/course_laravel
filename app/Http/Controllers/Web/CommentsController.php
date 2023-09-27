<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comments\StoreRequest;
use App\Models\Comment;

class CommentsController extends Controller
{
    public function store(StoreRequest $request)
    {
        $commentable_type = $request->checkCommentable();
        $commentable_type->comments()->save(Comment::make($request->only(['text', 'author_name'])));
        return back()->with('alert', config('alerts.comments.created'));
    }
}
