@extends('layouts.app')

@section('title', $task->title)

@section('content')

<div class="mb-4">
    <a class="link" href="{{ route('tasks.index') }}">home</a>
</div>

<p class="mb-4 text-slate-600">{{ $task->description }}</p>

@if ($task->long_description)
<p class="mb-4 text-slate-600">{{ $task->long_description }}</p>
    @endif

    <div class="mb-4">
        @if ($task->completed)
            <span class="font-medium text-green-500">completed</span>
        @else
            <span class="font-medium text-red-500">not completed</span>
        @endif
    </div>

    <div class="mb-6">
        <p class="text-sm text-slate-400">Created : {{ $task->created_at->diffForHumans() }}</p>
        <p class="text-sm text-slate-400">Updated : {{ $task->updated_at->diffForHumans() }}</p>
    </div>

    <div class="flex gap-2">
        <a class="btn" href="{{ route('tasks.edit' , ['task' => $task->id]) }}">edit</a>

        <form action="{{ route('tasks.toggle' , ['task' => $task->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <button class="btn" type="submit">Toggle task</button>
        </form>

        <form action="{{ route('tasks.destroy' , ['task' => $task->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn" type="submit">delete</button>
        </form>

    </div>



@endsection
