<?php

namespace App\Http\Controllers\Maintenance;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\User;
use Spatie\Permission\Models\Role;

class DbController extends Controller
{


    public function updateNavbar()
    {
        $this->deleteMenuByGroup('navbar');


        foreach ($this->getNavbarItems() as $navbarItem) {
            Menu::query()
                ->create($navbarItem);
        }

        echo 'منوی بالا آپدیت شد.';
    }


    private function deleteMenuByGroup($group)
    {
        Menu::query()
            ->where('group', $group)
            ->delete();
    }


    private function getNavbarItems(): array
    {
        return [
            [
                'name' => 'برگ نخست',
                'href' => '/',
                'group' => 'navbar',
            ],
            [
                'name' => 'دوره ها',
                'href' => '/courses',
                'group' => 'navbar',
            ],

            [
                'name' => 'بلاگ',
                'href' => '/posts',
                'group' => 'navbar',
            ],

            [
                'name' => 'مدرس شوید',
                'href' => '/pages/solicitations',
                'group' => 'navbar',
            ],

            [
                'name' => 'درباره ما',
                'href' => '/pages/about',
                'group' => 'navbar',
            ],
            [
                'name' => 'تماس با ما',
                'href' => '/pages/contact',
                'group' => 'navbar',
            ]

        ];
    }


    public function assignRoleToAli()
    {
        $managerRole = Role::create(['name' => 'admin']);

        $ali = User::where('mobile','09128182951')->first();

        $ali->assignRole($managerRole);
    }
}
