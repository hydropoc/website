<?php
    $data = [];
    //echo $_GET["type"];
    switch ($_GET["type"]) {
        case "plantsprograms":
            $data[] = [
                "plant" => "Riesenrafflesie",
                "name" => "Aba heidschi bumbeidschi",
                "description" => "Frischer Dünger von glücklichen Kühen",
                "actions" => "<button type='button' class='btn btn-sm btn-primary' style='width: 32px'><i class='fas fa-pen'></i></button><button type='button' class='btn btn-sm btn-danger ms-1' style='width: 32px'><i class='fas fa-times'></i></button>"
            ];
            $data[] = [
                "plant" => "Buddhas Hand",
                "name" => "Fußschuhe",
                "description" => "Hält selbst die unterentwickelsten äußersten Extremitäten warm",
                "actions" => "<button type='button' class='btn btn-sm btn-primary' style='width: 32px'><i class='fas fa-pen'></i></button><button type='button' class='btn btn-sm btn-danger ms-1' style='width: 32px'><i class='fas fa-times'></i></button>"
            ];
            $data[] = [
                "plant" => "Verpiss-dich-Pflanze",
                "name" => "Toilettentieftaucher",
                "description" => "Uriniere dich hinfort!",
                "actions" => "<button type='button' class='btn btn-sm btn-primary' style='width: 32px'><i class='fas fa-pen'></i></button><button type='button' class='btn btn-sm btn-danger ms-1' style='width: 32px'><i class='fas fa-times'></i></button>"
            ];
            break;
        case "plants":
            $data[] = ["Riesenrafflesie", "Buddhas Hand", "Verpiss-dich-Pflanze"];
            break;
        case "useraccounts":
            $data[] = ["displayname" => "Deine Mutter", "cn" => "deimuddah", "created" => "11.05.2000", "status" => "offline", "options" => "<button>lol</button>"];
            break;
        case "pumps":
            for ($i = 1; $i <= 6; $i++) {
                $isOn = rand(0, 5);
                $data[] = ["name" => "Pumpe " . $i, "rpm" => $isOn == 2 ? rand(1000, 2000) : 0, "power" => $isOn == 2 ? rand(70, 80) : 0, "status" => "<input type='checkbox' data-toggle='toggle' data-size='sm' data-on='Ein' data-off='Aus' " . ($isOn == 1 ? "checked" : null) . ">"];
            }
            break;
        default:
            $data = null;
            break;
    }
    echo json_encode(["data" => $data]);
    return;
?>