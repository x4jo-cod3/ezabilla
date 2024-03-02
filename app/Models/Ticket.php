<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Clinics;
use App\Models\Doctors;
use App\Models\Services;
use App\Models\Client;


class Ticket extends Model
{
    use HasFactory;

        //Table Name
        protected $table    = 'ticket';

        //for create and edit
         protected $fillable = ['client_id','ticket_type','ticket_status','call_status','appointment_datetime','services','clinics','doctors','fees','offers','puls','grafts','comment','details','created_by','updated_by','paid_status','paid_method','feedback'];

         public function client()
         {
             return $this->belongsTo(Client::class, 'client_id');
         }

         public function clinic()
         {
             return $this->belongsTo(Clinics::class, 'clinics');
         }

         public function doctor()
         {
             return $this->belongsTo(Doctors::class, 'doctors');
         }

         public function service()
         {
             return $this->belongsTo(Services::class, 'services');
         }
     
}
