<?php

namespace App\Http\Controllers;

use App\Bid;
use App\Event;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index()
    {
        return view('index', ['events' => Event::all(), 'bids' => Bid::all()]);
    }

    public function migrations()
    {
        return view('migrations');
    }

    public function task2()
    {
        return view('migrations');
    }

    public function task3()
    {
        return view('migrations');
    }

    public function task4()
    {
        return view('migrations');
    }
}
