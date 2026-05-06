<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Заявки</title>
    
</head>
@Vite(['resources/css/app.css', 'resources/js/app.js'])
<body>
    <x-app-layout>
    <div class="container">
        <h1>Список заявок</h1>
        
        <a href="{{ route('reports.create') }}">Создать заявку</a>
        <div>
            <span>Сортировкапо дате создания:</span>
            <a href="{{route('reports.index',['sort'=>'desc','status'=>$status]) }}">Сначала новые</a>
            <a href="{{route('reports.index',['sort'=>'asc','status'=>$status]) }}">Сначала старые</a>
        </div>
        <div>
            <p>Фильтрация по статусу заявки</p>
            <ul>
                @foreach ($statuses as $status)
                <li>
                    <a href="{{route('reports.index',['sort' =>$sort,'status'=> $status->id]) }}">
                     {{$status->name}}   
                    </a>
                    
                </li>
                    
                @endforeach
            </ul>
        </div>
        
        @foreach ($reports as $report)
            <div class="card">
                <h3>Автомобиль: {{ $report->number }}</h3>
                <p>Описание: {{ $report->description }}</p>
                <p>Дата создания: {{ $report->created_at }}</p>
                <p>Статус:{{$report->status->name}}</p>
                
                <a href="{{ route('reports.edit', $report) }}">Редактировать</a>
                
                <form action="{{ route('reports.destroy', $report) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Удалить</button>
                </form>
            </div>
        @endforeach
        {{ $reports->appends(request()->query())->links() }}
    </div>
</x-app-layout>
</body>

</html>