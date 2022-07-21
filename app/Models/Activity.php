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
     public function getCreatedAtAttribute() {
    return date("F j, Y, g:i a",strtotime($this->attributes['created_at']));
    }
     public function getUpdatedAtAttribute()
    {
    return date("F j, Y, g:i a",strtotime($this->attributes['updated_at']));
    }
}
