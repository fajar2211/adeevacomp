<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Bot extends CI_Controller {
    function __construct(){
        parent::__construct();
    }
 
//    function index(){
//        $TOKEN = "1269781172:AAGrkCsj0tlVBqIYqjcORxvniBTvxhgDGnk";
//        $apiURL = "https://api.telegram.org/bot$TOKEN";
//        $update = json_decode(file_get_contents("php://input"), TRUE);
//        $chatID = $update["message"]["chat"]["id"];
//        $message = $update["message"]["text"];
//        $nama = $update["message"]["from"]["first_name"];
//        $url = "http://media-komputer.com";
//        date_default_timezone_set("Asia/Jakarta");
//        $time = date('d-m-Y H:i:s');
//        $text = "Berikut keyword yang tersedia:\n";
//	  $text .= "\nstart - untuk memulai bot\n";
//          $text .= "\nhelp - info bantuan ini\n";	 	  
//          $text .= "\ntime - info waktu sekarang.";
//        
//        if (strpos($message, "start") === 0) {
//        
//        file_get_contents($apiURL."/sendmessage?chat_id=".$chatID."&text=Hai, selamat datang ".$nama." di <code>".$url."</code>. Untuk bantuan ketik <code>help</code>.&parse_mode=HTML");
//        } elseif (strpos($message, "time") === 0) { 
//        file_get_contents($apiURL."/sendmessage?chat_id=".$chatID."&text=".$time."&parse_mode=HTML");     
//        } elseif (strpos($message, "help") === 0) { 
//        file_get_contents($apiURL."/sendmessage?chat_id=".$chatID."&text=".$text."&parse_mode=HTML");     
//        } else {
//        file_get_contents($apiURL."/sendmessage?chat_id=".$chatID."&text=Keyword tidak ada.&parse_mode=HTML");    
//        }
//    }
    
    function index(){
        $token = "1269781172:AAGrkCsj0tlVBqIYqjcORxvniBTvxhgDGnk";//Ganti dengan Token yang diperoleh dari BotFather
        $usernamebot="@MediaKomp_bot"; //nama bot yang diperoleh dari BotFather
        define('BOT_TOKEN', $token); 

        define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');

        $debug = false;
        
        $content = file_get_contents("php://input");
        $update = json_decode($content, true);

        if (!$update) {
          exit;
        } else {
          $this->processMessage($update);
        }
    }
    
    function exec_curl_request($handle)
    {
        $response = curl_exec($handle);

        if ($response === false) {
            $errno = curl_errno($handle);
            $error = curl_error($handle);
            error_log("Curl returned error $errno: $error\n");
            curl_close($handle);

            return false;
        }

        $http_code = intval(curl_getinfo($handle, CURLINFO_HTTP_CODE));
        curl_close($handle);

        if ($http_code >= 500) {
            // do not wat to DDOS server if something goes wrong
        sleep(10);

            return false;
        } elseif ($http_code != 200) {
            $response = json_decode($response, true);
            error_log("Request has failed with error {$response['error_code']}: {$response['description']}\n");
            if ($http_code == 401) {
                throw new Exception('Invalid access token provided');
            }

            return false;
        } else {
            $response = json_decode($response, true);
            if (isset($response['description'])) {
                error_log("Request was successfull: {$response['description']}\n");
            }
            $response = $response['result'];
        }

        return $response;
    }

    function apiRequest($method, $parameters = null)
    {
        if (!is_string($method)) {
            error_log("Method name must be a string\n");

            return false;
        }

        if (!$parameters) {
            $parameters = [];
        } elseif (!is_array($parameters)) {
            error_log("Parameters must be an array\n");

            return false;
        }

        foreach ($parameters as $key => &$val) {
            // encoding to JSON array parameters, for example reply_markup
        if (!is_numeric($val) && !is_string($val)) {
            $val = json_encode($val);
        }
        }
        $url = API_URL.$method.'?'.http_build_query($parameters);

        $handle = curl_init($url);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($handle, CURLOPT_TIMEOUT, 60);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);

        return $this->exec_curl_request($handle);
    }

    function apiRequestJson($method, $parameters)
    {
        if (!is_string($method)) {
            error_log("Method name must be a string\n");

            return false;
        }

        if (!$parameters) {
            $parameters = [];
        } elseif (!is_array($parameters)) {
            error_log("Parameters must be an array\n");

            return false;
        }

        $parameters['method'] = $method;

        $handle = curl_init(API_URL);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($handle, CURLOPT_TIMEOUT, 60);
        curl_setopt($handle, CURLOPT_POSTFIELDS, json_encode($parameters));
        curl_setopt($handle, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

        return $this->exec_curl_request($handle);
    }

    // jebakan token, klo ga diisi akan mati
//    if (strlen(BOT_TOKEN) < 20) {
//        die(PHP_EOL."-> -> Token BOT API nya mohon diisi dengan benar!\n");
//    }

    function getUpdates($last_id = null)
    {
        $params = [];
        if (!empty($last_id)) {
            $params = ['offset' => $last_id + 1, 'limit' => 1];
        }
      //echo print_r($params, true);
      return $this->apiRequest('getUpdates', $params);
    }

    // matikan ini jika ingin bot berjalan
    //die('baca dengan teliti yak!');

    // ----------- pantengin mulai ini
    function sendMessage($idpesan, $idchat, $pesan)
    {
        $data = [
        'chat_id'             => $idchat,
        'text'                => $pesan,
        'parse_mode'          => 'Markdown',
        'reply_to_message_id' => $idpesan,
      ];

        return $this->apiRequest('sendMessage', $data);
    }

    function processMessage($message)
    {
        global $database;
        if ($GLOBALS['debug']) {
            print_r($message);
        }

        if (isset($message['message'])) {

            $sumber = $message['message'];
            $idpesan = $sumber['message_id'];
            $idchat = $sumber['chat']['id'];

            $username = $sumber["from"]["username"];
            $nama = $sumber['from']['first_name'];
            $iduser = $sumber['from']['id'];

            if (isset($sumber['text'])) {
                $pesan = $sumber['text'];

                if (preg_match("/^\/view_(\d+)$/i", $pesan, $cocok)) {
                    $pesan = "/view $cocok[1]";
                }

                if (preg_match("/^\/hapus_(\d+)$/i", $pesan, $cocok)) {
                    $pesan = "/hapus $cocok[1]";
                }

         // print_r($pesan);

          $pecah2 = explode(' ', $pesan, 3);
                $katake1 = strtolower($pecah2[0]); //untuk command
                $katake2 = strtolower($pecah2[1]); // kata pertama setelah command
                $katake3 = strtolower($pecah2[2]); // kata kedua setelah command

          $pecah = explode(' ', $pesan, 2);
                $katapertama = strtolower($pecah[0]); //untuk command

            switch ($katapertama) {
            case '/start': 
                    case '/start@namabot':
              $text = "Selamat datang..., '$nama'! Untuk bantuan ketik: /help";
              break;

            case '/help': 
            case '/help@namabot':
              $text = "Berikut keyword yang tersedia:\n\n";
                      $text .= "/start untuk memulai bot\n";
              $text .= "/help info bantuan ini\n";	 	  
//              $text .= "/registrasi `nohp` untuk registrasi user baru\n";
//              $text .= "/password `passwordbaru` untuk ganti password\n";
//              $text .= "/username `usernamebaru` untuk ganti username\n";
//              $text .= "/login `username` `password` untuk login\n";
//              $text .= "/myakun untuk melihat akun Anda\n"; 
              $text .= "/time info waktu sekarang.";
              break; 

            case '/time': 
                    case '/time@namabot':
              date_default_timezone_set("Asia/Jakarta");
                      $waktusekarang = date('d-m-Y H:i:s');
              $text = "Waktu Sekarang: $waktusekarang\n";
//                      $text .= "Jadwal shalat: http://blogchem.com/shalat/widget.html";
              break;		       

            default:
              $text = '_Keyword tidak ada?!_';
                      $text .= "\n";
                      $text .= "Klik /help untuk bantuan";
              break;
          }
            } else {
                $text = 'Silahkan tulis pesan yang akan disampaikan..';
                            $text .= "\n";
                            $text .= "Format: /pesan 'pesan'";
            }

            $hasil = $this->sendMessage($idpesan, $idchat, $text);
            if ($GLOBALS['debug']) {
                // hanya nampak saat metode poll dan debug = true;
          echo 'Pesan yang dikirim: '.$text.PHP_EOL;
                print_r($hasil);
            }
        }
    }

    // pencetakan versi dan info waktu server, berfungsi jika test hook
//    echo 'Ver. '.myVERSI.' OK Start!'.PHP_EOL.date('d-m-Y H:i:s').PHP_EOL;

    function printUpdates($result)
    {
        foreach ($result as $obj) {
            // echo $obj['message']['text'].PHP_EOL;
        $this->processMessage($obj);
            $last_id = $obj['update_id'];
        }

        return $last_id;
    }
 
    
}