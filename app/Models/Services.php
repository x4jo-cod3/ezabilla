<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Clinics;


class Services extends Model
{
    use HasFactory;

        //Table Name
        protected $table    = 'services';

        //for create and edit
         protected $fillable = ['name','fees','clinic_id','details'];


         public function clinic()
         {
             return $this->belongsTo(Clinics::class, 'clinic_id');
         }
    
    
}
