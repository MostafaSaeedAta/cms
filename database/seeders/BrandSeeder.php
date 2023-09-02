<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;
use Botble\Ecommerce\Models\Brand;
use Botble\Slug\Models\Slug;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Botble\Slug\Facades\SlugHelper;

class BrandSeeder extends BaseSeeder
{
    protected array $trans = [];

    public function run(): void
    {
        $this->uploadFiles('brands');

        $brands = [
            [
                'logo' => 'brands/1.png',
                'name' => 'Apply',
                'description' => '',
            ],
            [
                'logo' => 'brands/2.png',
                'name' => 'Assus',
                'description' => '',
            ],
            [
                'logo' => 'brands/3.png',
                'name' => 'Samsung',
                'description' => '',
            ],
            [
                'logo' => 'brands/4.png',
                'name' => 'Sony',
                'description' => '',
            ],
            [
                'logo' => 'brands/5.png',
                'name' => 'Toshiba',
                'description' => '',
            ],
        ];

        Brand::truncate();
        Slug::where('reference_type', Brand::class)->delete();

        foreach ($brands as $key => $item) {
            $item['order'] = $key;
            $item['is_featured'] = true;
            $brand = Brand::create($item);

            Slug::create([
                'reference_type' => Brand::class,
                'reference_id' => $brand->id,
                'key' => Str::slug($brand->name),
                'prefix' => SlugHelper::getPrefix(Brand::class),
            ]);
        }

        DB::table('ec_brands_translations')->truncate();

        foreach ($brands as $index => $item) {
            $item = Arr::only($item, ['name', 'description']);
            $item['name'] = Arr::get($this->trans, $item['name'], $item['name']);
            $item['description'] = Arr::get($this->trans, $item['description'], $item['description']);
            $item['lang_code'] = 'vi';
            $item['ec_brands_id'] = $index + 1;

            DB::table('ec_brands_translations')->insert($item);
        }
    }
}
