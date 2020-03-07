<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    public function event()
    {
        return $this->belongsTo('\App\Event', 'id_event', 'id');
    }

    public static function maxPrice()
    {
        return Bid::where('price', Bid::max('price'))->get();
    }
}
