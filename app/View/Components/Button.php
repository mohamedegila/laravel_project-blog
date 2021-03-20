<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{

    public $class;
    public $rout;
    // public $content;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($class,$rout)
    {
        $this->class = $class;
        $this->rout = $rout;
        // $this->content = $content;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button');
    }
}
