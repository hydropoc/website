<?php
    date_default_timezone_set("Europe/Berlin");
    $labels = $_POST["labels"];
    $actuator = json_decode($_POST["actuator"], true);
    if (is_array($labels) && count($labels) >= 13) {
        $lastLabel = $labels[array_key_last($labels)];
        $date = date_create(date_format(date_create(), "d.m.Y") . " " . $lastLabel);
        date_modify($date, "+5 seconds");
        array_shift($labels);
        array_push($labels, date_format($date, "H:i:s"));
    }
    else {
        $labels = [];
        $date = date_create();
        array_push($labels, date_format($date, "H:i:s"));
        for ($i = 1; $i <= 12; $i++) {
            date_modify($date, "+5 seconds");
            array_push($labels, date_format($date, "H:i:s"));
        }
    }
    // Wenn Simulation bereits läuft
    if ($actuator["count"] >= 1) {
        //
    }
    else {
        // Wennn Simulation nicht läuft, zufallsbedingt starten
        if (random_int(0, 5) == 1) {
            // Zufallsbedingte Dauer des Aktors festlegen (Spanne von N Label, steigende Aktorleistung parallel mit steigendem aktuellen Wert)
            $actuatorDuration = random_int(4, 7);
            $currentValues = [];
            if (random_int(0, 1) == 1) {
                // Zu hohen Wert normalisieren (80+)
                $wtf = 80;
                for ($i = 1; $i <= $actuatorDuration; $i++) {
                    // wtf darf nie vor Schleifenende auf Sollwert sinken!
                    $wtf -= 0;
                    if (count($currentValues) >= 1) {
                        //
                    }
                    else {
                        //
                    }
                }
            }
            else {
                // Zu niedrigen Wert normalisieren (20-)
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
            }
            //array_push($currentValues, (count($currentValues) >= 1 ? random_int($currentValues[array_key_last($currentValues)] + $i, $currentValues[array_key_last($currentValues)] + random_int(1,5)) : random_int(1 ,10)));
        }
        else {
            // Zufallsdaten ohne Aktoren erzeugen
            $current = ["x" => $labels[array_key_last($labels)], "y" => rand(5,95)];
            $middle = ["x" => $labels[array_key_last($labels)], "y" => rand(50,53)];
        }
    }
    $data = [
        "co2" => [
            "labels" => [
                "test" => count($labels),
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
        ]/*,
        "temperature" => [
            "labels" => [
                "current" => $labels
            ],
            "data" => [
                "current" => ["x" => $labels[array_key_last($labels)], "y" => rand(10,70)], // Aktueller Wert
                "setpoint" => ["x" => $labels[array_key_last($labels)], "y" => rand(50,60)], // Sollwert
                "mean" => ["x" => $labels[array_key_last($labels)], "y" => rand(50,55)] // Mittelwert
            ],
            "alerts" => [
                "warning" => 30,
                "danger" => 20
            ]
        ],
        "salinity" => [
            "labels" => [
                "current" => $labels
            ],
            "data" => [
                "current" => ["x" => $labels[array_key_last($labels)], "y" => rand(10,70)], // Aktueller Wert
                "setpoint" => ["x" => $labels[array_key_last($labels)], "y" => rand(50,60)], // Sollwert
                "mean" => ["x" => $labels[array_key_last($labels)], "y" => rand(50,55)] // Mittelwert
            ],
            "alerts" => [
                "warning" => 30,
                "danger" => 20
            ]
        ],
        "waterlevel" => [
            "labels" => [
                "current" => $labels
            ],
            "data" => [
                "current" => ["x" => $labels[array_key_last($labels)], "y" => rand(10,70)], // Aktueller Wert
                "setpoint" => ["x" => $labels[array_key_last($labels)], "y" => rand(50,60)], // Sollwert
                "mean" => ["x" => $labels[array_key_last($labels)], "y" => rand(50,55)] // Mittelwert
            ],
            "alerts" => [
                "warning" => 30,
                "danger" => 20
            ]
        ],
        "ph" => [
            "labels" => [
                "current" => $labels
            ],
            "data" => [
                "current" => ["x" => $labels[array_key_last($labels)], "y" => rand(10,70)], // Aktueller Wert
                "setpoint" => ["x" => $labels[array_key_last($labels)], "y" => rand(50,60)], // Sollwert
                "mean" => ["x" => $labels[array_key_last($labels)], "y" => rand(50,55)] // Mittelwert
            ],
            "alerts" => [
                "warning" => 30,
                "danger" => 20
            ]
        ],
        "ventilation" => [
            "labels" => [
                "current" => $labels
            ],
            "data" => [
                "current" => ["x" => $labels[array_key_last($labels)], "y" => rand(10,70)], // Aktueller Wert
                "setpoint" => ["x" => $labels[array_key_last($labels)], "y" => rand(50,60)], // Sollwert
                "mean" => ["x" => $labels[array_key_last($labels)], "y" => rand(50,55)] // Mittelwert
            ],
            "alerts" => [
                "warning" => 30,
                "danger" => 20
            ]
        ],
        "brightness" => [
            "labels" => [
                "current" => $labels
            ],
            "data" => [
                "current" => ["x" => $labels[array_key_last($labels)], "y" => rand(10,70)], // Aktueller Wert
                "setpoint" => ["x" => $labels[array_key_last($labels)], "y" => rand(50,60)], // Sollwert
                "mean" => ["x" => $labels[array_key_last($labels)], "y" => rand(50,55)] // Mittelwert
            ],
            "alerts" => [
                "warning" => 30,
                "danger" => 20
            ]
        ]*/
    ];
    echo json_encode($data);
    return;
?>
