<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Jadwal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('jadwal.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                    @csrf

                    <div class="max-w-xl">
                        <x-input-label for="kode_matakuliah" value="Matakuliah"/>
                        <select name="kode_matakuliah" id="kode_matakuliah" required>
                            <option value=""></option>
                            @foreach ($matakuliah as $matkul)
                                <option value="{{ $matkul->kode_matakuliah }}">{{ $matkul->nama_matakuliah }}</option>
                            @endforeach
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('kode_matakuliah')" />
                    </div>

                    <div class="max-w-xl">
                        <x-input-label for="nidn" value="DOSEN PENGAJAR"/>
                        <select name="nidn" id="nidn" required>
                            <option value=""></option>
                            @foreach ($dosen as $pengajar)
                                <option value="{{ $pengajar->nidn }}">{{ $pengajar->nama }}</option>
                            @endforeach
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('nidn')" />
                    </div>

                    <div class="max-w-xl">
                        <x-input-label for="kelas" value="KELAS"/>
                        <select name="kelas" id="kelas" required>
                            <option value=""></option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('kelas')" />
                    </div>

                    <div class="max-w-xl">
                        <x-input-label for="hari" value="HARI"/>
                        <select name="hari" id="hari" required>
                            <option value=""></option>
                            <option value="SENIN">SENIN</option>
                            <option value="SELASA">SELASA</option>
                            <option value="RABU">RABU</option>
                            <option value="KAMIS">KAMIS</option>
                            <option value="JUMAT">JUMAT</option>
                            <option value="SABTU">SABTU</option>
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('hari')" />
                    </div>

                    <div class="max-w-xl">
                        <x-input-label for="hari" value="HARI"/>
                        <input type="time" id="jam" name="jam" class="form-control" value="{{ old('jam', '07:00') }}" required>
                        <x-input-error class="mt-2" :messages="$errors->get('nidn')" />
                    </div>

                    <div class="flex items-center gap-4">
                         <a class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-white"
                        href="{{ route('jadwal.index') }}">Cancel</a>
                        <x-primary-button name="save_and_create" value="true">Save & Create Another</x-primary-button>
                        <x-primary-button name="save" value="true">Save</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>