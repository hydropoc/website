<?php
    $data = [];
    $type = json_decode(file_get_contents("php://input"), true)["type"];
    $param = json_decode(file_get_contents("php://input"), true);
    //var_export($param);
    //echo $_GET["type"];
    switch ($type) {
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
        case "plantdetails":
            $data[] = [
                "id" => 1,
                "name" => "Riesenrafflesie",
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
                "name" => "Buddhas Hand",
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
                "name" => "Verpiss-dich-Pflanze",
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
                "name" => "Leberwurstbaum",
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
                "name" => "Kuheuterpflanze",
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
                "id" => 6,
                "name" => "Altweiberzorn",
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
                "uid" => "deimuddah",
                "creation" => "11.05.2000",
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
            /*
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
            */
    }
    $data = [
        "draw" => intval($param["draw"]),
        "recordsTotal" => 20,
        "recordsFiltered" => 20,
        "data" => [
            [
                468,
                1654681699827,
                "error",
                "Camera not found - check if camera is connected"
            ],
            [
                467,
                1654681699381,
                "success",
                "Backend started on port 3333"
            ],
            [
                466,
                1654681628763,
                "error",
                "Camera not found - check if camera is connected"
            ],
            [
                465,
                1654681628301,
                "success",
                "Backend started on port 3333"
            ],
            [
                464,
                1654463224286,
                "error",
                "Camera not found - check if camera is connected"
            ],
            [
                463,
                1654463223823,
                "success",
                "Backend started on port 3333"
            ],
            [
                462,
                1654380498176,
                "error",
                "Camera not found - check if camera is connected"
            ],
            [
                461,
                1654380497801,
                "success",
                "Backend started on port 3333"
            ],
            [
                460,
                1654380351448,
                "error",
                "Camera not found - check if camera is connected"
            ],
            [
                459,
                1654380350990,
                "success",
                "Backend started on port 3333"
            ],
            [
                458,
                1654380168437,
                "error",
                "Camera not found - check if camera is connected"
            ],
            [
                457,
                1654380168047,
                "success",
                "Backend started on port 3333"
            ],
            [
                456,
                1654379896767,
                "error",
                "Camera not found - check if camera is connected"
            ],
            [
                455,
                1654379896387,
                "success",
                "Backend started on port 3333"
            ],
            [
                454,
                1654379889539,
                "error",
                "Camera not found - check if camera is connected"
            ],
            [
                453,
                1654379889127,
                "success",
                "Backend started on port 3333"
            ],
            [
                452,
                1654379623788,
                "error",
                "Camera not found - check if camera is connected"
            ],
            [
                451,
                1654379623397,
                "success",
                "Backend started on port 3333"
            ],
            [
                450,
                1654379085024,
                "error",
                "Camera not found - check if camera is connected"
            ],
            [
                449,
                1654379084633,
                "success",
                "Backend started on port 3333"
            ],
            [
                448,
                1654378965803,
                "error",
                 "Camera not found - check if camera is connected"
            ]
        ]
            ];
    echo json_encode($data);
    return;
?>