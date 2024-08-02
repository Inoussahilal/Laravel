@extends('master')

@section('content')
<div class="container">
    <h1>Books</h1>
    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Add New Book</a>
    @if($books->count())
        <table class="table table-bordered" style="border: 2px solid #000;">
            <thead>
                <tr style="border: 2px solid #000;">
                    <th>Title</th>
                    <th>Author</th>
                    <th>ISBN</th>
                    <th>Published Year</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr style="border: 2px solid #000;">
                        <td style="border: 2px solid #000;">{{ $book->title }}</td>
                        <td style="border: 2px solid #000;">{{ $book->author->name }}</td>
                        <td style="border: 2px solid #000;">{{ $book->isbn }}</td>
                        <td style="border: 2px solid #000;">{{ $book->published_year }}</td>
                        <td style="border: 2px solid #000;">
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        {{ $books->links() }}
    @else
        <p>No books found.</p>
    @endif
</div>
@endsection