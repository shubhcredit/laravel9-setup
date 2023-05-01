<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Customswitch extends Component
{
    public $cstable;
    public $csidcol;
    public $csid;
    public $csstatuscol;
    public $csstatus;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($cstable, $csidcol,$csid,$csstatuscol,$csstatus)
    {
        $this->cstable=$cstable;
        $this->csidcol=$csidcol;
        $this->csid=$csid;
        $this->csstatuscol=$csstatuscol;
        $this->csstatus=$csstatus;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.customswitch');
    }
}
