<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Jadwal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- START OF CRUD BUTTON CONTAINER -->
            @if (Auth::user()->role == 'admin')
                <div class="mb-6">
                    <a class="inline-flex items-center px-4 py-2 bg-white border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-200"
                    href="{{route('jadwal.create') }}">Tambah Jadwal</a><!--DONT FORGET THE HREF-->
                </div>
            @endif
            <!-- END OF CRUD BUTTON CONTAINER -->

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Data jadwal") }}
                </div>

                <!-- START OF TABEL-->

                    <!--COLLUMN-->
                <x-table>
                    <x-slot name="header">
                        <tr>
                            <th>#</th>
                            <th>id</th> <!-- autoinc box y --> 
                            <th>matakuliah</th> <!-- list box y -->
                            <th>dosen</th>  <!-- list box y -->
                            <th>kelas</th>  <!-- list box -->
                            <th>hari</th>   <!-- list box -->
                            <th>jam</th> 
                        </tr>
                    </x-slot>

                        <!--ROW-->
                    @php $num=1; @endphp
                    @foreach($jadwal as $kuliah)
                        <tr>
                            <td>{{ $num++ }}</td>
                            <td>{{ $kuliah->id }}</td>
                            <td>{{ $kuliah->matakuliah->nama_matakuliah }}</td>
                            <td>{{ $kuliah->dosen->nama ?? 'tidak ada dosen' }}</td>
                            <td>{{ $kuliah->kelas}}</td>
                            <td>{{ $kuliah->hari}}</td>
                            <td>{{ substr($kuliah->jam, 0, 5) }}</td>


                            @if (Auth::user()->role == 'admin')
                            <td class="flex gap-2">
                                <a href="{{ route('jadwal.edit', $kuliah->id) }}" class="inline-flex items-center px-4 py-2 bg-white border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-200"> 
                                Edit 
                                </a>
                                <!--DELETE BUTTON BELLOW -->
                                <form action="{{ route('jadwal.edit', $kuliah->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                    <button class="inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-600"
                                        onclick="return confirm('yakin ingin menghapus jadwal ini?')">Hapus</button>
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
