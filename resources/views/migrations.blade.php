@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <!-- Events migration -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Events migration
                </div>
                <div class="panel-body">
                    <pre>
Schema::create('events', function (Blueprint $table) {
    $table->increments('id');
    $table->string('caption');
    $table->timestamps();
});
                    </pre>
                </div>
            </div>
            <!-- // Events migration -->
            <!-- Bids migration -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Bids migration
                </div>

                <div class="panel-body">
                    <pre>
Schema::create('bids', function (Blueprint $table) {
    $table->increments('id');
    $table->unsignedInteger('id_event');
    $table->string('name');
    $table->string('email');
    $table->float('price');
    $table->timestamps();

    $table->foreign('id_event')->references('id')->on('events');
});
                    </pre>
                </div>
            </div>
            <!-- // Bids migration -->
        </div>
    </div>
@endsection
