<?php
    date_default_timezone_set("Europe/Berlin");
    $chart = $_POST["chart"];
    //$timespan = $_POST["timespan"]; // Stunden / 26 Label
    print_r($_POST["lol"]);
    if ($timespan >= 1 && $timespan <= 12) {
        $wtf = (60 * $timespan) / 26;
    }
    elseif ($timespan >= 24) {
        $wtf = $timespan / 26;
    }
    $data = ["labels" => [], "data" => []];
    $date = date_create();
    array_push($data["labels"], date_format($date, "H:i:s"));
    $data["data"][] = ["x" => $data["labels"][array_key_last($data["labels"])], "y" => random_int(0, 100)];
    for ($i = 1; $i <= 25; $i++) {
        date_modify($date, "+$wtf minutes");
        array_push($data["labels"], date_format($date, "H:i:s"));
        $data["data"][] = ["x" => $data["labels"][array_key_last($labels["data"])], "y" => random_int(0, 100)];
    }
    echo json_encode($data);
    return;
?>