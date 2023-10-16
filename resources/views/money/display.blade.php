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
                        <a href="{{route('searching')}}" class="py-2 px-4 bg-green-500 hover:bg-green-700 rounded-lg p-5 text-white">New Calculations</a>
                    </div>
                   
                    <div class="jusitify-center items-center bg-white p-8 rounded shadow-md w-300">
                        <p class="text-2xl mb-4">Gross Pay : {{$search}}</p> <br>

                        <h1 class="text-2xl mb-4">Deductions</h1>

                        @if (isset($rates, $tier1, $tier2))
                        <p>PAYE: {{$paye}}</p> <br>
                        <p>NSSF(Tier I) : {{$tier1}}</p> <br>
                        <p>NSSF(Tier II) : {{$tier2}}</p> <br>
                        <p>NHIF: {{$rates}}</p> <br>
                         {{-- <p>Payedue: {{$payedue}}</p> --}}
                        <p>Housing Levy: {{$h_levy}}</p> <br>

                        <p>Total Deductions: {{$deductions}}</p>
                        <p>Net Pay : {{$net}}</p>
                        <hr class="border-t-2 border-black-700">
                        Paye Information:
                        <p>Gross Pay: {{$search}}</p>
                        <p>Allowable Deductions : {{$tier1 + $tier2}}</p>
                        <p>Taxable Pay : {{$mysearch}}</p>
                        
                        
                        <br><br><br><br>

                        <p>Taxable Pay: {{$mysearch}}</p>
                        @elseif (isset($error))
                        <p>not found</p>
                        @endif
                
                        <p>All Deductions : {{$tier1 + $tier2  + $h_levy}}</p> <br>
                        <p class="text-2xl mb-4">Net Pay: {{$search - ($tier1  + $tier2  + $h_levy)}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
