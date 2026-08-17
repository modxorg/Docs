---
title: "Invoices"
description: "Сниппет MoneyBirdInvoices для списка счетов пользователя"
translation: "extras/moneybird/moneybird.invoices"
---

## Использование

Пример MoneyBird Invoices:

``` php
[[!MoneyBirdInvoices]]
```

Можно указать шаблоны:

``` php
[[!MoneyBirdInvoices? &tpl=`mbInvoice` &outerTpl=`mbInvoices`]]
```

Дополнительные опции см. в свойствах ниже.

## Свойства

MoneyBirdInvoices поддерживает свойства конфигурации для настройки поведения.

| Имя             | Описание                                                                                                             | По умолчанию |
| --------------- | -------------------------------------------------------------------------------------------------------------------- | ------------ |
| tpl             | (Обяз.) Чанк шаблона для одной записи счёта                                                                          | mbInvoice    |
| outerTpl        | (Необ.) Внешний шаблон для списка (используйте `[[+wrapper]]`)                                                       | mbInvoices   |
| toPlaceholder   | (Необ.) Имя плейсхолдера для вывода вместо прямого return                                                            |              |
| outputSeparator | (Необ.) Разделитель между элементами. По умолчанию перевод строки ("\\n")                                            |              |
| limit           | (Необ.) Ограничение результатов. Применяется только если больше 0.                                                   | 0            |
| offset          | (Необ.) С какой позиции начинать список.                                                                             | 0            |
| totalVar        | (Необ.) Имя плейсхолдера с абсолютным total. По умолчанию "total".                                                   | total        |
| filterKey       | (Необ.) Имя ключа для фильтра. По умолчанию "mbc".                                                                   | mbc          |
| cacheExpire     | (Необ.) Время истечения кеша и пересборки. По умолчанию 86400 (24 часа). Минимум 900 (15 минут)                      | 86400        |

## См. также

1. [MoneyBird.Contacts](extras/moneybird/moneybird.contacts)
2. [MoneyBird.Invoices](extras/moneybird/moneybird.invoices)
3. [MoneyBird.NrFormat](extras/moneybird/moneybird.nrformat)
