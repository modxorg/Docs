---
title: "Development Environments"
_old_id: "1129"
_old_uri: "contribute/becoming-a-contributor/development-environments"
note: "This page is old. Really old. Needs to be rewritten to explain how to set up a git-based version of MODX properly for development."
---

## Recommended Development Tools and Environments for MODX Revolution

In developing MODX, the team has found the following software and environments invaluable:

### Netbeans

- Netbeans 6.8
- Netbeans Git plugin

### Eclipse

- Eclipse 3.2.+ (recommend latest 3.5.1)
- Web Standard Tools Project (WST) 2.0.1 (<http://download.eclipse.org/webtools/updates/>)
- eGit
- PHPEclipse 1.2.3 (<http://update.phpeclipse.net/update/nightly>)
- Spket IDE 1.6.18 (<http://spket.com/update/>)

#### Eclipse Installation

- Simply install the latest Eclipse Classic
- Start up eclipse / select a workspace
- Use the Install Software option under the help menu
- Right click and copy each of the links above (doing them in order doesn't hurt)
- Click the "Add" button
- Name the "repo" WST, Subclipse, PHPEclipse, or Spket, as it relates to the URL
- Paste the URL
- Click OK
- Repeat for each of the links above as necessary
- Individual notes:
  - WST - select the latest Web Tools Platform (takes quite a while)
  - Subclipse - simply install the Subclipse option
  - PHPEclipse - install everything offered
  - Spket - Install everything offered

### Other Tools

For Mac:

- [PhpStorm](http://www.jetbrains.com/phpstorm/) - IDE
- [TextMate](http://macromates.com/) - IDE
- [Coda](http://www.panic.com/coda/) - IDE

For PC:

- [PhpStorm](http://www.jetbrains.com/phpstorm/) - IDE
- [UltraEdit](http://www.ultraedit.com/) - IDE
- [E](http://www.e-texteditor.com/) - IDE
- [msysgit](http://code.google.com/p/msysgit/) - git in a linux-like shell

For Linux:

- [PhpStorm](http://www.jetbrains.com/phpstorm/) - IDE
- [Kate](http://kate-editor.org/) - IDE for Linux / KDE

## Development Server Environments

We also use MacPorts, XAMPP and MAMP, and the following tools/libraries in the development of MODX Revolution:

- **PHPUnit** - this drives the PHP 5.1+ unit testing framework for xPDO, and we'll be adding a more robust test harness to MODX soon
- **PHPDocumentor** - all of the classes in MODX Revolution are documented in PHPDoc format, and we'll be developing tutorials and other extended documentation for inclusion in the PHPDocs in DocBook XML format
- **Phing** - will be used to allow automation of nightly builds, various distribution builds, unit testing, and many other development tasks
