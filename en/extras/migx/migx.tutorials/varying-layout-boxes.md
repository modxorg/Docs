---
title: "MIGX.Varying layout-boxes"
_old_id: "929"
_old_uri: "revo/migx/migx.tutorials/migx.varying-layout-boxes"
---

- [Create varying layout-boxes with MIGX](#MIGX.Varyinglayout-boxes-CreatevaryinglayoutboxeswithMIGX)
  - [Requirements](#MIGX.Varyinglayout-boxes-Requirements)
  - [The Template](#MIGX.Varyinglayout-boxes-TheTemplate)
  - [The Preview-Page](#MIGX.Varyinglayout-boxes-ThePreviewPage)
  - [The MIGX-Tv](#MIGX.Varyinglayout-boxes-TheMIGXTv)
      - [General Information](#MIGX.Varyinglayout-boxes-GeneralInformation)
            - [Name](#MIGX.Varyinglayout-boxes-Name)
      - [Input Options](#MIGX.Varyinglayout-boxes-InputOptions)
            - [Input-type](#MIGX.Varyinglayout-boxes-Inputtype)
            - [Form Tabs](#MIGX.Varyinglayout-boxes-FormTabs)
            - [Grid Columns](#MIGX.Varyinglayout-boxes-GridColumns)
            - [Preview Url](#MIGX.Varyinglayout-boxes-PreviewUrl)
      - [Template Access](#MIGX.Varyinglayout-boxes-TemplateAccess)
  - [The Chunks](#MIGX.Varyinglayout-boxes-TheChunks)
      - [OneCell](#MIGX.Varyinglayout-boxes-OneCell)
            - [Name](#MIGX.Varyinglayout-boxes-Name)
            - [Chunk Code](#MIGX.Varyinglayout-boxes-ChunkCode)
      - [TwoCells](#MIGX.Varyinglayout-boxes-TwoCells)
            - [Name](#MIGX.Varyinglayout-boxes-Name)
            - [Chunk Code](#MIGX.Varyinglayout-boxes-ChunkCode)
      - [ThreeCells](#MIGX.Varyinglayout-boxes-ThreeCells)
            - [Name](#MIGX.Varyinglayout-boxes-Name)
            - [Chunk Code](#MIGX.Varyinglayout-boxes-ChunkCode)
- [Create Pages with varying layout-boxes](#MIGX.Varyinglayout-boxes-CreatePageswithvaryinglayoutboxes)



##  Create varying layout-boxes with MIGX 

 This Tutorial will show you step by step how to setup MIGX for adding and editing variying layout-Boxes.

 This example was created during [this discussion](http://forums.modx.com/thread/31581/tv-s-for-varying-page-layouts).

 The Request was how to create a System in MODX where the editor can add multiple Boxes with varying layouts, in this case boxes with one, two, or three Columns. Each Column with an image, a headline and content.

###  Requirements 

 First off, you'll want to go ahead and download and install some Extras that we'll be using for this Setup. The following is a list of used Extras:

- [MIGX](/extras/migx "MIGX") - For creating and fill the boxes in MODX-backend and for listing them on the frontend. ADDON/TinyMCE
- [TinyMCE](/extras/evo/tinymce "TinyMCE") - Richtext-Editor to edit the content-texts.
- [phpThumbOf](/extras/phpthumbof "phpThumbOf") - For resizing the images to fit in our columns.

###  The Template 

 For this Tutorial we want to create a new Template. We name it 'MultiColumn'

 ``` html 

<html>
    <head>
        <title>[[++site_name]] - [[*pagetitle]]</title>
        <base href="[[++site_url]]" />
        <style>
            /* reset */
            html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,font,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td{margin:0;padding:0;border:0;outline:0;font-size:100%;vertical-align:baseline;background:transparent}body{line-height:1}ol,ul{list-style:none}blockquote,q{quotes:none}blockquote:before,blockquote:after,q:before,q:after{content:'';content:none}:focus{outline:0}ins{text-decoration:none}del{text-decoration:line-through}table{border-collapse:collapse;border-spacing:0}
            /* text */
            body{font:13px/1.5 'Helvetica Neue',Arial,'Liberation Sans',FreeSans,sans-serif}a:focus{outline:1px dotted}hr{border:0 #ccc solid;border-top-width:1px;clear:both;height:0}h1{font-size:25px}h2{font-size:23px}h3{font-size:21px}h4{font-size:19px}h5{font-size:17px}h6{font-size:15px}ol{list-style:decimal}ul{list-style:disc}li{margin-left:30px}p,dl,hr,h1,h2,h3,h4,h5,h6,ol,ul,pre,table,address,fieldset{margin-bottom:20px}
            /* fixed: cols 12, rows 4, box_w 80, box_h 80, margin_w 10, margin_h 10, w 960, h 320 */
            .container,.container_12{margin-left:auto;margin-right:auto;width:960px;}.grid_h_1,.grid_h_2,.grid_h_3,.grid_h_4,.grid_h_5,.grid_h_6,.grid_h_7,.grid_h_8,.grid_h_9,.grid_h_10,.grid_h_11,.grid_h_12{position:relative;display:inline;float:left;margin-left:10px;margin-right:10px;}.grid_v_1,.grid_v_2,.grid_v_3,.grid_v_4{position:relative;display:inline;float:left;margin-top:10px;margin-bottom:10px;}.alpha_h{margin-left:0;}.omega_h{margin-right:0;}.alpha_v{margin-top:0;}.omega_v{margin-bottom:0;}.grid_h_1{width:60px;}.grid_h_2{width:140px;}.grid_h_3{width:220px;}.grid_h_4{width:300px;}.grid_h_5{width:380px;}.grid_h_6{width:460px;}.grid_h_7{width:540px;}.grid_h_8{width:620px;}.grid_h_9{width:700px;}.grid_h_10{width:780px;}.grid_h_11{width:860px;}.grid_h_12{width:940px;}.grid_v_1{min-height:60px;}.grid_v_2{min-height:140px;}.grid_v_3{min-height:220px;}.grid_v_4{min-height:300px;}.clear{clear:both;display:block;overflow:hidden;visibility:hidden;width:0;height:0;}.clearfix:after{clear:both;content:' ';display:block;font-size:0;line-height:0;visibility:hidden;width:0;height:0;}* html .clearfix,*:first-child+html .clearfix{zoom:1;}.middle_1{line-height:60px;}.middle_2{line-height:140px;}.middle_3{line-height:220px;}.middle_4{line-height:300px;}
            /*  */
            .box {background:#ccc}
        </style>
    </head>
    <body>
        <div class="container clearfix">
            [[getImageList? &tpl=`@FIELD:MIGX_formname`&tvname=`MultiColumn`]]
            <div class="grid_h_12 grid_v_1">[[*content]]</div>
            <div class="grid_h_12 grid_v_1 middle_1">[^q^] queries, querytime [^qt^], phptime [^p^], totaltime [^t^], source [^s^]</div>
        </div>
    </body>
</html>

```

###  The Preview-Page 

 Now we create a Preview-Page. With this page created we can see a Preview of our boxes in the backend without the need to save our Resource.

 Create a new Folder in your Resource-Tree, which is hidden from menue, you can name it: 'MIGX-previews'.

 Create a new Resource under this Folder and choose the MultiColumn-Template. You can name it 'MultiColumn Preview'

###  The MIGX-Tv 

 Now we are ready to create our MIGX-TV. Create a new TV.

####  General Information 

#####  Name 

 MultiColumn

####  Input Options 

#####  Input-type 

 migx

#####  Form Tabs 

 ``` javascript 
[{
    "formname":"OneCell"
    ,"formtabs": [{
        "caption":"Row Format"
        ,"fields": [{
            "field":"fake"
            ,"inputTVtype":"hidden"
        },{
            "field":"cell_2_image"
            ,"caption":"Image"
            ,"inputTVtype":"hidden"
        },{
            "field":"cell_2_headline"
            ,"caption":"Headline"
            ,"inputTVtype":"hidden"
        },{
            "field":"cell_2_content"
            ,"caption":"Content"
            ,"inputTVtype":"hidden"
        },{
            "field":"cell_3_image"
            ,"caption":"Image"
            ,"inputTVtype":"hidden"
        },{
            "field":"cell_3_headline"
            ,"caption":"Headline"
            ,"inputTVtype":"hidden"
        },{
            "field":"cell_3_content"
            ,"caption":"Content"
            ,"inputTVtype":"hidden"
        }]
    },{
        "caption":"First"
        ,"fields": [{
            "field":"cell_1_image"
            ,"caption":"Image"
            ,"inputTVtype":"image"
        },{
            "field":"cell_1_headline"
            ,"caption":"Headline"
        },{
            "field":"cell_1_content"
            ,"caption":"Content"
            ,"inputTVtype":"richtext"
        }]
    }]
},{
    "formname":"TwoCells"
    ,"formtabs":[{
        "caption":"Row Format"
        ,"fields": [{
            "field":"fake"
            ,"inputTVtype":"hidden"
        },{            "field":"cell_3_image"
            ,"caption":"Image"
            ,"inputTVtype":"hidden"
        },{
            "field":"cell_3_headline"
            ,"caption":"Headline"
            ,"inputTVtype":"hidden"
        },{
            "field":"cell_3_content"
            ,"caption":"Content"
            ,"inputTVtype":"hidden"
        }]
    },{
        "caption":"First"
        ,"fields":[{
            "field":"cell_1_image"
            ,"caption":"Image"
            ,"inputTVtype":"image"
        },{
            "field":"cell_1_headline"
            ,"caption":"Headline"
        },{
            "field":"cell_1_content"
            ,"caption":"Content"
            ,"inputTVtype":"richtext"
        }]
    },{
        "caption":"Second"
        ,"fields":[{
            "field":"cell_2_image"
            ,"caption":"Image"
            ,"inputTVtype":"image"
        },{
            "field":"cell_2_headline"
            ,"caption":"Headline"
        },{
            "field":"cell_2_content"
            ,"caption":"Content"
            ,"inputTVtype":"richtext"
        }]
    }]
},{
    "formname":"ThreeCells"
    ,"formtabs":[{
        "caption":"Row Format"
        ,"fields": [{
            "field":"fake"
            ,"inputTVtype":"hidden"
        }]
    },{
        "caption":"First"
        ,"fields": [{
            "field":"cell_1_image"
            ,"caption":"Image"
            ,"inputTVtype":"image"
        },{
            "field":"cell_1_headline"
            ,"caption":"Headline"
        },{
            "field":"cell_1_content"
            ,"caption":"Content"
            ,"inputTVtype":"richtext"
        }]
    },{
        "caption":"Second"
        ,"fields":[{
            "field":"cell_2_image"
            ,"caption":"Image"
            ,"inputTVtype":"image"
        },{
            "field":"cell_2_headline"
            ,"caption":"Headline"
        },{
            "field":"cell_2_content"
            ,"caption":"Content"
            ,"inputTVtype":"richtext"
        }]
    },{
        "caption":"Third"
        ,"fields":[{
            "field":"cell_3_image"
            ,"caption":"Image"
            ,"inputTVtype":"image"
        },{
            "field":"cell_3_headline"
            ,"caption":"Headline"
        },{
            "field":"cell_3_content"
            ,"caption":"Content"
            ,"inputTVtype":"richtext"
        }]
    }]
}]

```

 

 Make sure, you have all the same fieldnames in all formtab-setups. Unused fields in hidden-fields. Otherwise you will loose values, when you switch between formtabs. 

#####  Grid Columns 

 ``` javascript 
[{
    "header": "Row Format"
    ,"width": "30"
    ,"sortable": "true"
    ,"dataIndex": "MIGX_formname"
},{
    "header": "First"
    ,"width": "160"
    ,"sortable": "false"
    ,"dataIndex": "cell_1_image"
    ,"renderer": "this.renderImage"
},{
    "header": "Second"
    ,"width": "160"
    ,"sortable": "false"
    ,"dataIndex": "cell_2_image"
    ,"renderer": "this.renderImage"
},{
    "header": "Third"
    ,"width": "160"
    ,"sortable": "false"
    ,"dataIndex": "cell_3_image"
    ,"renderer": "this.renderImage"
}]

```

#####  Preview Url 

 Add here the complete Url of your created Preview-Resource.

####  Template Access 

 our MultiColumns - Template

###  The Chunks 

 Our last step is to create three chunks for our layout-boxes.

####  OneCell 

#####  Name 

 OneCell

#####  Chunk Code 

 ``` html 
<div class="box grid_h_12 grid_v_4">
    <div class="grid_h_12 alpha_h omega_h grid_v_1 alpha_v"><img src="[[+cell_1_image:phpthumbof=`w=900&h=250&zc=1`]]"/></div>
    <div class="grid_h_12 alpha_h omega_h grid_v_1"><h2>[[+cell_1_headline]]</h2></div>
    <div class="grid_h_12 alpha_h omega_h grid_v_2 omega_v">[[+cell_1_content]]</div>
</div>
<div class="clear"></div>

```

####  TwoCells 

#####  Name 

 TwoCells

#####  Chunk Code 

 ``` html 
<div class="box grid_h_6 grid_v_4">
    <div class="grid_h_6 alpha_h omega_h grid_v_1 alpha_v"><img src="[[+cell_1_image:phpthumbof=`w=460&h=320&zc=1`]]"/></div>
    <div class="grid_h_6 alpha_h omega_h grid_v_1"><h2>[[+cell_1_headline]]</h2></div>
    <div class="grid_h_6 alpha_h omega_h grid_v_2 omega_v">[[+cell_1_content]]</div>
</div>
<div class="box grid_h_6 grid_v_4">
    <div class="grid_h_6 alpha_h omega_h grid_v_1 alpha_v"><img src="[[+cell_2_image:phpthumbof=`w=460&h=320&zc=1`]]"/></div>
    <div class="grid_h_6 alpha_h omega_h grid_v_1"><h2>[[+cell_2_headline]]</h2></div>
    <div class="grid_h_6 alpha_h omega_h grid_v_2 omega_v">[[+cell_2_content]]</div>
</div>
<div class="clear"></div>

```

####  ThreeCells 

#####  Name 

 ThreeCells

#####  Chunk Code 

 ``` html 
<div class="box grid_h_4 grid_v_4">
    <div class="grid_h_4 alpha_h omega_h grid_v_1 alpha_v"><img src="[[+cell_1_image:phpthumbof=`w=300&h=250&zc=1`]]"/></div>
    <div class="grid_h_4 alpha_h omega_h grid_v_1"><h2>[[+cell_1_headline]]</h2></div>
    <div class="grid_h_4 alpha_h omega_h grid_v_2 omega_v">[[+cell_1_content]]</div>
</div>
<div class="box grid_h_4 grid_v_4">
    <div class="grid_h_4 alpha_h omega_h grid_v_1 alpha_v"><img src="[[+cell_2_image:phpthumbof=`w=300&h=250&zc=1`]]"/></div>
    <div class="grid_h_4 alpha_h omega_h grid_v_1"><h2>[[+cell_2_headline]]</h2></div>
    <div class="grid_h_4 alpha_h omega_h grid_v_2 omega_v">[[+cell_2_content]]</div>
</div>
    <div class="box grid_h_4 grid_v_4">
    <div class="grid_h_4 alpha_h omega_h grid_v_1 alpha_v"><img src="[[+cell_3_image:phpthumbof=`w=300&h=250&zc=1`]]"/></div>
    <div class="grid_h_4 alpha_h omega_h grid_v_1"><h2>[[+cell_3_headline]]</h2></div>
    <div class="grid_h_4 alpha_h omega_h grid_v_2 omega_v">[[+cell_3_content]]</div>
</div>
<div class="clear"></div>

```

##  Create Pages with varying layout-boxes 

 Now we are ready to create resources with varying layout-boxes.

 Create new Resource. Choose the MultiColumn - Template. Go to the tab 'Template Variables'.

 In your MultiColumns-TV, click 'Add Item' and choose one of the layouts. Fill the fields on the tabs 'First','Second','Third'.

 For Preview click the 'Preview' - Button.

 If you want to change the position of boxes, you can drag/drop the items directly in the grid. 

 Don't forget to save your Resource, when you are ready with adding/editing layout-boxes with MIGX