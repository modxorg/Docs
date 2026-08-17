---
title: "If"
description: "Условный сниппет для логических проверок в MODX"
translation: "extras/if/index"
---

## Что такое If?

Логический условный сниппет для условий в MODX.

## История

If написали Jason Coward (opengeek) и Shaun McCormick (splittingred), первый релиз. 29 октября 2009 года.

### Загрузка

Установите через менеджер MODX Revolution в разделе [Package Management](developing-in-modx/advanced-development/package-management "Package Management"), или скачайте из репозитория MODX Extras: <https://modx.com/extras/package/if>

### Разработка и сообщения об ошибках

If хранится и разрабатывается на GitHub: <http://github.com/splittingred/If>

Баги: <http://github.com/splittingred/If/issues>

## Использование

Сниппет If вызывается тегами:

``` php
[[If]]
```

или без кэша, если subject может измениться до сброса кэша ресурса:

``` php
[[!If]]
```

### Доступные свойства

| Name     | Description                                                             | Default Value |
| -------- | ----------------------------------------------------------------------- | ------------- |
| subject  | Значение для проверки условия.                                |               |
| operator | Оператор сравнения subject с operand.                            | =             |
| operand  | При необходимости значение для сравнения с subject. |               |
| then     | Вывод при true.                                  |               |
| else     | Вывод при false.                                 |               |
| debug    | При true выводит все переданные свойства.                           | 0             |
| die      | При debug и true вызывает die() после вывода свойств.         | 0             |

### Доступные операторы

| Operator                                    | Description                                                                  |
| ------------------------------------------- | ---------------------------------------------------------------------------- |
| !=,neq,not,isnot,isnt,unequal,notequal      | subject не равен operand.                             |
| ==,=,eq,is,equal,equals,equalto             | subject равен operand.                               |
| <,lt,less,lessthan                          | subject меньше operand.                              |
| >,gt,greater,greaterthan                    | subject больше operand.                           |
| <=,lte,lessthanequals,lessthanorequalto     | subject меньше или равен operand.                  |
| >=,gte,greaterthanequals,greaterthanequalto | subject больше или равен operand.               |
| isempty,empty                               | subject пуст.                                              |
| !empty,notempty,isnotempty                  | subject не пуст.                                                  |
| isnull,null                                 | subject равен null.                                               |
| inarray,in\_array,ia                        | subject найден в списке operand (строка через запятую). |

## Примеры

Числовое сравнение:

``` php
[[!If? &subject=`[[+total]]` &operator=`GT` &operand=`3` &then=`You have more than 3 items!`]]
```

Строковое сравнение:

``` php
[[!If?
   &subject=`[[+name]]`
   &operator=`EQ`
   &operand=`George`
   &then=`Hey George! Long time no see!`
   &else=`You're not George. Go away.`
]]
```

Inline вызовы сниппетов:

``` php
[[!If?
   &subject=`[[+modx.user.id]]`
   &operator=`EQ`
   &operand=`0`
   &then=`[[Login]]`
   &else=`[[Logout]]`
]]
```

Для полей ресурса или TV (значения не меняются до сброса кэша) используйте **кэшированный** вызов If:

``` php
[[If?
   &subject=`[[*hidemenu]]`
   &operator=`EQ`
   &operand=`1`
   &then=`This resource is not visible in the menu.`
   &else=`This resource shows up in the menu in spot [[*menuindex]].`
]]
```

Пример с in\_array:

``` php
[[If?
   &subject=`[[*id]]`
   &operator=`inarray`
   &operand=`3,4`
   &then=`This text will show if id is 3 or 4.`
   &else=`This text is printed for all other resource id's.`
]]
```
