<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Exception;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Facades\Filament;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Notifications\Notification;
use Filament\Pages\Concerns;
use Filament\Pages\SimplePage;
use Filament\Panel;
use Filament\Support\Exceptions\Halt;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rules\Password;

class EditProfile extends \Filament\Pages\Auth\EditProfile
{
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                $this->getUserNameFormComponent(),
                // $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
            ]);
    }

    protected function getUserNameFormComponent(): Component
    {
        return TextInput::make('username')
            ->label('username')
            ->required()
            ->autocomplete()
            ->autofocus();
    }
}
