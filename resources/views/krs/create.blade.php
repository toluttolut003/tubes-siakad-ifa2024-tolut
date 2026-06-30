<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Matakuliah') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('krs.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                    @csrf

                    @if ($errors->has('duplicate'))
                    <div class="p-4 mb-4 text-sm text-red-800 bg-red-100 rounded-lg dark:bg-gray-800 dark:text-red-400">
                        {{ $errors->first('duplicate') }}
                    </div>
                    @endif

                    @if (Auth::user()->role != 'mahasiswa')
                        <div class="max-w-xl">
                            <x-input-label for="npm" value="NPM"/>
                            <x-text-input id="npm" type="text" name="npm" class="mt-1 block w-full" value="{{ old('')}}" required/>
                            <x-input-error class="mt-2" :messages="$errors->get('npm')" />
                        </div>
                    @endif

                    <div class="max-w-xl">
                        <x-input-label for="kode_matakuliah" value="MATAKULIAH"/>
                        <select name="kode_matakuliah" id="kode_matakuliah" required>
                            <option value=""></option>
                            @foreach ($matakuliah as $matkul)
                                <option value="{{ $matkul->kode_matakuliah }}">{{ $matkul->nama_matakuliah }}</option>
                            @endforeach
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('kode_matakuliah')" />
                    </div>

                    <div class="flex items-center gap-4">
                        <a class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-white"
                        href="{{ route('krs.index') }}">Cancel</a>
                        <x-primary-button name="save_and_create" value="true">Save & Create Another</x-primary-button>
                        <x-primary-button name="save" value="true">Save</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>