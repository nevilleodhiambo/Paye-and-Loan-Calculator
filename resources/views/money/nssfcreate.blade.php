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
                    <form method="POST" action="{{route('nssf.store')}}">
                        @csrf
                        <label for="">Low Earning Limit</label>
                        <br>
                        <input type="number" name="lel"> <br>
                        <label for="">High Earning Limit</label>
                        <br>
                        <input type="number" name="uel"> <br>
                        <label for="">Pension Rate</label> <br>
                        <input type="number" name="pension_contribution"> <br>
                        <input type="submit" value="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

