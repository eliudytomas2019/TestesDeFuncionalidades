<?php
$curl = curl_init();
 
$post = [
    'format' => 'json',
    'api_key' => '[YOUR_API_KEY]',
    'iban'   => 'DE46500700100927353010',
];
 
curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.iban.com/clients/api/v4/iban/',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS => $post
));
 
$output = curl_exec($curl);
$result = json_decode($output);
 
print_r($result);
 
curl_close($curl);
?>