<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des tâches</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgba(73, 156, 186, 0.8);
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: rgba(135, 241, 245, 0.42);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(21, 137, 245, 0.49);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        input[type="text"], select {
            padding: 10px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .list-group {
            list-style: none;
            padding: 0;
        }
        .list-group-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
            background-color: #f8f9fa;
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
        .btn {
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
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
            display: block;
            width: 100%;
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Liste des tâches</h1>
        <form method="GET" action="{{ route('taches.index') }}">
            <input type="text" name="cherche" placeholder="Rechercher une tâche">
            <select name="status">
                <option value="">Tous</option>
                <option value="1">Terminées</option>
                <option value="0">Non terminées</option>
            </select>
            <button type="submit">Filtrer</button>
        </form>
        <ul class="list-group">
            @foreach ($elements as $element)
                <li class="list-group-item">
                    <div>
                        <a href="{{ route('taches.show', $element->id) }}">{{ $element->nom }}</a>
                        @if ($element->status)
                            <span class="badge badge-success ml-2">Terminée</span>
                        @else
                            <span class="badge badge-secondary ml-2">Non terminée</span>
                        @endif
                    </div>
                    <div>
                        @if (!$element->status)
                            <form action="{{ route('taches.complete', $element->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success btn-sm">Marquer comme terminée</button>
                            </form>
                        @endif
                        <a href="{{ route('taches.edit', $element->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('taches.destroy', $element->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
        <a href="{{ route('taches.create') }}" class="btn btn-success">Ajouter une nouvelle tâche</a>
    </div>
</body>
</html>