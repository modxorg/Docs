---
title: "YAMS + Jot"
_old_id: "1685"
_old_uri: "evo/yams/yams-english-documentation/yams-how-to/yams-jot"
---

<div class="error"><span class="error">Unknown macro: {div}</span>![](/images/icons/emoticons/information.gif)**Language Variants**

<table class="tableview" width="100%"><tr><td><span class="icon icon-page">Page:</span> [YAMS + Jot](/extras/evo/yams/yams-english-documentation/yams-how-to/yams-jot)</td></tr></table></div>How can Jot be made to work with YAMS?
======================================

- Go to Resources/Elements > Snippets > Jot
- Modify the second and third lines of the Jot snippet code to make them look like follows: ```
  <pre class="brush: php">
  include_once($modx->config['base_path'] .'assets/modules/yams/class/yams.jot.class.inc.php');
  $Jot = new CJotYAMS;
  
  ```
- If Jot placeholders are being used, then it will be necessary to specify the &tagid parameter as follows: ```
  <pre class="brush: php">
  [!Jot? &tagid=`(yams_id)` ... !]
  [+jot.html.form.(yams_id)+]
  [+jot.html.navigation.(yams_id)+]
  [+jot.html.moderate.(yams_id)+]
  [+jot.html.comments.(yams_id)+]
  [+jot.html.navigation.(yams_id)+]
  
  ```This will prevent multiple language versions of the placeholders from interfering with each other.
- To use mutliple language versions of the jot templates, it will first be necessary to find or translate templates for each required language. The forums are a good place to start searching. Then for each template, copy and paste it into a new chunk. Use a naming convention that ends in the language group id. Then add something like the following to the snippet call (uncacheable): ```
  <pre class="brush: php">
  &tplForm=`jot.tpl.form.(yams_id)` &tplComments=`jot.tpl.comment.(yams_id)` &tplModerate=`jot.tpl.moderate.(yams_id)` &tplNav=`jot.tpl.navigation.(yams_id)` &tplSubscribe=`jot.tpl.subscribe.(yams_id)` &tplNotify=`jot.tpl.notify.(yams_id)` &tplNotifyModerator=`jot.tpl.notify.moderator.(yams_id)` &tplNotifyAuthor=`jot.tpl.notify.author.(yams_id)`
  
  ```
- If it is necessary to translate text within the &validate parameter or elsewhere in the snippet call then it can be done as follows: ```
  <pre class="brush: php">
  &validate=`email:[[YAMS? &get=`text` &from=`en::Invalid email address||de::Ungültige Email-Adresse`]]:email,content:[[YAMS? &get=`text` &from=`en::Please enter a comment.||de::Bitte schreiben Sie einen Kommentar.`]]`
  
  ```