---
title: "YAMS Installation"
_old_id: "744"
_old_uri: "evo/yams/yams-english-documentation/yams-installation"
---

<div class="error"><span class="error">Unknown macro: {div}</span>![](/images/icons/emoticons/information.gif)**Language Variants**

<table class="tableview" width="100%"><tr><td><span class="icon icon-page">Page:</span> [YAMS Installation](/extras/evo/yams/yams-english-documentation/yams-installation)</td></tr><tr><td><span class="icon icon-page">Page:</span> [Instalar YAMS](/extras/evo/yams/yams-documentación-español/instalar-yams)</td></tr><tr><td><span class="icon icon-page">Page:</span> [YAMS Installation (de)](/extras/evo/yams/yams-deutsche-dokumentation/yams-installation-(de))</td></tr></table></div>Installing and Updating YAMS
============================

Pre-requisites
--------------

YAMS has been developed on MODx v0.9.6.3 and with PHP >= 5.2.6-3. It will not work on servers running PHP 4.

ManagerManager is not required for YAMS to function, but is recommended. YAMS can use ManagerManager to hide redundant document variables and to obtain a tabbed layout in the document view with one tab per language.

Upgrade/Update Instructions
---------------------------

To upgrade/update from a previous version do the following:

1. Rename the assets/modules/yams directory to something else. For example assets/modules/yams\_old or assets/modules/yams\_v1.1.x
2. Copy the new yams directory to assets/modules/yams
3. Copy the yams.config.inc.php file from the old yams directory into the new yams directory.
4. Make sure that the new yams directory and the yams.config.inc.php file (if it exists) are writeable by the server user/group.
5. Make sure that the YAMS plugin is set-up to be active on all the necessary events. The list of events has changed from version to version. Please see the readme.txt contained in the YAMS download for the specific events required for the that version.
6. Check that YAMS always appears first in the plugin execution order for each event that it is active. In particular, if PHx is installed then YAMS should appear before it in the OnParseDocument execution order.
7. Check that everything is still working and that the settings are correctly displayed in the YAMS module. If so, the old yams directory may be removed. If there are any problems, then the old installed can be reinstated by renaming the directories.

Installation Instructions
-------------------------

1. Copy the yams directory to assets/modules/yams
2. Make sure that the assets/modules/yams directory is writeable by the   
  user/group that your server runs under. YAMS maintains a config file called   
  config.inc.php in the directory that is automatically updated via the module   
  interface.
3. Within MODx under Elements > Manage Elements > Plugins create a new plugin:   
  **Plugin name:** YAMS   
  **Description:** Yet Another Multilingual Solution Plugin   
  **Plugin code:**```
  <pre class="brush: php">
  require( $modx->config['base_path'] . 'assets/modules/yams/yams.plugin.inc.php');
  
  ```**System Events:** Please refer to the readme.txt in the YAMS download.
4. Within MODx under Elements > Manage Elements > Snippets create a new snippet:   
  **Snippet name:** YAMS   
  **Description:** Gets multi-language content.   
  **Snippet code:**```
  <pre class="brush: php">
  // The following line needs to be placed between the opening and closing php
  // markers
  require( $modx->config['base_path'] . 'assets/modules/yams/yams.snippet.inc.php' );
  
  ```
5. Within MODx under Modules>Manage Modules create a new module:   
  **Module name:** YAMS   
  **Description:** Yet Another Multilingual Solution   
  **Module code:**```
  <pre class="brush: php">
  require_once( $modx->config['base_path'] . 'assets/modules/yams/yams.module.inc.php' );
  
  ```
6. Reload the page to update the manager view. If you want to use ManagerManager   
  to obtain a tabbed document interface then follow [the instructions below](#YAMSInstallation-ManagerManagerSetup) to set it up.
7. Follow the instructions on [the Setup page](/extras/evo/yams/yams-english-documentation/yams-setup "YAMS Setup") to setup your multilingual site.

<a name="YAMSInstallation-ManagerManagerSetup"></a>ManagerManager Setup
-----------------------------------------------------------------------

To set up ManagerManager so that it provides a tabbed document interface, please   
do the following:

1. Check that the ManagerManager plugin is installed under Elements > Manage Elements > Plugins. If not, it can be obtained from the [MODx repository](http://modxcms.com/extras/package/?package=255). The latest version is generally recommended, but please keep an eye on the forums for reports of any problems.
2. Modify the ManagerManager plugin configuration so that it knows to find custom ManagerManager rules in a chunk called mm\_rules. In newer versions this can be set using the configuration tab. In older versions this is done by including the line ```
  <pre class="brush: php">
  $config_chunk = 'mm_rules';
  
  ```in the plugin code.
3. Under Elements > Manage Elements > Chunks, create a chunk called mm\_rules and add the following line: ```
  <pre class="brush: php">
  require( $modx->config['base_path'] . 'assets/modules/yams/yams.mm_rules.inc.php' );
  
  ```If you are already using custom ManagerManager rules, then it is advisable to place the YAMS require line at the end of the rules.

PHx Setup
---------

If using the PHx snippet then please note the following. For some reason, a file specified using include\_once gets reincluded and this causes the PHxParser class to be redefined, which generates a PHP parse error. This can avoided by modifying the PHx snippet to wrap the include in some code that will only include the file if the class has not yet been defined:

```
<pre class="brush: php">
if ( ! class_exists( 'PHxParser' ) )
{
 include_once $modx->config['rb_base_dir'] . "plugins/phx/phx.parser.class.inc.php";
}

```Also, please remember that the Plugin Execution Order must be edited to place YAMS in first place - that is before PHx - on all associated events.