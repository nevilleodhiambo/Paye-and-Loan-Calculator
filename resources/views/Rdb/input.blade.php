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
                    <form method="POST" action="{{route('rdb.calculator')}}">
                        @csrf
                        <label for="">Principal</label>
                        <br>
                        <input type="text" name="principal" class="rounded-lg" value="{{old('principal')}}"> <br>
                        <label for="">Interest</label>
                        <br>
                        <input type="text" name="interest" class="rounded-lg" value="{{old('interest')}}"> <br>
                        <label for="">Term</label>
                        <br>
                        <input type="text" name="term" class="rounded-lg" value="{{old('term')}}"> <br>
                        <label for="">Term</label>
                        {{-- <br>
                        <input type="text" name="principal" class="rounded-lg" value="{{old('relief')}}"> <br> --}}

                        <input type="submit" value="submit" class="py-2 px-4 bg-indigo-300 hover:bg-indigo-600 rounded-lg">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

