<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans+SC:wght@300;400;500;700&family=Great+Vibes&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            padding: 20px;
        }

        h1 {
            color: #003366;
            margin-bottom: 20px;
        }

        .card-img-top {
            object-fit: cover;
            height: 200px;
            width: 100%;
        }

        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card-title {
            color: #003366;
        }

        .card-footer {
            background-color: #f8f9fa;
            border-top: 1px solid #ddd;
        }

        .alert-info {
            background-color: #cce5ff;
            color: #004085;
            border-radius: 6px;
        }

        .card {
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            h1 {
                font-size: 1.5em;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-custom">
        <a class="navbar-brand" href="{{ route('index') }}">Resilient Souls</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
               
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('articles.userIndex') }}">Articles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('diary') }}">Personal Diary</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('mood') }}">Mood Today?</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                                </li>
            </ul>
        </div>
    </nav>
    
    <div style="padding: 20px; "></div>

    <div class="container my-5">
        <h1 class="text-center mb-4 mt-4">Our Articles</h1>

        @if($articles->isEmpty())
            <div class="alert alert-info text-center">No articles available at the moment.</div>
        @else
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($articles as $article)
                <div class="col">
                    <a href="{{ route('articles.show', $article->id) }}" class="text-decoration-none text-dark">
                        <div class="card h-100 shadow-sm">
                            @if($article->image)
                                <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="{{ $article->title }}">
                            @else
                                <img src="{{ asset('images/default-article.jpg') }}" class="card-img-top" alt="Default Image">
                            @endif
                
                            <div class="card-body">
                                <h5 class="card-title">{{ $article->title }}</h5>
                                <p class="card-text">{{ \Illuminate\Support\Str::limit($article->content, 150, '...') }}</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Published on: {{ $article->created_at->format('d M Y') }}</small>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        @endif
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
