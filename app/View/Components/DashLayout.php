<?php

namespace App\View\Components;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\View\Component;

class DashLayout extends Component
{
    public function __construct(
        protected string|null $title = "Dashboard",
        protected readonly string|null $header = null,
        protected readonly string|null $subheader = null,
        protected readonly string|null $description = null,
    ) {}

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): \Illuminate\Contracts\Foundation\Application|Factory|View|Application
    {
        return view('layouts.dash')
            ->with([
                'title' => $this->title,
                'header' => $this->header,
                'subhead' => $this->subheader,
                'description' => $this->description,
            ]);
    }
}
