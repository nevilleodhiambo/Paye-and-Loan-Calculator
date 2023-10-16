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
                    <form method="POST" action="{{route('levy.update', $levy->id)}}">
                        @csrf
                        @method('PUT')
                        <label for="">House Levy</label> <br>
                        <input type="text" name="house_levy" value="{{$levy->house_levy}}"> <br>
                        <input type="submit" value="Update" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
