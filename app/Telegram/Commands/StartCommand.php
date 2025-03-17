<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;
use Telegram\Bot\Keyboard\Keyboard;

class StartCommand extends Command
{
    /**
     * Название команды
     */
    protected string $name = 'start';

    /**
     * Алиасы для команды
     */
    protected array $aliases = ['join'];

    /**
     * Описание команды
     */
    protected string $description = 'Команда для начала работы с ботом';

    /**
     * Основная логика команды
     */
    public function handle()
    {
        $keyboard = Keyboard::make()
        ->setResizeKeyboard(true)
		->setOneTimeKeyboard(false)
		->row([
			Keyboard::button('Сгенерировать новость'),
		]);

        $this->replyWithMessage([
            'text' => view('telegram.start')->render(),
            // 'reply_markup' => $keyboard
        ]);
    }
}
