---
title: "Discuss.Installation from Git"
_old_id: "828"
_old_uri: "revo/discuss/discuss.installation/discuss.installation-from-git"
---

In order to work with Discuss from Git, there are a few extra steps we will need to take.

## 1. Fork & Clone

Discuss is maintained on Github and to properly allow external contributions, we will need you to fork the main repository and clone it to your local environment. If you are new to Git, please follow the [interactive Git tutorial on Github](http://try.github.com) to get started. Next, if you don't already have a fork and/or local clone, follow these simple steps:

1. Go to <http://github.com/modxcms/Discuss>
2. Click the "Fork" button to create a fork on your own account
3. Clone it to your local environment using the following command on terminal: 
  git clone git@github.com:**username**/Discuss.git 
  this will create a Discuss directory in the directory you were at with the contents of the Discuss repository. You will want to make sure this is in a web accessible directory but that is not in your MODX directory.
4. Checkout the proper branch using `git checkout <branch>`. This will likely be "develop", a theme or a release branch depending on your intentions. Please see the [Discuss Contributions Guidelines](extras/discuss/discuss.contributing "Discuss.Contributing") docs for more info on picking the right branch.

Next, we'll need to build a package to install. This will help you kickstart your forum and takes away lots of manual configuration.

## 2. Build a Package

Open your Discuss folder.

Duplicate \_build/build.config.sample.php to \_build/build.config.php and adjust the MODX\_BASE\_PATH definition to point to your MODX Revolution (2.2+) installation. This can be relative as in the sample, or as an absolute path, whatever works for you.

Next, run the \_build/build.transport.php file. You can do this on the terminal with `php \_build/build.transport.php` or by visiting the file in the browser. This shouldn't throw errors. If all went well, the package has been created in the core/packages directory of the MODX installation you pointed your build.config.php at.

## 3. Install Discuss from package

[Follow the Installation instructions to set up your forum](extras/discuss/discuss.installation "Discuss.Installation").

## 4. Hook up your versioned Discuss Repository to your Forum

Now that you installed Discuss, all system settings have been created, all elements are in place and you are ready to start building.. almost.

To make sure that Discuss actually uses your source (which is stored out of the MODX directory), we need to add and alter some settings.

1. Change the "discuss' Namespace in System > Namespaces to point to /path/to/Discuss/core/components/discuss/
2. In System > System Settings, add a discuss.core\_path setting to point to /path/to/Discuss/core/components/discuss/
3. Add a discuss.assets\_path setting to point to /path/to/Discuss/assets/components/discuss/
4. Add a discuss.assets\_url setting to point to <http://localhost/path/to/Discuss/assets/components/discuss/>

And that should do it for the most part.

If you will be working on any of the installed snippets, you will want to set these up as static snippets as well.

1. Create a new media source pointing to your versioned Discuss directory
2. Edit the created snippets, mark them as static, and choose the corresponding file in path/to/versioned/Discuss/core/components/discuss/elements/snippets/ and save the page. 
  Again, you only need to do that when you are changing snippet code.

## 5. Have fun. 

That's it!

You may want to know that there's some quite intensive caching going on. If you're changing anything in the core including the "hooks" in core/components/discuss/hooks/, you may notice that changes aren't reflected, forcing you to clear the MODX cache or the core/cache/discuss directory specifically.