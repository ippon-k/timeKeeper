<?php


function is_positive_integer($after)
{
    $options = ['options' => ['min_range' => 1]];
    return is_int(filter_var(
        $after,
        \FILTER_VALIDATE_INT,
        $options
    ));
}

$start_time = strtotime("8:59:00"); //始業時刻
$end_time = strtotime("19:01:00"); //終業時刻

$actual_time = (($end_time - $start_time) / 60); //実働時間（min)
$prescribed_time = (600);

var_dump("実働時間（分）" . $actual_time);
$before = ((strtotime("9:00:00") - $start_time) / 60);

var_dump("早朝残業（分）" . $before);
$over_time = ($actual_time - $prescribed_time); //所定労働時間より超過した時間(実働ー９h)残業申請の18時を切り上げるトリガー

var_dump("残業時間（分）" . $over_time);
$after = $over_time - $before;
// var_dump("要残業申請" . $after);

$positive_after = is_positive_integer($after);
// var_dump($positive_after);
if ($positive_after) {
    echo $after . '分の残業申請要す';
} else {
    echo '残業実施不要';
}
