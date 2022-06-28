<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $table='client_groupactivity';
    public function groupactivity(){
        return $this->belongsTo(groupActivity::class,'groupactivity_id');
    }
    public function client()
    {
        return $this->belongsTo(Client::class,'client_id');
    }
}
