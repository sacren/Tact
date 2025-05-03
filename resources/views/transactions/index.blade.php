<x-layouts.app>
    <x-slot name="title">
        {{ __('Transactions Page') }}
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <h1 class="text-2xl font-bold text-gray-900 mb-4">Transactions Page</h1>

        <div class="bg-gray-50 border border-gray-200 rounded-lg p-6">
            <p class="text-gray-700"><strong>Route:</strong> {{ route('transactions.index') }}</p>
            <p class="text-gray-700 mt-2"><strong>Request ID:</strong>
                {{ $request->headers->get('X-Request-ID') ?? 'Not Available' }}</p>
        </div>
    </div>
</x-layouts.app>
