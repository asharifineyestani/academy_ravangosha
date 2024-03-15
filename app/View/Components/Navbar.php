<?php

namespace App\View\Components;

use App\Models\Menu;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $items;
    public $loggedMenu;

    public function __construct()
    {
        $this->items = Menu::query()
            ->where('group', 'navbar')
            ->get();


        $this->loggedMenu = [
            [
                'title' => 'داشبود',
                'href' => '/student/dashboard/',
                'active' => false,
                'icon' => 'bi bi-gear fa-fw me-2',
            ],
            [
                'title' => 'دوره های من',
                'href' => '/student/courses',
                'active' => false,
                'icon' => 'bi bi-gear fa-fw me-2',
            ],

            [
                'title' => ' کیف پول',
                'href' => '/student/wallet',
                'active' => false,
                'icon' => 'bi bi-gear fa-fw me-2',
            ],

            [
                'title' => 'تغییر پسورد',
                'href' => '/student/password',
                'active' => false,
                'icon' => 'bi bi-gear fa-fw me-2',
            ],

        ];


    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.navbar');
    }
}
