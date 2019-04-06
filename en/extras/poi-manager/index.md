---
title: "POI Manager"
_old_id: "1705"
_old_uri: "revo/poi-manager"
---

 This extra allows you to create and manager POIs. You will be able to create POI containers (categories) and include each POI in one or more container. Also you will be able to create POI types, that will allows you to add additional attributes to POIs.

 This extra also contains RESTful server. To communicate with it just send request to **/assets/components/marvin/api.php**.Documentation for RESTful server is available on [docs.poimanager.apiary.io](http://docs.poimanager.apiary.io).

 **Extra doesn't include presentation layer!**

 After installation via package management, follow these steps:

1. Create new POI type
     + Under components menu, open POI types and create new type
     + Add at least one field to the POI type
2. Create new POI container
      + POI containers are specific resource types, to create a new container right click in Resource tree and choose **Create a POI Container**
3. Add new POI to the created container
      + Fill the POI info
      + To insert marker into the map, right click the map on desired location or insert lat and lng directly into the fields above the map