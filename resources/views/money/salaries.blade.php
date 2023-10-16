<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if (session('status'))
                         <div class="bg-green-500">
                             {{ session('status') }}
                         </div>
                    @endif

                <div class="p-6 text-gray-900">

                </div>

                <h1 class="text-2xl mb-4">NHIF RATES</h1>

                <a href="{{route('salary.create')}}" class="py-2 px-4 bg-green-500 hover:bg-green-700 rounded-lg p-5">Create</a>

                <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">

                    <tr>
                     <th class="py-2 px-4 text-left">#</th>
                     <th class="py-2 px-4 text-left">Low Amount</th>
                     <th class="py-2 px-4 text-left">High Amount</th>
                     <th class="py-2 px-4 text-left">Rates</th>
                     <th class="py-2 px-4 text-left">Action</th>
                    </tr>
                    <tr>
                    @foreach ($salaries as $nhif)
                    <td class="py-2 px-4 border-b border-gray-200">{{$loop->iteration}}</td>
                    <td class="py-2 px-4 border-b border-gray-200">{{$nhif->low_amount}}</td>
                    <td class="py-2 px-4 border-b border-gray-200">{{$nhif->high_amount}}</td>
                    <td class="py-2 px-4 border-b border-gray-200">{{$nhif->rates}}</td>
                    <td class="py-2 px-4 border-b border-gray-200">
                        <a href="{{route('salary.edit', $nhif->id)}}" class="py-2 px-4 bg-green-500 hover:bg-green-700 rounded-lg text-white">Edit</a>
                        <form   
                            method="POST" 
                            action="{{route('salary.destroy', $nhif->id)}}"
                            onsubmit="confirm('Are You Sure')">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg" >
                        </form>
                    </td>
                   </tr>
                    @endforeach
                 </table>

                   
                </div>
           
        </div>
    </div>
</x-app-layout>
