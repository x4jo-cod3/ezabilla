<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Clinics;
use App\Models\Ticket;


class Doctors extends Model
{
    use HasFactory;

    //Table Name
    protected $table    = 'doctors';

   //for create and edit
    protected $fillable = ['name','phone','clinic_id','details'];


    public function clinic()
    {
        return $this->belongsTo(Clinics::class, 'clinic_id');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }





}
