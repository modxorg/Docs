---
title: "Multilingual site with migxMultiLang"
_old_id: "1731"
_old_uri: "2.x/case-studies-and-tutorials/create-a-multilingual-website-with-migxmultilang"
---

## Introduction

migxMultiLang is an extra that allows you to quite easily create a multilingual website without the need for additional contexts or customizing the .htaccess file.

It was written by Bruno Perner and his documentation can be found at <https://github.com/Bruno17/migxmultilang>. This tutorial is an attempt to detail the initial basic setup of migxMultiLang with screenshots of the process.

Thanks to Bruno Perner and Susan Ottwell for helping me initially work this out!

## Requirements

migxMultiLang is built on the MIGX and pdoTools extras and requires both to be installed to function. The screenshots in this tutorial show MODX Revolution 2.3.2, however it will also work with previous versions. This tutorial also assumes you have a fresh working MODX install.

**Please also be aware that Friendly URLs must be enabled for this extra to work!**

## Step 1: Install the Extras

Click on "Installer" in the Extras menu at the top.

![](/download/attachments/7be5a431a826c4c2097f6e6bdd67b307/1modified.png)

Click on the "Download Extras" button.

![](/download/attachments/7be5a431a826c4c2097f6e6bdd67b307/2modified.png)

Search for and download:

- migx
- pdotools
- migxmultilang

Install them all leaving migxMultiLang for last.

When installing migxMultiLang, you will be asked if you want to place it in the top navigation bar or the Extras drop-down menu. See the below screenshot. This is completely up to your personal preference and can be changed easily later on in the MODX 'Menus' control panel if you happen to change your mind.

![](/download/attachments/7be5a431a826c4c2097f6e6bdd67b307/3modified.png)

If you chose to install migxMultiLang in the Extras menu, you should see it when you open the menu now.

![](/download/attachments/7be5a431a826c4c2097f6e6bdd67b307/4modified.png)

### Step 2: Add Your Languages

Select migxMultiLang from the Extras menu (or the Top Nav Bar if you elected to place it there).

You will see a page with three tabs at the top. The first tab is "Languages" and this is where we want to be.

Click on the "Add Language" button. We will be doing this twice because in this tutorial we will only be using two languages, however you can theoretically use as many as you like.

![](/download/attachments/7be5a431a826c4c2097f6e6bdd67b307/5modified.png)

Clicking on the Add Language button will open a MIGx window with three fields: Language, Lang Key and Lang Direction.

The first is the name of your language. We will be adding "English" as our first language so we enter that in the first field.

The second field holds the language key migxMultiLang will use to switch languages. We will enter "en" as the key.

English goes from left to right so the third field can be left as "ltr".

![](/download/attachments/7be5a431a826c4c2097f6e6bdd67b307/6modified.png)

Click on the "Done" button down the bottom to save and close the window.

Now we will repeat the process to add the second language.

Again, click the "Add Language" button which will open the same window.

This time we will add Chinese. (Or whichever language takes your fancy)

In the Language field enter 中文. (Copy and paste the Chinese characters from here or just write "Chinese" instead)

In the Lang Key field enter "zh".

Keep the Lang Direction field "ltr".

![](/download/attachments/7be5a431a826c4c2097f6e6bdd67b307/7modified.png)

Again, click the Done button to save and close the window.

Under the Languages tab you will see your newly added languages.

### Step 3: Creating the Template Variables

We are now finished with the Languages tab.

Click on the "Form Manager" tab at the top and then click on the "Import Configurations" button.

![](/download/attachments/7be5a431a826c4c2097f6e6bdd67b307/8modified.png)

You will see an example configuration appear in the grid. You may like to duplicate it and create your own, however for this tutorial we will just go with the example.

Click on the "Edit" button as we need to make some changes to the configuration.

![](/download/attachments/7be5a431a826c4c2097f6e6bdd67b307/9modified.png)

Clicking on the Edit button will bring up a window with two tabs: "Form" and "Settings".

Click on the Settings tab and then check "Use as Default Formtabs for all other templates".

![](/download/attachments/7be5a431a826c4c2097f6e6bdd67b307/10modified2.png)

Click Done and the window should save and close.

Now that we have changed the configuration, we need to create the TVs.

Click on the "Create TVs" button that is right near the Edit button we pressed before.

![](/download/attachments/7be5a431a826c4c2097f6e6bdd67b307/11modified.png)

If you now have a look in the Template Variables section of your Elements tree, you'll see the newly created TVs.

- mml\_content
- mml\_introtext
- mml\_longtitle
- mml\_menutitle
- mml\_pagetitle

These are the migxMultiLang versions of the typical fields on a resource.

![](/download/attachments/7be5a431a826c4c2097f6e6bdd67b307/12modified.png)

We now need to create the main translation Template Variable.

First, create a new category by clicking on the "New Category" icon at the top of the Elements tree.

A New Category window will appear. Name it "Translations" and click the Save button.

![](/download/attachments/7be5a431a826c4c2097f6e6bdd67b307/13modified.png)

Now click on the "New TV" icon at the top of the Elements tree and a new page will be displayed.

Enter the following info into the fields displayed.

Name - translations

Caption - Translations

Description - Enter the translations for this resource here:

Category - Translations

![](/download/attachments/7be5a431a826c4c2097f6e6bdd67b307/14modified.png)

Once that information has been entered, click on the "Input Options" tab at the top.

The Input Type should be:

`migxdb`

The Configurations should be:

``` php
mml_translations:migxmultilang,mml_translate:migxmultilang
```

![](/download/attachments/7be5a431a826c4c2097f6e6bdd67b307/15modified.png)

Ok, we are almost done with this. Now click on the "Template Access" tab at the top.

Check the box in the "Access" column for the BaseTemplate.

Now click the Save button up the top right.

![](/download/attachments/7be5a431a826c4c2097f6e6bdd67b307/16modified.png)

Now go to your resource tree and select a resource using the BaseTemplate. In our case we only have the Home resource.

Select the Template Variable tab on the resource and you will see the TV we just created.

![](/download/attachments/7be5a431a826c4c2097f6e6bdd67b307/17modified.png)

Translations won't work yet though, there are still a few things we need to do.

## Step 4: System Settings

Go into the MODX System Settings. For those that don't know, you can find it at the top right of the screen in the drop-down menu with the cog icon.

Select pdotools from the combo-box and you will see two settings appear.

There is a setting with the name of: FQN of pdoFetch. Change the value of this setting to `pdotools.mmlfetch`

![](/download/attachments/7be5a431a826c4c2097f6e6bdd67b307/21modified.png)

Excellent! This step is complete.

Note for newer versions of pdoTools:
you will need this system-settings:

pdoFetch.class: migxmultilang.mmlfetch
pdofetch\_class\_path: {core\_path}components/migxmultilang/model/

## Step 5: Create Database Tables

Select MIGX from the Extras menu at the top.

The MIGX Package Manager will appear.

In the field "Package Name", type: `migxmultilang`

![](/download/attachments/7be5a431a826c4c2097f6e6bdd67b307/22modified.png)

Now select the "create Tables" tab below that.

There will only be one button under this tab named "create Tables". Click it.

It should tell you the tables were created successfully.

![](/download/attachments/7be5a431a826c4c2097f6e6bdd67b307/23modified.png)

## Step 6: Creating the Templates For The Front End

migxMultiLang changes the way we use templates if we want more than one language available for a particular resource.

We are going to move the contents of the BaseTemplate into a chunk which we will name MainTpl for the sake of simplicity.

In the elements tree, open up the BaseTemplate and copy the contents.

Create the new MainTpl chunk and paste the copied contents in.

Save the MainTpl chunk and then open up the BaseTemplate again.

Delete everything in the "Template Code (HTML)" area and then paste in the following code:

``` php
[[!mmlCache?
&element=`pdoResources`
&parents=`0` 
&resources=`[[*id]]` 
&tpl=`MainTpl` 
&includeTVs=`[[mmlGetTemplateTVs]]` 
&prepareTVs=`1` 
&processTVs=`1`
&tvPrefix=`` 
&loadModels=`migxmultilang`
&prepareSnippet = `mmlTranslatePdoToolsRow`
]]

```

If you named your chunk anything other than "MainTpl", make sure you update the &tpl argument.

![](/download/attachments/7be5a431a826c4c2097f6e6bdd67b307/18modified.png)

The BaseTemplate is now ready to load your MainTpl chunk as though it were the template.

We now need to go and put some tags into the chunk so we can choose languages from the front end.

Open up the MainTpl chunk.

migxMultiLang comes with a snippet called `mml_LangLinks` and we are going to add this to our chunk.

Here is a very simple example of a possible MainTpl chunk:

``` html
<!doctype html>
<html lang="en">
<head>
<meta charset="[[++modx_charset]]">
<title>[[++site_name]] - [[+mml_pagetitle]]</title>
<base href="[[++site_url]]">
</head>
<body>
[[+mml_pagetitle]]
[[!mml_LangLinks]]
</body>

```

Besides the normal MODX tags in the head section, you can see I've added `[[+mml_pagetitle]]` and `[[!mml_LangLinks]]`.

`[[+mml_pagetitle]]` references one of the initial TVs we created and will hold both versions of the resource name.

Save the chunk!

Now it's time to go and enter the translations.

Go back to the "Template Variables" tab on the Home resource and you will see the different languages and an "Edit" button for each.

Click on the English edit button. An English editing window will pop up.

In the `Pagetitle` field enter: `This is the English version.`

Click Done and then open the Chinese editing window.

In the `Pagetitle` field enter: `This is the Chinese version.`

Click Done.

It's time to go and have a look at the front end of your website.

## Step 7: Test it!

We set English as our default language so that's the one that appears first.

Your page should look like this:

![](/download/attachments/7be5a431a826c4c2097f6e6bdd67b307/test.png)

If you click on the Chinese link the text will change to "This is the Chinese Version".

The initial setup is complete!

It is easy to add your own TVs that will also be translated.

Form customization can be used to bring the translation TVs to the main resource page if you wish too.

This tutorial was just to show how to get the simplest form of migxMultiLang up and running.

I plan on adding to this soon to show how it can be used in different situations and encourage others to as well.

In the mean time, Bruno has a more complex template example up in the documentation: <https://github.com/Bruno17/migxmultilang>
