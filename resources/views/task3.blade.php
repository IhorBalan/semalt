@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <!-- Task 3 -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Task 3
                </div>
                <div class="panel-body">
                    <strong>Реализовать алгоритм  извлечения числовых значений со строки:</strong><br>
                    This server has 386 GB RAM and 500GB storage
                    <br><br>
                    <strong>Код:</strong><br>
                    <pre>
$str = 'This server has 386 GB RAM and 500GB storage';
$exp = explode(' ', $str);
foreach ($exp as $e) {
    $e = preg_replace('/[^0-9]/', '', $e);
    if (is_numeric($e)){
        echo $e.'&lt;br&gt;';
    }
}</pre>
                    <strong>Решение:</strong><br>
                    @php
                        $str = 'This server has 386 GB RAM and 500GB storage';
                        $exp = explode(' ', $str);
                        foreach ($exp as $e) {
                            $e = preg_replace('/[^0-9]/', '', $e);
                            if (is_numeric($e)){
                                echo $e.'<br>';
                            }
                        }
                    @endphp
                </div>
            </div>
            <!-- // Task 3 -->
        </div>
    </div>
@endsection
