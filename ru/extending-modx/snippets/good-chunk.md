---
title: "Написание хорошего чанка"
translation: "extending-modx/snippets/good-chunk"
---

## НЕ переусердствуйте с логикой модификатора вывода!

Что такое [выходные модификаторы](building-sites/tag-syntax/output-filters)? Это упрощенный набор правил синтаксического анализа и модификаций вывода, который позволяет вам манипулировать данными на уровне представления (например: в ваших чанках и шаблонах).

Самая частая ошибка — класть туда слишком много логики. Фильтр или эпизодический `if` в чанке допустимы, но держите их в минимуме. Архитектура MODX требует, чтобы слой представления оставался чистым, а тяжелая логика в чанках и шаблонах этому противоречит.

### НЕПРАВИЛЬНЫЙ способ сделать это

Вот пример Tpl чанка, который полностью вышел из-под контроля:

``` php
[[+tv.RemovePin:eq=`active`:then=`[[+modx.user.id:memberof=`
Members`:then=`{address:'[[+tv.country]], [[+pagetitle]]', data:'<div class="googleBubble">
[[+tv.Socialicons:replace=`||==`:replace=`facebook==<img src="/assets/images/mapof/facebook.png"
alt="Facebook" width="16" height="16" class="pull-right mR2">`:replace=`linkedin==<img src="/assets/images/mapof/linkedin.png" alt="linked in" width="16" height="16" class="pull-right mR2">`:replace=`twitter==<img src="/assets/images/mapof/twitter.png" alt="twitter" width="16" height="16" class="pull-right mR2">`]]<b>[[+tv.GPGroupName:replace=`'==&apos;`:default=`Dr [[+createdby:userinfo=`fullname`:ucwords]]`]]</b><br>[[+tv.occupation:notempty=`Occupation: [[+tv.occupation]]<br>`]][[+tv.other:notempty=`Occupation: [[+tv.other]]<br><br>`]]
[[+content:replace=`
==<br>`:replace=`'==&apos;`:strip]]<br>[[+tv.leadadmin:notempty=`<br>Admin contact: [[+tv.leadadmin]]`]] [[+tv.opentomembers:notempty=`<br>Open to new members?: [[+tv.opentomembers]]`]]
<br>[[+tv.showEmailAddress:eq=`Yes`:then=`Email: <a href="mailto:[[+createdby:userinfo=`email`]]">
[[+createdby:userinfo=`email`]]</a>`:else=``]]</div>',options:{[[+tv.leadadmin:neq=``:then=`icon: new
google.maps.MarkerImage('/assets/images/mapof/pin-gold.png')`:else=`icon: new
google.maps.MarkerImage('/assets/images/mapof/pin-blue.png')`]]}},`:else=`{address:'[[+tv.country]], [[+pagetitle]]', data:'<div class="googleBubble"><h3>Login to view</h3><p>To view the details of this pin please <a href="[[~702]]">create an account</a> or <a href="[[~702]]">login</a></p>
</div>',options:{[[+tv.leadadmin:neq=``:then=`icon: new
google.maps.MarkerImage('/assets/images/mapof/pin-gold.png')`:else=`icon: new
google.maps.MarkerImage('/assets/images/mapof/pin-blue.png')`]]}},`]]`]]
```

Если ваши чанки выглядят так — остановитесь: переосмыслите проблему и перенесите логику в сниппет или куда-то еще.

### Reasons Why Output Modifiers Might Destroy Your Site

1. Увеличение затрат на обслуживание: редактирование HTML-кода займет у вас много времени, если вы замаскируете его сложной логикой.
2. Скорость! Вы не можете полностью кэшировать динамический блок или шаблон, который использует логические условия. Модификаторы вывода намного медленнее, чем простой PHP.
3. В отличие от PHP, ошибки модификаторов вывода не показываются в выводе страницы: они пишутся в журнал ошибок MODX (без номера строки, указывающего на ваш чанк), поэтому гораздо сложнее отлаживать ошибки!
4. Модификаторы вывода не используют скобки, и в текстовом редакторе невозможно сопоставить обратные метки, поэтому в вашем коде очень легко делать синтаксические ошибки.

Если вам действительно нужно их использовать, вот [отличная статья](https://modx.com/blog/2012/09/14/tags-as-the-result-or-how-conditionals-are-like-mosquitoes/) описание того, как использовать модификаторы вывода в качестве условных выражений с минимальными накладными расходами.

## Правильный способ сделать это

Держите свои чанки и шаблоны _чистыми_. Они должны быть легко читаемыми и легко редактируемыми.

``` php
Дорогой [[+first_name]], было приятно видеть тебя в последний раз [[+day_of_week]]
```

## Чек лист хорошего чанка

1. Дайте вашему tpl чанка хорошее описание, чтобы люди знали, что он содержит и какие сниппеты полагаются на него.
2. Не включайте другие чанки в чанки! Все может стать очень запутанным, если вы начнете спускаться по этой кроличьей норе.
3. Используйте правильные отступы, чтобы ваш HTML легко читался.
4. Если вы используете какую-то логику в своих списках Чанков, убедитесь, что вы используете ее _ответственно_. **Не вкладывайте теги** и не объединяйте длинные операторы if-else вместе. Хорошее практическое правило таково: если ваш модификатор вывода не помещается на одной строке, то вы должны сделать это по-другому.

## Смотрите также

1. [Шаблоны ваших сниппетов](extending-modx/snippets/templating)
2. [Добавление CSS и JS на ваши страницы с помощью сниппетов](extending-modx/snippets/register-assets)
3. [Как написать хороший сниппет](extending-modx/snippets/good-snippet)
