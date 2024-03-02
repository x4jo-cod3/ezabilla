<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $fillable = ['deal_name', 'student_id', 'gender','grade_name','type','student_name','student_phone'];
}