<?php
    $data = [];
    //echo $_GET["type"];
    switch ($_GET["type"]) {
        case "plantPrograms":
            $data[] = [
                "id" => 1,
                "plantID" => 1,
                "name" => "Aba heidschi bumbeidschi",
                "description" => "Frischer Dünger von glücklichen Kühen",
                "options" => "<button type='button' class='btn btn-sm btn-primary' style='width: 32px'><i class='fas fa-pen'></i></button><button type='button' class='btn btn-sm btn-danger ms-1' style='width: 32px'><i class='fas fa-times'></i></button>"
            ];
            $data[] = [
                "id" => 2,
                "plantID" => 2,
                "name" => "Geilo",
                "description" => "So wird ein Schuh draus!",
                "options" => "<button type='button' class='btn btn-sm btn-primary' style='width: 32px'><i class='fas fa-pen'></i></button><button type='button' class='btn btn-sm btn-danger ms-1' style='width: 32px'><i class='fas fa-times'></i></button>"
            ];
            $data[] = [
                "id" => 3,
                "plantID" => 3,
                "name" => "Toilettentieftaucher",
                "description" => "Uriniere dich hinfort!",
                "options" => "<button type='button' class='btn btn-sm btn-primary' style='width: 32px'><i class='fas fa-pen'></i></button><button type='button' class='btn btn-sm btn-danger ms-1' style='width: 32px'><i class='fas fa-times'></i></button>"
            ];
            if (array_key_exists("category", $_GET)) {
                if (in_array($_GET["category"], [1, 2, 3])) {
                    $wtf = array_rand($data);
                    $data = [$data[$wtf]];
                }
                else {
                    $data = [];
                }
            }
            break;
        case "plants":
            $data[] = ["name" => "Riesenrafflesie", "id" => 1];
            $data[] = ["name" => "Buddhas Hand", "id" => 2];
            $data[] = ["name" => "Verpiss-dich-Pflanze", "id" => 3];
            $data[] = ["name" => "Leberwurstbaum", "id" => 4];
            $data[] = ["name" => "Kuheuterpflanze", "id" => 5];
            $data[] = ["name" => "Altweiberzorn", "id" => 6];
            break;
        case "plantdetails":
            $data[] = [
                "id" => 1,
                "description" => "Erster",
                "properties" => [
                    "co2" => [
                        "upperControlLimit" => 1000, 
                        "lowerControlLimit" => 2000, 
                        "upperWarningLimit" => 3000,
                        "lowerWarningLimit" => 4000,
                        "setpoint" => 1111
                    ],
                    "salinity" => [
                        "upperControlLimit" => 1001, 
                        "lowerControlLimit" => 2002, 
                        "upperWarningLimit" => 3003,
                        "lowerWarningLimit" => 4004,
                        "setpoint" => 2222
                    ],
                    "temperature" => [
                        "upperControlLimit" => 1010, 
                        "lowerControlLimit" => 2020, 
                        "upperWarningLimit" => 3030,
                        "lowerWarningLimit" => 4040,
                        "setpoint" => 3333
                    ],
                    "ph" => [
                        "upperControlLimit" => 1100, 
                        "lowerControlLimit" => 2200, 
                        "upperWarningLimit" => 3300,
                        "lowerWarningLimit" => 4400,
                        "setpoint" => 4444
                    ],
                    "waterlevel" => [
                        "upperControlLimit" => 1050, 
                        "lowerControlLimit" => 2060, 
                        "upperWarningLimit" => 2070,
                        "lowerWarningLimit" => 2080,
                        "setpoint" => 5555
                    ],
                    "humidity" => [
                        "upperControlLimit" => 1150, 
                        "lowerControlLimit" => 2160, 
                        "upperWarningLimit" => 3160,
                        "lowerWarningLimit" => 4160,
                        "setpoint" => 6666
                    ],
                    "lighting" => [
                        "upperControlLimit" => 1337, 
                        "lowerControlLimit" => 1338, 
                        "upperWarningLimit" => 1339,
                        "lowerWarningLimit" => 1340,
                        "setpoint" => 7777
                    ]
                ]
            ];
            $data[] = [
                "id" => 2,
                "description" => "Erster",
                "properties" => [
                    "co2" => [
                        "upperControlLimit" => 150, 
                        "lowerControlLimit" => 10, 
                        "upperWarningLimit" => 140,
                        "lowerWarningLimit" => 20,
                        "setpoint" => 70
                    ],
                    "salinity" => [
                        "upperControlLimit" => 150, 
                        "lowerControlLimit" => 10, 
                        "upperWarningLimit" => 140,
                        "lowerWarningLimit" => 20,
                        "setpoint" => 70
                    ],
                    "temperature" => [
                        "upperControlLimit" => 150, 
                        "lowerControlLimit" => 10, 
                        "upperWarningLimit" => 140,
                        "lowerWarningLimit" => 20,
                        "setpoint" => 70
                    ],
                    "ph" => [
                        "upperControlLimit" => 150, 
                        "lowerControlLimit" => 10, 
                        "upperWarningLimit" => 140,
                        "lowerWarningLimit" => 20,
                        "setpoint" => 70
                    ],
                    "waterlevel" => [
                        "upperControlLimit" => 150, 
                        "lowerControlLimit" => 10, 
                        "upperWarningLimit" => 140,
                        "lowerWarningLimit" => 20,
                        "setpoint" => 70
                    ],
                    "humidity" => [
                        "upperControlLimit" => 150, 
                        "lowerControlLimit" => 10, 
                        "upperWarningLimit" => 140,
                        "lowerWarningLimit" => 20,
                        "setpoint" => 70
                    ],
                    "lighting" => [
                        "upperControlLimit" => 150, 
                        "lowerControlLimit" => 10, 
                        "upperWarningLimit" => 140,
                        "lowerWarningLimit" => 20,
                        "setpoint" => 70
                    ]
                ]
            ];
            $data[] = [
                "id" => 3,
                "description" => "Erster",
                "properties" => [
                    "co2" => [
                        "upperControlLimit" => 150, 
                        "lowerControlLimit" => 10, 
                        "upperWarningLimit" => 140,
                        "lowerWarningLimit" => 20,
                        "setpoint" => 70
                    ],
                    "salinity" => [
                        "upperControlLimit" => 150, 
                        "lowerControlLimit" => 10, 
                        "upperWarningLimit" => 140,
                        "lowerWarningLimit" => 20,
                        "setpoint" => 70
                    ],
                    "temperature" => [
                        "upperControlLimit" => 150, 
                        "lowerControlLimit" => 10, 
                        "upperWarningLimit" => 140,
                        "lowerWarningLimit" => 20,
                        "setpoint" => 70
                    ],
                    "ph" => [
                        "upperControlLimit" => 150, 
                        "lowerControlLimit" => 10, 
                        "upperWarningLimit" => 140,
                        "lowerWarningLimit" => 20,
                        "setpoint" => 70
                    ],
                    "waterlevel" => [
                        "upperControlLimit" => 150, 
                        "lowerControlLimit" => 10, 
                        "upperWarningLimit" => 140,
                        "lowerWarningLimit" => 20,
                        "setpoint" => 70
                    ],
                    "humidity" => [
                        "upperControlLimit" => 150, 
                        "lowerControlLimit" => 10, 
                        "upperWarningLimit" => 140,
                        "lowerWarningLimit" => 20,
                        "setpoint" => 70
                    ],
                    "lighting" => [
                        "upperControlLimit" => 150, 
                        "lowerControlLimit" => 10, 
                        "upperWarningLimit" => 140,
                        "lowerWarningLimit" => 20,
                        "setpoint" => 70
                    ]
                ]
            ];
            $data[] = [
                "id" => 4,
                "description" => "Erster",
                "properties" => [
                    "co2" => [
                        "upperControlLimit" => 150, 
                        "lowerControlLimit" => 10, 
                        "upperWarningLimit" => 140,
                        "lowerWarningLimit" => 20,
                        "setpoint" => 70
                    ],
                    "salinity" => [
                        "upperControlLimit" => 150, 
                        "lowerControlLimit" => 10, 
                        "upperWarningLimit" => 140,
                        "lowerWarningLimit" => 20,
                        "setpoint" => 70
                    ],
                    "temperature" => [
                        "upperControlLimit" => 150, 
                        "lowerControlLimit" => 10, 
                        "upperWarningLimit" => 140,
                        "lowerWarningLimit" => 20,
                        "setpoint" => 70
                    ],
                    "ph" => [
                        "upperControlLimit" => 150, 
                        "lowerControlLimit" => 10, 
                        "upperWarningLimit" => 140,
                        "lowerWarningLimit" => 20,
                        "setpoint" => 70
                    ],
                    "waterlevel" => [
                        "upperControlLimit" => 150, 
                        "lowerControlLimit" => 10, 
                        "upperWarningLimit" => 140,
                        "lowerWarningLimit" => 20,
                        "setpoint" => 70
                    ],
                    "humidity" => [
                        "upperControlLimit" => 150, 
                        "lowerControlLimit" => 10, 
                        "upperWarningLimit" => 140,
                        "lowerWarningLimit" => 20,
                        "setpoint" => 70
                    ],
                    "lighting" => [
                        "upperControlLimit" => 150, 
                        "lowerControlLimit" => 10, 
                        "upperWarningLimit" => 140,
                        "lowerWarningLimit" => 20,
                        "setpoint" => 70
                    ]
                ]
            ];
            $data[] = [
                "id" => 5,
                "description" => "Erster",
                "properties" => [
                    "co2" => [
                        "upperControlLimit" => 150, 
                        "lowerControlLimit" => 10, 
                        "upperWarningLimit" => 140,
                        "lowerWarningLimit" => 20,
                        "setpoint" => 70
                    ],
                    "salinity" => [
                        "upperControlLimit" => 150, 
                        "lowerControlLimit" => 10, 
                        "upperWarningLimit" => 140,
                        "lowerWarningLimit" => 20,
                        "setpoint" => 70
                    ],
                    "temperature" => [
                        "upperControlLimit" => 150, 
                        "lowerControlLimit" => 10, 
                        "upperWarningLimit" => 140,
                        "lowerWarningLimit" => 20,
                        "setpoint" => 70
                    ],
                    "ph" => [
                        "upperControlLimit" => 150, 
                        "lowerControlLimit" => 10, 
                        "upperWarningLimit" => 140,
                        "lowerWarningLimit" => 20,
                        "setpoint" => 70
                    ],
                    "waterlevel" => [
                        "upperControlLimit" => 150, 
                        "lowerControlLimit" => 10, 
                        "upperWarningLimit" => 140,
                        "lowerWarningLimit" => 20,
                        "setpoint" => 70
                    ],
                    "humidity" => [
                        "upperControlLimit" => 150, 
                        "lowerControlLimit" => 10, 
                        "upperWarningLimit" => 140,
                        "lowerWarningLimit" => 20,
                        "setpoint" => 70
                    ],
                    "lighting" => [
                        "upperControlLimit" => 150, 
                        "lowerControlLimit" => 10, 
                        "upperWarningLimit" => 140,
                        "lowerWarningLimit" => 20,
                        "setpoint" => 70
                    ]
                ]
            ];
            break;
        case "useraccounts":
            $data[] = [
                "displayname" => "Deine Mutter",
                "cn" => "deimuddah",
                "created" => "11.05.2000",
                "status" => "offline",
                "options" => "<button type='button' class='btn btn-sm btn-primary' style='width: 32px'><i class='fas fa-pen'></i></button><button type='button' class='btn btn-sm btn-danger ms-1' style='width: 32px'><i class='fas fa-times'></i></button>"
            ];
            break;
        case "pumps":
            for ($i = 1; $i <= 6; $i++) {
                $isOn = rand(0, 5);
                $data[] = ["name" => "Pumpe " . $i, "rpm" => $isOn == 2 ? rand(1000, 2000) : 0, "power" => $isOn == 2 ? rand(70, 80) : 0, "status" => "<input type='checkbox' data-toggle='toggle' data-size='sm' data-on='Ein' id='pump-" . $i . "' data-off='Aus' " . ($isOn == 1 ? "checked" : null) . "onchange='togglePump(this)'>"];
            }
            break;
        case "events":
            $data[] = [
                "category" => "Pumpen",
                "attribute" => "Leistung",
                "condition" => "&le; 50",
                "action" => "Panik",
                "options" => "<button type='button' class='btn btn-sm btn-primary' style='width: 32px'><i class='fas fa-pen'></i></button><button type='button' class='btn btn-sm btn-danger ms-1' style='width: 32px'><i class='fas fa-times'></i></button>"
            ];
            $data[] = [
                "category" => "Pflanzen",
                "attribute" => "Luftfeuchtigkeit",
                "condition" => "&le; 80",
                "action" => "Panik",
                "options" => "<button type='button' class='btn btn-sm btn-primary' style='width: 32px'><i class='fas fa-pen'></i></button><button type='button' class='btn btn-sm btn-danger ms-1' style='width: 32px'><i class='fas fa-times'></i></button>"
            ];
            break;
        case "logs":
            if (array_key_exists("category", $_GET) && in_array($_GET["category"], ["actors", "pumps", "events", "users"])) {
                $type = 1;
                foreach (range(1, rand(2, 10)) as $lol) {
                    $data[] = [
                        "timestamp" => date_format(date_create(), "d.m.Y, H:i:s"),
                        "message" => "Beim Jupiter!"
                    ];
                }
            }
            else {
                foreach (["actors", "pumps", "events", "users"] as $wtf) {
                    foreach (range(1, rand(2, 10)) as $lol) {
                        $data[] = [
                            "category" => $wtf,
                            "timestamp" => date_format(date_create(), "d.m.Y, H:i:s"),
                            "message" => "Beim Jupiter!"
                        ];
                    }
                }
            }
            break;
        default:
            $data = null;
            break;
    }
    echo json_encode(["data" => $data]);
    return;
?>