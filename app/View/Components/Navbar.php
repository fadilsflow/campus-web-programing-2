<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class Navbar extends Component
{
    public $customer;
    
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->customer = Auth::guard('customer')->user();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar', [
            'customer' => $this->customer
        ]);
    }
}
