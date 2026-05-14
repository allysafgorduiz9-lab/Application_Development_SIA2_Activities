<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-red-800 leading-tight">
            {{ __('Youth Portal: Administrator Management') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <div class="bg-red-700 p-6 rounded-lg shadow-lg flex justify-between items-center border-l-8 border-black">
                <div>
                    <h3 class="text-xl font-black text-black uppercase tracking-tight">Official Control Panel</h3>
                    <p class="text-black text-sm font-bold italic">Logged in as: {{ Auth::user()->name }} (SK Admin)</p>
                </div>
                <div class="text-right">
                    <span class="bg-white text-black px-4 py-1 rounded-full text-xs font-black uppercase tracking-widest shadow border border-black">
                        Administrative Access
                    </span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-xl shadow-sm border-b-4 border-teal-500">
                    <p class="text-gray-500 text-xs font-bold uppercase tracking-wider">Registered Youth</p>
                    <p class="text-4xl font-black text-teal-600 mt-2">{{ count($youthMembers) }}</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm border-b-4 border-blue-500">
                    <p class="text-gray-500 text-xs font-bold uppercase tracking-wider">PH Unemployment ({{ $stats[0]['date'] }})</p>
                    <p class="text-4xl font-black text-blue-600 mt-2">{{ number_format($stats[0]['value'], 2) }}%</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm border-b-4 border-orange-500">
                    <p class="text-gray-500 text-xs font-bold uppercase tracking-wider">Active Municipality</p>
                    <p class="text-4xl font-black text-orange-600 mt-2">Silago</p>
                </div>
            </div>

            <div class="bg-white shadow-md sm:rounded-xl overflow-hidden border border-gray-200">
                <div class="p-5 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                    <h3 class="font-bold text-gray-700">Master Database: All Youth Records</h3>
                    <button class="bg-red-500 hover:bg-red-600 text-white text-xs px-3 py-1 rounded font-bold transition">Generate Report</button>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-gray-100 text-gray-600 text-xs uppercase font-bold">
                            <tr>
                                <th class="p-4 border-b">Full Name</th>
                                <th class="p-4 border-b text-center">Purok</th>
                                <th class="p-4 border-b text-center">Classification</th>
                                <th class="p-4 border-b text-center">Age</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach($youthMembers as $youth)
                            <tr class="hover:bg-red-50 transition duration-150">
                                <td class="p-4 border-b font-medium text-gray-900">{{ $youth->name }}</td>
                                <td class="p-4 border-b text-center">
                                    <span class="bg-teal-100 text-teal-800 text-xs px-2 py-1 rounded-md font-bold uppercase">{{ $youth->purok }}</span>
                                </td>
                                <td class="p-4 border-b text-center text-sm italic">{{ $youth->classification }}</td>
                                <td class="p-4 border-b text-center font-mono">{{ $youth->age }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <h3 class="font-bold text-blue-700 mb-4 uppercase text-sm tracking-widest">Global Labor Data (Public API Feed)</h3>
                <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                    @foreach(array_slice($stats, 0, 5) as $s)
                    <div class="p-4 bg-gray-50 rounded-lg text-center border border-gray-200">
                        <p class="text-xs text-gray-500 font-bold">{{ $s['date'] }}</p>
                        <p class="text-lg font-black text-gray-800">{{ number_format($s['value'], 1) }}%</p>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</x-app-layout>