---
title: "OnTemplateVarBeforeSave"
translation: "extending-modx/plugins/system-events/ontemplatevarbeforesave"
---

## Событие: OnTemplateVarBeforeSave

Загружается прямо перед сохранением переменной шаблона в базе данных.

Служба: 1 - Parser Service Events
Group: Template Variables

## Параметры события

| Имя         | Описание                                                                                                                                                                        |
| ----------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| mode        | Either 'new' or 'upd', depending on the circumstances.                                                                                                                          |
| templateVar | Экземпляр класса modTemplateVar.                                                                                                                                                |
| cacheFlag   | Указывает, следует ли сохранять в кэше сохраненный TV и, необязательно, указав целочисленное значение за сколько секунд до истечения срока действия. Всегда возвращается 'true' |

## Remarks

| Предыдущее событие | —                                                                                                                                     |
| ------------------ | -------------------------------------------------------------------------------------------------------------------------------------- |
| Следующее событие  | [OnTemplateVarSave](extending-modx/plugins/system-events/ontemplatevarsave "OnTemplateVarSave")                                        |
| File               | [core/model/modx/modtemplatevar.class.php](https://github.com/modxcms/revolution/blob/master/core/model/modx/modtemplatevar.class.php) |
| Class              | modTemplateVar                                                                                                                         |
| Method             | public function save($cacheFlag = null)                                                                                                |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
