---
title: "OnTemplateVarRemove"
translation: "extending-modx/plugins/system-events/ontemplatevarremove"
---

## Событие: OnTemplateVarRemove

Загружается сразу после успешного удаления переменной шаблона.

Служба: 1 - Parser Service Events
Group: Template Variables

## Параметры события

| Имя         | Описание                                                                                                                                                                                              |
| ----------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| templateVar | Экземпляр класса modTemplateVar.                                                                                                                                                                      |
| cacheFlag   | Указывает, следует ли сохранять в кэше сохраненный TV и, необязательно, указав целочисленное значение за сколько секунд до истечения срока действия. Всегда возвращается 'true' Returns always 'true' |

## Remarks

| Предыдущее событие | [OnTemplateVarBeforeRemove](extending-modx/plugins/system-events/ontemplatevarbeforeremove "OnTemplateVarBeforeRemove")                |
| ------------------ | -------------------------------------------------------------------------------------------------------------------------------------- |
| Следующее событие  | —                                                                                                                                     |
| File               | [core/model/modx/modtemplatevar.class.php](https://github.com/modxcms/revolution/blob/master/core/model/modx/modtemplatevar.class.php) |
| Class              | modTemplateVar                                                                                                                         |
| Method             | public function remove(array $ancestors= array ())                                                                                     |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
