---
title: "Создание блога"
description: "Пошаговое создание контейнера Articles: вкладки настроек, шаблоны, пагинация, архивы и RSS"
translation: "extras/articles/creating-a-blog"
---

## Создание блога

Создать блог просто: щёлкните правой кнопкой по любому узлу в дереве ресурсов слева, наведите на «Create» и выберите «Create Articles Here»:

![](articles-cm.png)

Откроется экран создания Articles Container. По сути это блог с любым числом статей (записей).

### Первая вкладка

Дальше вы увидите экран редактирования:

![](articles-tab1.png)

На первой вкладке можно задать несколько полей:

1. **Container Title**: заголовок контейнера, то есть блога.
2. **Container Alias**: alias для friendly URL. Если контейнер в корне сайта и alias «blog», адрес будет www.mysite.com/blog/
3. **Description**: краткое описание блога.
4. **Menu Title**: заголовок блога в меню. По умолчанию берётся pagetitle, если поле пустое.
5. **Link Attributes**: HTML-атрибуты ссылки в меню.
6. **Hide from Menus**: если включено, блог не появится в меню сайта.
7. **Published**: если включено, блог опубликован и доступен на сайте.

Задайте контейнеру заголовок «My Blog» и alias «blog». Затем откройте вкладку «Template».

### Вкладка Template

На вкладке Template настраивают шаблон блога и параметры списка записей.

![](articles-tab2.png)

Поля вкладки:

1. **Uses Template**: [Template](making-sites-with-modx/structuring-your-site/templates "Templates") блога. Articles поставляет sample-шаблон, его можно заменить.
2. **Content**: «контент» блога. Здесь вы задаёте, как поле `[[*content]]` выводится в шаблоне контейнера Articles.
3. **Article Template**: шаблон по умолчанию для статей (можно переопределить у каждой статьи).
4. **Article Row Chunk**: chunk для записей на главной и в архивах. По умолчанию sample-chunk из пакета.
5. **Articles Per Page**: число записей в списке на блоге. По умолчанию 10.

Пока оставьте «Template» = «sample.ArticlesContainerTemplate» и «sample.ArticleTemplate» = «sample.ArticleTemplate».

Если меняете содержимое шаблонов, **обязательно** сначала продублируйте и переименуйте их. Любые правки sample-шаблонов пропадут при обновлении Articles.

Обратите внимание на поле «Content». Сейчас оно выглядит так:

``` php
[[+articles]]

[[+paging]]
```

Вы можете изменить разметку и расположение записей относительно пагинации. Сюда же можно добавить HTML и MODX-теги.

Откройте вкладку «Advanced Settings».

### Вкладка Advanced Settings

Здесь много полей в отдельных вертикальных вкладках:

![](articles-tab3.png)

- General Options
    - **Enable Update Services**: если включено, Articles при публикации статьи пингует Ping-o-Matic и отправляет заголовок и URL в крупные поисковики.
    - **Menu Index**: порядок ресурса в дереве. Обычно используется при динамическом выводе. Можно также менять перетаскиванием контейнера в дереве слева.
    - **Sort Field**: поле сортировки на главной и в архивах.
    - **Sort Direction**: направление сортировки на главной и в архивах (DESC или ASC).
    - **Include TVs in Listing**: если включено, значения TV попадают в listing chunks.
    - **Include TVs List**: необязательный список имён TemplateVar через запятую при включённом Include TVs. Если пусто, подключаются все TV шаблона ресурса.
    - **Process TVs in Listing**: если включено, TV обрабатываются в listing chunks.
    - **Process TVs List**: необязательный список имён TemplateVar при включённом Include TVs. Если пусто, обрабатываются все TV шаблона ресурса.
    - **Other Listing Parameters**: другие параметры для вызова getResources/getPage на странице списка. Указывайте в синтаксисе MODX-тега, как в вызове (например, `` &property=`value` ``).
- Pagination Options
    - **Articles Per Page**: число статей на странице списка.
    - **Pages Limit**: максимум страниц в элементах пагинации.
    - **Page Nav Tpl**: разметка одной кнопки навигации по страницам.
    - **Page Active Tpl**: разметка кнопки текущей страницы.
    - **Page First Tpl**: разметка кнопки первой страницы.
    - **Page Last Tpl**: разметка кнопки последней страницы.
    - **Page Previous Tpl**: разметка кнопки предыдущей страницы.
    - **Page Next Tpl**: разметка кнопки следующей страницы.
    - **Page Offset**: смещение записей для текущей страницы. Считается от переменной страницы из Page Var Key.
    - **Page Var Key**: ключ свойства текущей страницы.
    - **Total Var**: ключ плейсхолдера с общим числом записей в постраничной выборке.
    - **Page Nav Var**: ключ плейсхолдера для блока навигации по страницам.
- Archives Options
    - **Archive Listing Chunk**: chunk для каждого месяца или года в списке архива.
    - **Archive Listings to Show**: сколько месяцев или лет архива показывать.
    - **Archive By Month**: архивировать по месяцам или по годам. Да = по месяцам.
    - **Archive CSS Class**: CSS-класс для каждой строки архива.
    - **Archive Alternate CSS Class**: CSS-класс для чередующихся строк архива.
    - **Group By Year**: если 1, архив группируется по годам во вложенном списке. При 1 настройка Archive By Month игнорируется.
    - **Group By Year Chunk**: при Group By Year = 1 chunk-обёртка для группировки архива.
- Tagging Options
    - **Tag Listing Chunk**: chunk для тегов на страницах списка.
    - **Tag Listings to Show**: сколько тегов показывать в блоке популярных тегов.
    - **Tag CSS Class**: CSS-класс для каждой строки тега.
    - **Tag Alternate CSS Class**: CSS-класс для чередующихся строк тегов.
- RSS Options
    - **RSS Alias (Permalink)**: alias (permalink) RSS-ленты, добавляется к URL блога. Можно через запятую. Например, «rssfeed.rss» даст mysite.com/blog/rssfeed.rss.
    - **Number of RSS Items**: сколько последних записей в RSS.
    - **RSS Feed Chunk**: chunk шаблона RSS-ленты.
    - **RSS Item Chunk**: chunk одной записи в RSS.
- Latest Posts Options
    - **Latest Articles Chunk**: chunk для каждой записи в блоке Latest Articles.
    - **Latest Articles To Show**: сколько последних статей показывать.
    - **Latest Articles Offset**: начальный индекс списка последних статей.
- Notifications (_на скриншоте не показано, новое в Articles 1.4.1_)
    - **Send to Twitter**: если включено, при публикации статьи отправляет твит.
    - **Twitter Consumer Key**: необязательный ключ безопасности.
    - **Secret Twitter Consumer Key**: необязательный секретный токен доступа.
    - **Twitter Template**: шаблон твита. Плейсхолдеры: `[[+title]]` `[[+url]]` `[[+hashtags]]`
    - **Twitter Template (hashtags)**: если используется hashtags, задаёт максимум тегов в твите.
    - **URL Shortener**: сервис сокращения URL. Пустое значение отключает сокращение.

Подробнее о настройках комментариев читайте в документации [Quip](extras/quip "Quip").

Если меняете chunks здесь, дублируйте их или выберите другой chunk. Не правьте sample напрямую: при обновлении они перезапишутся.

Как выводить другие данные в шаблонах, см. на странице [Оформление Articles](extras/articles/theming-articles "Articles.Theming Articles").

## Заключение

Нажмите «Save», и блог готов. Кнопка «View» справа сверху откроет предпросмотр. Ниже вкладок на экране редактирования блога появится сетка, где можно создавать и править статьи.
