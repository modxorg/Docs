---
title: "Rampart"
_old_id: "697"
_old_uri: "revo/rampart"
---

## What is Rampart?

Rampart is a robust anti-spam tool for MODX Revolution. It can be used to help prevent spam registrations and postings on your MODX Revolution site, as well as provides DNS blacklisting. It can also currently be integrated into either the [Register](/extras/login/login.register "Login.Register") snippet, [Quip](/extras/quip "Quip") comments, or into any [FormIt](/extras/formit "FormIt")-powered form.

## Requirements

- MODx Revolution 2.0.7 or later
- PHP5 or later
- mcrypt PHP extension
- [Login](/extras/login "Login") Extra, version 1.5.2 or later

## History

Rampart was written by [Shaun McCormick](/display/~splittingred) and first released on January 26th, 2011.

### Download

It can be downloaded from within the MODx Revolution manager via \[Package Management\], or from the MODx Extras Repository, here: <http://modx.com/extras/package/rampart>

### Development and Bug Reporting

Rampart is stored and developed in GitHub, and can be found here:<http://github.com/splittingred/Rampart>

Bugs can be filed here: <http://bugs.modx.com/projects/Rampart> - The Roadmap for Rampart can also be viewed here.

## Usage

Rampart currently comes with 3 Snippets:

- [preHook.RampartRegister](/extras/rampart/rampart.prehook.rampartregister "Rampart.preHook.RampartRegister") - Handles spam prevention when using the [Register](/extras/login/login.register "Login.Register") snippet.
- [hook.RampartFormIt](/extras/rampart/rampart.hook.rampartformit "Rampart.hook.RampartFormIt") - Hook that can be used to integrate Rampart into any FormIt-based form.
- [hook.RampartQuip](/extras/rampart/rampart.hook.rampartquip "Rampart.hook.RampartQuip") - Hook that can be used to integrate Rampart into Quip comments.

It also comes with a Custom Manager Page, where you can manage your banlist, moderate flagged users, and view attempts your bans caught.

### Enabling Project Honey Pot DNS Blacklisting

Rampart comes with integration for [Project Honey Pot](http://www.projecthoneypot.org), a anti-spam service that prevents spam harvesters and comment spammers access to your site entirely. Through the RampartWall plugin, Rampart will completely prevent access to your site for IPs flagged by Project Honey Pot, and will automatically add them to the Rampart Ban list.

You can enable the HoneyPot integration by setting the appropriate values for the following System Settings:

- rampart.honeypot.access\_key - Set this to your Access Key you received for your HoneyPot account. This is required for the integration to work.
- rampart.honeypot.enabled - When you've setup your Access Key, set this to 'Yes' to enable the HoneyPot integration. You can set this to 'No' at any time to disable HoneyPot checks.

## See Also

1. [Rampart.hook.RampartFormIt](/extras/rampart/rampart.hook.rampartformit)
2. [Rampart.hook.RampartQuip](/extras/rampart/rampart.hook.rampartquip)
3. [Rampart.preHook.RampartRegister](/extras/rampart/rampart.prehook.rampartregister)