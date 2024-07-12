<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Layout extends Component
{
    /**
     * Création d'une nouvelle instance du composant.
     */
    public function __construct(public string $title = '')
    {
        // Si un titre est fourni, il est concaténé avec le nom de l'application configuré, sinon, seul le nom de l'application est utilisé.
        $this->title = config('app.name') . ($title ? "| $title" : "");
    }

    /**
     * Obtenir la vue / le contenu qui représente le composant.
     */
    public function render(): View|Closure|string
    {
        // Retourne la vue 'layouts.default' pour ce composant
        return view('layouts.default');
    }
}
