<?php
session_start();

if(isset($_POST["zipcode"]) | !empty($_POST["zipcode"])){
    header('Location: index.php');
}

get($_POST["zipcode"]);

function get(string $zipCode)
{
    try {
        $curl = curl_init('http://viacep.com.br/ws/' . $zipCode . '/json/');

        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
            CURLOPT_TCP_FASTOPEN => 1,
            CURLOPT_ENCODING => ''
        ]);

        $response = curl_exec($curl);

        curl_close($curl);

        return $_SESSION['data'] = json_decode($response, true);
    } catch (Exception $exception) {
        $_SESSION['data'] = $exception;
    }
}
?>