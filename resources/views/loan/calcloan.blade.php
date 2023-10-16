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
                    <form method="POST" action="{{route('calc.loan')}}">
                        @csrf
                        <label for="">Amount Borrowed</label>
                        <br>
                        <input type="number" name="amount" class="rounded-lg" value="{{old('amount')}}"> <br>
                        <label for="">Annual Interest Rate (%)</label>
                        <br>
                        <input type="number" name="rate" class="rounded-lg" value="{{old('rate')}}"> <br>
                        <label for="">Number Of Monthly Payments</label>
                        <br>
                        <input type="number" name="number" class="rounded-lg" value="{{old('number')}}"> <br>
                        <input type="submit" value="submit" class="py-2 px-4 bg-indigo-300 hover:bg-indigo-600 rounded-lg">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

