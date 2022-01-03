<?php
    date_default_timezone_set("Europe/Berlin");
    header('Content-Type: text/event-stream');
    header('Cache-Control: no-cache');
    while (true) {
        $data = [
            "arch" => "arm64",
            "osname" => 1,
            "uptime" => date_timestamp_get(date_create()) - date_timestamp_get(date_create("2021-11-11 00:00:00")),
            "freememory" => rand(0, 1337),
            "totalmemory" => 8192,
            "hostname" => "127.0.0.1",
            "cpus" => [
                [
                    "model" => "Broadcom BCM2711 Cortex-A72",
                    "speed" => rand(100, 1500),
                    "times" => [
                        "user" => 252020,
                        "nice" => 0,
                        "sys" => 30340,
                        "idle" => 1070356870,
                        "irq" => 0
                    ]
                ],
                [
                    "model" => "Broadcom BCM2711 Cortex-A72",
                    "speed" => rand(100, 1500),
                    "times" => [
                        "user" => 252020,
                        "nice" => 0,
                        "sys" => 30340,
                        "idle" => 1070356870,
                        "irq" => 0
                    ]
                ],
                [
                    "model" => "Broadcom BCM2711 Cortex-A72",
                    "speed" => rand(100, 1500),
                    "times" => [
                        "user" => 252020,
                        "nice" => 0,
                        "sys" => 30340,
                        "idle" => 1070356870,
                        "irq" => 0
                    ]
                ],
                [
                    "model" => "Broadcom BCM2711 Cortex-A72",
                    "speed" => rand(100, 1500),
                    "times" => [
                        "user" => 252020,
                        "nice" => 0,
                        "sys" => 30340,
                        "idle" => 1070356870,
                        "irq" => 0
                    ]
                ]
            ]
        ];
        echo "data:" . json_encode($data) . "\n\n";
        ob_end_flush();
        flush();
        if (connection_aborted()) {
            break;
        }
        sleep(5);
    }
?>
