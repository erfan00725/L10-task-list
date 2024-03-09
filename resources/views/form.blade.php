@extends('layouts.app')

@section('title', isset($task) ? 'Edit task' : 'Add task')

@section('content')
    <Form method="POST" action="{{ isset($task) ? route('tasks.update' , ['task' => $task->id]) : route('tasks.store') }}">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset

        <div class="mb-4">
            <label for="title">title</label>
            <input type="text" id="title" name="title" value="{{isset($task) ? $task->title : old('title') }}"
            @class(['border-red-500' => $errors->has('title')])
            >
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description">description</label>
            <textarea rows="5" id="description" name="description" @class(['border-red-500' => $errors->has('description')])>{{ isset($task) ? $task->description : old('description') }}</textarea>
            @error('description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="long_description">long description</label>
            <textarea rows="10" id="long_description" name="long_description" @class(['border-red-500' => $errors->has('long_description')])>{{ isset($task) ? $task->long_description : old('long_description') }}</textarea>
            @error('long_description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-2 items-center">
            <button type="submit" class="btn">
                @isset($task)
                    Update task
                @else
                    Add task
                @endisset
            </button>

            <a class="link" href="{{ route('tasks.index') }}">cancel</a>
        </div>
    </Form>
@endsection
