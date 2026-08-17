---
title: "Собираем и устанавливаем первую версию пакета"
translation: "extending-modx/creating-components/package-build"
---

В прошлом уроке мы определились с примерным функционалом, написали схему таблиц и сгенерировали модель xPDO для работы с БД MySQL.

А сегодня нужно собрать и установить первую версию пакета и разобраться, как работают [Custom Manager Pages](extending-modx/custom-manager-pages "Custom Manager Pages").

Учитывая, что мы используем заготовку modExtra и уже разобрали, как она работает, сборка пакета сводится к запуску скрипта `build.transport.php` на сервере.

Если в конфиге `build.config.php` задана константа `PKG_AUTO_INSTALL`, компонент сразу установится на сайт.

Итак, я запускаю `c2263.paas2.ams.modxcloud.com/Sendex/_build/build.transport.php`, и в конфиге у меня включена автоустановка. Поэтому сразу после сборки пакетом уже можно пользоваться.

![](/2.x/ru/extending-modx/creating-components/package-build/package-build-1.png)

![](/2.x/ru/extending-modx/creating-components/package-build/package-build-2.png)

Иначе пришлось бы зайти в управление пакетами, искать их локально и устанавливать. Пакеты я собираю часто, и делать это каждый раз давно надоело.

Давайте теперь посмотрим, как работает CMP, то есть наш новый раздел админки Sendex.

## Меню

Все меню MODX состоят из двух частей: собственно пункта меню и действия, которое он вызывает. Как и всё остальное в Revolution, меню и действие тоже объекты. Мы задаём их в файле [transport.menu.php](https://github.com/bezumkin/Sendex/blob/master/_build/data/transport.menu.php).

Видите: в массиве с пунктами меню (у нас он один) modMenu есть ещё ключ **action**. Это параметры для создаваемого modAction.

Если захотим добавить ещё один пункт, получится примерно так:

``` php
$tmp = array(
    'sendex' => array(
        'description' => 'sendex_menu_desc',
        'action' => array(
            'controller' => 'index',
        ),
    ),
    'another_menu' => array(
        'description' => 'My description',
        'action' => array(
        'controller' => 'and here is the file controller',
        ),
    ),
);
```

Ещё можно указать, в каком родительском меню будет наш пункт. Это параметр **parent**, и в нашем случае он стандартный: **components**.

А вот у miniShop2, который изначально планировался под расширения, меню лежит не в components, а в корне. Посмотрите на его [transport.menu.php](https://github.com/bezumkin/miniShop2/blob/master/_build/data/transport.menu.php). У первого пункта там `parent = ''`, а у следующих уже `parent = 'minishop2'`.

Для таких случаев нужен ещё параметр **handler**: javascript-функция, которая вызывается при клике на пункт меню. Для основного пункта меню MS2, который просто контейнер подменю, это `return false;`. То есть при клике ничего не делать.

Но у нас простой, можно сказать классический случай: один CMP и один пункт меню в components.

Как правило (не обязательно), modMenu связан с `modAction`. Его цель запустить конкретный контроллер. Поэтому в массиве с action мы указываем пункт **controller**.

## Настройка для разработки

Прежде чем разбирать контроллер, нужно сделать несколько настроек, чтобы удобно работать на удалённом сервере.

Напоминаю: весь наш проект лежит в каталоге Sendex в корне сайта. А только что установленный пакет распаковался в `/core` и `/assets`. Теперь, если мы что-то меняем, изменения синхронизируются с каталогом в корне и не затрагивают установленные файлы.

Здесь 2 варианта: после каждого изменения собирать и устанавливать пакет или научить MODX загружать скрипты из каталога `/Sendex`.

Конечно, второй вариант предпочтительнее. Поэтому идём в **Система → Пространства имён** и делаем так:

![](/2.x/ru/extending-modx/creating-components/package-build/package-build-3.png)

Это позволит MODX обращаться за исходниками в наш каталог. Теперь нужно создать системные настройки `sendex_core_path` и `sendex_assets_url` (а демо-настройку `sendex_some_setting` можно удалить):

![](/2.x/ru/extending-modx/creating-components/package-build/package-build-4.png)

![](/2.x/ru/extending-modx/creating-components/package-build/package-build-5.png)

`sendex_assets_path` необязательна, но тоже полезна. Эти настройки нужны, чтобы знать, где искать наши файлы.

В принципе можно их не создавать и каждый раз доставать `modNamespace`, но это не очень удобно.

С этого момента рабочие каталоги проекта можно получать так:

``` php
$corePath = $this->modx->getOption('sendex_core_path', $config, $this->modx->getOption('core_path') . 'components/sendex/');
$assetsUrl = $this->modx->getOption('sendex_assets_url', $config, $this->modx->getOption('assets_url') . 'components/sendex/');
```

И последний штрих: нужно добавить

``` php
ini_set('display_errors', 1);
ini_set('error_reporting', -1);
```

в системные файлы MODX: `/index.php` и `/manager/index.php`. Они нужны, чтобы MODXCloud не прятал от нас ошибки во время разработки.

Забегая немного вперёд: ещё нужно подправить `/assets/components/sendex/connector.php`, потому что он загружает MODX при запросах из админки и должен уметь работать и при обычном расположении файлов, и при разработке в каталоге Sendex. Лично я и здесь добавляю вывод ошибок, чтобы видеть ругань на ajax-запросах из админки.
В итоге у меня получился [вот такой коннектор](https://github.com/bezumkin/Sendex/blob/8863b2c6960c304464a9c24b6ba13db03f8aeac2/assets/components/sendex/connector.php). Советую сохранить его.

## Контроллеры CMP

Итак, при клике на пункт меню MODX смотрит, с каким действием он связан и на какой контроллер ссылается, а затем вызывает этот файл.

Контроллер это специальный php-файл в каталоге core компонента, наследующий `modManagerController`. Указывается он просто по имени: если версия MODX <2.2, это может быть `index.php` или `controller.php`, а если MODX новее, обычно используют `index.class.php` или `controller.class.php`.

Наш контроллер лежит в `/core/components/sendex/index.class.php`, поэтому в `modAction` указан index.
Учитывая настройки для разработки, первым делом меняем загрузку класса Sendex и приводим файл [вот к такому виду](https://github.com/bezumkin/Sendex/blob/988146a6938bae7225b0432dd031b0dfc42ea7ce/core/components/sendex/index.class.php). Теперь не нужно каждый раз собирать пакет, и все изменения сразу видны.

А сейчас внимательно [смотрите на файл](https://github.com/bezumkin/Sendex/blob/master/core/components/sendex/index.class.php) и пытайтесь войти в логику.

* MODX нужен контроллер `index`, и в нём он ищет для запуска `IndexManagerController`. Это делается автоматически
* `IndexManagerController` наследует абстрактный класс `SendexMainController` со всеми его методами
* `SendexMainController` наследует `modExtraManagerController` со всеми его методами
* `modExtraManagerController` общий класс всех CMP и содержит основную логику работы. Он запускает свой метод `initialize()`
* Этот метод переопределён в дочернем классе `SendexMainController`, поэтому запускается оттуда
* Мы уже смотрим системные настройки и подгружаем класс Sendex из каталога, указанного в системных настройках
* Создаётся новый экземпляр класса `Sendex`. В PHP 5 при этом вызывается метод `__construct()`. У нас он задаёт переменную `Sendex::config`, в которую кладёт массив с настройками и путями к файлам
* Пути к файлам определяются так же через системные настройки. Значит, мы грузим их из каталога `/Sendex/...`
* В этот момент уже можно обращаться к любым методам и свойствам класса Sendex, включая `$sendex->config`
* Где-то в глубинах `modExtraManagerController` уже добавлен класс `modX`, и мы можем обращаться к нему через `$this->modx`
* Теперь комбинируем конфиг Sendex и методы `modX`, чтобы подключить нужные скрипты и стили из каталогов компонента
* После того как подключили всё нужное, передаём дальнейшую логику родительскому классу. Пусть делает что хочет
* А он хочет узнать, какой контроллер грузить дальше, и класс `IndexManagerController` отвечает: `home`
* Этот класс уже загрузится из каталога `/Sendex/core/components/sendex/controllers/home.class.php`

**Всё это знать не обязательно!** Такая логика используется примерно в 90% новых дополнений и сводится к вызову основного контроллера. Он загружает основные файлы компонента и передаёт управление дочернему контроллеру. А тот уже загрузит всё нужное для конкретной страницы компонента.

Обычно у компонента **одна** страница, поэтому все эти сложности можно пропустить. По большому счёту в `index.class.php` больше залезать не нужно. Работать будем только с `controllers/home.class.php`.

Честно говоря, я и сам не до конца понимаю эту цепочку контроллеров и кто кого загружает, поэтому просто следую отлаженной схеме.

Ещё одно замечание: в моём modExtra скрипты и стили загружаются по старинке методами:

```php
$this->modx->regClientCSS()
$this->modx->regClientStartupScript()
$this->modx->regClientScript()
$this->modx->regClientStartupHTMLBlock()
```

Если хотите, чтобы компонент дружил с [AjaxManager](https://modx.com/extras/package/ajaxmanager), их нужно заменить на:

```php
$this->addCss()
$this->addJavascript()
$this->addLastJavascript()
$this->addHtml()
```

При этом инициализацию страницы нужно перенести из `/assets/components/sendex/js/mgr/sections/home.js` в `home.class.php`. Иначе при открытии страницы будет ошибка.

Лично я всё это сделал, поэтому просто сверьте и скопируйте мои файлы: [index.class.php](https://github.com/bezumkin/Sendex/blob/75c06d157fb8eaf20bff62330dc68fedad6a19db/core/components/sendex/index.class.php), [home.class.php](https://github.com/bezumkin/Sendex/blob/75c06d157fb8eaf20bff62330dc68fedad6a19db/core/components/sendex/controllers/home.class.php) и [home.js](https://github.com/bezumkin/Sendex/blob/75c06d157fb8eaf20bff62330dc68fedad6a19db/assets/components/sendex/js/mgr/sections/home.js).

Если всё сделали правильно, можно на всякий случай синхронизировать проект, почистить кэши везде и зайти на страницу Sendex в админке:

![](/2.x/ru/extending-modx/creating-components/package-build/package-build-6.png)

Это страница из modExtra. Она вызывает его контроллеры с его объектами (которые мы удалили), поэтому в логе MODX должны появиться ошибки:

![](/2.x/ru/extending-modx/creating-components/package-build/package-build-7.png)

Это нормально. Они пропадут, когда мы перепишем процессоры.

Можно также проверить, срабатывают ли изменения при синхронизации проекта с сервером.

Пишем в `index.class.php` сразу после:

``` php
<?php:
echo 'Hello world';
die;
```

Сохраняем и обновляем страницу в админке:

![](/2.x/ru/extending-modx/creating-components/package-build/package-build-8.png)

Если видите то же, что и я, всё хорошо.

Кстати, при последующей сборке и установке пакета наш namespace перезапишется на стандартный, поэтому я внёс [пару изменений в установщик](https://github.com/bezumkin/Sendex/commit/5416d620300261025420f9e73c41ee3a6fb9fd5a). Видите, как просто работать с установщиком? Советую сделать так же.

## Основные методы контроллера

Нужно ещё немного рассказать о методах контроллера home.class.php, который будет у нас основным рабочим.

### getPageTitle

Вывод текста для тега title страницы CMP. Сейчас там выводится sendex из лексикона, поэтому мы видим его в заголовке:

![](/2.x/ru/extending-modx/creating-components/package-build/package-build-9.png)

### getTemplateFile

Этот метод отдаёт html-шаблон страницы, который распарсит Smarty. Учитывая, что вся админка сделана на ExtJS, файл шаблона `/core/components/sendex/elements/templates/home.tpl` выглядит так:

``` html
<div id="sendex-panel-home-div"></div>
```

Про него можно сразу забыть. Он просто выводит тег, который используют для отрисовки компонента ExtJs.

### getLanguageTopics

Этот метод возвращает массив словарей, которые будет использовать компонент.

### checkPermissions

Проверять или нет права доступа к странице. Их можно указать в настройке меню:

![](/2.x/ru/extending-modx/creating-components/package-build/package-build-10.png)

чтобы закрыть страницу от кого-то. Например, можно указать `save_document`, чтобы пускать только пользователя с правом редактирования документов.

### loadCustomCssJs

Основной метод контроллера. Именно он загружает все нужные скрипты и стили для работы страницы. В него мы ещё будем добавлять всякое.

## Заключение

Ну что, на мой взгляд всё самое сложное позади: мы собрали, установили и настроили компонент для дальнейшей удобной разработки.

У нас даже есть демо-страница в админке благодаря скриптам modExtra. С ними разберёмся в следующем уроке.

Текущий вид смотрите на GitHub в [истории изменений файлов](https://github.com/bezumkin/Sendex/commits/master).
