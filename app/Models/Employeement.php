<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employeement extends Model
{
    use HasFactory;
    protected $table="clientemployments";
    public function client()
    {
        return $this->belongsTo(Client::class,'client_id');
    }
    public function currentnoc(){
        return $this->belongsTo(Noc::class,'current_noc');
    }
     public function getCreatedAtAttribute() {
    return date("F j, Y, g:i a",strtotime($this->attributes['created_at']));
    }
     public function getUpdatedAtAttribute()
    {
    return date("F j, Y, g:i a",strtotime($this->attributes['updated_at']));
    }
}
