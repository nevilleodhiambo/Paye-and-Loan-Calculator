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
                    <form method="POST" action="{{route('loancalculator.update', $nhif->id)}}">
                        @csrf
                        @method('PUT')
                        <label for="">My Rate</label>
                        <br>
                        <input type="number" name="relief" class="rounded-lg" value="{{$nhif->relief}}"> <br>
                        <input type="submit" value="submit" class="py-2 px-4 bg-indigo-300 hover:bg-indigo-600 rounded-lg">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

