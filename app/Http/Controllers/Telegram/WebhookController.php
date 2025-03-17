<?php

namespace App\Http\Controllers\Telegram;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;
use Illuminate\Support\Str;

class WebhookController extends Controller
{
    public function index()
    {
        Telegram::commandsHandler(true);

        $update = Telegram::getWebhookUpdate();
        $updateArray = $update->toArray();

        // Обработка обычных сообщений
        // if (isset($updateArray['message'])) {
        //     $this->handleMessage($updateArray['message']);
        // }

        return response('ok');
    }

    // private function handleMessage(array $message): void
    // {
    //     $chatData = $message['chat'] ?? null;

    //     switch($message['text']) {
    //         case 'Сгенерировать новость':

    //             Telegram::sendMessage([
    //                 'chat_id' => $chatData['id'],
    //                 'text' => 'Секундочку, генерирую новость...',
    //             ]);

    //             // $data = $this->generatePost();
    //             $data = [
    //                 'title' => 'Новость',
    //                 'seo_description' => 'Описание новости',
    //                 'url' => 'https://google.com',
    //                 'slug' => Str::slug('Новость'),
    //             ];

    //             Telegram::sendMessage([
    //                 'chat_id' => $chatData['id'],
    //                 'text' => $data['title'] . PHP_EOL . $data['seo_description'] . PHP_EOL . $data['url'],
    //             ]);

    //             break;
    //         default:
    //             // Telegram::sendMessage([
    //             //     'chat_id' => $chatData['id'],
    //             //     'text' => 'Привет! Я не знаю такой команды. Попробуйте еще раз.',
    //             // ]);
    //     }
    // }

    // private function generatePost()
    // {
    //     $category = Category::inRandomOrder()->first();
    //     $post = new PostController();
    //     $data = $post->generate($category->name);
    //     $data['user_id'] = User::inRandomOrder()->first()->id;
    //     $data['slug'] = \Str::slug($data['title']['ru']);
    //     $category->posts()->create($data);

    //     $data['url'] = route('post', ['slug' => $data['slug']]);

    //     return $data;
    // }
}
