<?php

namespace App;

use App\BoothDetails;
use Illuminate\Database\Eloquent\Model;

class CountingTableBoothMap extends Model
{
    protected $fillable = ['pc_code', 'ac_code', 'table_no','round_no','booth_id','booth_no','created_at', 'updated_at'];
 
}
