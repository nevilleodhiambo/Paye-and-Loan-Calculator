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
                    @if (session('status'))
                         <div class="bg-green-500">
                             {{ session('status') }}
                         </div>
                    @endif

                <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                    {{-- <a href="{{route('paye.create')}}" class="px-4 py-2 bg-green-300 hover:bg-green-600 rounded-lg">Add a Paye Slab</a> --}}
                    <tr>
                        <th class="py-2 px-4 text-left">Payment Number</th>
                        <th class="py-2 px-4 text-left">Payment</th>
                        <th class="py-2 px-4 text-left">Principal Payment</th>
                        <th class="py-2 px-4 text-left">Interest Payment</th>
                        <th class="py-2 px-4 text-left">Remaining Balance</th>
                        {{-- <th class="py-2 px-4 text-left">Action</th> --}}
                    </tr>
                    @foreach ($amortization as $paye)
                        <tr>
                            <td class="py-2 px-4 border-b border-gray-200">{{$paye['s_no']}}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{$paye['payment']}}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{$paye['principal_payment']}}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{$paye['interest_payment']}}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{$paye['remaining_balance']}}</td>
                           
                        </tr>
                    @endforeach
                </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
