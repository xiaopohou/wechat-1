<?php
/**
 * 微信公众平台-自定义菜单功能源代码
 */

header('Content-Type: text/html; charset=UTF-8');

$APPID="wx334914a9f1915372";
$APPSECRET="8b6795d29047e55efc04a0b553c47003";

$TOKEN_URL="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$APPID."&secret=".$APPSECRET;

$json=file_get_contents($TOKEN_URL);
$result=json_decode($json);

$ACC_TOKEN=$result->access_token;

$MENU_URL="https://api.weixin.qq.com/cgi-bin/menu/get?access_token=".$ACC_TOKEN;

$cu = curl_init();
curl_setopt($cu, CURLOPT_URL, $MENU_URL);
curl_setopt($cu, CURLOPT_RETURNTRANSFER, 1);
$menu_json = curl_exec($cu);
$menu = json_decode($menu_json);
curl_close($cu);

echo $menu_json;

?>