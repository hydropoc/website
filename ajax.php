<?php
    date_default_timezone_set("Europe/Berlin");
    $labels = json_decode($_POST["labels"], true);
    $actuators = json_decode($_POST["actuators"], true);
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
    // Objekte immer zwischen Client und Server senden und anpassen (Schlüssel entfernen und hinzufügen wie bei AKtualisierung der Label)

    // key z.B. co2, value z.B. 60
    foreach ($setpoints as $key => $value) {
        //co2 . "=" . 60;
        if (array_key_exists($key, $actuators)) {
            // Wenn Simulation bereits läuft, Restwert berechnen und hinzufügen
            if ($actuators[$key]["enabled"] == 1) {
                $actuators[$key]["count"] -= 1;
                $actuators[$key]["value"] = ($actuators[$key]["method"] == "reduce" ? $actuators[$key]["value"] - $actuators[$key]["factor"] : $actuators[$key]["value"] + $actuators[$key]["factor"]);
                $actuators[$key]["data"] = ["x" => $labels[array_key_last($labels)], "y" => $actuators[$key]["value"]];
            }
            else {
                // Wennn Simulation nicht läuft, zufallsbedingt starten
                if (random_int(0, 3) == 1) {
                    // Zufallsbedingte Dauer des Aktors festlegen (Spanne von N Label, steigende Aktorleistung parallel mit steigendem aktuellen Wert)
                    $actuators[$key]["enabled"] = 1;
                    $actuatorDuration = random_int(5, 10); //soll auch länger dauern können als anzahl label
                    $currentValues = [];
                    $actuators[$key]["count"] = $actuatorDuration; // Muss immer weiter sinken pro Serveranfrage
                    // Zu hohen Wert normalisieren (80+)
                    if (random_int(0, 1) == 1) {
                        // Muss für jedes Diagramm gemacht werden (co2, temperature...)
                        $wtf = random_int(80, 100);
                        $difference = $wtf - $value; // Differenz zwischen Sollwert und Zufallswert
                        // wtf müssen immer weiter sinken
                        $lol = $difference / $actuatorDuration; // Ermitteln, um wie viel der Wert pro Label sinken wird
                        $actuators[$key]["method"] = "reduce";
                        $actuators[$key]["factor"] = $lol;
                        $actuators[$key]["value"] = $wtf; // Muss immer mittels $lol weiter gesenkt werden pro Serveranfrage
                        $actuators[$key]["data"] = ["x" => $labels[array_key_last($labels)], "y" => $actuators[$key]["value"]];
                    }
                    // Zu niedrigen Wert normalisieren (20-)
                    else {
                        $wtf = random_int(10, 20);
                        $difference = $value - $wtf; // Differenz zwischen Sollwert und Zufallswert
                        // wtf müssen immer weiter sinken
                        $lol = $difference / $actuatorDuration; // Ermitteln, um wie viel der Wert pro Label sinken wird
                        $actuators[$key]["method"] = "raise";
                        $actuators[$key]["factor"] = $lol;
                        $actuators[$key]["value"] = $wtf; // Muss immer mittels $lol weiter gesenkt werden pro Serveranfrage
                        $actuators[$key]["data"] = ["x" => $labels[array_key_last($labels)], "y" => $actuators[$key]["value"]];
                    }
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
                "actuator" => $actuators["co2"]
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
                "actuator" => $actuators["temperature"]
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
                "actuator" => $actuators["salinity"]
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
                "actuator" => $actuators["waterlevel"]
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
                "actuator" => $actuators["ph"]
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
                "actuator" => $actuators["ventilation"]
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
                "actuator" => $actuators["brightness"]
            ]
        ]
    ];
    echo json_encode($data);
    return;
?>