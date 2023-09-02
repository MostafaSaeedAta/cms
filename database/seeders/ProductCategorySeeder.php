<?php

namespace Database\Seeders;

use Botble\Base\Models\MetaBox as MetaBoxModel;
use Botble\Base\Supports\BaseSeeder;
use Botble\Ecommerce\Models\ProductCategory;
use Botble\Slug\Models\Slug;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Botble\Base\Facades\MetaBox;
use Botble\Slug\Facades\SlugHelper;

class ProductCategorySeeder extends BaseSeeder
{
    /**
     * @var array
     */
    protected $trans = [
        'Desktop PC' => 'Máy tính để bàn',
        'Headphone' => 'Tai nghe',
        'Laptop' => 'Máy tính xách tay',
        'Mobile Phone' => 'Điện thoại di động',
        'Printer' => 'Máy in',
        'Books' => 'Sách',
        'Tablet' => 'Máy tính bảng',
        'USB Flash' => 'Ổ USB',
        'Game Mouse' => 'Chuột chơi game',
        'Security' => 'Bảo mật',
        'Watch' => 'Đồng hồ',
        'Scaner' => 'Máy quét',
    ];

    public function run(): void
    {
        $this->uploadFiles('product-categories');

        $categories = [
            1 => [
                'name' => 'Desktop PC',
            ],
            2 => [
                'name' => 'Headphone',
            ],
            3 => [
                'name' => 'Laptop',
            ],
            4 => [
                'name' => 'Mobile Phone',
            ],
            5 => [
                'name' => 'Printer',
            ],
            6 => [
                'name' => 'Books',
            ],
            7 => [
                'name' => 'Tablet',
            ],
            8 => [
                'name' => 'USB Flash',
            ],
            9 => [
                'name' => 'Game Mouse',
            ],
            10 => [
                'name' => 'Security',
            ],
            11 => [
                'name' => 'Watch',
            ],
            12 => [
                'name' => 'Scaner',
            ],
        ];

        ProductCategory::truncate();
        DB::table('ec_product_categories_translations')->truncate();
        Slug::where('reference_type', ProductCategory::class)->delete();
        MetaBoxModel::where('reference_type', ProductCategory::class)->delete();

        foreach ($categories as $index => $item) {
            $this->createCategoryItem($index, $item);
        }

        // Translations
        $count = 1;
        foreach ($categories as $translation) {
            $this->createCategoryItemTrans($count, $translation);
        }
    }

    /**
     * @param int $index
     * @param array $category
     * @param int $parentId
     */
    protected function createCategoryItem(int $index, array $category, int $parentId = 0): void
    {
        $category['is_featured'] = $index <= 12;
        $category['image'] = 'product-categories/' . $index . '.png';
        $category['parent_id'] = $parentId;
        $category['order'] = $index;
        $category['description'] = 'From year to year we strive to invent the most innovative technology that is used by both small enterprises and space enterprises.';

        if (Arr::has($category, 'children')) {
            $children = $category['children'];
            unset($category['children']);
        } else {
            $children = [];
        }

        $createdCategory = ProductCategory::create(Arr::except($category, ['icon']));

        Slug::create([
            'reference_type' => ProductCategory::class,
            'reference_id' => $createdCategory->id,
            'key' => Str::slug($createdCategory->name),
            'prefix' => SlugHelper::getPrefix(ProductCategory::class),
        ]);

        if (isset($category['icon'])) {
            MetaBox::saveMetaBoxData($createdCategory, 'icon', $category['icon']);
        }

        if ($children) {
            foreach ($children as $childIndex => $child) {
                $this->createCategoryItem($childIndex, $child, $createdCategory->id);
            }
        }
    }

    /**
     * @param int $count
     * @param array $translation
     * @return void
     */
    protected function createCategoryItemTrans(int &$count, array $translation): void
    {
        $translation = Arr::only($translation, ['name']);
        $translation['name'] = Arr::get($this->trans, $translation['name'], $translation['name']);
        $translation['lang_code'] = 'vi';
        $translation['ec_product_categories_id'] = $count;
        $translation['description'] = 'Từ năm này qua năm khác, chúng tôi cố gắng phát minh ra công nghệ tiên tiến nhất được cả các doanh nghiệp nhỏ và doanh nghiệp vũ trụ sử dụng.';

        DB::table('ec_product_categories_translations')->insert(Arr::except($translation, ['children']));

        $count++;

        if (Arr::get($translation, 'children')) {
            foreach ($translation['children'] as $child) {
                $this->createCategoryItemTrans($count, $child);
            }
        }
    }
}
