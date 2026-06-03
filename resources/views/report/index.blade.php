<x-app-layout>
    @include('layouts.flash-messages')
    @Vite(['resources/css/app.css', 'resources/js/app.js'])
    <div class="container">
        <h1>Список заявок</h1>

        <a href="{{ route('reports.create') }}">Создать заявку</a>

        <x-filter :sort=$sort :status=$status> </x-filter>




        <!-- <div>
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
         -->
        @foreach ($reports as $report)
        <div class="card">
            <h3>Автомобиль: {{ $report->number }}</h3>
            <p>Описание: {{ $report->description }}</p>
            <p>Дата создания: {{\Carbon\Carbon::parse($report->created_at)->translatedFormat('j F Y h:i');}}</p>
            @foreach($reports as $report)
            
            @isset($report->path_img)
            <img src="{{ Storage::url($report->path_img) }}" class="contact-block__img" alt="">
            @endisset
           
            @endforeach

            <x-status :type="$report->status->id">
                {{$report->status->name}}
            </x-status>

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