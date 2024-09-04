<?php
ob_start();
define('API_KEY','7244731022:AAFzlemczzF4LzAsLdKMYuAtG9JBuidziHM');

echo "setWebhook ~> <a href=\"https://api.telegram.org/bot".API_KEY."/setwebhook?url=".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME']."\">https://api.telegram.org/bot".API_KEY."/setwebhook?url=".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME']."</a>";
function bot($method,$datas=[]){
$url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url); curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}
else
{
return json_decode($res);
}
}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$message_id = $update->message->message_id;
$from_id = $message->from->id;
$username = $message->from->username;
$name = $message->from->first_name;
$text = $message->text;
$chat_id2 = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$data = $update->callback_query->data;
$s = json_decode(file_get_contents('http://www.api-hany.cf/time?GTM=Africa/Cairo&lang=en'),true);
$time = $s["time"];
$date = $s["date"];
$day = $s["day"];
$mon = $s["month"];
$t24 = $s["time24"];
$dayhj = $s["hijri"]["day"];
$monhj = $s["hijri"]["month"];
$yearhj = $s["hijri"]["year"];
if ($text == '/start') {
  bot('sendMessage', ['chat_id' => $chat_id, 'text' => "- مرحبا بك ؛ [$name](tg://user?id=$chat_id)
📮┊في بوت الزخرفه آلعربيه ، 📩 ؛
📜┊يمكنك زخرفةه اسمك بـ 14 نوع ، 🌐 ؛
🔰┊للآطلآع على آلإوامر اضغط /help ، ✨ ؛
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
~ وقت دخولك آلى إلبوت

🕐┇الوقت -: *$time*
📅┇التاريخ -: *$date*
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎  
[• اضغط هنا وتابع جديدنا 🌐؛](https://t.me/BoTs0)", 'parse_mode' => "MarkDown", 'disable_web_page_preview' => true, 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "• اضغط هنا وتابع جديدنا 🇮🇶؛", 'url' => "https://t.me/M1_m2s"]], ]]) ]);
}
if ($text == '/help') {
  bot('sendMessage', ['chat_id' => $chat_id, 'text' => "- مرحبا بك ؛ [$name](tg://user?id=$chat_id)
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎  
- اوامر الزخرفةه ، ⚠️؛
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎ 
z1 + الاسم
z2 + الاسم
z3 + الاسم
z4 + الاسم
z5 + الاسم
z6 + الاسم
z7 + الاسم
z8 + الاسم
z9 + الاسم
z10 + الاسم
z11 + الاسم
z12 + الاسم
z13 + الاسم
z14 + الاسم
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎ 
- نتائج الزخرفةه ، 🔰؛
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎  
1- مآثـۘ❈ـۘيـۘ❈ـۘﯛ̲
2- م๋͜ـ❀๋͜ـآث๋͜ـ❀๋͜ـي๋͜ـ❀๋͜ـﯛ
3- م֠ــۢ͜ـٰ̲ـآث֠ــۢ͜ـٰ̲ـي֠ــۢ͜ـٰ̲ـﯛ̲
4- مِٰـۛৣـآثِٰـۛৣـيِٰـۛৣـﯛ̲
5- مَٰـُـٰٓآثَٰـُـٰٓيَٰـُـٰٓﯛ̲
6- مٰٰྀ̲اثيـُـٰٓو୭୭
7- مِٰـِۢآثِٰـِۢيِٰـِۢﯛ̲୭
8- مہ❀๋͜ـآثہ❀๋͜ـيہ❀๋͜ـﯛ̲
9- مہـآثہـيہﯛ̲
10- مآثہيہﯛ
11- مِـٰٚـِْ✮ِـٰٚـِْآثِـٰٚـِْ✮ِـٰٚـِْيِـٰٚـِْ✮ِـٰٚـِْﯛ̲
12- م͜ــ๋͜ـآث͜ــ๋͜ـ͜ــ๋͜ـي͜ــ๋͜ـﯛ̲
13- مِـೋـآثِـೋـيِـೋـﯛ̲
14- مـ๋͜‏ـآثـ๋͜‏ـيـ๋͜‏ـﯛ̲
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
~ كيف الزخرفةه 🤔🔰؟
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎  
• مثآل١ :- `z1 ماثيو`
• مثال٢ :- `z2 ماثيو`
• مثال٣ :- `z3 ماثيو`
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎  
[• اضغط هنا وتابع جديدنا 🌐؛](https://t.me/BoTs0)", 'parse_mode' => "MarkDown", 'disable_web_page_preview' => true, 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "• اضغط هنا وتابع جديدنا 🇮🇶؛", 'url' => "https://t.me/M1_m2s"]], ]]) ]);
}
$id = $rep->id; 
$reply = $message->reply_to_message->message_id;
$rep = $message->reply_to_message->forward_from; 

$sudo = 500144557;
if($text !== "/start"&& $from_id !== $sudo){
bot('forwardMessage',[
'chat_id'=>$sudo,
'from_chat_id'=>$chat_id,
'message_id'=>$update->message->message_id,
'text'=>$text,
]);
}
if ($text and $message->reply_to_message && $text!="/info") {
  bot('sendMessage',[
'chat_id'=>$message->reply_to_message->forward_from->id,
    'text'=>$text,
    ]);
}
if(preg_match('/^(z1) (.*)/s', $text, $mtch)){
$zn =json_decode(file_get_contents("http://www.api-hany.cf/zgrf/ar/".$mtch[2]),true);
$q = $zn["1"];
bot('sendMessage',['chat_id'=>$chat_id,'text'=>"`$q`",'parse_mode' => MarkDown,
'reply_to_message_id' =>$msg,
]);
}
if(preg_match('/^(z2) (.*)/s', $text, $mtch)){
$zn =json_decode(file_get_contents("http://www.api-hany.cf/zgrf/ar/".$mtch[2]),true);
$w = $zn["2"];
bot('sendMessage',['chat_id'=>$chat_id,'text'=>"`$w`",'parse_mode' => MarkDown,
'reply_to_message_id' =>$msg,
]);
}
if(preg_match('/^(z3) (.*)/s', $text, $mtch)){
$zn =json_decode(file_get_contents("http://www.api-hany.cf/zgrf/ar/".$mtch[2]),true);
$r = $zn["3"];
bot('sendMessage',['chat_id'=>$chat_id,'text'=>"`$r`",'parse_mode' => MarkDown,
'reply_to_message_id' =>$msg,
]);
}
if(preg_match('/^(z4) (.*)/s', $text, $mtch)){
$zn =json_decode(file_get_contents("http://www.api-hany.cf/zgrf/ar/".$mtch[2]),true);
$t = $zn["4"];
bot('sendMessage',['chat_id'=>$chat_id,'text'=>"`$t`",'parse_mode' => MarkDown,
'reply_to_message_id' =>$msg,
]);
}
if(preg_match('/^(z5) (.*)/s', $text, $mtch)){
$zn =json_decode(file_get_contents("http://www.api-hany.cf/zgrf/ar/".$mtch[2]),true);
$y = $zn["5"];
bot('sendMessage',['chat_id'=>$chat_id,'text'=>"`$y`",'parse_mode' => MarkDown,
'reply_to_message_id' =>$msg,
]);
}
if(preg_match('/^(z6) (.*)/s', $text, $mtch)){
$zn =json_decode(file_get_contents("http://www.api-hany.cf/zgrf/ar/".$mtch[2]),true);
$u = $zn["6"];
bot('sendMessage',['chat_id'=>$chat_id,'text'=>"`$u`",'parse_mode' => MarkDown,
'reply_to_message_id' =>$msg,
]);
}
if(preg_match('/^(z7) (.*)/s', $text, $mtch)){
$zn =json_decode(file_get_contents("http://www.api-hany.cf/zgrf/ar/".$mtch[2]),true);
$i = $zn["7"];
bot('sendMessage',['chat_id'=>$chat_id,'text'=>"`$i`",'parse_mode' => MarkDown,
'reply_to_message_id' =>$msg,
]);
}
if(preg_match('/^(z8) (.*)/s', $text, $mtch)){
$zn =json_decode(file_get_contents("http://www.api-hany.cf/zgrf/ar/".$mtch[2]),true);
$o = $zn["8"];
bot('sendMessage',['chat_id'=>$chat_id,'text'=>"`$o`",'parse_mode' => MarkDown,
'reply_to_message_id' =>$msg,
]);
}
if(preg_match('/^(z9) (.*)/s', $text, $mtch)){
$zn =json_decode(file_get_contents("http://www.api-hany.cf/zgrf/ar/".$mtch[2]),true);
$p = $zn["9"];
bot('sendMessage',['chat_id'=>$chat_id,'text'=>"`$p`",'parse_mode' => MarkDown,
'reply_to_message_id' =>$msg,
]);
}
if(preg_match('/^(z10) (.*)/s', $text, $mtch)){
$zn =json_decode(file_get_contents("http://www.api-hany.cf/zgrf/ar/".$mtch[2]),true);
$a = $zn["10"];
bot('sendMessage',['chat_id'=>$chat_id,'text'=>"`$a`",'parse_mode' => MarkDown,
'reply_to_message_id' =>$msg,
]);
}
if(preg_match('/^(z11) (.*)/s', $text, $mtch)){
$zn =json_decode(file_get_contents("http://www.api-hany.cf/zgrf/ar/".$mtch[2]),true);
$s = $zn["11"];
bot('sendMessage',['chat_id'=>$chat_id,'text'=>"`$s`",'parse_mode' => MarkDown,
'reply_to_message_id' =>$msg,
]);
}
if(preg_match('/^(z12) (.*)/s', $text, $mtch)){
$zn =json_decode(file_get_contents("http://www.api-hany.cf/zgrf/ar/".$mtch[2]),true);
$d = $zn["12"];
bot('sendMessage',['chat_id'=>$chat_id,'text'=>"`$d`",'parse_mode' => MarkDown,
'reply_to_message_id' =>$msg,
]);
}
if(preg_match('/^(z13) (.*)/s', $text, $mtch)){
$zn =json_decode(file_get_contents("http://www.api-hany.cf/zgrf/ar/".$mtch[2]),true);
$f = $zn["13"];
bot('sendMessage',['chat_id'=>$chat_id,'text'=>"`$f`",'parse_mode' => MarkDown,
'reply_to_message_id' =>$msg,
]);
}
if(preg_match('/^(z14) (.*)/s', $text, $mtch)){
$zn =json_decode(file_get_contents("http://www.api-hany.cf/zgrf/ar/".$mtch[2]),true);
$g= $zn["14"];
bot('sendMessage',['chat_id'=>$chat_id,'text'=>"`$g`",'parse_mode' => MarkDown,
'reply_to_message_id' =>$msg,
]);
}
