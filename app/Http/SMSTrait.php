<?php
namespace App\Http;

trait SMSTrait
{

    public function sms(array $numbers, $message)
    {
        $username = 'menwerx';
        $password = 'Menwer2019';
        $modified_numbers = array_map(function ($number) {
            return  "+965$number";
        }, $numbers);
        $messages = array(
            array('from' => 'Tabi3', 'to' => $modified_numbers, 'body' => $message)
        );
        $result = $this->send_message(json_encode($messages), 'https://api.bulksms.com/v1/messages', $username, $password);
        if ($result['http_status'] != 201) {
            return false;
        } else {
            return true;
        }
    }



    function send_message($post_body, $url, $username, $password)
    {
        $ch = curl_init();
        $headers = array(
            'Content-Type:application/json',
            'Authorization:Basic ' . base64_encode("$username:$password")
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_body);
        // Allow cUrl functions 20 seconds to execute
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        // Wait 10 seconds while trying to connect
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        $output = array();
        $output['server_response'] = curl_exec($ch);
        $curl_info = curl_getinfo($ch);
        $output['http_status'] = $curl_info['http_code'];
        $output['error'] = curl_error($ch);
        curl_close($ch);
        return $output;
    }
}
