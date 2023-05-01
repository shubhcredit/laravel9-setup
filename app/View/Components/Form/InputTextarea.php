<?php

namespace App\View\Components\form;

use Illuminate\View\Component;

class InputTextarea extends Component
{
    
    public $name;
    public $label;
    public $rows;
    public $value;
    public $col;
    public $required;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name ,$rows=4, $label=null,$value=null,$col=12,$required=null)
    {
        $this->name=$name;
        $this->rows=$rows;
        $this->label=$label;
        $this->value=$value;
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
        return view('components.form.inputTextarea');
    }
}
