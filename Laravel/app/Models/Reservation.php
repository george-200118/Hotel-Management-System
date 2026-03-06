<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $primaryKey='Reservation_Id';
    public function customer(){
        return  $this->belongsTo(Customer::class,'Customer_Id','Customer_Id');
      }
  
      public function room(){
         return $this->belongsTo(Room::class,'Room_Number','Room_Number');
      }
  
}
