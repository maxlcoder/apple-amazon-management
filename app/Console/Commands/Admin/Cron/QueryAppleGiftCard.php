<?php

namespace App\Console\Commands\Admin\Cron;

use App\Models\AdminAppleRequestParam;
use App\Models\AppleGiftCard;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class QueryAppleGiftCard extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:query-apple-gift-card';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $cards = AppleGiftCard::query()->where('is_checked', 0)->get();
        foreach ($cards as $card) {
            $balance = $this->query($card);
            if ($balance) {
                $currency = Str::substr($balance, 0, 1);
                $balance = Str::substr($balance, 1);
                $card->currency = $currency;
                $card->balance = $balance;
                $card->is_checked = 1;
                $card->save();
            } else {
                $card->is_checked = 2;
                $card->save();
            }
        }
    }

    public function query($card)
    {
        $adminId = $card->admin_id;
        $cardNumber = $card->gift_card_number;
        $cardNumber = implode(' ', str_split($cardNumber, 4));
        $requestParam = AdminAppleRequestParam::query()->where('admin_id', $adminId)->first();
        if (!$requestParam) {
            $requestParam = AdminAppleRequestParam::query()->orderByDesc('updated_at')->first();
        }
        if (!$requestParam) {
            return null;
        }
        $domain = $requestParam->domain;

        $url = 'https://' . $domain . '/us-edu/shop/giftcard/balancex?_a=checkBalance&_m=giftCardBalanceCheck';
        $params = [
            'giftCardBalanceCheck.giftCardPin' => $cardNumber,
        ];
        $headers = array_merge($requestParam->headers, [
            'modelversion' => 'v2',
            'sec-ch-ua-platform' => 'macOS',
            'origin' => 'https://' . $domain,
            'x-requested-with' => 'Fetch',
        ]);
        $cookies = array_merge($requestParam->cookies, ['dssf' => 1,]);
        $response = Http::asForm()->withHeaders($headers)->withCookies($cookies, 'apple.com')->post($url, $params);
        $json = $response->json();
        if (!isset($json['head']) || !isset($json['head']['status']) || $json['head']['status'] !== 200) {
            return null;
        }
        if (!isset($json['body'])
            || !isset($json['body']['giftCardBalanceCheck'])
            || !isset($json['body']['giftCardBalanceCheck']['d'])
            || !isset($json['body']['giftCardBalanceCheck']['d']['balance'])) {
            return null;
        }
        return $json['body']['giftCardBalanceCheck']['d']['balance'];
    }
}
