<?php
 
namespace App\Filament\Pages;

use App\Models\Siswa;
 
class Dashboard extends \Filament\Pages\Dashboard
{
    protected static ?string $title = 'Beranda';
    protected static ?string $navigationIcon = 'heroicon-o-home';

    public $jumlahSiswa;
    
    public function mount()
    {
        // Ambil jumlah siswa dari database
        $this->jumlahSiswa = Siswa::count();
    }

    
}