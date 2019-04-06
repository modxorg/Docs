---
title: "userTools"
_old_id: "1762"
_old_uri: "revo/usertools"
---

## What is userTools?

 This extra includes a set of MODX Revolution snippets for retrieving Users and User related information.

## History

 userTools was first written by David Pede (davidpede) and released on March 24, 2017.

## Download

 It can be downloaded from within the MODX Revolution manager via [Package Management](display/revolution20/Installing+a+Package), or from the MODX Extras Repository, here: <http://modx.com/extras/package/usertools>

 The source code and build script is also available on GitHub: <https://github.com/tasianmedia/usertools>

## Bugs & Feature Requests

 Bugs, issues and feature requests can be reported in the GitHub Repository, found here: <https://github.com/tasianmedia/usertools/issues>

## Available Snippets

### getProfile

 The getProfile snippet can be called using the tag:

 ``` php
[[getProfile]]
```

### getUsers

 The getUsers snippet can be called using the tag:

 ``` php
[[getUsers]]
```

### getGroups

 The getGroups snippet can be called using the tag:

 ``` php
[[getGroups]]
```

 getProfile, getUsers & getGroups can be called cached or un-cached. 

## Usage

### getProfile

#### Available Properties

 | Name | Description | Default Value | Added in Version |
|------|-------------|---------------|------------------|
| id | Comma-seperated list of numeric User ID's. If not set, will return Current User. |  | 1.0.0-pl |
| tpl | Name of a chunk serving as a template. \[REQUIRED\] |  | 1.0.0-pl |

### Available Placeholders

 | Name | Description | Default Value | Added in Version |
|------|-------------|---------------|------------------|
| internalKey | ID of the user. |  | 1.0.0-pl |
| fullname | Full name of the user. |  | 1.0.0-pl |
| email | Email address of the user. |  | 1.0.0-pl |
| phone | Phone number of the user. |  | 1.0.0-pl |
| mobilephone | Mobilephone/Cellphone number of the user. |  | 1.0.0-pl |
| fax | Fax number of the user. |  | 1.0.0-pl |
| blocked | Either 1 or 0. If blocked is set to true, the user will not be able to log in. |  | 1.0.0-pl |
| blockeduntil | A timestamp that, if set, will prevent the user from logging in until this date. |  | 1.0.0-pl |
| blockedafter | A timestamp that, if set, will prevent the user from logging in after this date. |  | 1.0.0-pl |
| logincount | The number of logins for this user. |  | 1.0.0-pl |
| lastlogin | The last time the user logged in. |  | 1.0.0-pl |
| thislogin | The time the user logged in in their current session. |  | 1.0.0-pl |
| failedlogincount | The number of times the user has failed to login. |  | 1.0.0-pl |
| sessionid | The User's session ID that maps to the session table. |  | 1.0.0-pl |
| dob | Date of birth of the user. |  | 1.0.0-pl |
| gender | Gender of the user. 0 for neither, 1 for male and 2 for female. |  | 1.0.0-pl |
| address | Postal address of the user. |  | 1.0.0-pl |
| country | Country of the user. |  | 1.0.0-pl |
| city | City of the user. |  | 1.0.0-pl |
| state | State or province of the user. |  | 1.0.0-pl |
| zip | Zip or postal code for the user. |  | 1.0.0-pl |
| photo | Photo of the user. |  | 1.0.0-pl |
| comment | Comments on the User. |  | 1.0.0-pl |
| website | Website of the user. |  | 1.0.0-pl |
| extended | Extended fields of the user. Access the placeholder by prefixing 'extended.' to the required field name: \[\[+extended.myField\]\] |  | 1.0.0-pl |

### getUsers

#### Available Properties

 | Name | Description | Default Value | Added in Version |
|------|-------------|---------------|------------------|
| id | Comma-seperated list of numeric User ID's. If not set, will return Current User. |  | 1.0.0-pl |
| tpl | Name of a chunk serving as a template. \[REQUIRED\] |  | 1.0.0-pl |