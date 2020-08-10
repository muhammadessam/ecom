<?php

use App\Admin;
use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    public function run()
    {
        Admin::findOrFail(1)->roles()->sync(1);
    }
}
