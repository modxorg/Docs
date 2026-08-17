---
title: "MODx.util.Format.dateFromTimestamp"
translation: "extending-modx/custom-manager-pages/modext/modx.util.format.datefromtimestamp"
---

## MODx.util.Format.dateFromTimestamp

Доступен в MODX **3.0+** (хелперы даты/времени менеджера). Превращает Unix-время в строку по форматам даты и времени менеджера из системных настроек (`manager_date_format`, `manager_time_format`).

Вызывайте в сетках и панелях CMP, когда показываете время файлов или другие Unix-метки и хотите тот же вид, что в ядре менеджера.

Определён в `manager/assets/modext/util/utilities.js` в объекте `MODx.util.Format`.

## Параметры

| Имя | Описание | По умолчанию |
| --- | -------- | ------------ |
| timestamp | Unix-время. Значение из десяти цифр считается секундами и переводится в миллисекунды. Если число не больше нуля, вернётся `defaultValue`. | |
| date | При `true` добавляет `MODx.config.manager_date_format`. | `true` |
| time | При `true` добавляет `MODx.config.manager_time_format`. | `true` |
| defaultValue | Возвращается при неверном timestamp или когда и `date`, и `time` равны false. | `''` |

## Возвращаемое значение

Отформатированная строка через Ext `Date.format`, либо `defaultValue`.

Если включены и дата, и время, части соединяются одним пробелом.

## Примеры

Дата и время в форматах менеджера:

```javascript
MODx.util.Format.dateFromTimestamp(1704067200);
```

Только дата:

```javascript
MODx.util.Format.dateFromTimestamp(record.data.lastmod, true, false);
```

Запасная строка, если значения нет:

```javascript
MODx.util.Format.dateFromTimestamp(0, true, true, _('none'));
```
