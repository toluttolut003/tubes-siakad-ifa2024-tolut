<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah dosen') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="post" action="{{ route('dosen.update', $dosen->nidn) }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                    @csrf
                    @method('patch')

                    <div class="max-w-xl">
                        <x-input-label for="nidn" value="NIDN"/>
                        <x-text-input id="nidn" type="text" name="nidn" class="mt-1 block w-full" value="{{ old('nidn', $dosen->nidn)}}" required/>
                        <x-input-error class="mt-2" :messages="$errors->get('nidn')" />
                    </div>

                    <div class="max-w-xl">
                        <x-input-label for="nama" value="NAMA"/>
                        <x-text-input id="nama" type="text" name="nama" class="mt-1 block w-full" value="{{ old('nama', $dosen->nama)}}" required/>
                        <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                    </div>

                    <div class="flex items-center gap-4">
                        <a class="inline-flex items-center px-4 py-2 bg-white border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-200"
                        href="{{ route('dosen.index') }}">Cancel</a>
                        <x-primary-button name="save" value="true">Save</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>