---
title: "Add Image-Tagging to the Gallery"
_old_id: "1805"
_old_uri: "revo/migxdb/migxdb.tutorials/migxdb.create-a-basic-gallery-management-from-scratch-with-migxdb/add-image-tagging"
---

## Extend the Schema

Go to Extras->MIGX

Package Name: mygallery

Tab 'XML Schema' -> Load Schema

Add this object to the existing schema:

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

Save the Sch
Go to the Tab 'Create Tables' -> Click 'Create Tables'

## Add Tagger Fields to the Formtabs

Edit the MIGX-config 'mygallery'

Go to the Tab 'Formtabs'

Add a new Tab with caption 'Tags'

Add new Field to this Tab with fieldname 'tags' and inputTVtype 'listbox-multiple'

into Input Option Values of this field put:

``` php
@EVAL return $modx->runSnippet('migxLoopCollection',array('classname'=>'mygalTag','sortConfig'=>'[{"sortby":""tag}]','tpl'=>'@CODE:[[+tag]]==[[+id]]','outputSeparator'=>'||'));
```

Create another field with the fieldname 'newtag'

Save the Fields and the Tab with 'Done'

Go to the Tab 'MIGXdb - Settings'

Add this to 'Hook Snippets'

``` json
{"aftersave":"mygallery_aftersave","aftergetfields":"mygallery_aftergetfields"}
```

Save the Config

Create two new snippets

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

## Get Tags and filter by tag for the Frontend

Create a new snippet 'mygallery\_prepareTagWhere' with this code:

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

Create a chunk 'mygallery\_tag\_item' with this code:

``` php
<a href="[[~[[*id]]? &tag=`[[+Tag_id]]`]]">[[+Tag_tag]]</a><br>
```

put this snippet-tags into your template:

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
