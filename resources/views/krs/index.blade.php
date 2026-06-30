<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kartu Rencana Studi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- START OF CREATE BUTTON CONTAINER -->
            @if (Auth::user()->role == 'admin') 
                <div class="mb-6">
                    <a class="inline-flex items-center px-4 py-2 bg-white border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-200"
                    href="{{ route('krs.create') }}">Tambah data KRS mahasiswa</a>
                </div>
            @endif

            @if (Auth::user()->role != 'admin') 

            <!--HERE TO INCREASE MAX SKS-->
                @php $curr = 0; $max = 10; @endphp
            <!---------------------------->
            
                @foreach ($krs as $kartu){}
                    @php
                        $curr += $kartu->matakuliah->sks;
                            @endphp
                @endforeach
                
                @if ($curr < $max) 
                    <div class="mb-6">
                        <a class="inline-flex items-center px-4 py-2 bg-white border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-200"
                        href="{{ route('krs.create') }}">Ambil Matakuliah</a>
                    </div>
                @endif

                @if ($curr >= $max) 
                    <div class="mb-6">
                        <p class="inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500"
                        href="">sudah memenuhi batas sks Max = {{ $max }} , Hapus Matakuliah untuk mengambil kembali sks</p>
                    </div>
                @endif
            @endif
            <!-- END OF CREATE BUTTON CONTAINER -->

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("MATA KULIAH YANG DIAMBIL 📝") }}
                </div>

                <!-- START OF TABEL-->

                <!--COLLUMN-->
                <x-table>
                    <x-slot name="header">
                        <tr>
                            <th>#</th>
                            @if (Auth::user()->role == 'admin')
                                <th>NPM</th>
                            @endif
                            <th>Mata kuliah</th>
                            <th>sks</th>
                            @if (Auth::user()->role == 'admin')
                                <th>Action</th>
                            @endif
                        </tr>
                    </x-slot>

                        <!--ROW-->
                    @php $num=1; @endphp
                    @foreach($krs as $kartu)
                        <tr>
                            <td>{{ $num++ }}</td>
                            @if (Auth::user()->role == 'admin')
                                <td>{{ $kartu->npm }}</td>
                            @endif
                            <td>{{ $kartu->matakuliah->nama_matakuliah }}</td>
                            <td>{{ $kartu->matakuliah->sks }}</td>

                                <td class="flex gap-2">
                                    <!--DELETE BUTTON BELLOW -->
                                    <form action="{{ route('krs.destroy', $kartu->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                        <button class="inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-600"
                                         onclick="return confirm('yakin ingin menghapus buku ini?')">Hapus</button>
                                    </form>
                                    <!--END OF DELETE BUTTON-->
                                </td>
                        </tr>
                    @endforeach
                </x-table>
                <!-- END OF TABEL-->
            </div>
        </div>
    </div>
</x-app-layout>
