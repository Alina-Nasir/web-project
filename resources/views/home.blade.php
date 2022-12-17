@extends('layouts.app')
@section('content')
<title>Home</title>
<h1>Welcome, {{ Auth::user()->fname." ".Auth::user()->lname}} </h1>
<h2>You have successfully signed in </h2>


@endsection