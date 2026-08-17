---
title: "tolinks"
description: "Сниппет tolinks превращает разделённый список в ссылки на теги"
translation: "extras/taglister/taglister.tolinks"
---

## Сниппет tolinks

Превращает список с разделителями в набор ссылок на теги. Обычно его используют на странице с таксономическими тегами, когда нужно вести на другие страницы с теми же тегами. Пример: <https://forums.modx.com/index.php/topic,61744.0/topicseen.html>

## Использование

Вызывайте tolinks обычным тегом сниппета. Передайте свойство `items` со списком элементов, `target` с ID ресурса для ссылок и `key` с именем GET-параметра в каждой ссылке.

## Свойства

| Name            | Example usage                    | Description                                                                            | Default Value |
| --------------- | -------------------------------- | -------------------------------------------------------------------------------------- | ------------- |
| items           | &items=`[[*myTemplateVar]]`      | Элементы, которые нужно превратить в ссылки.                                           |               |
| tpl             | &tpl=`linkTpl`                   | Имя чанка для каждого результата.                                                     | link          |
| target          | &target=`6`                      | ID ресурса, на который ведут ссылки.                                                   | 1             |
| inputDelim      | &inputDelim=`,`                  | Разделитель в свойстве items. По умолчанию запятая.                                    | ,             |
| outputDelim     | &outputDelim=`,`                 | Разделитель между выводимыми ссылками. По умолчанию запятая.                           | ,             |
| tagRequestParam | &tagRequestParam=`tag`           | Ключ REQUEST-переменной при формировании ссылок.                                       | tag           |
| cls             | &cls=`tagStyle`                  | CSS-класс для каждого результата.                                                      | tl-tag        |
| toPlaceholder   | &toPlaceholder=`placeholderName` | Если задано, вывод попадёт в этот плейсхолдер вместо прямого вывода.                   | false         |
| useTagsFurl     | &useTagsFurl=`1`                 | При значении 1 формирует полные ссылки на каждый тег.                                  | false         |
| tagKey          | &tagKey=`articlestags`           | Имя группы тегов, используется при формировании ссылок                                 | tags          |
| tagKeyVar       | &tagKeyVar=`MyCustomVar`         | Задаёт ключ GET-переменной                                                           |

Например,
`[[tolinks? &tagKey=`articlestags`&tagKeyVar=`MyCustomVar`]]`

формирует [http://f.qdn.com/somepage?MyCustomVar=articlestags&tag=theTag](http://f.qdn.com/somepage?MyCustomVar=articlestags&tag=theTag) | key |

## Чанки tolinks

tolinks обрабатывает 1 чанк. Соответствующий параметр:

- [tpl](extras/taglister/taglister.tolinks/tpl "tpl"): чанк для каждой сформированной ссылки.

## Примеры

Превратите значение TV `tags` в ссылки на ресурс 123 с GET-параметром `tag`:

```php
[[!tolinks? &items=`[[*tags]]` &key=`tag` &target=`123`]]

```

**Будьте внимательны**
**toLinks** формирует _относительные_ URL к ресурсу из параметра **&target**. Если ссылки ведут не туда, добавьте чанк для параметра **&tpl** с таким содержимым: [`[[+item]]`]([[++site_url]][[+url]])

Либо включите свойство **&useTagsFurl**.

Ресурс из параметра **&target** должен содержать вывод записей с выбранным тегом, например:

```php
[[!getResourcesTag?
    &element=`getResources`
    &elementClass=`modSnippet`
    &tpl=`blogPost`
    &hideContainers=`1`
    &pageVarKey=`page`
    &parents=`59`
    &includeTVs=`1`
    &includeContent=`1` ]]
    [[!+page.nav:notempty=`
    [[!+page.nav]]
`]]
```

## См. также

1. [tagLister.getResourcesTag](extras/taglister/taglister.getresourcestag)
2. [tagLister.tagLister](extras/taglister/taglister)
    1. [tagLister.tagLister.all](extras/taglister/taglister/all)
    2. [tagLister.tagLister.tpl](extras/taglister/taglister/tpl)
3. [tagLister.tolinks](extras/taglister/taglister.tolinks)
    1. [tagLister.tolinks.tpl](extras/taglister/taglister.tolinks/tpl)
