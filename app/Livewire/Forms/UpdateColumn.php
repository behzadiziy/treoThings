<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class UpdateColumn extends Form
{
    #[Validate('required')]
    public string $title = '';
}
