<?php

namespace App\DTO;

use App\Models\Setting;
use Exception;

class BitlyDTO extends BaseDTO
{

    protected $serviceUrl;
    protected $serviceKey;
    protected $serviceDomain;

    public function __construct()
    {
        try {
            $this->serviceUrl = (Setting::where('type', 'qrcode_endpoint_url')->first())->value;
            $this->serviceKey = (Setting::where('type', 'qrcode_endpoint_key')->first())->value;
            $this->serviceDomain = (Setting::where('type', 'qrcode_endpoint_domain')->first())->value;
        } catch (\Throwable $th) {
            throw new Exception("Bitly: Ocorreu um erro ao tentar buscar a chave \n {$th}");
        }

    }

    /**
     * Given a long URL, generate a short URL.
     * 
     * @param longUrl the long URL you want to shorten
     */
    public function generateShortUrl($longUrl)
    {

        $body = [
            "domain"   => $this->serviceDomain,
            "long_url" => $longUrl,
        ];

        $headers = [
            "Content-Type: application/json",
            "Authorization: Bearer " . $this->serviceKey,
        ];

        $reposnse = $this->dispatch($this->serviceUrl, 'POST', $headers, $body);

        return $reposnse->link?:null;
    }
}
