@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <h1 class="dark:text-white text-2xl font-bold mb-4">Welcome to the Dashboard</h1>
    <p class="dark:text-neutral-300">Hi {{ Auth::user()->name }}👋, you logged in as <span class="font-bold text-blue-400">{{ ucfirst(Auth::user()->getRoleNames()->first()) }}</span></p>
@endsection