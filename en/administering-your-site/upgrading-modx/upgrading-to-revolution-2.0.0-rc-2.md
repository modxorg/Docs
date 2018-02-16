---
title: "Upgrading to Revolution 2.0.0-rc-2"
_old_id: "1124"
_old_uri: "2.x/administering-your-site/upgrading-modx/upgrading-to-revolution-2.0.0-rc-2"
---

Upgrading to Revolution 2.0.0-rc-2
----------------------------------

There are a few changes that have occurred in 2.0.0 RC-2 that will only apply to developers. If you are not:

- Writing translatable Extras for Revolution
- Writing plugins for Revolution

then you do not have to read this document.

Lexicon Changes
---------------

First off, you might ask, "Why such a big change so late in the game?" Well, for one, we didnt realize the limitations of the RC1 lexicon system, and how it hampered Extras development and prevented us from having a stable multi-lingual distribution. What has been changed is:

- Dropped entirely the modLexiconTopic and modLexiconLanguage tables.
- Changed the 'topic' field on modLexiconEntry to be a varchar of the topic name.
- Refactored the entire modLexiconEntry logic so that now DB records of modLexiconEntry are **only** for overridden entries. Otherwise, they are cached from the lexicon topic files (the .inc.php files.)
- Redid the entire Lexicon Management section to now be a grid that only allows overriding of Entries. In other words, you can only edit existing entries, and when you edit them, they show up in green, signifying they have been overridden.

This means that the only Lexicon Entries stored in the database are overrides made by the user.

There are some real benefits to the new approach:

- Much, much easier translation abilities.
- Much faster lexicon loading time, since its file and array based rather than DB and Object based.
- You can now successfully change any lexicon entry without harming your upgrade path.
- Cuts down on the size of the core.transport.zip and massively decreases build and setup times.
- Much easier development. Just put a 'lexicon/' directory in your root of your Namespace's path (like most current Extras do) and build it in this format: 'lexicon/\[language\]/\[topic\].inc.php'. MODx will automatically parse that directory and browse it in Lexicon Management for you. You no longer need to 'buildLexicon' in your Extra's build scripts. However, this means that **all packages using lexicons will need to be rebuilt for 2.0.0 RC-2**. All that needs to be changed is that they no longer need to call 'modPackageBuilder::buildLexicon' in their build scripts, and their lexicon directories must be under the namespace path with the directory name 'lexicon' (similar to [this component](http://svn.modxcms.com/svn/modx-components/doodles/trunk/)). We apologize for the inconvience, but we promise that you'll find the change much, much easier to develop in.

This also means that we will be packaging in core translations into SVN. All core translations will be committed there, similar to Evolution.

Plugin Changes
--------------

Deprecated Plugin Events have been removed in RC-2, and a few new events have been introduced. Please view the in-progress documentation on these events on the [System Events](developing-in-modx/basic-development/plugins/system-events "System Events") page, or view an exhaustive list via the [code here](http://svn.modxcms.com/svn/tattoo/tattoo/branches/2.0/_build/data/transport.core.events.php).

Note that some of these events are model-centric. This means they are executed from within the mod\* classes. These are usually:

- On\*Save
- On\*BeforeSave
- On\*Remove
- On\*BeforeRemove

This means they will fire regardless of where they are executed. This allows you to fire events even when 3rd Party Components modify those objects, such as when a 3PC creates a user. Please see the documentation on each respective event for more information.

See Also
--------

1. [Basic Installation](getting-started/installation/basic-installation)
  1. [MODx Revolution on Debian](getting-started/installation/basic-installation/modx-revolution-on-debian)
  2. [Lighttpd Guide](getting-started/installation/basic-installation/lighttpd-guide)
  3. [Problems with WAMPServer 2.0i](getting-started/installation/basic-installation/problems-with-wampserver-2.0i)
  4. [Installation on a server running ModSecurity](getting-started/installation/basic-installation/installation-on-a-server-running-modsecurity)
  5. [MODX and Suhosin](getting-started/installation/basic-installation/modx-and-suhosin)
  6. [Nginx Server Config](getting-started/installation/basic-installation/nginx-server-config)
2. [Advanced Installation](getting-started/installation/advanced-installation)
3. [Git Installation](getting-started/installation/git-installation)
4. [Command Line Installation](getting-started/installation/command-line-installation)
  1. [The Setup Config Xml File](getting-started/installation/command-line-installation/the-setup-config-xml-file)
5. [Troubleshooting Installation](getting-started/installation/troubleshooting-installation)
6. [Successful Installation, Now What Do I Do?](getting-started/installation/successful-installation,-now-what-do-i-do)
7. [Using MODx Revolution from SVN](getting-started/installation/using-modx-revolution-from-svn)