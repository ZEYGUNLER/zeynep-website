<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_id')
    ->label('Kategori')
    ->relationship('category', 'name') // İlişkiyi otomatik kurar
    ->searchable()
    ->preload()
    ->createOptionForm([ // İstersen buradan direkt yeni kategori bile ekleyebilirsin
        \Filament\Forms\Components\TextInput::make('name')
            ->required()
            ->maxLength(255),
    ])
    ->required(),
                    
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('locale')
                    ->required()
                    ->default('tr'),
                Textarea::make('content')
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->image(),
                Toggle::make('is_published')
                    ->required(),
                DatePicker::make('published_at'),
            ]);
    }
}
