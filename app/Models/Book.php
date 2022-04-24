<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'acc_no',
        'title',
        'edition',
        'year',
        'pages',
        'source',
        'bill_no',
        'bill_date',
        'cost',
        'call_no',
    ];

    
        /**
         * Get all of the authors for the Book
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
         */
        public function author(){
            
                return $this->hasManyThrough(
                    '\App\Models\Author',
                    '\App\Models\Publisher',
                    '\App\Models\BookAuthorPublisher',
                    'book_id',
                    'acc_no',
                    'id',
                    'author_id',
                    'id',
                    'publisher_id'


                );
        } 
    
}
