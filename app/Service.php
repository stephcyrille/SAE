<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Service extends Model
{
    protected $guarded = [];

    public function responsable()
    {
        return $this->belongsTo(Profile::class);
    }
}
