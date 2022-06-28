<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table='clients';
    protected $fillable=[
        'user_id','wc_id ','immigrationStatus','dob','doa','gender','streetAddress','city','province','postalCode',
        'phonePrimary','phoneSecondary','motherTongue','countryOrigin','engProficiency','interpreterNeeded','interpreterLanguage',
        'childcareNeeded','notes','highestEducation_id'
    ];

    public function user(){
        return $this->belongsTo(User::class,'id','client_id');
    }
    public function meetings()
    {
       return $this->hasMany(Meeting::class);
    }
    public function events()
    {
        return $this->belongsToMany(Event::class,'client_event');
    }
    public function outcome(){
        return $this->belongsToMany(Outcome::class,'client_outcome');
    }
}
