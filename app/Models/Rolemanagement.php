<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rolemanagement extends Model
{
	public $timestamps = false;
    protected  $table = 'rolemanagements';
    use HasFactory;
}
