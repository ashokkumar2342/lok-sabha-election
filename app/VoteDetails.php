<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VoteDetails extends Model
{
    protected $fillable = ['counting_table_booth_map_id','ac_code','pc_code','table_no','round_no','booth_id','booth_no','candidate_id','vote_polled','status', 'created_at', 'updated_at'];
}
