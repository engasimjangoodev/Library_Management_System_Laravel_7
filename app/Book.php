<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $timestamps = FALSE;
//    const CREATED_AT = 'create_time';
//    const UPDATED_AT = 'update_time';
    protected $fillable = ['id','title','cover_img','subject','number_of_coypies', 'price','Supplier_id' ,
        'Publisher_id' , 'Staff_id' , 'Category_id' , 'ISBN'];
}
