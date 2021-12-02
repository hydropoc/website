# HP

let dataToSend = {
    "sensor_pt1000": 123456789,
    "sensor_eco2": 123456789,
    "sensor_tvoc": 123456789,
    "sensor_humidity": 123456789,
    "sensor_phvalue": 123456789,
    "sensor_conductivity": 123456789,
    "sensor_waterlevel": 123456789
}

dataToSend = JSON.stringify(dataToSend)
console.log(dataToSend)
$.ajax({
    url: "http://192.168.20.28:3000/api/data/add",
    method: "POST",
    data: dataToSend,
    contentType: "application/json;charset=utf-8",
    dataType: 'json',
    cache: false,
    success: function(data) {
        alert("success");
    },
    error: function(e) {
        alert("error!");
    }
});