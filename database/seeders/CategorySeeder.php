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
        // Category::truncate();
        $csvFile = fopen(public_path("data/category.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== false) {
            if (!$firstline) {
                Category::create([
                    "id" => $data["0"],
                    "name" => $data["1"],
                    "url_key" => $data["2"],
                    "description" => $data["3"],
                    "image" => $data["4"],
                    "parent_id" => $data["5"],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
