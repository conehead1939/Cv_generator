<<<<<<< HEAD
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
=======
<x-app-layout>
    

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 space-y-4">
                    <h1 class="text-2xl font-bold">Welcome back, {{ Auth::user()->name }}! 🎉</h1>

                    <p>We're glad to have you here. You can manage your CVs or generate a new one using AI.</p>

                    <div class="flex space-x-4 mt-4">
                        <a href="{{ route('cvs.index') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Manage My CVs
                        </a>
                        <a href="{{ route('cvs.create') }}" class="inline-block bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            + Create New CV
                        </a>
                    </div>
                </div>
            </div>
>>>>>>> de85290f027dd12ce4a9313f67788fe28ea592e0
        </div>
    </div>
</div>
@endsection
