<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountingTable extends Model
{
    protected $fillable = ['pc_code', 'ac_code', 'table_no', 'counting_supervisor_name', 'created_at', 'updated_at'];
     public function pcdetails(){

   	return $this->hasOne(PCDetails::class,'id','pc_code');
   } 
   public function acdetails(){

   	return $this->hasOne(ACDetails::class,'id','ac_code');
   }
}
