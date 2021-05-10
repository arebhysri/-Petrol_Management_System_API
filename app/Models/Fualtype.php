<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fualtype extends Model
{
	public $timestamps = false;
    protected  $table = 'fualtypes';
    use HasFactory;
}
