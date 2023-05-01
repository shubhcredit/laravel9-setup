<?php

namespace App\View\Components\form;

use Illuminate\View\Component;

class InputEnum extends Component
{
    public $label;
    public $name;
    public $arr;
    public $selected;
    public $col;
    public $required;
    

   public function __construct($name,$arr,$label=null,$selected=null,$col=12,$required=null)
   {
       $this->label=$label;
       $this->name=$name;
       $this->arr=$arr;
       $this->selected=$selected;
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
        return view('components.form.input-enum');
    }
}
