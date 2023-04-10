<?php

namespace App\View\Components;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\View\Component;

class AppLayout extends Component
{
    public function __construct(
        private readonly string|null $title = null,
    ) {}

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): \Illuminate\Contracts\Foundation\Application|Factory|View|Application
    {
        return view('layouts.app')
            ->with(['title' => $this->title]);
    }
}
