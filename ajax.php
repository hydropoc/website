<?php
    date_default_timezone_set("Europe/Berlin");
    $labels = json_decode($_POST["labels"], true);
    $actuator = json_decode($_POST["actuator"], true);
    // Sollwerte
    $setpoints = [
        "co2" => 60,
        "temperature" => 33,
        "salinity" => 20,
        "waterlevel" => 10,
        "ventilation" => 50,
        "ph" => 10,
        "brightness" => 50
    ];
    if (is_array($labels)) {
        $labelCount = count($labels);
        if ($labelCount >= 13) {
            /*
            Funktioniert nicht, weil dadurch alle vorherigen Einträge ersetzt werden
            $lastLabel = $labels[array_key_last($labels)];
            $labels = [];
            $date = date_create(date_format(date_create(), "d.m.Y") . " " . $lastLabel);
            array_push($labels, date_format($date, "H:i:s"));
            for ($i = 1; $i <= 12; $i++) {
                date_modify($date, "+5 seconds");
                array_push($labels, date_format($date, "H:i:s"));
            }
            */
            if ($labelCount > 13) {
                while (count($labels) > 13) {
                    array_shift($labels);
                }
            }
            $lastLabel = $labels[array_key_last($labels)];
            $date = date_create(date_format(date_create(), "d.m.Y") . " " . $lastLabel);
            date_modify($date, "+5 seconds");
            array_shift($labels);
            array_push($labels, date_format($date, "H:i:s"));
        }
        elseif ($labelCount < 1 || $labelCount < 13) {
            $labels = [];
            $date = date_create();
            array_push($labels, date_format($date, "H:i:s"));
            for ($i = 1; $i <= 12; $i++) {
                date_modify($date, "+5 seconds");
                array_push($labels, date_format($date, "H:i:s"));
            }
        }
    }
    // "Programm" für Aktoren erzeugen als Objekte: ["00:00:05" => ["y" => "00:00:05", "x" => random_int()]]
    // Objekte immer zwischen Client und Server senden und anpassen (Schlüssel entfernen und hinzufügen wie bei AKtualisierung der Label)

    // key z.B. co2, value z.B. 60
    foreach ($setpoints as $key => $value) {
        if (array_key_exists($key, $actuator)) {
            // Wenn Simulation bereits läuft, Restwert berechnen und hinzufügen
            if (array_key_exists("enabled", $actuator[$key]) && $actuator[$key]["enabled"] == 1) {
                // Wenn fertig, enabled auf 0 setzen
            }
            else {
                // Wennn Simulation nicht läuft, zufallsbedingt starten
                if (random_int(0, 5) == 1) {
                    // Zufallsbedingte Dauer des Aktors festlegen (Spanne von N Label, steigende Aktorleistung parallel mit steigendem aktuellen Wert)
                    $actuator[$key]["enabled"] = 1;
                    $actuatorDuration = random_int(4, 7);
                    $currentValues = [];
                    $startLabel = array_rand($labels);
                    $actuator[$key]["count"] = $actuatorDuration; // Muss immer weiter sinken pro Serveranfrage
                    // Zu hohen Wert normalisieren (80+)
                    if (random_int(0, 1) == 1) {
                        // Muss für jedes Diagramm gemacht werden (co2, temperature...)
                        $wtf = random_int(80, 100);
                        $difference = $wtf - $value;
                        // wtf müssen immer weiter sinken
                        $lol = $difference / $actuatorDuration; // Ermitteln, um wie viel der Wert pro Label sinken kann
                        $currentValues[] = [$labels[$startLabel] => $lol];
                        for ($i = 1; $i < $actuatorDuration; $i++) {
                            $currentValues[] = [$labels[$i] => $lol];
                        }
                    }
                    // Zu niedrigen Wert normalisieren (20-)
                    /*
                    else {
                        $wtf = 20;
                        for ($i = 1; $i <= $actuatorDuration; $i++) {
                            // wtf darf nie vor Schleifenende auf Sollwert steigen!
                            $wtf -= 0;
                            if (count($currentValues) >= 1) {
                               // array_push($currentValues, )
                            }
                            else {
                                //
                            }
                        }
                    }*/
                    $actuator[$key]["values"] = $currentValues;
                    //array_push($currentValues, (count($currentValues) >= 1 ? random_int($currentValues[array_key_last($currentValues)] + $i, $currentValues[array_key_last($currentValues)] + random_int(1,5)) : random_int(1 ,10)));
                }
                else {
                    // Zufallsdaten ohne Aktoren erzeugen
                    $current = ["x" => $labels[array_key_last($labels)], "y" => rand(5,95)];
                    $middle = ["x" => $labels[array_key_last($labels)], "y" => rand(50,53)];
                }
            }
        }
    }
    $data = [
        "co2" => [
            "labels" => [
                "current" => $labels
            ],
            "data" => [
                "current" => ["x" => $labels[array_key_last($labels)], "y" => rand(5,95)], // Aktueller Wert
                "setpoint" => ["x" => $labels[array_key_last($labels)], "y" => 52], // Sollwert
                "middle" => ["x" => $labels[array_key_last($labels)], "y" => rand(50,53)], // Mittelwert
                "upperControlLimit" => ["x" => $labels[array_key_last($labels)], "y" => 90],
                "upperWarningLimit" => ["x" => $labels[array_key_last($labels)], "y" => 80],
                "lowerControlLimit" => ["x" => $labels[array_key_last($labels)], "y" => 10],
                "lowerWarningLimit" => ["x" => $labels[array_key_last($labels)], "y" => 20],
                "actuator" => null
            ]
        ],
        "temperature" => [
            "labels" => [
                "current" => $labels
            ],
            "data" => [
                "current" => ["x" => $labels[array_key_last($labels)], "y" => rand(5,95)], // Aktueller Wert
                "setpoint" => ["x" => $labels[array_key_last($labels)], "y" => 52], // Sollwert
                "middle" => ["x" => $labels[array_key_last($labels)], "y" => rand(50,53)], // Mittelwert
                "upperControlLimit" => ["x" => $labels[array_key_last($labels)], "y" => 90],
                "upperWarningLimit" => ["x" => $labels[array_key_last($labels)], "y" => 80],
                "lowerControlLimit" => ["x" => $labels[array_key_last($labels)], "y" => 10],
                "lowerWarningLimit" => ["x" => $labels[array_key_last($labels)], "y" => 20],
                "actuator" => null
            ]
        ],
        "salinity" => [
            "labels" => [
                "current" => $labels
            ],
            "data" => [
                "current" => ["x" => $labels[array_key_last($labels)], "y" => rand(5,95)], // Aktueller Wert
                "setpoint" => ["x" => $labels[array_key_last($labels)], "y" => 52], // Sollwert
                "middle" => ["x" => $labels[array_key_last($labels)], "y" => rand(50,53)], // Mittelwert
                "upperControlLimit" => ["x" => $labels[array_key_last($labels)], "y" => 90],
                "upperWarningLimit" => ["x" => $labels[array_key_last($labels)], "y" => 80],
                "lowerControlLimit" => ["x" => $labels[array_key_last($labels)], "y" => 10],
                "lowerWarningLimit" => ["x" => $labels[array_key_last($labels)], "y" => 20],
                "actuator" => null
            ]
        ],
        "waterlevel" => [
            "labels" => [
                "current" => $labels
            ],
            "data" => [
                "current" => ["x" => $labels[array_key_last($labels)], "y" => rand(5,95)], // Aktueller Wert
                "setpoint" => ["x" => $labels[array_key_last($labels)], "y" => 52], // Sollwert
                "middle" => ["x" => $labels[array_key_last($labels)], "y" => rand(50,53)], // Mittelwert
                "upperControlLimit" => ["x" => $labels[array_key_last($labels)], "y" => 90],
                "upperWarningLimit" => ["x" => $labels[array_key_last($labels)], "y" => 80],
                "lowerControlLimit" => ["x" => $labels[array_key_last($labels)], "y" => 10],
                "lowerWarningLimit" => ["x" => $labels[array_key_last($labels)], "y" => 20],
                "actuator" => null
            ]
        ],
        "ph" => [
            "labels" => [
                "current" => $labels
            ],
            "data" => [
                "current" => ["x" => $labels[array_key_last($labels)], "y" => rand(8,10)], // Aktueller Wert
                "setpoint" => ["x" => $labels[array_key_last($labels)], "y" => 9], // Sollwert
                "middle" => ["x" => $labels[array_key_last($labels)], "y" => rand(8,11)], // Mittelwert
                "upperControlLimit" => ["x" => $labels[array_key_last($labels)], "y" => 13],
                "upperWarningLimit" => ["x" => $labels[array_key_last($labels)], "y" => 12],
                "lowerControlLimit" => ["x" => $labels[array_key_last($labels)], "y" => 8],
                "lowerWarningLimit" => ["x" => $labels[array_key_last($labels)], "y" => 9],
                "actuator" => null
            ]
        ],
        "ventilation" => [
            "labels" => [
                "current" => $labels
            ],
            "data" => [
                "current" => ["x" => $labels[array_key_last($labels)], "y" => rand(5,95)], // Aktueller Wert
                "setpoint" => ["x" => $labels[array_key_last($labels)], "y" => 52], // Sollwert
                "middle" => ["x" => $labels[array_key_last($labels)], "y" => rand(50,53)], // Mittelwert
                "upperControlLimit" => ["x" => $labels[array_key_last($labels)], "y" => 90],
                "upperWarningLimit" => ["x" => $labels[array_key_last($labels)], "y" => 80],
                "lowerControlLimit" => ["x" => $labels[array_key_last($labels)], "y" => 10],
                "lowerWarningLimit" => ["x" => $labels[array_key_last($labels)], "y" => 20],
                "actuator" => null
            ]
        ],
        "brightness" => [
            "labels" => [
                "current" => $labels
            ],
            "data" => [
                "current" => ["x" => $labels[array_key_last($labels)], "y" => rand(5,95)], // Aktueller Wert
                "setpoint" => ["x" => $labels[array_key_last($labels)], "y" => 52], // Sollwert
                "middle" => ["x" => $labels[array_key_last($labels)], "y" => rand(50,53)], // Mittelwert
                "upperControlLimit" => ["x" => $labels[array_key_last($labels)], "y" => 90],
                "upperWarningLimit" => ["x" => $labels[array_key_last($labels)], "y" => 80],
                "lowerControlLimit" => ["x" => $labels[array_key_last($labels)], "y" => 10],
                "lowerWarningLimit" => ["x" => $labels[array_key_last($labels)], "y" => 20],
                "actuator" => null
            ]
        ]
    ];
    echo json_encode($data);
    return;
?>