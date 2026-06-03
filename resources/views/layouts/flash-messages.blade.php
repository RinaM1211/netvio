<div class="space-y-3" x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)">
    @if (session('success'))
        <div
            x-show="show"
            x-transition
            class="flex items-center p-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert"
        >
            <svg class="shrink-0 w-4 h-4 me-3" aria-hidden="true" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.707-9.293a1 1 0 0 0-1.414-1.414L9 10.586 7.707 9.293a1 1 0 1 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l4-4Z"/>
            </svg>
            <div>{{ session('success') }}</div>
        </div>
    @endif

    @if (session('error'))
        <div
            x-show="show"
            x-transition
            class="flex items-center p-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
            role="alert"
        >
            <svg class="shrink-0 w-4 h-4 me-3" aria-hidden="true" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm1-11a1 1 0 1 0-2 0v4a1 1 0 1 0 2 0V7Zm-1 8a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Z"/>
            </svg>
            <div>{{ session('error') }}</div>
        </div>
    @endif

    @if (session('warning'))
        <div
            x-show="show"
            x-transition
            class="flex items-center p-4 text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300"
            role="alert"
        >
            <svg class="shrink-0 w-4 h-4 me-3" aria-hidden="true" viewBox="0 0 20 20" fill="currentColor">
                <path d="M8.257 3.099c.765-1.36 2.72-1.36 3.486 0l6.518 11.591C19.01 16.04 18.073 18 16.518 18H3.482c-1.555 0-2.492-1.96-1.743-3.31L8.257 3.1ZM11 14a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm-1-2a1 1 0 0 0 1-1V8a1 1 0 1 0-2 0v3a1 1 0 0 0 1 1Z"/>
            </svg>
            <div>{{ session('warning') }}</div>
        </div>
    @endif

    @if ($errors->any())
        <div
            x-show="show"
            x-transition
            class="p-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
            role="alert"
        >
            <div class="font-medium mb-2">Проверьте поля формы:</div>
            <ul class="list-disc list-inside space-y-1 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
