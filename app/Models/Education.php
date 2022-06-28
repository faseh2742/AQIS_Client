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
}
