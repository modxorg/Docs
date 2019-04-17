---
title: "OnTemplateVarSave"
translation: "extending-modx/plugins/system-events/ontemplatevarsave"
---

## Событие: OnTemplateVarSave

Загружается сразу после успешного сохранения переменной шаблона в базе данных.

Служба: 1 - Parser Service Events
Group: Template Variables

## Параметры события

| Имя         | Описание                                                                                                                                                                        |
| ----------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| mode        | Either 'new' or 'upd', depending on the circumstances.                                                                                                                          |
| templateVar | Экземпляр класса modTemplateVar.                                                                                                                                                |
| cacheFlag   | Указывает, следует ли сохранять в кэше сохраненный TV и, необязательно, указав целочисленное значение за сколько секунд до истечения срока действия. Всегда возвращается 'true' |

## Remarks

| Предыдущее событие | [OnTemplateVarBeforeSave](extending-modx/plugins/system-events/ontemplatevarbeforesave "OnTemplateVarBeforeSave")                      |
| ------------------ | -------------------------------------------------------------------------------------------------------------------------------------- |
| Следующее событие  | —                                                                                                                                     |
| File               | [core/model/modx/modtemplatevar.class.php](https://github.com/modxcms/revolution/blob/master/core/model/modx/modtemplatevar.class.php) |
| Class              | modTemplateVar                                                                                                                         |
| Method             | public function save($cacheFlag = null)                                                                                                |

## Смотри также

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
