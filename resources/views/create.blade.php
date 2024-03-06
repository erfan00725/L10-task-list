@extends('layouts.app')

@section('title', 'Add task')

@section('styles')
    <style>
        .error-massage {
            color: red;
        }
    </style>
@endsection

@section('content')
    <Form method="POST" action="{{ route('tasks.store') }}">
        @csrf

        <div>
            <label for="title">title</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}">
            @error('title')
                <p class="error-massage">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description">description</label>
            <textarea rows="5" id="description" name="description">{{ old('description') }}</textarea>
            @error('description')
                <p class="error-massage">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="long_description">long description</label>
            <textarea rows="10" id="long_description" name="long_description">{{ old('long_description') }}</textarea>
            @error('long_description')
                <p class="error-massage">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Add task</button>
    </Form>
@endsection
