---
title: "Notes for developers"
_old_id: "1752"
_old_uri: "evo/doclister/notes-for-developers"
---

### Controllers

The name of the class located in a PHP file should end with **DocLister**, and the class itself should extend the abstract class **DocLister**.

Use the parameter **dir** to indicate the path from the root of the site to the folder containing controllers.

### Extenders

Extenders can be loaded by the controller or by using the **extenders** parameter, where the names of **\*.extender.inc** files in the folder **/core/extender** are listed.

An extender to be loaded should be a class with a name beginning with the name of the extender and ending in **\_DL\_Extender**. In addition, the extender to be loaded should extend the abstract class **extDocLister**.

### Filters

Filtering rules are to be found in the file **\*.filter.php** named after the filter, in the **/core/filter** folder. The class in the file should extend the abstract class **filterDocLister**, and its own name must end in **\_DL\_filter**.

### Converting template variable type

An example from the **site\_content** controller:

 ```
<pre class="brush: php">public function changeSortType($field, $type)
    {
        $type = trim($type);
        switch (strtoupper($type)) {
            case 'TVDATETIME':
            {
                $field = "STR_TO_DATE(" . $field . ",'%d-%m-%Y %H:%i:%s')";
                break;
            }
            default:
                {
                $field = parent::changeSortType($field, $type);
                }
        }
        return $field;
    }

```### Saving the DocLister object

This may be useful when you need to apply templates to the same list twice

 ```
<pre class="brush: php">$out1 = $modx->runSnippet('DocLister', array(
    'idType' => 'parents',
    'parents' => 0,
    'tpl' => '@CODE: [+pagetitle+]<br />',
    'saveDLObject' => '_DL'
));
$_DL = $modx->getPlaceholder('_DL');
$out2 = $_DL->docsCollection()->reduce(function($out, $data) use ($_DL, $modx){
    $data['title'] = empty($data['menutitle']) ? $data['pagetitle'] : $data['menutitle'];
    $data['url'] = $modx->makeUrl($data['id']);
    return $out.$_DL->parseChunk('@CODE: [+title+]<br />', $data);
});

/** Or switch configs, to apply extenders and regular placeholder processing*/
$_DL->setConfig(array(
   'tpl' => '@CODE: [+title+]<br />'
));
$out2 = $_DL->render();
return implode("<hr />", array($out1, $out2));

```Or perhaps you need to make an array of document IDs included in the output

 ```
<pre class="brush: php">$out = $modx->runSnippet('DocLister', array(
    'saveDLObject' => '_DL'
));
$_DL = $modx->getPlaceholder('_DL');
$ids = $_DL->getOneField('id');

/** or via a collection */
$ids = $_DL->docsCollection()->map(function($val){
    return $val['id'];
})->toArray();

```### Using the DocLister template engine in your own snippets

You can use the template engine by including the **DLTemplate** class, and it can:

- Interpret<span style="">`inline` </span>templates
- Create placeholders from multi-dimensional arrays
- Automatically apply PHx processing where required
- Enable documents to be rendered using any template (with or without the use of events)

The handiest technique is to create a template engine in a variable `tpl<strong> </strong>`within the `$modx` object. To avoid doing this constantly, it is best to use a small plugin responding to the `OnWebPageInit` and `OnPageNotFound` events.

```
<pre class="brush: php">require_once('assets/snippets/DocLister/lib/DLTemplate.class.php');
$modx->tpl = DLTemplate::getInstance($modx);

```#### Regular templating

 ```
<pre class="brush: php">$data = array(
    array('id' => 1, 'text' => 'hello',
        'info' => array(
            'phone' => '01',
            'site' => 'http://example.org'
        )
    ),
    array('id' => 2, 'text' => 'world',
        'info' => array(
            'phone' => '02',
            'site' => 'http://example.com'
        )
    )
);
$out = '';

foreach($data as $item){
    $out .= $modx->tpl->parseChunk('@CODE: <strong>[+id+]</strong>. [+text+] ([+info.phone+], [+info.site+])', $item);
}

return $out;

```#### Document template substitution

The best example of this is making a print version. Sometimes it is simpler to create a minimal template for each type and adjust the output as required, rather than play around with CSS.

To keep it simple, the whole process of template variable settings is omitted. So, let us image that we have:

- A plugin `cfgTV` with a settings prefix `cfg_`
- A TV containing a list of IDs of potential print version templates (a template can be selected for each document)
- Links to the print version are output in the format `[~[*id*]~]?save=print`

We create a plugin for the **OnLoadWebDocument** and **OnLoadWebPageCache** events:

 ```
<pre class="brush: php">if(isset($modx->print)) return;

$defaultTPL = $modx->getConfig('cfg_printTPL');
$modx->print = true;

if(isset($_GET['save']) && $_GET['save']=='print' && !empty($modx->documentObject)){
        $tpl = !empty($modx->documentObject['printTPL'][1]) ? $modx->documentObject['printTPL'][1] : $defaultTPL;
        if(!empty($tpl)){
                $modx->print = $modx->tpl->renderDoc($modx->documentObject['id'], true, (int)$tpl);
        }else{
                $modx->print = false;
        }
}

if($modx->print){
    if($modx->print !== true){
        echo $modx->print;
        die();
    }
}else{
    $modx->sendErrorPage();
}

```Using template substitution may be convenient when you are editing a site on the fly (without making development versions).