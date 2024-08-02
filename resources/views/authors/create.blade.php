@extends('master')

@section('title', 'Create Author')

@section('content')
<div class="container">
    <h1>Create a New Author</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('authors.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label for="biography">Biography:</label>
            <textarea class="form-control" id="biography" name="biography" rows="4" required>{{ old('biography') }}</textarea>
        </div>

        <div class="form-group">
            <label for="actions">Actions:</label>
            <textarea class="form-control" id="actions" name="actions" rows="4" required>{{ old('actions') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
