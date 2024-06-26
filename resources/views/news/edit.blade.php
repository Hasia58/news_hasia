<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>News Website - Edit News</title>
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
        <h3 class="text-white text-center">News Website - Edit News</h3>
    </div>

    <div class="container">
        <div class="justify-content-center row mt-4">
            <div class="d-flex col-md-10 justify-content-start">
                <a href="{{ route('news.index') }}" class="btn-babyblue btn">Back to News List</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card border-0 shadow-lg mt-5 mb-5">
                    <div class="card-header bg-babyblue">
                        <h3 class="text-white">Edit News</h3>
                    </div>
                    <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label h4" for="title">Title</label>
                                <input type="text" value="{{ old('title', $news->title) }}" class="form-control form-control-lg @error('title') is-invalid @enderror" placeholder="Title" name="title" />
                                @error('title')
                                <p class='invalid-feedback'>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label h4" for="content">Content</label>
                                <textarea class="form-control form-control-lg @error('content') is-invalid @enderror" placeholder="Content" name="content" cols="30" rows="5">{{ old('content', $news->content) }}</textarea>
                                @error('content')
                                <p class='invalid-feedback'>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label h4" for="author">Author</label>
                                <input type="text" value="{{ old('author', $news->author) }}" class="form-control form-control-lg @error('author') is-invalid @enderror" placeholder="Author" name="author" />
                                @error('author')
                                <p class='invalid-feedback'>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label h4" for="published_at">Published At</label>
                                <input type="date" value="{{ old('published_at', $news->published_at) }}" class="form-control form-control-lg @error('published_at') is-invalid @enderror" name="published_at" />
                                @error('published_at')
                                <p class='invalid-feedback'>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label h4" for="image">Image</label>
                                <input type="file" class="form-control form-control-lg @error('image') is-invalid @enderror" name="image" />
                                @error('image')
                                <p class='invalid-feedback'>{{ $message }}</p>
                                @enderror
                                @if($news->image)
                                <img src="{{ asset('uploads/news/' . $news->image) }}" alt="{{ $news->title }}" class="img-thumbnail mt-2" width="150">
                                @endif
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-lg btn-babyblue">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
