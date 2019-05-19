---
title: "Git Basics"
translation: "extending-modx/creating-components/git-basics"
---

We finish with preparation for the beginning of active development.

Today we need to upload the stub to the server, rename it, create a repository on GitHub and send the first commit to it. And for this you will need to configure PhpStorm to work with git.

## Server synchronization

After we connected our local project with a remote server, new items in the context menu appeared in PhpStorm:

![](/2.x/ru/extending-modx/creating-components/git-basics-1.jpg)

* Upload files to server
* Download files from server
* Sync remote and local files

It is important to understand that the first and second points can **overwrite existing files**, so they should be used very carefully.
Basically, it is better to use synchronization - it will show the differences in the files and allow you to select actions with them. However, there is a drawback - when you synchronize, you need to read all deleted files, and this takes time. It is good that PhpStorm allows you to synchronize not only the entire project, but also each individual directory, and even a file.

We upload the project for the first time, there is nothing to overwrite there - so feel free to click **Upload to MODXCloud**. After that, you can check the presence of files in the admin panel.

![](/2.x/ru/extending-modx/creating-components/git-basics-2.png)

![](/2.x/ru/extending-modx/creating-components/git-basics-3.png)

Now we need to rename the modExtra stub into Sendex. To do this, use the `rename_it.php` script. On my server, the link is this:

``` php
http://c2263.paas2.ams.modxcloud.com/Sendex/rename_it.php
```

If you open it without parameters, the script requires you to specify a new name:

``` php
You need to specify a new name of component in this file on line 9, or send it via $_GET["name"].
```

OK, change the link and show the new name:

``` php
http://c2263.paas2.ams.modxcloud.com/Sendex/rename_it.php?name=Sendex
```

We see a bunch of incomprehensible lines (in fact, these are new names for files and directories), which means that the workpiece has been successfully renamed, and now it is a real component.

We can even assemble and install it right now, but then it will create us unnecessary demo tables in the database, so we will do this after writing our own schema and generating the model.

In the admin panel you can already see new files, but in the project everything is as before. So they need to be synchronized. Given that we have not changed anything in the local project, you can click **Download from MODXCloud** - the IDE will warn you that it can overwrite files. Thank you, we know.

![](/2.x/ru/extending-modx/creating-components/git-basics-4.png)

![](/2.x/ru/extending-modx/creating-components/git-basics-5.png)

![](/2.x/ru/extending-modx/creating-components/git-basics-6.png)

Now delete the old unnecessary files and directories:

* `/core/components/modextra/`
* `/assets/components/modextra/`
* `rename_it.php`
* `rename_it.sh`

If you prudently activate the Automatic upload item in the Deployment settings, then all changes will be synchronized immediately:

![](/2.x/ru/extending-modx/creating-components/git-basics-7.png)

Please remember that automatic synchronization works in one direction - from the local computer to the server. If you edit project files through the site admin panel - you need to synchronize these changes manually.

Well, now our project is ready for the first commit on GitHub.

## Work with GitHub

Generally, this clause is optional. Nobody forces you to keep a history of file changes, accept error messages and suggestions for code changes.

You can safely keep everything in your computer and not bother with these repositories of yours. However, a good programmer always keeps the project clean and tidy, communicates with his users and remembers that when he changed in his code. I am silent about the fact that the repository on the Internet is an excellent backup.

Therefore [register on GitHub](https://github.com/join) and [download their app](http://windows.github.com/). On the one hand, the application is not necessary, but on the other hand, it will install the console git, which we really need.

After installation, go back to PhpStorm and run to the settings. There is a search in which we enter git and see the matches:

![](/2.x/ru/extending-modx/creating-components/git-basics-8.png)

We enter and check the access data on GitHub, and then specify and check the path to the git executable file (I don’t know where it will be on Windows - I’ll have to search).

If you haven’t deleted the `Sendex/.git` directory, now is the time to do it, because we need to create a new local repository.

Click on the menu **VCS → Enable version control**, select git and save.

![](/2.x/ru/extending-modx/creating-components/git-basics-9.png)

![](/2.x/ru/extending-modx/creating-components/git-basics-10.png)

![](/2.x/ru/extending-modx/creating-components/git-basics-11.png)

All files turned brown, which means that they are not added to the repository. We need to add them through the context menu, in which a new Git item has appeared, and they will turn green.

![](/2.x/ru/extending-modx/creating-components/git-basics-12.png)

![](/2.x/ru/extending-modx/creating-components/git-basics-13.png)

Probably, it is time to briefly tell you what is a version control system? Roughly speaking, any version control system is a program that stores changes to your files, with the ability to roll back. There are a lot of systems, but the most popular is now [Git](http://ru.wikipedia.org/wiki/Git), which came up with [Linus Torvalds](http://ru.wikipedia.org/wiki/%D2%EE%F0%E2%E0%EB%FC%E4%F1,_%CB%E8%ED%F3%F1) for developing the Linux kernel.

The main difference from competitors is the convenient creation of branches and their merging. That is, for each change you can create a new branch, chemize something there, and then inject these changes into the main project, resolving conflicts (if any).

If you have never worked with this, it may be difficult to enter. Therefore, I advise you to read here [this tutorial](http://githowto.com/ru/git_how_to), everything is well described there. Please note that there is knowledge of how to work with Git in the command line, and I show the same thing only in PhpStorm.

**Once again I remind**, it is not at all necessary to develop add-ons in MODX - it is just a useful skill that can make your life much easier.

Another difference with Git is the storage format. It does not climb into your files, saving everything you need in one directory **. Git **. In fact, `Sendex/.git` is the repository. That is why we needed to delete the old directory, which was the modExtra repository.

Now we have created a new, clean Git repository, in which no changes have been saved. This repository is **local**, it is not yet attached to GitHub, but is fully operational. You can copy the project to a USB flash drive, carry it back and forth and at the same time its history of changes will be there.

To exclude files or directories from the version control system, the `.gitignore` file is used, and we need to add this to the repository root:
`.idea`
Thus, we disable the tracking of the PhpStorm service directory within the project.

Convenient, isn't it? So why do you need GitHub? But then, to link all your computers, flash drives and other storage of a single project. GitHub **can be called the central repository of code**. Currently, he hosts a huge number of projects that are developed by different people, and all this does not turn into chaos. By the way, [MODX is developed in the same place](https://github.com/modxcms/revolution/).

The **README.md** file at the root of the project will serve as a brief description, so I changed it a bit and now you can make the first commit, that is, fix the code. It will be like a save point, to which we can then roll back, if that.

PhpStorm makes it easy. Open the **Changes** tab at the bottom of the IDE, and select **Commit changes** in the context menu. before sending changes to the IDE repository, shows us all the changed files (and this is the whole project now), and asks to enter a description of the changes.

![](/2.x/ru/extending-modx/creating-components/git-basics-14.png)

![](/2.x/ru/extending-modx/creating-components/git-basics-15.png)

There are no changes in the first commit, so we write “First commit”. Next, click commit and ignore error warnings in the code - it hurts too clever this PhpStorm! On the tab **Version control** there will be a log of Git work - well, suddenly, I wonder?

Everything, changes are saved in our local repository, and from this point on each change of the project file it will turn blue. This means that changes have been made to it that were not saved in the repository — you need to commit it.

![](/2.x/ru/extending-modx/creating-components/git-basics-17.png)

Well, now we just have to link our remote project with GitHub and send changes to it so that everyone can see them. Unfortunately, I did not find how to do this directly in PhpStorm, so I’ll have to go through the command line.

There is nothing terrible in this, because we still need to first create a new project on Github - and he will already tell you what commands you need to enter.

![](/2.x/ru/extending-modx/creating-components/git-basics-18.png)

![](/2.x/ru/extending-modx/creating-components/git-basics-19.png)

As you can see, to send the existing repository (and this is our case), you need to run in the command line:

``` php
git remote add origin https://github.com/bezumkin/Sendex.git
git push -u origin master
```

Moreover, the second team can be run already from PhpStorm. Be sure to mark the **master** branch to which you want to send our commit:

![](/2.x/ru/extending-modx/creating-components/git-basics-20.png)

![](/2.x/ru/extending-modx/creating-components/git-basics-21.png)

Well here [our project and on GitHub](https://github.com/bezumkin/Sendex)! In theory, you can now make yourself forks (branches) and send me your commits, but that's enough for today.

You can also add a local repository to the GitHub client, and from there start it up to a remote server.

![](/2.x/ru/extending-modx/creating-components/git-basics-22.png)

![](/2.x/ru/extending-modx/creating-components/git-basics-23.png)

![](/2.x/ru/extending-modx/creating-components/git-basics-24.png)

Also a good option.

## Conclusion

Today we uploaded our project to the server, renamed, synchronized changes and added a version control system. We even uploaded our repository on GitHub, so that all interested could watch the progress of our course =)

At the next lesson, we think over the logic of the component, write a schema and generate a database model.
