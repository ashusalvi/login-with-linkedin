<?php

session_start();

$client_id = "81w96pn5bc1fqb";
$client_secret = "l4KEsClwAZRgqI1W";
$redirect_uri = "https://adevole.com/clients/ashitosh/oauth-linkedin/callback.php";
$csrf_token = rand(1111111, 9999999);
$scopes = "r_liteprofile%20r_emailaddress";

function curl($url, $parameters)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
    curl_setopt($ch, CURLOPT_POST, 1);
    $headers = [];
    $headers[] = "Content-Type: application/x-www-form-urlencoded";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);
    return $result;
}

function getCallback()
{
    $client_id = "81w96pn5bc1fqb";
    $client_secret = "l4KEsClwAZRgqI1W";
    $redirect_uri = "https://adevole.com/clients/ashitosh/oauth-linkedin/callback.php";
    $csrf_token = rand(1111111, 9999999);
    $scopes = "r_liteprofile%20r_emailaddress";

    if (isset($_REQUEST['code'])) {
        $code = $_REQUEST['code'];
        $url = "https://www.linkedin.com/oauth/v2/accessToken";
        $params = [
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'redirect_uri' => $redirect_uri,
            'code' => $code,
            'grant_type' => 'authorization_code',
        ];
        $accessToken = curl($url,http_build_query($params));
        $accessToken = json_decode($accessToken)->access_token;
        $getProfInfo = getProfileInfo($accessToken);
        $getEmail = getEmail($accessToken);

        return $returnArray =array( 
            'getProfInfo' => json_decode($getProfInfo),
            'getEmail' => json_decode($getEmail)
            );

        // $url = "https://api.linkedin.com/v1/people/~:(id,firstName,lastName,pictureUrls::(original),headline,publicProfileUrl,location,industry,positions,email-address)?format=json&oauth2_access_token=" . $accessToken;
        // $user = file_get_contents($url, false);

        // return (json_decode($user));



    }
}

function getProfileInfo($accessToken){
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.linkedin.com/v2/me?projection=%28id,firstName,lastName,profilePicture%28displayImage~:playableStreams%29%29&oauth2_access_token=".$accessToken,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "",
            CURLOPT_HTTPHEADER => array(
                "Postman-Token: cc2d737d-9e2f-4125-aaa6-86c050e98a68",
                "cache-control: no-cache"
            ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                return "cURL Error #:" . $err;
            } else {
                return $response;
            }
}

function getEmail($accessToken){
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.linkedin.com/v2/emailAddress?q=members&projection=%28elements%2A%28handle~%29%29&oauth2_access_token=".$accessToken,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_POSTFIELDS => "",
    CURLOPT_HTTPHEADER => array(
        "Accept: */*",
        "Cache-Control: no-cache",
        "Connection: keep-alive",
        "Host: api.linkedin.com",
        "Postman-Token: 151b57eb-8fd0-4066-bd30-fee01cd1fdce,062157b0-fc14-49c4-b9f8-151cb59f4a0f",
        "User-Agent: PostmanRuntime/7.11.0",
        "accept-encoding: gzip, deflate",
        "cache-control: no-cache"
    ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        return "cURL Error #:" . $err;
    } else {
        return $response;
    }
}

