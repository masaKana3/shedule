<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    {{-- 📌 カレンダーを表示するエリア --}}
    <div class="container mx-auto mt-6">
        <h1 class="text-2xl font-bold mb-4">スケジュール管理カレンダー</h1>
        <div id="calendar"></div>
    </div>

    {{-- 📌 ViteでカレンダーJSを適用 --}}
    @vite(['resources/js/calendar.js'])
</x-app-layout>
