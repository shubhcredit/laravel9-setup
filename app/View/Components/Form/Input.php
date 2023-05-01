<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Input extends Component
{
    public $name;
    public $label;
    public $type;
    public $value;
    public $col;
    public $maxlength;
    public $required;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( $name, $type="text", $required=null, $label=null,$value=null,$col=12,$maxlength=null)
    {
        $this->name=$name;
        $this->label=$label;
        $this->type=$type;
        $this->value=$value;
        $this->col=$col;
        $this->maxlength=$maxlength;
        $this->required=$required;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.input');
    }
}
