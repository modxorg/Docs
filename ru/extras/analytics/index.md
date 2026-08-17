---
title: "Analytics"
description: "Вставка кода отслеживания Google Universal Analytics и/или Google Analytics на страницы сайта"
translation: "extras/analytics/index"
---

## Что такое Analytics?

Analytics это утилита для MODX Revolution, которая вставляет код отслеживания Google Universal Analytics (analytics.js) и/или Google Analytics (ga.js) на страницы вашего сайта.

По умолчанию трафик пользователей, вошедших в менеджер, игнорируется. Любой контекст сайта можно исключить по запросу, независимо от того, авторизован пользователь или нет.
Шаблоны кода отслеживания можно переопределить своим чанком.

## Требования

- MODX Revolution 2.1.5 или новее
- PHP5 или новее

## История

Analytics впервые выпущен 5 февраля 2012 года [yogoo](https://twitter.com/yogoo). Идея extra появилась после поста [Mark Hamstra](https://modx.com/extras/author/MarkH): [Hiding code for MODX Manager users](https://www.markhamstra.com/modx/2012/01/hiding-google-analytics-code-from-manager-users/).

### Загрузка

Extra доступен через [Package Manager](building-sites/extras) или в [репозитории](https://modx.com/extras/package/analytics).

## Использование

### Примеры

Самый простой вызов (всегда без кэша):

``` php
[[!Analytics? &webPropertyID=`UA-XXXXX-Y`]]
```

Отключить фильтрацию по контексту (кэшировать сниппет):

``` php
[[Analytics?
    &excludeContextList=``
    &excludeLoggedInUserContextList=``
    &webPropertyID=`UA-XXXXX-Y`
]]
```

Расширенный пример:

``` php
[[!Analytics?
    &debug=`1`
    &isLocalhost=`1`
    &excludeContextList=`content_editors`
    &excludeLoggedInUserContextList=`mgr`
    &displayfeatures=`0`
    &enhancedLinkAttribution=`0`
    &webPropertyID=`UA-XXXXX-Y`
    &cookieDomain=`domain.tld`
    &forceSSL=`1`
    &anonymizeIP=`1`
    &pagePath=`/home/landingPage`
    &setAccount=`GA-XXXXX-Y`
    &setDomainName=`domain.tld`
    &trackPageview=`/home/landingPage`
]]
```

### Общие свойства

| Name                           | Description                                                                                                                                                                                                                                                      | Required | Default |
| ------------------------------ | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------- | ------- |
| debug                          | Простой режим отладки: debug-сообщения как js-комментарии.                                                                                                                                                                                                      | no       | 0       |
| excludeContextList             | Список контекстов через запятую для исключения из отслеживания. Ex: web, web2,...                                                                                                                                                                                    | no       |         |
| excludeLoggedInUserContextList | Список контекстов через запятую для исключения, когда пользователи в них авторизованы. Ex: mgr, web,...                                                                                                                                                       | no       | mgr     |
| enhancedLinkAttribution        | Enhanced Link Attribution: [analytics.js](https://developers.google.com/analytics/devguides/collection/analyticsjs/advanced#enhancedlink), [ga.js](https://developers.google.com/analytics/devguides/collection/upgrade/reference/gajs-analyticsjs#enhancedlink) | no       | 1       |

### Свойства Google Universal Analytics ([analytics.js](https://developers.google.com/analytics/devguides/collection/analyticsjs/ "analytics.js documentation"))

| Name                    | Description                                                                                                                                                                                                                                              | Required | Default |
| ----------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------- | ------- |
| webPropertyID           | Параметр [trackingId](https://developers.google.com/analytics/devguides/collection/analyticsjs/method-reference#create).                                                                                                                                | yes      |         |
| displayfeatures         | [Display Features plugin](https://developers.google.com/analytics/devguides/collection/analyticsjs/display-features). Включает [Display Advertising Features](https://support.google.com/analytics/answer/3450482?hl=en&ref_topic=3413645&rd=1). | no       | 1       |
| enhancedLinkAttribution | см. общие свойства выше.                                                                                                                                                                                              | no       | 1       |
| forceSSL                | Поле [forceSSL](https://developers.google.com/analytics/devguides/collection/analyticsjs/advanced#ssl).                                                                                                                                                 | no       | 0       |
| anonymizeIP             | Поле [anonymizeIp](https://developers.google.com/analytics/devguides/collection/analyticsjs/advanced#anonymizeip).                                                                                                                                      | no       | 0       |
| cookieDomain            | Поле [cookieDomain](https://developers.google.com/analytics/devguides/collection/analyticsjs/domains#auto).                                                                                                                                             | no       | auto    |
| isLocalhost             | Включите для теста analytics.js с localhost. [Подробнее…](https://developers.google.com/analytics/devguides/collection/analyticsjs/advanced#localhost)                                                                 | no       | 0       |
| cookiePath              | \[deprecated\] Использование [настоятельно не рекомендуется](https://developers.google.com/analytics/devguides/collection/analyticsjs/domains#configure) и будет удалено в будущем релизе Analytics.                                            | no       |         |
| pagePath                | Поле [Page](https://developers.google.com/analytics/devguides/collection/analyticsjs/pages) в send().                                                                                                                                                     | no       |         |

### Свойства Google Analytics ([ga.js](https://developers.google.com/analytics/devguides/collection/gajs/ "ga.js documentation"))

| Name                    | Description                                                                                                                                                                                                   | Required | Default |
| ----------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------- | ------- |
| setAccount              | Параметр [\_setAccount](https://developers.google.com/analytics/devguides/collection/gajs/methods/gaJSApiBasicConfiguration?csw=1#_gat.GA_Tracker_._setAccount).                                             | yes      |         |
| enhancedLinkAttribution | см. общие свойства выше.                                                                                                                                                   | no       | 1       |
| setDomainName           | Параметр [\_setDomainName](https://developers.google.com/analytics/devguides/collection/gajs/methods/gaJSApiDomainDirectory?csw=1#_gat.GA_Tracker_._setDomainName).                                          | no       |         |
| setCookiePath           | \[deprecated\] Использование [настоятельно не рекомендуется](https://developers.google.com/analytics/devguides/collection/analyticsjs/domains#configure) и будет удалено в будущем релизе Analytics. | no       |         |
| trackPageview           | Параметр [\_trackPageview](https://developers.google.com/analytics/devguides/collection/gajs/methods/gaJSApiBasicConfiguration#_gat.GA_Tracker_._trackPageview).                                             | no       |         |

Хотите мигрировать код на Universal Analytics? См. [Universal Analytics Upgrade Center](https://developers.google.com/analytics/devguides/collection/upgrade/).

### Разные способы задать свойства

Свойства можно задать через вызов сниппета, наборы свойств, ресурс или настройки контекста.

Если настройки сайта хранятся в ресурсе, используйте [getResourceField](extras/getresourcefield) для получения значений и передайте их в вызов сниппета.

## Свой код отслеживания

Создайте чанки `ua_tracking` и `ga_tracking`. По желанию используйте плейсхолдеры `[[+ua_options]]` и `[[+ga_options]]`.

## Устранение неполадок

- Включите режим debug.
- Убедитесь, что tracking ID задан через webTrackingID и/или setAccount.
- Выйдите из менеджера. По умолчанию трафик авторизованных в менеджере пользователей не отслеживается.

## Разработка и сообщения об ошибках

Запросы функций и баги: [github](https://github.com/yogoo/Analytics/issues).
