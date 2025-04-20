<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Staff;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Post::factory(20) -> create();

        Staff::factory()->create([
            'name'  => 'Goutam Admin',
            'email' => 'goutamr362@gmail.com',
            "cell"  => "01755302053"
        ]);

        Staff::factory()->create([
            'name'  => 'Sujan Admin',
            'email' => 'sujan362@gmail.com',
            "cell"  => "01755302054"
        ]);



        
    }
}