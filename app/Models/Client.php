<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

        //Table Name
    	protected $table    = 'client';

       //for create and edit
        protected $fillable = ['name','phone','phone_2','age','address','source_lead','gender','details'];

        public function tickets()
        {
            return $this->hasMany(Ticket::class);
        }

}
