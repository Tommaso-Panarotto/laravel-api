@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">{{ $project->title }}</h2>
                <h6 class="card-subtitle mb-2 text-body-secondary">{{ $project->author }}</h6>
                <div class="type">{{ $project->type->name }}</div>
                <div class="technologie">
                    @foreach ($project->technologies as $technology)
                        <span class="ms-3">{{ $technology->name }}</span>
                    @endforeach
                </div>
                <p class="card-text">{{ $project->description }}</p>
                <div class="mb-4"><a href="{{ $project->url }}" class="btn btn-primary card-link text-white">link
                        progetto</a></div>
                <a href="{{ route('guest.projects.index') }}" class=" btn btn-warning card-link">Catalogo progetti</a>
            </div>
        </div>
    </div>
@endsection
