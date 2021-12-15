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
        "ph" => 30,
        "brightness" => 50
    ];
    $limits = [
        "co2" => [
            "upperControlLimit" => 90,
            "upperWarningLimit" => 80,
            "lowerControlLimit" => 10,
            "lowerWarningLimit" => 20
        ],
        "temperature" => [
            "upperControlLimit" => 90,
            "upperWarningLimit" => 80,
            "lowerControlLimit" => 10,
            "lowerWarningLimit" => 20
        ],
        "salinity" => [
            "upperControlLimit" => 90,
            "upperWarningLimit" => 80,
            "lowerControlLimit" => 10,
            "lowerWarningLimit" => 20
        ],
        "waterlevel" => [
            "upperControlLimit" => 90,
            "upperWarningLimit" => 80,
            "lowerControlLimit" => 10,
            "lowerWarningLimit" => 20
        ],
        "ventilation" => [
            "upperControlLimit" => 90,
            "upperWarningLimit" => 80,
            "lowerControlLimit" => 10,
            "lowerWarningLimit" => 20
        ],
        "ph" => [
            "upperControlLimit" => 90,
            "upperWarningLimit" => 80,
            "lowerControlLimit" => 10,
            "lowerWarningLimit" => 20
        ],
        "brightness" => [
            "upperControlLimit" => 90,
            "upperWarningLimit" => 80,
            "lowerControlLimit" => 10,
            "lowerWarningLimit" => 20
        ]
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
                if (random_int(0, 5) == 1) {
                    // Zufallsbedingte Dauer des Aktors festlegen (Spanne von N Label, steigende Aktorleistung parallel mit steigendem aktuellen Wert)
                    $actuators[$key]["enabled"] = 1;
                    $actuatorDuration = random_int(5, 10); //soll auch länger dauern können als anzahl label
                    $currentValues = [];
                    $actuators[$key]["count"] = $actuatorDuration; // Muss immer weiter sinken pro Serveranfrage
                    // Zu hohen Wert normalisieren (80+)
                    if (random_int(0, 1) == 1) {
                        // Muss für jedes Diagramm gemacht werden (co2, temperature...)
                        $wtf = random_int($limits[$key]["upperControlLimit"], 100);
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
                        $wtf = random_int(0, $limits[$key]["lowerControlLimit"]);
                        $difference = $value - $wtf; // Differenz zwischen Sollwert und Zufallswert
                        // wtf müssen immer weiter sinken
                        $lol = $difference / $actuatorDuration; // Ermitteln, um wie viel der Wert pro Label sinken wird
                        $actuators[$key]["method"] = "raise";
                        $actuators[$key]["factor"] = $lol;
                        $actuators[$key]["value"] = $wtf; // Muss immer mittels $lol weiter gesenkt werden pro Serveranfrage
                        $actuators[$key]["data"] = ["x" => $labels[array_key_last($labels)], "y" => $actuators[$key]["value"]];
                    }
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
                "current" => ["x" => $labels[array_key_last($labels)], "y" => rand($setpoints["co2"] -10, $setpoints["co2"] +10)], // Aktueller Wert
                "setpoint" => ["x" => $labels[array_key_last($labels)], "y" => $setpoints["co2"]], // Sollwert
                "middle" => ["x" => $labels[array_key_last($labels)], "y" => rand($setpoints["co2"] -1, $setpoints["co2"] +1)], // Mittelwert
                "upperControlLimit" => ["x" => $labels[array_key_last($labels)], "y" => $limits["co2"]["upperControlLimit"]],
                "upperWarningLimit" => ["x" => $labels[array_key_last($labels)], "y" => $limits["co2"]["upperWarningLimit"]],
                "lowerControlLimit" => ["x" => $labels[array_key_last($labels)], "y" => $limits["co2"]["lowerControlLimit"]],
                "lowerWarningLimit" => ["x" => $labels[array_key_last($labels)], "y" => $limits["co2"]["lowerWarningLimit"]],
                "actuator" => $actuators["co2"]
            ]
        ],
        "temperature" => [
            "labels" => [
                "current" => $labels
            ],
            "data" => [
                "current" => ["x" => $labels[array_key_last($labels)], "y" => rand($setpoints["temperature"] -10, $setpoints["temperature"] +10)], // Aktueller Wert
                "setpoint" => ["x" => $labels[array_key_last($labels)], "y" => $setpoints["temperature"]], // Sollwert
                "middle" => ["x" => $labels[array_key_last($labels)], "y" => rand($setpoints["temperature"] -1, $setpoints["temperature"] +1)], // Mittelwert
                "upperControlLimit" => ["x" => $labels[array_key_last($labels)], "y" => $limits["temperature"]["upperControlLimit"]],
                "upperWarningLimit" => ["x" => $labels[array_key_last($labels)], "y" => $limits["temperature"]["upperWarningLimit"]],
                "lowerControlLimit" => ["x" => $labels[array_key_last($labels)], "y" => $limits["temperature"]["lowerControlLimit"]],
                "lowerWarningLimit" => ["x" => $labels[array_key_last($labels)], "y" => $limits["temperature"]["lowerWarningLimit"]],
                "actuator" => $actuators["temperature"]
            ]
        ],
        "salinity" => [
            "labels" => [
                "current" => $labels
            ],
            "data" => [
                "current" => ["x" => $labels[array_key_last($labels)], "y" => rand($setpoints["salinity"] -10, $setpoints["salinity"] +10)], // Aktueller Wert
                "setpoint" => ["x" => $labels[array_key_last($labels)], "y" => $setpoints["salinity"]], // Sollwert
                "middle" => ["x" => $labels[array_key_last($labels)], "y" => rand($setpoints["salinity"] -1, $setpoints["salinity"] +1)], // Mittelwert
                "upperControlLimit" => ["x" => $labels[array_key_last($labels)], "y" => $limits["salinity"]["upperControlLimit"]],
                "upperWarningLimit" => ["x" => $labels[array_key_last($labels)], "y" => $limits["salinity"]["upperWarningLimit"]],
                "lowerControlLimit" => ["x" => $labels[array_key_last($labels)], "y" => $limits["salinity"]["lowerControlLimit"]],
                "lowerWarningLimit" => ["x" => $labels[array_key_last($labels)], "y" => $limits["salinity"]["lowerWarningLimit"]],
                "actuator" => $actuators["salinity"]
            ]
        ],
        "waterlevel" => [
            "labels" => [
                "current" => $labels
            ],
            "data" => [
                "current" => ["x" => $labels[array_key_last($labels)], "y" => rand($setpoints["waterlevel"] -10, $setpoints["waterlevel"] +10)], // Aktueller Wert
                "setpoint" => ["x" => $labels[array_key_last($labels)], "y" => $setpoints["waterlevel"]], // Sollwert
                "middle" => ["x" => $labels[array_key_last($labels)], "y" => rand($setpoints["waterlevel"] -1, $setpoints["waterlevel"] +1)], // Mittelwert
                "upperControlLimit" => ["x" => $labels[array_key_last($labels)], "y" => $limits["waterlevel"]["upperControlLimit"]],
                "upperWarningLimit" => ["x" => $labels[array_key_last($labels)], "y" => $limits["waterlevel"]["upperWarningLimit"]],
                "lowerControlLimit" => ["x" => $labels[array_key_last($labels)], "y" => $limits["waterlevel"]["lowerControlLimit"]],
                "lowerWarningLimit" => ["x" => $labels[array_key_last($labels)], "y" => $limits["waterlevel"]["lowerWarningLimit"]],
                "actuator" => $actuators["waterlevel"]
            ]
        ],
        "ph" => [
            "labels" => [
                "current" => $labels
            ],
            "data" => [
                "current" => ["x" => $labels[array_key_last($labels)], "y" => rand($setpoints["ph"] -10, $setpoints["ph"] +10)], // Aktueller Wert
                "setpoint" => ["x" => $labels[array_key_last($labels)], "y" => $setpoints["ph"]], // Sollwert
                "middle" => ["x" => $labels[array_key_last($labels)], "y" => rand($setpoints["ph"] -1, $setpoints["ph"] +1)], // Mittelwert
                "upperControlLimit" => ["x" => $labels[array_key_last($labels)], "y" => $limits["ph"]["upperControlLimit"]],
                "upperWarningLimit" => ["x" => $labels[array_key_last($labels)], "y" => $limits["ph"]["upperWarningLimit"]],
                "lowerControlLimit" => ["x" => $labels[array_key_last($labels)], "y" => $limits["ph"]["lowerControlLimit"]],
                "lowerWarningLimit" => ["x" => $labels[array_key_last($labels)], "y" => $limits["ph"]["lowerWarningLimit"]],
                "actuator" => $actuators["ph"]
            ]
        ],
        "ventilation" => [
            "labels" => [
                "current" => $labels
            ],
            "data" => [
                "current" => ["x" => $labels[array_key_last($labels)], "y" => rand($setpoints["ventilation"] -10, $setpoints["ventilation"] +10)], // Aktueller Wert
                "setpoint" => ["x" => $labels[array_key_last($labels)], "y" => $setpoints["ventilation"]], // Sollwert
                "middle" => ["x" => $labels[array_key_last($labels)], "y" => rand($setpoints["ventilation"] -1, $setpoints["ventilation"] +1)], // Mittelwert
                "upperControlLimit" => ["x" => $labels[array_key_last($labels)], "y" => $limits["ventilation"]["upperControlLimit"]],
                "upperWarningLimit" => ["x" => $labels[array_key_last($labels)], "y" => $limits["ventilation"]["upperWarningLimit"]],
                "lowerControlLimit" => ["x" => $labels[array_key_last($labels)], "y" => $limits["ventilation"]["lowerControlLimit"]],
                "lowerWarningLimit" => ["x" => $labels[array_key_last($labels)], "y" => $limits["ventilation"]["lowerWarningLimit"]],
                "actuator" => $actuators["ventilation"]
            ]
        ],
        "brightness" => [
            "labels" => [
                "current" => $labels
            ],
            "data" => [
                "current" => ["x" => $labels[array_key_last($labels)], "y" => rand($setpoints["brightness"] -10, $setpoints["brightness"] +10)], // Aktueller Wert
                "setpoint" => ["x" => $labels[array_key_last($labels)], "y" => $setpoints["brightness"]], // Sollwert
                "middle" => ["x" => $labels[array_key_last($labels)], "y" => rand($setpoints["brightness"] -1, $setpoints["brightness"] +1)], // Mittelwert
                "upperControlLimit" => ["x" => $labels[array_key_last($labels)], "y" => $limits["brightness"]["upperControlLimit"]],
                "upperWarningLimit" => ["x" => $labels[array_key_last($labels)], "y" => $limits["brightness"]["upperWarningLimit"]],
                "lowerControlLimit" => ["x" => $labels[array_key_last($labels)], "y" => $limits["brightness"]["lowerControlLimit"]],
                "lowerWarningLimit" => ["x" => $labels[array_key_last($labels)], "y" => $limits["brightness"]["lowerWarningLimit"]],
                "actuator" => $actuators["brightness"]
            ]
        ]
    ];
    echo json_encode($data);
    return;
?>