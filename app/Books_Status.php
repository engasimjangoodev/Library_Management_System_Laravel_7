<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books_Status extends Model
{

    protected $fillable = ['id','Member_id','Book_id' ,'Staff_id','status','create_time', 'Due_Date'];

}
