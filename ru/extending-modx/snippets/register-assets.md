---
title: "Добавление CSS и JS"
translation: "extending-modx/snippets/register-assets"
---

## Учимся регистрировать CSS и JS

Итак, у вас есть сниппет, который вы пишете, и вы хотите добавить CSS и/или JavaScript на свои страницы, но вам не нужно настраивать пользовательскую переменную шаблона и редактировать ее на каждом ресурсе, который используется в вашем сниппете. Ты хочешь, чтобы Сниппет сделал это! На самом деле это довольно просто, используя некоторые методы MODX API.

**Другие CMS**
Это общая потребность в любой CMS, поэтому, если вы переходите с другой платформы, вот некоторые из связанных функций, например **WordPress** использует функции:

- `wp_enqueue_script`,
- `wp_register_script`,
- `wp_enqueue_style`,
- `wp_register_style`.

## Добавление к HEAD

Существует несколько методов, которые автоматически добавляют CSS и/или JavaScript в HEAD текущей страницы. Они будут работать в том порядке, в котором они были добавлены, поэтому, если они вам нужны в определенном порядке, убедитесь, что вы выполняете методы также в этом порядке.

### regClientCSS

Эта функция позволяет зарегистрировать любой файл CSS в HEAD содержимого, указав URL-адрес в методе:

``` php
$modx->regClientCSS('assets/css/my-custom.css');
```

Или, более правильно, вы бы использовали константу `MODX_ASSETS_URL`, чтобы ваш сниппет или плагин работал даже на сайте, который был настроен для использования нестандартного расположения ресурсов.

``` php
$modx->regClientCSS(MODX_ASSETS_URL.'css/my-custom.css');
```

### regClientStartupScript

Эта функция позволяет зарегистрировать любой произвольный JavaScript-код для HEAD документа:

``` php
$modx->regClientStartupScript('assets/js/site.js');
```

``` php
$modx->regClientStartupScript('//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"');
```

``` php
$modx->regClientStartupScript('http://code.jquery.com/jquery-latest.min.js');
```

### regClientStartupHTMLBlock

Эта функция полезна, если вам нужно установить некоторые переменные JS или вывести HTML в HEAD:

``` php
$modx->regClientStartupHTMLBlock('
<meta tag="here" />
<script type="text/javascript">
var myCustomJSVar = 123;
</script>');
```

## Добавление до конца BODY

Существуют также методы, которые можно использовать для вставки Javascript или HTML в конце каждой страницы, прямо перед закрытием тега BODY. Они часто полезны для пользовательских сценариев аналитики или JS, которые необходимо запускать на уровне тела, а не в HEAD.

### regClientScript

Действует аналогично [regClientStartupScript](extending-modx/modx-class/reference/modx.regclientstartupscript) за исключением того, что он работает перед закрывающим тегом BODY:

``` php
$modx->regClientScript('assets/js/footer.js');
```

``` php
$modx->regClientScript('//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"');
```

``` php
$modx->regClientScript('http://code.jquery.com/jquery-latest.min.js');
```

### regClientHTMLBlock

Действует аналогично [regClientStartupHTMLBlock](extending-modx/modx-class/reference/modx.regclientstartuphtmlblock) за исключением того, что он работает перед закрывающим тегом BODY:

``` php
$modx->regClientHTMLBlock('
<div>custom stuff here</div>
<script type="text/javascript">
runAnalytics();
</script>');
```

## Вывод

MODX предлагает разработчикам дополнительных возможностей множество способов вставки пользовательских CSS/JS в их страницы на уровне фрагмента. 
Тем не менее, MODX также рекомендует в любых распространяемых вами дополнениях, чтобы убедиться, что вставка CSS или JS в страницу является переключаемой опцией, так что пользователь может настроить контент или инфраструктуру JavaScript, если они того пожелают.

## Смотрите также

1. [Создание шаблонов сниппетов](extending-modx/snippets/templating)
2. [Добавление CSS и JS на ваши страницы через сниппеты](extending-modx/snippets/register-assets)
3. [Как написать хороший Сниппет](extending-modx/snippets/good-snippet)
4. [Как написать хороший чанк](extending-modx/snippets/good-chunk)
