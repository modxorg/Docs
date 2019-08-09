---
title: "Типы ввода переменных шаблона TV"
translation: "building-sites/elements/template-variables/input-types"
---

Существует несколько встроенных типов шаблонных переменных.

Некоторые типы ввода не рекомендуются в зависимости от версии MODX.

Лучше всего вводить несколько значений параметра ввода в одной строке без возврата каретки.

## Автоматический тег (autotag)

Автоматический тег - это удобная переменная шаблона для использования тегов при ведении блога, наличии нескольких категорий, к которым может принадлежать ресурс, или вкогда вам нужен список тегов, которые использовались ранее. Каждый раз, когда вы редактируете или создаете ресурс с доступом к переменной шаблона автоматического тега, вы увидите теги, которые использовались ранее. Вы можете легко нажать на ранее использованные теги, чтобы выбрать их в списке.

Чтобы сделать Автоматический тег TV, вам нужно будет установить тип вывода на «Разделитель» и указать разделитель по вашему выбору, и / или использовать фильтр вывода, чтобы представить его так, как вы предпочитаете.

![](autotag.png)

Чтобы вывести теги таким образом, чтобы каждый тег связывался с определенным ресурсом и передавал тег в параметре GET, вы можете использовать выходной фильтр (фрагмент) следующим образом:

``` php
if ($input == '') { return 'Error'; } // In case the TV is empty
$tags = explode(', ',$input); // Based on a delimiter of ", " this will split each one up in an array
foreach ($tags as $key => $value) { // Loop through the tags
    $output[] = '<a href="'.$modx->makeurl(9, '', array('tag' => $value)).'">'.$value.'</a>'; // Add it to an output array, with a link to resource 9 and the get parameter.
}
return implode(', ',$output); // Merge the output array and output
```

### Все имена опций ввода (для использования в migx options-json)

``` json
{
   "allowBlank":"true",
   "maxLength":"",
   "minLength":"",
   "regex":"",
   "regexText":""
}
```

## Флажок (checkbox)

### Пример использования

Основное назначение этого - просто определить поле как флажок. Вы можете контролировать, установлен ли флажок по умолчанию или нет, манипулируя полями «Значения параметра ввода» и «Значение по умолчанию».

#### Отмечено по умолчанию

- Значения параметров ввода: My Option==1
- Значение по умолчанию: 1

#### Не отмеченно по умолчанию:

- Значения параметров ввода: My Option==1
- Значение по умолчанию: 0

Поле будет установлено по умолчанию до тех пор, пока значение после "==" соответствует значению по умолчанию. Если вы хотите установить значение по умолчанию для переменной шаблона флажка в несколько значений, вы должны разделить значения с помощью "||" delimiter.

### Продвинутое использование

Вы можете различать отдельные ключи и значения, используя двойное равенство и двойные каналы:

``` php
option1==value1||option2==value2
```

### Другой пример продвинутого использования

Тип ввода Флажок позволяет отображать несколько флажков на одном TV. Установите значения параметров ввода в формате `option1==value1||option2==value2`. Чтобы объявить флажки по умолчанию, укажите в поле значения по умолчанию имена опций, разделенные двумя каналами (||). Вы можете использовать [@SELECT](building-sites/elements/template-variables/bindings/select-binding "SELECT Привязку") для выбора элементо из вашей базы данных, например: **Значения параметров ввода:**

``` sql
@SELECT pagetitle, id FROM modx_site_content WHERE parent=35
```

![](checkboxes.jpg)

Если вы используете несколько таких флажков, вам, вероятно, потребуется установить **Тип вывода** на «Разделитель» (например, запятую), чтобы вы могли различать значения, содержащиеся в каждом флажке.

## Дата (date)

Это позволяет вам установить дату и время.

![](date.jpg)

Если вы хотите установить дату по умолчанию, вы можете поместить одно из следующих ключевых слов в поле значения по умолчанию (без кавычек!). «Странная» логика, лежащая в основе значений -X/+X (которые были бы интуитивно понятны - для «назад» и «+ для будущего»), вероятно, происходит из какого-то вычитания в коде, например: `now()` - значение, поэтому, если value равно +72, это означает `now() - (+72)`, но - и + is -, так что положительное значение вычитается, тогда как `now() - (-72)`, - и - равно +, добавляется отрицательное значение

| Значение по умолчанию | Функция                                                                               |
| --------------------- | ------------------------------------------------------------------------------------- |
| yesterday             | Отображение дня до сегодняшней даты, времени 12:00pm                                  |
| today                 | Отображает сегодняшнюю дату, время 12:00pm                                            |
| now                   | Отображает текущую дату, текущее время                                                |
| tomorrow              | Отображает день после сегодняшней даты, время 12:00pm                                 |
| +X                    | X количество часов BACK от текущего времени, например +72 означает «3 дня назад»      |
| -X                    | X количество часов в БУДУЩЕМ от текущего времени, например -72 означает "через 3 дня" |

Вы используете [Тип вывода Дата TV](making-sites-with-modx/customizing-content/template-variables/template-variable-output-types/date-tv-output-type "Тип вывода Дата TV") изменить формат возвращаемой даты.

### Все имена параметров ввода (для использования в migx options-json)

 ``` json
{
   "allowBlank":"true",
   "disabledDates":"",
   "disabledDays":"",
   "minDateValue":"",
   "minTimeValue":"",
   "maxDateValue":"",
   "maxTimeValue":"",
   "startDay":"",
   "timeIncrement":"",
   "hideTime":"false"
}
```

## DropDown список меню

**ПРИМЕЧАНИЕ**: этот тип ввода TV устарел начиная с Revo 2.1.x Пожалуйста, смотрите [Listbox](#TemplateVariableInputTypes-Listbox(MultiSelect)) типы ввода ниже.

Установите значения параметров ввода в формате `option1==value1||option2==value2||option3==value3`. Убедитесь, что вы выбрали выходной тип с разделителями (или другой тип по своему вкусу), чтобы иметь возможность представить его пользователю определенным образом.. Ты можешь использовать [@SELECT](building-sites/elements/template-variables/bindings/select-binding "SELECT Binding") привязку для выбора 2 столбцов, например,

``` sql
@SELECT name, value FROM your_table
```

Также см. Список ресурсов ТВ типа.

![](dropdown.jpg)

### Все имена параметров ввода (для использования в migx options-json)

``` json
{
   "allowBlank":"true",
   "listWidth":"",
   "listHeight":""
}
```

## Email

Это текстовое поле, имеющее собственную проверку: будет принят только текст в допустимом формате электронной почты.

![](email.jpg)

### Все имена параметров ввода (для использования в migx options-json)

``` json
{
   "allowBlank":"true",
   "maxLength":"",
   "minLength":""
}
```

## File

Создает форму ввода файла для просмотра файла на сервере. Файлы могут быть загружены через файловый менеджер MODX. Вы можете объявить файл значений по умолчанию, указав путь к файлу.

При использовании дружественных URL-адресов обратите особое внимание на относительные пути к файлам.

### Все имена параметров ввода (для использования в migx options-json)

## Скрытый

Скрытое поле не отображается в менеджере, поэтому вы редко используете эту опцию. Вы можете установить значение по умолчанию, которое можно получить на всех страницах, используя эту переменную. Другая возможность - сохранить фрагмент, который принимает идентификатор страницы в качестве ввода.

## HTML область (richtext)

Это дает вам небольшой редактор WSYIWYG для поля. Это выглядит точно так же, как поля Richtext.

![](html_area.jpg)

## Изображение

![](tv-image-new.png)

Создает форму ввода изображения для просмотра файла на сервере. Файлы могут быть загружены через файловый менеджер MODX.

В MODX 2.2+ больше нет параметров ввода для TV с изображениями. Вместо этого перейдите на вкладку «Источники мультимедиа» и выберите источник мультимедиа, который нужно назначить этому TV для каждого контекста. Вы можете настроить базовые пути и т.п. в [Медиа Источнике](building-sites/media-sources "Медиа Источнике").

![](tv-image-input-options.png)

1) You can declare a default value file by specifying the path to the image.

2) If you want to limit the images used for this TV to a specific folder, you can specify (since Revolution 2.1) a base-path and base-url. You can also set relative or absolute paths. Take extra note of relative file paths when using friendly url paths.
For correct display of images in frontend and backend be sure to have correct settings in base\_url and base\_path settings!

3) You can prepend URL if filepath doesn't begin with a trailing slash.

4) You can specify file extensions that can be selected.

This input type returns the link (to be used as src attribute) to the image. You can also set the whole [html-img-tag as a output-type](making-sites-with-modx/customizing-content/template-variables/template-variable-output-types/image-tv-output-type "Image TV Output Type").

## [Image+](https://docs.modx.com/extras/revo/image) (imageplus)

### Все имена параметров ввода (для использования в migx options-json)

``` json
{
   "targetWidth":"",
   "targetHeight":"",
   "targetRatio":"",
   "thumbnailWidth":"",
   "allowAltTag":"true",
   "allowCaption":"false",
   "allowCredits":"false"
}
```

## Listbox (Single-Select) (listbox)

This has the same options available to it as the Listbox (Multi-Select) – see below.

## Listbox (Multi-Select) (listbox-multiple)

This behaves similar to the checkbox fields: you can select multiple items, and this field can be powered by a @SELECT binding in its "Input Option Values" parameter. Like checkboxes, you probably want to set the "Output Type" to delimiter so you can distinguish between values.

![](listbox_multi.jpg)

### Simple Usage

Just like with the Checkbox options, you can simply specify a list of values separated by double-pipes:

``` php
Man||Bear||Pig
```

### Separate Options/Values

Often it's nice to have a more readable label. You can display something nice and still store a different value using the double-equals and double-pipes format used by checkboxes:

 ``` php
Option 1==value1||Option 2==value2
```

### Все имена параметров ввода (для использования в migx options-json)

``` json
{
   "allowBlank":"true",
   "listWidth":"",
   "title":"",
   "typeAhead":"false",
   "typeAheadDelay":"250",
   "listEmptyText":"",
   "stackItems":"false"
}
```

## Number

This is another text field with some pre-emptive validation. You literally cannot type anything but the digits 0 to 9, the minus sign (-) , and a period (i.e. a decimal point). A validation error is triggered if you enter more than one decimal point or minus sign. Complex numbers (e.g. using radicals "^" or "e" are **not** supported).

Note that trailing zeros are truncated, e.g. 4.50 gets trimmed to 4.5; this may make this input type unsuitable for currency fields.

### Все имена параметров ввода (для использования в migx options-json)

``` json
{
   "allowBlank":"true",
   "allowDecimals":"Yes",
   "allowNegative":"Yes",
   "decimalPrecision":"2",
   "decimalSeparator":".",
   "maxValue":"",
   "minValue":""
}
```

## Radio Options (option)

### Simple Usage

The basic usage of this is to provide a list of radio option. You can control the default option by manipulating the "Input Option Values" and "Default Value" fields.

#### Selected by Default

- Input Option Values: My Option==1
- Default Value: 1

The option will be selected by default as long as the value following the "==" matches the default value.

### Advanced Usage

The radio option can be used to output more than simple numerical values. One such example is using the radio option to determine the chunk used for a sidebar.

Set your input option values using the format **Title==value** format, but use the chunk placeholders as your values. To declare multiple options use two pipes (||) after the value, before the next options title.

#### Sidebar Example Evolution\*

- Input Option Values: Related==`related-call]]||Content==``<span class="error">[\*sidebar-txt\*]</span>``||Twitter=={{twitter`
- Default Value: ?`related-call`

#### Sidebar Example Revolution:

- Input Option Values: Related==\[\[$my\_related\_chunk\]\]||Content==\[\[\*sidebar-txt\]\]||Twitter==\[\[$my\_twitter\_chunk\]\]
- Default Value: \[\[$my\_related\_chunk\]\]

In the above examples, you can output a chunk or another Template Variable without the aid of an extra.

### Все имена параметров ввода (для использования в migx options-json)

 ``` json
{
   "allowBlank":"true",
   "columns":"1"
}
```

## Resource List (resourcelist)

Supply the definition with a resource ID, and you'll end up with a drop down list of all pages/resources that are children of that resource. The value stored after you've made a selection is the ID of the single selected resource.

![](resource_list.jpg)

This is similar to using a [@SELECT](building-sites/elements/template-variables/bindings/select-binding "SELECT Binding") binding in a DropDown list menu, but the Resource List will traverse the entire resource browser, whereas with a @SELECT binding, you'd have to update your query to list children of each parent.

This input type also accepts WHERE conditions to filter by: ![](screen+shot+2012-05-18+at+9.04.54+pm.png)
Another example:

``` php
[{"pagetitle:!=":"Home"}]
```

### Все имена параметров ввода (для использования в migx options-json)

``` json
{
   "allowBlank":"1",
   "showNone":"1",
   "parents":"",
   "depth":"10",
   "includeParent":"1",
   "limitRelatedContext":"0",
   "where":"[{\"isfolder: = \":\"1\"},{\"hidemenu\":\"0\",\"OR:hidemenu:=\":\"1\"}]",
   "limit":"0"
}
```

## Rich Text

See _HTML Area_.

## Tag

Multiple tags separated by || characters will be separated and output individually when used with the [HTMLTag output type](building-sites/elements/template-variables/output-types/html) for formatting.

### Все имена параметров ввода (для использования в migx options-json)

``` json
{
   "allowBlank":"1"
}
```

## Text

This is a vanilla text field.

As of MODX 2.1, there are three input options you can set for this TV:

- Allow Blank: yes/no, when "no" the resource cannot be saved without it being filled in.
- Max length: a number representing the number of characters that can be filled in in this field.
- Min Length: a number representing the minimum number of characters needed to be filled in. May want to use this with the allow blank option to "no". ![](tvinput.png)

### Все имена параметров ввода (для использования в migx options-json)

``` json
{
   "allowBlank":"true",
   "maxLength":"",
   "minLength":"",
   "regex":"",
   "regexText":""
}
```

## Textarea

This is a standard _textarea_ field, with a height of 15 rows. It's the same size as the HTML Area fields, but without the WYSIWYG editor.

### Все имена параметров ввода (для использования в migx options-json)

``` json
{
   "allowBlank":"true"
}
```

## Textarea (Mini) (deprecated)

This is a smaller _textarea_ field, with a height of only 5 rows.

## Textbox

This appears to be exactly the same as the vanilla Text field.

## URL

This is a guided text field, which a dropdown option to select the protocol: none, <http://>, <https://>, <ftp://,> or [](mailto:). No validation is performed to ensure the correctness of the URL structure.

![](url.jpg)
