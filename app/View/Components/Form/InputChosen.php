<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class InputChosen extends Component
{
    public $label;
    public $name;
    public $arr;
    public $val;
    public $option;
    public $selected;
    public $col;
    public $required;
    

   public function __construct($name,$arr,$label=null, $val=null, $option=null,  $selected=null,$col=6,$required=null)
   {
       $this->label=$label;
       $this->name=$name;
       $this->arr=$arr;
       $this->val=$val;
       $this->option=$option;
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
        return view('components.form.input-chosen');
    }
}
