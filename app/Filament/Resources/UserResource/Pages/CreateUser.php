<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Exceptions\Halt;
use Illuminate\Database\Eloquent\Model;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    public ?string $name = null;



    // public function mount(): void
    // {
    //     $this->form->fill(
    //         [
    //             'name' =>
    //         ]
    //     );
    // }

    // public function mount(User $user): void
    // {
    //     $this->form->fill($user->toArray());
    // }


    // protected function createRecordAndCallHooks(array $data): void
    // {
    //     $this->callHook('beforeCreate');

    //     $this->record = $this->handleRecordCreation($data);

    //     $this->form->model($this->getRecord())->saveRelationships();

    //     $this->callHook('afterCreate');


    // }

    public function create(bool $another = false): void
    {
        $this->authorizeAccess();

        try {
            $this->callHook('beforeValidate');

            $data = $this->form->getState();

            $this->callHook('afterValidate');

            $data = $this->mutateFormDataBeforeCreate($data);

            /** @internal Read the DocBlock above the following method. */
            $this->createRecordAndCallHooks($data);
        } catch (Halt $exception) {
            return;
        }

        // dd($data);
        /** @internal Read the DocBlock above the following method. */
        $this->sendCreatedNotificationAndRedirect(shouldCreateAnotherInsteadOfRedirecting: $another);

        if($another){
            $this->form->fill(
                [
                    'name' => $data['name']
                ]
            );
        }
    }

}
