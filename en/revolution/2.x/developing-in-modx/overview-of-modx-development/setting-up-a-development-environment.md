---
title: "Setting up a Development Environment"
_old_id: "282"
_old_uri: "2.x/developing-in-modx/overview-of-modx-development/setting-up-a-development-environment"
---

Recommended Development Tools and Environments for MODx Revolution
------------------------------------------------------------------

In developing MODx Revolution, the MODx Team has found the following environments invaluable:

### PhpStorm

- Learn more about PhpStorm at <http://www.jetbrains.com/phpstorm/>

### Netbeans

- Netbeans 6.8
- Netbeans Subversion and JIRA plugins

### Eclipse 3.6 Helios and EclipsePDT

<div class="note">Currently phpEclipse appears to have issues running under Helios</div>- Install [Eclipse IDE for Java EE Developers](http://www.eclipse.org/downloads/packages/eclipse-ide-java-ee-developers/heliosr)
  - This will give you the Web Tools Platform in a single step
- Start up Eclipse 
  - At this point it is not suggested to use a previous workspace with live projects
  - For this install we simply selected the default (and empty) workspace, which was located in the current user space
- Go to the Help menu | Install New Software
- **Select "-****<del>All Additional Sites</del>**-" from the "Work with:" drop down 
  - Wait for the site list to populate the display
- **Open the "Programming Languages"** category
- **Select "PHP Development Tools"**
  - Install all suggested software
  - -- Alternately you can directly install the **[PDT tools in a much smaller package](http://www.eclipse.org/downloads/packages/eclipse-php-developers/heliosr)**
- **Restart Eclipse**
- At this point you can start importing sites into the workspace

<div class="note">Note: With the MODx project being housed on [github.com/modxcms](http://github.com/modxcms) there is an additional and optional eclipse project [eGit](http://www.eclipse.org/egit/) you may also wish to install. opengeek (Jason Coward) strongly suggests learning and using git from the <ins>command line</ins> to maximize your flexibility and potential. It may also be suggested to set up a local git repo and simply clone the respective MODx and xPDO repositories, working from local copies. SVN is discouraged from continued usage in regards to future MODx related development. Additional suggestions: Install your IDE in a location which is static and remains consistent for long periods of time. You may also want to isolate your workspace to a dedicated partition/drive, especially in operating systems (such as Soalris, Linux, and Mac OS) which do not require erasure/formatting of the entire drive to install. By placing the development tools and projects in dedicated spaces it will be much easier to make backups and to get back to work in the case of a system install.

It is not advised to install Eclipse and point to a workspace with existing projects, as many of its internal system settings (such as repos and file type associations with specific tools) are stored in the workspace and may actually inadvertently cause issues if an alternate tool is being used in place of an older one.

</div>### Eclipse versions before 3.6

- Eclipse 3.2.+ (recommend latest 3.5.1)
- Web Standard Tools Project (WST) 2.0.1 (<http://download.eclipse.org/webtools/updates/>)
- Subclipse 1.6.5 ([http://subclipse.tigris.org/update\_1.6.x](http://subclipse.tigris.org/update_1.6.x))
- PHPEclipse 1.2.3 (<http://update.phpeclipse.net/update/nightly>)
- Spket IDE 1.6.18 (<http://spket.com/update/>)

### Installation

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

### Other IDEs

For Mac:

- [TextMate](http://macromates.com/) - IDE
- [Coda](http://www.panic.com/coda/) - IDE
- [Versions](http://versionsapp.com/) - SVN client
- [svnX](http://www.lachoseinteractive.net/en/community/subversion/svnx/) - SVN client

For PC:

- [UltraEdit](http://www.ultraedit.com/) - IDE
- [E](http://www.e-texteditor.com/) - IDE
- [TortoiseSVN](http://tortoisesvn.tigris.org/) - SVN client
- [Kate](http://kate-editor.org/ "a MDI text editor application (Linux)") - IDE for Linux / KDE

Development Server Environments
-------------------------------

We also MacPorts, XAMPP and MAMP, and the following tools/libraries in the development of MODx Revolution:

- **PHPUnit** - this drives the PHP 5.1+ unit testing framework for xPDO, and we'll be adding a test harness to MODx soon
- **SimpleTest** - this drives the PHP 4/5.0.x unit testing framework for xPDO, and we'll be adding a test harness to MODx soon
- **PHPDocumentor** - all of the classes in MODx Revolution are documented in PHPDoc format, and we'll be developing tutorials and other extended documentation for inclusion in the PHPDocs in DocBook XML format
- **Phing** - will be used to allow automation of nightly builds, various distribution builds, unit testing, and many other development tasks