<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qrcode extends Model
{
    protected $fillable = ['name', 'description', 'qrcode', 'user_id'];

    public function qrcode()
    {
        return $this->belongsTo('App\User');
    }
}
