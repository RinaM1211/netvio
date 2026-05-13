<x-app-layout>
    <h1>Адмминстративная панель </h1>
    @foreach($reports as $report)
    <div>
        <p><strong>Пользователь:</strong> {{ $report->user->name  }}</p>
        <p><strong>Номер авто:</strong> {{ $report->number }}</p>
        <p><strong>Описание:</strong> {{ $report->description }}</p>
        <p><strong>Дата создания:</strong> {{ $report->created_at }}</p>
        <p><strong>Статус:</strong> {{ $report->status->name  }}</p>
        
        @if($report->status->name == 'Новое')
        <form action="{{ route('admin.updateStatus', $report) }}" method="POST">
            @csrf
            @method('patch')
            <select name="status_id" onchange="this.form.submit()">
                
                @foreach($statuses as $status)
                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                @endforeach
            </select>
        </form>
        @endif
    </div>
    @endforeach

    {{ $reports->links() }}
</x-app-layout>