<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PCDetails extends Model
{
    protected $fillable = ['pc_code', 'pc_name', 'ro_name','created_at', 'updated_at'];
}
