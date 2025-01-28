<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit User</title>
    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans+SC:wght@300;400;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Alegreya Sans SC', sans-serif;
            background-color: #D0D1D3;
        }

        h1 {
            color: #333333;
            font-size: 2.5rem;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            width: 50%;
            margin: 50px auto;
        }

        label {
            font-size: 1.1rem;
            margin-bottom: 10px;
            display: block;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 1rem;
        }

        button {
            background-color: #1e293b;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            font-size: 1.1rem;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0d1726;
        }

        .error-list {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .error-list ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .error-list li {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h1>Edit User</h1>

    @if($errors->any())
        <div class="error-list">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Username:</label>
        <input type="text" id="name" name="username" value="{{ $user->username }}" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ $user->email }}" required>

        <label for="userType">User Type:</label>
        <select id="userType" name="userType">
            <option value="user" {{ $user->userType == 'user' ? 'selected' : '' }}>User</option>
            <option value="admin" {{ $user->userType == 'admin' ? 'selected' : '' }}>Admin</option>
        </select>

        <button type="submit">Save Changes</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
