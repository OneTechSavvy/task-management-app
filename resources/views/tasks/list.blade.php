@foreach($tasks as $task)
    <li class="list-group-item d-flex justify-content-between" data-id="{{ $task->id }}" data-project-id="{{ $task->project->id }}" role="button">
        <span><strong>{{ $task->priority }}</strong>. &nbsp; {{ $task->name }} - {{ $task->project->name }}</span>
        <div>
            <a href="{{ route('tasks.edit', $task->id) }}" class="mx-3">Edit</a>
            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
        </div>
    </li>
@endforeach
