<?php

namespace App\Filament\Resources\Comments;

use App\Filament\Resources\Comments\Pages;
use App\Models\Comment;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class CommentResource extends Resource
{
    protected static ?string $model = Comment::class;
    
    // Menüde görünecek isim
    protected static ?string $navigationLabel = 'Yorumlar';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('name')
                    ->label('İsim')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Textarea::make('body')
                    ->label('Yorum')
                    ->required()
                    ->columnSpanFull(),

                    Forms\Components\Toggle::make('is_approved')
                ->label('Yorum Onaylandı mı?') // Etiket
                ->onColor('success') // Açıkken yeşil olsun
                ->offColor('danger') // Kapalıyken kırmızı olsun
                ->default(false), // Varsayılan olarak onaysız gelsin
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Yazar'),
            
            // 👇 LİSTEDE ONAY DURUMUNU GÖSTEREN SİMGE
            Tables\Columns\IconColumn::make('is_approved')
                ->label('Onay Durumu')
                ->boolean(), // Tik veya Çarpı olarak gösterir
                
            Tables\Columns\TextColumn::make('created_at')->dateTime(),
                TextColumn::make('name')
                    ->label('İsim')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('body')
                    ->label('Yorum')
                    ->limit(50)
                    ->searchable(),

                TextColumn::make('created_at')
                    ->label('Tarih')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                // 🛑 Silme butonlarını kaldırdık (Hata riskini sıfırladık)
            ])
            ->bulkActions([
                // 🛑 Toplu işlemleri de kaldırdık
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
            'index' => Pages\ListComments::route('/'),
            'create' => Pages\CreateComment::route('/create'),
            'edit' => Pages\EditComment::route('/{record}/edit'),
        ];
    }
}