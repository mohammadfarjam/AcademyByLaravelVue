@extends('layouts.app')
@section('content')
    @if(\Illuminate\Support\Facades\Auth::check())
        <navbar :user_info="{{\Illuminate\Support\Facades\Auth::user()}}"></navbar>
    @else
        <navbar></navbar>
    @endif

@endsection

