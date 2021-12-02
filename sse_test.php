<?php
    date_default_timezone_set("Europe/Berlin");
    header('Content-Type: text/event-stream');
    header('Cache-Control: no-cache');
    while (true) {
        $date = date_create();
        $anotherDate = clone $date;
        $labels = [];
        // neue daten liegen HINTER aktuellen, weil die aktuellen 1 min. im voraus berechnet werden,
        // aber die neuen anhand der aktuellen zeit erzeugt werden!
        for ($i = 1; $i <= 12; $i++) {
            $labels[] = date_format($date, "H:i:s");
            date_modify($date, "+5 seconds");
        }
        $data = [
            "co2" => [
                "labels" => [
                    "current" => $labels
                ],
                "data" => [
                    "current" => ["x" => date_format($anotherDate, "H:i:s"), "y" => rand(10,70)]
                ]
            ]
            /*,
            "temperature" => [
                "current" => ["date" => date_format($date, 'd.m.Y@H:i:s'), "value" => rand(10,70)],
                "history" => ["date" => date_format($date, 'd.m.Y@H:i:s'), "value" => rand(10,70)]
            ]
            */
        ];
        echo 'data:' . json_encode($data) . "\n\n";
        ob_end_flush();
        flush();
        if (connection_aborted()) {
            break;
        }
        sleep(5);
    }
?>
