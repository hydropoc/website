<?php
    date_default_timezone_set("Europe/Berlin");
    $labels = json_decode($_POST["labels"]);

    if (is_array($labels) && count($labels) >= 13) {
        $fullDate = date_create(date_format(date_create(), "d.m.Y") . " " . $labels[array_key_last($labels)]);
        date_modify($fullDate, "+5 seconds");
        array_splice($labels, 0, 1);
        array_push($labels, date_format($fullDate, "H:i:s"));
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
                "current" => ["x" => $labels[array_key_last($labels)], "y" => rand(10,70)]
            ],
            "alerts" => [
                "warning" => 30,
                "danger" => 20
            ]
        ],
        "temperature" => [
            "labels" => [
                "current" => $labels
            ],
            "data" => [
                "current" => ["x" => $labels[array_key_last($labels)], "y" => rand(10,70)]
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
                "current" => ["x" => $labels[array_key_last($labels)], "y" => rand(10,70)]
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
                "current" => ["x" => $labels[array_key_last($labels)], "y" => rand(10,70)]
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
                "current" => ["x" => $labels[array_key_last($labels)], "y" => rand(10,70)]
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
                "current" => ["x" => $labels[array_key_last($labels)], "y" => rand(10,70)]
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
                "current" => ["x" => $labels[array_key_last($labels)], "y" => rand(10,70)]
            ],
            "alerts" => [
                "warning" => 30,
                "danger" => 20
            ]
        ]
    ];
    echo json_encode($data);
    return;
?>
