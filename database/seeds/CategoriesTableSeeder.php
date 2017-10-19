<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            [
                'name' => 'PHP', 'description' => 'Desenvolvimento Web'
            ],
            [
                'name' => 'JavaScript', 'description' => 'Desenvolvimento Web'
            ],
            [
                'name' => 'Java', 'description' => 'Desenvolvimento Web'
            ],
            [
                'name' => 'Ajax', 'description' => 'Desenvolvimento Web'
            ],
        ]);
    }
}
