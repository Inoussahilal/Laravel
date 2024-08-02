@extends('master')

@section('title', 'Authors List')

@section('content')
<div class="container">
    <h1>Authors List</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('authors.create') }}" class="btn btn-primary mb-3">Create New Author</a>

    <table class="table table-bordered">
    <table class="table table-bordered table-striped table-hover" style="border: 2px solid #000;">
        <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Biography</th>
                <th>Actions</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody >
            @foreach ($authors as $author)
                <tr style="border: 2px solid #000;">
                    <td style="border: 2px solid #000;">{{ $author->name }}</td>
                    <td style="border: 2px solid #000;">{{ $author->email }}</td>
                    <td style="border: 2px solid #000;">{{ $author->biography }}</td>
                    <td style="border: 2px solid #000;">{{ $author->actions }}</td>
                    <td style="border: 2px solid #000;">
                        <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('authors.destroy', $author->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $authors->links() }}
</div>
@endsection

