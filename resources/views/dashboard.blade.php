@section('title')
    Task Management | Dashboard
@endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="py-10 sm:py-10">
                        <div class="bg-gray-50 py-24 sm:py-32">
                            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                                <dl class="grid grid-cols-1 gap-x-8 gap-y-16 text-center lg:grid-cols-3">
                                    <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                                        <dt class="text-base leading-7">Total Tasks Created</dt>
                                        <dd class="order-first text-3xl font-semibold tracking-tight sm:text-5xl">44 million</dd>
                                    </div>
                                    <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                                        <dt class="text-base leading-7">Tasks Assigned to You</dt>
                                        <dd class="order-first text-3xl font-semibold tracking-tight sm:text-5xl">$119 trillion</dd>
                                    </div>
                                    <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                                        <dt class="text-base leading-7">Completed Tasks</dt>
                                        <dd class="order-first text-3xl font-semibold tracking-tight sm:text-5xl">46,000</dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
