<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans+SC:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">

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
            width: 16.666%; /* 2/12 units in Bootstrap grid */
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
        }

        .sidebar .nav-link {
            color: white;
            padding: 15px 20px;
            transition: all 0.3s;
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
            margin-left: 16.666%; /* Same as sidebar width */
            width: 83.334%; /* Remaining width */
            padding: 20px;
        }

        .dashboard-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            margin: 20px;
        }

        h1 {
            color: #333333;
            font-size: 2.5rem;
            margin-bottom: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            font-size: 1rem;
        }

        th {
            background-color: #1e293b;
            color: white;
            padding: 10px;
            text-align: center;
        }

        td {
            padding: 10px;
            text-align: center;
        }

        .btn {
            padding: 5px 10px;
            font-size: 0.9rem;
            border-radius: 5px;
            text-decoration: none;
            transition: all 0.3s;
        }

        .btn-primary {
            background-color: #1e293b;
            color: white;
        }

        .btn-danger {
            background-color: #e63946;
            color: white;
        }

        .btn-primary:hover {
            background-color: #0d1726;
        }

        .btn-danger:hover {
            background-color: #d62839;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav class="sidebar">
            <a class="navbar-brand" href="#">Resilient Souls</a>
            <ul class="nav flex-column">
             
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('articles.index') }}">Articles</a>
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
                <li class="nav-item">
                    <a href="{{ route('export.users') }}" class=" nav-link">Download Users as CSV</a>

                
                                </li>
                                

                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Profile
                    </a>
                    <div style="background-color: rgba(255, 255, 255, 0.5);" class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <span class="dropdown-item"> {{ Auth::user()->username }}</span>
                        <span class="dropdown-item">{{ Auth::user()->email }}</span>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                    </div>
                </li> --}}
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="main-content">
            <div class="dashboard-container">
                <h1>Admin Dashboard</h1>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <table id="usersTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>User Type</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data will be loaded here dynamically by DataTables -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#usersTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('AdminDashboard') }}',
                columns: [
                    { data: 'id' },
                    { data: 'username' },
                    { data: 'email' },
                    { data: 'userType' },
                    { data: 'actions', orderable: false, searchable: false }
                ]
            });
        });
    </script>
</body>
</html>