<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class AddNewFriend extends Form
{
    #[Validate('required|email')]
    public string $email = '';
}
