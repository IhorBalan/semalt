@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <!-- Events table -->
            @if (count($events) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Events
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                            <th>Event</th>
                            </thead>
                            <tbody>
                            @foreach ($events as $event)
                                <tr>
                                    <td class="table-text"><div>{{ $event->caption }}</div></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
            <!-- // Events table -->
            <!-- Bids table -->
            @if (count($bids) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Bids
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Price</th>
                            <th>Event</th>
                            </thead>
                            <tbody>
                            @foreach ($bids as $bid)
                                <tr>
                                    <td class="table-text"><div>{{ $bid->name }}</div></td>
                                    <td class="table-text"><div>{{ $bid->email }}</div></td>
                                    <td class="table-text"><div>{{ $bid->price }}</div></td>
                                    <td class="table-text"><div>{{ $bid->event->caption }}</div></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
            <!-- // Bids table -->
            <!-- // User with max price -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    User with max price
                </div>

                <div class="panel-body">
                    <pre>Bid::where('price', Bid::max('price'))->get()</pre>
                    @foreach(\App\Bid::maxPrice() as $bid)
                        User: <strong>{{$bid->name}}</strong>, price: {{$bid->price}}<br>
                    @endforeach
                </div>
            </div>
            <!-- // User with max price -->

            <!-- Events with no application -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Events with no application
                </div>

                <div class="panel-body">
                    <pre>Event::leftJoin('bids', 'events.id', '=', 'bids.id_event')
            ->select('events.caption', \DB::raw('count(bids.id) as application'))
            ->groupBy('events.id')
            ->having('application', $num)
            ->get();</pre>
                    @foreach(\App\Event::withApplication(0) as $event)
                        Event: <strong>{{$event->caption}}</strong>, number of application: <strong>{{$event->application}}</strong><br>
                    @endforeach
                    @if(\App\Event::withApplication(0)->isEmpty())
                        There is no such event
                    @endif
                </div>
            </div>
            <!-- // Events with no application -->

            <!-- Events with more than three application -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Events with more than three application
                </div>

                <div class="panel-body">
                    <pre>Event::leftJoin('bids', 'events.id', '=', 'bids.id_event')
            ->select('events.caption', \DB::raw('count(bids.id) as application'))
            ->groupBy('events.id')
            ->having('application', '>', $num)
            ->get();</pre>
                    @foreach(\App\Event::greaterThan(3) as $event)
                        Event: <strong>{{$event->caption}}</strong>, number of application: <strong>{{$event->application}}</strong><br>
                    @endforeach
                    @if(\App\Event::greaterThan(3)->isEmpty())
                        There is no such event
                    @endif
                </div>
            </div>
            <!-- // Events with more than three application -->

            <!-- Events with max number of application -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Events with max number of application
                </div>

                <div class="panel-body">
                    <pre>$numberOfMaxApplication = Event::leftJoin('bids', 'events.id', '=', 'bids.id_event')
            ->select('events.caption', \DB::raw('count(bids.id) as application'))
            ->groupBy('events.id')->orderBy('application', 'desc')->first()->application;
return Event::withApplication($numberOfMaxApplication);</pre>
                    @foreach(\App\Event::maxApplication() as $event)
                        Event: <strong>{{$event->caption}}</strong>, number of application: <strong>{{$event->application}}</strong><br>
                    @endforeach
                </div>
            </div>
            <!-- // Events with max number of application -->
        </div>
    </div>
@endsection
