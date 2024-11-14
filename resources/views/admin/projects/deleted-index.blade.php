@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h2>Progetti Eliminati</h2>
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
                                <form action="{{ route('admin.projects.restore', $project->id) }}" class="d-inline"
                                    method="POST" custom-data-name="{{ $project->title }}">
                                    @method('PATCH')
                                    @csrf
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        Restore
                                    </button>
                                </form>
                                <form action="{{ route('admin.projects.permament-delete', $project->id) }}"
                                    class="d-inline project-delete" method="POST" custom-data-name="{{ $project->title }}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm ms-2">
                                        Delete
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
