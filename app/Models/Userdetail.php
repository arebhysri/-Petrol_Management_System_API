<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userdetail extends Model
{
	public $timestamps = false;
    protected  $table = 'userdetails';
    protected $dates = ['startTime','endTime'];
    use HasFactory;
}
