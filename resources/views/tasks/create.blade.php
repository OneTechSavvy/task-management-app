@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h3 class="fw-bold">Create New Task</h3>
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="form-group my-3">
                <label for="name">Task Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group my-3">
                <label for="priority">Priority</label>
                <input type="number" name="priority" id="priority" class="form-control" required>
            </div>
            <div class="form-group my-3">
                <label for="project_id">Project</label>
                <select name="project_id" id="project_id" class="form-control">
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary my-3">Save Task</button>
        </form>
    </div>
</div>
@endsection
