---
title: "Выходной фильтр/модификаторы"
translation: "building-sites/tag-syntax/output-filters"
---

## Что такое фильтры?

Фильтры в Revolution позволяют управлять способом представления или анализа данных в теге. Они позволяют вам изменять значения внутри ваших шаблонов.

## Входной фильтр

## Выходной фильтр

В Revolution фильтр вывода применяет один или несколько серий выходных модификаторов, которые ведут себя аналогично вызовам PHx в MODX Evolution - за исключением того, что они встроены в ядро. Синтаксис выглядит так:

```php
[[element:modifier=`value`]]
```

Они также могут быть прикованы цепью (выполнено слева направо):

```php
[[element:modifier:anothermodifier=`value`:andanothermodifier:yetanother=`value2`]]
```

Вы также можете использовать их для изменения вывода сниппеты. Обратите внимание, что модификатор идет после имени сниппета и перед знаком вопроса, например:

```php
[[mySnippet:modifier=`value`? &mySnippetParam=`something`]]
```

Если у вас есть более длинный код :then=`:else=` оператор, и вы хотите сделать его более читабельным, поместив его в несколько строк, это должно быть сделано так:

```php
[[+placeholder:is=`0`:then=`
 // code
`:else=`
 // code
`]]
```

## Модификаторы вывода

В следующей таблице перечислены некоторые из существующих модификаторов и приведены примеры их использования. Хотя приведенные ниже примеры являются тегами-плейсхолдеров, выходные модификаторы можно использовать с любым тегом MODX. **Убедитесь, что используемый заполнитель действительно получает данные.**

### Условные модификаторы вывода

| Модификатор                                                  | Описание                                                                                                                      | Пример                                                                                        |
| ------------------------------------------------------------ | ----------------------------------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------- |
| if, input                                                    | if - задает дополнительное условие. input - добавляет в тег обратываемые данные                                                                                                                    | ``[[*id:is=`1`:and:if=`[[*id]]`:ne=`2`:then=`Да`:else=`Нет`]]`` - если id-ресурса = 1 и не равно 2, выводим "Да", или же "Нет"                                                                                              |
| or                                                           | Может использоваться для вывода выходных модификаторов вместе с отношением «OR».                                              | `` [[+numbooks:is=`5`:or:is=`6`:then=`Есть 5 или 6 книг!`:else=`Не уверен, сколько книг`]] `` |
| and                                                          | Может использоваться для вывода выходных модификаторов вместе с отношением «AND».                                             | ``[[*id:is=`1`:and:if=`[[*id]]`:ne=`2`:then=`Да`:else=`Нет`]]`` - если id-ресурса = 1 и не равно 2, выводим "Да", или же "Нет"                                                                                           |
| isequalto, isequal, equalto, equals, is, eq                  | Сравнивает с переданным значением и продолжает, если оно такое же. Используется с "then" и "else"                             | `` [[+numbooks:isequalto=`5`:then=`Есть 5 или 6 книг!`:else=`Не уверен, сколько книг`]] ``    |
| notequalto, notequals, isnt, isnot, neq, ne                  | Сравнивает с переданным значением и перемещается, если оно не совпадает. Используется с "then" и "else"                       | `` [[+numbooks:notequalto=`5`:then=`Не уверен, сколько книг`:else=`Есть 5 книг!`]] ``         |
| greaterthanorequalto, equalorgreaterthen, ge, eg, isgte, gte | Сравнивает с переданным значением и продолжает, если оно больше или равно значению. Используется с "then" и "else".           | `` [[+numbooks:gte=`5`:then=`Есть 5 книг или более 5 книг`:else=`Есть менее 5 книг`]] ``      |
| isgreaterthan, greaterthan, isgt, gt                         | Сравнивает с переданным значением и продолжает, если оно больше, чем значение. Используется с "then" и "else".                | `` [[+numbooks:gt=`5`:then=`Есть более 5 книг`:else=`Есть менее 5 книг`]] ``                  |
| equaltoorlessthan, lessthanorequalto, el, le, islte, lte     | Сравнивает с переданным значением и продолжает, если оно меньше или равно значению. Используется с "then" и "else".           | `` [[+numbooks:lte=`5`:then=`Есть 5 или менее 5 книг`:else=`Есть более 5 книг`]] ``           |
| islowerthan, islessthan, lowerthan, lessthan, islt, lt       | Сравнивает с переданным значением и продолжает, если оно меньше значения. Используется с "then" и "else".                     | `` [[+numbooks:lt=`5`:then=`Есть менее 5 книг`:else=`Есть более 5 книг`]] ``                  |
| contains                                                     | Проверяет, содержит ли значение переданную строку.                                                                            | `` [[+author:contains=`Samuel Clemens`:then=`Mark Twain`]] ``                                 |
| containsnot                                                  | Проверьте, не содержит ли значение переданную строку.                                                                         | `` [[+author:containsnot=`Samuel Clemens`:then=`Somebody Else`]] ``                           |
| in, IN, inarray, inArray                                     | Проверьте, находится ли значение в массиве (через запятую)                                                                    | `` [[+id:in=`5,15,22`:then=`Yes in array`]] ``                                                |
| hide                                                         | Проверяет более ранние условия и скрывает элемент, если условия были выполнены.                                               | `` [[+numbooks:lt=`1`:hide]] ``                                                               |
| show                                                         | Проверит более ранние условия и покажет элемент, если условия были выполнены.                                                 | `` [[+numbooks:gt=`0`:show]] ``                                                               |
| then                                                         | Условное использование.                                                                                                       | `` [[+numbooks:gt=`0`:then=`Now available!`]] ``                                              |
| else                                                         | Условное использование вместе с потом.                                                                                        | `` [[+numbooks:gt=`0`:then=`Now available!`:else=`Sorry, currently sold out.`]] ``            |
| select                                                       | Выведите замену, если значение находится в списке значений перед знаком равенства. В противном случае результат будет пустым. | `` [[+numbooks:select=`0=Value 0&1=Value 1&2=Value 2`]] ``                                    |
| memberof, ismember, mo                                       | Проверяет, является ли пользователь членом указанной группы (групп).                                                          | `` [[+modx.user.id:memberof=`Administrator`]] ``                                              |

### Модификаторы вывода строки

| Модификатор                              | Описание                                                                                                                                                                                                                                                                             | Пример                                             |
| ---------------------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | -------------------------------------------------- |
| cat                                      | Добавляет значение параметра (если оно не пустое) к входному значению                                                                                                                                                                                                                | `` [[+numbooks:cat=`books`]] ``                    |
| after, append                            | Добавляет значение параметров к входному значению (если оба не пустые). Добавлен в 2.6.0.                                                                                                                                                                                            | `` [[+totalnumber:after=`total`]] ``               |
| before, prepend                          | Добавляет значение параметров к входному значению (если оба не пустые). Добавлен в 2.6.0.                                                                                                                                                                                            | `` [[+booknum:before=`book #`]] ``                 |
| lcase, lowercase, strtolower             | Преобразует строки в нижний регистр. Похож на PHP [strtolower](http://www.php.net/manual/en/function.strtolower.php)                                                                                                                                                                 | `[[+title:lcase]]`                                 |
| ucase, uppercase, strtoupper             | Преобразует строки в верхний регистр. Похож на PHP [strtoupper](http://www.php.net/manual/en/function.strtoupper.php)                                                                                                                                                                | `[[+headline:ucase]]`                              |
| ucwords                                  | Преобразует первую букву слова в верхний регистр. Похож на PHP [ucwords](http://www.php.net/manual/en/function.ucwords.php)                                                                                                                                                          | `[[+title:ucwords]]`                               |
| ucfirst                                  | Преобразует первую букву строки в верхний регистр. Похож на PHP [ucfirst](http://www.php.net/manual/en/function.ucfirst.php)                                                                                                                                                         | `[[+name:ucfirst]]`                                |
| htmlent, htmlentities                    | Замените любой символ, имеющий HTML-сущность, этой сущностью. Похож на PHP [htmlentities](http://www.php.net/manual/en/function.htmlentities.php). Uses the current value the system setting `modx_charset` with flag `ENT_QUOTES`                                                   | `[[+email:htmlent]]`                               |
| esc,escape                               | Безопасно экранирует значения символов, используя регулярные выражения и str_replace.                                                                                                                                                                                                | Также убирает \[, \] и `[[+email:escape]]`         |
| strip                                    | Заменить все разрывы строк, табуляции и несколько пробелов одним пробелом                                                                                                                                                                                                            | `[[+textdocument:strip]]`                          |
| stripString                              | Удаляет строку указанного значения                                                                                                                                                                                                                                                   | `` [[+name:stripString=`Mr.`]] ``                  |
| stripmodxtags                            | Удаляет теги MODX из ввода. (Добавлено в v2.7)                                                                                                                                                                                                                                       | `[[+code:stripmodxtags]]`                          |
| replace                                  | Заменяет одно значение другим                                                                                                                                                                                                                                                        | `` [[+pagetitle:replace=`Mr.==Mrs.`]] ``           |
| striptags, stripTags,notags,strip_tags   | Удаляет HTML-теги из ввода. Опционально принимает значение, чтобы указать, какие теги разрешить. Похож на PHP [strip_tags](http://www.php.net/manual/en/function.strip-tags.php)                                                                                                     | `` [[+code:strip\_tags=` `]] ``                    |
| len,length, strlen                       | Подсчитывает длину пропущенной строки. Похож на PHP [strlen](http://www.php.net/manual/en/function.strlen.php)                                                                                                                                                                       | `[[+longstring:strlen]]`                           |
| reverse, strrev                          | Обращает ввод, символ за символом. Похож на PHP [strrev](http://www.php.net/manual/en/function.strrev.php)                                                                                                                                                                           | `[[+mirrortext:reverse]]`                          |
| wordwrap                                 | Вставка символа новой строки после установленного количества символов. Похож на PHP [wordwrap](http://www.php.net/manual/en/function.wordwrap.php). Takes optional value to set wordwrap position.                                                                                   | `` [[+bodytext:wordwrap=`80`]] ``                  |
| wordwrapcut                              | Вставляет символ новой строки после заданного количества символов, независимо от границ слова. Похож на PHP [wordwrap](http://www.php.net/manual/en/function.wordwrap.php), с включенным сокращением слова. Принимает необязательное значение для установки положения переноса слов. | `` [[+bodytext:wordwrapcut=`80`]] ``               |
| limit                                    | Ограничивает строку определенным количеством символов. По умолчанию 100.                                                                                                                                                                                                             | `` [[+description:limit=`50`]] ``                  |
| ellipsis                                 | Добавляет многоточие и усекает строку, если она длиннее определенного количества символов. В качестве контрольных точек используются только пробелы. По умолчанию 100.                                                                                                               | `` [[+description:ellipsis=`50`]] ``               |
| tag                                      | Отображает необработанный элемент без :tag. Полезно для документации.                                                                                                                                                                                                                | `[[+showThis:tag]]`                                |
| tvLabel                                  | Отображает метку с TV, полезную при использовании выбора или флажки и т.д., Где вы используете `Label==1||Otherlabel==2||More options==3` если значение 2 вернет Otherlabel.                                                                                                         | `[[+mySelectboxTv:tvLabel]]`                       |
| math                                     | Возвращает результат расширенного расчета (Не рекомендуется) Удалено в Revolution 2.2.6.                                                                                                                                                                                             | `` [[+blackjack:add=`21`]] ``                      |
| add,increment,incr                       | Возвращает входные данные, увеличенные на параметр (по умолчанию: +1)                                                                                                                                                                                                                | `[[+downloads:incr]]`                              |
| subtract,decrement,decr                  | Возвращает входные данные, уменьшенные на параметр (по умолчанию: -1)                                                                                                                                                                                                                | `[[+countdown:decr]]` ``[[+moneys:subtract=`100`]]`` |
| multiply,mpy                             | Возвращает входные данные, умноженные на параметр (по умолчанию: \*2)                                                                                                                                                                                                                | `` [[+trifecta:mpy=`3`] ``                         |
| divide,div                               | Возвращает входные данные, разделенные на опции (по умолчанию: /2) Не принимает 0.                                                                                                                                                                                                   | `` [[+rating:div=`4`]] ``                          |
| modulus,mod                              | Возвращает модуль параметра на входе (по умолчанию: %2, возвращает 0 или 1)                                                                                                                                                                                                          | `[[+number:mod]]` или ``[[+number:mod=`3`]]``        |
| ifempty,default,empty, isempty           | Возвращает входное значение, если оно пустое                                                                                                                                                                                                                                         | `` [[+name:default=`anonymous`]] ``                |
| notempty, !empty, ifnotempty, isnotempty | Возвращает входное значение, если оно не пустое                                                                                                                                                                                                                                      | `` [[+name:notempty=`Hello `[[+name]]`!`]] ``      |
| nl2br                                    | Преобразует символ новой строки (\\n) в HTML                                                                                                                                                                                                                                         |                                                    |
| element.                                 | Используйте это, если вы принимаете ввод, вы думаете, что в нем должны быть новые строки, а их нет. Похож на PHP [nl2br](http://www.php.net/manual/en/function.nl2br.php).                                                                                                           | `[[+textfile:nl2br]]`                              |
| date                                     | Форматирует временную метку Unix в другой формат. Похож на PHP [strftime](http://www.php.net/manual/en/function.strftime.php). Значение это формат. Посмотрите [Форматы даты](building-sites/tag-syntax/date-formats "Форматы даты").                                                | `` [[+birthyear:date=`%Y`]] ``                     |
| strtotime                                | Преобразует строку даты в метку времени Unix. Полезно сочетать это с выходным фильтром даты. Похож на PHP [strtotime](http://www.php.net/strtotime). Takes in a date. Посмотрите [Форматы даты](building-sites/tag-syntax/date-formats "Форматы даты").                              | `[[+thetime:strtotime]]`                           |
| fuzzydate                                | Возвращает симпатичный формат даты со вчерашним и сегодняшним фильтрованием. Берет в свидание.                                                                                                                                                                                       | `[[+createdon:fuzzydate]]`                         |
| ago                                      | Возвращает красивый формат даты в секундах, минутах, неделях или месяцах назад. Берет на свидание (strtotime).                                                                                                                                                                       | `` [[+createdon:date=`%d-%m-%Y`:ago]] ``           |
| md5                                      | Создает хеш MD5 для входной строки. Похож на PHP [md5](http://www.php.net/manual/en/function.md5.php).                                                                                                                                                                               | `[[+password:md5]]`                                |
| cdata                                    | Обтекание текста тегами CDATA                                                                                                                                                                                                                                                        | `[[+content:cdata]]`                               |
| userinfo                                 | Возвращает запрошенные данные пользователя. Элемент должен быть идентификатором modUser. Поле значения - это столбец для захвата, например: fullname, email. Смотрите примеры ниже.                                                                                                  | `` [[+modx.user.id:userinfo=`username`]] ``        |
| isloggedin                               | Возвращает true, если пользователь аутентифицирован в этом контексте.                                                                                                                                                                                                                | `[[+modx.user.id:isloggedin]]`                     |
| isnotloggedin                            | Возвращает true, если пользователь не аутентифицирован в этом контексте.                                                                                                                                                                                                             | `[[+modx.user.id:isnotloggedin]]`                  |
| toPlaceholder                            | Помещает введенное значение в переданный плейсхолдер. Не мешает вывод значения TV, поэтому добавьте ``` [[*someTV:toPlaceholder=`placeholder`:notempty=``]] ``` если вы не хотите выводить значение самого TV.                                                                       | `` [[*someTV:toPlaceholder=`placeholder`]] ``      |
| cssToHead                                | Поместите элемент `<link>` в <head>, где входное значение находится внутри атрибута href.                                                                                                                                                                                            |                                                    |
| Uses                                     | [modX.regClientCSS](extending-modx/modx-class/reference/modx.regclientcss "modX.regClientCSS").                                                                                                                                                                                      | `[[+cssTV:cssToHead]]`                             |
| htmlToHead                               | Вставьте блок HTML-кода в заголовок страницы, прежде чем `</head>`.                                                                                                                                                                                                                  |                                                    |
| Uses                                     | [modX.regClientStartupHTMLBlock](extending-modx/modx-class/reference/modx.regclientstartuphtmlblock "modX.regClientStartupHTMLBlock")                                                                                                                                                | `[[+htmlTV:htmlToHead]]`                           |
| htmlToBottom                             | Вставьте HTML-код в конце страницы перед `</body>`. Использовать [modX.regClientHTMLBlock](extending-modx/modx-class/reference/modx.regclienthtmlblock "modX.regClientHTMLBlock").                                                                                                   | `[[+htmlTV:htmlToBottom]]`                         |
| jsToHead                                 | Вставьте код JS (или ссылку) в заголовок страницы перед `</head>`. Использовать [modX.regClientStartupScript](extending-modx/modx-class/reference/modx.regclientstartupscript "modX.regClientStartupScript").                                                                        | `[[+jsTV:jsToHead]]`                               |
| jsToBottom                               | Вставьте код JS (или ссылку) в конце страницы перед `</body>`. Использовать [modX.regClientScript](extending-modx/modx-class/reference/modx.regclientscript "modX.regClientScript").                                                                                                 | `[[+jsTV:jsToBottom]]`                             |
| urlencode                                | Преобразует ввод в строку, удобную для URL, аналогично тому, как это делает форма HTML. Похож на PHP [urlencode](http://www.php.net/manual/en/function.urlencode.php)                                                                                                                | `[[+mystring:urlencode]]`                          |
| urldecode                                | Преобразует входные данные из строки, удобной для URL, аналогично PHP [urldecode](http://www.php.net/manual/en/function.urldecode.php)                                                                                                                                               | `[[+myparam:urldecode]]`                           |
| filterPathSegment                        | Добавлено в 2.7. Преобразует ввод в удобную для URL строку с тем же механизмом, который превращает заголовок страницы в псевдоним, включая транслитерацию, если она включена. Полезно для пользовательских URL.                                                                      | `[[+pagetitle:filterPathSegment]]`                 |

### Кэширование

Как правило, любой контент в заполнителе, который, по вашему мнению, **может изменяться динамически**, должен быть кэширован. Например:

```php
[[+placeholder:default=`A default value!`]]
```

Это означает, что **может** иногда быть пустым, а иногда нет. Почему вы хотите, чтобы это кэшировалось? Это исключило бы точку модификатора вывода.

Иногда выходные модификаторы можно использовать в кешированном заполнителе, но только если вы вызываете сниппет, который также устанавливает их в кеширование. В противном случае вы выполняете нелогичный маневр - пытаетесь статически кешировать что-то, что никогда не было статичным.

В общем правило is: Если вы установите плейсхолдер в некэшированном сниппете, плейсхолдер также необходимо будет кэшировать, если вы ожидаете, что содержимое плейсхолдера будет отличаться.

### Использование модификатора вывода со свойствами тега

Если у вас есть свойства для тега, вы можете указать эти **после** модификатора:

```php
[[!getResources:default=`Sorry - nothing matched your search.`?
    &tplFirst=`blogTpl`
    &parents=`2,3,4,8`
    &tvFilters=`blog_tags==%[[!tag:htmlent]]%`
    &includeTVs=`1`
]]
```

### Создание пользовательского модификатора вывода

Также, [Сниппеты](extending-modx/snippets "Сниппеты") могут быть использованы в качестве пользовательских модификаторов. Проще говоря [Сниппеты](extending-modx/snippets "Сниппеты") имя вместо модификатора. Пример сниппет makeExciting, который добавляет переменное количество восклицательных знаков:

```php
[[*pagetitle:makeExciting=`4`]]
```

Этот вызов переменной документа с модификатором вывода передаст эти свойства в сниппет:

| Параметр | Значение                                 | Пример результата                     |
| -------- | ---------------------------------------- | ------------------------------------- |
| input    | Значение элемента.                       | Значение `[[*pagetitle]]`             |
| options  | Любое значение, переданное модификатору. | '4'                                   |
| token    | Тип родительского элемента.              | \* (токен `pagetitle`)                |
| name     | Имя родительского элемента.              | pagetitle                             |
| tag      | Полный родительский тег.                 | `` [[*pagetitle:makeExciting=`4`]] `` |

Вот пример реализации для нашего сниппета makeExciting:

```php
$defaultExcitementLevel = 1;
$result = $input;
if (isset($options)) {
    $numberOfExclamations = $options;
} else {
    $numberOfExclamations = $defaultExcitementLevel;
}
for ( $i = $numberOfExclamations; $i > 0; $i-- ) {
    $result = $result . '!';
}
return $result;
```

Возвращаемое значение вызова будет тем, что возвращает сниппет. Для нашего примера результатом будет значение переменной документа pagetitle с четырьмя восклицательными знаками.

Исходное входное значение будет возвращено, если сниппет возвращает пустую строку.

## Цепочка (несколько выходных фильтров)

Хорошим примером цепочки может быть форматирование строки даты в другой формат, например так:

```php
[[+mydate:strtotime:date=`%Y-%m-%d`]]
```

Прямой доступ к таблице `modx_user_attributes` в базе данных с использованием модификаторов вывода вместо [Сниппета](extending-modx/snippets "Сниппеты") может быть достигнуто просто с помощью модификатора userinfo. Выберите соответствующий столбец из таблицы и укажите его как свойство модификатора вывода, например так:

```php
User Internal Key: [[!+modx.user.id:userinfo=`internalKey`]]<br />
User name: [[!+modx.user.id:userinfo=`username`]]<br />
Full Name: [[!+modx.user.id:userinfo=`fullname`]]<br />
Role:  [[!+modx.user.id:userinfo=`role`]]<br />
E-mail: [[!+modx.user.id:userinfo=`email`]]<br />
Phone: [[!+modx.user.id:userinfo=`phone`]]<br />
Mobile Phone: [[!+modx.user.id:userinfo=`mobilephone`]]<br />
Fax: [[!+modx.user.id:userinfo=`fax`]]<br />
Date of birth: [[!+modx.user.id:userinfo=`dob`:date=`%Y-%m-%d`]]<br />
Gender: [[!+modx.user.id:userinfo=`gender`]]<br />
Country: [[+modx.user.id:userinfo=`country`]]<br />
State: [[+modx.user.id:userinfo=`state`]]<br />
Zip Code: [[+modx.user.id:userinfo=`zip`]]<br />
Photo: [[+modx.user.id:userinfo=`photo`]]<br />
Comment: [[+modx.user.id:userinfo=`comment`]]<br />
Password: [[+modx.user.id:userinfo=`password`]]<br />
Cache Password: [[+modx.user.id:userinfo=`cachepwd`]]<br />
Last Login: [[+modx.user.id:userinfo=`lastlogin`:date=`%Y-%m-%d`]]<br />
The Login:[[+modx.user.id:userinfo=`thislogin`:date=`%Y-%m-%d`]]<br />
Number of Logins: [[+modx.user.id:userinfo=`logincount`]]
```

`[[!+modx.user.id]]` по умолчанию используется текущий зарегистрированный идентификатор пользователя. Конечно, вы можете заменить это на `[[*madeby]]` или другое поле ресурса или плейсхолдеров, которые возвращают числовой идентификатор, представляющий пользователя.

Обратите внимание, что идентификатор пользователя и имя пользователя уже доступны по умолчанию в MODX, поэтому вам не нужно использовать модификатор userinfo:

```php
[[!+modx.user.id]] - Prints the ID
[[!+modx.user.username]] - Prints the username
```

Скорее всего, вы захотите вызывать их без кэширования (см. Примечание о кэшировании выше), чтобы предотвратить неожиданные результаты.

## Смотрите также

-   [Свойства и наборы свойств](building-sites/properties-and-property-sets "Свойства и наборы свойств")
-   [Шаблоны](building-sites/elements/templates "Шаблоны")
-   [Переменные шаблона](building-sites/elements/template-variables "Переменные шаблона")
-   [Сниппеты](extending-modx/snippets "Сниппеты")
