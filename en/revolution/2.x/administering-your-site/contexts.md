---
title: "Contexts"
_old_id: "66"
_old_uri: "2.x/administering-your-site/contexts"
---

 Contexts allow MODX configuration settings to be overridden, extended, isolated, or shared across domains, sub-domains, sub-sites, multi-sites, cultural-specific sections, specific web applications, and so on.

 You can easily create a context from the Contexts menu under Tools. The context will then show up in your resource tree. Resources can easily be dragged between contexts to move them from one context to another.

<div class="note"> Note: there's nothing fundamentally _different_ about resources in different contexts, except that they now inherit the configuration settings of the context they are in. So, if you create a new context, you'll have to override the context settings in the context for any real, distinguishable change to appear. </div> Creating a Context 
--------------------

 First, go to the Contexts page, via System -> Contexts. Then, click on "Create New" in the grid. This will prompt you for a key and description. From there, right-click on your newly-created context, and click "Update Context".

 This will bring you to a screen displaying the Context, and an empty grid of settings. From here you can add Context-specific settings that will override any System Settings. Your new context will be completely empty, requiring you to include any and all settings you will be using.

 Note that new contexts don't automatically get "load" permission for Anonymous users in 2.2+ - you'll need to add that in manually.

<div class="note"> When you create a new context besides the default "web" context, you may need to apply context settings to the web context as well. </div> Context Settings 
------------------

 You can create settings for any defined context by clicking on **System -> Contexts**, then right-click any context and select "Update Context".

 Each context can have its own settings that override or extend the [System Settings](/revolution/2.x/administering-your-site/settings/system-settings "System Settings"). Contextual settings can in turn be overridden or extended by [User Settings](/revolution/2.x/administering-your-site/security/users#Users-UsersUserSettings). The hierarchy to remember is this:

<div class="panel" style="border-width: 1px;"><div class="panelContent"> System Setting -> Context Setting -> User Setting

 </div></div>Context Access
--------------

When creating a new context, make sure your desired user-groups have access to it:

<div class="info">`Security/Permissions -> Edit desired User Group -> Permissions -> Context Access`</div><span style="">Retrieving </span>Context Settings
-------------------------------------------------

 Retrieving a Context Setting is no different than retrieving any other System Setting -- in fact, you may not be aware that a given setting is being set at the System or Context (or at the User) level.

 In a template or Chunk:

```
<pre class="brush: php">[[++my_context_setting]]

``` Programmatically in a Snippet:

```
<pre class="brush: php">$setting = $modx->getOption('my_context_setting');

``` See Also 
----------

1. [Creating a Subdomain from a Folder using Virtual Hosts](/revolution/2.x/administering-your-site/contexts/creating-a-subdomain-from-a-folder-using-virtual-hosts)
2. [Using One Gateway Plugin to Manage Multiple Domains](/revolution/2.x/administering-your-site/contexts/using-one-gateway-plugin-to-manage-multiple-domains)