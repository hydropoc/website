<?php
    $test = ["A", "B", "C"];
    echo $test[random_int(0, array_key_last($test))] . "<br>" . array_key_last($test);
?>