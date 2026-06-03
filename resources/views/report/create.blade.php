<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Создание заявки</title>
</head>
@Vite(['resources/css/app.css', 'resources/js/app.js'])

<body>
@include('layouts.flash-messages')
<x-app-layout>
    <div class="container">
        <h1>Новая заявка</h1>
        
        <form action="{{ route('reports.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <label>Номер автомобиля:</label>
            <input type="text" name="number" required>
            
            <label>Описание проблемы:</label>
            <textarea name="description" rows="5" required></textarea>
            <div class="mb-4">
                            <label class="block mb-2">Фото нарушения:</label>
                            <input type="file" name="path_img" class="w-full rounded border p-2" accept="image/*">
                            @error('path_img') <div class="text-red-500">{{ $message }}</div> @enderror
                        </div>
            <button type="submit">Создать</button>
        </form>
    </div>
</x-app-layout>
</body>
</html>