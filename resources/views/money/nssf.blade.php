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
                    <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                        <tr>
                            <th class="py-2 px-4 text-left">#</th>
                            <th class="py-2 px-4 text-left">Lower Earning Limit</th>
                            <th class="py-2 px-4 text-left">Higher Earning Limit</th>
                            <th class="py-2 px-4 text-left">Pension Contribution</th>
                        </tr>
                            @foreach ($nssfs as $nssf)
                                <tr>
                                    <td class="py-2 px-4 border-b border-gray-200">{{$loop->iteration}}</td>
                                    <td class="py-2 px-4 border-b border-gray-200">{{$nssf->lel}}</td>
                                    <td class="py-2 px-4 border-b border-gray-200">{{$nssf->uel}}</td>
                                    <td class="py-2 px-4 border-b border-gray-200">{{$nssf->pension_contribution}} <span>%</span> </td>
                                    <td class="py-2 px-4 border-b border-gray-200">
                                        <a href="{{route('nssf.edit', $nssf->id)}}" class="py-2 px-4 bg-green-500 hover:bg-green-700 rounded-lg">Edit</a>
                                        <form  method="POST"
                                            action="{{route('nssf.destroy', $nssf->id)}}" 
                                            class="px-4 py-2 bg-red-300 hover:bg-red-600 rounded-lg text-white"
                                            onsubmit="confirm('Are You Sure')">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="submit">
                                        
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
