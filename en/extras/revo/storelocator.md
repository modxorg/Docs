---
title: "StoreLocator"
_old_id: "722"
_old_uri: "revo/storelocator"
---

<div>- [What is StoreLocator?](#StoreLocator-WhatisStoreLocator%3F)
  - [Requirements](#StoreLocator-Requirements)
  - [History](#StoreLocator-History)
  - [Download & Installation](#StoreLocator-Download%26Installation)
- [Using StoreLocator in the manager](#StoreLocator-UsingStoreLocatorinthemanager)
  - [Adding stores](#StoreLocator-Addingstores)
  - [Sorting stores](#StoreLocator-Sortingstores)
- [Using StoreLocator in the front-end (user side)](#StoreLocator-UsingStoreLocatorinthefrontend%28userside%29)
  - [Placing the snippet](#StoreLocator-Placingthesnippet)
  - [Examples](#StoreLocator-Examples)
  - [YouTube example](#StoreLocator-YouTubeexample)
- [StoreLocator premium](#StoreLocator-StoreLocatorpremium)
- [External sources](#StoreLocator-Externalsources)

</div>What is StoreLocator?
=====================

StoreLocator is a snippet that integrates Google Maps into MODX® to allow your users to find stores (or whatever location you want them to find) that are close to an address (their home for instance). StoreLocator is easily integrated in your website and is fully customizable.

StoreLocator is created and maintained by [SCHERP Ontwikkeling](http://www.scherpontwikkeling.nl).

Requirements
------------

StoreLocator required MODX® Revolution 2.2.0 or later.

History
-------

<table><tbody><tr><th>Version</th><th>Release date</th><th>Author</th><th>Changes</th></tr><tr><td>1.0.0-PL1</td><td>March 6th, 2012</td><td>[Patrick Nijkamp](http://www.scherpontwikkeling.nl/over-ons/patrick-nijkamp.html) ([SCHERP Ontwikkeling](http://www.scherpontwikkeling.nl))</td><td>Initial release.</td></tr><tr><td>1.0.1-PL1</td><td>March 10th, 2012</td><td>[Patrick Nijkamp](http://www.scherpontwikkeling.nl/over-ons/patrick-nijkamp.html) ([SCHERP Ontwikkeling](http://www.scherpontwikkeling.nl))</td><td>Fixed noResultsTpl</td></tr><tr><td>1.1.0-PL1</td><td>March 22th, 2012</td><td>[Patrick Nijkamp](http://www.scherpontwikkeling.nl/over-ons/patrick-nijkamp.html) ([SCHERP Ontwikkeling](http://www.scherpontwikkeling.nl))</td><td>New placeholders</td></tr></tbody></table>Download & Installation
-----------------------

Install the package through the MODX® package manager.

Using StoreLocator in the manager
=================================

Adding stores
-------------

To add a store, simply log in to the manager and click "Components" -> "Store Locator". Once in the StoreLocator you will see the page "Manage stores". Now click the button "Add store location" and you will see the following window:

![](/download/attachments/37683757/store_location.png?version=1&modificationDate=1331114145000)

From there you can add a store by filling in the description, longitude and latitude coordinates and select the resource you want to link this store to. The resource will be assigned to the storeRowTpl so you can use all it's data to show the needed placeholders in the front-end. If you don't want to enter the coordinates by hand simply type the address next to the "Address:" box and click search. The script will then post your query to Google Maps and get the coordinates for you.

Sorting stores
--------------

To sort stores log in to the manager and go to "Components" -> "Store Locator". You will see a grid containing all of your stores, you can just pick up a single row and drop it where you want it to be. ![](/download/attachments/37683757/sort.png?version=1&modificationDate=1331114450000)

Using StoreLocator in the front-end (user side)
===============================================

Placing the snippet
-------------------

Place the main \[\[[StoreLocator](/extras/revo/storelocator "StoreLocator")\]\] snippet call on your webpage. If you have placed the snippet it assigns the following placeholders to your page:

<table><tbody><tr><th>Placeholder name</th><th>Content</th></tr><tr><td>\[\[+StoreLocator.map\]\]</td><td>The Google Map view</td></tr><tr><td>\[\[+StoreLocator.form\]\]</td><td>The StoreLocator search form</td></tr><tr><td>?\[\[+StoreLocator.storeList\]\]</td><td>The list of stores and search results</td></tr></tbody></table>You can configure the snippet "StoreLocator" with the following parameters:

<table><tbody><tr><th>Parameter</th><th>Description</th><th>Values</th><th>Default Value</th><th>Required</th></tr><tr><td>apiKey</td><td>Your Google Maps API key   
</td><td>A Google API key</td><td>(empty)</td><td>no</td></tr><tr><td>zoom</td><td>Standard zoom level when the map initializes   
</td><td>A number between 1 - 15</td><td>8</td><td>no   
</td></tr><tr><td>storeZoom</td><td>Zoom level when a user clicks on a store in the list   
</td><td>A number between 1 - 15   
</td><td>13</td><td>no   
</td></tr><tr><td>searchZoom</td><td>Zoom level when user has searched and map is centered on their address   
</td><td>A number between 1 - 15   
</td><td>13</td><td>no   
</td></tr><tr><td>width</td><td>Width of the map   
</td><td>A value in pixels</td><td>300</td><td>no   
</td></tr><tr><td>height</td><td>Height of the map   
</td><td>A value in pixels   
</td><td>400</td><td>no   
</td></tr><tr><td>mapType</td><td>The type of the Google Map   
</td><td>HYBRID | ROADMAP | SATELLITE | TERRAIN</td><td>ROADMAP</td><td>no   
</td></tr><tr><td>defaultRadius</td><td>The default radius that will be selected in the search form   
</td><td>5, 10, 25, 50, 100</td><td>5</td><td>no   
</td></tr><tr><td>centerLongitude</td><td>Longitude on which the map will center by default   
</td><td>Longitude coordinates</td><td>6.61480</td><td>no   
</td></tr><tr><td>centerLatitude</td><td>Latitude on which the map will center by default   
</td><td>Latitude coordinates</td><td>52.40441</td><td>no   
</td></tr><tr><td>markerImage</td><td>A URL to an image to be used instead of the default Google Map marker   
</td><td>A URL</td><td>0</td><td>no   
</td></tr><tr><td>sortDir</td><td>Sort direction of the store list   
</td><td>ASC | DESC</td><td>ASC</td><td>no   
</td></tr><tr><td>limit</td><td>Maximum amount of stores shown by default and in search results   
</td><td>0 means all records, any other number limits the resultlist</td><td>0</td><td>no   
</td></tr><tr><td>formTpl</td><td>The chunk for the form   
</td><td>A chunk name</td><td>sl.form</td><td>no   
</td></tr><tr><td>storeRowTpl</td><td>The chunk for a store row as shown in the list and search results   
</td><td>A chunk name   
</td><td>sl.storerow</td><td>no   
</td></tr><tr><td>storeInfoWindowTpl</td><td>The chunk for the info window popup when clicked on a store marker   
</td><td>A chunk name   
</td><td>sl.infowindow</td><td>no   
</td></tr><tr><td>noResultsTpl</td><td>The chunk that shows when no results are found   
</td><td>A chunk name   
</td><td>sl.noresultstpl</td><td>no   
</td></tr><tr><td>scriptWrapperTpl</td><td>The script wrapper (only change when you know what you're doing)   
</td><td>A chunk name   
</td><td>sl.scriptwrapper</td><td>no   
</td></tr><tr><td>scriptStoreMarker</td><td>The script store marker (only change when you know what you're doing)   
</td><td>A chunk name   
</td><td>sl.scriptstoremarker</td><td>no   
</td></tr></tbody></table>Examples
--------

Below you see the main snippet call and the placement of the placeholders. Every parameter is optional, we have just used some possibilities of customization.

```
<pre class="brush: php">
[[!StoreLocator?
  &searchZoom=`10`
  &zoom=`7`
  &markerImage=`/assets/mcdonalds.png`
  &width=`640`
  &height=`480`
  &centerLongitude=`5.509644`
  &centerLatitude=`52.469397`
]]

<table>
   <tr>
      <td style="width: 640px;">
         [[+StoreLocator.map]]        <!-- This shows the google map -->
      </td>
      <td style="vertical-align: top;">
         [[+StoreLocator.form]]       <!-- This shows the search form -->
         <hr />
         [[+StoreLocator.matchedStores]] / [[+StoreLocator.totalStores]] <!-- This shows number of found stores / total stores -->
         [[+StoreLocator.storeList]]  <!-- This shows the list of stores and search results -->
      </td>
   </tr>
</table>

```YouTube example
---------------

Here's an example of the usage and placement of the snippet call: [http://www.youtube.com/watch?v=\_\_5Oi4Tqz50](http://www.youtube.com/watch?v=__5Oi4Tqz50)

StoreLocator premium
====================

You have the possibility to buy StoreLocator premium through the about screen in the component. This will add the following functionality:

- Custom caching (storelist and search results)
- Custom marker images for each individual store
- Possibility to get directions from the entered address to a store from the StoreLocator screen
- A snippet that can plot directions to a specific store from an entered address.

Check out the video demo:   
Custom marker images: <http://www.youtube.com/watch?v=keUjHDmOJnw>  
Directions / route planner: <http://www.youtube.com/watch?v=FOAWcdoFysk>

External sources
================

Developers website: <http://www.scherpontwikkeling.nl>

GitHub repository: <http://www.github.com/b03tz/StoreLocator/>

Report bugs and request features: <http://www.github.com/b03tz/StoreLocator/issues>

Help requests: <http://forums.modx.com/thread/74885/support-topic-for-storelocator-1-0-pl-1>