<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    use HasFactory;

        //Table Name
        protected $table    = 'expenses';

        //for create and edit
         protected $fillable = ['name','item_price','details','created_by'];
}
