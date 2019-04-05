---
title: "Shopkeeper"
_old_id: "709"
_old_uri: "revo/shopkeeper"
---

Shopping cart and order management for MODX Revolution.

- [Installation](#Shopkeeper-Installation)
- [Settings](#Shopkeeper-Settings)
- [Additional options products](#Shopkeeper-Additionaloptionsproducts)
- [Sending letters to the buyer when you change the order status](#Shopkeeper-Sendingletterstothebuyerwhenyouchangetheorderstatus)
- [Events for plugins](#Shopkeeper-Eventsforplugins)
- [JS-callback functions](#Shopkeeper-JScallbackfunctions)



## Installation

1. Download and install 
  - You can download the extra in manager. To do this, go to "System" -> "Package Management". Press the button "Download extras". Then go "Extras" -> "E-commerce" and the line "Shopkeeper" click "Download", then "Finish" button.
  - If you downloaded the file from modx.com (<http://modx.com/extras/package/shopkeeper2>), load file "shopkeeper-2.0-\*.transport.zip" in folder /core/packages/ of your site. In manager go to "System" -> "Package Management" -> "Search Locally for Packages" -> "Download extras" -> "Yes".
2. The table package will package "shopkeeper". Click "Install" button.
3. Complete the installation.

## Settings

1. Open "Elements" -> "Snippets" -> "Shopkeeper" -> "Properties".
2. Press button "Add Property Set", mark checkbox "Create New Property Set" and fill fields.
3. In the list on the left to select a set of established and if necessary, change the settings.
4. In the template in a place where you want to display a shopping cart, call Shopkeeper snippet with name of Property Set. 
  Example:

``` php 
[[!Shopkeeper@catalog?propertySetName=`catalog`]]
```

propertySetName - the name of the Property Set. It is also the name you specify after the "@" symbol.

Default properties of snippet edit is not recommended because these may change at upgrade.

In the admin panel in the configuration of the component (the "System" -> "System Settings" -> "shopkeeper") set "Default snippet Property Set". This set of parameters to be used when sending the order.

Products are created as resources. For convenience, you can use the component **Group Edit** (<http://modx.com/extras/package/groupedit>).

## Additional options products

Goods can be assigned to the parameters that the buyer can choose to add items to your shopping cart. 
The parameters are displayed in a dropdown list - shk\_select, radio buttons - shk\_radio or checkboxes - shk\_checkbox. 
Choose Output Type can be on TV settings on the tab "Output Options". 
 
The values ??of the parameters (on the edit page of the resource (product)) are introduced on the following principle:

**Parameter name 1==Price 1||Parameter name 2==Price 2||...**
 
You can enter a parameter value with the sign of multiplication: **Weight==\*0.5||Weight==\*1**
In this case, the product price will be multiplied by the price parameter. 
 
In the snippet getResources chunk parameters are displayed as placeholders:

``` php 
[[+tv.param1]]
```

On the product page to change the ID parameter. You can do this by using a filter "replace":

``` php 
[[*param1:replace=`[[+id]]==[[*id]]`]]
```

## Sending letters to the buyer when you change the order status

If you want when to change the order status the buyer sends an e-mail, in the module configuration (basic settings) need to create a parameter with a key "shk.mailstatus\_1", where 1 - number status of zero. 
The value parameter to specify the name of the chunk letter template, example "@FILE mailChangeStatus.tpl". Namespace - "shopkeeper".

## Events for plugins

**OnSHKaddProduct** - Adding Item to cart. $purchaseArray 
**OnSHKgetProductPrice** - Call for Price product when you add to cart. $purchaseArray 
**OnSHKcalcTotalPrice** - Calculating the total price of the products in your cart. $price\_total, $purchases 
**OnSHKbeforeCartLoad** - Called before the formation of HTML-code cart. 
**OnSHKcartLoad** - The output cart. $items\_total, $price\_total 
**OnSHKChangeStatus** - Change the order status. Available: $order\_id, $status. 
**OnSHKsaveOrder** - Sending an order. $order\_id

## JS-callback functions

**SHKfillCartCallback(form)** - given command to add product to cart; 
**SHKemptyCartCallback()** - given the command to empty the cart; 
**SHKloadCartCallback()** - Cart is loaded / updated; 
**SHKtoCartCallback(form)** - given the command to send product to cart. 
 
Simply create a function with these names and they will be called when a certain action.