---
title: "Обработка выпадающих списков, чекбоксов и радио кнопок"
translation: "extras/formit/formit.tutorials-and-examples/formit.handling-selects,-checkboxes-and-radios"
description: "Обработка выпадающих списков, чекбоксов и радио кнопок"
---

## Обработка выпадающих списков, чекбоксов и радио кнопок

Хотя FormIt может обрабатывать поля любого типа, для выпадающих селекторов, радио-кнопок и флажков (чекбоксов) требуются специальные указания из-за их особенностей их значения.

### Обработка выпадающих списков

FormIt предоставляет служебный Сниппет под названием FormItIsSelected, который можно использовать как [Выходной фильтр](<making-sites-with-modx/customizing-content/input-and-output-filters-(output-modifiers)>) для обработки выбранных значений (`selected="selected"`). Например:

```php
<select name="color">
   <option value="blue" [[!+fi.color:FormItIsSelected=`blue`]] >Синий</option>
   <option value="red" [[!+fi.color:FormItIsSelected=`red`]] >Красный</option>
   <option value="green" [[!+fi.color:FormItIsSelected=`green`]] >Зеленый</option>
   <!-- Это также могло бы работать -->
   <option value="yellow" [[!+fi.color:is=`yellow`:then=`selected`]]>Желтый</option>
</select>
```

Это автоматически обработает выбранное поле, запоминая его во время проверки и обработки ошибок.

### Обработка чекбоксов и радио кнопок

Обработка флажков и радио кнопок очень похожа на обработку селекторов, с той лишь разницей, что вы проверяете здесь «обязательность». FormIt предоставляет вспомогательный выходной фильтр `FormItIsChecked`, аналогичный `FormItIsSelected`, для обработки сохраняемости значений.

В этом примере будут обрабатываться флажки, c сохранением их выбранных значений:

```php
<label>Цвет: [[!+fi.error.color]]</label>
<input type="checkbox" name="color[]" value="blue" [[!+fi.color:FormItIsChecked=`blue`]] > Синий
<input type="checkbox" name="color[]" value="red" [[!+fi.color:FormItIsChecked=`red`]] > Красный
<input type="checkbox" name="color[]" value="green" [[!+fi.color:FormItIsChecked=`green`]] > Зеленый
```

Обратите внимание, что `[]` удаляется при установке плейсхолдера "fi.error.color".

#### Обработка атрибута required для чекбокса

Поскольку HTML не отправляет значение, если флажок не установлен, проверки «обязательности» (required) флажка может быть затруднительной. Перед этим вам нужно будет добавить скрытое (`type = hidden`) поле, чтобы отправлялось хотя бы пустое значение:

```html
[[!FormIt? &validate=`color:required`]] ...
<label>Цвет: [[!+fi.error.color]]</label>
<input type="hidden" name="color[]" value="" />
<input
    type="checkbox"
    name="color[]"
    value="blue"
    [[!+fi.color:FormItIsChecked="`blue`]]"
/>
Синий
<input
    type="checkbox"
    name="color[]"
    value="red"
    [[!+fi.color:FormItIsChecked="`red`]]"
/>
Красный
<input
    type="checkbox"
    name="color[]"
    value="green"
    [[!+fi.color:FormItIsChecked="`green`]]"
/>
Зеленый
```

Это успешно проверит, чтобы при отправке формы был установлен хотя бы один флажок.

#### Обработка чекбоксов и мульти-селектора в пользовательском хуке

Если вы хотите установить поле массива (т.е. группу флажков с тем же именем или мульти-селектор) в preHook, вам нужно применить `json_encode` для значения массива.

```php
$hook->setValue('hobbies',json_encode(array('music','films','books')));
```

## Смотрите также

1. [Пользовательский произвольный хук](extras/formit/formit.tutorials-and-examples/examples.custom-hook)
2. [Пример простой формы](extras/formit/formit.tutorials-and-examples/examples.simple-contact-page)
3. [Использование пустого поля для защиты от спама](extras/formit/formit.tutorials-and-examples/using-a-blank-nospam-field)
4. [Валидаторы](extras/formit/formit.validators "Валидаторы")
