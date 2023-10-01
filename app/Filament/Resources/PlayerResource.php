<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PlayerResource\Pages;
use App\Filament\Resources\PlayerResource\RelationManagers;
use App\Models\Player;
use App\Models\PlayerCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PlayerResource extends Resource
{
    protected static ?string $model = Player::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
         
        return $form
            ->schema([
                Section::make('Players Information')
                    ->description('Information furnished here must be according to the Nationality Proof - Aadhar, Date of Birth Certificate, Passport or PAN')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                        ->label('Full Name')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Textarea::make('address')
                        ->label('Permanent Address')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('fathername')
                        ->label('Father\'s Name')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('mothername')
                        ->label('Mother\'s Name')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\DatePicker::make('dob')
                        ->label('Date of Birth')
                        ->required(),
                    Forms\Components\FileUpload::make('photo_url')
                        ->label('Photo')
                        ->image()
                        ->imageEditor(),
    
                    ])->columns(2),

                Section::make('Contact & Communication Details')
                    ->description('Information furnished here must be according to the Nationality Proof - Aadhar, Date of Birth Certificate, Passport or PAN')
                    ->schema([
                
                        Forms\Components\TextInput::make('phone')
                            ->label('Contact Number')
                            ->required()
                            ->tel()
                            ->maxLength(255),
        
                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                    ])->columns(2),


                Section::make('Contract Details')
                    ->description('Contract details according to the player status.')
                    ->schema([
        
                        Forms\Components\TextInput::make('aiffcrsid')
                            ->label('AIFF CRS ID')
                            ->required(),
        
                        Forms\Components\Select::make('playercategory_id')
                            ->relationship(name: 'playercategory', titleAttribute: 'name')
                            ->native(false)
                            ->label('Player Category')
                            ->required(),
        
                        Forms\Components\DatePicker::make('contract_start')
                            ->label('Contract Start Date')
                            ->required(),
        
                        Forms\Components\DatePicker::make('contract_end')
                            ->label('Contract End Date')
                            ->required(),
        
                        Forms\Components\TextInput::make('contract_amount')
                            ->label('Contract Amount')
                            ->numeric()
                            ->inputMode('decimal')
                            ->required(),
                    ])->columns(2),
            ]);
            
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('playercategory.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListPlayers::route('/'),
            'create' => Pages\CreatePlayer::route('/create'),
            'edit' => Pages\EditPlayer::route('/{record}/edit'),
        ];
    }    
}
