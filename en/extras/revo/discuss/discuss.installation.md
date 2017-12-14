---
title: "Discuss.Installation"
_old_id: "827"
_old_uri: "revo/discuss/discuss.installation"
---

<div>- [Installing Discuss](#Discuss.Installation-InstallingDiscuss)
  - [Setting up the necessary Resources](#Discuss.Installation-SettingupthenecessaryResources)
  - [Setting up Friendly URLs & Discuss specific rewrite rules](#Discuss.Installation-SettingupFriendlyURLs%26Discussspecificrewriterules)
      - [For .htaccess (Apache, mod\_rewrite enabled)](#Discuss.Installation-For.htaccess%28Apache%2Cmodrewriteenabled%29)
      - [For nginx](#Discuss.Installation-Fornginx)
  - [Configure Discuss to match your environment.](#Discuss.Installation-ConfigureDiscusstomatchyourenvironment.)
- [Setting up Login, Register & Update Profile pages with Discuss](#Discuss.Installation-SettingupLogin%2CRegister%26UpdateProfilepageswithDiscuss)
  - [Setting Up Login](#Discuss.Installation-SettingUpLogin)
  - [Setting Up Register](#Discuss.Installation-SettingUpRegister)
  - [Setting Up UpdateProfile](#Discuss.Installation-SettingUpUpdateProfile)
- [See Also](#Discuss.Installation-SeeAlso)

</div>Installing Discuss
------------------

Installing Discuss is pretty simple using the MODX Package Manager. Just download the discuss package and [run the installer](/revolution/2.x/administering-your-site/installing-a-package "Installing a Package") as you would for any other package. While you're in the package manager, you will also need to download and install the following Extras which are required for Discuss to work properly:

- Login
- FormIt

During the installation, you are given the option to install demo data, if this is the first time you are installing Discuss, make sure to enable this so you have some working data to see once you've installed everything!

Once you installed Discuss using the Package Manager, there are a few steps and configuration you need to go through in order to set up a working forum solution. These are:

1. Create the necessary Resources
2. Set up Friendly Urls and Discuss-specific rewrite rules
3. Configure Discuss to match your environment.

We will go through all of these steps below.

### Setting up the necessary Resources

Discuss uses only one resource to show many different views, so you will need to create this one when you first set up your forum.

Simple create a new resource with the following attributes:

- Pagetitle: Forums
- Template: empty
- Alias: forums
- Content: \[\[!Discuss\]\]
- Container (on the Settings tab): Yes

You can change the alias to suit something else if you want, but keep in mind that you will need to adjust the custom rewrite rules as shown in the next step to match your alias.

While Discuss includes login and sign up functionality (using the Login package), you will most likely want to use specific or already existent login and registration pages for your forum. This is accomplished using the so called SSO mode (we'll discuss this later), and it requires you to set up separate resources for login, registration and update profile resources. Please create those now.

You can build these as you normally would ([see the Login documentation](/extras/revo/login "Login") for more information on them) and there are no requirements on how they look or are build. There is one important thing to include in your login, register and update profile pages, which is pre and posthooks specific to Discuss:

```
<pre class="brush: php">
 &preHooks=`preHook.DiscussLogin`
   &postHooks=`postHook.DiscussLogin`

```So be sure to add those to your snippet calls.

Further down on this page there are more instructions on setting up your Login and Update Profile resources.

### Setting up Friendly URLs & Discuss specific rewrite rules

Discuss only works with friendly URLs right now, so to start, make sure to enable friendly urls in MODX. Go to system > system settings and limit the view to the "Friendly URLs" area. Enable use\_friendly\_urls and customize other settings as you see fit. Usually it's a good idea to enable automatic\_alias and use\_alias\_path as well, but neither really affect Discuss.

After Friendly URLs are set up, you will need to add some specific rewrite rules for Discuss to make it working. Below you will find code snippets you can copy/paste for use in .htaccess files on apache, as well as a config blurb for nginx.

#### For .htaccess (Apache, mod\_rewrite enabled)

**Rewrite rules are not necessary since 1.2.1 (relased on 23rd of July 2013)**

Make sure to add this BEFORE the regular MODX rewrite rules in your .htaccess but AFTER the RewriteBase. If you have used a different alias than "forums" in your Discuss resource, or the forums are in the root of the site, make sure to replace all occurences of "forums" below accordingly.

```
<pre class="brush: php">
# If imported from SMF, you can include the following lines to make sure existing urls don't break.
RewriteRule ^forums/index.php/topic,(.*).msg(.*).html$ forums/?action=thread&thread=$1&i=1
RewriteRule ^forums/index.php/topic,(.*).(.*).html$ forums/?action=thread&thread=$1&i=1&start=$2
RewriteRule ^forums/\?topic=(.+).(.+)$ forums/?action=thread&thread=$1&i=1
RewriteRule ^forums/index.php/board,(.*).(.*).html$ forums/?action=board&board=$1&i=1&start=$2
RewriteRule ^forums/\?board=(.+).(.+)$ forums/?action=board&board=$1&i=1


# Discuss rewrite rules
RewriteRule ^forums/thread/([0-9]+)/(.*)$ forums/?action=thread&thread=$1 [L,QSA]
RewriteRule ^forums/u/(.+)$ forums/?action=user&user=$1 [L,QSA]
RewriteRule ^forums/board/([0-9]+)/(.*)$ forums/?action=board&board=$1 [L,QSA]
RewriteRule ^forums/category/([0-9]+)/(.*)$ forums/?category=$1 [L,QSA]
RewriteRule ^forums/(.+)$ forums/?action=$1 [L,QSA]
RewriteRule ^forums/(.+)/$ forums/?action=$1 [L,QSA]

```Remember, change "forums" if your alias is different.

#### For nginx

Suggested set of rules (called before your main rewrite for MODX):

```
<pre class="brush: php">
  rewrite ^/forums/thread/([0-9]+)/(.*)$ /index.php?q=forums/&action=thread&thread=$1 last;
  rewrite ^/forums/u/(.+)$ /index.php?q=forums/&action=user&user=$1 last;
  rewrite ^/forums/board/([0-9]+)/(.*)$ /index.php?q=forums/&action=board&board=$1 last;
  rewrite ^/forums/category/([0-9]+)/(.*)$ /index.php?q=forums/&category=$1 last;
  rewrite ^/forums/(.+)$ /index.php?q=forums/&action=$1 last;
  rewrite ^/forums/(.+)/$ /index.php?q=forums/&action=$1 last;

```Here's another more extensive set of rules that also rewrites SMF rules to the proper Discuss ones.

```
<pre class="brush: php">
 # SMF rules
rewrite ^/forums/index.php/topic,(.*).msg(.*).html$ /forums/?action=thread&thread=$1&i=1 last;
rewrite ^/forums/index.php/topic,(.*).(.*).html$ /forums/?action=thread&thread=$1&i=1&start=$2 last;

rewrite ^/forums/index.php\?topic=(.*).(.*)$ /forums/?action=thread&thread=$1&i=1 last;
if ($args ~* topic=(.*).(.*)){
  set $args action=thread&thread=$1&i=1;
}
rewrite ^/forums/\?topic=(.*).(.*)$ /forums/?action=thread&thread=$1&i=1 last;

rewrite ^/forums/index.php/board,(.*).(.*).html$ /forums/?action=board&board=$1&i=1&start=$2 last;
rewrite ^/forums/\?board=(.*).(.*)$ /forums/?action=board&board=$1&i=1 last;
rewrite ^/forums/thread/([0-9]+)/(.*)$ /forums/?action=thread&thread=$1 last;
rewrite ^/forums/thread/([0-9]+)/(.*)$ /forums/?action=thread&thread=$1 last;

rewrite ^/forums/u/(.+)$ /forums/?action=user&user=$1 last;
rewrite ^/forums/board/([0-9]+)/(.*)$ /forums/?action=board&board=$1 last;
rewrite ^/forums/board\.xml/([0-9]+)/(.*)$ /forums/?action=board.xml&board=$1 last;
rewrite ^/forums/category/([0-9]+)/(.*)$ /forums/?category=$1 last;

rewrite ^/forums/index.php?action=unread$ /forums/thread/unread last;
if ($args ~* action=unread){
  set $args action=thread/unread;
}

# Discuss main FURL
if (!-e $request_filename){
  rewrite ^/forums/(.*)$ /forums/?action=$1 last;
}

```### Configure Discuss to match your environment.

Now that friendly urls are working, we're ready to configure Discuss. As most of this configuration is done in System settings, open that through System > System settings and choose the "discuss" namespace to see Discuss specific configuration.

- **discuss.forums\_resource\_id** - Point this to the ID of the Resource your Discuss forum resides in.
- **discuss.login\_resource\_id** - Point this to the ID of the Resource your [Login](/extras/revo/login "Login") call resides in.
- **discuss.register\_resource\_id** - Point this to the ID of the Resource your [Register](/extras/revo/login/login.register "Login.Register") call resides in.
- **discuss.update\_profile\_resource\_id** - Point this to the ID of the Resource your [UpdateProfile](/extras/revo/login/login.updateprofile "Login.UpdateProfile") call resides in.
- Set **discuss.sso\_mode** to yes. This will make Discuss let your own login, register and update\_profile pages instead of the ones built in.

Some other nice configuration options to change or to keep in mind:

- When you are going to build a custom theme, enable the **discuss.debug\_templates** setting to automatically add HTML comments on what chunks are being used to build the output.
- The **discuss.theme** setting is used to load the proper templates and assets. For now, default should do, but change this when you want to use a different theme. Just give it the name of the theme dir in the "themes" directory of Discuss.
- Set **discuss.forum\_title** to the name of your forum.
- By default (if the theme uses it, that is) Discuss uses a simple text search engine, but you can enable Solr search by setting **discuss.search\_class** to disSolrSearch and filling out the relevant solr setting.

Setting up Login, Register & Update Profile pages with Discuss
--------------------------------------------------------------

While this bit of installation is technically not a part of Discuss, here's some instructions on setting up your login, register and update profile pages when using SSO mode.

### Setting Up Login

Make sure in your [Login](/extras/revo/login "Login") call that you specify the following as pre and post hooks:

```
<pre class="brush: php">
   &preHooks=`preHook.DiscussLogin`
   &postHooks=`postHook.DiscussLogin`

```This will allow Discuss to add extra functionality to your Login methods.

### Setting Up Register

Make sure you add the members to the "Forum Members" User Group, so that they will have forum access. This can be done via:

```
<pre class="brush: php">
&usergroups=`Forum Members:Member`

```In your [Register](/extras/revo/login/login.register "Login.Register") call.

### Setting Up UpdateProfile

A few things need to happen with UpdateProfile.

One, make sure you add the following post-hook to your UpdateProfile call:

```
<pre class="brush: php">
   &postHooks=`postHook.DiscussUpdateProfile`

```Then, **after** the UpdateProfile call, place this snippet call:

```
<pre class="brush: php">
[[!DiscussUpdateProfileLoader]]

```Finally, there are some extra form fields you can add to allow users to modify their Discuss profile:

```
<pre class="brush: php">
<label for="signature">Signature <span class="error">[[!+up.error.signature:stripTags=`p,b,strong,i,a,ul,li`]]</span></label>
<textarea name="signature:allowTags" id="signature">[[!+up.signature]]</textarea>

<label for="use_display_name">Use Display Name in Forums <span class="error">[[!+up.error.use_display_name]]</span></label>
<input type="hidden" name="use_display_name" id="use_display_name_hidden" value="0" />
<input type="checkbox" name="use_display_name" id="use_display_name" value="1" [[!+up.use_display_name:FormItIsChecked=`1`]] />

<label for="display_name">Display Name <span class="error">[[!+up.error.display_name]]</span></label>
<input type="text" name="display_name" id="display_name" value="[[+up.display_name]]" />

<label for="show_online">Show Online Status <span class="error">[[!+up.error.show_online]]</span> </label>
<input type="hidden" name="show_online" id="show_online_hidden" value="0" />
<input type="checkbox" name="show_online" id="show_online" value="1" [[!+up.show_online:FormItIsChecked=`1`]] />

<label for="show_email">Show Email in Forums <span class="error">[[!+up.error.show_email]]</span></label>
<input type="hidden" name="show_email" id="show_email_hidden" value="0" />
<input type="checkbox" name="show_email" id="show_email" value="1" [[!+up.show_email:FormItIsChecked=`1`]] />

```The prior fields will allow your users to toggle those values in their profile.

See Also
--------

1. [Discuss.Installation](/extras/revo/discuss/discuss.installation)
  1. [Discuss.Installation from Git](/extras/revo/discuss/discuss.installation/discuss.installation-from-git)
2. [Discuss.Getting Started](/extras/revo/discuss/discuss.getting-started)
3. [Discuss.Creating a Discuss Theme](/extras/revo/discuss/discuss.creating-a-discuss-theme)
4. [Discuss.Controllers](/extras/revo/discuss/discuss.controllers)
  1. [Discuss.Controllers.board](/extras/revo/discuss/discuss.controllers/discuss.controllers.board)
      1. [Discuss.Controllers.board.xml](/extras/revo/discuss/discuss.controllers/discuss.controllers.board/discuss.controllers.board.xml)
  2. [Discuss.Controllers.home](/extras/revo/discuss/discuss.controllers/discuss.controllers.home)
  3. [Discuss.Controllers.login](/extras/revo/discuss/discuss.controllers/discuss.controllers.login)
  4. [Discuss.Controllers.logout](/extras/revo/discuss/discuss.controllers/discuss.controllers.logout)
  5. [Discuss.Controllers.profile](/extras/revo/discuss/discuss.controllers/discuss.controllers.profile)
  6. [Discuss.Controllers.register](/extras/revo/discuss/discuss.controllers/discuss.controllers.register)
  7. [Discuss.Controllers.search](/extras/revo/discuss/discuss.controllers/discuss.controllers.search)
  8. [Discuss.Controllers.thread](/extras/revo/discuss/discuss.controllers/discuss.controllers.thread)
5. [Discuss.Database Model](/extras/revo/discuss/discuss.database-model)
6. [Discuss.Contributing](/extras/revo/discuss/discuss.contributing)
7. [Discuss.ChunkMap](/extras/revo/discuss/discuss.chunkmap)
8. [Discuss.Features](/extras/revo/discuss/discuss.features)
9. [Discuss.Roadmap](/extras/revo/discuss/discuss.roadmap)
10. [Configuring Sphinx for Search](/extras/revo/discuss/configuring-sphinx-for-search)