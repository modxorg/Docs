---
title: "Добавление тегов изображений в галерею"
description: "Расширение схемы MIGXdb, hook-сниппеты и фильтрация по тегам на фронтенде"
translation: "extras/migxdb/migxdb.tutorials/create-a-basic-gallery-management-from-scratch-with-migxdb/add-image-tagging"
---

## Расширение схемы

Откройте Extras -> MIGX

Package Name: mygallery

Вкладка «XML Schema» -> Load Schema

Добавьте объекты в существующую схему:

``` xml
<object class="mygalTag" table="migx_gallery_tags" extends="xPDOSimpleObject">
    <field key="tag" dbtype="varchar" precision="100" phptype="string" null="false" default="" index="index" />
    <field key="alias" dbtype="varchar" precision="100" phptype="string" null="false" default="" index="index" />
    <composite alias="Images" class="mygalTagImage" local="id" foreign="tag" cardinality="many" owner="local" />
</object>
<object class="mygalTagImage" table="migx_gallery_tag_images" extends="xPDOObject">
    <field key="tag" dbtype="integer" attributes="unsigned" precision="10" phptype="int" null="false" index="pk" />
    <field key="image" dbtype="integer" attributes="unsigned" precision="10" phptype="int" null="false" index="pk" />
    <index alias="PRIMARY" name="PRIMARY" primary="true" unique="true" type="BTREE">
        <column key="tag" length="" collation="A" null="false" />
        <column key="image" length="" collation="A" null="false" />
    </index>
    <aggregate alias="Tag" class="mygalTag" local="tag" foreign="id" cardinality="one" owner="foreign" />
    <aggregate alias="Image" class="myGallery" local="image" foreign="id" cardinality="one" owner="foreign" />
</object>
```

Сохраните схему.
Перейдите на вкладку «Create Tables» -> нажмите «Create Tables»

## Добавление полей тегов в Formtabs

Отредактируйте конфигурацию MIGX «mygallery»

Вкладка «Formtabs»

Добавьте вкладку с caption «Tags»

На вкладку добавьте поле с fieldname «tags» и inputTVtype «listbox-multiple»

В Input Option Values этого поля укажите:

``` php
@EVAL return $modx->runSnippet('migxLoopCollection',array('classname'=>'mygalTag','sortConfig'=>'[{"sortby":""tag}]','tpl'=>'@CODE:[[+tag]]==[[+id]]','outputSeparator'=>'||'));
```

Создайте ещё одно поле с fieldname «newtag»

Сохраните поля и вкладку через «Done»

Вкладка «MIGXdb - Settings»

В «Hook Snippets» добавьте:

``` json
{"aftersave":"mygallery_aftersave","aftergetfields":"mygallery_aftergetfields"}
```

Сохраните конфигурацию

Создайте два сниппета

mygallery\_aftersave:

``` php
$object = &$modx->getOption('object',$scriptProperties,null);
if ($object){
    $newtags = explode(',',$object->get('newtag'));
    $tags = explode('||',$object->get('tags'));
    $object_id = $object->get('id');
    //add new tags
    foreach ($newtags as $newtag){
        if (!empty($newtag)){
            if ($tag = $modx->getObject('mygalTag',array('tag'=>$newtag))){
            } else {
                $tag = $modx->newObject('mygalTag');
                $tag->set('tag',$newtag);
                $tag->save();
                $tags[] = $tag->get('id');
            }
        }
    }
    //get old imagetags
    $oldtags = array();
    $c = $modx->newQuery('mygalTagImage');
    $c->where(array('image'=>$object_id));
    if ($collection = $modx->getCollection('mygalTagImage',$c)){
    foreach ($collection as $tagimage){
            $oldtags[$tagimage->get('tag')] = $tagimage->get('tag');
        }
    }
    //add new imagetags
    foreach ($tags as $tag){
        if (!empty($tag)){
            unset($oldtags[$tag]):
            if ($tagimage = $modx->getObject('mygalTagImage',array('image'=>$object_id,'tag'=>$tag))){
            } else {
                $tagimage = $modx->newObject('mygalTagImage');
                $tagimage->set('image',$object_id);
                $tagimage->set('tag',$tag);
                $tagimage->save();
            }
        }
    }
    //remove removed imagetags
    foreach ($oldtags as $tag){
        if ($tagimage = $modx->getObject('mygalTagImage',array('image'=>$object_id,'tag'=>$tag))){
            $tagimage->remove();
        }
    }
}
```

mygallery\_aftergetfields:

``` php
$object = &$modx->getOption('object',$scriptProperties,null);
if ($object){
    $newtags = explode(',',$object->get('newtag'));
    $tags = explode('||',$object->get('tags'));
    $object_id = $object->get('id');
    //add new tags
    foreach ($newtags as $newtag){
        if (!empty($newtag)){
            if ($tag = $modx->getObject('mygalTag',array('tag'=>$newtag))){
            } else {
                $tag = $modx->newObject('mygalTag');
                $tag->set('tag',$newtag);
                $tag->save();
                $tags[] = $tag->get('id');
            }
        }
    }
    //get old imagetags
    $oldtags = array();
    $c = $modx->newQuery('mygalTagImage');
    $c->where(array('image'=>$object_id));
    if ($collection = $modx->getCollection('mygalTagImage',$c)){
    foreach ($collection as $tagimage){
    $oldtags[$tagimage->get('tag')] = $tagimage->get('tag');
        }
    }
    //add new imagetags
    foreach ($tags as $tag){
        if (!empty($tag)){
            unset($oldtags[$tag]);
            if ($tagimage = $modx->getObject('mygalTagImage',array('image'=>$object_id,'tag'=>$tag))){
            } else {
                $tagimage = $modx->newObject('mygalTagImage');
                $tagimage->set('image',$object_id);
                $tagimage->set('tag',$tag);
                $tagimage->save();
            }
        }
    }
    //remove removed imagetags
    foreach ($oldtags as $tag){
        if ($tagimage = $modx->getObject('mygalTagImage',array('image'=>$object_id,'tag'=>$tag))){
            $tagimage->remove();
        }
    }
}
```

## Получение тегов и фильтрация по тегу на фронтенде

Создайте сниппет «mygallery\_prepareTagWhere» с кодом:

``` php
$tag = isset($_GET['tag']) ? (int) $_GET['tag'] : 0;
$resource_id = $modx->getOption('resource_id',$scriptProperties,$modx->resource->get('id'));
$output='';
if (!empty($tag)){
    $c = $modx->newQuery('mygalTagImage');
    $c->leftjoin('myGallery','Image');
    $c->where(array('tag'=>$tag,'Image.resource_id'=>$resource_id));
    //$c->prepare();echo $c->toSql();
    if ($collection = $modx->getCollection('mygalTagImage',$c)){
        $image_ids = array();
        foreach ($collection as $object){
            $image_ids[] = $object->get('image');
        }
        $output = ',"id:IN":['.implode(',',$image_ids).']';
    }
}
return $output;
```

Создайте чанк «mygallery\_tag\_item» с кодом:

``` php
<a href="[[~[[*id]]? &tag=`[[+Tag_id]]`]]">[[+Tag_tag]]</a><br>
```

Добавьте в шаблон:

``` php
[[!migxLoopCollection?
  &packageName=`mygallery`
  &classname=`mygalTagImage`
  &joins=`[{"alias":"Image"},{"alias":"Tag"}]`
  &where=`{"Image.resource_id":"[[*id]]","Image.published":"1"}`
  &placeholdersKeyField=``
  &groupby=`mygalTagImage.tag`
  &sortConfig=`[{"sortby":"Tag.tag"}]`
  &tpl=`mygallery_tag_item`
]]
[[!migxLoopCollection?
  &packageName=`mygallery`
  &classname=`myGallery`
  &sortConfig=`[{"sortby":"pos"}]`
  &where=`{"resource_id":"[[*id]]","published":"1"[[!mygallery_prepareTagWhere]]}`
  &tpl=`mygallery_item`
]]
```
