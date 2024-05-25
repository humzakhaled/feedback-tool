<?php

namespace App\Http\Controllers\Feedback;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\UserResource;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store(CommentRequest $request)
    {
        $comment = Comment::create([
            'feedback_id' => $request->feedback_id,
            'user_id' => auth()->id(),
            'content' => $request->content
        ]);

        $view = view('dashboard.feedbacks.includes.comment', compact('comment'))->render();

        return response()->json($view, 201);
    }

    public function users(Request $request)
    {
        $query = $request->input('query');

        $users = User::where('name', 'like', '%' . $query . '%')->get(['id', 'name']);

        return UserResource::collection($users);
    }
}
