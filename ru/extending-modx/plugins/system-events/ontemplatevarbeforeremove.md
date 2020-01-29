---
title: "OnTemplateVarBeforeRemove"
translation: "extending-modx/plugins/system-events/ontemplatevarbeforeremove"
---

## Событие: OnTemplateVarBeforeRemove

Загружается прямо перед удалением переменной шаблона.

Служба: 1 - Parser Service Events
Group: Template Variables

## Параметры события

| Имя         | Описание                                                                                                                                                                        |
| ----------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| templateVar | Экземпляр класса modTemplateVar.                                                                                                                                                |
| cacheFlag   | Указывает, следует ли сохранять в кэше сохраненный TV и, необязательно, указав целочисленное значение за сколько секунд до истечения срока действия. Всегда возвращается 'true' |

## Remarks

| Предыдущее событие | —                                                                                                                                     |
| ------------------ | -------------------------------------------------------------------------------------------------------------------------------------- |
| Следующее событие  | [OnTemplateVarRemove](extending-modx/plugins/system-events/ontemplatevarremove "OnTemplateVarRemove")                                  |
| File               | [core/model/modx/modtemplatevar.class.php](https://github.com/modxcms/revolution/blob/master/core/model/modx/modtemplatevar.class.php) |
| Class              | modTemplateVar                                                                                                                         |
| Method             | public function remove(array $ancestors= array ())                                                                                     |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
