@extends('master')

@section('title', 'Edit Author')

@section('content')
<div class="container">
    <h1>Edit Author</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('authors.update', $author->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $author->name) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $author->email) }}" required>
        </div>

        <div class="form-group">
            <label for="biography">Biography:</label>
            <textarea class="form-control" id="biography" name="biography">{{ old('biography', $author->biography) }}</textarea>
        </div>

        <div class="form-group">
            <label for="actions">Actions:</label>
            <textarea class="form-control" id="actions" name="actions">{{ old('actions', $author->actions) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
