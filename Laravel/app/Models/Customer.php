<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $primaryKey='Customer_Id';
    public function reservation(){
        return $this->hasMany(Reservation::class,'Customer_Id','Customer_Id');
    }

}
