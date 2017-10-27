<?php

namespace app\models;

class Api {

    public static function http_response($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        $data = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return ($httpcode >= 200 && $httpcode < 300) ? $data : false;
    }

    public static function getApiSql($url, $request = 'GET', $post = []) {

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $url . '?' . http_build_query($post),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => strtoupper($request),
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return FALSE;
        } else {
            return json_decode($response);
        }
    }

    public static function getDataBySql($sql) {
        $model = Api::getApiSql('http://findvan.biz/api.php', 'GET', [
                    'user' => 'ar',
                    'pass' => 'api',
                    'sql' => $sql
        ]);
        
        return isset($model->data) ? $model->data : $model;
    }

}
