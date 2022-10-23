<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <div class="grid grid-cols-5 gap-1">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div><a href="{{ route('company.create') }}" class="btn btn-blue">Create</a></div>
                </div>
            </div>
            <div class="flex flex-wrap -mx-4">
                @foreach ($companies as $item)
                    <x-company.card :company="$item"/>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
