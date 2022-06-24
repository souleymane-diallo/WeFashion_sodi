<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Size;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Storage::disk('local')->delete(Storage::allFiles());

        Category::factory()->create([
            'name' => 'Homme'
        ]);
        Category::factory()->create([
            'name' => 'Femme'
        ]);

        Size::factory()->create([
            'name' => 'XS'
        ]);
        Size::factory()->create([
            'name' => 'S'
        ]);
        Size::factory()->create([
            'name' => 'M'
        ]);
        Size::factory()->create([
            'name' => 'L'
        ]);
        Size::factory()->create([
            'name' => 'XL'
        ]);

        Product::factory(80)->create()->each(function ($product){

            $category = Category::find(rand(1,2));

            $product->category()->associate($category);

            $product->save();

            $folder = $product->category_id == 1 ? 'hommes' : 'femmes';

            $link = Str::random(12). '.jpg';

            $file = file_get_contents(public_path('image_source/' . $folder . '/' . rand(1, 10) . '.jpg'));
            Storage::disk('local')->put('images/'.$link, $file);

            $product->picture()->create([
                'title' => 'Default', // valeur par défaut
                'link' => $link
            ]);


            $sizes =Size::pluck('id')->shuffle()->slice(0,rand(1,5))->all();

            $product->sizes()->attach($sizes);
        });

    }
}
