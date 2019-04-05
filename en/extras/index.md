---
title: "MODX Extras"
_old_id: "659"
_old_uri: "index"
---

This is the home page for the MODx Extras documentation space.

  \[\[getResources@section-parents? &context=`extras`\]\] These Extras are not officially supported by MODx, nor is their representative documentation. If you would like more info or help on them, please contact their respective authors.

**Evolution or Revolution**
Please take a moment to ensure the extra being considered is for your specific MODx product (either Evolution or Revolution). Also, note the minimum required version indicated by the respective extra and that the installation of MODx being used meets or exceeds that requirement.

Documentors: Please prefix the name of your Add-On to your subpages. In other words, a subpage for the Quip Add-On would be Quip.SubPage

## <a name="Home-CreatingYourOwnAddOn"></a>Creating Your Own Add-On

Go to <http://modx.com/extras/>, log in to your MODX account (or create one), then click on the button at the bottom to "Submit an Extra". You can use whatever version control system that you want (you don't even _have_ to use version control if you don't want), but your extra **must** be packaged up into a MODX [Transport Package](http://rtfm.modx.com/display/revolution20/Transport+Packages "Transport Packages"). This is a special kind of zip file that ensures that your add-on and all of its components are installed correctly on the target system. To make one, you need to create a [Build Script](http://rtfm.modx.com/display/revolution20/Creating+a+3rd+Party+Component+Build+Script "Creating a 3rd Party Component Build Script"). See the related pages for more info.

## <a name="Home-Commonlyusedaddons%26nbsp%3B"></a>Commonly used addons 

For your convenience, below you will find a table with a list of the most commonly used addons for both Revolution and Evolution, per category. Please note that this list is manually maintained, and not all addons will be mentioned here. Please see the [Add-Ons Repository](http://modx.com/extras/) on the MODX Site for a complete list. The grid below displays addons that can be used in no specific order. Often addons are designed to be flexible and have many options, be sure to investigate which one suits your goals best.

 | Category | Revolution (2.x) | Evolution (1.x) |
|----------|------------------|-----------------|
| Navigation (menu, breadcrumbs) | [Wayfinder]([[~734]] "Wayfinder"), [Breadcrumbs]([[~611]] "Breadcrumbs"), [QuickCrumbs]([[~695]] "QuickCrumbs"), [getResources]([[~654]] "getResources") | [Wayfinder]([[~764]] "Wayfinder"), [Breadcrumbs]([[~611]] "Breadcrumbs"), [Ditto]([[~629]] "Ditto") |
| Multi-domain solutions (contexts) | [GatewayManager]([[~648]] "GatewayManager"), [ContextRouter]([[~622]] "ContextRouter") |  |
| Content listing | [getResources]([[~654]] "getResources"), [getPage]([[~651]] "getPage") (pagination), [getResourceField]([[~653]] "getResourceField"), [Rowboat]([[~702]] "Rowboat") | [Ditto]([[~629]] "Ditto"), getField |
| Galleries | [Gallery]([[~647]] "Gallery") | [MaxiGallery]([[~670]] "MaxiGallery"), [EvoGallery]([[~637]] "EvoGallery"), [Easy 2 Gallery]([[~632]] "Easy 2 Gallery") |
| Searching | [SimpleSearch]([[~711]] "SimpleSearch"), [getResources]([[~654]] "getResources"), [AdvSearch]([[~600]] "AdvSearch") | [AjaxSearch]([[~601]] "AjaxSearch") |
| Form processing | [FormIt]([[~644]] "FormIt") | [eForm]([[~633]] "eForm") |
| Multilingual solutions | [Babel]([[~605]] "Babel") | [YAMS]([[~738]] "YAMS") |
| Blogging | [Articles]([[~604]] "Articles") (full solution), [Quip]([[~696]] "Quip") (comments), [Archivist]([[~603]] "Archivist") (archives), [tagLister]([[~729]] "tagLister")(tagging) | Jot (comments), Reflect (archives) |
| User management | [Login]([[~668]] "Login"), [Peoples]([[~689]] "Peoples"), [Loginza]([[~669]] "Loginza"), [HybridAuth]([[~660]]) | [WebLoginPE]([[~736]] "WebLoginPE") |
| Revision history | [VersionX]([[~732]] "VersionX") | ContentHistory |
| eCommerce | [VisionCart]([[~733]] "VisionCart"), [SimpleCart](http://en.oostdesign.nl/simplecart/), [miniShop]([[~677]] "miniShop"), [Shopkeeper]([[~709]] "Shopkeeper") | FoxyCart (not native) |
| Feeds | [getResources]([[~887]] "getResources.Building a RSS feed")(generation), [getFeed]([[~650]] "getFeed")(reading), [spieFeed]([[~719]] "spieFeed") | [Ditto]([[~629]] "Ditto")(generation), FeedX (reading) |
| Creating transport packages | [PackMan]([[~687]] "PackMan"), [modExtra]([[~680]] "modExtra")(demo package), [Doodles](http://rtfm.modx.com/display/revolution20/Developing+an+Extra+in+MODX+Revolution "Developing an Extra in MODX Revolution") (tutorial + demo package) |  |
| Spam Prevention | [Rampart]([[~697]] "Rampart") |  |
| Documents | [FileDownload R]([[~639]] "FileDownload R"), [Upload to Users CMP]([[~731]] "Upload to Users CMP") |  |