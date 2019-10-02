<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Currency extends Command
{
    protected $app_id = 'a448153e31a945f286c579bd079742d6';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', "https://openexchangerates.org/api/latest.json?app_id=".$this->app_id);
        if ($response->getStatusCode() == 200) {
            $result = $response->getBody();
            $result = json_decode($result);
            $currency = \App\Models\Currency::find(1);
            if ($currency) {
                $currency->update([
                    'EUR' => $result->rates->EUR, 'KZT' => $result->rates->KZT
                ]);
            } else {
                \App\Models\Currency::create([
                    'EUR' => $result->rates->EUR, 'KZT' => $result->rates->KZT
                ]);
            }
            $this->info('Свежие курсы получены');
        }
    }
}
