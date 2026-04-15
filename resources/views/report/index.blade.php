<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Заявки</title>
</head>
<body>
    <div class="container">
        <h1>Список заявок</h1>
        
        <a href="{{ route('reports.create') }}">Создать заявку</a>
        
        @foreach ($reports as $report)
            <div class="card">
                <h3>Автомобиль: {{ $report->number }}</h3>
                <p>Описание: {{ $report->description }}</p>
                <p>Дата создания: {{ $report->created_at }}</p>
                
                <a href="{{ route('reports.edit', $report) }}">Редактировать</a>
                
                <form action="{{ route('reports.destroy', $report) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Удалить</button>
                </form>
            </div>
        @endforeach
    </div>
</body>
</html>