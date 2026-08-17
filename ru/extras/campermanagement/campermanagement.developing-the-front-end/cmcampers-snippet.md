---
title: "CamperManagement.cmCampers Snippet"
description: "Сниппет списка транспортных средств с фильтрацией и шаблонами чанков"
translation: "extras/campermanagement/campermanagement.developing-the-front-end/cmcampers-snippet"
---

cmCampers агрегирует данные о технике в базе.

## Свойства сниппета

Свойства cmCampers меняют поведение вывода. Часть совпадает со свойствами cmCamperDetails.

| &property      | Описание                                                                                                                                                                                                                                                                                     | Значение по умолчанию                                                                                                           |
| -------------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------- |
| start          | Смещение: пропустить первые N записей.                                                                                                                                                                                                                                                 | 0                                                                                                                       |
| limit          | Число результатов. 0 или большое число для вывода всех.                                                                                                                                                                                                      | 4                                                                                                                       |
| sort           | Поле сортировки. Любое поле cmCamper, но не все имеют смысл. При сортировке по связанным объектам (Brand, Owner) сортировка идёт по ID, не по имени. При searchFromRequest=1 sort можно передать в URL. | added                                                                                                                   |
| dir            | asc                                                                                                                                                                                                                                                                                             | desc. Направление сортировки. При searchFromRequest=1 dir можно передать параметром sortdir в URL. | desc |
| includeBrand   | 1                                                                                                                                                                                                                                                                                               | 0. Загружать ли brand.           | 1    |
| includeOwner   | 1                                                                                                                                                                                                                                                                                               | 0. Загружать ли owner.           | 0    |
| includeImages  | 1                                                                                                                                                                                                                                                                                               | 0. Загружать ли изображения.                 | 1    |
| includeOptions | 1                                                                                                                                                                                                                                                                                               | 0. Загружать ли опции.                | 1    |
| status         | Список ID статусов через запятую для фильтрации. ID:                                                                                                                                                                                                         |

1. Unconfirmed
2. Active
3. Favorite
4. Conditionally sold
5. Sold
6. Inactive | 1,2,3,4 |
| numimages | Сколько изображений загружать на запись. | 1 |
| target | ID ресурса страницы деталей. makeUrl строит ссылку с «cid» и ID кемпера по настройкам friendly URL. | 2 |
| tplOuter | Имя чанка. Внешний шаблон всего результата. [Плейсхолдеры](extras/campermanagement/campermanagement.developing-the-front-end/placeholders-you-can-use "CamperManagement.Placeholders you can use") | cmDefaultTplOuter |
| tplItem | Имя чанка. Шаблон одного элемента. [Плейсхолдеры](extras/campermanagement/campermanagement.developing-the-front-end/placeholders-you-can-use "CamperManagement.Placeholders you can use") | cmDefaultTplItem |
| tplImageOuter | Имя чанка. Внешний шаблон изображений на элемент. [Плейсхолдеры](extras/campermanagement/campermanagement.developing-the-front-end/placeholders-you-can-use "CamperManagement.Placeholders you can use") | cmDefaultTplImageOuter |
| tplImageItem | Имя чанка. Шаблон одного изображения. [Плейсхолдеры](extras/campermanagement/campermanagement.developing-the-front-end/placeholders-you-can-use "CamperManagement.Placeholders you can use") | cmDefaultTplImageItem |
| tplOptionsOuter | Имя чанка. Внешний шаблон опций на элемент. [Плейсхолдеры](extras/campermanagement/campermanagement.developing-the-front-end/placeholders-you-can-use "CamperManagement.Placeholders you can use") | cmDefaultTplOptionsOuter |
| tplOptionsItem | Имя чанка. Шаблон одной опции. [Плейсхолдеры](extras/campermanagement/campermanagement.developing-the-front-end/placeholders-you-can-use "CamperManagement.Placeholders you can use") | cmDefaultTplOptionsItem |
| tplOwner | Имя чанка. Шаблон владельца. [Плейсхолдеры](extras/campermanagement/campermanagement.developing-the-front-end/placeholders-you-can-use "CamperManagement.Placeholders you can use") | cmDefaultTplOwner |
| searchFromRequest | 1 | 0. При 1 читает POST/GET для status, sort и dir и переопределяет свойства сниппета. Поля: status, sort, dir. При фильтре status задаётся плейсхолдер «statusfilter». | 0 |
| locale | Локаль для money\_format при форматировании цены. | it\_IT |
| toPlaceholder | При задании записывает результат в плейсхолдер с ключом из &toPlaceholder. |  |

## Примеры использования

### Пример 1: простой обзор последних добавлений

Переопределите чанки item и image item, выведите 4 последних записи со ссылкой на детали с ID 12.

``` php
[[!cmCampers? &tplItem=`cmTplItem` &tplImageItem=`cmTplImage` &limit=`4` &target=`12`]]
```

Чанк cmTplItem:

``` php
<li onclick="location.href='[[+url]]'">
    <div class="status[[+status]]"></div>
    [[+images:default=`<img src="/assets/templates/lighthouse/cmimg/ph.png" />`]]
    <h4><a href="[[+url]]" title="[[+brand]] [[+type]]">[[+brand]] [[+type]]</a></h4>
    <ul>
        <li><span>Manufactured:</span> [[+manufactured]]</li>
        <li><span>Mileage:</span> [[+mileage]]</li>
        <li><span>Engine:</span> [[+engine]]</li>
        <li><span>Price:</span> &euro; [[+price]]</li>
    </ul>
</li>
```

С CSS результат такой (есть что улучшить):
![](ex1.png)

### Пример 2: слайдшоу избранной техники

Пример предполагает плагин слайдшоу и показывает, как tpl-свойства дают нужный HTML.

В шаблоне (под скрипт слайдшоу):

``` php
<div id="slideshow">  
   [[!cmCampers? &status=`2` &tplOuter=`cmHomeOuter` &tplItem=`cmHomeItem` &tplImageItem=`cmHomeImage` &searchFromRequest=`0` &target=`12` ]]
</div>
```

Фильтр status=2 (favorites), чанки:

cmHomeOuter выводит только внутреннее содержимое вместо ul по умолчанию. div из шаблона можно перенести в outer.

``` php
[[+items]]
```

cmHomeItem: изображения и подпись для одной записи. Подстройте под свой скрипт.

``` php
<div class="slide">
  <a href="[[+url]]" title="[[+brand]] [[+type]]" >[[+images]]</a>
  <div class="slider-infobox">
    <p><a href="[[+url]]" title="[[+brand]] [[+type]]" >[[+brand]] [[+type]] - &euro; [[+price]]</a></p>
  </div>
</div>
```

cmHomeImage: только тег img.

``` php
<img src="[[+image]]" alt="[[+brand]] [[+type]]" />
```

HTML одного элемента на фронтенде:

``` php
 <div class="cycle">
  <a href="aanbod/details.html?cid=12" title="TEC Siena Saphir 510 TR" ><img src="/assets/components/campermanagement/uploads/2011/12/cm25917-723.jpg" alt="TEC Siena Saphir 510 TR" /></a>
  <div class="slider-infobox">
    <p><a href="aanbod/details.html?cid=12" title="TEC Siena Saphir 510 TR" >TEC Siena Saphir 510 TR - &euro; 5.999,00</a></p>
  </div>
</div>
```

Со скриптом слайдшоу и CSS кадры сменяются с fade:
![](ex2.png)

### Пример 3: горизонтальные строки

Скоро…!

### Идея: слайдшоу изображений на карточке

У каждой записи может быть несколько изображений, но numimages по умолчанию 1. Через tplImageOuter и tplImageItem можно сделать мини-слайдшоу в обзоре. Если реализуете или уже сделали, напишите автору: hello at markhamstra dot com.
