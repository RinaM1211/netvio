<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Создание заявки</title>
</head>
<body>
<x-app-layout>
    <div class="container">
        <h1>Новая заявка</h1>
        
        <form action="{{ route('reports.store') }}" method="POST">
            @csrf
            
            <label>Номер автомобиля:</label>
            <input type="text" name="number" required>
            
            <label>Описание проблемы:</label>
            <textarea name="description" rows="5" required></textarea>
            
            <button type="submit">Создать</button>
        </form>
    </div>
</x-app-layout>
</body>
</html>