@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h3 class="fw-bold">Create New Project</h3>
        <form action="{{ route('projects.store') }}" method="POST">
            @csrf
            <div class="form-group my-3">
                <label for="name">Project Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary my-3">Save Project</button>
        </form>
    </div>
</div>
@endsection
