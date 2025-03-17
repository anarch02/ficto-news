<?php

namespace App\Telegram;

use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\User;
use DefStudio\Telegraph\Facades\Telegraph;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\ReplyButton;
use DefStudio\Telegraph\Keyboard\ReplyKeyboard;
use Stringable;

class Handler extends WebhookHandler
{
    /**
     * Handle incoming webhook updates
     *
     * @return void
     */
    public function start()
    {

        $this->reply('<b>Привет! 👋</b>

Добро пожаловать в <b>FictoNews</b> – уникальный новостной портал, где искусственный интеллект создает необычные и вымышленные новости.');

        // Telegraph::message('')
        // ->replyKeyboard(ReplyKeyboard::make()->buttons([
        //     ReplyButton::make('📰 Сгенерировать новость'),
        // ])
        // ->resize())->send();
        Telegraph::message('Нажми на кнопку ниже, чтобы сгенерировать случайную новость!')->send();
    }

    protected function handleChatMessage(Stringable $text): void
    {
        if($text == '📰 Сгенерировать новость'){
            $lats_message = $this->chat->html('Секундочку...')->send();
            $message = '';
            $data = $this->generatePost();

            $message .= "<b>📰 Новость:</b> {$data['title']['ru']}\n";
            $message .= "<b>Описание:</b> {$data['seo_description']['ru']}\n";
            // $message .= "<b>Категория:</b> {$data['category']['name']['ru']}\n";
            // $message .= "{$data['url']}\n";

            Telegraph::chat($this->chat)->deleteMessage($lats_message->telegraphMessageId())->send();
            $this->chat->html($message)->send();
        }else{
            $this->chat->html('Этот бот не принимает текста')->send();
        }
    }

    protected function handleUnknownCommand(Stringable $text): void
    {
        $this->chat->html("Вы ввели неизвестную мне команду: $text")->send();
    }

    private function generatePost()
    {
        $category = Category::inRandomOrder()->first();
        $post = new PostController();
        $data = $post->generate($category->name);
        $data['user_id'] = User::inRandomOrder()->first()->id;
        $data['slug'] = \Str::slug($data['title']['ru']);
        $category->posts()->create($data);

        $data['url'] = route('post', ['slug' => $data['slug']]);
        return $data;
    }
}
