<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>News Website - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .bg-pink {
            background-color: pink;
        }
        .btn-pink {
            background-color: pink;
            color: white;
        }
        .btn-pink:hover {
            background-color: deeppink;
            color: white;
        }
    </style>
</head>

<body>
    <div class="bg-pink py-3">
        <h3 class="text-white text-center">News Website - Home</h3>
    </div>

    <div class="container mt-4">
        <div class="d-flex justify-content-end">
            <a href="{{ route('news.create') }}" class="btn btn-pink mb-3">Add News</a>
        </div>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @foreach($news as $item)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->title }}</h5>
                    <p class="card-text">{{ Str::limit($item->content, 150) }}</p>
                    <p class="card-text"><small class="text-muted">By {{ $item->author }} on {{ $item->published_at }}</small></p>
                    @if($item->image)
                        <img src="{{ asset('uploads/news/' . $item->image) }}" class="img-fluid mb-2" alt="Image">
                    @endif
                    <a href="{{ route('news.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('news.destroy', $item->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
