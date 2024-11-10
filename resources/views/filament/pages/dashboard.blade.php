<x-filament::page>
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 xl:grid-cols-3">
        <!-- Card untuk Menampilkan Jumlah Siswa -->
        <div class="p-4 bg-white shadow rounded-lg">
            <div class="text-lg font-semibold">Total Siswa</div>
            <div class="text-3xl mt-2">{{ $jumlahSiswa }}</div>
        </div>
    </div>
</x-filament::page>
