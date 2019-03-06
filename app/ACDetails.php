<?php

namespace App;

use App\PCDetails;
use Illuminate\Database\Eloquent\Model;

class ACDetails extends Model
{
	protected $fillable = ['ac_code','ac_name','pc_code','aro_name', 'created_at', 'updated_at'];
	
     public function pcdetails(){

   	return $this->hasOne(PCDetails::class,'id','pc_code');
   }
}
