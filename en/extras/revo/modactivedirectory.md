---
title: "modActiveDirectory"
_old_id: "678"
_old_uri: "revo/modactivedirectory"
---

<div>- [What is modActiveDirectory?](#modActiveDirectory-WhatismodActiveDirectory%3F)
  - [Requirements](#modActiveDirectory-Requirements)
  - [Installation](#modActiveDirectory-Installation)
  - [History](#modActiveDirectory-History)
  - [Development and Bug Reporting](#modActiveDirectory-DevelopmentandBugReporting)
- [Usage](#modActiveDirectory-Usage)
  - [Available Settings](#modActiveDirectory-AvailableSettings)
  - [ActiveDirectory Group Synchronization](#modActiveDirectory-ActiveDirectoryGroupSynchronization)
- [See Also](#modActiveDirectory-SeeAlso)

</div>What is modActiveDirectory?
---------------------------

 modActiveDirectory is a [Microsoft ActiveDirectory](http://en.wikipedia.org/wiki/Active_Directory) integration for MODx Revolution. It allows you to use ActiveDirectory to authenticate against to login to MODX.

### Requirements

- MODX Revolution 2.0.0-pl or later
- PHP5 or later
- LDAP extension for PHP

### Installation

 It can be downloaded from within the MODx Revolution manager via <span class="error">\[Package Management\]</span>, or from the MODX Extras Repository, here: <http://modxcms.com/extras/package/711>

<div class="note"> You will need to ensure the manager/controllers/security/login.php file is writable by PHP, if it is not already, before installing. modActiveDirectory patches a bug in that file that is in Revo 2.0.0-pl. </div> From there, you'll need to setup two System Settings before beginning:

- activedirectory.account\_suffix : The account suffix for your domain. Usually in @forest.domain format.
- activedirectory.domain\_controllers : A comma-separated list of domain controllers. Specifiy multiple controllers if you would like the class to balance the LDAP queries.

### History

 modActiveDirectory was written by [Shaun McCormick](/display/~splittingred) and first released on August 6th, 2010.

### Development and Bug Reporting

 modActiveDirectory is stored and developed in GitHub, and can be found here: <http://github.com/splittingred/modActiveDirectory>

 Bugs can be filed here: <http://github.com/splittingred/modActiveDirectory/issues>

Usage
-----

 modActiveDirectory will automatically work after you have installed it and setup the domain controllers and account suffix. There are more settings you can use, as well, in the 'activedirectory' namespace in System Settings.

### Available Settings

 <table><tbody><tr><th> Name </th> <th> Description </th> <th> Default </th> </tr><tr><td> activedirectory.account\_suffix </td> <td> The account suffix for your domain. Usually in @forest.domain format. </td> <td> @forest.local </td> </tr><tr><td> activedirectory.autoadd\_adgroups </td> <td> If true, will grab all Active Directory groups the User belongs to, and search for any matching UserGroups in MODx. If any are found, the MODx User will automatically be added to the matching MODX UserGroups. </td> <td> 1 </td> </tr><tr><td> activedirectory.autoadd\_usergroups </td> <td> A comma-separated list of MODX UserGroup names which the User will always be added to. </td> <td> </td> </tr><tr><td> activedirectory.base\_dn </td> <td> The base dn for your domain. This can usually be left blank, as MODX will automatically calculate it for you. </td> <td> </td> </tr><tr><td> activedirectory.domain\_controllers </td> <td> Comma-separated list of domain controllers. Specifiy multiple controllers if you would like the class to balance the LDAP queries. </td> <td> 127.0.0.1 </td> </tr><tr><td> activedirectory.real\_primarygroup </td> <td> This tweak will resolve the real primary group. Setting to false will fudge "Domain Users" and is much faster. Keep in mind though that if someones primary group is NOT "Domain Users", this is obviously going to mess up the results. Related to <http://support.microsoft.com/?kbid=321360>. </td> <td> 1 </td> </tr><tr><td> activedirectory.recursive\_groups </td> <td> When querying group memberships, do so recursively. Recommended to leave on. </td> <td> 1 </td> </tr><tr><td> activedirectory.use\_ssl </td> <td> Use SSL (LDAPS). Your AD server will need to be setup to support this. Works only if use\_tls is off. </td> <td> 0 </td> </tr><tr><td> activedirectory.use\_tls </td> <td> Use TLS. Your AD server will need to be setup to support this. Works only if use\_ssl is off. </td> <td> 0 </td></tr></tbody></table>### ActiveDirectory Group Synchronization

 modActiveDirectory will automatically grab all the ActiveDirectory groups a user belongs to, and then search for any MODX UserGroups with matching names. If found, the user will be added to those groups.

 If you'd like to disable this, set the 'activedirectory.autoadd\_adgroups' System Setting to 0.

 modActiveDirectory also allows you to specify a comma-separated list of MODX UserGroup names to automatically add the User to. This can be set in the 'activedirectory.autoadd\_usergroups' setting.

 Make sure you give the User Groups the User will auto-join access to the manager (through Access Controls), should you want your ActiveDirectory users to have manager access.