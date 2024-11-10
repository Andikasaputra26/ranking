<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Nilai;
use App\Models\Siswa;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use App\Filament\Resources\NilaiResource\Pages;
use Illuminate\Support\Facades\DB;

class NilaiResource extends Resource
{
    protected static ?string $model = Nilai::class;

    protected static ?string $navigationGroup = 'Data';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('siswa_id') // Dropdown untuk memilih siswa
                    ->label('Nama Siswa')
                    ->options(Siswa::all()->pluck('nama_siswa', 'id'))
                    ->required(),

                TextInput::make('ipa') // Input untuk nilai IPA
                    ->label('Nilai IPA')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100),

                TextInput::make('matematika') // Input untuk nilai Matematika
                    ->label('Nilai Matematika')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100),

                TextInput::make('biologi') // Input untuk nilai Biologi
                    ->label('Nilai Biologi')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('siswa.nama_siswa')->label('Nama Siswa'),
                TextColumn::make('ipa')->label('Nilai IPA'),
                TextColumn::make('matematika')->label('Nilai Matematika'),
                TextColumn::make('biologi')->label('Nilai Biologi'),

                TextColumn::make('total_nilai')
                    ->label('Total Nilai')
                    ->formatStateUsing(function ($record) {
                        return $record->ipa + $record->matematika + $record->biologi;
                    }),

                TextColumn::make('ranking')
                    ->label('Peringkat')
                    ->formatStateUsing(function ($record) {
                        $totalNilai = $record->ipa + $record->matematika + $record->biologi;

                        $rank = Nilai::orderByDesc(DB::raw('ipa + matematika + biologi'))
                            ->get();

                        $ranking = $rank->search(function ($item) use ($totalNilai) {
                            return ($item->ipa + $item->matematika + $item->biologi) == $totalNilai;
                        });

                        return $ranking + 1;
                    }),
            ])
            ->filters([
            ])
            ->actions([
            ]);
    }

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNilais::route('/'),
            'create' => Pages\CreateNilai::route('/create'),
            'edit' => Pages\EditNilai::route('/{record}/edit'),
        ];
    }
}
