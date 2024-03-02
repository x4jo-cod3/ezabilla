<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

        //Table Name
        protected $table    = 'employees';

        //for create and edit
         protected $fillable = ['name','phone','salary','type','address','detials','created_by'];

}
