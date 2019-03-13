<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CandidateDetails extends Model
{
   protected $fillable = ['serial_number','candidate_name','party_name','party_symbol','remarks','status','created_at','updated_at']; 
}
