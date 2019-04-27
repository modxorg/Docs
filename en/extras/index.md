---
title: "MODX Extras"
_old_id: "659"
_old_uri: "index"
---

In this section of the documentation you'll find information about extras for MODX Revolution. These extras (and their documentation) are made by third party developers, so are not officially supported.

## Where to find Extras

The official source of extras is **MODX.com**. You can [browse hundreds of (free) extras](https://modx.com/extras/) and every installation of MODX is already configured to [download and install extras from MODX.com through the package manager](building-sites/extras).

There are also third-party sources and marketplaces available, which typically offer a combination of free and premium extras. These include:

| Name                                                                        | # of extras          | Support                                                                           |
| --------------------------------------------------------------------------- | -------------------- | --------------------------------------------------------------------------------- |
| [modx.com/extras/](https://modx.com/extras/)                                | Over **800** add-ons | [Community forum](https://community.modx.com/)                                    |
| [modstore.pro](https://en.modstore.pro/) ([Russian](https://modstore.pro/)) | 100+ (EN), 300+ (RU) | [Community forum](https://modx.pro), and private ticketing for premium extras     |
| [modmore.com](https://www.modmore.com/extras/)                              | 20+                  | [Community forum](https://forum.modmore.com) and email support for premium extras |
| [extras.io](https://extras.io/extras/)                                      | 5                    | [Email support](https://extras.io/support/) for premium extras                    |
| [bobsguides.com](https://bobsguides.com/guide-to-packages.html)             | 47                   | [Email support for Bob Ray's extras](https://bobsguides.com/contact-form.html)    |

To use third party extra providers, you'll usually need to create an account in order to access their [Package Provider](building-sites/extras/providers). You can find more information on how to do that in the documentation for each of the mentioned vendors.

## Commonly used Extras

With almost 1000 extras available, it can be hard when getting started to determine which extras you should use. The extras in the following list are considered an excellent choice depending on your project requirements.

This does not mean however that these are your only options. Browse the repository, read the forums, and share interesting extras that you find with the community.

### Navigation and content

- [pdoTools](https://docs.modx.pro/en/components/pdotools) is a collection of useful snippets that aims to be a modern (and mostly drop-in) replacement for older (but still supported) extras:
  - [pdoResources](https://docs.modx.pro/en/components/pdotools/snippets/pdoresources) is the equivalent of [getResources](extras/getresources), which can be used to list resources. These can also be used for RSS feed or Sitemap generation.
  - [pdoMenu](https://docs.modx.pro/en/components/pdotools/snippets/pdomenu) is the equivalent of [Wayfinder](extras/wayfinder), which is used for generating (multi-level) menus from your resource tree.
  - [pdoPage](https://docs.modx.pro/en/components/pdotools/snippets/pdopage) is the equivalent of [getPage](extras/getpage), which wraps snippets like getResources/pdoResources with pagination capabilities
  - [pdoCrumbs](https://docs.modx.pro/en/components/pdotools/snippets/pdocrumbs) can be used in a similar way to [Breadcrumbs](extras/breadcrumbs) to create a breadcrumbs trail of the current resource.
- [getResourceField](extras/getresourcefield), [pdoField](https://docs.modx.pro/en/components/pdotools/snippets/pdofield) or [fastField](extras/fastfield) retrieve a single resource field.
- [AdvSearch](extras/advsearch) or [mSearch2](https://en.modstore.pro/packages/ecommerce/msearch2) (premium extra from modstore) adds a search function to your site
- [Collections](extras/collections) is used for large quantities of resources, such as blogs or product listings, and will list child resources in a grid instead of the tree
- [NewsPublisher](https://bobsguides.com/newspublisher-tutorial.html) allows users to create resources in the front-end without needing access to the MODX Manager (includes rich text editing and file/image browser).

### Rich text/code editing

- [TinyMCE RTE](https://modx.com/extras/package/tinymcerichtexteditor) is a rich text editor based on TinyMCE 4. (The package called simply [TinyMCE](https://modx.com/extras/package/tinymce) uses the older TinyMCE 3)
- [TinymceWrapper](https://modx.com/extras/package/tinymcewrapper) is a TinyMCE implementation using the latest version from CDN.
- [Redactor](https://www.modmore.com/redactor/) (premium extra by modmore) is a MODX integration of Redactor.
- [CKEditor](https://modx.com/extras/package/ckeditor) integrates the CKEditor RTE into MODX.
- [Ace](https://modx.com/extras/package/ace) enables code-editing on your elements in the manager.

### Media

- [Gallery](extras/gallery) can be used to add image albums to your site
- [MoreGallery](https://www.modmore.com/moregallery/) (premium extra by modmore) for managing image and video (YouTube/Vimeo) galleries, implemented as a special resource type

### Forms

- [FormIt](extras/formit) is the standard in handling form submissions
- Formalicious (premium extra available from [modmore](https://www.modmore.com/formalicious/) and [modstore](https://en.modstore.pro/packages/users/formalicious)) is a form builder based on FormIt
- [SPForm](https://bobsguides.com/spform-tutorial.html) simple, spam-proof contact form

### Multi-site, multi-lingual, multi-domain, contexts

- [xRouting](extras/xrouting) is a flexible context router that supports (sub)domains and directories with minimal configuration
- [LangRouter](extras/langrouter) is a context router that chooses the context based on the visitors' language
- [Babel](extras/babel) is used to connect translations in different contexts

### E-commerce

- [MiniShop2](https://modstore.pro/packages/ecommerce/minishop2) is a powerful open source ecommerce solution, with many (paid and free) extensions predominantly available from modstore
- [Commerce](https://www.modmore.com/commerce/) is a powerful premium ecommerce solution from modmore
- [SimpleCart](https://www.modmore.com/simplecart/) is a simpler premium ecommerce solution, originally built by OostDesign, now available from modmore

### Users

- [Login](extras/login) is a suite of tools to help you integrate front-end user functionality, including login and profiles.
- [HybridAuth](extras/hybridauth) can be used to let users login through social services
- [Personalize](extras/personalize) can show different chunks depending on if a user is logged in or not

### Blogging

- [Collections](extras/collections) to list child resources in a grid in the manager (instead of in the resource tree)
- [Quip](extras/quip) or [Tickets](https://docs.modx.pro/en/components/tickets) to add commenting functionality
- [Tagger](extras/tagger) to add tags you can filter and search posts by

### Versioning & Workflow

- [VersionX](extras/versionx) keeps a copy of changes to your resources and elements for an easy restore.
- [Preview](https://extras.io/extras/preview/) and [Workflow](https://extras.io/extras/workflow/) (premium extras from Extras.io) provide previews and publishing workflows.
- [MagicPreview](https://www.modmore.com/extras/magicpreview/) (free extra from modmore) gives you a preview button that allows you to see your resource changes, without the changes having to be saved.
- [StageCoach](https://bobsguides.com/stagecoach-tutorial.html) allows staging of page changes so they will be applied at a future date.

### Development tools

- [modDevTools](https://modx.com/extras/package/moddevtools) adds additional functionality to the manager to help developers building sites.
- [MyComponent](https://bobsguides.com/mycomponent-tutorial.html) is a complete development environment for creating MODX extras.

### Diagnostic tools

- [SiteCheck](https://bobsguides.com/sitecheck-tutorial.html) (premium extra from Bob Ray) performs thousands of checks on the integrity of your site.

### Updrading MODX

- [UpgradeMODX](https://bobsguides.com/upgrade-modx-package.html) allows you to upgrade MODX Revolution from within the MODX Manager.
- [GoRevo](https://bobsguides.com/why-choose-gorevo.html) (premium extra from Bob Ray) provides a tool for migrating from MODX Evolution to MODX Revolution.

## Distributing your own Extras

Go to <https://modx.com/extras/>, log in to your MODX account (or create one), then click on the button at the bottom to "Submit an Extra".

There you can upload a MODX [Transport Package](http://rtfm.modx.com/display/revolution20/Transport+Packages "Transport Packages"). This is a special kind of zip file that ensures that your add-on and all of its components are installed correctly on the target system. To make one, you need to create a [Build Script](http://rtfm.modx.com/display/revolution20/Creating+a+3rd+Party+Component+Build+Script "Creating a 3rd Party Component Build Script").

All extras hosted on MODX.com go through a basic review; it may take a couple of days for your submission to be processed.
