@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')

@section('content_header')
    <form action="{{url('/Users')}}" method="post" >
        <input type="text" name="username">
        <input type="text" name="password">        
    </form>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
