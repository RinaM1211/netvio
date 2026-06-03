<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold mb-6">Административная панель</h1>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full border border-gray-300">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="border px-4 py-2">Пользователь</th>
                                    <th class="border px-4 py-2">Номер авто</th>
                                    <th class="border px-4 py-2">Описание</th>
                                    <th class="border px-4 py-2">Дата создания</th>
                                    <th class="border px-4 py-2">Статус</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reports as $report)
                                <tr>
                                    <td class="border px-4 py-2">{{ $report->user->name ?? 'Не указан' }}</td>
                                    <td class="border px-4 py-2">{{ $report->number }}</td>
                                    <td class="border px-4 py-2">{{ $report->description }}</td>
                                    <td class="border px-4 py-2">{{ $report->created_at }}</td>
                                    
                                    <td class="border px-4 py-2">
                                        @if($report->status->name == 'Новое')
                                            <form action="{{ route('admin.updateStatus', $report) }}" method="POST">
                                                @csrf
                                                @method('patch')
                                                <select name="status_id" onchange="this.form.submit()" class="rounded border p-1">
                                                    <option value="1" selected>Новое</option>
                                                    <option value="2">Подтверждено</option>
                                                    <option value="3">Отклонено</option>
                                                </select>
                                            </form>
                                        @else
                                            {{-- Для остальных статусов просто показываем текст --}}
                                            <span class="px-2 py-1 rounded text-sm
                                                @if($report->status->name == 'Подтверждено') text-green-600
                                                @elseif($report->status->name == 'Отклонено') text-red-600
                                                @endif">
                                                {{ $report->status->name }}
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="mt-6">
                        {{ $reports->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>