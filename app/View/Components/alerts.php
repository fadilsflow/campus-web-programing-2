<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alerts extends Component
{
    public $type;
    public $message;

    public function __construct($type = 'success', $message = '')
    {
        $this->type = $type;
        $this->message = $message;
    }

    public function render()
    {
        return view('components.alerts');
    }
}
