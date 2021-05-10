<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pumbertype extends Model
{
	public $timestamps = false;
    protected  $table = 'pumbertypes';
    use HasFactory;
}
