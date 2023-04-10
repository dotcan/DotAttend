<?php

namespace App\View\Components;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\View\Component;

class AdminLayout extends Component
{
    public function __construct(
        private readonly string|null $title = "Admin Dashboard",
        private readonly string|null $header = null,
        private readonly string|null $subheader = null,
        private readonly string|null $description = null,
    ) {}

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): \Illuminate\Contracts\Foundation\Application|Factory|View|Application
    {
        return view('layouts.admin')
            ->with([
                'title' => $this->title,
                'header' => $this->header,
                'subhead' => $this->subheader,
                'description' => $this->description,
            ]);
    }
}
