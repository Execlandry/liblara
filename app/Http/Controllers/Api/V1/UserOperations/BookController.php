<?php

namespace App\Http\Controllers\Api\V1\UserOperations;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\User;


use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all books
        return response([
            'books' => Book::orderBy('created_at','desc')->with('user:id,name,image')->withCount('comments','likes')->get(),
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //create a book
        
        //first validate the fields
        $request->validate([
            'body' => 'required|string',


        ]);

        $books=Book::create([
            'body' => $request->body,
            'user_id' => auth()->user()->id
        ]);

        return response([
            'message' => "Book Created",
            'book' => $books,

        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get single book
        return response([
            'books' => Book::where('id',$id)->withCount('comments','likes')->get()
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        
        //update a book

        $books = Book::find($id);

        if(!$books){
            return response([
                'message' => "Book not found",
            ],403);

        }

        if($books->user_id != auth()->user()->id){
            return response([
                'message' => "Permission denied",

            ],403);
        }
        //first validate the fields
        $request->validate([
            'body' => 'required|string',

        ]);

        $books->update([
            'body'=> $request->body,
        ]);

        return response([
            'message' => "Book Updated",
            'book' => $books,

        ],200);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $books = Book::find($id);

        if(!$books){
            return response([
                'message' => "Book not found",

            ],403);
        }
        if($books->user_id != auth()->user()->id){
            return response([
                'message' => "Permission denied",

            ],403);
        }

        $books->comments()->delete();
        $books->likes()->delete();
        $books->delete();

        return response([
            'message' => "Book deleted",
        ],200);
    }
}
