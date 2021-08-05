<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Secretaire extends Model
{

    protected $fillable = [
        'nom',
        'prenom',
        'service_id',
        'created_at',
        'updated_at',
    ];
    public function user()
    {
        return $this->morphOne('App\User','profile');
    }

    public function service()
    {
        return $this->belongsTo('App\Service');
    }

}
