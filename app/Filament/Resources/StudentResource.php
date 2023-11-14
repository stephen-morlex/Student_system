<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Resources\StudentResource\RelationManagers;
use App\Models\School;
use App\Models\Section;
use App\Models\Student;
use App\Models\Subject;
use Filament\Forms;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('reg_no')->required()
                    ->maxLength(255)->label('Registration Number'),
                Forms\Components\TextInput::make('fname')->required()
                    ->maxLength(255)->label('First Name'),
                Forms\Components\TextInput::make('lname')->required()->label('Last Name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone_no')
                    ->maxLength(255),
                Select::make('school_id')
                    ->label('Student School')
                    ->options(School::all()->pluck('name', 'id'))
                    ->searchable()
                    ->required(),
                Select::make('section_id')
                    ->label('Subject Section')
                    ->options(Section::all()->pluck('name', 'id'))
                    ->searchable()
                    ->live(),
                Select::make('section_id')
                    ->label('Subject Section')
                    ->options(Section::all()->pluck('name', 'id'))
                    ->searchable()
                    ->live(),
                //  // CheckboxList::make('subjects')
                // //     ->relationship(name: 'subjects', titleAttribute: 'name')->columns(2)
                //  //    ->gridDirection('column')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('reg_no'),
                Tables\Columns\TextColumn::make('fname'),
                Tables\Columns\TextColumn::make('lname'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('phone_no'),
                Tables\Columns\TextColumn::make('school.name'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
