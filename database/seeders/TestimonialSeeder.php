<?php

namespace Database\Seeders;

use Botble\Base\Models\MetaBox as MetaBoxModel;
use Botble\Base\Supports\BaseSeeder;
use Botble\Testimonial\Models\Testimonial;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Botble\Base\Facades\MetaBox;

class TestimonialSeeder extends BaseSeeder
{
    public function run(): void
    {
        $this->uploadFiles('testimonials');

        $testimonials = [
            [
                'name' => 'Wade Warren',
                'company' => 'Louis Vuitton',
                'content' => 'Even factoring differences in body weight between children and adults into account.',
                'title' => 'Satisfied client testimonial',
            ],
            [
                'name' => 'Brooklyn Simmons',
                'company' => 'Nintendo',
                'content' => 'So yes, the alcohol (ethanol) in hand sanitizers can be absorbed through the skin, but no, it would not cause intoxication.',
                'title' => '98% of residents recommend us',
            ],
            [
                'name' => 'Jenny Wilson',
                'company' => 'Starbucks',
                'content' => 'Their blood alcohol levels rose to 0.007 to 0.02 o/oo (parts per thousand), or 0.7 to 2.0 mg/L.',
                'title' => 'Our success stories',
            ],
            [
                'name' => 'Albert Flores',
                'company' => 'Bank of America',
                'content' => 'So yes, the alcohol (ethanol) in hand sanitizers can be absorbed through the skin, but no, it would not cause intoxication.',
                'title' => 'This is simply unbelievable',
            ],
        ];

        Testimonial::truncate();
        DB::table('testimonials_translations')->truncate();
        MetaBoxModel::where('reference_type', Testimonial::class)->delete();

        foreach ($testimonials as $index => $item) {
            $item['image'] = 'testimonials/' . ($index + 1) . '.png';

            $testimonial = Testimonial::create(Arr::except($item, ['title']));

            MetaBox::saveMetaBoxData($testimonial, 'title', Arr::get($item, 'title'));
        }

        $translations = [
            [
                'name' => 'Wade Warren',
                'company' => 'Louis Vuitton',
                'content' => 'Even factoring differences in body weight between children and adults into account.',
                'title' => 'Satisfied client testimonial',
            ],
            [
                'name' => 'Brooklyn Simmons',
                'company' => 'Nintendo',
                'content' => 'So yes, the alcohol (ethanol) in hand sanitizers can be absorbed through the skin, but no, it would not cause intoxication.',
                'title' => '98% of residents recommend us',
            ],
            [
                'name' => 'Jenny Wilson',
                'company' => 'Starbucks',
                'content' => 'Their blood alcohol levels rose to 0.007 to 0.02 o/oo (parts per thousand), or 0.7 to 2.0 mg/L.',
                'title' => 'Our success stories',
            ],
            [
                'name' => 'Albert Flores',
                'company' => 'Bank of America',
                'content' => 'So yes, the alcohol (ethanol) in hand sanitizers can be absorbed through the skin, but no, it would not cause intoxication.',
                'title' => 'This is simply unbelievable',
            ],
        ];

        foreach ($translations as $index => $item) {
            $item['lang_code'] = 'vi';
            $testimonial = Testimonial::skip($index)->first();

            $item['testimonials_id'] = $testimonial->id;

            DB::table('testimonials_translations')->insert(Arr::except($item, ['title']));

            MetaBox::saveMetaBoxData($testimonial, $item['lang_code'] . '_title', Arr::get($item, 'title'));
        }
    }
}
