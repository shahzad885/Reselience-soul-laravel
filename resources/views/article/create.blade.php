<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Article</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 600px;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color:  #1e293b;
            margin-bottom: 15px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            color:   #1e293b;
            margin-bottom: 5px;
        }

        input[type="text"], 
        textarea, 
        select, 
        input[type="file"] {
            padding: 10px;
            margin-bottom: 10px; /* Reduced margin */
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
        }

        input[type="text"]:focus, 
        textarea:focus, 
        select:focus {
            border-color:  #1e293b;
            outline: none;
        }

        textarea {
            resize: vertical;
            height: 130px;
        }

        button {
            background-color:  #1e293b;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color:  #1e293b;
        }

        .form-group {
            margin-bottom: 10px;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            h1 {
                font-size: 1.5em;
            }

            button {
                font-size: 14px;
                padding: 8px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add New Article</h1>
        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="content">Content:</label>
                <textarea id="content" name="content" required></textarea>
            </div>

            <div class="form-group">
                <label for="author">Author:</label>
                <input type="text" id="author" name="author" required>
            </div>

            <div class="form-group">
                <label for="category">Category:</label>
                <select id="category" name="category" required>
                    <option value="Mental Health Awareness">Mental Health Awareness</option>
                    <option value="Stress Management">Stress Management</option>
                    <option value="Self-Care">Self-Care</option>
                    <option value="Mindfulness">Mindfulness</option>
                    <option value="Therapy and Counseling">Therapy and Counseling</option>
                    <option value="Emotional Wellbeing">Emotional Wellbeing</option>
                    <option value="Depression">Depression</option>
                    <option value="Anxiety">Anxiety</option>
                </select>
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" id="image" name="image">
            </div>

            <button type="submit">Add Article</button>
        </form>
    </div>
</body>
</html>
