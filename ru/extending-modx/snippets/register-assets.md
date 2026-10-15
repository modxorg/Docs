---
title: "Добавление CSS и JS"
translation: "extending-modx/snippets/register-assets"
---

Регистрируйте CSS и JavaScript из сниппета вместо переменной шаблона, которую иначе пришлось бы править на каждом ресурсе.

## Добавление к HEAD

Существует несколько методов, которые автоматически добавляют CSS и/или JavaScript в HEAD текущей страницы. Они будут работать в том порядке, в котором они были добавлены, поэтому, если они вам нужны в определенном порядке, убедитесь, что вы выполняете методы также в этом порядке. Регистрация дедуплицируется по URL: повторный вызов метода с тем же `$src` сохраняет только первую регистрацию, поэтому позиция ассета определяется первым вызовом.

### regClientCSS

Эта функция позволяет зарегистрировать любой файл CSS в HEAD содержимого, указав URL-адрес в методе:

``` php
$modx->regClientCSS('assets/css/my-custom.css');
```

Или, более правильно, вы бы использовали константу `MODX_ASSETS_URL`, чтобы ваш сниппет или плагин работал даже на сайте, который был настроен для использования нестандартного расположения ресурсов.

``` php
$modx->regClientCSS(MODX_ASSETS_URL.'css/my-custom.css');
```

Необязательный второй аргумент добавляет атрибут `media` в генерируемый тег `<link>`:

``` php
$modx->regClientCSS(MODX_ASSETS_URL.'css/print.css', 'print');
```

Если строка уже содержит `<style` или `<link`, она вставляется как есть, без оборачивания в тег `<link>`.

### regClientStartupScript

Эта функция позволяет зарегистрировать любой произвольный JavaScript-код для HEAD документа:

``` php
$modx->regClientStartupScript('assets/js/site.js');
```

``` php
$modx->regClientStartupScript('//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js');
```

Если строка уже содержит `<script`, она вставляется как есть; необязательный второй аргумент `$plaintext = true` принудительно включает такое «сырое» поведение (именно так работает `regClientStartupHTMLBlock` внутри).

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

Как и у `regClientStartupScript`, строка с `<script` вставляется как есть, а `$plaintext = true` принудительно включает такое поведение.

### regClientHTMLBlock

Действует аналогично [regClientStartupHTMLBlock](extending-modx/modx-class/reference/modx.regclientstartuphtmlblock) за исключением того, что он работает перед закрывающим тегом BODY:

``` php
$modx->regClientHTMLBlock('
<div>custom stuff here</div>
<script type="text/javascript">
runAnalytics();
</script>');
```

## Смотрите также

1. [Создание шаблонов сниппетов](extending-modx/snippets/templating)
2. [Как написать хороший Сниппет](extending-modx/snippets/good-snippet)
3. [Как написать хороший чанк](extending-modx/snippets/good-chunk)
