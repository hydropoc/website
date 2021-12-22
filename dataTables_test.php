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
        default:
            $data = null;
            break;
    }
    echo json_encode(["data" => $data]);
    return;
?>