<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Task Management</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Form to add a new task -->
    <form action="{{ route('tasks.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Task Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Task</button>
    </form>

    <!-- Task list -->
    <ul class="list-group">
        @foreach($tasks as $task)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <h5>{{ $task->name }}</h5>
                    <p class="mb-1">{{ $task->description }}</p>
                    <span class="badge {{ $task->status == 'completed' ? 'bg-success' : 'bg-warning' }}">{{ ucfirst($task->status) }}</span>
                </div>
                <div>
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
