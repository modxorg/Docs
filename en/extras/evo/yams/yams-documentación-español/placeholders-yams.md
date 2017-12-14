---
title: "Placeholders YAMS"
_old_id: "1376"
_old_uri: "evo/yams/yams-documentación-español/placeholders-yams"
---

<div class="error"><span class="error">Unknown macro: {div}</span>![](/images/icons/emoticons/information.gif)**Language Variants**

<table class="tableview" width="100%"><tr><td><span class="icon icon-page">Page:</span> [YAMS Placeholders](/extras/evo/yams/yams-english-documentation/yams-placeholders)</td></tr></table></div>YAMS Placeholders
=================

Están disponibles dos formas para cada placeholder. En la primera forma, (yams\_?), los placeholders dan información acerca del documento actual. En la segunda forma, (yams\_?:docId), dan información acercad del documento con el identificador de documento dado, docId. Debe de ser posible usar llamados a snippets y chunks para especificar el identificador de documento. (yams\_doc:\[id\]) puede ser usado dentro de plantillas.

Debe de ser posible usar YAMS placeholders casi en cualquier lugar, inclusive en chunks, en los nombres y salida de las template variables y en los nombres, salida y parámetros de los llamados de snippet.

Cuando la salida de un placeholder de YAMS es dependiente de un idioma necesita saber cual es el idioma actual. El idioma actual es dependiente del contexto. El bloque (yams-in) o el (yams-repeat) permiten la inclusión de contenido en idioma alternativo en una página. (Ver la pestaña Constructores). Si un placeholder cae dentro de uno de estos bloques, entonces el idioma actual es el especificado por estos bloques. De tora manera el idioma actual es tomado a ser el idioma en el cual la página actual está siendo mostrada. Puede haber ocasiones cuando sea necesario anular este comportamiento y forzar al placeholder a tratar el idioma del documento actual como el idioma actual. Esto puede ser llevado acabo añadiendo el símbolo + al final del nombre del placeholder. Por ejemplo, lo siguiente generará un bloque (yams-repeat) que mostrará una lista de nombres de los idiomas disponibles, todos escritos en el idioma del documento actual:

```
<pre class="brush: php">
<ul>[[YAMS? &get=`repeat` &repeattpl=`@CODE:<li>(yams_name_in_(yams_id+))</li>`]]</ul>

```YAMS placeholders
-----------------

<table><tbody><tr><th>Placeholder</th><th>Monolingual Document</th><th>Multilingual Document</th></tr><tr><th>(yams\_id)   
(yams\_id:docId)</th><td>The default language id</td><td>The current language id</td></tr><tr><th>(yams\_tag)   
(yams\_tag:docId)</th><td>The primary language tag for the default language</td><td>The primary language tag for the current language</td></tr><tr><th>(yams\_root)   
(yams\_root:docId)</th><td>Nothing</td><td>If specified and non-empty, the server root name for the current language, else nothing</td></tr><tr><th>(yams\_/root)   
(yams\_/root:docId)</th><td>Nothing</td><td>If specified and non-empty, the server root name for the current language preceded by a /, else nothing</td></tr><tr><th>(yams\_root/)   
(yams\_root/:docId)</th><td>Nothing</td><td>If specified and non-empty, the server root name for the current language followed by a /, else nothing</td></tr><tr><th>(yams\_site)   
(yams\_site:docId)</th><td>If server name mode is ON, an URL created using the specified monolingual server name. If server name mode is OFF, the same output as \[(site\_url)\].</td><td>The full multilingual site url including server name and server root as required for the current page.</td></tr><tr><th>(yams\_server)   
(yams\_server:docId)</th><td>Same as for yams\_site.</td><td>Same as for yams\_site, but with no root name.</td></tr><tr><th>(yams\_doc)   
(yams\_doc:docId)</th><td>A complete URL for the document or weblink. There is an option on the 'Other Params' tab that will suppress the filename for the site start document.</td><td>A complete URL for the current language version of the document or weblink. There is an option on the 'Other Params' tab that will suppress the filename for the site start document.</td></tr><tr><th>(yams\_docr)   
(yams\_docr:docId)</th><td>Same as for yams\_doc, but weblinks are resolved.</td><td>Same as for yams\_doc, but weblinks are resolved.</td></tr><tr><th>(yams\_dir)   
(yams\_dir:docId)</th><td>The language direction ('ltr' or 'rtl') for the default language</td><td>The language direction ('ltr' or 'rtl') for the current language</td></tr><tr><th>(yams\_align)   
(yams\_align:docId)</th><td>The text alignment ('left' or 'right') for the default language</td><td>The text alignment ('left' or 'right') for the current language</td></tr><tr><th>(yams\_mname)   
(yams\_mname:docId)</th><td>The MODx language name for the default language</td><td>The MODx language name for the current language</td></tr><tr><th>(yams\_confirm)   
(yams\_confirm:docId)</th><td>The name of the Confirm Language param. (See the Other Params tab.)</td><td>The name of the Confirm Language param. (See the Other Params tab.)</td></tr><tr><th>(yams\_change)   
(yams\_change:docId)</th><td>The name of the Change Language param. (See the Other Params tab.)</td><td>The name of the Change Language param. (See the Other Params tab.)</td></tr><tr><th>(yams\_name)   
(yams\_name:docId)</th><td>The name of the default language in the default language</td><td>The name of the current language in the current language</td></tr><tr><th>(yams\_name\_in\_langId)   
(yams\_name\_in\_langId:docId)</th><td>The name of the default language, written in the language specified by the langId language group id.</td><td>The name of the current language, written in the language specified by the langId language group id.</td></tr><tr><th>(yams\_choose)   
(yams\_choose:docId)</th><td>The Select Language Text, written in the default language. (See the Language Settings tab.)</td><td>The Select Language Text, written in the current language. (See the Language Settings tab.)</td></tr><tr><th>((yams\_data:docId:fieldname))   
((yams\_data:docId:fieldname:phx))</th><td>This special inline placeholder is different from all the others. It is used by YAMS for efficiently grabbing template variables from documents. Here, docId is the id of the document to grab the template variable from and fieldnameis the name of the template variable from which to get the data. In future, this syntax will allow phx to be used, but this is not currently supported.   
YAMS will search out all these placeholders in the document, work out what information needs to be grabbed from the database and grab in large chunks so as to minimise the number of database queries required.   
The \[\[YAMS? &get=`data` snippet call (same as the legacy \[\[YAMS? &get=`content`snippet call) which is used in the Wayfinder templates and internally by the YAMS Ditto extension will now output such placeholders meaning improved performance for large Ditto and Wayfinder calls.</td><td>Same as for monolingual documents</td></tr></tbody></table>