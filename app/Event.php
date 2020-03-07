<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public static function withApplication($num)
    {
        return Event::leftJoin('bids', 'events.id', '=', 'bids.id_event')
            ->select('events.caption', \DB::raw('count(bids.id) as application'))
            ->groupBy('events.id')
            ->having('application', $num)
            ->get();
    }

    public static function greaterThan($num)
    {
        return Event::leftJoin('bids', 'events.id', '=', 'bids.id_event')
            ->select('events.caption', \DB::raw('count(bids.id) as application'))
            ->groupBy('events.id')
            ->having('application', '>', $num)
            ->get();
    }

    public static function maxApplication()
    {
        $numberOfMaxApplication = Event::leftJoin('bids', 'events.id', '=', 'bids.id_event')
            ->select('events.caption', \DB::raw('count(bids.id) as application'))
            ->groupBy('events.id')->orderBy('application', 'desc')->first()->application;
        return Event::withApplication($numberOfMaxApplication);
    }
}
