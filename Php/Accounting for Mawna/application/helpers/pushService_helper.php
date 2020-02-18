<?php
function sendMessage($msg,$url) {
    $content      = array(
        "en" => $msg
    );
    $hashes_array = array();
    array_push($hashes_array, array(
        "id" => "like-button",
        "text" => "Visit",
        "icon" => 'https://banner2.kisspng.com/20180516/cew/kisspng-computer-icons-web-page-5afbb5c7a99c94.5865374615264455116947.jpg',
        "url" => $url
    ));
    
    $fields = array(
        'app_id' => "c90c74b3-0b13-474e-9eaa-920f14beaba5",
        'included_segments' => array(
            'All'
        ),
        'data' => array(
            "foo" => "bar"
        ),
        'contents' => $content,
        'web_buttons' => $hashes_array,
        'headings'=>array('en'=>'Prime Natural Food Ltd'),
        'chrome_web_icon'=>base_url().'uploads/icon.png'
    );
    
    $fields = json_encode($fields);
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json; charset=utf-8',
        'Authorization: Basic MWE4NjBhZWItYzIxNy00NDBiLTk2NDYtYThmMGEyM2UyODY5'
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    
    $response = curl_exec($ch);
    curl_close($ch);
    
    return $response;
}

?>