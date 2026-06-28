<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dosen') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- START OF CRUD BUTTON CONTAINER -->
            @if (Auth::user()->role == 'admin') 
                <div class="mb-6">
                    <a class="inline-flex items-center px-4 py-2 bg-white border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-200"
                    href="{{ route('dosen.create') }}">Tambah Dosen</a>
                </div>
            @endif
            <!-- END OF CRUD BUTTON CONTAINER -->

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Data Dosen") }}
                </div>

                <!-- START OF TABEL-->

                    <!--COLLUMN-->
                <x-table>
                    <x-slot name="header">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>nidn</th>
                            @if (Auth::user()->role == 'admin')
                                <th>Action</th>
                            @endif
                        </tr>
                    </x-slot>

                        <!--ROW-->
                    @php $num=1; @endphp
                    @foreach($dosen as $dosens)
                        <tr>
                            <td>{{ $num++ }}</td>
                            <td>{{ $dosens->nama }}</td>
                            <td>{{ $dosens->nidn }}</td>

                            @if (Auth::user()->role == 'admin')
                                <td class="flex gap-2">
                                    <a href="{{ route('dosen.edit', $dosens->nidn) }}" class="inline-flex items-center px-4 py-2 bg-white border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-200"> 
                                    Edit 
                                    </a>
                                    <!--DELETE BUTTON BELLOW -->
                                    <form action="{{ route('dosen.destroy', $dosens->nidn) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                        <button class="inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-600"
                                         onclick="return confirm('yakin ingin menghapus buku ini?')">Hapus</button>
                                    </form>
                                    <!--END OF DELETE BUTTON-->
                                </td>
                            @endif

                        </tr>
                    @endforeach
            </x-table>
            <!-- END OF TABEL-->
            </div>
        </div>
    </div>
</x-app-layout>
