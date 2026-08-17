---
title: "StoreLocator"
description: "Сниппет Google Maps для MODX: поиск ближайших магазинов и точек на карте"
translation: "extras/storelocator/index"
---

## Что такое StoreLocator?

StoreLocator: сниппет, который интегрирует Google Maps в MODX® и помогает пользователям найти магазины (или любые точки) рядом с адресом (например, домашним). StoreLocator легко встроить на сайт и полностью настроить.

StoreLocator создан и поддерживается [SCHERP Ontwikkeling](http://www.scherpontwikkeling.nl).

## Требования

StoreLocator требует MODX® Revolution 2.2.0 или новее.

## История

| Version   | Release date     | Author                                                                                                                                      | Changes            |
| --------- | ---------------- | ------------------------------------------------------------------------------------------------------------------------------------------- | ------------------ |
| 1.0.0-PL1 | March 6th, 2012  | [Patrick Nijkamp](http://www.scherpontwikkeling.nl/over-ons/patrick-nijkamp.html) ([SCHERP Ontwikkeling](http://www.scherpontwikkeling.nl)) | Initial release.   |
| 1.0.1-PL1 | March 10th, 2012 | [Patrick Nijkamp](http://www.scherpontwikkeling.nl/over-ons/patrick-nijkamp.html) ([SCHERP Ontwikkeling](http://www.scherpontwikkeling.nl)) | Fixed noResultsTpl |
| 1.1.0-PL1 | March 22th, 2012 | [Patrick Nijkamp](http://www.scherpontwikkeling.nl/over-ons/patrick-nijkamp.html) ([SCHERP Ontwikkeling](http://www.scherpontwikkeling.nl)) | New placeholders   |

## Загрузка и установка

Установите пакет через менеджер пакетов MODX®.

## StoreLocator в менеджере

## Добавление магазинов

Войдите в менеджер и откройте «Components» -> «Store Locator». На странице «Manage stores» нажмите «Add store location». Откроется окно:

![](store_location.png)

Заполните описание, координаты longitude и latitude и выберите ресурс для привязки. Ресурс попадёт в storeRowTpl, оттуда доступны плейсхолдеры на фронтенде. Чтобы не вводить координаты вручную, введите адрес рядом с «Address:» и нажмите search. Скрипт отправит запрос в Google Maps и получит координаты.

## Сортировка магазинов

В менеджере откройте «Components» -> «Store Locator». В таблице перетащите строку на нужное место.

![](sort.png)

## StoreLocator на фронтенде

## Размещение сниппета

Разместите основной вызов `[[[StoreLocator](extras/storelocator "StoreLocator")]]` на странице. Сниппет задаёт плейсхолдеры:

| Placeholder name               | Content                               |
| ------------------------------ | ------------------------------------- |
| `[[+StoreLocator.map]]`        | Вид Google Map                        |
| `[[+StoreLocator.form]]`       | Форма поиска StoreLocator             |
| ?`[[+StoreLocator.storeList]]` | Список магазинов и результатов поиска |

Параметры сниппета StoreLocator:

| Parameter          | Description                                                            | Values                                                      | Default Value        | Required |
| ------------------ | ---------------------------------------------------------------------- | ----------------------------------------------------------- | -------------------- | -------- |
| apiKey             | Google Maps API key                                                    | A Google API key                                            | (empty)              | no       |
| zoom               | Zoom при инициализации карты                                           | A number between 1 - 15                                     | 8                    | no       |
| storeZoom          | Zoom при клике по магазину в списке                                    | A number between 1 - 15                                     | 13                   | no       |
| searchZoom         | Zoom после поиска, когда карта центрируется на адресе                | A number between 1 - 15                                     | 13                   | no       |
| width              | Ширина карты                                                           | A value in pixels                                           | 300                  | no       |
| height             | Высота карты                                                           | A value in pixels                                           | 400                  | no       |
| mapType            | Тип Google Map                                                         | `HYBRID,ROADMAP,SATELLITE,TERRAIN`                          | ROADMAP              | no       |
| defaultRadius      | Радиус по умолчанию в форме поиска                                     | 5, 10, 25, 50, 100                                          | 5                    | no       |
| centerLongitude    | Longitude центра карты по умолчанию                                    | Longitude coordinates                                       | 6.61480              | no       |
| centerLatitude     | Latitude центра карты по умолчанию                                     | Latitude coordinates                                        | 52.40441             | no       |
| markerImage        | URL изображения вместо маркера Google Map                              | A URL                                                       | 0                    | no       |
| sortDir            | Направление сортировки списка                                          | `ASC,DESC `                                                 | ASC                  | no       |
| limit              | Максимум магазинов по умолчанию и в результатах поиска                 | 0 means all records, any other number limits the resultlist | 0                    | no       |
| formTpl            | Чанк формы                                                             | A chunk name                                                | sl.form              | no       |
| storeRowTpl        | Чанк строки магазина в списке и результатах                            | A chunk name                                                | sl.storerow          | no       |
| storeInfoWindowTpl | Чанк info window при клике по маркеру                                  | A chunk name                                                | sl.infowindow        | no       |
| noResultsTpl       | Чанк при отсутствии результатов                                        | A chunk name                                                | sl.noresultstpl      | no       |
| scriptWrapperTpl   | Script wrapper (меняйте только если понимаете зачем)                   | A chunk name                                                | sl.scriptwrapper     | no       |
| scriptStoreMarker  | Script store marker (меняйте только если понимаете зачем)              | A chunk name                                                | sl.scriptstoremarker | no       |

## Примеры

Основной вызов сниппета и размещение плейсхолдеров. Все параметры опциональны.

```php
[[!StoreLocator?
    &searchZoom=`10`
    &zoom=`7`
    &markerImage=`/assets/mcdonalds.png`
    &width=`640`
    &height=`480`
    &centerLongitude=`5.509644`
    &centerLatitude=`52.469397`
]]

<table>
   <tr>
      <td style="width: 640px;">
        [[+StoreLocator.map]]        <!-- This shows the google map -->
      </td>
      <td style="vertical-align: top;">
        [[+StoreLocator.form]]       <!-- This shows the search form -->
        <hr />
        [[+StoreLocator.matchedStores]] / [[+StoreLocator.totalStores]] <!-- This shows number of found stores / total stores -->
        [[+StoreLocator.storeList]]  <!-- This shows the list of stores and search results -->
      </td>
   </tr>
</table>
```

## Пример на YouTube

Пример размещения сниппета: [http://www.youtube.com/watch?v=\_\_5Oi4Tqz50](http://www.youtube.com/watch?v=__5Oi4Tqz50)

## StoreLocator premium

StoreLocator premium можно купить на экране about компонента. Добавляется:

- Custom caching (storelist and search results)
- Custom marker images for each individual store
- Possibility to get directions from the entered address to a store from the StoreLocator screen
- A snippet that can plot directions to a specific store from an entered address.

Видео:
Custom marker images: <http://www.youtube.com/watch?v=keUjHDmOJnw>
Directions / route planner: <http://www.youtube.com/watch?v=FOAWcdoFysk>

## Внешние источники

Developers website: <http://www.scherpontwikkeling.nl>

GitHub repository: <http://www.github.com/b03tz/StoreLocator/>

Report bugs and request features: <http://www.github.com/b03tz/StoreLocator/issues>

Help requests: <http://forums.modx.com/thread/74885/support-topic-for-storelocator-1-0-pl-1>
