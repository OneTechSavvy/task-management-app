@extends('layouts.app')

@section('content')
    <div class="d-flex flex-col flex-md-row justify-content-md-between">
        <h3 class="fw-bold">Tasks</h3>
        <div class="d-flex flex-row col col-md-3 col-9">
            <div class="w-50 text-end"><a href="{{ route('tasks.create') }}" class="btn btn-primary">Add Task</a></div>
            <select id="project-filter" class="form-control mx-2 w-50">
                <option value="">All Projects</option>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <ul id="task_list" class="list-group mt-3">
        @include('tasks.list', ['tasks' => $tasks])
    </ul>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.2/Sortable.min.js"></script>
    @vite('resources/js/tasks.js')
@endpush
