<?php
    date_default_timezone_set("Europe/Berlin");
    $chart = $_POST["chart"];
    $timespan = $_POST["lol"];
    // date_modify() kann keine Kommazahlen verarbeiten
    if ($timespan >= 1 && $timespan <= 12) {
        $wtf = round((60 * $timespan * 60) / 26);
    }
    elseif ($timespan >= 24) {
        $wtf = round(($timespan *60) / 26);
    }
    $data = [
        "labels" => [],
        "data" => [
            "measured" => [],
            "highest" => [],
            "lowest" => [],
            "middle" => []
        ]
    ];
    $date = date_create();
    array_push($data["labels"], date_format($date, "H:i:s"));
    $highestValue = random_int(80, 100);
    $lowestValue = random_int(0, 20);
    $measuredValue = random_int($lowestValue +1, $highestValue -1);
    $middleValue = random_int($measuredValue -5, $measuredValue +5);
    //$data["data"]["measured"] = ["x" => $data["labels"][array_key_first($data["labels"])], "y" => $measuredValue];
    //$data["data"]["middle"] = ["x" => $data["labels"][array_key_first($data["labels"])], "y" => $middleValue];
    for ($i = 1; $i <= 25; $i++) {
        $data["data"]["measured"][] = ["x" => $data["labels"][array_key_last($data["labels"])], "y" => random_int($lowestValue +1, $highestValue -1)];
        $data["data"]["middle"][] = ["x" => $data["labels"][array_key_last($data["labels"])], "y" => $middleValue];
        date_modify($date, "+$wtf seconds");
        array_push($data["labels"], date_format($date, "H:i:s"));
    }
    $data["data"]["highest"][] = ["x" => $data["labels"][array_rand($data["labels"])], "y" => $highestValue];
    $data["data"]["lowest"][] = ["x" => $data["labels"][array_rand($data["labels"])], "y" => $lowestValue];
    echo json_encode($data);
    return;
?>