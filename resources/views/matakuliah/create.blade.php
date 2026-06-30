<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Matakuliah') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('matakuliah.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                    @csrf

                    <div class="max-w-xl">
                        <x-input-label for="kode_matakuliah" value="KODE"/>
                        <x-text-input id="kode_matakuliah" type="text" name="kode_matakuliah" class="mt-1 block w-full" value="{{ old('')}}" required/>
                        <x-input-error class="mt-2" :messages="$errors->get('kode_matakuliah')" />
                    </div>

                    <div class="max-w-xl">
                        <x-input-label for="nama_matakuliah" value="NAMA"/>
                        <x-text-input id="nama_matakuliah" type="text" name="nama_matakuliah" class="mt-1 block w-full" value="{{ old('')}}" required/>
                        <x-input-error class="mt-2" :messages="$errors->get('nama_matakuliah')" />
                    </div>

                    <div class="max-w-xl">
                        <x-input-label for="sks" value="JUMLAH SKS"/>
                        <select name="sks" id="sks" required>
                            <option value=""></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('sks')" />
                    </div>

                    <div class="flex items-center gap-4">
                         <a class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-white"
                        href="{{ route('matakuliah.index') }}">Cancel</a>
                        <x-primary-button name="save_and_create" value="true">Save & Create Another</x-primary-button>
                        <x-primary-button name="save" value="true">Save</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>