<?php

namespace Modules\Comment\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Comment\App\Models\Comment;
use Illuminate\Support\Facades\Crypt;

class CommentController extends Controller
{
    public function index()
    {
        return view('comment::index');
    }

    // Display a listing of the resource.
    public function showComments()
    {
        $comments = Comment::all();
        $statuses = Comment::statuses;

        return view('comment::showComments', [
            'comments' => $comments,
            'statuses' => $statuses
        ]);
    }

    // Show the form for creating a new resource.
    public function create()
    {
        $authors = Comment::all();
        $statuses = Comment::statuses;

        return view('comment::addComment', [
            'authors' => $authors,
            'statuses' => $statuses
        ]);
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $comment = Comment::create($request->all());

        return redirect()->route('comments.show')->with('success', 'Comment added successfully!');
    }

    // Show the specified resource.
    public function show($id)
    {
        $decrypted_id = Crypt::decrypt($id);
        $comment= Comment::findOrFail($decrypted_id);
        return view('comment::show');
    }

    // Show the form for editing the specified resource.
    public function edit($id)
    {
        $decrypted_id = Crypt::decrypt($id);
        $comment = Comment::findOrFail($decrypted_id);
        $statuses = Comment::statuses;

        return view('comment::editComment', [
            'comment' => $comment,
            'statuses' => $statuses
        ]);
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $comment = Comment::where('id', $id)->first();

        $comment->name = $request->name;
        $comment->comment = $request->comment;
        $comment->user_id = $request->user_id;
        $comment->status = $request->status;
        $comment->question_id = $request->question_id;

        $comment->save();
        return redirect()->route('comments.show')->with('success', 'Comment updated successfully!');
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $decrypted_id = Crypt::decrypt($id);
        $comment = Comment::find($decrypted_id);
        $comment->delete();

        return redirect()->route('comments.show')->with('danger', 'Comment deleted successfully!');
    }
}
