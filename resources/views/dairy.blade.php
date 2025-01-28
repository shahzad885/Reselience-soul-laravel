<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Diary</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
</head>

<style>
    .navbar-custom {
        width: 90%;
        border-radius: 15px 15px 15px 15px;
        background-color: rgba(255, 255, 255, 0.5);
        margin: 0 auto;
        padding: 1.5%;
        margin-top: 1%;
    }

    @media (max-width: 767px){
        .navbar-custom {
            width: 90%;
            background-color: rgba(255, 255, 255, 0.5);
            margin: 0 auto;
            padding: 3%;
            margin-top: 5%;
        }
    }

    .navbar-brand {
        font-weight: bold;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }

    .nav-link {
        padding-left: 26px !important;
        font-size: 14px;
    }

    /* Make all cards take up 100% of the width */
    .custom-card, .card {
        width: 100%;
        margin-bottom: 20px; /* Space between cards */
    }

    .card-body {
        width: 100%;
        padding: 20px;
    }

    /* Button and Form styles */
    .submit-btn {
        font-size: 1.1em;
        border-radius: 10px;
        padding: 12px 20px;
        background-color: #36A2EB;
        color: white;
        border: none;
        cursor: pointer;
        width: 100%;
    }

    .submit-btn:hover {
        background-color: #218cdb;
    }

    .mood-form-label {
        font-size: 1.1em;
        color: #333;
        margin-bottom: 10px;
    }

    .mood-select {
        padding: 10px;
        font-size: 1.1em;
        border-radius: 8px;
        border: 1px solid #ccc;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
</style>

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

    <div class="container mt-5 pt-5">
        <h1 class="text-center" style="font-size: 2.5em; color: #003366;">Personal Diary</h1>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" id="create-tab" data-bs-toggle="tab" href="#create">Create Diary</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="view-tab" data-bs-toggle="tab" href="#view">View All</a>
            </li>
        </ul>

        <div class="tab-content mt-4">
            <div class="tab-pane fade show active" id="create">
                <div class="card custom-card">
                    <div class="card-body">
                        <h5 class="card-title">Write Your Diary Entry</h5>
                        <form method="POST" action="{{ route('diary.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="diaryEntry" class="mood-form-label">Write your entry</label>
                                <textarea class="form-control" id="diaryEntry" name="entry" rows="10" placeholder="Write your thoughts here..."></textarea>
                            </div>
                            <button type="submit" class="submit-btn mt-3">Save Entry</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="view">
                <div class="card custom-card">
                    <div class="card-body">
                        <h5 class="card-title">Diary Entries</h5>
                        <ul class="list-group">
                            @foreach ($diaries as $diary)
                                <li class="list-group-item">{{ $diary->entry }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
