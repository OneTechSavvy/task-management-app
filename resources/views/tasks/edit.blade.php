@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h3>Edit Task</h3>
        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group my-3">
                <label for="name">Task Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $task->name }}" required>
            </div>
            <div class="form-group my-3">
                <label for="priority">Priority</label>
                <input type="number" name="priority" id="priority" class="form-control" value="{{ $task->priority }}" required>
            </div>
            <div class="form-group my-3">
                <label for="project_id">Project</label>
                <select name="project_id" id="project_id" class="form-control">
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}" {{ $task->project_id == $project->id ? 'selected' : '' }}>{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Task</button>
        </form>
    </div>
</div>
@endsection
