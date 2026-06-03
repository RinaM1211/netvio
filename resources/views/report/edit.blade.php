<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Редактирование заявки</title>
</head>
@Vite(['resources/css/app.css', 'resources/js/app.js'])

<body>
  
<x-app-layout>  
    @include('layouts.flash-messages')
    <div class="container">
        <h1>Редактирование заявки</h1>
        
        <form action="{{ route('reports.update', $report) }}" method="POST">
            @csrf
            @method('PUT')
            
            <label>Номер автомобиля:</label>
            <input type="text" name="number" value="{{ $report->number }}" required>
            
            <label>Описание проблемы:</label>
            <textarea name="description" rows="5" required>{{ $report->description }}</textarea>
            
            <button type="submit">Обновить</button>
        </form>
    </div>
</x-app-layout>
</body>
</html>