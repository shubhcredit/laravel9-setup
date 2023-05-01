<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Inputfile extends Component
{
    public $name;
    public $label;
    public $value;
    public $height;
    public $col;
    public $required;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name,$label=null,$value=null,$height=null,$col=12,$required=null)
    {
        $this->name=$name;
        $this->label=$label;
        $this->value=$value;
        $this->height=$height;
        $this->col=$col;
        $this->required=$required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.inputfile');
    }
}
