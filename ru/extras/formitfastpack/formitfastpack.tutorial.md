---
title: "Руководство по FormitFastPack"
description: "Пошаговое создание контактной формы FormIt с сниппетами field и fiGenerateReport"
translation: "extras/formitfastpack/formitfastpack.tutorial"
---

В этом руководстве вы создадите простую контактную форму FormIt. FFP поможет сократить повторение HTML между формами и полями.

### 1. Вызовите FormIt как обычно, но используйте сниппеты **field** для HTML формы

``` php
[[!FormIt?
    &hooks=`math,spam,email,redirect`
    &emailTpl=`ContactFormReport`
    &emailTo=`[[++emailsender]]`
    &emailSubject=`New message from [[++site_name]] [[*pagetitle]] page.`
    &redirectTo=`[[++site_start]]`
    &submitVar=`submitForm` &errTpl=`[[+error]] `
    &validate=`nospam:blank,full_name:required,email:email:required,message:required`
]]
[[!fieldSetDefaults? &prefix=`fi.` &outer_type=`default` &tpl=`fieldTypesTpl` &outer_tpl=`fieldWrapTpl`]]
<div>[[!+fi.error.error_message]] [[!+fi.validation_error_message]] [[!+fi.error.recaptcha]]</div>

<form id="ContactForm" action="[[~[[*id]]]]#ContactForm" method="post"><div>
<input name="nospam" type="hidden" />
[[!field? &type=`text` &name=`full_name` &req=`1`]]
[[!field? &type=`text` &name=`email` &req=`1`]]
[[!field? &type=`text` &name=`phone`]]
[[!field? &type=`textarea` &name=`message` &class=`cleardefault` &req=`1`]]
[[!field? &type=`text` &req=`1` &name=`math` &label=`What is [[!+fi.op1]] [[!+fi.operator]] [[!+fi.op2]]?`]]
    <input type="hidden" name="op1" value="[[!+fi.op1]]" />
    <input type="hidden" name="op2" value="[[!+fi.op2]]" />
    <input type="hidden" name="operator" value="[[!+fi.operator]]" />
[[!field? &type=`submit` &name=`submitForm` &label=` ` &message=`Send this Message!`]]
</div>
</form>
```

#### Пояснение

Вызов `[[!fieldSetDefaults]]` задаёт значения по умолчанию для последующих вызовов field. Здесь они совпадают со значениями по умолчанию и не обязательны.

Каждый вызов `[[!field]]` управляет HTML одного поля формы, включая актуальные значения и плейсхолдеры ошибок от FormIt.

### 2. НЕОБЯЗАТЕЛЬНО: хук fiGenerateReport для упрощения email-шаблонов

A. Добавьте fiGenerateReport сразу перед хуком «email».

``` php
[[!FormIt?
  &hooks=`math,spam,fiGenerateReport,email,redirect`
  ...
]]<br>
```

B. Добавьте параметр &figrExcludedFields, чтобы исключить служебные поля math и spam из email-отчёта.

``` php
[[!FormIt?
  &hooks=`math,spam,fiGenerateReport,email,redirect`
  &figrExcludedFields=`op1,op2,operator,math`
]]
```

C. В чанке emailTpl (в примере выше «ContactFormReport») используйте плейсхолдер figr\_values для динамического списка полей:

``` php
<p>A <strong>[[++site_name]]</strong> contact form submission was sent from the <strong>[[*pagetitle]]</strong> page:</p>
[[+figr_values]]
```

### 3. НЕОБЯЗАТЕЛЬНО: настройка чанка &outer\_tpl

Создайте чанк **fieldWrapTpl** для HTML внешнего типа «default».

Важно: чанки tpl и outer\_tpl используют специальные комментарии для разделения HTML разных типов полей. Каждый тип должен быть обёрнут сверху и снизу HTML-комментарием с именем типа, как ниже. Иначе вывод может оказаться больше ожидаемого.

``` php
<!-- default -->
<div class="[[+outer_class:default=`field_wrap`]] [[+type]]_wrap" id="[[+name]]_wrap">
<label for="[[+name]]" title="[[+name:replace=`_== `:ucwords]]">[[+label:default=`[[+name:replace=`_== `:ucwords]]`]][[+req:notempty=` *`]]</label>
[[+inner_html]]
[[+note:notempty=`<span class="[[+note_class:default=`note`]]"><em>[[+note]]</em></span>`]]
[[+error:notempty=`<span class="[[+error_class]]">[[+error]]</span>`]]
</div>
<!-- default -->
```

### 4. НЕОБЯЗАТЕЛЬНО: настройка чанка &tpl

Создайте чанк **fieldTypesTpl** для HTML всех типов полей сразу.

Важно: чанки tpl и outer\_tpl используют специальные комментарии для разделения HTML разных типов полей. Каждый тип должен быть обёрнут сверху и снизу HTML-комментарием с именем типа, как ниже. Иначе вывод может оказаться больше ожидаемого.

``` html
<!-- default -->
  <input type="[[+type]]" name="[[+name]]" id="[[+key]]" value="[[+current_value]]" class="[[+type]] [[+class]][[+error_class]]" size="[[+size:default=`40`]]" />
<!-- default -->
<!-- file -->
  <input type="[[+type]]" name="[[+name]][[+array:notempty=`[]`]]" id="[[+key]]" class="[[+type]] [[+class]][[+error_class]]" />
<!-- file -->
<!-- hidden -->
  <input type="[[+type]]" name="[[+name]]" value="[[+current_value]]" />
<!-- hidden -->
<!-- textarea -->
  <textarea id="[[+key]]" class="[[+type]] [[+class]][[+error_class]]" name="[[+name]]">[[+current_value]]</textarea>
<!-- textarea -->
<!-- checkbox -->
<span class="boolWrap[[+error_class]]">
<input name="[[+name]][[+array:notempty=`[]`]]" type="hidden" value="" />
[[+options_html]]
</span>
<!-- checkbox -->
<!-- radio -->
<span class="boolWrap[[+error_class]]">
<input type="hidden" name="[[+name]]" value="" />
[[+options_html]]
</span>
<!-- radio -->
<!-- select -->
<span class="[[+class]][[+error_class]]">
<input type="hidden" name="[[+name]][[+array:notempty=`[]`]]" value="" />
<select name="[[+name]][[+array:notempty=`[]`]]" id="[[+key]]" class="[[+class]]"[[+multiple:notempty=` multiple="multiple"`]][[+title:notempty=` title="[[+title]]"`]]>
  [[+header:notempty=`<option value="[[+default_value]]">[[+header]]</option>`]]
  [[+options_html]]
</select>
</span>
<!-- select -->
<!-- static -->
<span class="static_field[[+error_class]]">[[!+[[+name]]]]</span>
<!-- static -->
<!-- submit -->
<input id="[[+key]]" class="button [[+type]] [[+class]]" name="[[+name]]" type="[[+type]]" value="[[+message:default=`Submit`]]" />
<input id="[[+name]]-clear" class="button [[+type]] [[+class]]" type="reset" value="[[+clear_message:default=`Clear Form`]]" />
<!-- submit -->
<!-- option --><option value="[[+value]]">[[+label]]</option><!-- option -->
<!-- bool -->
<span class="boolDiv [[+class]]">
<input type="[[+type]]" class="[[+type]]" value="[[+value]]" name="[[+name]][[+array:notempty=`[]`]]" id="[[+key]]"  />
<label for="[[+key]]" class="[[+type]]" id="label[[+key]]">[[+label]]</label></span><!-- bool -->
```
