<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Inputmultifile extends Component
{
    public $name;
    public $label;
    public $value;
    public $height;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name,$label,$value=null,$height=null)
    {
        $this->name=$name;
        $this->label=$label;
        $this->value=$value;
        $this->height=$height;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.inputmultifile');
    }
}
