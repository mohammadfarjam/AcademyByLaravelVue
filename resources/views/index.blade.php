@extends('layouts.app')
@section('content')
    @if(\Illuminate\Support\Facades\Auth::check())
        <navbar :userInfo="{{\Illuminate\Support\Facades\Auth::user()}}"></navbar>
    @else
        <navbar></navbar>
    @endif

@endsection

