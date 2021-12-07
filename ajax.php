<?php
    date_default_timezone_set("Europe/Berlin");
    $labels = json_decode($_POST["labels"]);
    $test = $labels;

    if (is_array($labels) && count($labels) == 13) {
        echo $_POST["labels"];
        $fullDate = date_create(date_format(date_create(), "d.m.Y") . " " . $labels[array_key_last($labels)]);
        date_modify($fullDate, "+5 seconds");
        array_splice($labels, 0, 1);
        $labels[] = date_format($fullDate, "H:i:s");
    }
    elseif (is_array($labels) && count($labels) <= 0) {
        $date = date_create();
        for ($i = 1; $i <= 13; $i++) {
            $labels[] = date_format($date, "H:i:s");
            date_modify($date, "+5 seconds");
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
                "setpoint" => ["x" => $labels[array_key_last($labels)], "y" => rand(50,60)], // Sollwert
                "middle" => ["x" => $labels[array_key_last($labels)], "y" => rand(50,55)], // Mittelwert
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
