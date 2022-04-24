<?php

namespace App\Http\Controllers\Api\V1\UserOperations;


use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Http\Resources\BooksResource;
use App\Http\Controllers\Controller;


class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BooksResource::collection(Book::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        $faker = \Faker\Factory::create(1);
        $book = Book::create([
            'acc_no' => $faker->randomNumber(2),
            'title' => $faker->name,
            'edition' => (string)$faker->century,
            'year' => (string)$faker->year,
            'pages' => (string)$faker->buildingNumber,
            'source' => (string)$faker->address,
            'bill_no' => (string)$faker->randomNumber(3),
            'bill_date' => (string)$faker->date,
            'cost' => (string)$faker->randomNumber(4),
            'call_no' => (string)$faker->postcode,
        ]);
        return new BooksResource($book); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
    //id error should be acc_no

        return new BooksResource($book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $book->update([
                'title' => $request->input('title'),
                'edition'=> input('edition'),
                'year'=> input('year'),
                'pages'=> input('pages'),
                'source'=> input('source'),
                'bill_no'=> input('bill_no'),
                'bill_date'=> input('bill_date'),
                'cost'=> input('cost'),
                'call_no'=> input('call_no'),
                'created_at'=>input('created_at'),
                'updated_at'=>input('updated_at')

    //id error should be acc_no


        ]);
        return new BooksResource($book);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return response(['message'=>'deleted'
    ],200);
    //id error should be acc_no
    }
}
