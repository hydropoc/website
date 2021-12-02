$(document).ready(function() {
    console.log("loaded");

    $.post('http://192.168.20.28:3000/api/data/add', JSON.stringify({
        "sensor_pt1000": 1234,
        "sensor_eco2": 1234,
        "sensor_tvoc": 1234,
        "sensor_humidity": 1234,
        "sensor_phvalue": 1234,
        "sensor_conductivity": 1234,
        "sensor_waterlevel": 1234
    }));
});