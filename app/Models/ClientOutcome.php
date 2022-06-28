<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientOutcome extends Model
{
    use HasFactory;
    protected $table='client_outcome';
    public function client()
    {
        return $this->belongsTo(Client::class,'client_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function outcome()
    {
        return $this->belongsTo(Outcome::class);
    }
}
