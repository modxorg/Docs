---
title: "CamperManagement"
_old_id: "613"
_old_uri: "revo/campermanagement"
---

**CamperManagement is no longer supported. Do not use unless you're a developer that's willing to take over development of the project.**

Download: <http://modx.com/extras/package/campermanagement> (or install via Package Manager) 
 Source & Bugs: <https://github.com/Mark-H/CamperManagement>

![](/download/attachments/35095340/camper-grid.png?version=1&modificationDate=1307386327000)

CamperManagement is a vehicle management addon for MODX Revolution, developed and tested in 2.1.0-rc3 and up by Mark Hamstra. It features a back-end management module, as well as versatile snippets for a custom, integrated user experience in the front end of the website as is to be expected within MODX. 
 Documentation available:

- [CamperManagement.Customizing the Component](extras/campermanagement/campermanagement.customizing-the-component "CamperManagement.Customizing the Component")
- [CamperManagement.Developing the front-end](extras/campermanagement/campermanagement.developing-the-front-end "CamperManagement.Developing the front-end")
  - [CamperManagement.cmCamperDetails Snippet](extras/campermanagement/campermanagement.developing-the-front-end/campermanagement.cmcamperdetails-snippet "CamperManagement.cmCamperDetails Snippet")
  - [CamperManagement.cmCampers Snippet](extras/campermanagement/campermanagement.developing-the-front-end/campermanagement.cmcampers-snippet "CamperManagement.cmCampers Snippet")
  - [CamperManagement.Placeholders you can use](extras/campermanagement/campermanagement.developing-the-front-end/campermanagement.placeholders-you-can-use "CamperManagement.Placeholders you can use")
- [CamperManagement.Managing your vehicle](extras/campermanagement/campermanagement.managing-your-vehicle "CamperManagement.Managing your vehicle")
- [CamperManagement.Module home](extras/campermanagement/campermanagement.module-home "CamperManagement.Module home")

 
 The grid is fully customizable using snippets chunks and chunks, all the way down to the way images are outputted. There are so many customization options, that if you'd want to, you could create a carousel from the thumbnails in the grid view. Or just output horizontal rows with all details. Whatever you dig!

![](/download/attachments/35095340/camper-details.PNG?version=1&modificationDate=1307386332000)

As the grid, the details page is just what you need from it. Just set up one resource with a specific template and call the cmCamperDetails snippet on it to get placeholders filled with data. Oh, and if the camper id doesn't exist you can choose to either show the empty fields or redirect to a specific resource (what about your inventory resource?).