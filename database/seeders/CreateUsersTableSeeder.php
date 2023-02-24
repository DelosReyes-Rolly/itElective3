<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
   
class CreateUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'is_admin'=>'1',
            'password'=> bcrypt('12345678'),
        ]);

        User::create([
            'name'=>'User',
            'email'=>'user@gmail.com',
            'is_admin'=>'0',
            'password'=> bcrypt('12345678'),
        ]);
    }
}
