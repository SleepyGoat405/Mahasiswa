<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MahasiswaResource\Pages;
use App\Filament\Resources\MahasiswaResource\RelationManagers;
use App\Models\Mahasiswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MahasiswaResource extends Resource
{
    protected static ?string $model = Mahasiswa::class;
    protected static ?string $navigationLabel = 'Mahasiswa';
    protected static ?string $pluralModelLabel = 'Mahasiswa';
    protected static ?string $modelLabel = 'Mahasiswa';
    protected static ?string $slug = 'mahasiswa';
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'People';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nim')
                    ->label('NIM')
                    ->required()
                    ->unique(Mahasiswa::class),

                TextInput::make('nama')
                    ->label('Nama')
                    ->required(),

                TextInput::make('tempat_lahir')
                    ->label('Tempat Lahir')
                    ->required(),

                DatePicker::make('tanggal_lahir')
                    ->label('Tanggal Lahir')
                    ->required(),

                Select::make('kode_prodi')
                    ->label('Program Studi')
                    ->relationship('prodi', 'nama_prodi')
                    ->required(),

                Select::make('nip')
                    ->label('Dosen Pembimbing')
                    ->relationship('dosen', 'nama')
                    ->nullable(),

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->unique(Mahasiswa::class),

                TextInput::make('no_hp')
                    ->label('Nomor HP')
                    ->required(),

                TextInput::make('tahun_masuk')
                    ->label('Tahun Masuk')
                    ->required(),

                Select::make('jenis_kelamin')
                    ->label('Jenis Kelamin')
                    ->options([
                        'Laki-Laki' => 'Laki-Laki',
                        'Perempuan' => 'Perempuan',
                    ])
                    ->required(),

                TextInput::make('agama')
                    ->label('Agama')
                    ->required(),

                TextInput::make('asal')
                    ->label('Asal')
                    ->required(),

                TextInput::make('alamat')
                    ->label('Alamat')
                    ->required(),

                FileUpload::make('foto_profil')
                    ->label('Foto Profil')
                    ->image()
                    ->directory('mahasiswa-foto')
                    ->nullable(),

                TextInput::make('password')
                    ->label('Password')
                    ->password()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nim')->label('NIM'),
                TextColumn::make('nama')->label('Nama'),
                TextColumn::make('tempat_lahir')->label('Tempat Lahir'),
                TextColumn::make('tanggal_lahir')->label('Tanggal Lahir'),
                TextColumn::make('prodi.nama_prodi')->label('Program Studi'),
                TextColumn::make('dosen.nama')->label('Dosen Pembimbing')->sortable(),
                TextColumn::make('email')->label('Email'),
                TextColumn::make('no_hp')->label('Nomor HP'),
                TextColumn::make('tahun_masuk')->label('Tahun Masuk'),
                TextColumn::make('jenis_kelamin')->label('Jenis Kelamin'),
                TextColumn::make('agama')->label('Agama'),
                TextColumn::make('asal')->label('Asal'),
                TextColumn::make('alamat')->label('Alamat'),
            ])
            ->filters([])
            ->actions([]);
    }


    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMahasiswas::route('/'),
            'create' => Pages\CreateMahasiswa::route('/create'),
            'edit' => Pages\EditMahasiswa::route('/{record}/edit'),
        ];
    }
}
