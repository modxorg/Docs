---
title: "fieldSetDefaults"
description: "Сниппет для задания значений по умолчанию последующим вызовам field"
translation: "extras/formitfastpack/fieldsetdefaults"
---

## Использование

Вызывайте перед любыми сниппетами field с любыми параметрами, которые используют сниппеты field. Это обновит значения по умолчанию для последующих сниппетов field на переданные в fieldSetDefaults на время запроса.

fieldSetDefaults можно вызывать неограниченное число раз, чтобы обновлять значения по умолчанию.

**Чтобы сбросить значения по умолчанию**, используйте параметр resetDefaults: `[[!fieldSetDefaults? &resetDefaults=`1`]]`

## Возможные проблемы

fieldSetDefaults **не может переопределить параметры, сохранённые в наборах свойств**. Если вы добавите набор свойств к сниппету field, значения по умолчанию из набора свойств переопределят все остальные значения по умолчанию.

Сниппет fieldSetDefaults **должен обрабатываться MODX раньше целевых сниппетов field**. Чтобы избежать проблем:

- Вызывайте fieldSetDefaults выше сниппетов field, желательно в том же чанке или шаблоне.
- Если сниппеты field вызываются в чанках или шаблонах отдельно от fieldSetDefaults, убедитесь, что fieldSetDefaults находится во «внешних» элементах.

## Примеры

Измените параметр &outer\_type для двух групп сниппетов field:

``` php
[[!fieldSetDefaults? &outer_type=`personal`]]
[[!field? &name=`first_name`]]
[[!field? &name=`last_name`]]
[[!fieldSetDefaults? &outer_type=`company`]]
[[!field? &name=`company_name`]]
[[!field? &name=`company_address`]]
```
