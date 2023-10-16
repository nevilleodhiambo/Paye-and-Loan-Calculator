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
                    <form method="POST" action="{{route('salary.update', $nhif->id)}}">
                        @csrf
                        @method('PUT')
                        <label for="">Low Amont</label> <br>
                        <input type="number" name="low_amount" placeholder="Low rate Amount" value="{{$nhif->low_amount}}"> <br>
                        <label for="">High Amont</label> <br>

                        <input type="number" name="high_amount" placeholder="High rate Amount" value="{{$nhif->high_amount}}"> <br>
                        <label for="">Rate</label> <br>

                        <input type="number" name="rates" placeholder="Slab rate" value="{{$nhif->rates}}"> <br>
                        <input type="submit" value="Update" class="py-2 px-4 bg:green-700 hover:bg-indigo-700">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
