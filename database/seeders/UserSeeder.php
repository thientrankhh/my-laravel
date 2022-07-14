<?php
namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'      => 'admin',
                'email'     => 'admin@gmail.com',
                'password'  => bcrypt('123456'),
                'role_id'   => Role::$roles['Admin']
            ],
            [
                'name'      => 'thientrankhh',
                'email'     => 'thientrankhh@gmail.com',
                'password'  => bcrypt('123456'),
                'role_id'   => Role::$roles['User']
            ]
        ]);
    }
}
