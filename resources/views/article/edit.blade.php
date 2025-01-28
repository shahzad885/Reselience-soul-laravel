<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Article</title>
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
            color: #003366;
            margin-bottom: 15px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            color: #003366;
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
            border-color: #003366;
            outline: none;
        }

        textarea {
            resize: vertical;
            height: 130px;
        }

        button {
            background-color: #003366;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #001a33;
        }

        .image-preview {
            margin-top: 10px;
        }

        .image-preview img {
            border-radius: 6px;
            max-width: 100px;
        }

        .form-group {
            margin-bottom: 10px; /* Reduced margin */
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
        <h1>Edit Article</h1>
        <form action="{{ route('articles.update', $article) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="{{ $article->title }}" required>
            </div>

            <div class="form-group">
                <label for="content">Content:</label>
                <textarea id="content" name="content" required>{{ $article->content }}</textarea>
            </div>

            <div class="form-group">
                <label for="author">Author:</label>
                <input type="text" id="author" name="author" value="{{ $article->author }}" required>
            </div>

            <div class="form-group">
                <label for="category">Category:</label>
                <select id="category" name="category" required>
                    <option value="Mental Health Awareness" {{ $article->category == 'Mental Health Awareness' ? 'selected' : '' }}>Mental Health Awareness</option>
                    <option value="Stress Management" {{ $article->category == 'Stress Management' ? 'selected' : '' }}>Stress Management</option>
                    <option value="Self-Care" {{ $article->category == 'Self-Care' ? 'selected' : '' }}>Self-Care</option>
                    <option value="Mindfulness" {{ $article->category == 'Mindfulness' ? 'selected' : '' }}>Mindfulness</option>
                    <option value="Therapy and Counseling" {{ $article->category == 'Therapy and Counseling' ? 'selected' : '' }}>Therapy and Counseling</option>
                    <option value="Emotional Wellbeing" {{ $article->category == 'Emotional Wellbeing' ? 'selected' : '' }}>Emotional Wellbeing</option>
                    <option value="Depression" {{ $article->category == 'Depression' ? 'selected' : '' }}>Depression</option>
                    <option value="Anxiety" {{ $article->category == 'Anxiety' ? 'selected' : '' }}>Anxiety</option>
                </select>
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" id="image" name="image">
                @if($article->image)
                    <div class="image-preview">
                        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}">
                    </div>
                @endif
            </div>

            <button type="submit">Update Article</button>
        </form>
    </div>
</body>
</html>
