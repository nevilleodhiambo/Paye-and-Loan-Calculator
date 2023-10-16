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
                         <div class="bg-green-500 text-white">
                             {{ session('status') }}
                         </div>
                    @endif

                <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                    <tr>
                        <th class="py-2 px-4 text-left">#</th>
                        <th class="py-2 px-4 text-left">Periodic Month Rate</th>
                    </tr>
                    @foreach ($loans as $loan)
                        <tr>
                            <td class="py-2 px-4 border-b border-gray-200">{{$loop->iteration}}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{$loan->rate}}</td>
                            <td>
                                <a href="{{route('loancalculator.edit', $loan->id)}}" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg">Edit</a>
                                <form action="{{route('loancalculator.destroy', $loan->id)}}" method="POST" onsubmit="confirm('Are You On Meth')">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="py-2 px-4 bg-red-400 hover:bg-red-600 rounded-lg text-white text-wjite">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
