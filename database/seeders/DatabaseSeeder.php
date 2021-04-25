<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Provider\Lorem;
use Faker\Provider\Text;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->categories();
        $this->users();
        $this->posts();
    }

    public function categories(): void
    {
        DB::table('categories')->insert([
            'name' => 'Категория - 1'
        ]);
        DB::table('categories')->insert([
            'name' => 'Категория - 2'
        ]);
    }

    public function users(): void
    {
       DB::table('users')->insert([
            'name' => 'Иванов Дмитрий',
            'email' => 'ivan@mail.com',
            'password' => Hash::make('12345678'),
        ]);
        DB::table('users')->insert([
            'name' => 'Борисов Виктор',
            'email' => 'viktor@mail.com',
            'password' => Hash::make('12345678'),
        ]);
    }

    public function posts(): void
    {
        for ($i = 0; $i<40; $i++) {

            DB::table('posts')->insert([
                'name' => Lorem::text(40),
                'text' => Lorem::text(600),
                'category_id' => rand(1, 2),
                'user_id' => rand(1, 2)
            ]);

            $i++;
        }
    }
}
