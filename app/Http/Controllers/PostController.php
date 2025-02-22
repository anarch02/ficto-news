<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Routing\Controller;
use GeminiAPI\Client;
use GeminiAPI\Resources\ModelName;
use GeminiAPI\Resources\Parts\TextPart;

class PostController extends Controller
{
    public function generate(string $category = 'Технологии')
    {
        $data = [];

        $client = new Client(env('GEMINI_API_KEY'));

        try {
            $title_ru = $client->withV1BetaVersion()
                ->generativeModel(ModelName::GEMINI_1_5_FLASH)
                ->withSystemInstruction('Ты автор вымышленных новостей. Я буду давать тебе категорию поста, и ты должен написать только заголовок.')
                ->generateContent(new TextPart($category));

            $content_ru = $client->withV1BetaVersion()
                ->generativeModel(ModelName::GEMINI_1_5_FLASH)
                ->withSystemInstruction('Ты автор вымышленных новостей. Я буду давать тебе титул поста, и ты должен написать описание статьи с HTML-тегами. Возращай в виде строки без тегов ```html и без форматирования.')
                ->generateContent(new TextPart($title_ru->text()));

            $preview_ru = $client->withV1BetaVersion()
                ->generativeModel(ModelName::GEMINI_1_5_FLASH)
                ->withSystemInstruction('Ты автор вымышленных новостей. Я буду давать тебе статью поста, и ты должен написать краткое описание для SEO. Дай тольлко один и текст.')
                ->generateContent(new TextPart($content_ru->text()));

            $title_en = $client->withV1BetaVersion()
                ->generativeModel(ModelName::GEMINI_1_5_FLASH)
                ->withSystemInstruction('Переведи на английский...')
                ->generateContent(new TextPart($title_ru->text()));

            $content_en = $client->withV1BetaVersion()
                ->generativeModel(ModelName::GEMINI_1_5_FLASH)
                ->withSystemInstruction('Переведи на английский')
                ->generateContent(new TextPart($content_ru->text()));

            $preview_en = $client->withV1BetaVersion()
                ->generativeModel(ModelName::GEMINI_1_5_FLASH)
                ->withSystemInstruction('Переведи на английский')
                ->generateContent(new TextPart($preview_ru->text()));

            $title['ru'] = $title_ru->text();
            $content['ru'] = $content_ru->text();
            $title['en'] = $title_en->text();
            $content['en'] = $content_en->text();
            $preview['ru'] = $preview_ru->text();
            $preview['en'] = $preview_en->text();

            $data['title'] = $title;
            $data['content'] = $content;
            $data['seo_description'] = $preview;
            // Сохранение в БД (если нужно)
            // Post::create($data);

            return $data;
        } catch (\Exception $e) {
            Log::error('Ошибка генерации поста: ' . $e->getMessage());
            return response()->json(['error' => 'Ошибка генерации поста'], 500);
        }
    }
}

