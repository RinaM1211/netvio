@props(['sort','status'])

<div><div>
    <span>Сортировка по дате создания:</span>
    <a href="{{ route('reports.index', ['sort' => 'desc', 'status' => $status]) }}">
        сначала новые
    </a>
    <a href="{{ route('reports.index', ['sort' => 'asc', 'status' => $status]) }}">
        сначала старые
    </a>
</div>
<div>
<p>Фильтрация по статусу заявки</p>
<ul>
    @foreach($statuses as $statusItem)
    <li>
        <a href="{{ route('reports.index', ['sort' => $sort, 'status' => $statusItem->id]) }}" >
            {{ $statusItem->name }}
        </a>
    </li>
    @endforeach
</ul>
</div>
</div>