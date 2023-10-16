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
                    <tr>
                        <th class="py-2 px-4 text-left">#</th>
                        <th class="py-2 px-4 text-left">Housing Levy</th>
                    </tr>
                    @foreach ($levies as $levy)
                        <tr>
                            <td class="py-2 px-4 border-b border-gray-200">{{$loop->iteration}}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{$levy->house_levy}} <span>%</span></td>
                            <td>
                                <a href="{{route('levy.update', $levy->id)}}" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg">Edit</a>
                                <form action="{{route('levy.destroy', $levy->id)}}" method="POST" onsubmit="confirm('Are You On Meth')">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="py-2 px-4 bg-red-400 hover:bg-red-600 rounded-lg text-white">
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
