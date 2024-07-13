<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;

class DefaultLayout extends AbstractLayout
{

    /**
     * Obtenir la vue / le contenu qui représente le composant.
     */
    public function render(): View|Closure|string
    {
        // Retourne la vue 'layouts.default' pour ce composant
        return view('layouts.default');
    }
}
