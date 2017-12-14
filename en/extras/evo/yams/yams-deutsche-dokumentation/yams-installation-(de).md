---
title: "YAMS Installation (de)"
_old_id: "745"
_old_uri: "evo/yams/yams-deutsche-dokumentation/yams-installation-(de)"
---

<div class="error"><span class="error">Unknown macro: {div}</span>![](/images/icons/emoticons/information.gif)**Language Variants**

<table class="tableview" width="100%"><tr><td><span class="icon icon-page">Page:</span> [YAMS Installation](/extras/evo/yams/yams-english-documentation/yams-installation)</td></tr><tr><td><span class="icon icon-page">Page:</span> [Instalar YAMS](/extras/evo/yams/yams-documentación-español/instalar-yams)</td></tr><tr><td><span class="icon icon-page">Page:</span> [YAMS Installation (de)](/extras/evo/yams/yams-deutsche-dokumentation/yams-installation-(de))</td></tr></table></div><div class="info">In the process of being translated</div>Installation / Aktualisierung von YAMS
======================================

Voraussetzungen
---------------

YAMS kann ab MODx v0.9.6.3 und PHP >= 5.2.6-3 eingesetzt werden, es läuft nicht auf Servern mit PHP 4.

ManagerManager ist für die Funktion von YAMS nicht erforderlich, wird aber empfohlen. YAMS setzt ManagerManager u.a. dazu ein, redundante Felder von Dokumentvariablen (z.B. Menu Title) auszublenden, außerdem ermöglicht ManagerManager in der Dokumentenansicht die Anzeige von Registerkarten (Tabs) mit einem Tab pro Sprache.

Aktualisierung
--------------

Aktualisieren einer älteren Version:

1. Benennen Sie das assets/modules/yams-Verzeichnis um, z.B. in assets/modules/yams\_old oder assets/modules/yams\_v1.1.x.
2. Kopieren Sie das neue yams-Verzeichnis nach assets/modules/yams.
3. Kopieren Sie die Datei yams.config.inc.php vom alten yams-Verzeichnis in das neue yams-Verzeichnis.
4. Stellen Sie sicher, dass das neue Verzeichnis und die Datei yams.config.inc.php beschreibbar sind (entspr. Benutzer/Gruppe).
5. Stellen Sie sicher, dass die für die erfolgreiche Funktion des YAMS-Plugins erforderlichen Checkboxen gesetzt sind. Die Liste der erforderlichen Checkboxen ändert sich von Version zu Version. Bitte lesen Sie hierzu die im entsprechenden YAMS-Download enthaltene readme.txt. (s. auch Ressourcen > Ressourcen-Verwaltung > Plugins > YAMS: Systemereignisse).
6. Vergewissern Sie sich, dass YAMS bezüglich der Ausführungsreihenfolge von Plugin-Systemenereignissen stets Vorrang erhält. Sofern PHx installiert ist, muss insbesondere sichergestellt sein, dass YAMS in bezug auf das OnParseDocument-Systemereignis zuerst abgearbeitet wird.
7. Überprüfen Sie alle Einstellungen und ob die reibungslose Funktion des YAMS-Moduls gegeben ist. Sollten Probleme auftreten, können Sie den alten Zustand wiederherstellen, indem Sie o.g. Verzeichnisse wieder umbenennen.

Installation
------------

1. Kopieren Sie das yams-Verzeichnis nach assets/modules/yams.
2. Stellen Sie sicher, dass das assets/modules/yams-Verzeichnis beschreibbar ist (entspr. Benutzer/Gruppe). YAMS enthält eine Konfigurationsdatei config.inc.php, die über das Modul-Interface automatisch aktualisiert wird.
3. Erstellen Sie in MODx ein neues Plugin unter Ressourcen > Ressourcen-Verwaltung > Plugins:   
  **Plugin Name:** YAMS   
  **Beschreibung:** Yet Another Multilingual Solution   
  **Systemereignisse:** Bitte lesen Sie hierzu die im entsprechenden YAMS-Download enthaltene readme.txt (s. auch Ressourcen > Ressourcen-Verwaltung > Plugins > YAMS: Systemereignisse).   
  **Plugin-Code:**```
  <pre class="brush: php">
  require( $modx->config['base_path'] . 'assets/modules/yams/yams.plugin.inc.php' );
  
  ```
4. Erstellen Sie in MODx ein neues Snippet unter Ressourcen > Ressourcen-Verwaltung > Snippets:   
  **Snippet Name:** YAMS   
  **Beschreibung:** Für mehrsprachigen Inhalt   
  **Snippet-Code:**```
  <pre class="brush: php">
  // Die folgende Zeile muss zwischen die php-Tags gesetzt werden.
  require( $modx->config['base_path'] . 'assets/modules/yams/yams.snippet.inc.php' );
  
  ```
5. Erstellen Sie in MODx ein neues Modul unter Module > Modul-Verwaltung:   
  **Modulname:** YAMS   
  **Beschreibung:** Yet Another Multilingual Solution   
  **Modul-Code:**```
  <pre class="brush: php">
  require_once( $modx->config['base_path'] . 'assets/modules/yams/yams.module.inc.php' );
  
  ```
6. Laden Sie die Seite neu, um die Manageransicht zu aktualisieren. Falls Sie beabsichtigen, ManagerManager für die Anzeige von Registerkarten (Tabs) in der Dokumentenansicht zu verwenden, lesen Sie bitte untenstehende [Anleitung](#YAMSInstallation%28de%29-ManagerManagerSetup).
7. Lesen Sie die Anleitung auf der [Setup-Seite](/extras/evo/yams/yams-english-documentation/yams-setup "YAMS Setup"), um ihre mehrsprachige Website einzurichten.

<a name="YAMSInstallation%28de%29-ManagerManagerSetup"></a>Einrichten von ManagerManager
----------------------------------------------------------------------------------------

Um ManagerManager für die Anzeige von Registerkarten (Tabs) in der Dokumentenansicht zu verwenden, gehen Sie folgendermaßen vor:

1. Vergewissern Sie sich, dass das ManagerManager-Plugin unter Ressourcen > Ressourcen-Verwaltung > Plugins installiert ist. Falls nicht, können Sie es im [MODx repository](http://modxcms.com/extras/package/?package=255) downloaden. Es wird grundsätzlich die neueste Version empfohlen, halten Sie sich bzgl. etwaiger Problemberichte in den Foren auf dem laufenden.
2. Richten Sie in der ManagerManager-Konfiguration das Plugin so ein, dass es zusätzliche Regeln in einem Chunk namens mm\_rules vorfindet. In neueren Versionen kann dies über die Registerkarte (Tab) Konfiguration vorgenommen werden. In älteren Versionen muss der Plugin-Code um folgende Zeile ergänzt werden: ```
  <pre class="brush: php">
  $config_chunk = 'mm_rules';
  
  ```
3. Erstellen Sie unter Ressourcen > Ressourcen-Verwaltung > Chunks einen neuen Chunk namens mm\_rules und fügen folgende Zeile ein: ```
  <pre class="brush: php">
  require( $modx->config['base_path'] . 'assets/modules/yams/yams.mm_rules.inc.php' );
  
  ```Sollten Sie schon eigene ManagerManager-Regeln im Einsatz haben, ist es ratsam, die YAMS require Zeile an letzter Stelle zu plazieren.

Einrichten von PHx
------------------

Bei Verwendung des PHx-Snippets beachten Sie bitte folgendes: Eine Datei, welche die Anweisung include\_once beinhaltet wird fälschlicherweise abermals berücksichtigt, was dazu führt, dass die PHxParser-Klasse neu definiert wird, was wiederum zu einem 'PHP parse error' führt. Dies kann dadurch verhindert werden, dass die Anweisung include\_once im PHx-Snippet dahingehend modifiziert wird, dass sie die Datei nur dann berücksichtigt, wenn die Klasse nicht bereits definiert worden ist:

```
<pre class="brush: php">
if ( ! class_exists( 'PHxParser' ) )
{
 include_once $modx->config['rb_base_dir'] . "plugins/phx/phx.parser.class.inc.php";
}

```Bedenken Sie bitte außerdem, dass YAMS hinsichtlich der Ausführungsreihenfolge der Plugins bei allen zugehörigen Systemereignissen - insbesondere vor PHx - an die jeweils oberste Position zu setzen ist (s. Ressourcen > Ressourcen-Verwaltung > Plugins: Ausführungsreihenfolge festlegen).