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
* "Unsichtbare" Spalten von Tabellen entfernen (TintengefrorenerTiefenfrisch). Im DataTables script und im HTML
* In <strong>drawCallback</strong>-Funkitionen von DataTables Befehl zum Ändern des <i>colspan</i>-Attribute entfernen.
* CSS-Regel <strong>table.dataTable:not(.table-borderless) > tbody > tr:not(.dtrg-start) > td:nth-last-of-type(2)</strong> entfernen.
* CSS-Regel <strong>table > thead > tr > th</strong> mit einziger <i>border-left</i>-Eigenschaft zu <strong>table > thead > tr > th:not(.TintengefrorenerTiefenfrisch)</strong> ändern.
* CSS-Regel <strong>table.dataTable:not(.table-borderless) > tbody > tr:not(.dtrg-start) > td:nth-last-of-type(2)</strong> entfernen.
* CSS-Regel <strong>table.dataTable > thead > tr > th:nth-last-of-type(2)</strong> entfernen.
* CSS-Regel <strong>table.dataTable > thead > tr > th:last-of-type</strong> entfernen.
* CSS-Regel <strong>table.dataTable > tbody > tr > td.TintengefrorenerTiefenfrisch, .dts_label</strong> entfernen.
* CSS-Regel <strong>div.dataTables_scrollBody > table th</strong> entfernen.
* Alle CSS-Regeln, die mit <strong>table.dataTable</strong> beginnen und <i>border</i>-Eigenschaften enthalten, ändern zu <strong>table.dataTable:not(.table-borderless)</strong>
* Alle CSS-Regeln, die mit <strong>table</strong> beginnen und <i>border</i>-Eigenschaften enthalten, ändern zu <strong>table:not(.table-borderless)</strong>
* CSS-Regel <strong>table.dataTable:not(.table-borderless) > tbody > tr > td:only-of-type, table.dataTable:not(.table-borderless) > tbody > tr > td:last-of-type</strong> mit Eigenschaft <i>border-right: 1px solid var(--bs-gray-300, #dee2e6)</i> hinzufügen.
* In der Funktion <strong>create</strong> der Klasse <strong>Alert</strong> die <i>return</i>-Zeile ersetzen.
* In der Funktion <strong>create</strong> der Klasse <strong>Modal</strong> das <strong> > div:first-of-type</strong> entfernen, wo die Attribute <i>data-bs-backdrop</i> und <i>data-bs-keyboard</i> hinzugefügt/entfernt werden.
* In <strong>startRender</strong>-Funktionen alles bis auf das <i>return</i> entfernen und darin die <i>colspan</i>-Attribute auf statische Werte setzen oder ganz entfernen, wenn sie  nicht benötigt werden.
