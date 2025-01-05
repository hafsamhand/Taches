<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier la tâche</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-top: 10px;
            color: #555;
        }
        input[type="text"], textarea {
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="checkbox"] {
            margin-top: 10px;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
        }
        button:hover {
            background-color: #0056b3;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Modifier la tâche</h1>
        <form action="{{ route('taches.update', $elements->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="nom">Titre :</label>
            <input type="text" name="nom" id="nom" value="{{ $elements->nom }}" required>
            <label for="description">Description :</label>
            <textarea name="description" id="description" required>{{ $elements->description }}</textarea>
            <label for="status">Terminée :</label>
            <input type="hidden" name="status" value="0"> 
            <input type="checkbox" name="status" id="status" value="1" {{ $elements->status ? 'checked' : '' }}>
            <button type="submit">Modifier</button>
        </form>
        <a href="{{ route('taches.index') }}">Retour à la liste des tâches</a>
    </div>
</body>
</html>
