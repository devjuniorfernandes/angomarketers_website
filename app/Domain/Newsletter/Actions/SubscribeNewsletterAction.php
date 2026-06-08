<?php

namespace App\Domain\Newsletter\Actions;

use App\Domain\Newsletter\Models\Subscriber;
use Illuminate\Support\Facades\Cache;

class SubscribeNewsletterAction
{
    /**
     * Executes the subscription logic.
     *
     * @param string $whatsapp
     * @return Subscriber
     */
    public function execute(string $whatsapp): Subscriber
    {
        $subscriber = Subscriber::create([
            'whatsapp' => $whatsapp,
        ]);

        // Clean cache as a new subscriber registers (useful if subscriber stats are displayed)
        Cache::flush();

        return $subscriber;
    }
}
