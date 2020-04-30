<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    protected $fillable = ['username','profile_photo','email','password' , 'create_time' ,'id','name' ,'phone',
        'Library_id','card_id' , 'address'];
}
