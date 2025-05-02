<x-layouts.app>
    {{ 'Transactions Page: ' . route('transactions.index') . ' Request ID: ' . $request->headers->get('X-Request-ID') }}
</x-layouts.app>
