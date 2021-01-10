<?php

namespace App\Http\Livewire;

use Livewire\Component;

/**
 * Class Counter
 * @package App\Http\Livewire
 */
class Counter extends Component
{
    public $count = 0;

    public function increment()
    {
        $this->count++;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('livewire.counter');
    }
}
