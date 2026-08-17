---
title: "Частые вопросы"
description: "FAQ по HandyMan: URL, Textile, MODX, captcha и пожертвования"
translation: "extras/handyman/handyman.frequently-asked-questions"
---

HandyMan: сложный продукт, и у многих возникают вопросы. Ниже ответы на частые из них.

## Какой URL у менеджера HandyMan?

www.yoursite.com/handyman/

(Не yoursite.com/manager/.)

## HandyMan заменяет MODX Manager?

Это не замена, а альтернативный способ управлять контентом сайта. Обычно быстрее и удобнее с телефона, но не все функции главного менеджера доступны. Так и задумано.

HandyMan нормально работает со screenreader.

## Я установил HandyMan, но менеджер на телефоне не изменился. Зачем это?

HandyMan не подменяет менеджер. Альтернативный интерфейс открывается по другому URL. Это описано в readme, инструкции по установке и в @handyman\_modx.

Вместо yoursite.com/manager/ откройте yoursite.com/handyman/ на мобильном устройстве.

## HandyMan поддерживает мой телефон?

HandyMan построен на jQuery Mobile Framework. Фреймворк снимает с вас необходимость отслеживать каждое новое устройство и сохраняет поддержку старых. Если телефон выпущен за последние два года и назывался «smartphone», проблем быть не должно. Поддерживаются планшеты. HandyMan проверен на iPad и Motorola Xoom.

Подробнее см. таблицу [jQuery Mobile Graded Browser Support](http://jquerymobile.com/gbs/).

## Как включить rich text (Textile) в HandyMan?

HandyMan поддерживает Textile [(что такое Textile](http://en.wikipedia.org/wiki/Textile_(markup_language)), [синтаксис в sidebar](http://www.textism.com/tools/textile/), не всё из синтаксиса поддерживается), но по умолчанию **отключено**. Не весь контент удобно править в Textile, были найдены баги. Если в rich text только абзацы, изображения и ссылки, скорее всего всё будет в порядке. В любом случае сохраните копию данных **до** сохранения из HandyMan. Подойдёт VersionX (версия 2 для MODX 2.1+, версия 1 из package manager до 2.0.8), есть dev-сборки [на форуме](http://forums.modx.com/thread/72078/versionx-v2---in-development-previews). О багах сообщайте в tracker.

Если rich text (content, richtext TV) построен на div или специфичном HTML, пока лучше **не** включать Textile.

Чтобы включить Textile, войдите в обычный MODX Manager, откройте System -> System Settings, в namespace (по умолчанию «core») выберите «handyman». Измените handyman.useRichtext на «yes», при необходимости очистите кеш и вернитесь в HandyMan. Textile учитывает настройку «richtext» ресурса. На экране создания/редактирования можно отказаться от Textile для конкретного ресурса по ссылке сверху.

## HandyMan бесплатен и с открытым исходным кодом?

Да на оба вопроса.

Исходники на Github: <https://github.com/Mark-H/HandyMan>, лицензия GPL.

HandyMan бесплатен для установки, клиентов и деплоя. Если он помог вашему workflow, пожертвование приветствуется. Это не обязательно деньги: документация (как эта страница), перевод HandyMan (скоро!) или другие идеи [на сайте проекта](http://www.modxmobile.com/contribute/no-money-involved/) сильно помогают. Если времени нет, можно пожертвовать через PayPal [на моём сайте](http://www.markhamstra.com/l/hm/).

## Можно ли сделать пожертвование?

Да. Я дорабатываю сопутствующие процессы (beta transport provider, contributor newsletter и т.д.), но пожертвование можно оформить [на личном сайте](http://www.markhamstra.com/l/hm/). PayPal принимает аккаунт PayPal или многие карты.

Средства идут на разработку (баги и новые функции), хостинг и при необходимости маркетинг проекта.

## HandyMan работает с custom resource classes, например Articles для MODX 2.2?

Из-за бага в Revolution 2.2.0-pl HandyMan не работает с custom resource class вроде Articles. Обновите MODX до 2.2.0-pl2 или новее.

HandyMan покажет ресурс как обычный. Расширенные поля конфигурации недоступны, побочные эффекты не проверялись полностью. В будущем для custom resource classes могут появиться отдельные интерфейсы HandyMan. Custom resource classes можно использовать, но возможны проблемы из-за другого интерфейса и полей.

## Какие версии MODX поддерживает HandyMan?

В 1.0.0 поддерживаются 2.0.8, 2.1.x и ограниченно 2.2.

- Поддержку 2.0, вероятно, скоро уберут. Планируйте обновление, если нужны новые версии HandyMan.
- До выхода 2.3 ветка 2.1 поддерживается полностью. После 2.3 поддержку 2.1 могут убрать, но об этом предупредят заранее.
- 2.2 будет поддерживаться полностью (включая custom resource classes, порты под HandyMan: задача автора extra) с HandyMan 1.1. Поддержка 2.2, вероятно, надолго.

## HandyMan поддерживает вход с captcha?

Сейчас HandyMan **не** поддерживает вход при включённом [Captcha plugin](https://modx.com/extras/package/captcha). [Запись в bug tracker](http://tracker.modx.com/issues/6620), возможно, поправят в будущем.
