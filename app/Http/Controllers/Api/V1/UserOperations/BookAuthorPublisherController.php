<?php

namespace App\Http\Controllers\Api\V1\UserOperations;

use App\Http\Requests\StoreBookAuthorPublisherRequest;
use App\Http\Requests\UpdateBookAuthorPublisherRequest;
use App\Models\BookAuthorPublisher;
use App\Http\Controllers\Controller;


class BookAuthorPublisherController extends Controller
{
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
     * @param  \App\Http\Requests\StoreBookAuthorPublisherRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookAuthorPublisherRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookAuthorPublisher  $bookAuthorPublisher
     * @return \Illuminate\Http\Response
     */
    public function show(BookAuthorPublisher $bookAuthorPublisher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookAuthorPublisher  $bookAuthorPublisher
     * @return \Illuminate\Http\Response
     */
    public function edit(BookAuthorPublisher $bookAuthorPublisher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookAuthorPublisherRequest  $request
     * @param  \App\Models\BookAuthorPublisher  $bookAuthorPublisher
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookAuthorPublisherRequest $request, BookAuthorPublisher $bookAuthorPublisher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookAuthorPublisher  $bookAuthorPublisher
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookAuthorPublisher $bookAuthorPublisher)
    {
        //
    }
}
