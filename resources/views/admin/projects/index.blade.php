@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h2>Progetti</h2>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary mt-5">aggiungi un nuovo progetto</a>
        <div class="row g-3 mt-5">
            <table class="table table-striped-columns">

                <thead>
                    <tr>
                        <th scope="col"> </th>
                        <th scope="col">Title</th>
                        <th scope="col">link</th>
                        <th scope="col">Function</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($projects as $project)
                        <tr>
                            <th scope="row">{{ $project->id }}</th>
                            <td>{{ $project->title }}</td>
                            <td><a href="{{ $project->url }}">{{ $project->url }}</a></td>
                            <td>
                                <a href="{{ route('admin.projects.show', $project->id) }}"
                                    class="btn btn-primary btn-sm">Detail</a>
                                <a href="{{ route('admin.projects.edit', $project->id) }}"
                                    class="btn btn-success btn-sm ms-2 px-3">Edit</a>
                                <form action="{{ route('admin.projects.delete', $project->id) }}"
                                    class="d-inline project-delete" method="POST" custom-data-name="{{ $project->title }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm ms-2">
                                        Remove
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <h2>Non ci sono progetti....</h2>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>
@endsection

@section('script-js')
    @vite('resources/js/projects/project.js')
@endsection
