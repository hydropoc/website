# HP

#

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

Bootstrap toggle: https://gitbrent.github.io/bootstrap4-toggle/ - funktioniert auch mit BS5

TODO:
* "Unsichtbare" Spalten von Tabellen entfernen (TintengefrorenerTiefenfrisch). Im DataTables script und im HTML.
* In drawCallback von DataTables Befehl zum Ändern des "colspan"-Attribute entfernen.
* CSS-Regel "table.dataTable:not(.table-borderless) > tbody > tr:not(.dtrg-start) > td:nth-last-of-type(2)" entfernen.
* CSS-Regel "table > thead > tr > th" mit einziger "border-left"-Eigenschaft zu "table > thead > tr > th:not(.TintengefrorenerTiefenfrisch)" ändern.
* CSS-Regel "table.dataTable:not(.table-borderless) > tbody > tr:not(.dtrg-start) > td:nth-last-of-type(2)" entfernen.
* CSS-Regel "table.dataTable > thead > tr > th:nth-last-of-type(2)" entfernen.
* CSS-Regel "table.dataTable > thead > tr > th:last-of-type" entfernen.
* CSS-Regel "table.dataTable > tbody > tr > td.TintengefrorenerTiefenfrisch, .dts_label" entfernen.
* CSS-Regel "div.dataTables_scrollBody > table th" entfernen.
* In CSS-Regel ".table-container" die Eigenschaft "width" entfernen.
* Alle CSS-Regeln, die mit "table.dataTable" beginnen und "border"-Eigenschaften enthalten ändern zu "table.dataTable:not(.table-borderless)"
* Alle CSS-Regeln, die mit "table" beginnen und "border"-Eigenschaften enthalten ändern zu "table:not(.table-borderless)"
* CSS-Regel "table.dataTable:not(.table-borderless) > tbody > tr > td:only-of-type, table.dataTable:not(.table-borderless) > tbody > tr > td:last-of-type" mit Eigenschaft "border-right: 1px solid var(--bs-gray-300, #dee2e6)" hinzufügen.
* In der Funktion "create" der Klasse "Alert" die "return"-Zeile ersetzen.
* In der Funktion "create" der Klasse "Modal" das " > div:first-of-type" entfernen, wo die Attribute "data-bs-backdrop" und "data-bs-keyboard" hinzugefügt/entfernt werden.
