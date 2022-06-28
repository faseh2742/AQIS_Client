<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function outcomes()
    {
        return $this->hasMany(Outcome::class);
    }
    public function client()
    {
        return $this->hasOne(Client::class,'id');
    }

}
