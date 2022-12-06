<?php

// $time = date("Y/m/d H;i");

// echo $time;
// echo 'hyouji';

// $start_time = strtotime("2022-12-03 8:20:00"); //始業時刻
// $end_time = strtotime("2022-12-03 18:00:00"); //終業時刻
// $actual_time = (($end_time - $start_time) / 60); //実働時間（min)
// $prescribed_time = (540);
// var_dump($actual_time);
// $over_time = $actual_time - $prescribed_time; //所定労働時間より超過した時間(実働ー９h)残業申請の18時を切り上げるトリガー
// var_dump($over_time);

// $a_overtime = '';

$start_time = strtotime("8:23:00"); //始業時刻
$end_time = strtotime("18:01:00"); //終業時刻
$actual_time = (($end_time - $start_time) / 60); //実働時間（min)
$prescribed_time = (600);
var_dump("実働時間（分）" . $actual_time);
$over_time = ($actual_time - $prescribed_time); //所定労働時間より超過した時間(実働ー９h)残業申請の18時を切り上げるトリガー
var_dump("残業時間（分）" . $over_time);
$before = ((strtotime("9:00:00") - $start_time) / 60);
var_dump("早朝残業（分）" . $before);
$after = $over_time - $before;
var_dump("要残業申請" . $after);
if ($after > 0) {
    echo '残業実施不要';
} else {
    echo $after . '分の残業申請要す';
}
