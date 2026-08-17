---
title: "FormitFastPack"
description: "FFP упрощает управление HTML для сниппетов обработки форм, таких как FormIt и Login"
translation: "extras/formitfastpack"
---

## Что такое FormitFastPack?

FFP упрощает управление HTML, связанным со сниппетами обработки форм, такими как FormIt и Login.

## Установка

Установите из [менеджера пакетов MODX](https://modx.com/extras/package/formitfastpack).

## Начало работы

Ниже простой пример использования сниппета _field_ с формой FormIt. Более подробный пример смотрите в [руководстве](extras/formitfastpack/formitfastpack.tutorial).

``` php
[[!FormIt?
  &hooks=`email,redirect`
  &emailTpl=`ContactFormReport`
  &emailTo=`[[++emailsender]]`
  &emailSubject=`New contact form submission`
  &validate=`email:email:required,message:required`
  &redirectTo=`1`
]]
<form action="[[~[[*id]]]]" method="post">
[[!field? &type=`text` &name=`email` &req=`1`]]
[[!field? &type=`textarea` &name=`message` &class=`cleardefault` &req=`1`]]
[[!field? &type=`submit` &name=`submitForm` &label=` ` &message=`Send this Message!`]]
</form>
```

## Включённые сниппеты

[**field**](extras/formitfastpack/formitfastpack.field): один вызов сниппета генерирует HTML для одного поля формы. HTML всех полей одного дизайна можно управлять всего двумя чанками (внешним и внутренним), а динамические значения вроде текущего значения поля и сообщений об ошибках обрабатываются корректно. Выборочное кеширование ускоряет обработку опций.

[**fieldSetDefaults**](extras/formitfastpack/fieldsetdefaults): этот сниппет ничего не выводит, но любые переданные ему параметры меняют значения по умолчанию для всех последующих сниппетов field. Такой способ задания значений по умолчанию не работает, если для сниппета field используется набор свойств.

**fieldPropSetExample**: заглушка-сниппет с полным набором свойств для сниппета «field». Наборы свойств несовместимы с fieldSetDefaults, поэтому сниппет field поставляется без набора свойств. Этот набор свойств предназначен для тех, кто предпочитает наборы свойств вместо fieldSetDefaults.

[**fiGenerateReport**](extras/formitfastpack/formitfastpack.figeneratereport): хук FormIt, который формирует email-отчёт, прогоняя все отправленные имена и значения полей через чанк шаблона строки.

[fiProcessArrays](extras/formitfastpack/fiprocessarrays): хук FormIt, который преобразует значения-массивы в объединённые строки. В более новых версиях FormIt уже есть похожая функциональность.

_formCollectErrors_ (скоро): выводит список ошибок формы.

## Автоматические подписи

Если правильно назвать поля, вы можете использовать метод FFP для генерации подписей из имён полей. Либо задайте подписи вручную.

Подписи генерируются простыми выходными фильтрами, которые можно настроить: `[[+name:replace=`_== `:ucwords]]`

_Примеры результатов:_

| **Имя поля**          | **Сгенерированная подпись** |
| --------------------- | --------------------------- |
| name                  | Name                        |
| first\_name           | First Name                  |
| company\_address      | Company Address             |
| number\_of\_employees | Number Of Employees         |

## Поддержка

- Отправляйте проблемы, вопросы и запросы функций в [трекер issues](https://github.com/yoleg/FormitFastPack/issues).
- Следите за разработкой на [GitHub](https://github.com/yoleg/FormitFastPack)
- Обсуждайте на [форуме MODX](http://forums.modx.com/index.php/topic,65244.0.html)
- Свяжитесь с автором на [websitezen.com/contact](https://websitezen.com/contact).
