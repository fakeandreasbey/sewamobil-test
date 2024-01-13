<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Carbon;
use Illuminate\View\View;

use Laraindo\TanggalFormat;
use Laraindo\RupiahFormat;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');
        \Carbon\Carbon::setLocale(config('app.locale'));

        // dd(date('d-M'));

        // $dateNow = date('Y/m/d H:i:s');
        // $a = TanggalFormat::DateIndo('1945/08/17 10:00:00'); //Jumat, 17 Agustus 1945
        // $b = TanggalFormat::DateIndo('1945/08/17 10:00:00','l, j F Y H:i:s a'); //Jumat, 17 Agustus 1945 10:00:00 pagi
        // $b = RupiahFormat::currency(1000000);    // Rp. 1.000.000
        // $c = RupiahFormat::terbilang(1000000);   // Satu Juta Rupiah

        // view()->share('b', $b);


        // Ganti dengan API Key yang valid dari OpenWeather
    $apiKey = 'fb68f4046cc0e75647abc0f3eed144e6';

    // Kota Bandung
    $city = 'Bandung';

    // Endpoint API cuaca dari OpenWeather
    $url = "http://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey&units=metric";

    $response = Http::get($url);

    if ($response->successful()) {
        $data = $response->json(); // Ambil data JSON dari respons

        $weather = $data['weather'][0]['description'];

        if($weather == "clear sky"){
            $main      = "Langit Cerah"; 
            $deskripsi = "Langit jernih tanpa awan atau awan sangat sedikit";
            $icon      = "fas fa-sun";
        }elseif($weather == "few clouds"){
            $main      = "Beberapa Awan"; 
            $deskripsi = "Beberapa awan yang tersebar di langit";
            $icon      = "fas fa-cloud-sun";
        }elseif($weather == "scattered clouds"){
            $main      = "Awan Tersebar"; 
            $deskripsi = "Awan yang agak banyak namun tidak menyeluruh";
            $icon      = "fas fa-cloud";
        }elseif($weather == "broken clouds"){
            $main      = "Awan Pecah"; 
            $deskripsi = "Awan yang pecah-pecah dan tidak membentuk lapisan yang padat";
            $icon      = "fas fa-cloud-sun";
        }elseif($weather == "overcast clouds"){
            $main      = "Awan Mendung"; 
            $deskripsi = "Langit tertutup awan";
            $icon      = "fas fa-cloud";
        }elseif($weather == "mist"){
            $main      = "Kabut"; 
            $deskripsi = "Kabut tipis yang mengurangi visibilitas";
            $icon      = "fas fa-smog";
        }elseif($weather == "fog"){
            $main      = "Kabut Tebal"; 
            $deskripsi = "Kabut yang tebal dan dapat mengurangi visibilitas secara signifikan";
            $icon      = "fas fa-smog";
        }elseif($weather == "light rain"){
            $main      = "Hujan Ringan"; 
            $deskripsi = "Hujan dengan intensitas ringan";
            $icon      = "fas fa-cloud-rain";
        }elseif($weather == "moderate rain"){
            $main      = "Hujan Sedang"; 
            $deskripsi = "Hujan dengan intensitas sedang";
            $icon      = "fas fa-cloud-showers-heavy";
        }elseif($weather == "heavy rain"){
            $main      = "Hujan Lebat"; 
            $deskripsi = "Hujan dengan intensitas yang kuat";
            $icon      = "fas fa-cloud-showers-heavy";
        }elseif($weather == "thunderstorm"){
            $main      = "Badai Petir"; 
            $deskripsi = "Hujan deras disertai petir dan kadang-kadang angin kencang";
            $icon      = "fas fa-bolt";
        }elseif($weather == "snow"){
            $main      = "Salju"; 
            $deskripsi = "Butiran salju yang jatuh dari langit";
            $icon      = "fas fa-snowflake";
        }elseif($weather == "mist"){
            $main      = "Salju Ringan"; 
            $deskripsi = "Salju dengan intensitas yang ringan";
            $icon      = "fas fa-snowflake";
        }elseif($weather == "smoke"){
            $main      = "Asap"; 
            $deskripsi = "Udara terpenuhi dengan asap, umumnya terkait dengan kebakaran hutan atau kebakaran lainnya";
            $icon      = "fas fa-smog";
        }elseif($weather == "haze"){
            $main      = "Kabut Asap"; 
            $deskripsi = "Udara terisi dengan partikel debu, asap, atau polusi lainnya, mengurangi visibilitas";
            $icon      = "fas fa-smog";
        }else{
            $main      = "";
            $deskripsi = $weather;
            $icon      = "";
        }



    $currentWeather = [
        'temperature' => round($data['main']['temp'], 0), // Membulatkan suhu ke 2 desimal
        'feels_like' => round($data['main']['feels_like'], 0), // Membulatkan rasa dingin ke 2 desimal
        'description' => $deskripsi,
        'main' => $main,
        'icon' => $icon,
        'humidity' => $data['main']['humidity'],
        'visibility' => $data['visibility']/1000,
        'pressure'   => $data['main']['pressure'],
        'wind_speed' => round($data['wind']['speed'], 1),
        'wind_direction1' => $data['wind']['deg'],
        'wind_direction' => $this->getWindDirection($data['wind']['deg']),            
    ];

    view()->share('currentWeather', $currentWeather);
    view()->share('icon', $icon);

    } else {
        // Tampilkan pesan jika permintaan tidak berhasil
        echo "Gagal mengambil data cuaca.";
    }

    }


    private function getWindDirection($degrees)
    {
        $directions = [
            'Utara', 'Timur Laut', 'Timur', 'Tenggara',
            'Selatan', 'Barat Daya', 'Barat', 'Barat Laut'
        ];

        $index = round($degrees / 45) % 8;
        return $directions[$index];
    }




}
