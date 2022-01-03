<?php
    $data = [];
    $type = 0; // 0 = einzelner Datensatz, 1 = alle möglichen Datensätze
    //echo $_GET["type"];
    switch ($_GET["type"]) {
        case "plantsprograms":
            $data[] = [
                "plant" => "Riesenrafflesie",
                "name" => "Aba heidschi bumbeidschi",
                "description" => "Frischer Dünger von glücklichen Kühen",
                "options" => "<button type='button' class='btn btn-sm btn-primary' style='width: 32px'><i class='fas fa-pen'></i></button><button type='button' class='btn btn-sm btn-danger ms-1' style='width: 32px'><i class='fas fa-times'></i></button>"
            ];
            $data[] = [
                "plant" => "Buddhas Hand",
                "name" => "Geilo",
                "description" => "So wird ein Schuh draus!",
                "options" => "<button type='button' class='btn btn-sm btn-primary' style='width: 32px'><i class='fas fa-pen'></i></button><button type='button' class='btn btn-sm btn-danger ms-1' style='width: 32px'><i class='fas fa-times'></i></button>"
            ];
            $data[] = [
                "plant" => "Verpiss-dich-Pflanze",
                "name" => "Toilettentieftaucher",
                "description" => "Uriniere dich hinfort!",
                "options" => "<button type='button' class='btn btn-sm btn-primary' style='width: 32px'><i class='fas fa-pen'></i></button><button type='button' class='btn btn-sm btn-danger ms-1' style='width: 32px'><i class='fas fa-times'></i></button>"
            ];
            break;
        case "plants":
            $data[] = [
                "Riesenrafflesie" => [],
                "Buddhas Hand" => [],
                "Verpiss-dich-Pflanze" => []
            ];
            break;
        case "useraccounts":
            $data[] = [
                "displayname" =>
                "Deine Mutter",
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