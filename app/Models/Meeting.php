<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;
    protected $table='clientmeetings';

    public function staff(){
        return $this->belongsTo(Staff::class,'staff_id')->with('user');
    }
    public function questions(){
        return $this->belongsTo(Staff::class,'staff_id')->with('user');
    }
     public function getCreatedAtAttribute() {
    return date("F j, Y, g:i a",strtotime($this->attributes['created_at']));
    }
     public function getUpdatedAtAttribute()
    {
    return date("F j, Y, g:i a",strtotime($this->attributes['updated_at']));
    }
}
