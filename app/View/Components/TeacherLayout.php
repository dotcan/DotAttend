<?php

namespace App\View\Components;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class TeacherLayout extends DashLayout
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): \Illuminate\Contracts\Foundation\Application|Factory|View|Application
    {
        $this->title = 'Teacher Dashboard';
        return view('layouts.teacher')
            ->with([
                'title' => $this->title,
                'header' => $this->header,
                'subhead' => $this->subheader,
                'description' => $this->description,
            ]);
    }
}
