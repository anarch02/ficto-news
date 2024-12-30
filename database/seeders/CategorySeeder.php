<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => [
                    'ru' => 'Техрологии',
                    'en' => 'Technologies',
                ],
                'seo_description' => [
                    'ru' => 'Новости и обзоры о технологиях, которые меняют мир. Статьи о гаджетах, софте и многое другое. (Выдуманный текст)',
                    'en' => 'News and reviews about technologies that change the world. Articles about gadgets, software, and much more. (Dummy text)',
                ],
                'seo_keywords' => [
                    'ru' => 'технологии, новости, обзоры',
                    'en' => 'technologies, news, reviews',
                ],
            ],
            [
                'name' => [
                    'ru' => 'Наука',
                    'en' => 'Science',
                ],
                'seo_description' => [
                    'ru' => 'Интересные факты и открытия в мире науки. Статьи о физике, химии, биологии и многое другое. (Выдуманный текст)',
                    'en' => 'Interesting facts and discoveries in the world of science. Articles about physics, chemistry, biology, and much more. (Dummy text)',
                ],
                'seo_keywords' => [
                    'ru' => 'наука, факты, открытия',
                    'en' => 'science, facts, discoveries',
                ],
            ],
            [
                'name' => [
                    'ru' => 'Политика',
                    'en' => 'Politics',
                ],
                'seo_description' => [
                    'ru' => 'Актуальные новости и аналитика в мире политики. Статьи о внутренней и внешней политике разных стран. (Выдуманный текст)',
                    'en' => 'Current news and analytics in the world of politics. Articles about domestic and foreign policy of different countries. (Dummy text)',
                ],
                'seo_keywords' => [
                    'ru' => 'политика, новости, аналитика',
                    'en' => 'politics, news, analytics',
                ],
            ],
            [
                'name' => [
                    'ru' => 'Спорт',
                    'en' => 'Sport',
                ],
                'seo_description' => [
                    'ru' => 'Свежие новости и обзоры в мире спорта. Статьи о футболе, баскетболе, хоккее и многое другое. (Выдуманный текст)',
                    'en' => 'Fresh news and reviews in the world of sports. Articles about football, basketball, hockey, and much more. (Dummy text)',
                ],
                'seo_keywords' => [
                    'ru' => 'спорт, новости, обзоры',
                    'en' => 'sport, news, reviews',
                ],
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
