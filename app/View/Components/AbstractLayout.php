<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

abstract class AbstractLayout extends Component
{
    /**
     * Create a new component instance.
     */

     public function __construct(

        public string $title = '',
        public string $action = '',
        public string $submitMessage = 'Soumettre',
        )
    {
        // Si un titre est fourni, il est concaténé avec le nom de l'application configuré, sinon, seul le nom de l'application est utilisé.
        $this->title = config('app.name') . ($title ? "| $title" : "");
    }

}
