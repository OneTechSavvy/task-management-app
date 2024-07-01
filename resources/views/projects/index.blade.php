@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between border-1">
        <h3><strong>Projects</strong></h3>
        <a href="{{ route('projects.create') }}" class="btn btn-primary">Add project</a>
    </div>
    <ul class="list-group mt-3">
        @foreach($projects as $project)
            <li  class="list-group-item d-flex justify-content-between" data-id="{{ $project->id }}">
                {{ $project->name }}
                <div>
                    <a href="{{ route('projects.edit', $project->id) }}" class="mx-3">Edit</a>
                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
