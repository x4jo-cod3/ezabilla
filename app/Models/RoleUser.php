<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class RoleUser extends Model
{
    use HasFactory;


        //Table Name
        protected $table    = 'user_roles';

        //for create and edit
         protected $fillable = ['role_id','user_id'];
     
     

     


}
