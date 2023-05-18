<?php
declare(strict_types = 1);
/**
 * AccessClass.php
 * makes a post request to spotify API and retrieves its results
 */
namespace SpotifyAPI;

class Access
{
    public function SendPostRequest()
    {
        $url = 'https://accounts.spotify.com/api/token';
        $curl = curl_init($url);
        $curl_body = "grant_type=client_credentials&client_id=" . $_ENV['CLIENT_ID'] . "&client_secret=" . $_ENV['PRIVATE_ID'];

        curl_setopt($curl ,CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_body);
        curl_setopt($curl, CURLOPT_HEADER, array(
            'Content-Type: application/x-www-form-urlencoded',
            'Content-Length: ' . strlen($curl_body)
        ));

        $response = curl_exec($curl);
        if (curl_errno($curl))
        {
            return "Ouch!";
        }
        else
        {
            return $response;
        }
    }
}