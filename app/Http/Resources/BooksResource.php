<?php

namespace App\Http\Resources;
// use \App\Http\Resources\AuthorsResource;

use Illuminate\Http\Resources\Json\JsonResource;

class BooksResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [  
            // 'id' => (string)$this->id,
            'type'=>'Books',
            'acc_no'=> (string)$this->acc_no,
            'title'=> $this->title,
            //inserting author resource
            // 'author'=> $this->author,
            // 'publisher' => $this->publisher,
            
            
            'attributes' => [
                'edition'=> $this->edition,
                'year'=> $this->year,
                'pages'=> $this->pages,
                'source'=> $this->source,
                'bill_no'=> $this->bill_no,
                'bill_date'=> $this->bill_date,
                'cost'=> $this->cost,
                'call_no'=> $this->call_no,
                'created_at'=>$this->created_at,
                'updated_at'=>$this->updated_at
           
        ]];
    }
}
