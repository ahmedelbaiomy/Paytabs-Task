<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mainCategories = ['Category A','Category B','Category C'];
        foreach ($mainCategories as $category) {
            Category::create([
                'name'=>$category
            ]);
        }

        $categories=Category::all();
        $subCategories = 10;
        for($i =0 ; $i<$subCategories; $i++){
            Category::create([
                'name'=>'Sub '.Str::random(5),
                'parent_id'=>rand(1,3)
            ]);   
        }


        $subcategories=Category::where('parent_id','!=',null)->get();
        $subSubCategories = 40;
        for($i =0 ; $i<$subSubCategories; $i++){
            Category::create([
                'name'=>'Sub Sub '.Str::random(5),
                'parent_id'=>rand(4,13)
            ]);   
        }

    }
}
