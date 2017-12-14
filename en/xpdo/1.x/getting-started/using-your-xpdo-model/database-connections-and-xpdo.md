---
title: "Database Connections and xPDO"
_old_id: "1507"
_old_uri: "1.x/getting-started/using-your-xpdo-model/database-connections-and-xpdo"
---

Database connectivity in xPDO is done in the constructor. The xPDO object can only hold one database connection per instance, but you are free to instantiate as many xPDO instances as you need. The syntax of the constructor is such:

> function xPDO($dsn, $username= '', $password= '', $options= array(), $driverOptions= null) {

More information on these parameters can be found on [The xPDO Constructor](/xpdo/1.x/getting-started/fundamentals/xpdo,-the-class/the-xpdo-constructor "The xPDO Constructor") page.