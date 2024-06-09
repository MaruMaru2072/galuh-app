@extends('layout')

@section('content')
<h1>Admin Dashboard</h1>
<p>Welcome, Admin {{ Auth::user()->name }}!</p>
@endsection
