---
title: "Babel"
_old_id: "605"
_old_uri: "revo/babel"
---

## What is Babel?

Babel is an Extra for MODx Revolution that helps you managing your multilingual websites using different contexts. Babel even supports managing several different multilingual websites within one MODx instance by using so called context groups.

Babel maintains links between translated resources. In the manager you can use the Babel Box to easily switch between the different language versions of your resources. Translations can be created automatically by Babel or defined manually.

Additionally Babel can be used to synchronize certain template variables (TVs) of translated resources which should be the same in every context (language).

For detailed information about Babel check out the [Offical Babel project website: Multilingual websites with MODX](http://www.multilingual-modx.com/).

## History

Babel has been developed by Jakob Class based on ideas of Sylvain Aerni and first released on December 16th, 2010.

## Development and Bug Reporting 

Babel is stored and developed in GitHub, and can be found here: <https://github.com/mikrobi/babel>

Bugs can be filed here: <https://github.com/mikrobi/babel/issues>

## Installation

### Preparations

Create a context for each language and set the cultureKey and site\_url settings according to your needs. You may have a look at our [tutorial to setup your multilingual site(s)](http://www.multilingual-modx.com/blog/2011/multilingual-websites-with-modx-and-babel.html).

Be sure that your context switches work well.

### Download

babel can be downloaded from within the MODx Revolution manager via [Package Management](developing-in-modx/advanced-development/package-management "Package Management"), or from the MODx Extras Repository, here: <http://modxcms.com/extras/package/781>

### Setup

Install Babel via the package manager and set the system settings for Babel via the form displayed during setup:

[![](/download/thumbnails/33587248/babel-setup.PNG)](/download/attachments/33587248/babel-setup.PNG)

- **Context Keys** (_babel.contextKeys_): Comma separated list of context keys which should be used to link multilingual resources. 
  For advanced configuration you may define several groups of context keys by using a semicolon (;) as delimiter. This is usefull if your're administrating multiple multilingual sites within one MODx instance. 
  Example scenario: 
  - **site1**: en, de, fr. using contexts: _web, site1de, site1fr_
  - **site2**: en, de. using contexts: _site2en, site2de_

You would set _babel.contextKeys_ to "_web_**_,_**_site1de_**_,_**_site1fr_**_;_**_site2en_**_,_**_site2de_".

- **Name of Babel TV** (_babel.babelTvName_): Name of template variable (TV) in which Babel will store the links between multilingual resources. This TV will be maintained by Babel. Please don't change this TV manually otherwhise your translation links may be broken.
- **IDs of TVs to be synchronized** (_babel.syncTvs_): Comma separated list of ids of template variables (TVs) which should be synchronized by Babel.

## How to Use

When you open a resource for editing, the Babel Box will be displayed on top of the resource form. There will be button-like links for each language (context) you have defined in the babel.contextKeys system setting.

[![](/download/thumbnails/33587248/babel.PNG)](/download/attachments/33587248/babel.PNG)

The buttons may have three different colors according to their state:

- **Black**: Language of the currently displayed resource.
- **Green**: Language for which a translated resource is defined.
- **Light Gray**: Language for which no translation has been created or defined yet.

By clicking on the (green) language buttons you can easily switch between the different language versions of your resources.

If there are no translations defined for certain language (gray button), mousover the language's button: a layer appears where you can tell Babel to create a translation of the current resource or you can set the translation link to an existing resource manually by entering the ID of the translated resource.

[![](/download/thumbnails/33587248/babel-translate.PNG)](/download/attachments/33587248/babel-translate.PNG)

When clicking on "Create Translation" Babel will create a new resource in the language's context and copy all the content of the current resource to the newly created resource. You now can translated all the content and TVs and publish the translated resource.

If you'd like to remove a translation link, just mouseover the (green) language button: a layer appears where you can click on "Unlink translation" button to remove the translation link to this language.

[![](/download/thumbnails/33587248/babel-unlink.PNG)](/download/attachments/33587248/babel-unlink.PNG)

### Snippets

Currently there are two snippets available for Babel: [BabelLinks](/extras/babel/babel.babellinks "Babel.BabelLinks") and [BabelTranslation](/extras/babel/babel.babeltranslation "Babel.BabelTranslation").

## Change Babel Settings after Installation

You may change your Babel settings after setup. For example if you want to define a new TV which should be synchronized or add a new context. For doing this go to System/Settings in your MODx manager and select the babel namespace. Now you can edit all Babel related settings:

[![](/download/thumbnails/33587248/babel-settings.PNG)](/download/attachments/33587248/babel-settings.PNG)

## See Also

1. [Babel.BabelLinks](/extras/babel/babel.babellinks)
2. [Babel.BabelTranslation](/extras/babel/babel.babeltranslation)

[Offical Babel project website: Multilingual websites with MODX](http://www.multilingual-modx.com/)