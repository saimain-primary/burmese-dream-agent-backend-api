<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'slug' => 'lip-stick',
            'name' => 'Lip Stick',
            'group' => 1
        ]);
        Category::create([
            'slug' => 'clay-mask',
            'name' => 'Clay Mask',
            'group' => 1
        ]);
        Category::create([
            'slug' => 'foundation',
            'name' => 'Foundation',
            'group' => 1
        ]);
        Category::create([
            'slug' => 'powder',
            'name' => 'Powder',
            'group' => 1
        ]);
        Category::create([
            'slug' => 'body-scrub',
            'name' => 'Body Scrub',
            'group' => 1
        ]);

        Category::create([
            'slug' => 'lip-oil-normal',
            'name' => 'Lip Oil Normal',
            'group' => 2
        ]);
        Category::create([
            'slug' => 'lip-scrub',
            'name' => 'Lip Scrub',
            'group' => 2
        ]);
        Category::create([
            'slug' => 'remover',
            'name' => 'Remover',
            'group' => 2
        ]);
        Category::create([
            'slug' => 'lip-oil-gold-digger',
            'name' => 'Lip Oil Gold Digger',
            'group' => 2
        ]);
    }
}
