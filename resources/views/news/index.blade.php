<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>News Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .bg-babyblue {
            background-color: #89CFF0;
        }

        .btn-babyblue {
            background-color: #89CFF0;
            color: white;
        }

        .btn-babyblue:hover {
            background-color: #7BC3E2;
            color: white;
        }
    </style>
</head>

<body>
    <div class="bg-babyblue py-3">
        <h3 class="text-white text-center">News Website</h3>
    </div>

    <div class="container">
        <div class="justify-content-center row mt-4">
            <div class="d-flex col-md-10 justify-content-end">
                <a href="{{ route('news.create') }}" class="btn-babyblue btn">Add News</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            @if(Session::has('success'))
            <div class="col-md-10 mt-4">
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            </div>
            @endif
            <div class="col-md-10">
                <div class="card border-0 shadow-lg mt-5 mb-5">
                    <div class="card-header bg-babyblue">
                        <h3 class="text-white">List of News</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($news as $article)
                            <div class="col-md-4 mb-4">
                                <div class="card h-100">
                                    @if($article->image)
                                    <img src="{{ asset('uploads/news/' . $article->image) }}" class="card-img-top" alt="{{ $article->title }}">
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $article->title }}</h5>
                                        <p class="card-text">{{ Str::limit($article->content, 100) }}</p>
                                        <p class="text-muted">By {{ $article->author }}</p>
                                        <p class="text-muted">{{ \Carbon\Carbon::parse($article->published_at)->format('M d, Y') }}</p>
                                        <a href="{{ route('news.edit', $article->id) }}" class="btn btn-sm btn-babyblue">Edit</a>
                                        <form action="{{ route('news.destroy', $article->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
