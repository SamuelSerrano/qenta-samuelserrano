@extends('layouts.app')
@section('title', 'Players')
@section('sidebar')
    @parent
    <br>
@endsection
@section('content')
    <div class="container">
        <players-component></players-component>
    </div>
@endsection