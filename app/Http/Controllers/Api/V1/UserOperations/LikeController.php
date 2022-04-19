<?php

namespace App\Http\Controllers\Api\V1\UserOperations;
use App\Http\Controllers\Controller;

use App\Models\Like;
use App\Models\Comment;
use App\Models\Book;

use Illuminate\Http\Request;

class LikeController extends Controller
{

    public function likeOrUnlike($id){
        $books = Book::find($id);

        if(!$books){
            return response([
                'message' => "Book not found",
            ],403);

        }
        $like = $books->likes()->where('user_id',auth()->user()->id)->first();

        //if not liked then like

        if(!$like){
            Like::create([
                'book_id'=>$id,
                'user_id'=>auth()->user()->id,

            ]);
            return response([
                'message' => "Liked",
            ],200);
        }
        //else dislike it
        $like->delete();
         
        return response([
            'message' => 'Disliked',
        ],200);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
