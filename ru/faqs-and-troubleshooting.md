---
title: "FAQs & Troubleshooting"
---

Этот документ поможет вам начать с общих проблем / вопросов по MODX Revolution, либо ответив на них, либо указав на нужные ресурсы.  Он ни в коем случае не является эксклюзивным, и хороший поиск на форумах и в этой документации может найти больше ресурсов для того, что вы ищете. В любом случае, если вы не можете найти то, что ищете, спросите на [форумах](http://forums.modx.com) или в IRC: irc.freenode.org канал: #MODX.

Нумерация вопросов представляет собой ни что иное, как просто номер вопроса, для того чтобы помочь вам найти нужный.

Это заглушка документации и вы можете помочь завершить ее! Если у вас нет доступа к редактированию этой страницы, [пожалуйста, напишите о том что вы хотите добавить или обновить в этом топике на форуме](http://forums.modx.com/thread/72123/faqs-troubleshooting-on-the-rtfm).

Этот документ всегда будет в процессе, так как постоянно добавляются / изменяются новые возможности, и вы можете помочь поддержать его развитие и актуальность! Если у вас нет доступа к редактированию этой страницы, [пожалуйста, напишите о том что вы хотите добавить или обновить в этом топике на форуме](http://forums.modx.com/thread/72123/faqs-troubleshooting-on-the-rtfm).

_Для редакторов:_

- _Пожалуйста, используйте правильные заголовки (заголовки 2-го уровня для категорий, заголовки 3-го уровня для вопросов) чтобы быть уверенными, что оглавление и остальное правильно сгенерируются и будут иметь смысл._
- _Большие темы могут использоваться для создания подстраниц этой страницы, и если другие похожие страницы уже существуют, пожалуйста, дайте ссылку на них в первом разделе._
- _Пожалуйста, убедитесь, что нумерация верна, когда вы добавляете вопрос, чтобы облегчить навигацию по странице._
- _Пожалуйста, убедитесь, что ваши ссылки правильно указывают на дальнейшую информацию по теме._

_Спасибо!!_



## Оглавление

FAQ и/или Устранение неполадок по конкретным темам в других местах:

- [Устранение неполадок при установке](getting-started/installation/troubleshooting-installation "Устранение неполадок при установке")
- [Устранение неполадок при обновлении](administering-your-site/upgrading-modx/troubleshooting-upgrades "Устранение неполадок при обновлении")
- [Устранение неполадок при управлении дополнениями](administering-your-site/installing-a-package/troubleshooting-package-management "Устранение неполадок при управлении дополнениями")
- [Устранение неполадок безопасности](administering-your-site/security/troubleshooting-security "Устранение неполадок безопасности")

Подстраницы, посвященные конкретным темам:

- [FAQ и устранение неполадок по разработке CMP](faqs-and-troubleshooting/cmp-development-faqs-and-troubleshooting "FAQ и устранение неполадок по разработке CMP")

На этой странице вы можете найти следующие категории и вопросы:

- [Оглавление](#%D0%BE%D0%B3%D0%BB%D0%B0%D0%B2%D0%BB%D0%B5%D0%BD%D0%B8%D0%B5)
- [1. MODX 101](#1-modx-101)
  - [1.1. Что такое MODX Evolution, и что такое MODX Revolution? В чем отличия?](#11-%D1%87%D1%82%D0%BE-%D1%82%D0%B0%D0%BA%D0%BE%D0%B5-modx-evolution-%D0%B8-%D1%87%D1%82%D0%BE-%D1%82%D0%B0%D0%BA%D0%BE%D0%B5-modx-revolution-%D0%B2-%D1%87%D0%B5%D0%BC-%D0%BE%D1%82%D0%BB%D0%B8%D1%87%D0%B8%D1%8F)
  - [1.2. What different tags can I use? What is \[\[\*pagetitle\]\], \[\[Wayfinder\]\] etc?](#12-what-different-tags-can-i-use-what-is-pagetitle-wayfinder-etc)
- [2. The Manager](#2-the-manager)
  - [2.1. Help! Where did the sidebar go?](#21-help-where-did-the-sidebar-go)
  - [2.2 How can I modify what resource fields are visible when creating or editing a Resource? Is there something like ManagerManager for Revolution?](#22-how-can-i-modify-what-resource-fields-are-visible-when-creating-or-editing-a-resource-is-there-something-like-managermanager-for-revolution)
  - [2.3 What does modDocument/ modWeblink/ modSymLink/ modStaticResource mean?](#23-what-does-moddocument-modweblink-modsymlink-modstaticresource-mean)
  - [2.4 What is the difference between a Resource and a Document?](#24-what-is-the-difference-between-a-resource-and-a-document)
  - [2.5 I'm locked out! I can't access the manager! Forgot my password and recovery doesn't work!](#25-im-locked-out-i-cant-access-the-manager-forgot-my-password-and-recovery-doesnt-work)
- [3. Frontend Display Issues](#3-frontend-display-issues)
  - [3.1 Blank frontend pages resolved by Clearing Cache](#31-blank-frontend-pages-resolved-by-clearing-cache)
  - [3.2 General Snippet Problems](#32-general-snippet-problems)



## 1. MODX 101

### 1.1. Что такое MODX Evolution, и что такое MODX Revolution? В чем отличия?

MODX Evolution является устаревшим кодом 1.x версий. За последние пять лет на нем созданы сотни тысяч веб-сайтов и на основе него сформирован MODX.

MODX Revolution - это полностью переписанный MODX Evolution, который разделяет те же идеи, но основан на xPDO, слое абстракции базы данных, выпущенный в 2010 году.

На данный момент существует три версии MODX:

- 0.9.6.x – исходная кодовая база, которая началась с первого выпуска стабильной версии 0.9.0 в конце октября 2005. _Больше не поддерживается, вы должны обновить ее до последней версии Evolution. Уязвимости, найденные в 0.9.6.x давно исправлены!_
- Evolution 1.x – доработанный и улучшенный дистрибутив 0.9.6.x с конвенциями и терминологией, более соответствующий нашей полностью переписанной версии Revolution.
- Revolution 2.x – a fully object oriented and completely new branch that's been in development for more than 3 years that addresses limitations found in the original code base such as having a truly recursive parser and eliminating the 5,000 document ceiling.

Further reading:

- "The Evolution of a Revolution" <http://modx.com/about/blog/the-evolution-of-a-revolution/>
- "What are the basic differences between Evolution and Revolution?" <http://modx.com/revolution/product/faq/#q1>
- There's a number of big topics on the forums as well discussing evo and revo which may be interesting if you're looking for more in-depth discussing of the differences. As Revolution has been over three years in development, do check out the date something was posted to be sure they are still relevant.

### 1.2. What different tags can I use? What is \[\[\*pagetitle\]\], \[\[Wayfinder\]\] etc?

Check out the [Tag Syntax](making-sites-with-modx/tag-syntax "Tag Syntax") documentation. You can find resource fields you can use in Revolution on the [Resources Documentation](making-sites-with-modx/structuring-your-site/resources "Resources").

## 2. The Manager

### 2.1. Help! Where did the sidebar go?

You probably hid it at some point. There's a subtle arrow on the left side of the screen ([see this image](/download/attachments/36634926/subtlearrow.PNG?version=1&modificationDate=1322402411000)) that you can click to bring it back. In some cases you will need to refresh the page for the contents of the sidebar to load properly.

### 2.2 How can I modify what resource fields are visible when creating or editing a [Resource](/display/revolution20/Resource "Resource")? Is there something like [ManagerManager](http://modx.com/extras/package/managermanager) for Revolution?

You can use [Form Customization](/display/revolution20/Form+Customization "Form Customization") (found under the Security menu) to change the fields. It doesn't offer all of the (Evolution) ManagerManager plugin but comes pretty far.

### 2.3 What does modDocument/ modWeblink/ modSymLink/ modStaticResource mean?

They are the class names of Documents, Weblinks, Symlinks and Static Resources. They are "subtypes" of Resources (class name modResource) and each have their own specific goal. They all show up in the Resource Tree and can appear anywhere in the hierarchy.

- [Documents](making-sites-with-modx/structuring-your-site/resources "Resources") (commonly refered to as Resources, see 2.4 below) are regular pages and have content.
- A [Weblink](making-sites-with-modx/structuring-your-site/resources/weblink "Weblink") redirect a user to a different Resource or an external URL.
- A [Symlink](making-sites-with-modx/structuring-your-site/resources/symlink "Symlink") acts as a copy of a Document
- [Static Resources](making-sites-with-modx/structuring-your-site/resources/static-resource "Static Resource") act like Documents, however their content comes from a file on the filesystem.

### 2.4 What is the difference between a Resource and a Document?

Technically, a Resource (modResource) is an abstract object of which a Document (modDocument) is an implementation.

Practically both terms are used to indicate the same thing: a Document which holds certain content. Coming from the technical implementation, a [Weblink](making-sites-with-modx/structuring-your-site/resources/weblink "Weblink"), [Symlink](making-sites-with-modx/structuring-your-site/resources/symlink "Symlink") or [Static Resource](making-sites-with-modx/structuring-your-site/resources/static-resource "Static Resource") are also be included when referring to "Resources" as they are also implementations of the modResource class.

### 2.5 I'm locked out! I can't access the manager! Forgot my password and recovery doesn't work!

You're not doomed. [Check out these instructions for Revolution](administering-your-site/security/troubleshooting-security/resetting-a-user-password-manually "Resetting a User Password Manually"), or [these instructions for recovering your user account in Evolution](/evolution/1.0/administration/manager-users/reset-your-password-unblock-your-user "Reset your Password - Unblock your User").

## 3. Frontend Display Issues

### 3.1 Blank frontend pages resolved by Clearing Cache

In Revolution 2.2.5 the way xPDO/MODX write cache files has been re-factored. If you are having issues with blank frontend pages that are resolved after clearing the site cache, you could try setting _use\_flock_. This should help with RackSpace Cloud hosting, GoDaddy hosting, and some other providers.

In your MODX config file add the setting _use\_flock_ in your $config\_options array, and set it to false.

See Original Post: <http://forums.modx.com/thread/78611/core-cache-file-locks-and-will-not-update#dis-post-434053>

### 3.2 General Snippet Problems

If you find a snippet and/or plugin isn't working properly despite the correct code, double check that it has been installed.