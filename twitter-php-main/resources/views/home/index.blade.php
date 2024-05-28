<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twitter Clone</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @include('components.header')

    @auth
    <div class="container mt-4">
        <div class="card p-3 mb-4 text-center">
            <h1 class="m-0">Welcome, {{ Auth::user()->username }}!</h1>            
        </div>

        <div class="card p-3 mb-3">
            <h2>What’s happening?</h2>
            <form action="/submit-post" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <textarea id="postText" name="postText" class="form-control" placeholder="Share your thoughts..." required></textarea>
                    <div class="form-text">Maximum tweet length - 280 characters.</div>
                </div>
                <div class="mb-3">
                    <label for="postImage" class="form-label">Upload Image:</label>
                    <input type="file" id="postImage" name="postImage" class="form-control" accept="image/*">
                </div>
                <button type="submit" class="btn btn-success">Post</button>
            </form>
        </div>

        <div class="py-4">
            @foreach ($posts as $post)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->user->username }} | <small class="text-muted">{{ $post->created_at->format('M d, Y') }}</small></h5>
                    <p class="card-text">{{ $post->text }}</p>
                    @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" alt="...">
                    @endif
                    <p class="card-text"></p>
                    @if (Auth::id() == $post->user_id)
                    <form action="{{ route('posts-destroy', $post) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @else
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h1 class="mb-4">Happening now</h1>
                <h3 class="mb-4">Join MiniTwitter today!</h3>
                <a class="btn btn-primary" href="/login">Login</a>
                <a class="btn btn-success" href="/register">Register</a>
            </div>
        </div>

    </div>
    @endauth
</body>

</html>