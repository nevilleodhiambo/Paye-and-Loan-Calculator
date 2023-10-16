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

                    <div >
                        <a href="{{route('enter.amount')}}" class="py-2 px-4 bg-green-500 hover:bg-green-700 rounded-lg p-5 text-white">New Loan Calculations</a>
                    </div>
                   
                    <div class="jusitify-center items-center bg-white p-8 rounded shadow-md w-300">
                        <h1 class="text-2xl mb-4">Loan Repayment Calculator</h1>

                        {{-- <p class="text-2xl mb-4">Principle Amount : {{$amount}}</p> <br> --}}


                        @if (isset($amount, $rate, $number))
                             <p>Amount Borrowed : {{$amount}}</p> <br>
                            <p>Annual Interest Rate: {{$rate}}</p> <br>
                            <p>Number Of Monthly Payments : {{$number}}</p> <br>
                            <hr>    
                            <p>Monthly Payment : {{$m}}</p> <br>
                            <p>Total Payment : {{$total}}</p> <br>
                            <p>Total Interest : {{$interest}}</p> <br>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
