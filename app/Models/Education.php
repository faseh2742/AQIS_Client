<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    protected $table="clienteducations";
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
