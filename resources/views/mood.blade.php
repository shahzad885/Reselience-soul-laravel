<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mood Tracking</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('css/mood.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/home.css') }}" rel="stylesheet"> --}}
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans+SC:wght@300;400;500;700&family=Great+Vibes&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: 'Alegreya Sans SC', Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
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
        /* border-radius: 15px 15px 15px 15px; */
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


        .container {
            padding: 20px;
        }

        h1 {
            color: #003366;
            font-size: 2.5em;
            margin-bottom: 20px;
         

        }

        .card {
            border-radius: 12px;
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .card-body {
            padding: 30px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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

        /* Custom Mood Log Styles */
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

        .submit-btn {
            font-size: 1.1em;
            border-radius: 10px;
            padding: 12px 20px;
            background-color: #36A2EB;
            color: white;
            border: none;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #218cdb;
        }

        /* Chart Styling */
        .chart-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 500px;
        }

        .chart-container h3 {
            color: #333;
            margin-bottom: 20px;
            margin-top: 80px !important;
            font-size: 1.8em;
        }

        .mood-history-table {
            margin-top: 30px;
            width: 100%;
            border-collapse: collapse;
        }

        .mood-history-table th, .mood-history-table td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        .mood-history-table th {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        .mood-history-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            h1 {
                font-size: 1.8em;
            }

            .submit-btn {
                font-size: 1em;
                padding: 10px 18px;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-custom">

        <a class="navbar-brand" href="{{ route('index') }}">Resilient Souls</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
        <h1 class="text-center">Mood Tracking</h1>

        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" id="log-tab" data-bs-toggle="tab" href="#log">Log Mood</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="history-tab" data-bs-toggle="tab" href="#history">View History</a>
            </li>
        </ul>

        <div class="tab-content mt-4">
            <div class="tab-pane fade show active" id="log">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Log Your Mood</h5>
                        <form method="POST" action="{{ route('mood.store') }}" class="w-100">
                            @csrf
                            <div class="form-group">
                                <label for="moodSelect" class="mood-form-label">How do you feel today?</label>
                                <select class="form-control mood-select" id="moodSelect" name="mood">
                                    <option value="Happy">Happy</option>
                                    <option value="Sad">Sad</option>
                                    <option value="Neutral">Neutral</option>
                                </select>
                            </div>
                            <button type="submit" class="submit-btn mt-3">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            

            <div class="tab-pane fade" id="history">
                <div class="chart-container">
                    <h3 class="text-center mt-4">Mood Progress Chart</h3>
                    <canvas id="moodChart" width="400" height="400"></canvas>
                </div>
                <table class="mood-history-table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Mood</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example Row (replace with actual data) -->
                        <tr>
                            <td>2024-12-28</td>
                            <td>Happy</td>
                        </tr>
                        <tr>
                            <td>2024-12-27</td>
                            <td>Sad</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('moodChart').getContext('2d');
            const moodData = @json($moodData ?? []);

            const totalMoods = Object.values(moodData).reduce((a, b) => a + b, 0);
            const percentages = Object.values(moodData).map(value => ((value / totalMoods) * 100).toFixed(2));

            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: Object.keys(moodData).map((mood, index) => `${mood} (${percentages[index]}%)`),
                    datasets: [{
                        label: 'Mood Distribution',
                        data: Object.values(moodData),
                        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                    }]
                },
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
