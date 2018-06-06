<?php

use Database\traits\TruncateTable;
use Database\traits\DisableForeignKeys;
use Illuminate\Database\Seeder;

class UsersRolesSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate('users_roles');

        $data = [
            'admin.laravel@labs64.com' => ['administrator', 'authenticated'],
            'admin@admin.com' => ['administrator', 'authenticated'],
            'stella@admin.com' => ['administrator', 'authenticated'],
            'gabriele@admin.com' => ['administrator', 'authenticated'],
            'matteo@admin.com' => ['administrator', 'authenticated'],
            'manuel@admin.com' => ['administrator', 'authenticated'],
            'patrizio@admin.com' => ['administrator', 'authenticated'],
            'oleeeh@admin.com' => ['administrator', 'authenticated'],
            'lucrezia@admin.com' => ['administrator', 'authenticated'],
            'damiano@admin.com' => ['administrator', 'authenticated'],
            'claudio@admin.com' => ['administrator', 'authenticated'],
            'alessio@admin.com' => ['administrator', 'authenticated'],
            'simone@admin.com' => ['administrator', 'authenticated'],
            'demo.laravel@labs64.com' => 'authenticated',
        ];

        foreach ($data as $email => $role) {
            /** @var  $user \App\Models\Auth\User\User */
            $user = \App\Models\Auth\User\User::whereEmail($email)->first();

            if (!$user) continue;

            $role = !is_array($role) ? [$role] : $role;

            $roles = \App\Models\Auth\Role\Role::whereIn('name', $role)->get();

            $user->roles()->attach($roles);
        }

        $this->enableForeignKeys();
    }
}
