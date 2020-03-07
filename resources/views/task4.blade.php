@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <!-- Task 4 -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Task 4
                </div>
                <div class="panel-body">
                    <strong>Нужно поменять 2 переменные местами без использования третьей:</strong><br>
                    $а = [1,2,3,4,5];<br>
                    $b = ‘Hello world’;
                    <br><br>
                    <strong>Код:</strong><br>
                    <pre>
$a = [1,2,3,4,5];
$b = 'Hello world';
array_push($a, $b);
$b = $a;
$a = array_pop($b);</pre>
                    <strong>Решение:</strong><br>
                    @php
                        $a = [1,2,3,4,5];
                        $b = 'Hello world';
                        array_push($a, $b);
                        $b = $a;
                        $a = array_pop($b);
                    @endphp
                    $a = {{$a}} ({{gettype($a)}})<br>
                    $b = <?php print_r($b)?> ({{gettype($b)}})<br>
                </div>
            </div>
            <!-- // Task 4 -->
        </div>
    </div>
@endsection
