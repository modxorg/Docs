---
title: "NrFormat"
description: "Output filter MoneyBirdNrFormat для форматирования цен"
translation: "extras/moneybird/moneybird.nrformat"
---

## Использование

Пример MoneyBird NrFormat:

``` php
[[+placeholder:MoneyBirdNrFormat]]
```

Можно указать опции:

``` php
[[+placeholder:MoneyBirdNrFormat=`d=2&ds=,&ts=.`]]
```

Дополнительные опции см. ниже.

## Опции

d - Количество знаков после запятой
ds - Разделитель дробной части
ts - Разделитель тысяч
s - Символ перед ценой с пробелом

## См. также

1. [MoneyBird.Contacts](extras/moneybird/moneybird.contacts)
2. [MoneyBird.Invoices](extras/moneybird/moneybird.invoices)
3. [MoneyBird.NrFormat](extras/moneybird/moneybird.nrformat)
