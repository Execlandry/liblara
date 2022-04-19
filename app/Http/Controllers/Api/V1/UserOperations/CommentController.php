<?php

namespace App\Http\Controllers\Api\V1\UserOperations;
use App\Http\Controllers\Controller;

use App\Models\Comment;
use App\Models\Book;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //get all comments of a book
    public function index($id)
    {
        $book = Book::find($id);
        
        if (!$book) {
            return response([
                'message'=>'Book not found'
            ],403);
        }
        return response([
            'comments'=>$book->comments()->with('user:id,name,image')->get(),

        ],200);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $book = Book::find($id);
        
        if (!$book) {
            return response([
                'message'=>'Book not found'
            ],403);
        }
        //validate fields
        $request->validate([
            'comment' => 'required|string',

        ]);

        Comment::create([
            'comment'=> $request->comment,
            'book_id'=> $id,
            'user_id'=> auth()->user()->id,
        ]);

        return response([
            'message'=>'Comment created',

        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);

        if (!$comment) {
            return response([
                'message'=>'comment not found'
            ],403);
        }

        if($comment->user_id != auth()->user()->id){
            return response([
                'message' => "Permission denied",

            ],403);
        }
         //validate fields
         $request->validate([
            'comment' => 'required|string',

        ]);

        $comment->update([
            'comment'=>$request->comment
        ]);

        return response([
            'message' => 'Comment Updated',
        ],200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);

        if(!$comment){
            return response([
                'message' => "Comment not found",

            ],403);
        }
        if($comment->user_id != auth()->user()->id){
            return response([
                'message' => "Permission denied",

            ],403);
        }

        $comment->delete();

        return response([
            'message' => "Comment deleted",
        ],200);
    }
}
