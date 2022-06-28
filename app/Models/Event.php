<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table='events';
    // protected $casts = [
    //     'start' => 'date',
    //     'end' => 'date',
    // ];
    
    public function client()
    {
        return $this->belongsToMany(Client::class,'client_event');
    }
    public function groupActivity()
    {
        return $this->belongsTo(groupActivity::class,'groupActivity_id')->withDefault(
            ['programName'=>"No Program"]
        );
    }
}
