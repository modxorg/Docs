---
title: "field"
description: "Сниппет field для генерации HTML одного поля формы с шаблонизацией через чанки"
translation: "extras/formitfastpack/formitfastpack.field"
---

## Использование

Вызывайте ниже FormIt (или любого другого сниппета обработки запроса), чтобы сгенерировать HTML одного поля формы.

Например:

``` php
[[!field?
&name=`full_name`
&type=`text`
&label=`Enter your name:`]]
```

### Управление значениями по умолчанию

- Вы можете вызвать сниппет **fieldSetDefaults** с любыми параметрами сниппета **field**, чтобы задать значения по умолчанию для _последующих_ сниппетов **field**.
- Полный набор свойств есть в заглушке **fieldPropSetExample**. При необходимости скопируйте его в сниппет **field**. Наборы свойств на сниппете **field** блокируют работу **fieldSetDefaults** для этих свойств.

### Простой пример формы

``` php
[[!FormIt? &prefix=`myprefix.` &submitVar=`submitForm`]]
<form action="[[~[[*id]]]]" method="post">
    [[!fieldSetDefaults? &prefix=`myprefix.` &outer_tpl=`myWrapTpl` &resetDefaults=`1`]]
    [[!field? &name=`full_name` &type=`text` &class=`required`]]
    [[!field? &name=`favorite_color` &type=`checkbox` &options=`Blue||Red||Yellow`]]
    [[!field? &name=`location` &type=`select` &label=`Where are you from?` &options=`United States==US||New Zealand==NZ||Never Never Land==NNL`]]
    [[!field? &name=`message` &type=`textarea`]]
    [[!field? &name=`submitForm` &type=`submit` &label=` ` &message=`Submit Form`]]
</form>
```

## Параметры сниппета

Наиболее частые имена параметров выделены **жирным**.

| Parameter                                                                                                                                                          | Description                                                                                                                                                                                                                                                                                                                                                                                                                                                                 | Default                                                                              |
| ------------------------------------------------------------------------------------------------------------------------------------------------------------------ | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------ |
| array                                                                                                                                                              | Для типов полей с несколькими ответами (по умолчанию checkbox, select и file) указывает, что поле нужно обрабатывать как массив. К имени поля добавится \[\], чтобы форма знала, что возможно несколько значений.                                                                                                                                                                                             |
| Если вы передаёте массив опций (в виде `One||Two||Three`), добавьте &array=`1`, чтобы получить несколько значений из формы. |                                                                                                                                                                                                                                                                                                                                                                                                                                                                             |
| cache                                                                                                                                                              | По умолчанию кеширование «auto». Auto работает так: простые поля без опций, элементов и переопределений не кешируются и обычно не выигрывают от кеша. Чтобы включить кеширование и проверить производительность, укажите &cache=`1`. Поля с опциями используют выборочное кеширование. Чтобы отключить кеш, укажите &cache=`0`.                                                                                                                                      |
| Учтите: кеш не сохраняет статус checked/selected и следующие динамические плейсхолдеры: error, error\_class и current\_value             | auto                                                                                                                                                                                                                                                                                                                                                                                                                                                                        |
| custom\_ph                                                                                                                                                         | (НЕОБЯЗАТЕЛЬНО) Ускорение. Перечисление пользовательских плейсхолдеров здесь или в вызове fieldSetDefaults ускоряет обработку чанков, задавая пустое значение по умолчанию. Не нужно перечислять плейсхолдеры, у которых значение уже задано где-то ещё.                                                                                                                                                                                                                      | class,multiple,array,header, default,class,outer\_class,label,note,note\_class,size, |
| title,req,message,clear\_message                                                                                                                                   |
| debug                                                                                                                                                              | Включить отладку.                                                                                                                                                                                                                                                                                                                                                                                                                                                          | 0                                                                                    |
| delimiter\_template                                                                                                                                                | Шаблон разделителя типов чанка.                                                                                                                                                                                                                                                                                                                                                                                                                                  | `<!-- [[+type]] -->`                                                                 |
| default\_delimiter                                                                                                                                                 | Если outer\_type или type не указаны, это значение используется как type при обработке чанка шаблона.                                                                                                                                                                                                                                                                                                                                                    | default                                                                              |
| **default\_value**                                                                                                                                                 | Значение по умолчанию, если значение не найдено.                                                                                                                                                                                                                                                                                                                                                                                                                              |                                                                                      |
| error\_class                                                                                                                                                       | Имя класса для плейсхолдера `[[+error_class]]`. Плейсхолдер генерируется вместе с `[[+error]]`, если FormIt нашёл ошибку для этого поля.                                                                                                                                                                                                                                                                                                       | error                                                                                |
| error\_prefix                                                                                                                                                      | Обычно определяется автоматически. Можно переопределить префикс, который добавляется к имени поля для получения ошибок из плейсхолдеров MODX.                                                                                                                                                                                                                                                                                                   |                                                                                      |
| inner\_element\_class                                                                                                                                              | Класс элемента (modSnippet или modChunk).                                                                                                                                                                                                                                                                                                                                                                                                                                 | modChunk                                                                             |
| inner\_element                                                                                                                                                     | Аналог inner\_html, но принимает имя элемента (чанк или сниппет). Все плейсхолдеры и параметры передаются в чанк. Можно указать необязательный параметр chunks\_path для файловых чанков в формате name.chunk.tpl                                                                                                                                                                                               |                                                                                      |
| inner\_element\_properties                                                                                                                                         | JSON-массив дополнительных параметров. Пример: {"tpl" : "myChunk"}                                                                                                                                                                                                                                                                                                                                                                                                 | \[\]                                                                                 |
| inner\_html                                                                                                                                                        | Свой HTML вместо шаблона поля. Удобно, если нужны outer\_tpl и умное кеширование, но HTML поля задаёте сами.                                                                                                                                                                                                                                                                                                              |                                                                                      |
| key\_prefix                                                                                                                                                        | Чтобы использовать одни имена полей в разных формах на одной странице, задайте префикс ключа.                                                                                                                                                                                                                                                                                                                                                                                     |                                                                                      |
| mark\_selected                                                                                                                                                     | Пустое значение или ноль отключает пометку опций. По умолчанию при указании «options» или переопределения опций сниппет field добавляет маркер вроде \\' checked="checked"\\' или (для type «select») \\' selected="selected"\\' в нужном месте, если используется HTML-синтаксис value (value="X"). Маркер задаётся параметром selected\_text. Это быстрее, чем FormItIsSelected или FormItIsChecked. | 1                                                                                    |
| **name**                                                                                                                                                           | Имя поля.                                                                                                                                                                                                                                                                                                                                                                                                                                                      |                                                                                      |
| options\_delimiter\_inner                                                                                                                                          | Разделитель подписи и значения в параметре options.                                                                                                                                                                                                                                                                                                                                                                                           | ==                                                                                   |
| options\_delimiter\_outer                                                                                                                                          | Разделитель между опциями в параметре options.                                                                                                                                                                                                                                                                                                                                                                                                        |                                                                                      |                   |  |
| **options**                                                                                                                                                        | Для вложенных или групповых типов (checkbox, radio, select) задайте опции в формате TV: Label One==value1                                                                                                                                                                                                                                                                                                                              |                                                                                      | Label Two==value2 |  | Label Three==value3 или Value1 |  | Value2 |  | Value3. Сниппет field использует подтип (option\_type) для шаблонизации опций. Этот параметр по умолчанию включает умное кеширование и добавляет «selected» или «checked» к текущей опции. См. параметры «mark\_slected» и «cache». |  |
| options\_element\_class                                                                                                                                            | Класс элемента (modSnippet или modChunk).                                                                                                                                                                                                                                                                                                                                                                                                                                 | modChunk                                                                             |
| options\_element                                                                                                                                                   | Аналог options\_html, но принимает имя элемента (чанк или сниппет). Все плейсхолдеры и параметры передаются в чанк. Можно указать необязательный параметр chunks\_path для файловых чанков в формате name.chunk.tpl                                                                                                                                                                                             |                                                                                      |
| options\_element\_properties                                                                                                                                       | JSON-массив дополнительных параметров. Пример: {"tpl" : "myChunk"}                                                                                                                                                                                                                                                                                                                                                                                                 | \[\]                                                                                 |
| options\_html                                                                                                                                                      | Свой HTML вместо параметра &options для генерации опций. Например, можно передать option value="something" data="something" при type «select». Для пометки и кеширования ведёт себя как параметр options.                                                                                                                                                     |                                                                                      |
| **option\_type**                                                                                                                                                   | Тип поля для каждой опции. Для &type=`select` по умолчанию «option». Для &type=`checkbox` или &type=`radio` по умолчанию «bool».                                                                                                                                                                                                                                                                                                                 |                                                                                      |
| **outer\_tpl**                                                                                                                                                     | Внешний чанк шаблона для HTML, одинакового между полями. Подходит для label и обёрток li или div вокруг каждого поля. Шаблон можно сегментировать по типу поля (или outer type), как внутренний (&tpl).                                                                                                                                                         | fieldWrapTpl                                                                         |
| **outer\_type**                                                                                                                                                    | Внешний тип. Внешний чанк делится как fieldTypesTpl, но с именами, не связанными с типами полей. Если пусто, outer\_type равен type.                                                                                                                                                                                                                                                                                                 |                                                                                      |
| **prefix**                                                                                                                                                         | Префикс вызова FormIt для этого поля. Может работать и с EditProfile, Register и т. п. Префикс также используется для получения и установки значения в сессии.                                                                                                                                                                                                                                                    | fi.                                                                                  |
| selected\_text                                                                                                                                                     | Текст для пометки опций как selected, checked и т. п. Обычно определяется по type, но полезен для пользовательского типа или другой пометки.                                                                                                                                                                                                                                                                          |                                                                                      |
| set\_type\_ph                                                                                                                                                      | Устанавливает эти плейсхолдеры в true или false в зависимости от совпадения с типом поля. Если type «text» и text указан здесь, плейсхолдер «text» станет 1, остальные перечисленные типы получат пустую строку.                                                                                                                                                                                                                 | text,textarea,checkbox,radio,select                                                  |
| to\_placeholders                                                                                                                                                   | Если задано, все плейсхолдеры также станут глобальными плейсхолдерами MODx.                                                                                                                                                                                                                                                                                                                                                                                               | 0                                                                                    |
| **tpl**                                                                                                                                                            | Чанк шаблона для всех полей. Каждое поле отделяется HTML-комментарием сверху и снизу: `<!-- fieldtype -->`, где fieldtype это тип поля.                                                                                                                                                                                                                              | fieldTypesTpl                                                                        |
| **type**                                                                                                                                                           | Тип поля. Определяет, какой фрагмент чанка tpl использовать.                                                                                                                                                                                                                                                                                                                                                                                                        | text                                                                                 |
| use\_cookies                                                                                                                                                       | Если значение не найдено, берётся из глобального массива $\_COOKIES. Ключ: use\_cookies\_prefix+prefix+name.                                                                                                                                                                                                                                                                                                                                                    | 0                                                                                    |
| use\_cookies\_prefix                                                                                                                                               | Префикс для хранения в cookie.                                                                                                                                                                                                                                                                                                                                                                                                                                       | field.                                                                               |
| use\_formit                                                                                                                                                        | Берёт значение из плейсхолдеров MODX, например установленных FormIt. Ключ плейсхолдера: PREFIX+NAME (можно сменить prefix для совместимости с Login и похожими сниппетами).                                                                                                                                                                                                                                                                              | 1                                                                                    |
| use\_get                                                                                                                                                           | Если значение не найдено, берётся из глобального массива $\_GET. Ключ это имя поля.                                                                                                                                                                                                                                                                                                                                                                   | 0                                                                                    |
| use\_request                                                                                                                                                       | Если значение не найдено, берётся из глобального массива $\_REQUEST. Ключ это имя поля.                                                                                                                                                                                                                                                                                                                                                               | 0                                                                                    |
| use\_session                                                                                                                                                       | Если значение не найдено, берётся из глобального массива $\_SESSION. Ключ: use\_session\_prefix+prefix+name.                                                                                                                                                                                                                                                                                                                                                    | 0                                                                                    |
| use\_session\_prefix                                                                                                                                               | Префикс для хранения в сессии.                                                                                                                                                                                                                                                                                                                                                                                                                                      | field.                                                                               |

## Шаблонизация

Сниппеты field по умолчанию используют два чанка для внутреннего и внешнего HTML: **FieldTypesTpl** и **FieldWrapTpl**. Параметры **&tpl** и **&outer\_tpl** меняют имена этих чанков.

**Шаблоны по умолчанию** установлены в `core/components/formitfastpack/elements/chunks/`. В будущих версиях появится опция автоматической установки чанков, пока скопируйте содержимое в чанки «FieldTypesTpl» и «FieldWrapTpl».

Специальные разделители отделяют HTML каждого типа, поэтому все типы полей управляются двумя чанками.

Параметры **&type** и **&outer\_type** меняют внутренний и внешний типы. Типы полей с опциями используют третий тип: **&****option\_type**. Например, для select: ```&type=`select` &option_type=`option```.

Какой фрагмент чанка используется для конкретного типа?

1. По умолчанию разделители сверху и снизу фрагмента: `<!-- TYPE -->`, где TYPE это тип поля. Например, при `&type=`text`` разделитель (над и под HTML поля): `<!-- text -->`.
2. Если разделители для типа не найдены, сниппет ищет разделители по умолчанию: `<!-- default -->`
3. Если и их нет, используется весь чанк.

Фрагмент чанка &tpl по умолчанию (**fieldTypesTpl**):

``` html
<!-- default -->
<input type="[[+type]]" name="[[+name]]" id="[[+key]]" value="[[+current_value]]" class="[[+type]] [[+class]][[+error_class]]" />
<!-- default -->
<!-- hidden -->
<input type="[[+type]]" name="[[+name]]" value="[[+current_value]]" />
<!-- hidden -->
<!-- textarea -->
<textarea id="[[+key]]" class="[[+type]] [[+class]][[+error_class]]" name="[[+name]]">[[+current_value]]</textarea>
<!-- textarea -->
```

Чанк &outer\_tpl по умолчанию (**fieldWrapTpl**):

``` php
<!-- default -->
<div class="[[+outer_class]]" id="[[+name]]_wrap">
<label for="[[+name]]" title="[[+name:replace=`_== `:ucwords]]">[[+label:default=`[[+name:replace=`_== `:ucwords]]`]][[+req:notempty=` *`]]</label>
[[+inner_html]]
[[+note:notempty=`<span class="[[+note_class:default=`note`]]"><em>[[+note]]</em></span>`]]
[[+error:notempty=`<span class="[[+error_class]]">[[+error]]</span>`]]
</div>
<!-- default -->
```

Плейсхолдеры «note», «note\_field» и «req» выше это примеры пользовательских плейсхолдеров.

### Плейсхолдеры

Все переданные в сниппет параметры доступны как плейсхолдеры. Можно добавить пользовательские плейсхолдеры вроде «required», «class» и т. п., передав их как параметры.

Кроме того, доступны специальные плейсхолдеры:

| Placeholder    | Description                                                                                                                                                                                        |
| -------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| inner\_html    | Используется в outer\_tpl для позиционирования сгенерированного содержимого, которое зависит от типа поля. Простой пример: `<li>[[+inner_html]]</li>`                                                                |
| options\_html  | Используется в tpl для HTML опций (только при &options или переопределении опций). Пример: `<select name="[[+name]]">[[+options_html]]</select>`                                     |
| current\_value | Значение FormIt для имени поля. То же, что `[[!fi.fieldname]]` для каждого fieldname (если prefix «fi.»). Никогда не кешируется.                                    |
| error          | Сообщение об ошибке FormIt для имени поля, если найдено. То же, что `[[!fi.error.fieldname]]` для каждого fieldname (если prefix «fi.»). Никогда не кешируется.     |
| error\_class   | Значение параметра error\_class (по умолчанию « error») только если FormIt нашёл ошибку для поля. То же, что `[[+error:notempty=`error`]]`.                  |
| key            | Уникальный, но удобочитаемый идентификатор поля или подполя (для HTML id). Формируется из key\_prefix, prefix, имени поля и (только для поля с опциями) value. |

## Использование в PHP-скриптах

Вы можете писать сниппеты, генерирующие формы из конфигурации, вызывая `$modx->runSnippet('field', $field_properties_array);`. Например:

``` php
$output = '';
$output .= $modx->runSnippet('field', array('name'=> 'name', 'type'=> 'text'));
$output .= $modx->runSnippet('field', array('name'=> 'email', 'type'=> 'email'));
return $output;
```

## Дополнительные примеры

Задайте значения по умолчанию для всех сниппетов field ниже

``` php
[[!fieldSetDefaults?
    &prefix=`myprefix`
    &chunks_path=`/path/to/chunks/if/using/file/based/chunks/`
    &outer_class=`ui-widget`
]]
```

type по умолчанию text:

``` php
[[!field? &name=`name`]]
```

Опции в том же формате, что у TV: Label1==Value1||Another Label==another\_value. Чтобы label и value совпадали, используйте Value1||Value2||Value3

``` php
[[!field?
    &type=`radio`
    &req=`1`
    &name=`color`
    &label=`Your Favorite Color:`
    &default=``
    &options=`Red==red||Blue==blue||Other==default`
]]
```

``` php
[[!field?
    &type=`radio`
    &label=` `
    &options=`Publish==publish||Save as draft==save||Preview==preview`
    &name=`action`
    &default=``
]]
```

Здесь другой стиль полей за счёт смены чанков по умолчанию. Наборы свойств помогают поддерживать разные стили форм на сайте.

``` php
[[!field?
    &type=`text`
    &req=`1`
    &name=`email`
    &tpl=`aDifferentTemplate`
    &outer_tpl=`ADifferentOuterTpl`
]]
```

Можно отключить внешний шаблон:

``` php
[[!field?
    &type=`hidden`
    &outer_tpl=``
    &name=`blank`
]]
```

Слишком много опций для списка, поэтому указано имя чанка с HTML опций:

``` php
[[!field?
    &type=`select`
    &default=`1`
    &name=`country_id`
    &label=`Country:`
    &options_element=`optionsCountries`  
    &header=`Please select...`
]]
```

Вместо чанка можно использовать сниппет:

``` php
[[!field?
    &type=`select`
    &name=`category`
    &req=`1`
    &multiple=`1`
    &title=`Choose some categories`
    &array=`1`
    &options_element=`mySnippetToListTopics`
    &options_element_class=`modSnippet`
    &options_element_properties=`{"tpl":"fieldOptionTopic"}`
]]
```

&req=`1` это пример пользовательского плейсхолдера. Его можно использовать для звёздочки в label через фильтр notempty

``` php
[[!field?
    &type=`textarea`
    &class=`elastic`
    &req=`1`
    &name=`message`
    &label=`Comment`
]]
```

Подпись можно не указывать, если у вас есть соглашение об именах полей. Например, `[[+label:default=``[[+name:replace=` == `:ucwords]]``]]` генерирует подпись в шаблонах. В шаблонах по умолчанию это уже сделано.

``` php
[[!field?
    &type=`select`
    &name=`favorite_things`
    &multiple=`1`
    &array=`1`
    &options=`MODx==modx||Money==money||Power==power||Other==default`
]]
```

Пользовательское поле с пользовательским типом. Если используете опции с пользовательским типом, задайте тип полей опций через &option\_type.

``` php
[[!field?
    &type=`customtype`
    &name=`custom_field_type`
    &_note=`Make sure you add this custom field to the &tpl chunk!`
    &custom_placeholder=`custom_value`
    &another_custom_placeholder=`And another custom value`
    &options=`One||Two||Three`
    &option_type=`radio`
]]
```

Сниппет field подходит и для поля submit:

``` php
[[!field?
    &type=`submit`
    &name=`submitForm`
]]
```
