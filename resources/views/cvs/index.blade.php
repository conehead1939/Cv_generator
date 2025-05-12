@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">My CVs</h1>
        <a href="{{ route('cvs.create') }}" class="btn btn-primary">+ Create New CV</a>
    </div>

    @if($cvs->count())
        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach($cvs as $cv)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $cv->title }}</h5>
                            <p class="card-text">{{ Str::limit($cv->summary, 100) }}</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a href="{{ route('cvs.edit', $cv) }}" class="btn btn-outline-secondary btn-sm">Edit</a>
                            <form action="{{ route('cvs.destroy', $cv) }}" method="POST" onsubmit="return confirm('Are you sure?')" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info mt-4">You haven't created any CVs yet.</div>
    @endif
@endsection
