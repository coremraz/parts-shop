<?php

namespace App\Console\Commands;

use App\Models\Exchange_rate;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class FetchExchangeRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:exchange-rates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch exchange rates from Central Bank of Russia website';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $url = 'https://www.cbr.ru/scripts/XML_daily.asp'; // URL of the XML file
        $xml = simplexml_load_file($url);

        $exchangeRates = [];
        foreach ($xml->Valute as $valute) {
            $charCode = (string) $valute->CharCode;
            $nominal = (int) $valute->Nominal;
            $value = (float) $valute->Value;

            switch ($charCode) {
                case 'EUR':
                    $exchangeRates['eur_rate'] = $value / $nominal;
                    break;
                case 'USD':
                    $exchangeRates['usd_rate'] = $value / $nominal;
                    break;
                case 'GBP':
                    $exchangeRates['gbp_rate'] = $value / $nominal;
                    break;
                case 'CNY':
                    $exchangeRates['cny_rate'] = $value / $nominal;
                    break;
                case 'TRY':
                    $exchangeRates['try_rate'] = $value / 10; // Adjust for 10 units
                    break;
            }
        }

        $exchangeRateSDB = Exchange_rate::firstOrCreate($exchangeRates);
        $exchangeRateSDB->save();
    }
}
