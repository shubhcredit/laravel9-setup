<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Customdelete extends Component
{
    public $cstable;
    public $csidcol;
    public $csid;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($cstable, $csidcol,$csid)
    {
        $this->cstable=$cstable;
        $this->csidcol=$csidcol;
        $this->csid=$csid;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.customdelete');
    }
}
