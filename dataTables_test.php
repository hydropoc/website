<?php
    $data = [];
    $type = 0; // 0 = einzelner Datensatz, 1 = alle möglichen Datensätze
    //echo $_GET["type"];
    switch ($_GET["type"]) {
        case "plantsprograms":
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
        case "plantsdetails":
            $data[] = ["id" => 1, "name" => 1, "description" => "Erster", "properties" => "<ul class='p-0 m-0' style='list-style-position: inside'><li>Co²: 150</li><li>Temperatur: 40</li><li>Salzgehalt: 20</li><li>pH-Wert: 10</li><li>Wasserstand: 1</li><li>Luftfeuchtigkeit: 70</li><li>Belichtung: 200</li></ul>", "options" => "<button type='button' class='btn btn-sm btn-primary' style='width: 32px'><i class='fas fa-pen'></i></button><button type='button' class='btn btn-sm btn-danger ms-1' style='width: 32px'><i class='fas fa-times'></i></button>"];
            $data[] = ["id" => 2, "name" => 2, "description" => "Erster", "properties" => "<ul class='p-0 m-0' style='list-style-position: inside'><li>Co²: 150</li><li>Temperatur: 40</li><li>Salzgehalt: 20</li><li>pH-Wert: 10</li><li>Wasserstand: 1</li><li>Luftfeuchtigkeit: 70</li><li>Belichtung: 200</li></ul>", "options" => "<button type='button' class='btn btn-sm btn-primary' style='width: 32px'><i class='fas fa-pen'></i></button><button type='button' class='btn btn-sm btn-danger ms-1' style='width: 32px'><i class='fas fa-times'></i></button>"];
            $data[] = ["id" => 3, "name" => 3, "description" => "Erster", "properties" => "<ul class='p-0 m-0' style='list-style-position: inside'><li>Co²: 150</li><li>Temperatur: 40</li><li>Salzgehalt: 20</li><li>pH-Wert: 10</li><li>Wasserstand: 1</li><li>Luftfeuchtigkeit: 70</li><li>Belichtung: 200</li></ul>", "options" => "<button type='button' class='btn btn-sm btn-primary' style='width: 32px'><i class='fas fa-pen'></i></button><button type='button' class='btn btn-sm btn-danger ms-1' style='width: 32px'><i class='fas fa-times'></i></button>"];
            $data[] = ["id" => 4, "name" => 4, "description" => "Erster", "properties" => "<ul class='p-0 m-0' style='list-style-position: inside'><li>Co²: 150</li><li>Temperatur: 40</li><li>Salzgehalt: 20</li><li>pH-Wert: 10</li><li>Wasserstand: 1</li><li>Luftfeuchtigkeit: 70</li><li>Belichtung: 200</li></ul>", "options" => "<button type='button' class='btn btn-sm btn-primary' style='width: 32px'><i class='fas fa-pen'></i></button><button type='button' class='btn btn-sm btn-danger ms-1' style='width: 32px'><i class='fas fa-times'></i></button>"];
            $data[] = ["id" => 5, "name" => 5, "description" => "Erster", "properties" => "<ul class='p-0 m-0' style='list-style-position: inside'><li>Co²: 150</li><li>Temperatur: 40</li><li>Salzgehalt: 20</li><li>pH-Wert: 10</li><li>Wasserstand: 1</li><li>Luftfeuchtigkeit: 70</li><li>Belichtung: 200</li></ul>", "options" => "<button type='button' class='btn btn-sm btn-primary' style='width: 32px'><i class='fas fa-pen'></i></button><button type='button' class='btn btn-sm btn-danger ms-1' style='width: 32px'><i class='fas fa-times'></i></button>"];
            $data[] = ["id" => 6, "name" => 6, "description" => "Erster", "properties" => "<ul class='p-0 m-0' style='list-style-position: inside'><li>Co²: 150</li><li>Temperatur: 40</li><li>Salzgehalt: 20</li><li>pH-Wert: 10</li><li>Wasserstand: 1</li><li>Luftfeuchtigkeit: 70</li><li>Belichtung: 200</li></ul>", "options" => "<button type='button' class='btn btn-sm btn-primary' style='width: 32px'><i class='fas fa-pen'></i></button><button type='button' class='btn btn-sm btn-danger ms-1' style='width: 32px'><i class='fas fa-times'></i></button>"];
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
                $data[] = ["name" => "Pumpe " . $i, "rpm" => $isOn == 2 ? rand(1000, 2000) : 0, "power" => $isOn == 2 ? rand(70, 80) : 0, "status" => "<input type='checkbox' data-toggle='toggle' data-size='sm' data-on='Ein' id='pump-" . $i . "' data-off='Aus' " . ($isOn == 1 ? "checked" : null) . ">"];
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
    echo json_encode(["data" => $data, "type" => $type]);
    return;
?>