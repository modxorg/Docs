---
title: "pdoSitemap"
description: "Сниппет pdoSitemap для быстрой генерации sitemap.xml с кэшем и фильтрами ресурсов"
translation: "extras/pdoTools/Snippets/pdoSitemap"
---

pdoSitemap это сниппет, который легко создаёт sitemap для поисковых систем (sitemap.xml). Сниппет понимает параметры [GoogleSitemap][1] (через перевод в нативные) и может легко его заменить.

Главная особенность: гораздо более высокая скорость по сравнению с GoogleSitemap. На сайте [bezumkin.ru][2] с 1700 страницами генерация sitemap ускорилась ***в 12 раз***: с 8.4 секунд до 0.7.

По умолчанию проверка прав пользователя отключена. Можно включить параметром **&checkPermissions** (замедляет генерацию!):

```php
[[!pdoSitemap?
    &checkPermissions=`list`
]]
```

Генерация sitemap эффективнее, если исключать ресурсы из вывода, а не явно включать только нужные (см. примеры ниже).

## Параметры

*pdoSitemap* принимает все параметры [pdoTools][3]. Вот некоторые из них:

| Parameter          | Default value                                 | Description                                                                                                                                               |
| ------------------ | --------------------------------------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------- |
| **&sitemapSchema** | <http://www.sitemaps.org/schemas/sitemap/0.9> | Схема для sitemap.                                                                                                                          |
| **&forceXML**      | 1                                             | Принудительный вывод как XML.                                                                                                                                      |
| **&priorityTV**    |                                               | Необязательное поле с [priority][4] ресурса. Указанную TV нужно также добавить в **&includeTVs** |

### Шаблоны

#### &tpl

```xml
@INLINE <url>\n\t
<loc>[[+url]]</loc>\n\t
<lastmod>[[+date]]</lastmod>\n\t
<changefreq>[[+update]]</changefreq>\n\t
<priority>[[+priority]]</priority>\n
</url>
```

#### &tplWrapper

```xml
@INLINE <?xml version=\"1.0\" encoding=\"[[++modx_charset]]\"?>\n<urlset xmlns=\"[[+schema]]\">\n[[+output]]\n</urlset>
```

[Priority][4] и [Change frequency][5] ресурса определяются по дате последнего изменения документа:

| Время с последнего обновления документа     | Priority | Change frequency |
| ---------------------------------------------- | -------- | ---------------- |
| Меньше суток назад                            | 1.0      | daily            |
| Больше суток, но меньше недели          | 0.75     | weekly           |
| Больше недели, но меньше месяца | 0.5      | weekly           |
| Больше месяца назад                          | 0.25     | monthly          |

### Как создать ресурс sitemap.xml

1. Создайте документ в корне сайта. На вкладке ***Document*** выберите пустой шаблон. Введите «Title» (на ваш выбор) и задайте «Resource Alias» ***sitemap***. Отметьте «Hide From Menus» и «Published».
2. На вкладке ***Settings*** выберите XML как «Content Type».
3. Снимите галочку «Rich Text» и сохраните документ.
4. В «Content» документа только вызов сниппета pdoSitemap (см. примеры ниже).

### Примеры

Для sitemap контекста по умолчанию обычно достаточно:

```php
[[pdoSitemap]]
```

Sitemap только из указанных контейнеров:

```php
[[pdoSitemap?
    &parents=`10`
]]
```

Расширим пример: исключить ресурсы с id = 15 и 25 вместе с потомками:

```php
[[pdoSitemap?
    &parents=`10,-15,-25`
]]
```

Исключить ресурс с id = 25, но включить его потомков:

```php
[[pdoSitemap?
    &resources=`-25`
    &parents=`-15,10`
]]
```

Добавить контекст catalog (если web это контекст по умолчанию):

```php
[[pdoSitemap?
    &resources=`-25`
    &parents=`-15,10`
    &context=`web,catalog`
]]
```

Принудительно https в URL:

```php
[[pdoSitemap?
    &resources=`-25`
    &parents=`-15,10`
    &context=`web,catalog`
    &scheme=`https`
]]
```

Показать лог выполнения (не забудьте сменить content type ресурса на HTML):

```php
[[pdoSitemap?
    &resources=`-25`
    &parents=`-15,10`
    &context=`web,catalog`
    &showLog=`1`
    &forceXML=`0`
]]
```

[1]: http://rtfm.modx.com/extras/revo/googlesitemap
[2]: http://bezumkin.ru/sitemap.xml
[3]: extras/pdoTools/General_settings
[4]: http://www.sitemaps.org/protocol.html#prioritydef
[5]: http://www.sitemaps.org/protocol.html#changefreqdef
