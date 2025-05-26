@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-12">
            <h1 class="text-center">Dashboard</h1>
            <p class="text-center">Welcome to your CV management dashboard. Here you can create, edit, and manage your CVs.</p>
            <center>
                <a class="btn btn-primary mx-auto {{ request()->routeIs('cvs.index') ? 'active fw-bold' : '' }}" href="{{ route('cvs.index') }}">Your CVs</a>
            </center>
        </div>
    </div>
</div>
@endsection
