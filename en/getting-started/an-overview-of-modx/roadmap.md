---
title: "Roadmap"
_old_id: "267"
_old_uri: "2.x/getting-started/an-overview-of-modx/roadmap"
---

 **This is a work-in-progress roadmap for MODX Revolution.**

 MODX Revolution is developed on GitHub. As a result, GitHub is the primary source to get up-to-date information on what features are coming in the next releases and their overall progress. [](https://github.com/modxcms/revolution/milestones)

 For the next patch release (2.5.x), [see the changelog](https://github.com/modxcms/revolution/blob/2.5.x/core/docs/changelog.txt) in the 2.5.x branch for information on fixed bugs and improvements. Patch releases are typically published released at least once every three months.

 [You can find a list of all planned releases, and assigned issues, here](https://github.com/modxcms/revolution/milestones).

## Last feature release: MODX Revolution 2.5.0

 MODX Revolution 2.5 was [released in April 2016](https://modx.com/blog/2016/04/21/modx-revolution-2.5/). The following new features or improvements, among many others, [have been added to 2.5.0](https://github.com/modxcms/revolution/issues?q=milestone%3Av2.5.0-pl+is%3Aclosed) so far:

- A more mobile-friendly manager ([\#12776](https://github.com/modxcms/revolution/pull/12776))
- Support for PHP 7
- New modParsedManagerController to build custom manager pages with standard MODX tags ([\#12555](https://github.com/modxcms/revolution/pull/12555))
- Improved view of the error log, it now takes up the full vertical space ([\#12746](https://github.com/modxcms/revolution/pull/12746))
- Font Awesome updated to 4.5, which includes the MODX logo! ([\#12774](https://github.com/modxcms/revolution/pull/12774))
- Improved usability of the tree by larger click targets to expand containers ([\#12773](https://github.com/modxcms/revolution/pull/12773))
- Improved accessibility and usability of the login screen ([\#12784](https://github.com/modxcms/revolution/pull/12784))
- Updated dependencies (Smarty 3.1.27, PHPMailer 5.2.14)
- Ability to unpack zip files from the tree or media manager ([\#12775](https://github.com/modxcms/revolution/pull/12775))
- Improved "out of the box" experience with a new base template

## Planned: MODX Revolution 2.6/2.7/3.0

Before the end of 2017, an exciting new feature release is planned. This may be version 2.6 or 2.7, but can also be version 3.0 if it includes backwards incompatible features. In that case, the "MODX 3.0/Next" detailed below will become "MODX 4.0".

This feature release is expected to contain a refreshed manager design, as well as other cool new features. Its progress [can be followed on github](https://github.com/modxcms/revolution/issues?q=is%3Aclosed+milestone%3Av2.6.0), and you can test it by [building MODX from Git](https://docs.modx.com/revolution/2.x/getting-started/installation/git-installation) on the `2.x` branch. Here are some of the features that have already been merged:

- Ability to disable the @EVAL binding for improved security ([\#13224](https://github.com/modxcms/revolution/pull/13224))
- Ability to use newlines in output modifiers ([\#13115](https://github.com/modxcms/revolution/pull/13115))
- `after` and `before` output modifiers ([\#13021](https://github.com/modxcms/revolution/pull/13021))
- Plugin events for package install/update/uninstall ([\#12936](https://github.com/modxcms/revolution/pull/12936))

 There are also contributions that have been marked to be included in 2.6, but which have not been tested and merged. [These can be viewed here](https://github.com/modxcms/revolution/pulls?q=is%3Aopen+is%3Apr+milestone%3Av2.6.0).

## Planned: Deprecation Release

 Between today and the release of a 3.0 including breaking changes, there is another 2.x release expected which provides deprecation notices for features that will be removed in 3.0. This is meant to encourage users and developers to get their site and extras ready for 3.0 before its release.

 It's possible this release will be 2.6 or 2.7, but may even be 2.8.

## Planned: MODX Revolution 3.0/Next

 MODX Revolution 3.0 is the first major release since Revolution itself. Major releases include backwards incompatible changes, meaning that developers may need to change their 2.x extras in order to work in 3.0.

 The focus for MODX 3.0/Next is to modernise the codebase. This includes introducing support for namespaces, using composer to incorporate core dependencies, introducing a dependency injection container ([see PHP-DI recommendation](https://github.com/modxcms/mab-recommendations/blob/master/php-di-adoption.md)) to manage those dependencies, implementing Slim as router ([see Slim refactor recommendation](https://github.com/modxcms/mab-recommendations/blob/master/slim-refactor.md)), and generally decoupling code to a more sane level. These are largely back-end under-the-hood changes to make MODX more appealing for the developer community.

 There is also a MODX Advisory Board working group investigating the needs and making plans for a completely rebuilt manager interface, however it is uncertain if this will be included in 3.0 or in 4.0. At the moment, 3.0 is expected to still use ExtJS.

 Some other highlights of MODX 3.0 include:

- [Introduction of xPDO 3.x, which provides autoloading and namespaces for the database models.](https://github.com/modxcms/mab-recommendations/blob/master/xpdo-3-model-refactor.md)
- Full removal of on-the-fly assets compression in the manager; this was already disabled in 2.5.
- Adoption of PHP FIG standards: 
  - PSR-1 and PSR-2 code styles for more consistent code
  - [PSR-3 for logging](https://github.com/modxcms/mab-recommendations/blob/master/psr3-logging-standard.md)
  - PSR-4 for autoloading
- Command line toolkit for MODX/xPDO
- Minimum PHP version updated to PHP 5.5 or 5.6.
- Deprecations/code removal for features that are no longer relevant, or better handled by composer dependencies: 
  - `$modx->toJSON()` and `$modx->fromJSON()`; in the PHP world of today you can reliably use `json_encode` and `json_decode`.
  - modRestClient and modRestServer classes;
  - xPDO will be available through the dependency injection container, instead of directly on the modX object.

 Work in progress for MODX 3.0/Next can be seen in the 3.x and slim branches on GitHub. Once the architectural changes have been fully implemented, or when the MODX Advisory Board suggests additional changes, this roadmap will be updated accordingly.