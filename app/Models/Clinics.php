<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinics extends Model
{
    use HasFactory;

        //Table Name
    protected $table    = 'clinic';

       //for create and edit
    protected $fillable = ['name'];
}

