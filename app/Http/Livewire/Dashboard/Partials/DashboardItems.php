<?php

namespace App\Http\Livewire\Dashboard\Partials;

use \Illuminate\Http\Request;
use Livewire\Component;

class DashboardItems extends Component
{
    public $links;

    public function mount(Request $request )
    {

        $prefix = $request->segment(1);

        if (\Auth::user()->hasRole('instructor') && $prefix == 'instructor')
            $this->links = $this->instructorMenu();
        if (\Auth::user()->hasRole('admin') && $prefix == 'admin')
            $this->links = $this->adminMenu();
        elseif($prefix == 'student') {
            $this->links = $this->studentMenu();

            $this->links[] = [
                'title' => 'خروج',
                'href' => canReLogin($request) ? route('admin.reLogin') : route('signout'),
                'active' => false,
                'icon' => 'fas fa-door-open',
            ];
        }


    }

    public function studentMenu(): array
    {
        return [

            [
                'title' => 'دوره های من',
                'href' => '/student/courses',
                'icon' => 'fas fa-file-video',
                'active' => false,
            ],

            [
                'title' => ' کیف پول',
                'href' => '/student/wallet',
                'icon' => 'fas fa-wallet',
                'active' => false,
            ],


            [
                'title' => 'تاریخچه کیف پول',
                'href' => '/student/transactions',
                'icon' => 'fas fa-history',
                'active' => false,
            ],
            [
                'title' => 'مشخصات کاربری',
                'href' => '/student/profile',
                'icon' => 'fas fa-address-card',
                'active' => false,
            ],
            [
                'title' => 'تغییر پسورد',
                'href' => '/student/password',
                'icon' => 'fas fa-key',
                'active' => false,
            ],


        ];
    }


    public function instructorMenu(): array
    {
        return [

            [
                'title' => 'دوره های من',
                'href' => '/instructor/courses',
                'icon' => 'fas fa-file-video',
                'active' => false,
            ],

            [
                'title' => ' کیف پول',
                'href' => '/instructor/wallet',
                'icon' => 'fas fa-wallet',
                'active' => false,
            ],


            [
                'title' => 'تاریخچه کیف پول',
                'href' => '/instructor/transactions',
                'icon' => 'fas fa-history',
                'active' => false,
            ],
            [
                'title' => 'مشخصات کاربری',
                'href' => '/instructor/profile',
                'icon' => 'fas fa-address-card',
                'active' => false,
            ],
            [
                'title' => 'تغییر پسورد',
                'href' => '/instructor/password',
                'icon' => 'fas fa-key',
                'active' => false,
            ],
            [
                'title' => 'خروج',
                'href' => route('signout'),
                'icon' => 'fas fa-door-open',
                'active' => false,
            ],

        ];
    }


    public function adminMenu(): array
    {
        return [
            [
                'title' => 'داشبود',
                'href' => '/admin/dashboard/',
                'icon' => 'bi bi-ui-checks-grid fa-fw me-2',
                'active' => false,
            ],

            [
                'title' => 'مهارتجویان',
                'href' => '/admin/students/',
                'icon'=>'fas fa-users',
                'active' => false,
            ],

            [
                'title' => 'گزارش لاگ',
                'href' => '/admin/statistics/',
                'icon' => 'fas fa-user-secret',
                'active' => false,
            ],


        ];
    }


    public function render()
    {
        return view('livewire.dashboard.partials.dashboard-items')
            ->extends('layouts.eduport.master_dashboard')
            ->section('main');
    }
}
