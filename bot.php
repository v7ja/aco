<?php


$API_KEY = '6756691141:AAH6V5Hg2j1HchKzY32J6H5sgubQtaqXA-c'; // TOKEN 
define('API_KEY',$API_KEY);
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$text = $message->text;
$chat_id = $message->chat->id;
$ar = array("a","A","b","B","c","C","d","D","e","E","f","F","g","G","h","H","i","I","j","J","k","K","l",'L','m','M','n',"N",'o','O','p','P','q','Q','r','R','S','s','t','T',1,2,3,4,5,6,7,8,9);

$rand1 = array_rand($ar, 1);
$rand2 = array_rand($ar, 1);
$rand3 = array_rand($ar, 1);
$rand4 = array_rand($ar, 1);
$rand5 = array_rand($ar, 1);
$rand6 = array_rand($ar, 1);
$rand7 = array_rand($ar, 1);
$rand8 = array_rand($ar, 1);
$rand9 = array_rand($ar, 1);
$rand10 = array_rand($ar, 1);
$rand11 = array_rand($ar, 1);
$a1 = $ar[$rand1];
$a2 = $ar[$rand2];
$a3 = $ar[$rand3];
$a4 = $ar[$rand4];
$a5 = $ar[$rand5];
$a6 = $ar[$rand6];
$a7 = $ar[$rand7];
$a8 = $ar[$rand8];


if($text == "/start"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"  Hi In the Bot Creat Account Insta\nSend Your Email \n\n Dev [عَبود يابه؟](https://t.me/aBdYabH) 🕴",
'disable_web_page_preview'=>true,
'parse_mode'=>"Markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"Join", "url"=>"https://t.me/ToGoLang"]]
]
])
]);
}


if(filter_var($text, FILTER_VALIDATE_EMAIL)){
$email = $text;
$name = 'By {aBooD YabH}';
$username = $a1.$a2.$a3.$a4.$a5.$a6.$a7.$a8;
$password = $a1.$a2.$a3.$a4.$a5.$a6.$a7;

$instagram = curl_init();
curl_setopt($instagram, CURLOPT_URL, "https://www.instagram.com/accounts/web_create_ajax/");
curl_setopt($instagram, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($instagram, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($instagram, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($instagram, CURLOPT_HTTPHEADER, array(
    'Host: www.instagram.com',
    'X-CSRFToken: EJMrAsTOEi1SKiZLHzNf2RMBEZTQkI9I',
    'X-Instagram-AJAX: 1',
    'X-Requested-With: XMLHttpRequest',
    'Referer: https://www.instagram.com/',
    'Cookie: csrftoken=EJMrAsTOEi1SKiZLHzNf2RMBEZTQkI9I;'
));
curl_setopt($instagram, CURLOPT_POSTFIELDS, "email=$email&password=$password&username=$username&first_name=$name");
curl_setopt($instagram, CURLOPT_HEADER, 1);
curl_setopt($instagram, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
$response = curl_exec($instagram);

if(strpos($response,"true")){

bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" uSeR : $username \n\n PassWord : $password",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"Dev ~🕴", "url"=>"https://t.me/sajademo"]]
]
])
]);

}

if(strpos($response,"Another account is using")){
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"Error : The Email is Taken"
]);   
}

curl_close($instagram);

} 
 
