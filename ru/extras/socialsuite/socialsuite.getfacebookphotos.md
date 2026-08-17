---
title: "getFacebookPhotos"
description: "Сниппет SocialSuite для вывода альбомов и фото профиля Facebook"
translation: "extras/socialsuite/socialsuite.getfacebookphotos"
---

Сниппет getFacebookPhotos формирует списки альбомов и фото профиля Facebook (пользователя или страницы). В текущей версии работает только с **публичными** данными. Всё активно кэшируется ради производительности. Для более свежих данных настройте свойства кэша.

getFacebookPhotos использует собственный кэш, поэтому его можно вызывать **без кэша MODX**.

## Доступные свойства

Список актуален для версии 1.0.0. Обязательные свойства выделены **жирным**.

| Property                    | Accepted Values                      | Description                                                                                                                                                                                                                                                                                                                                                                                                                                                                     | Default Value                    |
| --------------------------- | ------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------- |
| **user**                    | ID or name                           | Имя или ID пользователя или страницы, откуда загружать фото. Например "modxcms" для [страницы MODX в Facebook](https://www.facebook.com/modxcms).                                                                                                                                                                                                                                                                                                                      |                                  |
| albums                      | comma separated list of IDs or names | Чтобы показать только выбранные альбомы, укажите их имена или ID через запятую. Имя альбома можно изменить, поэтому лучше использовать ID.                                                                                                                                                                                                                                                 |                                  |
| perAlbum                    | 1 or 0                               | Группировать изображения по альбомам. Включает свойство **albumTpl** как обёртку для каждого альбома.                                                                                                                                                                                                                                                                                                                                                                 | 1 (true)                         |
|                             |                                      |                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 |                                  |
|                             |                                      | **Templates & Output**                                                                                                                                                                                                                                                                                                                                                                                                                                                          |                                  |
| albumTpl                    | name of a chunk                      | Чанк-обёртка для набора изображений конкретного альбома. Используется только при включённом **perAlbum**.                                                                                                                                                                                                                                                                                                                                                      | See Templating - albumTpl below. |
| albumSeparator              | anything                             | Строка-разделитель между альбомами.                                                                                                                                                                                                                                                                                                                                                                                                                                           | `<br />`                         |
| outerTpl                    | name of a chunk                      | Чанк-обёртка для всего результата, включая альбомы и их изображения.                                                                                                                                                                                                                                                                                                                                                                                            | See Templating - outerTpl below. |
| photoTpl                    | name of a chunk                      | Чанк для отдельного изображения.                                                                                                                                                                                                                                                                                                                                                                                                                                         | See Templating - photoTpl below. |
| photoSeparator              | anything                             | Строка-разделитель между изображениями.                                                                                                                                                                                                                                                                                                                                                                                                                                           | \\n (linebreak)                  |
|                             |                                      |                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 |                                  |
|                             |                                      | **Pagination**                                                                                                                                                                                                                                                                                                                                                                                                                                                                  |                                  |
| offset                      | number                               | С какой позиции начинать выборку для пагинации getPage или чтобы пропустить первые элементы.                                                                                                                                                                                                                                                                                                                                                                         | 0                                |
| limit                       | number                               | Число элементов на страницу для getPage или общий лимит без пагинации.                                                                                                                                                                                                                                                                                                                                                                                        | 20                               |
|                             |                                      |                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 |                                  |
|                             |                                      | **Caching**                                                                                                                                                                                                                                                                                                                                                                                                                                                                     |                                  |
| cacheOutput                 | 1 or 0                               | При включении кэшируется вывод, включая содержимое чанков, для ещё большей производительности. Тогда чтобы увидеть изменения в tpl-чанках, нужно явно задать другую опцию сниппета, вручную очистить каталог core/cache/socialsuite/\_processed/facebook/photos/ или дождаться истечения кэша изображений или альбомов. По умолчанию выключено.                                                                                           | 0 (false)                        |
| cacheExpires                | number (seconds)                     | Время в секундах, в течение которого действует кэш альбомов. Кэш альбомов содержит список имён и ID альбомов, а также сырые данные Graph API Facebook. При запросе альбомов все их изображения запрашиваются одним большим запросом вместо множества маленьких. Это заметно ускорило работу.                                                                                                                           | 172800 (= 2 days)                |
| cacheExpiresPhotos          | number (seconds)                     | Время в секундах, в течение которого действует кэш фото. См. также cacheExpiresPhotosVariation ниже. Фото кэшируются по альбомам, в кэше сырые данные Graph API Facebook через FQL. Это значение не может быть больше cacheExpires: при загрузке альбомов для каждого альбома сразу подтягиваются все фото и кэш обновляется. Да, значение по умолчанию здесь действительно выглядит странно :P | 345600 (= 4 days)                |
| cacheExpiresPhotosVariation | number (seconds)                     | Если cacheExpiresPhotos меньше cacheExpires, кэш фото в отдельных альбомах обновляется раньше полного кэша альбомов. Тогда новые фото в альбомах могут появиться \*раньше\*, чем новые альбомы.                                                                                                                                                                                              |

Кэш альбомов загружает все альбомы и все их фото одним оптимизированным запросом. Если внезапно истечёт только кэш фото, все видимые альбомы начнут делать мелкие запросы к Facebook, и производительность проседает. Свойство cacheExpiresPhotosVariation сглаживает это, разносит моменты истечения кэша фото.

Допустим, getFacebookPhotos показывает три альбома с cacheExpires 2 дня и cacheExpiresPhotos 12 часов. Каждые 12 часов Facebook получит 3 запроса фото для этих альбомов. Без cacheExpiresPhotosVariation срок истечения у каждого альбома совпадал бы, и одному посетителю пришлось бы ждать 3 ответа от Facebook (это не всегда быстро). Тогда включается cacheExpiresPhotosVariation. При значении 1 час (по умолчанию) срок кэша фото для каждого альбома случайно попадает в диапазон ±1 час от cacheExpiresPhotos: в нашем примере между 11 и 13 часами. Один посетитель не ждёт 3 запроса подряд, нагрузка распределяется на трёх. Win-win-win-win! | 3600 ( = 1 hour) |

## Шаблоны

Для ленты фото Facebook доступны три чанка: photoTpl для каждого фото, albumTpl для обёртки альбомов при включённом perAlbum и outerTpl для всего вывода.

Ниже значения по умолчанию и доступные плейсхолдеры.

### photoTpl

Чанк по умолчанию:

``` php
<li>
    <img src="[[+src_small]]" width="[[+src_small_width]]" height="[[+src_small_height]]" />
</li>
```

Плейсхолдеры для photoTpl. Часть может быть недоступна из-за прав.

| Placeholder        | Type        | Description                                                                                                                                                   |
| ------------------ | ----------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| object\_id         | int         | object\_id фото.                                                                                                                                  |
| pid                | string      | ID запрашиваемого фото. pid не длиннее 50 символов.                                                                               |
| aid                | string      | ID альбома с этим фото. aid не длиннее 50 символов.                                                          |
| owner              | string      | ID пользователя-владельца фото.                                                                                                          |
| src\_small         | string      | URL миниатюры. Максимум 75px по ширине и 225px по высоте. URL может быть пустым. |
| src\_small\_width  | int         | Ширина миниатюры в px. Может быть пустой.                                                                                               |
| src\_small\_height | int         | Высота миниатюры в px. Может быть пустой.                                                                                              |
| src\_big           | string      | URL полноразмерной версии. Максимум 960px по ширине или высоте.                                           |
| src\_big\_width    | int         | Ширина полноразмерной версии в px. Может быть пустой.                                                                                              |
| src\_big\_height   | int         | Высота полноразмерной версии в px. Может быть пустой.                                                                                             |
| src                | string      | URL версии для просмотра альбома. Максимум 130px по ширине или высоте. URL может быть пустым.                    |
| src\_width         | int         | Ширина версии для альбома в px. Может быть пустой.                                                                                              |
| src\_height        | int         | Высота версии для альбома в px. Может быть пустой.                                                                                             |
| link               | string      | URL страницы Facebook с этим фото.                                                                                           |
| caption            | string      | Подпись к фото.                                                                                                                      |
| created            | time (unix) | Дата добавления фото. Форматируйте output filter "date".                                                                        |
| modified           | time (unix) | Дата последнего изменения фото. Форматируйте output filter "date".                                                                |
| position           | int         | Позиция фото в альбоме.                                                                                                                       |
| album\_object\_id  | int         | object\_id альбома, к которому относится фото.                                                                                                             |
| place\_id          | int         | Facebook ID места, связанного с фото, если есть.                                                                                                   |
| images             | array       | Массив объектов с width, height, source для разных размеров. Пример: `[[+images.2.source]]`.                                |
| like\_info         | object      | Информация о лайках: can\_like, like\_count, user\_likes.                                         |
| comment\_info      | object      | Информация о комментариях: can\_comment и comment\_count.                                              |
| can\_delete        | bool        | true, если зритель может удалить фото.                                                                                                                |

### albumTpl

Чанк albumTpl по умолчанию. Для использования нужен включённый perAlbum.

``` php
 <h2><a href="[[+link]]">[[+name]]</a> <span>([[+photo_count]] photos, created on [[+created:date=`%d/%m/%Y`]])</span></h2>
<div>
    <ul>
        [[+photos]]
    </ul>
</div>
```

Доступные плейсхолдеры. Часть может быть недоступна из-за прав:

| Placeholder       | Type        | Description                                                                                                                                                                                                 |
| ----------------- | ----------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| photos            |             | Фото альбома, разобранные через photoTpl.                                                                                                                                             |
| aid               | string      | ID альбома                                                                                                                                                                                                |
| object\_id        | int         | object\_id альбома в Facebook. Идентифицирует equivalentAlbum в Graph API. object\_id также можно использовать для комментариев к альбому через Graph API Comments |
| owner             | int         | ID пользователя-владельца альбома                                                                                                                                                                       |
| cover\_pid        | string      | ID обложки альбома                                                                                                                                                                             |
| cover\_object\_id | int         | object\_id обложки альбома                                                                                                                                                                            |
| name              | string      | Название альбома                                                                                                                                                                                      |
| created           | time (unix) | Время создания альбома в формате unix time.                                                                                                                                    |
| modified          | time (unix) | Время последнего обновления альбома в формате unix time.                                                                                                                                         |
| description       | string      | Описание альбома                                                                                                                                                                                |
| location          | string      | Местоположение альбома                                                                                                                                                                                   |
| size              | int         |                                                                                                                                                                                                             |
| link              | string      | Ссылка на альбом в Facebook                                                                                                                                                                            |
| visible           | string      | Видимость только для владельца альбома. Кто может видеть альбом.                                                                                                                                           |
| modified\_major   | time (unix) | Время последнего крупного обновления (например, добавления фото) в формате unix time.                                                                                            |
| edit\_link        | string      | URL редактирования альбома                                                                                                                                                                               |
| type              | string      | Тип альбома: profile, mobile, wall или normal.                                                                                                                                            |
| can\_upload       | bool        | Может ли указанный UID загружать в альбом.                                                                                                                                                     |
| photo\_count      | int         | Число фото в альбоме                                                                                                                                                                          |
| video\_count      | int         | Число видео в альбоме                                                                                                                                                                           |
| like\_info        | object      | Информация о лайках альбома: can\_like, like\_count, user\_likes                                                                                        |
| comment\_info     | object      | Информация о комментариях альбома: can\_comment и comment\_count                                                                                            |

### outerTpl

outerTpl по умолчанию:

``` php
 <ul>
    [[+photos]]
</ul>
```

В этом шаблоне доступен только плейсхолдер "photos".

## Примеры

Вариантов много!

### Простой пример: группировка фото по альбомам с шаблонами по умолчанию

Вызов сниппета:

``` php
[[!getFacebookPhotos?
    &user=`modxcms`
    &perAlbum=`1`
]]
```

без настройки даёт такой вывод:

``` php
<h2><a href="http://www.facebook.com/album.php?fbid=437577137979&id=19110642979&aid=235059">Profile Pictures</a> <span class="smalldate">(1 photos, created on 12/09/2010)</span></h2>
<div class="gfp-photos-wrapper">
    <ul>
        <li class="gfp-photo">
    <img src="http://photos-a.ak.fbcdn.net/hphotos-ak-snc6/179529_10150898281902980_465676445_t.jpg" width="75" height="75" />
</li>

    </ul>
</div>
<br />


<h2><a href="http://www.facebook.com/album.php?fbid=10150883337702980&id=19110642979&aid=434455">CMS Expo 2012</a> <span class="smalldate">(33 photos, created on 12/05/2012)</span></h2>
<div class="gfp-photos-wrapper">
    <ul>
        <li class="gfp-photo">
    <img src="http://photos-c.ak.fbcdn.net/hphotos-ak-ash3/529915_10150883341757980_1041537877_t.jpg" width="75" height="56" />
</li>

<li class="gfp-photo">
    <img src="http://photos-d.ak.fbcdn.net/hphotos-ak-ash3/537753_10150883341637980_1323647473_t.jpg" width="75" height="56" />
</li>
<!-- ... -->
<li class="gfp-photo">
    <img src="http://photos-c.ak.fbcdn.net/hphotos-ak-ash3/534903_10150883337842980_1414876671_t.jpg" width="75" height="50" />
</li>

    </ul>
</div>
<!-- ... -->
```
