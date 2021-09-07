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

        $lipstick_ws = [
            ['qty' => 12, 'price' => 7000],
            ['qty' => 24, 'price' => 6950],
            ['qty' => 48, 'price' => 6900],
            ['qty' => 108, 'price' => 6850],
            ['qty' => 240, 'price' => 6700],
            ['qty' => 480, 'price' => 6550],
            ['qty' => 780, 'price' => 6400],
            ['qty' => 1500, 'price' => 6200],
            ['qty' => 3000, 'price' => 6050],
            ['qty' => 4500, 'price' => 5950],
            ['qty' => 9000, 'price' => 5900],
        ];

        $clay_mask_ws = [
            ['qty' => 12, 'price' => 10500],
            ['qty' => 24, 'price' => 10000],
            ['qty' => 48, 'price' => 9800],
            ['qty' => 108, 'price' => 9600],
            ['qty' => 240, 'price' => 9400],
            ['qty' => 480, 'price' => 9200],
            ['qty' => 780, 'price' => 9000],
            ['qty' => 1500, 'price' => 8800],
            ['qty' => 3000, 'price' => 8600],
            ['qty' => 4500, 'price' => 8300],
            ['qty' => 9000, 'price' => 7900],
        ];

        $lipoil_ws = [
            ['qty' => 12, 'price' => 5765],
            ['qty' => 60, 'price' => 5245],
            ['qty' => 300, 'price' => 5170],
            ['qty' => 1500, 'price' => 5023],
            ['qty' => 4500, 'price' => 4800]
        ];

        $remover_ws = [
            ['qty' => 12, 'price' => 6650],
            ['qty' => 60, 'price' => 6055],
            ['qty' => 300, 'price' => 5970],
            ['qty' => 1500, 'price' => 5800],
            ['qty' => 4500, 'price' => 5540]
        ];

        $images = ["163103311847.webp", "163103316567.webp", "163103316678.webp", "163103316716.webp", "163103316730.jpg", "163103316725.webp"];

        Product::create([
            'code' => $this->generateUniqueCode(),
            'slug' => 'inle',
            'name' => 'INLE',
            'category_id' => 1,
            'description' => 'A mauve nude tone shade, the Inle is universally flattering—perfect for all kinds of skin tones. Experience a pumped-up version of your natural lip colour that stays within your comfort zone.',
            'price' => 8500,
            'wholesale' => json_encode($lipstick_ws),
            'images' => json_encode($images),
            'how_to_use' => 'Our super-light liquid lipsticks are really easy to apply and dry to a smooth, matte finish. Hydrated and exfoliated lips give the best results.',
            'features' => 'Easy-application',
            'ingredients' => 'Polyisobutene, Ethylhexyl Palmitate, Mineral Oil, Caprylic/Capric Triglyceride, Silica, Microcrystalline Wax, Phenoxyethanol, Caprylyl Glycol, Fragrance.',
            'weight' => '0.14 FL. OZ / 4 ML',
        ]);


        Product::create([
            'code' => $this->generateUniqueCode(),
            'slug' => 'burmese-dream-pink-clay-mask-satchel',
            'name' => 'Burmese Dream Pink Clay Mask Satchel',
            'category_id' => 2,
            'description' => 'Pink clay masks are widely regarded as being the best detoxifying masks on the market. Burmese Dreams Pink Clay Mask in a tube is infused with skin-friendly super ingredients like kakadu plum, centaurea cyanus flower, hyaluronic acid, kelp, witch hazel, and pomegranate to give the best radiance-boosting selfie-ready skin.',
            'price' => 12900,
            'wholesale' => json_encode($clay_mask_ws),
            'images' => json_encode($images),
            'ingredients' => 'Aqua, Kaolin, Propylene Glycol, Cetearyl Alcohol, Isohexadecane, Glycerin, Glyceryl Stearate, Butylene Glycol, PEG-100 Stearate'
        ]);


        Product::create([
            'code' => $this->generateUniqueCode(),
            'slug' => 'nourishing-lip-oil-babe',
            'name' => 'Nourishing Lip Oil - Babe',
            'category_id' => 6,
            'description' => 'A luxurious lip oil formula that combines the essence of almond oil with an oil-based treatment. The dome-shaped applicator makes application a dream!',
            'price' => 6500,
            'wholesale' => json_encode($lipoil_ws),
            'images' => json_encode($images),
            'features' => 'Nourishes and replenishes the lips',
            'ingredients' =>  'Polysiobutene, Paraffinum Liquidum, Ethylhexyl Palmitate, Capric Triglyceride, Isopropyl Palmitate, Silica Dimethylsilylate,',
        ]);


        Product::create([
            'code' => $this->generateUniqueCode(),
            'slug' => 'game-changer-makeup-remover',
            'name' => 'Game Changer Makeup Remover',
            'category_id' => 8,
            'description' => 'Game Changer is a sustainable alternative to single-use cotton pads. These are eco-consciously designed to reduce waste to the landfill.',
            'price' => 7500,
            'wholesale' => json_encode($remover_ws),
            'images' => json_encode($images),
        ]);
    }

    public function generateUniqueCode()
    {
        do {
            $code = random_int(0000, 9999);
        } while (Product::where("code", "=", $code)->first());

        return $code;
    }
}
