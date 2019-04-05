---
title: "Configurator-Version"
_old_id: "930"
_old_uri: "revo/migx/migx.tutorials/migx.varying-layout-boxes/migx.varying-layout-boxes.configurator-version"
---

- [Create varying layout-boxes with MIGX - Configurator Version](#MIGX.Varyinglayout-boxes.Configurator-Version-CreatevaryinglayoutboxeswithMIGXConfiguratorVersion)
  - [The MIGX-Tv](#MIGX.Varyinglayout-boxes.Configurator-Version-TheMIGXTv)
      - [General Information](#MIGX.Varyinglayout-boxes.Configurator-Version-GeneralInformation)
            - [Name](#MIGX.Varyinglayout-boxes.Configurator-Version-Name)
      - [Input Options](#MIGX.Varyinglayout-boxes.Configurator-Version-InputOptions)
            - [Input-type](#MIGX.Varyinglayout-boxes.Configurator-Version-Inputtype)
            - [Configurations](#MIGX.Varyinglayout-boxes.Configurator-Version-Configurations)
  - [The MIGX-Configurations](#MIGX.Varyinglayout-boxes.Configurator-Version-TheMIGXConfigurations)
      - [Create three MIGX - Configurations in the MIGX - Configurator - CMP](#MIGX.Varyinglayout-boxes.Configurator-Version-CreatethreeMIGXConfigurationsintheMIGXConfiguratorCMP)
            - [layout\_1](#MIGX.Varyinglayout-boxes.Configurator-Version-layout1)
            - [layout\_2](#MIGX.Varyinglayout-boxes.Configurator-Version-layout2)
            - [layout\_3](#MIGX.Varyinglayout-boxes.Configurator-Version-layout3)
      - [Add Formtabs and Columns](#MIGX.Varyinglayout-boxes.Configurator-Version-AddFormtabsandColumns)
            - [layout\_1](#MIGX.Varyinglayout-boxes.Configurator-Version-layout1)
                    - [Formtabs](#MIGX.Varyinglayout-boxes.Configurator-Version-Formtabs)
                    - [Columns](#MIGX.Varyinglayout-boxes.Configurator-Version-Columns)
            - [layout\_2](#MIGX.Varyinglayout-boxes.Configurator-Version-layout2)
                    - [Formtabs](#MIGX.Varyinglayout-boxes.Configurator-Version-Formtabs)
            - [layout\_3](#MIGX.Varyinglayout-boxes.Configurator-Version-layout3)
                    - [Formtabs](#MIGX.Varyinglayout-boxes.Configurator-Version-Formtabs)
 


##  Create varying layout-boxes with MIGX - Configurator Version 

 Its possible to use the MIGX - Configurator - CMP to create switchable formtabs. This Tutorial will show you, how. 
 It descibes just the differences to the used Version.

###  The MIGX-Tv 

 Create a new TV.

####  General Information 

#####  Name 

 MultiColumn

####  Input Options 

#####  Input-type 

 migx

#####  Configurations 

 layout\_1

###  The MIGX-Configurations 

####  Create three MIGX - Configurations in the MIGX - Configurator - CMP 

#####  layout\_1 

 Name: layout\_1 
 unique MIGX ID: layout\_1

#####  layout\_2 

 Name: layout\_2 
 unique MIGX ID: layout\_2

#####  layout\_3 

 Name: layout\_3 
 unique MIGX ID: layout\_3

####  Add Formtabs and Columns 

 Open each Configuration with 'edit raw'

#####  layout\_1 

######  Formtabs 

 ``` javascript 

[{"caption":"Row Format","fields":[{"field":"fake","inputTVtype":"hidden"},{"field":"cell_2_image","caption":"Image","inputTVtype":"hidden"},{"field":"cell_2_headline","caption":"Headline","inputTVtype":"hidden"},{"field":"cell_2_content","caption":"Content","inputTVtype":"hidden"},{"field":"cell_3_image","caption":"Image","inputTVtype":"hidden"},{"field":"cell_3_headline","caption":"Headline","inputTVtype":"hidden"},{"field":"cell_3_content","caption":"Content","inputTVtype":"hidden"}]},{"caption":"First","fields":[{"field":"cell_1_image","caption":"Image","inputTVtype":"image"},{"field":"cell_1_headline","caption":"Headline"},{"field":"cell_1_content","caption":"Content","inputTVtype":"richtext"}]}]

```

 under Multiple Formtabs select:

 layout\_1,layout\_2,layout\_3

######  Columns 

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

#####  layout\_2 

######  Formtabs 

 ``` javascript 

[{"caption":"Row Format","fields":[{"field":"fake","inputTVtype":"hidden"},{"field":"cell_3_image","caption":"Image","inputTVtype":"hidden"},{"field":"cell_3_headline","caption":"Headline","inputTVtype":"hidden"},{"field":"cell_3_content","caption":"Content","inputTVtype":"hidden"}]},{"caption":"First","fields":[{"field":"cell_1_image","caption":"Image","inputTVtype":"image"},{"field":"cell_1_headline","caption":"Headline"},{"field":"cell_1_content","caption":"Content","inputTVtype":"richtext"}]},{"caption":"Second","fields":[{"field":"cell_2_image","caption":"Image","inputTVtype":"image"},{"field":"cell_2_headline","caption":"Headline"},{"field":"cell_2_content","caption":"Content","inputTVtype":"richtext"}]}]

```

#####  layout\_3 

######  Formtabs 

 ``` javascript 

[{"caption":"Row Format","fields":[{"field":"fake","inputTVtype":"hidden"}]},{"caption":"First","fields":[{"field":"cell_1_image","caption":"Image","inputTVtype":"image"},{"field":"cell_1_headline","caption":"Headline"},{"field":"cell_1_content","caption":"Content","inputTVtype":"richtext"}]},{"caption":"Second","fields":[{"field":"cell_2_image","caption":"Image","inputTVtype":"image"},{"field":"cell_2_headline","caption":"Headline"},{"field":"cell_2_content","caption":"Content","inputTVtype":"richtext"}]},{"caption":"Third","fields":[{"field":"cell_3_image","caption":"Image","inputTVtype":"image"},{"field":"cell_3_headline","caption":"Headline"},{"field":"cell_3_content","caption":"Content","inputTVtype":"richtext"}]}]

```

 

 Make sure, you have all the same fieldnames in all formtab-setups. Unused fields in hidden-fields. Otherwise you will loose values, when you switch between formtabs.