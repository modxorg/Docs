---
title: "CamperManagement.cmCamperDetails Snippet"
description: "Сниппет страницы деталей транспортного средства с плейсхолдерами cm.*"
translation: "extras/campermanagement/campermanagement.developing-the-front-end/cmcamperdetails-snippet"
---

Сниппет cmCamperDetails формирует страницу «Vehicle Details». Сам по себе он ничего не выводит, а заполняет плейсхолдеры для шаблона. См. [страницу плейсхолдеров](extras/campermanagement/campermanagement.developing-the-front-end/placeholders-you-can-use).

cmCamperDetails требует URL- или POST-параметр «cid» с ID техники. Если параметра нет, сниппет перенаправит на ресурс или вернёт ошибку. Без данных шаблон будет пустым, поэтому лучше завести страницу «Camper does not exist». См. также свойства cid\*Action.

## Свойства сниппета

| &property         | Описание                                                                                     | Значение по умолчанию                                                                                                                                                                                  |
| ----------------- | ----------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| cidEmptyAction    | 0                                                                                               | валидный ID ресурса. Если не 0, выполняется 301 redirect на этот ресурс, когда параметр «cid» не найден.                         | 1 |
| cidInvalidAction  | 0                                                                                               | валидный ID ресурса. Если не 0, выполняется 301 redirect, когда «cid» не соответствует объекту кемпера (не найден). | 1 |
| hideInactive      | 0                                                                                               | 1. При 1 учитывается cidInactiveAction: сообщение об ошибке или redirect, если статус 0 (unconfirmed) или 5 (inactive).                | 0 |
| cidInactiveAction | 0                                                                                               | валидный ID ресурса. Если не 0, выполняется 301 redirect, когда кемпер найден, но не активен.                                  | 1 |
| includeBrand      | 1                                                                                               | 0. Загружать ли связанный объект brand. Отключение экономит время, если brand не нужен.                                                                                  | 1 |
| includeOwner      | 1                                                                                               | 0. Загружать ли связанный объект owner.                                                                                  | 0 |
| includeImages     | 1                                                                                               | 0. Загружать ли изображения.                                                                                        | 1 |
| includeOptions    | 1                                                                                               | 0. Загружать ли опции.                                                                                       | 1 |
| tplImageOuter     | Имя чанка. Внешний шаблон для набора изображений на каждый элемент.   | cmDefaultTplImageOuter                                                                                                                                                                         |
| tplImageItem      | Имя чанка. Шаблон одного изображения.                                                         | cmDefaultTplImageItem                                                                                                                                                                          |
| tplOptionsOuter   | Имя чанка. Внешний шаблон для набора опций на каждый элемент. | cmDefaultTplOptionsOuter                                                                                                                                                                       |
| tplOptionsItem    | Имя чанка. Шаблон одной опции.                                                        | cmDefaultTplOptionsItem                                                                                                                                                                        |
| tplOwner          | Имя чанка. Шаблон данных владельца.                                    | cmDefaultTplOwner                                                                                                                                                                              |
| locale            | Локаль для money\_format при форматировании цены.                             | it\_IT                                                                                                                                                                                         |

## Как использовать сниппет

Сниппет задаёт плейсхолдеры с префиксом cm. Набор зависит от include\*.

Вызывайте сниппет до использования плейсхолдеров. И сниппет, и плейсхолдеры должны быть некешированными, так как вывод зависит от запроса.

Пример вызова:

``` php
[[!cmCamperDetails? &tplImageItem=`cmDetailImage` &includeImages=`1` &includeOwner=`0`]]
```

Содержимое чанка cmDetailImage для слайдшоу с phpthumbof:

``` php
<li>
  <h3>[[+brand]] [[+type]] </h3>
  <span>[[+image:phpthumbof=`w=620&h=360&far=c`]]</span>
  <img src="[[+image:phpthumbof=`w=45&h=33&zc=1`]]" alt="thumb" />
</li>
```

В шаблоне используйте плейсхолдеры так:

``` php
<ul>
  <li><span>Brand</span>[[!+cm.brand:default=`&nbsp;`]]</li>
  <li><span>Type</span>[[!+cm.type:default=`&nbsp;`]]</li>
  <li><span>Price</span>&euro; [[!+cm.price:default=`&nbsp;`]]</li>
  <li><span>Car</span>[[!+cm.car:default=`&nbsp;`]]</li>
  <li><span>Engine</span>[[!+cm.engine:default=`&nbsp;`]]</li>
</ul>
```

Модификатор default задаёт значение по умолчанию (здесь неразрывный пробел, если поле пустое).
