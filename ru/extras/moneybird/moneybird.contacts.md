---
title: "Contacts"
description: "Сниппет MoneyBirdContacts для списка контактов пользователя"
translation: "extras/moneybird/moneybird.contacts"
---

## Использование

Пример MoneyBird Contacts:

``` php
[[!MoneyBirdContacts]]
```

Можно указать шаблоны:

``` php
[[!MoneyBirdContacts? &tpl=`mbContact` &outerTpl=`mbContacts`]]
```

Дополнительные опции см. в свойствах ниже.

## Свойства

MoneyBirdContacts поддерживает свойства конфигурации для настройки поведения.

| Имя              | Описание                                                                                                             | По умолчанию |
| ---------------- | -------------------------------------------------------------------------------------------------------------------- | ------------ |
| tpl              | (Обяз.) Чанк шаблона для одной записи контакта                                                                       | mbContact    |
| outerTpl         | (Необ.) Внешний шаблон для списка (используйте `[[+wrapper]]`)                                                       | mbContacts   |
| toPlaceholder    | (Необ.) Имя плейсхолдера для вывода вместо прямого return                                                            |              |
| outputSeparator  | (Необ.) Разделитель между элементами. По умолчанию перевод строки ("\\n")                                            |              |
| limit            | (Необ.) Ограничение результатов. Применяется только если больше 0.                                                   | 0            |
| offset           | (Необ.) С какой позиции начинать список.                                                                             | 0            |
| totalVar         | (Необ.) Имя плейсхолдера с абсолютным total. По умолчанию "total".                                                    | total        |
| filterKey        | (Необ.) Имя ключа для фильтра. По умолчанию "mbc".                                                                   | mbc          |
| invoicesResource | (Необ.) ID ресурса со сниппетом MoneyBirdInvoices. По умолчанию текущий.                                             | _current_    |
| showNone         | (Необ.) Показывать опцию «none» в списке фильтра. По умолчанию true.                                                 | 0            |
| cacheExpire      | (Необ.) Время истечения кеша и пересборки. По умолчанию 86400 (24 часа). Минимум 900 (15 минут)                      | 86400        |

## См. также

1. [MoneyBird.Contacts](extras/moneybird/moneybird.contacts)
2. [MoneyBird.Invoices](extras/moneybird/moneybird.invoices)
3. [MoneyBird.NrFormat](extras/moneybird/moneybird.nrformat)
