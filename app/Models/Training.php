<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;
    protected $table="clienttrainings";
    public function client()
    {
        return $this->belongsTo(Client::class,'client_id');
    }
}
