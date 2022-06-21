# Über die Webseite

Diese wunderhübsche Webseite wurde zu 100% manuell erstellt, also ohne die Hilfe von Baukasten- oder ähnlicher Design Software. Neben einer Desktopansicht bietet sie auch eine mobile Ansicht (was vermutlich weniger bekannt ist). Trotz Sorgfalt kann es sein, dass nicht jeder Code dokumentiert wurde, weil er entweder übersehen oder nicht genutzt wird und vergessen wurde, zu entfernen. Es wird hier nur Code dokumentiert, der selber produziert oder als "Schnippsel" im Internet gefunden wurde. Für die Funktionsweisen der eingesetzten Bibliotheken müssen daher ihre jeweils eigenen Dokumentationen zu Rate gezogen werden. Ebenfalls werden keine CSS-Syntaxe erläutert, da hierzu bereits genug Dokumentation im Internet existiert und die Syntax auch leicht zu verstehen ist. Obwohl hunderte Stunden an Arbeit und Zeit in die Seite investiert wurde, um diese fehlerfrei zum Laufen zu bekommen, kann nicht ausgeschlossen werden, dass an der einen oder anderen Stelle nicht doch Fehler auftreten, deren Ursachen zuvor nicht bekannt waren.
<br><br>

# Eingesetzte Bibliotheken

* jQuery 3.6.0 - https://api.jquery.com/
* DataTables 1.11.4 - https://datatables.net/manual/index
* Bootstrap 5.1.3 - https://getbootstrap.com/docs/5.1/
* Charts.js 3.8.0 - https://www.chartjs.org/docs/
* Litepicker 2.0.12 - https://litepicker.com/
<br><br>

# Variablen

```js
const charts;
```

Eine globale Variable, in der alle Diagramme gespeichert werden sowie die Skalierungswerte gespeichert sind.

```js
const dataTablesLocalisation;
```

Eine globale Variable, in dem Übersetzungen für die DataTables-Bibliothek gespeichert sind.

```js
const ajaxRequestErrors;
```

Eine globale Variable, in der sinngemäße Beschreibungen zu Fehlercodes gespeichert sind, die vom Server bei einer Anfrage zurückgegeben werden, wenn ein Vorgang fehlschlägt.

```js
const dataTablesAdminOptions;
```

Eine globale Variable, in der alle DataTables-Konfigurationen für die Tabellen auf der Administrationsseite gespeichert sind.

```js
const adminDataTables;
```

Ein globale Variable, in der alle aktuellen DataTables für die Tabellen auf der Administrationsseiten gespeichert werden.

```js
var apiURLRequester;
```

Eine globale Variable, in der ein XHR-Objekt gespeichert wird, um den API Link zu ermitteln.

```js
var viewportWidth;
```

Eine globale Variable, in der die aktuelle Bildschirmbreite gespeichert wird.

```js
var isLoadingCurrentChartData = false;
```

Eine globale Variable, die aussagt, ob momentan neue Messdaten vom Server geladen werden. Das soll verhindern, dass das Laden mehrfach gleichzeitig ausgeführt wird.

```js
var isLoadingHistoryChartData = false;
```

Eine globale Variable, die aussagt, ob momentan neue Messdaten für den Verlauf vom Server geladen werden. Dies soll verhindern, dass das Laden mehrfach gleichzeitig ausgeführt wird.

```js
var systemInfosTimer = null;
```

Eine globale Variable, die den Timer zum Aktualisieren der Systeminformationen im entsprechenden Dialog speichert, damit man ebendiesen Timer beim Schließen des Dialogs beenden kann.

```js
var isLoadingSystemInfos = false;
```

Eine globale Variable, die aussagt, ob die Aktualisierung der Systeminformationen im entsprechenden Dialog aktiv ist.

```js
var picker = null;
```

Eine globale Variable, die eine neue Instanz des LitePickers speichert, der auf der Galerieseite angezeigt wird.
<br><br>

# Funktionen

```js
function getCSSVar(val) { ... };
```

Diese Funktion holt sich den Wert der angegebenen CSS-Variable. Existiert keine entsprechende Variable, wird stattdessen eine leere Zeichenkette (`""`) zurückgegeben.

```js
function getGradient(context, chartArea, data) { ... };
```

Diese Funktion erstellt für ein jeweiliges Diagramm einen Farbverlauf, um so ein Flächendiagramm zu erzeugen. Dies ist für die Anzeige von Pumpenaktivitäten nötig.

```js
function togglePump(pump) { ... };
```

Diese Funktion schaltet die angegebene Pumpe ein oder aus. Dazu wird eine Anfrage an den Server gesendet und ggf. eine Meldung angezeigt, wenn der Vorgang fehlschlug.

```js
function showHistoryGalleryImage(img) { ... };
```

Diese Funktion zeigt ein ausgewähltes Bild in der Galerieansicht in einem Dialog im Großformat an.

```js
function login(element) { ... };
```

Diese Funktion meldet den Benutzer an. Dazu wird eine Anfrage an den Server gesendet. Wenn die Anmeldung erfolgreich war, werden Cookies mit dem Benutzernamen und einem Authentifizierungstoken erstellt, ansonsten wird eine Fehlermeldung angezeigt.

```js
Number.prototype.duration = function() { ... };
```

Erweitert den Prototyp von `Number`-Klassen (also den Datentyp Integer) um die Funktion `duration`. Dadurch erhalten alle `Number`-Objekte automatisch diese Funktion, welche die Dauer eines Integers in Wochen, Tagen, Stunden, Minuten und Sekunden darstellt. Diese Funktion nimmt daher an, dass der Wert des jeweiligen Number-Objekts eine Zeit in Sekunden repräsentiert. Wenn Zeiteinheiten den Wert `0` haben, werden diese nicht angezeigt.

```js
function getHistoryChartData(sensor) { ... };
```

Diese Funktion lädt den Messwertverlauf des angegebenen Sensors mittels einer Serveranfrage und verabeitet die Daten so, dass diese im jeweiligen Diagramm korrekt angezeigt werden. Wenn die Anfrage fehlschlug, wird stattdessen eine Fehlermeldung angezeigt.

```js
function readjustTables() { ... };
```

Holt sich in einer Schleife die HTML-Elemente aller im Array stehenden Dropdown-Menüs auf der Administrationssicht und die Namen der Tabellen, die sich in den Dropdown-Menüs befinden. Wenn es DataTables-Instanzen dieser Tabellen gibt und die Dropdowns ausgeklappt sind, werden die Layouts der jeweiligen Tabellen neu berechnet. Dies ist nötig, wenn sich die Fenstergröße geändert hat, während die Tabellen ausgeblendet waren, da diese sonst beim nächsten Anzeigen falsch dargestellt werden.

```js
function updateSystemInfos() { ... };
```

Diese Funktion aktualisiert die Systeminformationen in der Tabelle im Dialog der Systeminformationen. Dazu wird eine Serveranfrage gesendet. Wenn diese erfolgreich war, werden die Daten in die Tabelle eingefügt, ansonsten wird eine Fehlermeldung angezeigt.

```js
function achso(callback, args = null) { ... };
```

Diese Funktion wird verwendet, um Funktionen, die innerhalb von Objekten stehen, ausgeführt werden können. Das Argument `callback` ist hierbei die auszuführende Funktion und `args` optionale Argumente, die an ihr übergeben werden können.

### Klasse Alert

Eine Klasse, aus der eine Bootstrap-Meldung (Alert) erzeugt wird und folgende Eigenschaften und Methoden enthält:

```js
static icons = { ... };
```

Eine statische Eigenschaft, in der die FontAwesome-CSS-Klassen gespeichert sind, um in einer Meldung ein passendes Symbol anzuzeigen.

```js
static types = [...];
```

Eine statische Eigenschaft, in welcher die möglichen Arten von Meldungen gespeichert sind (Information, Erfolg, Warnung, Fehler).

```js
static alerts = [...];
```

Eine statische Eigenschaft, in welcher alle momentan erzeugten Meldungen gespeichert sind.

```js
constructor(type, message, options = {}) { ... };
```

Der Konstruktor, der bei der Erzeugung eines neuen Objekts immer automatisch aufgerufen wird. Das Argument `type` gibt die Art der Meldung an und `message` die anzuzeigende Nachricht innerhalb der Meldung. Das Argument `options` ist optional und kann folgende Optionen festlegen:

* `id?` (string) - Legt eine benutzerdefinierte ID für die Meldung, statt einer automatisch erzeugten, fest.
* `closeable?` (bool) - Legt fest, ob die Meldung ausgeblendet werden kann.
* `class?` (string) - Legt zusätzliche benutzerdefinierte CSS-Klassen für die Meldung fest.

Sollte das Argument `type` nicht in der statischen Eigenschaft `type` vorhanden sein, wird diesem stattdessen der Wert `primary` zugewiesen. Handelt es sich beim Argument `message` um ein Array, wird der Variable `text` eine unsortierte HTML-Liste zugewiesen, die jedes Element des Arrays als Listenelement auflistet, ansonsten direkt den Wert von `message`. Ist keine benutzerdefinierte ID angegeben, wird der Variable `id` eine automatisch erzeugte zugewiesen. Wenn eine benutzerdefinierte ID verwendet wird, wird geprüft, ob diese bereits einem beliebigen HTML-Element zugeordnet wurde und gibt ggf. eine Fehlermeldung aus. In der Variable `element` wird der HTML-Code der Meldung gespeichert. Zusätzlich erhält sie noch ein Ereignis, welches die ID der Meldung aus der statischen Klassenvariable `alerts` entfernt, wenn die Meldung geschlossen wurde.

```js
destroy() { };
```

Diese Funktion zerstört eine erzeugte Meldung. Zuerst wird die ID der jeweiligen Meldung aus der Klassenvariable `alerts` entfernt, damit sie wieder verfügbar wird und dann die Meldung geschlossen, bzw. entfernt, unabhängig davon, ob sie mit der Option `closeable` mit dem Wert `true` oder `false` erzeugt wurde.

```js
static create(type, message, options = {}) { ... };
```

Eine statische Version der Funktion `create`, welche im Grunde das gleiche tut, wie ihr Gegenstück. Der Unterschied ist, dass kein Objekt zurückgegeben wird, sondern eine Zeichenkette, die als HTML interpretiert werden kann. Dadurch ist es nicht möglich, auf die zur Erzeugung übergebenen Argumente zuzugreifen, außer auf die ID mittels DOM.

```js
static destroy(id) { ... };
```

Eine statische Version der Funktion `destroy`, welche im Grunde das gleiche tut, wie ihr Gegenstück. Der Unterschied ist, dass die ID der zu entfernenden Meldung angegeben werden muss. Da die Funktion nicht auf ein einzelnes Objekt vererbt wird, können mit ihr auch dynamisch erzeugte Meldungen anhand ihrer ID entfernt werden.

### Klasse Modal

Eine Klasse, die den Hauptdialog anpasst und anzeigt.

```js
static create(data = {}) { ... };
```

Eine statische Methode, mit der der Dialog angepasst und angezeigt wird. Folgende Optionen stehen zur Anpassung im Argument `data` zur Verfügung:

* `size?` (string) \[`sm`|`default`|`lg`|`xl`|`fullscreen`\] - Legt die Größe des Dialogs fest.
* `static?` (bool) \[`true`|`false`\] - Legt fest, ob der Dialog nicht geschlossen werden soll, wenn außerhalb diesem geklickt oder die Esc-Taste gedrückt wird.
* `name` (string) - Legt den Namen für den Dialog fest.
* `events?` (object) \[`show`|`shown`|`hide`|`hidden`\] - Legt benutzerdefinierte Ereignisse für den Dialog fest. Mehrere Ereignisse können durch Komma getrennt werden.
  * `[Ereignis]` (string) - Name des Ereignisses.
    * `function` (function|string) - Die Funktion oder der Name der Funktion, die, bzw. der beim Ereignis aufgerufen wird. Wenn eine "echte" Funktion angegeben wurde, muss diese eine anonyme Funktion sein, d.h. ohne Namen.
    * `args?` (string) - Argumente, die an die Funktion übergeben werden können. Wenn eine echte Funktion angegeben wurde, wird dieses Argument ignoriert, da Argumente auch in der echten Funktion übergeben werden können.
* `title?` (string) - Legt den Titel des Dialogs fest, der oben angezeigt wird.
* `content?` (string) - Legt den Inhalt des Dialogs fest.
  * `text?` (string) - Der Inhalt des Dialogs, welcher auch HTML-Code enthalten kann.
  * `options?` (object) - Legt Optionen für den Dialoginhalt fest.
    * `scroll?` (bool) - Legt fest, ob der Inhalt des Dialogs scrollbar wird, wenn zu viel Inhalt angezeigt wird.
    * `align?` (bool) \[`left`|`center`|`right`\] - Legt die Ausrichtung des Dialoginhalts fest. 
* `footer?` (object) - Legt den Inhalt für den Footer des Dialogs fest, welcher sich jedoch nur auf Schaltflächen bezieht.
  * `buttons?` (array) - Legt Optionen für Schaltflächen im Footer fest.
    * `default?` (object) - Legt Optionen für die Standardschaltfläche fest.
      * `text?` (string) - Legt den Inhalt der Standardschaltfläche fest.
      * `class?` (string) - Legt zusätzliche CSS-Klassen als Zeichenkette fest.
      * `display?` (bool) \[`true`|`false`\] - Legt fest, ob die Standardschaltfläche angezeigt wird. Wenn kein Wert angegeben wurde, wird `true` verwendet.
      * `attributes?` (object) - Legt zusätzliche HTML-Attribute für die Standardschaltfläche fest.
        * `[Attribut]?` (string) - Legt den Wert des angegebenen HTML-Attributs fest.
    * `custom?` (array) - Legt zusätzliche benutzerdefinierte Schaltflächen fest. Mehrere Schaltflächen können durch Komma getrennt definiert werden, wobei diese vom Objekt sein müssen.
      * `text?` (string) - Legt den Inhalt der Schaltfläche fest. Dieser kann auch HTML-Code enthalten.
      * `class?` (string) - Legt CSS-Klassen für die Schaltfläche fest.
      * `attributes?` (object) - Legt zusätzliche HTML-Attribute für die Schaltfläche fest.
        * `[Attribut]?` (string) - Legt den Wert des angegebenen HTML-Attributs fest.
      * `actions?` (object) - Legt zusätzliche Ereignisse für die Schaltfläche fest. Mehrere Ereignisse können durch Komma getrennt definiert werden.
        * `[Ereignis]?` (object) - Name des Ererignisses.
          * `function` (function|string) - Die Funktion oder der Name der Funktion, die, bzw. der beim Ereignis aufgerufen wird. Wenn eine "echte" Funktion angegeben wurde, muss diese eine anonyme Funktion sein, d.h. ohne Namen.
          * `args?` (array) - Argumente, die an die Funktion übergeben werden können. Wenn eine echte Funktion angegeben wurde, wird dieses Argument ignoriert, da Argumente auch in der echten Funktion übergeben werden können.

```js
function getGalleryItems() { ... };
```

Diese Funktion lädt Bilder für den angegebenen Zeitraum. Dazu wird eine Anfrage an den Server gesendet und mittels einer Schleife die Bilder und ihre Informationen als Kacheln in die Galerie eingefügt. Wenn die Anfrage fehlschlug, wird stattdessen eine Fehlermeldung angezeigt.

```js
function confirmation(options = {}, resolve) { ... };
```

Diese Funktion erstellt einen Bestätigungsdialog. Als Argumente werden optionale Optionen und die Funktion zum Erfüllen des Promise übergeben. Letzteres wird beim Klicken auf die Schaltfläche zum Bestätigen ausgeführt, um ebendiese Abfrage zu bestätigen.

```js
function getCookie(cname) { ... };
```

Diese Funktion gibt den Wert eines angegebenen Cookies zurück. Existiert kein entsprechendes Cookie, wird stattdessen eine leere Zeichenkette (`""`) zurückgegeben.

```js
function switchAlert(element, type) { ... };
```

Diese Funktion wird verwendet, um die Darstellung der Diagramme zu verändern, je nachdem, ob ein Messwert im warnenden oder kritischen Bereich liegt.

```js
function disableMainModal(mainButton) { ... };
```

Diese Funktion deaktiviert den Hauptdialog und die angegebene Schaltfläche, damit beim Verarbeiten von Daten diese nicht verändert weren können, bzw. die Schaltfläche zum Absenden der Daten nicht betätigt werden kann.

```js
function enableMainModal(mainButton) { ... };
```

Diese Funktion aktiviert den Hauptdialog und die angegebene Schaltfläche, wenn die Verarbeitung von Daten abgeschlossen ist.

```js
setInterval(function () { ... });
```

Diese Funktion wird im festen Intervall ausgeführt, um neue Messdaten vom Server zu laden. Dazu wird eine Anfrage an den Server gesendet und die empfangenen Daten so verarbeitet, dass diese in den Diagrammen richtig angezeigt werden. Wenn die Anfrage fehlschlug, wird stattdessen eine Fehlermeldung angezeigt.

```js
$(window).on("load", function() { ... });
```

Diese Funktion wird ausgeführt, sobald sämtliche Inhalte auf der Webseite geladen und verarbeitet wurden. Dadurch wird dann das Ladesymbol entfernt und der Variable `viewportWidth` die aktuelle Fensterbreite zugewiesen. Außerdem wird hier der API Link ermittelt, der zum Laden aller Daten vom Server verwendet wird.

```js
.on("resize", function() { ... });
```

Diese Funktion wird ausgeführt, sobald sich die Fenstergröße ändert. Sollte die Variable `viewportWidth` nicht den gleichen Wert wie die momentane Breite des Fensters haben, wird ihr ebendieser Wert zugewiesen.

```js
$(document).on("DOMContentLoaded", function() { ... });
```

Diese Funktion wird ausgeführt, sobald das DOM (und nicht alle Inhalte) vollständig geladen wurde. Hier werden sämtliche Ereignisse für HTML-Elemente definiert und neue Instanzen von Bibliotheken erzeugt (darunter auch die Diagramme). Sollte in der Adressleiste ein `#` mit anhängenden Text stehen, wird ein Klick-Ereignis auf das erste gefundene HTML-Element ausgelöst, welches als `href`-Attribut den entsprechenden Wert hat.

```js
$("a[href='#about]").click(function() { ... });
```

Diese Funktion zeigt den Hauptdialog mit den Informationen über das HydroPoc-Projekt an.

```js
$("a[href='#staff']").click(function() { ... });
```

Diese Funktion zeigt den Hauptdialog mit den Mitwirkenden am HydroPoc-Projekt an.

```js
$("#chartOptionsForm").submit(function() { ... });
```

Diese Funktion wird ausgeführt, wenn das Formular zum Bearbeiten der Messwerte abgesendet wird, um die jeweiligen eingegebenen Daten zu speichern. Je nachdem, ob das das Speichern erfolgreich war, wird eine Meldung angezeigt.

```js
$("a[href='#register']").on("click", function() { ... });
```

Diese Funktion zeigt den Hauptdialog mit Optionen zur Registrierung eines neuen Benutzers an.

```js
$("a[href='#login']").on("click", function() { ... });
```

Diese Funktion zeigt den Hauptdialog mit Optionen zum Anmelden eines Benutzers an.

```js
$("a[href='#logout']").on("click", function() { ... });
```

Diese Funktion meldet den momentan angemeldeten Benutzer ab. Dazu werden die Cookies `authToken` und `username` auf ein vergangenes Datum gesetzt, wodurch sie automatisch gelöscht werden. Das HTML-Element zum Anzeigen des Anmeldedialogs wird wieder angezeigt und das HTML-Element zum Abmelden wird ausgeblendet.

```js
$(".chart-history-button").click(function() { ... });
```

Diese Funktion zeigt den Hauptdialog mit einem Dialog an, der den Messverlauf innerhalb eines gewählten Zeitraums des jeweiligen Diagramms darstellt.

```js
$("footer").html("&copy; " + "2021-" + date.getFullYear() + " BSDGG/IN20");
```

Diese Funktion fügt in den Footer den Copyright-Vermerk mit Startjahr des Projekts und das aktuelle Jahr des Systems ein.

```js
$("#user-actions-accordion").on("shown.bs.collapse", function() { ... });
```

Diese Funktion wird ausgeführt, wenn das Dropdown-Element für die Benutzer auf der Administrationsseite geöffnet wird. Sollte die darin befindliche Tabelle noch keine DataTables-Instanz sein, wird diese mit den in der Variable `dataTablesAdminOptions` für sie gespeicherten Optionen erstellt.

```js
$("#pump-actions-accordion").on("shown.bs.collapse", function() { ... });
```

Diese Funktion wird ausgeführt, wenn das Dropdown-Element für die Pumpen auf der Administrationsseite geöffnet wird. Sollte die darin befindliche Tabelle noch keine DataTables-Instanz sein, wird diese mit den in der Variable `dataTablesAdminOptions` für sie gespeicherten Optionen erstellt.

```js
$("#collapse-logs-actions").on("shown.bs.collapse", function() { ... });
```

Diese Funktion wird ausgeführt, wenn das Dropdown-Element für die Logs auf der Administrationsseite geöffnet wird. Sollte die darin befindliche Tabelle noch keine DataTables-Instanz sein, wird diese mit den in der Variable `dataTablesAdminOptions` für sie gespeicherten Optionen erstellt.

```js
$("#collapse-plants-actions").on("shown.bs.collapse", function(element) { ... });
```

Diese Funktion wird ausgeführt, wenn das Dropdown-Element für die Pflanzen auf der Administrationsseite geöffnet wird. Sollte die darin befindliche Tabelle noch keine DataTables-Instanz sein, wird diese mit den in der Variable dataTablesAdminOptions für sie gespeicherten Optionen erstellt.

```js
$("a[href='#administration']").on("shown.bs.tab", function () { ... });
```

Diese Funktion wird ausgeführt, wenn der Tab für die Administrationsseite aktiviert und ihr Inhalt angezeigt wurde. Diese wird dazu verwendet, um die Funktion `readjustTables` auszuführen, falls die Bildschirmbreite nicht den gleichen Wert hat, wie die Variable `viewPortWidth`.


```js
$("[data-bs-toggle='collapse']").click(function() { ... });
```

Diese Funktion wird ausgeführt, wenn auf ein Dropdown-Element geklickt wird. Wenn das HTML-Attribut `aria-expanded` des jeweiligen Elements den Wert `true` hat und somit das Dropdown-Element als geöffnet gilt, wird der Pfeil am rechten Rand auf 180° gedreht, ansonsten auf 0°.

```js
$("#historyTimespan").change(function() { ... });
```

Diese Funktion wird ausgeführt, wenn der Eintrag in der Auswahlliste des Zeitraums für den Messverlauf geändert wird. Daraufhin wird die Funktion `getHistoryChartData` mit dem ausgewählten Sensor ausgeführt.


```js
$('#historyGalleryTimespanForm').submit(function () { ... });
```

Diese Funktion wird ausgeführt, wenn das Formular zur Auswahl des Zeitraums in der Galerie abgesendet wird. Daraufhin wird die Funktion `getGalleryItems` ausgeführt.

```js
$('#hydroPocLogo').on('click', function () { ... });
```

Diese Funktion wird ausgeführt, wenn auf das HydroPoc-Logo geklickt wird, um eine ***ultrafette*** Aktion auszuführen.

```js
$('#saveChartOptions').click(function () { ... });
```

Diese Funktion wird ausgeführt, wenn auf die Schaltfläche zum Speichern der Diagrammoptionen geklickt wird. Daraufhin wird das Klick-Ereignis auf das HTML-Element ausgelöst, welches das Formular der Diagrammoptionen absendet.

```js
$('#chartHistoryModal').on('show.bs.modal', function () { ... });
```

Diese Funktion wird ausgeführt, wenn der Dialog für den Messverlauf geöffnet wird. Die Skalierung des Diagramms wird hier auf die des ausgewählten Sensors angepasst und dann die Funktion `getHistoryChartData` mit dem Sensor ausgeführt.