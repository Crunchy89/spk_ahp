<?php

namespace Database\Seeders;

use App\Models\AksesMenu;
use App\Models\Menu;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->role = 'Admin';
        $role->save();
        User::create([
            'username' => 'Admin',
            'password' => Hash::make('makannasi'),
            'role_id' => $role->id
        ]);
        $menu = new Menu();
        $menu->title = 'Admin Menu';
        $menu->icon = 'fas fa-user';
        $menu->urutan = 1;
        $menu->save();
        $data = [
            [
                'title' => 'Manajemen Role',
                'link' => 'admin/role',
                'urutan' => 1,
                'id_parent' => $menu->id
            ],
            [
                'title' => 'Manajemen Pengguna',
                'link' => 'admin/user',
                'urutan' => 2,
                'id_parent' => $menu->id
            ],
            [
                'title' => 'Manajemen Menu',
                'link' => 'admin/menu',
                'urutan' => 3,
                'id_parent' => $menu->id
            ],
            [
                'title' => 'Manajemen Akses',
                'link' => 'admin/akses',
                'urutan' => 4,
                'id_parent' => $menu->id
            ],
        ];
        Menu::insert($data);
        AksesMenu::create([
            'role_id' => $role->id,
            'menu_id' => $menu->id
        ]);
    }
}
