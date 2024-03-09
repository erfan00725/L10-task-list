@extends('layouts.app')


@section('title', 'Tasks Page!')

@section('content')

    <nav class="mb-4">
        <a class="link" href="{{ route('tasks.create') }}">Add new task</a>
    </nav>

    @forelse ($tasks as $task)
        <div class='mb-1'>
            <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
                @class(['line-through' => !$task->completed])
                >{{ $task->title }}</a>
        </div>
    @empty
        <p>No tasks found</p>
    @endforelse

    <div class="mt-4">
        @if ($tasks->count())
            <nav>
                {{ $tasks->links() }}
            </nav>
        @endif
    </div>

@endsection
