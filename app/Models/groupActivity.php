<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class groupActivity extends Model
{
    use HasFactory;
    protected $table='groupactivities';
    public function client()
    {
        return $this->belongsTo(Client::class,'client_id');
    }
}
