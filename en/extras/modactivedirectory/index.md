---
title: "modActiveDirectory"
_old_id: "678"
_old_uri: "revo/modactivedirectory"
---

## What is modActiveDirectory?

modActiveDirectory is a [Microsoft ActiveDirectory](http://en.wikipedia.org/wiki/Active_Directory) integration for MODX Revolution. It allows you to use ActiveDirectory to authenticate against to login to MODX.

## Requirements

- MODX Revolution 2.0.0-pl or later
- PHP5 or later
- LDAP extension for PHP

## Installation

It can be downloaded from within the MODX Revolution manager via [Package Management](developing-in-modx/advanced-development/package-management "Package Management"), or from the MODX Extras Repository, here: <http://modxcms.com/extras/package/711>

You will need to ensure the manager/controllers/security/login.php file is writable by PHP, if it is not already, before installing. modActiveDirectory patches a bug in that file that is in Revo 2.0.0-pl.

From there, you'll need to setup two System Settings before beginning:

- activedirectory.account\_suffix : The account suffix for your domain. Usually in @forest.domain format.
- activedirectory.domain\_controllers : A comma-separated list of domain controllers. Specifiy multiple controllers if you would like the class to balance the LDAP queries.

### History

modActiveDirectory was written by [Shaun McCormick](https://github.com/splittingred) and first released on August 6th, 2010.

### Development and Bug Reporting

modActiveDirectory is stored and developed in GitHub, and can be found here: <http://github.com/splittingred/modActiveDirectory>

Bugs can be filed here: <http://github.com/splittingred/modActiveDirectory/issues>

## Usage

modActiveDirectory will automatically work after you have installed it and setup the domain controllers and account suffix. There are more settings you can use, as well, in the 'activedirectory' namespace in System Settings.

### Available Settings

| Name                                | Description                                                                                                                                                                                                                                                                                      | Default       |
| ----------------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | ------------- |
| activedirectory.account\_suffix     | The account suffix for your domain. Usually in @forest.domain format.                                                                                                                                                                                                                            | @forest.local |
| activedirectory.autoadd\_adgroups   | If true, will grab all Active Directory groups the User belongs to, and search for any matching UserGroups in MODX. If any are found, the MODX User will automatically be added to the matching MODX UserGroups.                                                                                 | 1             |
| activedirectory.autoadd\_usergroups | A comma-separated list of MODX UserGroup names which the User will always be added to.                                                                                                                                                                                                           |               |
| activedirectory.base\_dn            | The base dn for your domain. This can usually be left blank, as MODX will automatically calculate it for you.                                                                                                                                                                                    |               |
| activedirectory.domain\_controllers | Comma-separated list of domain controllers. Specifiy multiple controllers if you would like the class to balance the LDAP queries.                                                                                                                                                               | 127.0.0.1     |
| activedirectory.real\_primarygroup  | This tweak will resolve the real primary group. Setting to false will fudge "Domain Users" and is much faster. Keep in mind though that if someones primary group is NOT "Domain Users", this is obviously going to mess up the results. Related to <http://support.microsoft.com/?kbid=321360>. | 1             |
| activedirectory.recursive\_groups   | When querying group memberships, do so recursively. Recommended to leave on.                                                                                                                                                                                                                     | 1             |
| activedirectory.use\_ssl            | Use SSL (LDAPS). Your AD server will need to be setup to support this. Works only if use\_tls is off.                                                                                                                                                                                            | 0             |
| activedirectory.use\_tls            | Use TLS. Your AD server will need to be setup to support this. Works only if use\_ssl is off.                                                                                                                                                                                                    | 0             |

### ActiveDirectory Group Synchronization

modActiveDirectory will automatically grab all the ActiveDirectory groups a user belongs to, and then search for any MODX UserGroups with matching names. If found, the user will be added to those groups.

If you'd like to disable this, set the 'activedirectory.autoadd\_adgroups' System Setting to 0.

modActiveDirectory also allows you to specify a comma-separated list of MODX UserGroup names to automatically add the User to. This can be set in the 'activedirectory.autoadd\_usergroups' setting.

Make sure you give the User Groups the User will auto-join access to the manager (through Access Controls), should you want your ActiveDirectory users to have manager access.
