@extends('layouts.main')

@section('content')
    <ul>
        <li>Id: {{ $user->id }}</li>
        <li>Name: {{ $user->name }}</li>
        <li>Email: {!! str_replace('@', '<span style="color: red">@</span>', $user->email) !!}</li>
    </ul>
    @if($user->roles)
        @foreach($user->roles as $role)
            <p>Role name: {{ $role->name }}</p>
        @endforeach
    @endif
    @include('includes.form', ['model' => $user])
@endsection

@section('header')
    {{--@parent--}}
    User show
@endsection

@push('styles')
    <style>
        h1 {
            color: red;
        }
    </style>
@endpush

@push('scripts')
    <script>console.log('push is working')</script>
@endpush

{{--@if(isset($user->roles))

@endif
@isset($user->roles)

@endisset

@if(env('APP_ENV') === 'local')
@endif


@php
    $var = 'Hello world';
    // TODO
@endphp--}}
