---
title: "userTools"
_old_id: "1762"
_old_uri: "revo/usertools"
---

<a name="userTools-WhatisuserTools"></a>What is userTools?
----------------------------------------------------------

 This extra includes a set of MODX Revolution snippets for retrieving Users and User related information.

<a name="userTools-History"></a>History
---------------------------------------

 userTools was first written by David Pede (davidpede) and released on March 24, 2017.

<a name="userTools-Download"></a>Download
-----------------------------------------

 It can be downloaded from within the MODX Revolution manager via [Package Management](display/revolution20/Installing+a+Package), or from the MODX Extras Repository, here: <http://modx.com/extras/package/usertools>

 The source code and build script is also available on GitHub: <https://github.com/tasianmedia/usertools>

<a name="userTools-Bugs&FeatureRequests"></a>Bugs & Feature Requests
--------------------------------------------------------------------

 Bugs, issues and feature requests can be reported in the GitHub Repository, found here: <https://github.com/tasianmedia/usertools/issues>

<a name="userTools-AvailableSnippets"></a>Available Snippets
------------------------------------------------------------

### <a name="userTools-AvailableSnippets-getProfile"></a>getProfile

 The getProfile snippet can be called using the tag:

 ```
<pre class="brush: php">
[[getProfile]]

```### <a name="userTools-AvailableSnippets-getUsers"></a>getUsers

 The getUsers snippet can be called using the tag:

 ```
<pre class="brush: php">
[[getUsers]]

```### <a name="userTools-AvailableSnippets-getGroups"></a>getGroups

 The getGroups snippet can be called using the tag:

 ```
<pre class="brush: php">
[[getGroups]]

```<div class="note"> getProfile, getUsers & getGroups can be called cached or un-cached. </div><a name="userTools-Usage"></a>Usage
-----------------------------------

### <a name="userTools-AvailableProperties"></a>getProfile

#### <a name="userTools-AvailableProperties-getProfile"></a>Available Properties

 <table><tbody><tr><th>Name</th> <th>Description</th> <th>Default Value</th> <th>Added in Version</th> </tr><tr><td>id</td> <td>Comma-seperated list of numeric User ID's. If not set, will return Current User.</td> <td></td> <td>1.0.0-pl</td> </tr><tr><td>tpl</td> <td>Name of a chunk serving as a template. \[REQUIRED\]</td> <td></td> <td> 1.0.0-pl</td></tr></tbody></table>### <a name="userTools-AvailablePlaceholders-getProfile"></a>Available Placeholders

 <table><tbody><tr><th>Name</th> <th>Description</th> <th>Default Value</th> <th>Added in Version</th> </tr><tr><td>internalKey</td> <td>ID of the user.</td> <td></td> <td>1.0.0-pl</td> </tr><tr><td>fullname</td> <td>Full name of the user.</td> <td></td> <td>1.0.0-pl</td> </tr><tr><td>email</td> <td>Email address of the user.</td> <td></td> <td>1.0.0-pl</td> </tr><tr><td>phone</td> <td>Phone number of the user.</td> <td></td> <td>1.0.0-pl</td> </tr><tr><td>mobilephone</td> <td>Mobilephone/Cellphone number of the user.</td> <td></td> <td>1.0.0-pl</td> </tr><tr><td>fax</td> <td>Fax number of the user.</td> <td></td> <td>1.0.0-pl</td> </tr><tr><td>blocked</td> <td>Either 1 or 0. If blocked is set to true, the user will not be able to log in.</td> <td></td> <td>1.0.0-pl</td> </tr><tr><td>blockeduntil</td> <td>A timestamp that, if set, will prevent the user from logging in until this date.</td> <td></td> <td>1.0.0-pl</td> </tr><tr><td>blockedafter</td> <td>A timestamp that, if set, will prevent the user from logging in after this date.</td> <td></td> <td>1.0.0-pl</td> </tr><tr><td>logincount</td> <td>The number of logins for this user.</td> <td></td> <td>1.0.0-pl</td> </tr><tr><td>lastlogin</td> <td>The last time the user logged in.</td> <td></td> <td>1.0.0-pl</td> </tr><tr><td>thislogin</td> <td>The time the user logged in in their current session.</td> <td></td> <td>1.0.0-pl</td> </tr><tr><td>failedlogincount</td> <td>The number of times the user has failed to login.</td> <td></td> <td>1.0.0-pl</td> </tr><tr><td>sessionid</td> <td>The User's session ID that maps to the session table.</td> <td></td> <td>1.0.0-pl</td> </tr><tr><td>dob</td> <td>Date of birth of the user.</td> <td></td> <td>1.0.0-pl</td> </tr><tr><td>gender</td> <td>Gender of the user. 0 for neither, 1 for male and 2 for female.</td> <td></td> <td>1.0.0-pl</td> </tr><tr><td>address</td> <td>Postal address of the user.</td> <td></td> <td>1.0.0-pl</td> </tr><tr><td>country</td> <td>Country of the user.</td> <td></td> <td>1.0.0-pl</td> </tr><tr><td>city</td> <td>City of the user.</td> <td></td> <td>1.0.0-pl</td> </tr><tr><td>state</td> <td>State or province of the user.</td> <td></td> <td>1.0.0-pl</td> </tr><tr><td>zip</td> <td>Zip or postal code for the user.</td> <td></td> <td>1.0.0-pl</td> </tr><tr><td>photo</td> <td>Photo of the user.</td> <td></td> <td>1.0.0-pl</td> </tr><tr><td>comment</td> <td>Comments on the User.</td> <td></td> <td>1.0.0-pl</td> </tr><tr><td>website</td> <td>Website of the user.</td> <td></td> <td>1.0.0-pl</td> </tr><tr><td>extended</td> <td>Extended fields of the user. Access the placeholder by prefixing 'extended.' to the required field name: \[\[+extended.myField\]\]</td> <td></td> <td>1.0.0-pl</td></tr></tbody></table>### <a name="userTools-getUsers"></a>getUsers

#### <a name="userTools-AvailableProperties-getUsers"></a>Available Properties

 <table><tbody><tr><th>Name</th> <th>Description</th> <th>Default Value</th> <th>Added in Version</th> </tr><tr><td>id</td> <td>Comma-seperated list of numeric User ID's. If not set, will return Current User.</td> <td></td> <td>1.0.0-pl</td> </tr><tr><td>tpl</td> <td>Name of a chunk serving as a template. \[REQUIRED\]</td> <td></td> <td> 1.0.0-pl</td></tr></tbody></table>