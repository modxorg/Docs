---
title: "BotBlockX"
_old_id: "1764"
_old_uri: "revo/botblockx"
---

## What is BotBlockX?

BotBlockX is based on Alex Kemp's [classic bot-blocking routine](http://download.modem-help.co.uk/non-modem/PHP/Rogue-Bot-Blocking/ "Classic bot blocking script"). I have rewritten it for MODX Revolution and added a few tweaks, but the heart of it is Alex's original code.

The default install of this plugin will block badly behaved bots (both slow and fast), while leaving good bots like Google alone. Bad bots will also be noted in the log file.

BotBlockX creates a lot of files in the block/ directory, but they are all zero-length files so they shouldn't count as resources on your site. This is possible because of Alex's ingenious use of the files' modification time and access time to store information about the visitor's behavior. Both the block/ directory and the logs/ directory are placed directly under the MODX core directory to speed up access time.

## Package Information

- Downloads: 1,494
- License: GPLv2
- Requires: Revolution 2.0.x or greater
- Supports: mysql,sqlsrv

## History

- Author: Alex Kemp [bot-block](http://biostatisticien.eu/www.searchlores.org/bot-block.php.txt)
- Author: Bob Ray [Bob's Guides](http://bobsguides.com)

 This version of the BotBlockX extra was developed by Bob Ray. It was first posted to GitHub on Oct 28, 2011. As of Jun 22, 2017 it had been last updated on Jun 12, 2017, had 51 commits, and had been downloaded 1,494 times. The BotBlockX package consists of 296 separate files, containing 8,988 lines of code.

It is currently maintained by Bob Ray.

## Download

 BotBlockX can be downloaded and installed from within the MODX Revolution Manager via [Package Manager](developing-in-modx/advanced-development/package-management "Package Manager") (Extras -> Installer), or from the [MODX Extras Repository](https://modx.com/extras/package/botblockx).

## Development and Bug Reporting 

 BotBlockX is stored and developed using GitHub, and can be found here: [BotBlockX GitHub main page](https://github.com/BobRay/BotBlockX).

 Bugs and feature requests can be filed here: [BotBlockX issues page.](https://github.com/BobRay/BotBlockX/issues).

Questions about how to use BotBlockX should be posted on the [MODX Forums](https://forums.modx.com).

## Documentation

 The full documentation for BotBlockX can be found at the author's web site (Bob's Guides): [BotBlockX Documentation](https://bobsguides.com/botblockx-tutorial.html).