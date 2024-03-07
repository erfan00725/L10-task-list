@extends('layouts.app')


@section('title', 'Tasks Page!')

@section('content')

    @forelse ($tasks as $task)
        <div>
            <a href="{{ route('tasks.show', ['task' => $task->id]) }}">{{ $task->title }}</a>
        </div>
    @empty
        <p>No tasks found</p>
    @endforelse

@endsection
