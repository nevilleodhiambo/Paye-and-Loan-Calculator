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
                    <form method="POST" action="{{route('paye.update', $paye->id)}}">
                        @csrf
                        @method('PUT')
                        <label for="">Low Earning Income</label>
                        <br>
                        <input type="number" name="low_income" class="rounded-lg" value="{{$paye->low_income}}"> <br>
                        <label for="">High Earning Income</label>
                        <br>
                        <input type="number" name="high_income" class="rounded-lg" value="{{$paye->high_income}}"> <br>
                        <label for="">Rate</label> <br>
                        <input type="text" name="rates" class="rounded-lg" value="{{$paye->rates}}"> <br>
                        <input type="submit" value="submit" class="py-2 px-4 bg-indigo-300 hover:bg-indigo-600 rounded-lg">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

