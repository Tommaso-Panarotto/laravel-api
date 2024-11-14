@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h2>Progetti</h2>
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
                                <a href="{{ route('guest.projects.show', $project->id) }}"
                                    class="btn btn-primary btn-sm">Detail</a>
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
