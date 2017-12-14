---
title: "WebLoginPE"
_old_id: "736"
_old_uri: "evo/webloginpe"
---

WebLoginPE
----------

 This is the documentation home for the WebLoginPE Add-On for MODX Evolution.

Wireframes
----------

 How might you actually use WebLoginPE?

### Simplest Example

 You can run WebLoginPE using the simplest function call:

 ```
<pre class="brush: php">
[!WebLoginPE? &type=`simple`!]

``` You can do this to test whether the Snippet and its functions are working. Simply place that Snippet call on a page and preview the page; try logging in and updating your profile. It won't be pretty, but it should work. If you have trouble, have a look in the forums or check out the [WebLoginPE Errors](http://wiki.modxcms.com/index.php/WebLoginPE_Errors) page.

### Use a Login Page

 The following wireframe outlines a site where you have a dedicated page with the login form. This example uses all of the default templates with all the default fields. ![](/download/attachments/11042892/WebLoginPE_Wireframe1.jpg?version=1&modificationDate=1364840348000)

- You need to create a new **Web User Group** : go to **Security?Web Permissions?Web User groups**. In this example, I created a user group named "Logged In Users" -- you will reference this in the **&groups** parameter (I think the image references the wrong group name).
- You need to create a **Document Group** -- don't go anywhere! Still in the **Web access permissions** area of the manager, create a new document group, e.g. "Private Pages".
- Associate the User Group with the Document Group -- still in the web access permissions area, go to the **User/Document group links** and make sure the user group and the document group are associated.
- You need to create 7 pages:

 1. The page containing the login form. It should contain a call to the WebLoginPE snippet (contained in one line):

 ```
<pre class="brush: php">
[!WebLoginPE?
&type=`simple`
&liHomeId=`2`
&regHomeId=`3`
&profileHomeId=`4`
&loHomeId=`6` !]

``` 2. The Welcome page. This is the page users see after logging in. It should belong to a special user group, e.g. "Private Pages" -- that way it is not publicly available. 3. Registration page. This should contain a call to the WebLoginPE snippet using the **&type=`register`** parameter:

 ```
<pre class="brush: php">
[!WebLoginPE?
&type=`register`
&regSuccessId=`5`
&regSuccessPause=`1`
&groups=`Logged In Users`!]

``` 4. Profile page. Belongs to the "Private Pages" group so it's not publicly accessible. The Snippet call looks like this:

 ```
<pre class="brush: php">
[!WebLoginPE?
&type=`profile`
!]

``` 5. Registration success page. This contains a message seen after a user registers. If you emailed the user a password, then the page should say that. It should also contain a link back to the login page. 6. Goodbye page. This is the page that users see after logging out. It can contain links back to the rest of the site. 7. You should also create a designated HTTP 500 page. This is the page that is shown if a public user tries to view a private page. Create the page, preferably with a link back to the login page, and be sure to denote it in the control panel under **Tools?Configuration?Site** under "Unauthorized page".

#### Strengths and Limitations

 This setup is simple to understand (ha... relatively speaking), so it's easier to debug and it helps you get a feel for how these pieces work together. However, it has the following limitations:

1. it uses only the default forms (none of the template chunks are used for customized forms)
2. it doesn't use the more common layout where the login appears in a sidebar.
3. The link to the login page will always say "login", even when the user is already logged in. No dynamic handling of this link is presented in this wireframe.

Types
-----

 This list includes options you add to WebLoginPE's **&type** parameter.

### simple

 ```
<pre class="brush: php">
[!WebLoginPE?
&type=`simple`
!]

``` This is the simplest to use, but as for understanding what's going on under the hood, this is the most complex option because all 4 functions (login, register, profile, logout) are encapsulated in a single page and are triggered by the value passed in the "service" variable (i.e. the value in $\_POST\['service'\]). Links between the different "pages" are automatically generated.

 By default, the page shows a login form (or a welcome message if user is already logged in). It has links (buttons) to Login, Forgot Password, Register.

 See the [official documentation for "Views (Templates)"](http://svn.modxcms.com/crucible/browse/%7Eraw,r=37/modx-components/webloginpe/trunk/assets/snippets/webloginpe/docs/views.html)

Email Verification; Profile Editing
-----------------------------------

 You first need a place where a visitor to your site can register to become a web user.

 The registration page should contain a call to the Snippet:

 ```
<pre class="brush: php">
[!WebLoginPE?
&type=`register`
&regType=`verify`
!]

``` Note that the form does not require a user to enter a name; only email and username are required by default. The fullname field can be blank. If you want to require the fullname field, use the ®Required parameter:

 ```
<pre class="brush: php">
[!WebLoginPE?
&type=`register`
&regType=`verify`
&regRequired=`username`
!]

``` But this configuration lacks a logout button. ### Basic Initial Set-up

 On your Home Page or Site Template, put the Snippet call like

 ```
<pre class="brush: php">
[!WebLoginPE?
&type=`simple`
!]

``` where you would like the Login Box to appear.

 Create a New Page called Registration, and put a Snippet call like

 ```
<pre class="brush: php">
[!WebLoginPE?
&type=`register`
!]

``` Create a New Page called Profile, and put a Snippet call like

 ```
<pre class="brush: php">
[!WebLoginPE?
&type=`profile`
!]

``` You can customise each of these snippet calls, by adding parameters (see the Documentation in the download package), for example on your Registration Page, you could specify

 ```
<pre class="brush: php">
[!WebLoginPE?
&type=`register`
&groups=`Pending Users`
&notify=`me@mydomain.com`
&regSuccessId=`74`
&regSuccessPause=`3`
!]

``` to make new registrations be assigned to the Pending Users group, an email notification sent to me@mydomain.com, user will be taken to success page (page ID is 74), and pause for 3 seconds.

### Common Errors and How to fix Them

"The password you entered is too short. Please use at least 6 numbers and/or letters."
--------------------------------------------------------------------------------------

 But your form doesn't even HAVE a password? What's going on? This is a subtle problem that arises if you don't specify **®Type=`verify`** when using a custom Chunk for the registerTpl. If you provide a custom chunk for the registration using the **®isterTpl** parameter, the form needs to contain all required fields. The fields that are required are different for registration-type "register" than they are for registration-type "verify". The default action of the Snippet is to expect a full registration form _including_ a password, so if your custom form doesn't contain a password field (or any other required field), it will fail validation. To rectify the situation, add **®Type=`verify`** to your Snippet call. If you still have problems, copy the default Chunk into your database and verify that it is being referenced correctly.

I can't edit my profile
-----------------------

 See forum thread: <http://modxcms.com/forums/index.php/topic,22083.0.html>

 There are various solutions there for various problems. In a nutshell, using type=`profile` may work when type=`simple` does not.

My Custom Form Elements aren't being Generated
----------------------------------------------

 Make sure you have added the name of your form element to the **customFields** parameter AND that you have NO SPACES between multiple custom field, e.g. this Snippet call will fail:<span class="error">\[||||\\||\]</span>

 ```
<pre class="brush: php">
[!WebLoginPE? &type=`profile` &profileTpl=`profileTpl` &customFields=`first_name,last_name,favorite_colors, contact_time` &inputHandler=`Favorite Colors:userFavoriteColors:favorite_colors:select multiple:Red(ff0000),Orange(ff9900),Green(66ff00),Black(000000)||Best time to contact you:userContactRadios:contact_time:radio:Morning(morning),Afternoon(afternoon),Evening(Evening)`!]

``` Can you see the space after the comma immediately before "contact\_time"? That little space causes the Snippet call to train-wreck. Also make sure you are using the correct

 ```
<pre class="brush: php">
[+form.name_of_your_form_element+]

``` placeholder so WebLoginPE will know where to insert the form element.

My Form Submits to the Wrong Page!
----------------------------------

 Sometimes this comes up as a 404. Check the HTML of the page and verify that the **action** attribute is pointing where it should be pointing. The other thing that can trip you up, especially with friendly URLs enabled, is the absence of a **base** tag. Check out the forums and the wiki for more information, but essentially, you probably need to add a tag like the following to your template's head:

 ```
<pre class="brush: php">
<base href="http://www.mydomain.com"/>

```The Plugin I wrote to extend the Functionality is not working!
--------------------------------------------------------------

 Yeah... this one sucks. If you're writing plugins, then hopefully you know what you're doing. Have a look in the **Reports-->System Events** for any log messages about how or why your plugin crashed.

The Values in my Multi-Select are showing the shortened values, not the full descriptions!
------------------------------------------------------------------------------------------

 Maybe you have your values/variables in backwards order? It should be:

 ```
<pre class="brush: php">
A Short Description(the_value)

```The template (chunk) I'm referencing for "&successTpl" is not showing up!
-------------------------------------------------------------------------

 Well, if your Snippet call (presumably the one where you login, often using &type=`simple`) uses the &liHomeId parameter to point to a special welcome page, that parameter can seem to override the &successTpl one because it forwards you to the new page before you ever get to see the successTpl chunk. If you navigate back to the login page after being redirected, you should see the contents of your successTpl chunk displayed for a logged in user.

 [Link to full docs](http://www.lucidgreen.net/modxGuides/wlpedocs/views.html)