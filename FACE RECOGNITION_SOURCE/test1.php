<?php


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.kairos.com/v2/media?source=https://d165vjqq8ey7jy.cloudfront.net/images-uploaded/32807/english_practice_be_happy__large.jpg");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_POST, TRUE);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "app_id: c73b7d69",
  "app_key: b944d41b59fe1c9eea928fb0691f6b9a"
));

$emotion = curl_exec($ch);

$emotion_array = json_decode($emotion);

var_dump($emotion);

/*
if($emotion_array->frames[0]->people[0]->emotions->anger > $emotion_array->frames[0]->people[0]->emotions->disgust and $emotion_array->frames[0]->people[0]->emotions->anger > $emotion_array->frames[0]->people[0]->emotions->fear and $emotion_array->frames[0]->people[0]->emotions->anger > $emotion_array->frames[0]->people[0]->emotions->joy and $emotion_array->frames[0]->people[0]->emotions->anger > $emotion_array->frames[0]->people[0]->emotions->sadness and $emotion_array->frames[0]->people[0]->emotions->anger > $emotion_array->frames[0]->people[0]->emotions->suprise )
 {
   $final_emotion="Emotion";
 }
 elseif($emotion_array->frames[0]->people[0]->emotions->disgust > $emotion_array->frames[0]->people[0]->emotions->fear and $emotion_array->frames[0]->people[0]->emotions->disgust > $emotion_array->frames[0]->people[0]->emotions->joy and $emotion_array->frames[0]->people[0]->emotions->disgust > $emotion_array->frames[0]->people[0]->emotions->sadness and $emotion_array->frames[0]->people[0]->emotions->disgust > $emotion_array->frames[0]->people[0]->emotions->suprise)
{
  $final_emotion="Disgust";

}
elseif($emotion_array->frames[0]->people[0]->emotions->fear > $emotion_array->frames[0]->people[0]->emotions->joy and $emotion_array->frames[0]->people[0]->emotions->fear > $emotion_array->frames[0]->people[0]->emotions->sadness and $emotion_array->frames[0]->people[0]->emotions->fear > $emotion_array->frames[0]->people[0]->emotions->suprise)
{
  $final_emotion="Fear";

}
elseif($emotion_array->frames[0]->people[0]->emotions->joy > $emotion_array->frames[0]->people[0]->emotions->sadness and $emotion_array->frames[0]->people[0]->emotions->joy > $emotion_array->frames[0]->people[0]->emotions->suprise)
{
  $final_emotion="Joy";

}
elseif($emotion_array->frames[0]->people[0]->emotions->sadness > $emotion_array->frames[0]->people[0]->emotions->suprise)
{
  $final_emotion="Sadness";

}
else
{
  $final_emotion="Suprise";

}*/
 curl_close($ch);

?>