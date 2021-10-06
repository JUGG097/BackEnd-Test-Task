<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Category::truncate();
        $csvFile = fopen(public_path("data/product.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== false) {
            if (!$firstline) {
                Product::create([
                    "id" => $data["0"],
                    "name" => $data["6"],
                    "inlet" => $data["7"],
                    "outlet" => $data["8"],
                    "angle_in_deg" => $data["10"],
                    "material" => $data["13"],
                    "bar" => $data["14"],
                    "colour" => $data["17"],
                    "status" => $data["19"],
                    "url_key" => $data["20"],
                    "visibility" => $data["21"],
                    "clearance" => $data["22"],
                    "max_temp" => $data["23"],
                    "description" => $data["24"],
                    "short_description" => $data["25"],
                    "tech_spec_1" => $data["26"],
                    "is_featured" => $data["33"],
                    "featured_position" => $data["34"],
                    "priority" => $data["50"],
                    "price" => $data["66"],
                    "special_price" => $data["67"],
                    "categories" => $data["78"],
                    "stock_status" => $data["92"],
                    "related_products" => $data["93"],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
