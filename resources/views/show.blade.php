<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la tâche</title>
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
        p {
            color: #555;
        }
        .badge {
            padding: 5px 10px;
            border-radius: 4px;
        }
        .badge-success {
            background-color: #28a745;
            color: #fff;
        }
        .badge-secondary {
            background-color: #6c757d;
            color: #fff;
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
        .btn {
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }
        .btn-warning {
            background-color: #ffc107;
            color: #fff;
        }
        .btn-danger {
            background-color: #dc3545;
            color: #fff;
        }
        .btn-success {
            background-color: #28a745;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ $elements->nom }}</h1>
        <p>{{ $elements->description }}</p>
        @if ($elements->status)
            <span class="badge badge-success">Terminée</span>
        @else
            <span class="badge badge-secondary">Non terminée</span>
            <form action="{{ route('taches.complete', $elements->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-success">Marquer comme terminée</button>
            </form>
        @endif
        <a href="{{ route('taches.edit', $elements->id) }}" class="btn btn-warning">Modifier</a