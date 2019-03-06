<?php

namespace App;

use App\PCDetails;
use Illuminate\Database\Eloquent\Model;

class BoothDetails extends Model
{
	 protected $fillable = [
       'ac_code', 'pc_code', 'booth_no', 'booth_name', 'booth_location', 'total_booth_pooled', 'created_at', 'updated_at'
    ];
	 

   public function pcdetails(){

   	return $this->hasOne(PCDetails::class,'id','pc_code');
   } 
   public function acdetails(){

   	return $this->hasOne(ACDetails::class,'id','ac_code');
   }

}
