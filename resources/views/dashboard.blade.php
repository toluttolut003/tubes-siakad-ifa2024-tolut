<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ Auth::user()->name }}, {{ Auth::user()->npm }} 👤 <br><br>
                    <div class="mb-6">
                    <a class="inline-flex items-center px-4 py-2 bg-white border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-200"
                    href="{{route('krs.index') }}">AMBIL KRS</a><!--DONT FORGET THE HREF-->
                    <br><br><a class="inline-flex items-center px-4 py-2 bg-white border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-200"
                    href="{{route('jadwal.index') }}">LIHAT JADWAL</a><!--DONT FORGET THE HREF-->
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
