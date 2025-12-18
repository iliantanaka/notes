@extends('layout.main_layout')
@section('content')    
    <h1>Welcome VIEW and BLADE</h1>
    <hr>
    <h3>Page 3</h3>
    <h3>The values is: <?= $value ?> </h3>
    <h3>The values is: {{$value}} </h3>
@endsection
