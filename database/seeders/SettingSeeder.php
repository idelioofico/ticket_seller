<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //QrCode Monkey
        Setting::create(
            [
                'type'=>'bitly_endpoint_url',
                'description'=>'Bitly',
                'value'=>'https://api-ssl.bitly.com/v4/shorten',
            ]
        );

        Setting::create(
            [
                'type'=>'bitly_endpoint_key',
                'description'=>'Bitly',
                'value'=>'71522a4977b53dc740e43db8edb6ad862ba149cc',
            ]
        );

        Setting::create(
            [
                'type'=>'bitly_endpoint_domain',
                'description'=>'Bitly',
                'value'=>'bit.ly',
            ]
        );


        //QrCode Monkey

        Setting::create(
            [
                'type'=>'qrcode_endpoint_url',
                'description'=>'qrcode',
                'value'=>'https://api-ssl.qrcode.com/v4/shorten',
            ]
        );

        Setting::create(
            [
                'type'=>'qrcode_endpoint_key',
                'description'=>'qrcode',
                'value'=>'71522a4977b53dc740e43db8edb6ad862ba149cc',
            ]
        );

        Setting::create(
            [
                'type'=>'qrcode_endpoint_domain',
                'description'=>'qrcode',
                'value'=>'bit.ly',
            ]
        );



        //Upload care

        Setting::create(
            [
                'type'=>'uploadcare_endpoint_url',
                'description'=>'uploadcare',
                'value'=>'https://upload.uploadcare.com/base/',
            ]
        );


        Setting::create(
            [
                'type'=>'uploadcare_endpoint_cdn',
                'description'=>'uploadcare',
                'value'=>'https://ucarecdn.com/',
            ]
        );

        Setting::create(
            [
                'type'=>'uploadcare_endpoint_key',
                'description'=>'uploadcare',
                'value'=>'67dfb28c16e014018a19',
            ]
        );

        // Setting::create(
        //     [
        //         'type'=>'uploadcare_endpoint_domain',
        //         'description'=>'uploadcare',
        //         'value'=>'bit.ly',
        //     ]
        // );
    }
}
