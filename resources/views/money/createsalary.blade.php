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
                    <form method="POST" action="{{route('salary.store')}}">
                        @csrf
                        <label for="">Low Amont</label> <br>
                        <input type="number" name="low_amount" placeholder="Low rate Amount" class="rounded-lg"> <br>
                        <label for="">High Amont</label> <br>

                        <input type="number" name="high_amount" placeholder="High rate Amount"> <br>
                        <label for="">Rate</label> <br>

                        <input type="number" name="rates" placeholder="Slab rate "> <br>
                        <input type="submit" value="submit" class="py-2 px-4 bg-green-500 hover:bg-green-700 rounded-lg mt-2px">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
