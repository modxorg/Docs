---
title: "YAMS Setup (de)"
_old_id: "755"
_old_uri: "evo/yams/yams-deutsche-dokumentation/yams-setup-(de)"
---

<div class="error"><span class="error">Unknown macro: {div}</span>![](/images/icons/emoticons/information.gif)**Language Variants**

<table class="tableview" width="100%"><tr><td><span class="icon icon-page">Page:</span> [YAMS Setup (de)](/extras/evo/yams/yams-deutsche-dokumentation/yams-setup-(de))</td></tr><tr><td><span class="icon icon-page">Page:</span> [Configurar YAMS](/extras/evo/yams/yams-documentación-español/configurar-yams)</td></tr><tr><td><span class="icon icon-page">Page:</span> [YAMS Setup](/extras/evo/yams/yams-english-documentation/yams-setup)</td></tr></table></div><div class="info">In the process of being translated</div>Einrichten von YAMS
===================

Diese Anleitung beschreibt, wie man mit YAMS eine neue Website erstellt bzw. eine bestehende Website mit möglichst geringem Aufwand in eine mehrsprachige umwandelt. Theoretisch ist es, abgesehen vom Neuladen der Server config, möglich, eine Website in eine mehrsprachige umzuwandeln, ohne sie während des Umbaus stillegen zu müssen. Wenn alles gutgeht, sollte die Website zu keinem Zeitpunkt gestört sein.

Diese Anleitung soll jenen helfen, die eine ganz neue mehrsprachige Website erstellen wollen, aber auch jenen, die einer bestehenden einsprachigen Website zusätzliche Sprachversionen hinzuzufügen beabsichtigen.

Erstellung einer neuen bzw. Erweiterung einer einsprachigen Website
-------------------------------------------------------------------

Es wird davon ausgegangen, dass das YAMS-Modul, das -Plugin und das -Snippet anhand der [Installationsanleitung](/extras/evo/yams/yams-english-documentation/yams-installation "YAMS Installation") bereits installiert wurden. [ManagerManager](http://modxcms.com/extras/package/255) ist für die Funktion von YAMS nicht erforderlich, wird aber sehr empfohlen. YAMS setzt ManagerManager u.a. dazu ein, redundante Felder von Dokumentvariablen (z.B. Menu Title) auszublenden, außerdem ermöglicht ManagerManager in der Dokumentenansicht die Anzeige von Registerkarten (Tabs) mit einem Tab pro Sprache.

Benutzerfreundliche URLs und benutzerfreundliche Aliaspfad-Angaben werden von YAMS unterstützt.

Die YAMS-Standardinstallation tut zunächst nichts - die eigentliche mehrsprachige Funktionalität ist erst gegeben, nachdem vorhandene Dokumentvorlagen (Templates) als mehrsprachig definiert worden sind.

YAMS Schritt für Schritt
------------------------

<table><tbody><tr><th>Schritt</th><th>Aktion</th><th>Beschreibung</th></tr><tr><td>1</td><th>Backup</th><td>Es ist immer ratsam, vor der Änderung einer Website eine Sicherung anzulegen.</td></tr><tr><td>2</td><th>Festlegen des URL-Formats</th><td>Bevor Sie YAMS konfigurieren, ist es notwendig, festzulegen auf welche Weise die Sprache der jeweiligen Dokumente aus der URL ausgelesen wird. YAMS kann in verschiedenen Modi (Betriebsarten) ausgeführt werden, je nachdem wie die URLs konfiguriert sind: **Server-Name**-Modus, **Rootverzeichnis-Name**-Modus, **eindeutiger-mehrsprachiger-Aliasname**-Modus und **Abfrage-Parameter**-Modus. Diese Modi sind auf der [Modi-Seite](/extras/evo/yams/yams-english-documentation/yams-language-modes "YAMS Language Modes") detailliert beschrieben. Beispiele, wie die verschiedenen Sprachversionen eines einzelnen Dokuments konfiguriert sein könnten, werden im folgenden Abschnitt erläutert: ### Verwendung eindeutiger-mehrsprachiger-Aliasname

- Jede Sprachvariante wird mit einem eindeutigen Namen referenziert.
- Jede Sprachvariante eines jeden Dokuments hat einen eindeutigen Namen.
- Kann mit oder ohne benutzerfreundliche Aliaspfad-Angaben verwendet werden.
- Die Dokumentsprache wird aus dem Dokument-Aliasnamen ermittelt.   
  **Beispiel:**
- [http://server\_name/startseite.html](http://server_name/startseite.html)
- [http://server\_name/home.html](http://server_name/home.html)  
  ### Verwendung Modus Server-Name und Modus Rootverzeichnis-Name
- Kann mit oder ohne uneindeutiger-mehrsprachiger-Aliasname bzw. eindeutiger-mehrsprachiger-Aliasname verwendet werden.
- Kann mit oder ohne benutzerfreundliche Aliaspfad-Angaben verwendet werden.   
  **Beispiele:**
- Modus nur Server-Name: 
  - [http://de.server\_name.com/meindok.html](http://de.server_name.com/meindok.html)
  - [http://en.server\_name.com/mydoc.html](http://en.server_name.com/mydoc.html)
- Modus nur Rootverzeichnis-Name: 
  - [http://de.server\_name.com/meindok.html](http://de.server_name.com/meindok.html)
  - [http://en.server\_name.com/mydoc.html](http://en.server_name.com/mydoc.html)
- Modus nur Rootverzeichnis-Name, mit einer Sprachvariante im Rootverzeichnis: 
  - [http://server\_name.com/meindok.html](http://server_name.com/meindok.html)
  - [http://server\_name.com/en/mydoc.html](http://server_name.com/en/mydoc.html)
- Modus Server-Name, Modus Rootverzeichnis-Name, benutzerfreundliche Aliaspfad-Angaben, mehrsprachige Aliasnamen und Mehrbyte-URLs: 
  - [http://de.server\_name.com/deutschland/verzeichnis/meindok.html](http://de.server_name.com/deutschland/verzeichnis/meindok.html)
  - [http://en.server\_name.com/england/directory/mydoc.html](http://en.server_name.com/england/directory/mydoc.html)  
      ### Verwendung Modus Abfrage-Parameter
- Auf diese Methode wird zurückgegriffen, wenn es anders nicht möglich ist, die Dokumentsprache zu ermitteln.
- Kann mit oder ohne benutzerfreundliche URLs bzw. benutzerfreundliche Aliaspfad-Angaben verwendet werden.
- Der Name des Abfrage-Parameters kann angepasst werden.   
  **Beispiele:**
- [http://server\_name.com/meindok.html?yams\_lang=de](http://server_name.com/meindok.html?yams_lang=de)
- [http://server\_name.com/mydoc.html?yams\_lang=en](http://server_name.com/mydoc.html?yams_lang=en)

</td></tr><tr><td>3</td><th>Konfigurieren der Spracheinstellungen</th><td>Der zweite Schritt beinhaltet das Konfigurieren der Spracheinstellungen für jede Sprachgruppe, die für die jeweiligen mehrsprachigen Dokumente zum Einsatz kommen. Dies kann mittels der Registerkarte (Tab) 'Language Settings' innerhalb des YAMS-Moduls vorgenommen werden (s. Module > YAMS: Language Settings).   
Jede Sprachgruppe hat eine eigene id, diese wird z.B. in den mehrsprachigen Versionen der Template-Variablen einer gegebenen Sprache verwendet, Beispiel: description\_id, wobei id = de, en, fr etc.   
Sprachgruppen können so eingerichtet werden, dass sie eine Sprache (en), eine lokalisierte (örtlich begrenzte) Sprache (en-gb), oder eine Auswahl von mehreren lokalisierten Sprachen (en,en-gb,en-us,...) repräsentieren, letztere wie gesehen kommasepariert.   
Außer der Einstellung der id einer Sprachgruppe und der URL für jede Sprachgruppe, ist es außerdem möglich, die Schreibrichtung einer Sprache (z.B. von rechts nach links) festzulegen.   
Eine Sprachgruppe muss als die standardmäßige (default) Sprachgruppe festgelegt werden, diese ist dann für einsprachige Dokumente zuständig.</td></tr><tr><td>4</td><th>Aktualisieren der benutzerfreundlichen URLs config</th><td>Als nächstes muss der Server entsprechend der gewählten Sprachkonfiguration eingerichtet werden. Hierzu ist es notwendig, den unter der Registerkarte (Tab) 'Server config' vorhandenen automatisch generierten Code in die .htaccess-Datei zu kopieren. Es wird empfohlen, den Server hiernach neuzustarten.   
Die Server Config-Datei (.htaccess) muss immer dann aktualisiert werden, wenn bspw. eine Sprachgruppe aktiviert oder deaktiviert, der Server- oder Rootverzeichnis-Name geändert, oder der Abfrageparameter umbenannt wurde.   
Alle bis zum jetzigen Zeitpunkt gemachten Änderungen an der Website haben noch keinen sichtbaren Effekt, da alle Seiten vom System noch als einsprachig (bzw. nicht-mehrsprachig) behandelt werden.</td></tr><tr><td>5</td><th>Prüfen der URLs</th><td>YAMS erkennt die von MODx standardmäßig generierten URLs und wandelt diese automatisch in mehrsprachige URLs um, sodass sie auf die korrekte Sprachgruppe verweisen. Die URL-Formate, die YAMS automatisch erkennt, lauten: "\[(site\_url)\]\[~irgendwas~\]" oder "\[(base\_url)\]\[~irgendwas~\]" und "\[~irgendwas~\]".   
Die von YAMS generierten mehrsprachigen URLs bestehen immer aus der kompletten URL, also inklusive Servername und vollständiger Pfadangabe; dadurch bleiben sie von der Einstellung der base href unberührt. Die URLs können auch über den 'Other Params'-Tab konfiguriert werden. Es ist zum Beispiel möglich, Weblink-URLs so einzurichten, dass sie immer nach ihrer Ziel-URL aufgelöst werden, oder dass der Dateiname des Website-Startdokuments der standardmäßigen Sprache nicht ausgegeben/angezeigt wird.   
URLs von Bildern, Stylesheets und Javascript-Dateien werden von YAMS nicht beeinflusst, bei Verwendung von relativen URLs muss jedoch die Einstellung der base href beachtet werden, hierzu dient der (yams\_server) genannte YAMS-Platzhalter:   
```
<pre class="brush: php">
<base href="(yams_server)"></base>

```Bei allen internen URLs, die von MODx nicht automatisch verarbeitet werden, sind für die Generierung von korrekten mehrsprachigen URLs folgende YAMS-Platzhalter zu verwenden:   
(yams\_doc:docId) oder (yams\_docr:docId) in Dokumentvorlagen (Templates) und Seiteninhalt; und:   
(yams\_doc:\[<ins>docId</ins>\]) oder (yams\_docr:\[<ins>docId</ins>\]) in Snippet Templates.   
Siehe Module > YAMS > Documentation > YAMS Placeholders für eine detaillierte Beschreibung.

</td></tr><tr><td>6</td><th>Festlegen der Sprach-Tags (z.B. en,en-gb,en-us) und Schreibrichtung</th><td>Im nächsten Schritt sind die Sprach-Tags und die Schreibrichtung zu bestimmen, folgende YAMS-Platzhalter kommen zum Einsatz: lang="(yams\_tag)" und/oder xml:lang="(yams\_tag)" und dir="(yams\_dir)"</td></tr><tr><td>7</td><th>Anpassen der Snippets</th><td>Alle Snippets, die URLs ausgeben oder mehrsprachigen Text enthalten, welche/r nicht in mehrsprachigen Platzhaltern eingebettet sind/ist, müssen nun aktualisiert werden. Anleitungen für Wayfinder, Ditto, eForm, jot und andere Snippets finden Sie unter dem 'How To?'-Tab.   
Der Platzhalter (yams\_mname) dient dazu, die voreingestellte MODx Manager-Sprache (s. Module > YAMS > Language Settings: MODx Manager Language) an Snippet-Aufrufe zu übergeben. Für Snippet-Aufrufe von Ditto und eForm kann z.B. &language=`(yams\_mname)` verwendet werden.</td></tr><tr><td>8</td><th>Vorgehensweise bzgl. Umleitung</th><td>Es ist jetzt möglich, Dokumentvorlagen (Templates) als mehrsprachig zu definieren. Allen Dokumenten, die mit mehrsprachigen Dokumentvorlagen verknüpft sind, werden jene Sprachversionen zugewiesen, die zuvor in der Registerkarte (Tab) 'Language Settings' hinterlegt wurden - für Seiteninhalt, der (dann) mittels sprachspezifischer Template-Variablen gesteuert wird. Außerdem passen sich die mit den Dokumenten verknüpften URLs an die jeweilige Sprache an. Die alten/einsprachigen URLs werden automatisch zu der korrekten Sprachvariante umgeleitet. YAMS bietet mehrere unterschiedliche Umleitungsmodi an, diese können in der Registerkarte 'Other Params' unter 'URL Redirection Settings' eingestellt werden.   
Sofern vorhandener Seiteninhalt noch nicht übersetzt wurde, sollte der Umleitungsmodus 'default' gewählt werden, diese Einstellung bewirkt die Anzeige einer gültigen Seite in der standardmäßig definierten Sprache. Erst wenn Übersetzungen vorliegen, kann z.B. der Modus 'Current else Browser' gewählt werden. Diese Einstellung führt zur Beibehaltung der Sprache, die der Browser eines Besuchers bereits festgelegt hat (z.B. während eines zuvor stattgefundenen Besuchs von <http://www.meineseite.com/> im Modus Rootverzeichnis-Name), anderenfalls wird eine entsprechende Sprache (z.B. <http://www.meineseite.com/de/>) basierend auf den Browsereinstellungen des Besuchers festgelegt.   
Es ist auch möglich, den HTTP-Statuscode, der bei der Umleitung gesendet wird, zu beeinflussen. Der Statuscode für die Umleitung von bestehenden Seiten auf die neue standardmäßige Sprache kann bis zur Fertigstellung der Website auf "Temporary" (307) gesetzt werden, einmal fertiggestellt sollte "Permanent" (301) gewählt werden - diese Einstellung bewirkt die korrekte Re-Indexierung bestehender Seiten durch Suchmaschinen. Bei der Umleitung zu Seiten, die nicht in der standardmäßigen Sprache vorliegen, muss der Statuscode auf "See Other" (303) gesetzt werden, diese Einstellung weist Suchmaschinen an, die neue (und nicht die alte) Seite zu cachen/indexieren.</td></tr><tr><td>9</td><th>ManagerManager Interface</th><td>Jetzt ist der richtige Zeitpunkt, ManagerManager zu installieren, falls es noch nicht geschehen ist - dies wird sehr empfohlen. Lesen Sie dazu [die Anleitung auf der Installationsseite](/extras/evo/yams/yams-english-documentation/yams-installation#YAMSInstallation-ManagerManagerSetup).   
Mit ManagerManager ist es möglich, die Anzeige von Feldern (z.B. Menu Title) beim Editieren von mehrsprachigen Dokumenten zu organisieren. Dies kann unter 'Document Layout Settings' der 'Other Params'-Registerkarte vorgenommen werden.   
Beim Umwandeln eines Dokuments in ein mehrsprachiges Dokument werden die bestehenden (MODx-seitigen) Dokumentvariablen, inklusive des Pagetitles, beibehalten. Da jedoch alle Dokumentvariablen, bis auf Pagetitle, nun redundant sind, können diese unter 'Document Layout Settings' der 'Other Params'-Registerkarte ausgeblendet werden. Durch YAMS übernimmt der Pagetitle des Dokuments die Rolle eines "Textidentifizierers" für alle Sprachvarianten des Dokuments innerhalb des MODx-Backends. YAMS bietet die Option, den Pagetitle eines Dokuments mit dem Inhalt des mehrsprachigen Pagetitles der standardmäßigen Sprache beim Abspeichern zu aktualisieren.</td></tr><tr><td>10</td><th>Mehrsprachige Templates</th><td>Es ist nun möglich, anhand der Registerkarte (Tab) 'Multilingual Templates' bestimmte Dokumentvorlagen als mehrsprachig zu definieren.   
Für Dokumentvorlagen, die mehrsprachig vorliegen sollen, ist 'yes' zu wählen - YAMS erstellt anschließend die entsprechenden Template-Variablen. Es ist möglich, zunächst etwas herumzuexperimentieren, indem man eine neue Dokumentvorlage erstellt, diese als mehrsprachig definiert und mit einem neuen Dokument verknüpft, das man mit Beispielinhalt füllt.</td></tr><tr><td>11</td><th>Übersetzen</th><td>Theoretisch können jetzt die dem System vorliegenden verschiedenen Sprachversionen eines Dokuments unter Eingabe der entsprechenden URL im Browser aufgerufen werden. Natürlich ist momentan nur für die standardmäßige Sprachversion Seiteninhalt vorhanden. Beim Editieren eines Dokuments wird jetzt eine Registerkarte pro Sprache angezeigt und der Seiteninhalt kann übersetzt werden. Sie werden feststellen, dass die Website weiterhin unverändert vorliegt und keine Verweise auf die neuen Sprachversionen vorhanden sind, dies ändert sich im nächsten Schritt.</td></tr><tr><td>12</td><th>Publizieren</th><td>Nach dem Übersetzen der betreffenden Seiten kann mit dem Publizieren begonnen werden. Die Snippet-Aufrufe   
```
<pre class="brush: php">
[[YAMS? &get=`list`]]

```oder

```
<pre class="brush: php">
[[YAMS? &get=`selectform`]]

```können zur Bereitstellung Listen-basierter bzw. Aufklappmenu-basierter Sprachwahl in mehrsprachigen Dokumentvorlagen eingesetzt werden (an Templates/Styles anpassbar). Lesen Sie hierzu die [YAMS-Snippetseite](/extras/evo/yams/yams-english-documentation/yams-snippet "YAMS Snippet") für detaillierte Beschreibungen.

</td></tr><tr><td>13</td><th>Fertig!</th><td>Die Website bietet jetzt die Möglichkeit, in verschiedenen Sprachen angezeigt zu werden. Der Umleitungsmodus und Statuscodes können aktualisiert werden. Stellen Sie sicher, dass ggf. vorhandene Suchmaschinen-Sitemaps eine Liste aller Dokumente beinhalten und nicht nur die einer Sprache. Hierzu mehr unter der Registerkarte 'How To?'.</td></tr></tbody></table>