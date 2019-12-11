---
title: "Backend-Usage"
_old_id: "922"
_old_uri: "revo/migx/migx.backend-usage"
---

## Backend-Usage

## How the MIGX Custom Template Variable (TV) Works

The MIGX TV allows you to store complex data items as one TV. These data items are stored as JSON. This documentation page assumes that you have a working knowledge of JSON.

Each complex data item can have multiple fields associated with it. These fields can be (almost) any standard or custom MODX TV input type. These data items are defined in the "Form Tabs" field. Items can be sorted by tabs as defined by the JSON.

## Creating your first MIGX TV

Sample MIGX configurations are stored under /core/components/migx/examples/. We will be referring to "tabs.txt" for this documentation page. This documentation page assumes that you have the add-on TinyMCE installed.

tabs.txt shows a sample implementation of a simple image gallery. The image gallery will consist of one complex data item that uses one richtext field (an image description), one image field (the image itself), and a short string (a caption). This short string will not be stored in a separate TV.

"Helper" TVs still work but are no longer needed; use inputTVtype: instead of inputTV:

### Step 1: Create the MIGX aggregate TV

- fill in a name, caption, description, and category as you would for any other TV
- give the template access for which you would like to add data items. In this example, perhaps "Gallery"
- select MIGX as the input type

### Step 2: Configure the MIGX input type

For your first MIGX TV, we are only concerned with two textarea fields: "Form Tabs" and "Grid Columns"

#### Step 2.1 Form Tabs

The Form Tabs define the structure that end users will use to input their data.

Content of tabs.txt:

``` json
[{
    "caption": "Info",
    "fields": [{
        "field": "title",
        "caption": "Title"
      },
      {
        "field": "description",
        "caption": "Description",
        "inputTVtype": "richtext"
      }
    ]
  },
  {
    "caption": "Image",
    "fields": [{
      "field": "image",
      "caption": "Image",
      "inputTVtype": "image"
    }]
  }
]
```

That's a lot of JSON -- let's break it down. The first key you see is entitled "Caption". This refers to the name of the first tab. The tab will be labeled "Info".

The second key you see is entitled "fields". This refers to each of the fields that will be accessible from that tab. The fields are stored as a nested JSON string. Let's break these down.

The first key within the nested JSON string is entitled "field". This refers to the placeholder that MIGX will generate that we will access later with getImageList. For the first item, we have labeled it "title". This refers to the short string mentioned above. The second key is labeled "caption". This refers to the label that the end user will see when they're filling in a data item. Let's label it "Title" so that our users know they're filling in the title of the image.

The second key within the nested JSON string is entitled "description". We have three keys this time: the first, "field", refers to the placeholder that we will access later. The second, "caption", is the label the user will see. The third, "inputTVtype", refers to the type of field that we want to use.

We're done with the first nested JSON string. We can now see that there is a second tab -- this one has a label of "Image" and specified an inputTVtype of "image". To specify a Media Source for the image, add another key "sourceFrom":"migx" and assign the MIGx TV to a media source using the TV's Media Sources tab.

We are now halfway done with our first MIGX TV. We have now created the form for each of the individual data items. The keys for each field are listed below in a table for your viewing convenience. Let's now define the summary view of the data items using Grid Columns in Step 3.2

| Key         | Description                                                                                                                                                                                                                                                                                                                        |
| ----------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| field       | this is the name for your placeholder to use with getImageList and a template                                                                                                                                                                                                                                                      |
| caption     | this will be the caption in your form for the end user to see                                                                                                                                                                                                                                                                      |
| description | this is the description in your form, if empty MIGX will use the description of the inputTV, if any                                                                                                                                                                                                                                |
| inputTV     | Pick either this or "inputTVtype". If you use this, specify the name of the TV that you would like to use. This is useful if your data type requires any custom functionality (ie, a default value, output options, etc). You can use the same input TV for different fields (ie, if you have an object that has multiple images). |
| inputTVtype | Pick either this or "inputTV". If you use this, specify the name of the TV type that you would like to use. This is useful if your data type does not require any custom functionality.                                                                                                                                            |

#### Step 2.2 Grid Columns

In the grid columns, we're specifying the summary view that users will see to view their information.

Content of columns.txt:

``` json
[
{
  "header": "Title",
  "width": "160",
  "sortable": "true",
  "dataIndex": "title"
}, {
  "header": "Image",
  "width": "50",
  "sortable": "false",
  "dataIndex": "image",
  "renderer": "this.renderImage"
}]
```

Here is some more JSON for us to tackle! This JSON shows the caption of the image as well as a preview of it. Let's break it down.

The first key, "header", refers to the header label that will be used to categorize the fourth key, "dataIndex". The dataIndex refers to the placeholder that we've specified above in the form tabs. The first entry here uses the dataIndex we specified above of "title". We also have two more keys: width and sortable. The width defines the relative width of the column, and sortable defines whether the grid is sortable by that column.

The second entry has a fifth key: renderer. This key allows us to render a view of the image here.

We're now done specifying our first MIGX TV. Feels great, right? Make sure you click save.

Don't forget to save your Resource after adding or editing MIGX items!

We're now half done our MIGX experience. Next step: [Data Entry](extras/migx/migx.data-entry "MIGX.Data-Entry")

The keys for this grid are listed here:

| Key       | Description                                                                                                                                                                                    |
| --------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| header    | the caption of the column                                                                                                                                                                      |
| sortable  | if the columns is sortable by clicking the header                                                                                                                                              |
| dataIndex | the field, you want to render into this column                                                                                                                                                 |
| renderer  | you can use a renderer for each column. For example the included function "this.renderImage". This will render an image-preview in the grid-cell, if you are using an image-TV for this field. |

## Advanced MIGX Configuration

### Multiple Forms

Content of switchFormTabs.txt

``` json
[
  [{
    "formname": "image_description",
    "formtabs": [{
        "caption": "Info",
        "fields": [{
            "field": "title",
            "caption": "Title"
          },
          {
            "field": "tpl",
            "caption": "Tpl",
            "inputTV": "tplDropdown"
          }, {
            "field": "description",
            "caption": "Description",
            "inputTV": "richtext"
          }
        ]
      },
      {
        "caption": "Image",
        "fields": [{
          "field": "image",
          "caption": "Image",
          "inputTV": "image"
        }]
      }
    ]
  }, {
    "formname": "textonly",
    "formtabs": [{
      "caption": "Info",
      "fields": [{
          "field": "title",
          "caption": "Title"
        },
        {
          "field": "tpl",
          "caption": "Tpl",
          "inputTV": "tplDropdown"
        }, {
          "field": "description",
          "caption": "Description",
          "inputTV": "richtext"
        }
      ]
    }]
  }]
]
```

here we have an additional outer array with two keys.

| key      | description                                                                                                       |
| -------- | ----------------------------------------------------------------------------------------------------------------- |
| formname | give each form an unique name. This is the value, which you will see in the generated dropdown to switch the form |
| formtabs | this are the formtabs for this form                                                                               |

when using multiple forms this will produce an additional field with name 'MIGX\_formname'.
You can use the value of this field to switch tpls in the frontend by using &tpl=`@FIELD:MIGX\_formname` and create chunks with the same names as your formnames or you can add an additional field (listbox-TV with name tpl for example) to choose the output-tpl for this item.

### Preview Feature

MIGX has a preview featured that allows you to see rendered output of items in an iframe window. In order to use this preview feature, you need to create a preview resource. This resource should have content like:

``` php
[[!getImageList? &tpl=`@FIELD:MIGX_formname`&tvname=`multiitemsgridTv`]]
[[!getImageList? &tvname=`multiitemsgridTv2`]]
```

If you have multiple calls on the preview resource you will also need unique values for each TV in 'Preview JsonVarKey' - default is 'migx\_outputvalue'

Once you have filled out the field 'Preview Url' you will have an additional button 'Preview' on your MIGX-TV, which shows the preview window with content of your preview resource.

### Inline Editor

To edit fields directly within the MIGX grid, simply add "editor": "this.textEditor" or "editor": "this.listboxEditor" to the Grid Columns JSON of the field you wish to make editable:

``` json
{"header": "Title", "width": "160", "sortable": "true", "dataIndex": "title", "editor": "this.textEditor"}
```
