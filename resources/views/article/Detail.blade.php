<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->title }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 30px;
        }

        .article-image {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
            border-radius: 8px;
        }

        h1 {
            color: #003366;
            margin-bottom: 20px;
        }

        .meta-info {
            color: #6c757d;
            margin-bottom: 15px;
        }

        .content {
            line-height: 1.6;
        }

        .back-btn {
            margin-top: 20px;
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 1.5em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Article Title -->
        <h1>{{ $article->title }}</h1>

        <!-- Meta Info -->
        <div class="meta-info">
            <small>Author: <strong>{{ $article->author }}</strong></small><br>
            <small>Category: <strong>{{ $article->category }}</strong></small><br>
            <small>Published on: {{ $article->created_at->format('d M Y') }}</small>
        </div>

        <!-- Article Image -->
        @if($article->image)
            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="article-image mb-3">
        @else
            <img src="{{ asset('images/default-article.jpg') }}" alt="Default Image" class="article-image mb-3">
        @endif

        <!-- Article Content -->
        <div class="content">
            {!! nl2br(e($article->content)) !!}
        </div>

        <!-- Back Button -->
        {{-- <a href="{{ route('articles.index') }}" class="btn btn-primary back-btn">Back to Articles</a> --}}
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
