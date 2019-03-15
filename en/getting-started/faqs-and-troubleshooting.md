---
title: "FAQs & Troubleshooting"
_old_id: "1689"
_old_uri: "2.x/faqs-and-troubleshooting"
note: "This page hasn't been updated in a while, and could use a good review."
---

This document aims to get you started with common issues / questions with MODX Revolution by either answering it, or pointing you to the right resources. It is by no means exclusive, and a good search on the forums and this documentation may find more resources for what you're looking for. In all cases - if you can't find what you need, do ask in the [forums](http://forums.modx.com) or on IRC: irc.freenode.org channel: #MODX.

The questions numbering represents nothing but that - a number to indicate what question you're looking at to help scanning through.

This is a documentation stub, and could use your help to complete! If you don't have access to edit this page, [please post anything you would want to see added or updated in this topic on the forums](http://forums.modx.com/thread/72123/faqs-troubleshooting-on-the-rtfm).

This document will always be a work in progress as new features are added / changed, and it could use your help in keeping it structured and up to date! If you do not have access to editing this document, [please post anything you would want to see added or updated in this topic on the forums](http://forums.modx.com/thread/72123/faqs-troubleshooting-on-the-rtfm).

_To Editors:_

- _Please use the right headings (heading 2 for categories, heading 3 for questions) to make sure the table of contents et al are properly generated and make sense._
- _Big subjects can be created as a subpage to this page, and if other pages already exist on these docs please link to it in the first section._
- _Please make sure the numbering is correct when you add a question to allow easier scanning of the page._
- _Make sure you link generously to further reading on the subject._

_Thanks!!_



## Table of Contents

FAQs and/or Troubleshooting on specific subjects elsewhere:

- [Troubleshooting Installation](getting-started/installation/troubleshooting "Troubleshooting Installation")
- [Troubleshooting Upgrades](getting-started/maintenance/upgrading/troubleshooting "Troubleshooting Upgrades")
- [Troubleshooting Package Management](building-sites/extras/troubleshooting "Troubleshooting Package Management")
- [Troubleshooting Security](building-sites/client-proofing/security/troubleshooting-security "Troubleshooting Security")

Subpages dealing with specific subjects:

- [CMP Development FAQs & Troubleshooting](extending-modx/custom-manager-pages/troubleshooting "CMP Development FAQs & Troubleshooting")

On this page, you will find the following categories and questions:

- [Table of Contents](#table-of-contents)
- [1. MODX 101](#1-modx-101)
  - [1.1. What is MODX Evolution, and what is MODX Revolution? What's the difference?](#11-what-is-modx-evolution-and-what-is-modx-revolution-whats-the-difference)
  - [1.2. What different tags can I use? What is \[\[\*pagetitle\]\], \[\[Wayfinder\]\] etc?](#12-what-different-tags-can-i-use-what-is-pagetitle-wayfinder-etc)
- [2. The Manager](#2-the-manager)
  - [2.1. Help! Where did the sidebar go?](#21-help-where-did-the-sidebar-go)
  - [2.2 How can I modify what resource fields are visible when creating or editing a Resource? Is there something like ManagerManager for Revolution?](#22-how-can-i-modify-what-resource-fields-are-visible-when-creating-or-editing-a-resource-is-there-something-like-managermanager-for-revolution)
  - [2.3 What does modDocument/ modWeblink/ modSymLink/ modStaticResource mean?](#23-what-does-moddocument-modweblink-modsymlink-modstaticresource-mean)
  - [2.4 What is the difference between a Resource and a Document?](#24-what-is-the-difference-between-a-resource-and-a-document)
  - [2.5 I'm locked out! I can't access the manager! Forgot my password and recovery doesn't work!](#25-im-locked-out-i-cant-access-the-manager-forgot-my-password-and-recovery-doesnt-work)
- [3. Frontend Display Issues](#3-frontend-display-issues)
  - [3.1 Blank frontend pages resolved by Clearing Cache](#31-blank-frontend-pages-resolved-by-clearing-cache)
  - [3.2 General Snippet Problems](#32-general-snippet-problems)



## 1. MODX 101

### 1.1. What is MODX Evolution, and what is MODX Revolution? What's the difference?

MODX Evolution is the legacy code and are the 1.x versions. It has powered hundreds of thousands of websites in the past five years and is what has shaped MODX.

MODX Revolution is a complete rewrite of MODX Evolution which shares the same ideas but is based on xPDO, a database abstraction layer, and finally saw daylight in 2010.

There are three kinds of MODX products at this point:

- 0.9.6.x – the original code base that started with it's first production/stable release as version 0.9.0 at the end of October 2005. _No longer supported, and you REALLY should update to the latest Evolution version. Exploits founds in 0.9.6.x have long been fixed!_
- Evolution 1.x – a cleaned up and refined distribution of 0.9.6.x with conventions and terminology more in line with our totally rewritten Revolution release.
- Revolution 2.x – a fully object oriented and completely new branch that's been in development for more than 3 years that addresses limitations found in the original code base such as having a truly recursive parser and eliminating the 5,000 document ceiling.

Further reading:

- "The Evolution of a Revolution" <http://modx.com/about/blog/the-evolution-of-a-revolution/>
- "What are the basic differences between Evolution and Revolution?" <http://modx.com/revolution/product/faq/#q1>
- There's a number of big topics on the forums as well discussing evo and revo which may be interesting if you're looking for more in-depth discussing of the differences. As Revolution has been over three years in development, do check out the date something was posted to be sure they are still relevant.

### 1.2. What different tags can I use? What is \[\[\*pagetitle\]\], \[\[Wayfinder\]\] etc?

Check out the [Tag Syntax](building-sites/tag-syntax "Tag Syntax") documentation. You can find resource fields you can use in Revolution on the [Resources Documentation](building-sites/resources "Resources").

## 2. The Manager

### 2.1. Help! Where did the sidebar go?

You probably hid it at some point. There's a subtle arrow on the left side of the screen ([see this image](/download/attachments/36634926/subtlearrow.PNG?version=1&modificationDate=1322402411000)) that you can click to bring it back. In some cases you will need to refresh the page for the contents of the sidebar to load properly.

### 2.2 How can I modify what resource fields are visible when creating or editing a [Resource](/display/revolution20/Resource "Resource")? Is there something like [ManagerManager](http://modx.com/extras/package/managermanager) for Revolution?

You can use [Form Customization](/display/revolution20/Form+Customization "Form Customization") (found under the Security menu) to change the fields. It doesn't offer all of the (Evolution) ManagerManager plugin but comes pretty far.

### 2.3 What does modDocument/ modWeblink/ modSymLink/ modStaticResource mean?

They are the class names of Documents, Weblinks, Symlinks and Static Resources. They are "subtypes" of Resources (class name modResource) and each have their own specific goal. They all show up in the Resource Tree and can appear anywhere in the hierarchy.

- [Documents](building-sites/resources "Resources") (commonly refered to as Resources, see 2.4 below) are regular pages and have content.
- A [Weblink](building-sites/resources/weblink "Weblink") redirect a user to a different Resource or an external URL.
- A [Symlink](building-sites/resources/symlink "Symlink") acts as a copy of a Document
- [Static Resources](building-sites/resources/static-rsource "Static Resource") act like Documents, however their content comes from a file on the filesystem.

### 2.4 What is the difference between a Resource and a Document?

Technically, a Resource (modResource) is an abstract object of which a Document (modDocument) is an implementation.

Practically both terms are used to indicate the same thing: a Document which holds certain content. Coming from the technical implementation, a [Weblink](building-sites/resources/weblink "Weblink"), [Symlink](building-sites/resources/symlink "Symlink") or [Static Resource](building-sites/resources/static-rsource "Static Resource") are also be included when referring to "Resources" as they are also implementations of the modResource class.

### 2.5 I'm locked out! I can't access the manager! Forgot my password and recovery doesn't work!

You're not doomed. [Check out these instructions for Revolution](building-sites/client-proofing/security/troubleshooting-security/resetting-a-user-password-manually "Resetting a User Password Manually"), or [these instructions for recovering your user account in Evolution](/evolution/1.0/administration/manager-users/reset-your-password-unblock-your-user "Reset your Password - Unblock your User").

## 3. Frontend Display Issues

### 3.1 Blank frontend pages resolved by Clearing Cache

In Revolution 2.2.5 the way xPDO/MODX write cache files has been re-factored. If you are having issues with blank frontend pages that are resolved after clearing the site cache, you could try setting _use\_flock_. This should help with RackSpace Cloud hosting, GoDaddy hosting, and some other providers.

In your MODX config file add the setting _use\_flock_ in your $config\_options array, and set it to false.

See Original Post: <http://forums.modx.com/thread/78611/core-cache-file-locks-and-will-not-update#dis-post-434053>

### 3.2 General Snippet Problems

If you find a snippet and/or plugin isn't working properly despite the correct code, double check that it has been installed.
