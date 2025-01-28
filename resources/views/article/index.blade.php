<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans+SC:wght@300;400;500;700&family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        body {
            font-family: 'Alegreya Sans SC', sans-serif;
            background-color: #D0D1D3;
            margin: 0;
            padding: 0;
        }

        .wrapper {
            display: flex;
            width: 100%;
            min-height: 100vh;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 16.666%;
            background-color: #1e293b;
            color: white;
            position: fixed;
            height: 100vh;
            padding: 20px 0;
        }

        .sidebar .navbar-brand {
            color: white;
            padding: 20px;
            font-size: 1.5rem;
            text-align: center;
            display: block;
            font-family: 'Alegreya Sans SC', sans-serif;
            text-decoration: none;
        }

        .sidebar .nav-link {
            color: white;
            padding: 15px 20px;
            transition: all 0.3s;
            font-size: 14px;
        }

        .sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .sidebar .dropdown-menu {
            position: relative;
            width: 100%;
            background-color: #2d3748;
            border: none;
            border-radius: 0;
        }

        .sidebar .dropdown-item {
            color: white;
            padding: 10px 20px;
        }

        .sidebar .dropdown-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        /* Main Content Styles */
        .main-content {
            margin-left: 16.666%;
            width: 83.334%;
            padding: 20px;
        }

        .container {
            width: 95%;
            margin: 20px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            color: #333333;
            margin-bottom: 30px;
            font-size: 2rem;
        }

        .newArticle {
            background-color: #1e293b;
            color: white;
            display: inline-block;
            margin-bottom: 15px;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .newArticle:hover {
            background-color: #0d1726;
            color: white;
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #1e293b;
            color: white;
            font-size: 1.1rem;
        }

        tr:nth-child(even) {
            background-color: #f4f4f4;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        img {
            max-width: 60px;
            border-radius: 5px;
        }

        .action-buttons a,
        .action-buttons button {
            font-size: 0.9rem;
            margin-right: 10px;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .action-buttons a {
            background-color: #1e293b;
            color: white;
        }

        .action-buttons button {
            background-color: #e63946;
            color: white;
        }

        .action-buttons a:hover {
            background-color: #0d1726;
        }

        .action-buttons button:hover {
            background-color: #d62839;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
                transform: translateX(-100%);
                transition: transform 0.3s ease-in-out;
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
                width: 100%;
            }

            .container {
                width: 100%;
                padding: 15px;
            }

            table {
                font-size: 0.9rem;
            }

            h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav class="sidebar">
            <a class="navbar-brand" href="{{ route('AdminDashboard') }}">Resilient Souls</a>
            <ul class="nav flex-column">
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
        </nav>

        <!-- Main Content -->
        <div class="main-content">
            <div class="container">
                <h1>Articles</h1>
                <a class="newArticle" href="{{ route('articles.create') }}">Add New Article</a>
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articles as $article)
                        <tr>
                            <td>{{ $article->title }}</td>
                            <td>{{ \Str::limit($article->content, 50) }}</td>
                            <td>{{ $article->author }}</td>
                            <td>{{ $article->category }}</td>
                            <td>
                                @if($article->image)
                                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}">
                                @endif
                            </td>
                            <td class="action-buttons">
                                <a href="{{ route('articles.edit', $article) }}">Edit</a>
                                <form action="{{ route('articles.destroy', $article) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        // For mobile responsiveness
        $(document).ready(function() {
            $('.navbar-toggler').on('click', function() {
                $('.sidebar').toggleClass('active');
            });
        });
    </script>
</body>
</html>