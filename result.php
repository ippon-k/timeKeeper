<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>objects</title>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script> -->
  <!-- <link rel="stylesheet" href="css/reset.css"> -->
  <link rel="stylesheet" href="style.css">

</head>

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

$start_time = strtotime($_POST["start_time"]); // 始業時間
$end_time = strtotime($_POST["end_time"]); //終業時間

// echo $start_time . "/start/";
// echo $end_time . "/end/";

$actual_time = (($end_time - $start_time) / 60); //実働時間（min)
// echo $actual_time . "*check*";
$prescribed_time = (600);

// var_dump("実働時間（分）" . $actual_time);
$before = ((strtotime("9:00:00") - $start_time) / 60);

// var_dump("早朝残業（分）" . $before);
$over_time = ($actual_time - $prescribed_time); //所定労働時間より超過した時間(実働ー９h)残業申請の18時を切り上げるトリガー

// var_dump("残業時間（分）" . $over_time);
// echo var_dump("*要残業申請*" . $over_time);

$positive_after = is_positive_integer($over_time);
// var_dump($positive_after);
if ($positive_after) {
  // echo $over_time . '分の残業申請要す';
  $after_txt = $over_time . 'minの残業申請要す';
} else {
  // echo '残業実施不要';
  $after_txt = '残業実施不要';
}
?>

<body>
  <div>
    <h1>work time checker</h1>
    <p>please insert</p>
    <p>始業時間：<?= $_POST["start_time"] ?></p>
    <p>終業時間：<?= $_POST["end_time"] ?></p>
    <p>稼働時間（休憩含む）：<?= $actual_time ?>min</p>
    <p>早朝残業：<?= $before ?>min</p>
    <p>残業：<?= $after_txt ?></p>
    <a href=" index.html">back</a>
  </div><br>

</body>

</html>
