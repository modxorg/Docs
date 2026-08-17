---
title: "Плейсхолдеры CamperManagement"
description: "Справочник плейсхолдеров cmCampers и cmCamperDetails"
translation: "extras/campermanagement/campermanagement.developing-the-front-end/placeholders-you-can-use"
---

cmCampers и cmCamperDetails работают с одними данными и через свойства включают или исключают объекты. Ниже перечень плейсхолдеров. В части чанков (например tplImageItem) доступны и плейсхолдеры родительского чанка, включая детали кемпера.

В cmCampers используйте плейсхолдеры в чанках **с кешем**, чтобы избежать странного поведения. Пример: `[[+brand]]`. В cmCamperDetails плейсхолдеры с префиксом cm. (с точкой) и вызов **без кеша**. Пример: `[[!+cm.brand]]`

## Специфичные для cmCamper

Плейсхолдеры только для сниппета cmCamper. Кроме них см. объектные плейсхолдеры ниже.

### Чанк tplItem

| Плейсхолдер | Описание                                                                                                                                                                                                                              |
| ----------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| url         | href ссылки на ресурс из &target. В URL будет параметр «cid» с ID кемпера.                                                                                         |
| owner       | Зависит от includeOwner. При 1 выводит результат чанка tplOwner, иначе ID владельца.                                                                                              |
| images      | При includeImages и numImages (>0) содержимое чанка tplImageOuter, внутри tplImageItem на каждое изображение. |
| options     | При includeOptions опции через tplOptionsOuter и tplOptionsItem.                                                                                   |

### Чанки tpl\*Outer (и плейсхолдеры cmCamperDetails)

| tpl\*Outer      | Плейсхолдер | Описание                                                                                                                            |
| --------------- | ----------- | -------------------------------------------------------------------------------------------------------------------------------------- |
| tplOuter        | items       | Содержимое всех tplItem, разделённое переводом строки (\\n).                                                                        |
| tplImageOuter   | images      | Содержимое всех tplImageItem, разделённое переводом строки (\\n).                                                                   |
| tplOptionsOuter | options     | Содержимое всех tplOptionsItem, разделённое &optionsSeparator из cmCampers. |

## Campers (класс: cmCamper)

| Плейсхолдер   | Примечания                                                                                                                                             |
| ------------- | ------------------------------------------------------------------------------------------------------------------------------------------------- |
| brand         | При &includeBrand=`0` только ID brand. Иначе имя бренда. |
| type          |                                                                                                                                                   |
| place         |                                                                                                                                                   |
| car           |                                                                                                                                                   |
| engine        |                                                                                                                                                   |
| manufactured  | Формат d/m/Y через strftime.                                                                                                           |
| beds          |                                                                                                                                                   |
| weight        |                                                                                                                                                   |
| mileage       |                                                                                                                                                   |
| periodiccheck | Формат d/m/Y через strftime.                                                                                                           |
| remarks       | Plain text, без HTML. Для переносов строк примените модификатор nl2br.                       |
| price         | money\_format с опциями %!.2n                                                   |
| status        | ID статуса (0-5):                                                                                                          |
|               | 1. Unconfirmed                                                                                                                                    |
|               | 2. Active                                                                                                                                         |
|               | 3. Favorite                                                                                                                                       |
|               | 4. Conditionally sold                                                                                                                             |
|               | 5. Sold                                                                                                                                           |
|               | 6. Inactive                                                                                                                                       |
| statusname    | Переведённая строка для ID статуса.                                                                                                  |
| keynr         |                                                                                                                                                   |
| owner         | ID связанного owner, без деталей.                                                                                              |
| id            | Уникальный ID объекта Camper                                                                                                                           |
| added         | Дата добавления d/m/Y.                                                                                                   |
| archived      | Дата архивации d/m/Y.                                                                                                |

## Options (класс: cmOption, many-to-many: cmCamperOptions)

| Плейсхолдер | Примечания |
| ----------- | ----- |
| id          |       |
| name        |       |

## Brand (класс: cmBrand)

Обычно не используют напрямую: плейсхолдер brand кемпера подменяется именем из этого объекта.

## Owner (класс: cmOwner)

Объект owner можно использовать как простую CRM. Без доски объявлений эти данные посетителям сайта лучше не показывать.

| Плейсхолдер | Примечания                                                   |
| ----------- | ------------------------------------------------------- |
| firstname   |                                                         |
| lastname    |                                                         |
| email       | Не выводите в публичном месте. |
| bank        | Не выводите в публичном месте. |
| phone1      | Не выводите в публичном месте. |
| phone2      | Не выводите в публичном месте. |
| address     | Не выводите в публичном месте. |
| postal      | Не выводите в публичном месте. |
| city        | Не выводите в публичном месте. |
| country     | Не выводите в публичном месте. |

## Images (класс: cmImages)

| Плейсхолдер | Примечания                                                |
| ----------- | ---------------------------------------------------- |
| camper      | Ссылка на ID кемпера                                  |
| rank        |                                                      |
| image       | Относительный URL, можно ресайзить через phpthumbof. |

## См. также

1. [CamperManagement.cmCamperDetails Snippet](extras/campermanagement/campermanagement.developing-the-front-end/cmcamperdetails-snippet)
2. [CamperManagement.cmCampers Snippet](extras/campermanagement/campermanagement.developing-the-front-end/cmcampers-snippet)
3. [CamperManagement.Placeholders you can use](extras/campermanagement/campermanagement.developing-the-front-end/placeholders-you-can-use)
