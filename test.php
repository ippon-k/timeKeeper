<?php

$time = date("Y/m/d H;i");

echo $time;
echo 'hyouji';

$start_time = strtotime("2022-12-03 8:20:00"); //始業時刻
$end_time = strtotime("2022-12-03 18:00:00"); //終業時刻
$actual_time = (($end_time - $start_time) / 60); //実働時間（min)
$prescribed_time = (540);
var_dump($actual_time);
$over_time = $actual_time - $prescribed_time; //所定労働時間より超過した時間(実働ー９h)残業申請の18時を切り上げるトリガー
var_dump($over_time);

// $a_overtime = '';
