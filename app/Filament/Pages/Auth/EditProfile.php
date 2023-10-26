<?php

namespace App\Filament\Pages\Auth;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Pages\Auth\EditProfile as BaseEditProfile;

class EditProfile extends BaseEditProfile
{

    protected static string $view = 'filament.pages.auth.edit-profile';

    protected static string $layout = 'filament-panels::components.layout.index';


    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informações Pessoais')
                ->aside()
                ->schema([
                    $this->getNameFormComponent(),
                    $this->getEmailFormComponent(),
                    $this->getPasswordFormComponent(),
                    $this->getPasswordConfirmationFormComponent()
                ])

            ]);
    }

    public static function getSlug(): string
    {
        return static::$slug ?? 'me';
    }
}
