---
title: "fastField"
translation: "extras/fastfield"
description: "fastField помогает получить значение поля, включая TV переменные и свойства, другого ресурса, а также может добыть значения суперглобальных переменных PHP"
---

## Что такое fastField?

fastField - это плагин, который добавляет новый тип тега `[[# ...]]`. Его можно использовать для отображения одного поля, включая TV переменные и свойства, другого ресурса для MODX Revolution 2.2+. Он также может отображать значение суперглобальных PHP переменных $\_POST, $\_GET и других.

## История

fastField был впервые вышел в свет 29 Ноября 2012 года автором [argnist](https://modx.com/extras/author/argnist).

## Скачать

Плагин можно получить через менеджер пакетов или загрузить вручную по [ссылке](https://modx.com/extras/package/fastfield).

## Использование

Структура тега следующая: `[[#resource_id.field]]`

где `resource_id` - идентификатор необходимого ресурса, например "123", а поле `field` - это поле ресурса, например "заголовок страницы" (pagetitle). Для переменных шаблона (TV) поле должно начинаться с "tv.". Для свойств ресурса перед ним должен был префикс "properties." "property.".

Для использования с глобальными массивами вы должны заменить `resource_id` именем массива, например "post" и поле с именем переменной.

В целом этот плагин заменяет [getResourceField](extras/getresourcefield) and [getReqParam](https://modx.com/extras/package/getreqparam) сниппеты.

## Examples

Получить заголовок pagetitle страницы из ресурса с идентификатором 123:

```php
[[#123.pagetitle]]
```

Вернуть значение поля introtext родителя текущего ресурса и отобразить значение поля description, если introtext пусто:

```php
[[#[[*parent]].introtext:default=`[[#[[*parent]].description]]`]]
```

Или, что более эффективно (см. [Эту статью в MODX блоге](https://modx.com/blog/2012/09/14/tags-as-the-result-or-how-conditionals-are-like-mosquitoes/)):

```php
[[[[#[[*parent]].introtext:default=`#[[*parent]].description`]]]]
```

Вернуть содержимое ресурсов в чанке `rowTpl` при использовании [Wayfinder](extras/wayfinder):

```php
[[#[[+wf.docid]].content]]
```

Получить TV изображение из ресурса с идентификатором 10:

```php
[[#10.tv.image]]
```

Получить `articlePerPage` свойство из ресурса с идентификатором 1 кастомного типа ресурса [Articles](extras/articles)

```php
[[#1.properties.articles.articlesPerPage]]
```

Вернуть значение `$_POST['myVar']`:

```php
[[!#post.myVar]]
```

Поддерживаемые глобальные массивы: `$_GET`, `$_POST`, `$_REQUEST`, `$_SERVER`, `$_FILES`, `$_COOKIE`, `$_SESSION`. Тип массива после # нечувствителен к регистру. Имя элемента массива чувствительно к регистру. Вы должны использовать некэшированный тег, например `[[!#get.name]]`, для кешированных ресурсов.

**ВНИМАНИЕ**: **Опасно использовать на странице незащищенные глобальные переменные. Например, используйте [выходной фильтр](/building-sites/tag-syntax/output-filters#modifikatory-vyvoda-stroki): `stripTags` для предотвращения XSS-атак (например, `[[!#get.name:stripTags]]`)!**

## Как это работает

MODX использует класс `modParser` для разбора тегов по умолчанию. Этот плагин добавляет класс `fastFieldParser`, расширяющий `modParser`. Таким образом, если `modParser` будет изменен в новой версии MODX, поведение плагина будет непредсказуемым.
