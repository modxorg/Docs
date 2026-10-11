---
title: "Пользовательские страницы менеджера"
translation: "extending-modx/custom-manager-pages"
---

## Что такое CMP?

CMP расшифровывается как Custom Manager Page, и это просто пользовательская страница, которая загружается в менеджер MODX Revolution. Он также может называться Компонентом или 3PC (3rd Party Component, Сторонний Компонент). Обычно к CMP можно получить доступ из меню «Пакеты» (Extras) в MODX, но в принципе у разработчика есть большая свобода в том, где разместить свои страницы.

Если вы как разработчик хотите создать дополнительный компонент, включающий в себя компонент, вы должны следовать [учебному пособию по разработке дополнений для MODX Revolution](extending-modx/tutorials/developing-an-extra), поскольку он проведет вас через все конкретные шаги и терминологию на основе примера пакета, называемого doodles. Эта страница входит в минимальную настройку для пользовательских страниц менеджера.

## Пространства имен

Для CMP требуется пространство имен, чтобы MODX знал, откуда загружать файлы.

Чтобы создать пространство имен, перейдите в Admin->Пространства имен. Нажмите кнопку «Создать» и присвойте пространству имен имя и основной путь. В Revolution 2.2 путь к ресурсам еще не использовался, но сейчас он поддерживается и также не помешает его указать. Ваше имя пространства имен должно быть в нижнем регистре. Хотя вы можете свободно организовывать свою файловую систему так, как вам хочется, рекомендуется размещать любые файлы в каталоге с тем же именем, что и у вашего пространства имен, в каталогах `core/components` и `assets/components`.

Так, например, если ваше пространство имен называется «awesomestuff», ваш основной путь будет `/path/to/core/components/awesomestuff/`, а путь к ресурсам будет `/path/to/assets/components/awesomestuff/`.

Следующее окно является примером того, какая информация составляет пространство имен:

![](/en/extending-modx/custom-manager-pages/namespace-create1.png)

(ПРИМЕЧАНИЕ: это изображение устарело)

В путях вы также можете использовать плейсхолдеры, которые будут обработаны, когда MODX загружает файлы из вашего пространства имен:

-   `{core_path}` преобразовывается в переменную **MODX_CORE_PATH**, которая содержит абсолютный путь к основному каталогу вашей установки MODX, например `/home/username/public_html/modx_location/core/`
-   `{core_path}` преобразовывается в переменную **MODX_CORE_PATH**, которая содержит абсолютный путь к основному каталогу вашей установки MODX, например `/home/username/public_html/modx_location/core/`
-   `{assets_path}` преобразовывается в переменную **MODX_ASSETS_PATH**, которая содержит абсолютный путь к каталогу ресурсов вашей установки MODX.

## Использование modMenu

Чтобы конечного пользователя направить на свою пользовательскую страницу менеджера, обычно ее делают доступной через левое меню. Это реализовывается с помощью пункта меню (modMenu).

Пункт меню содержит имя и описание для отображения в верхнем меню, а также действие, соответствующее контроллеру - подробнее об этом через минуту.

Перейдите в Admin > Меню и создайте новое меню. Выберите родительский пункт меню: как правило, "Дополнения" (Extras).

В модальном окне вам будет предложено заполнить несколько деталей.

-   Lexicon Key: это может быть либо ключ лексикона, либо заголовок, который вы хотите показать. При создании пакетов, которые будут распространяться, вы должны размещать текст в лексиконах, чтобы их можно было легко перевести. Если это ключ лексикона, он должен быть в теме вашего пространства имен по умолчанию.
-   Description: описание, которое появляется под пунктами меню. Может также быть ключом лексикона.
-   Action: введите название действия (контроллер). А пока введите «index», мы покажем вам почему позже при создании контроллера.
-   Icon: используется только в том случае, если пункт меню находится на верхнем уровне меню, а пользователь находится в узком окне просмотра.
-   Parameters: не требуется для этого урока, но вы можете использовать его, если хотите передать дополнительные параметры URL в ссылку на пункт меню. Просто укажите «&foo=bar» в этом случае.
-   Namespace: введите ваше пространство имен здесь. Это необходимо, чтобы убедиться, что действие направлено на соответствующий путь.
-   Handler: вместо того, чтобы загружать действие, для элемента меню также можно выполнить часть JavaScript при клике. Этот JavaScript должен быть указан в обработчике. Оставьте пока пустым.
-   Permissions: разрешить доступ, только если у пользователя есть эти разрешения

![](/en/extending-modx/custom-manager-pages/menu-create1.png)

(Примечание: изображение устарело)

Нажмите «Сохранить» и обновите страницу. Ваш пункт меню должен быть уже на месте! Но подождите, это еще не работает, потому что нам не хватает контроллеров...

## Добавление контроллера Home

Теперь сделаем так, чтобы страница менеджера заработала по-настоящему: добавим контроллер Home. Мы уже создали действие с контроллером «index»; теперь добавим действие «home» и его контроллер.

Создайте новый файл `core/components/namespace/index.class.php` со следующим содержимым:

```php
<?php
/**
* Абстрактный контроллер менеджера MODX
* В этом классе мы определяем всё, что мы хотим выполнять с помощью своих контроллеров
*/
abstract class NamespaceManagerController extends modExtraManagerController {
   /**
    * Инициализирует главный контроллер менеджера. Возможно, вы захотите загрузить определенные классы,
    * ресурсы которых будут доступны для всех контроллеров или конфигурации.
    *
    * Все ваши остальные контроллеры в этом пространстве имен должны расширять данный контроллер.
    *
    * В данном случае мы не делаем ничего особенного полезного, но когда вы будете разрабатывать более сложные
    * дополнения, это поможет упростить поддержку.
    */
   public function initialize() {
       $this->addHtml('<script type="text/javascript">
       Ext.onReady(function() {
           // Мы могли бы запустить здесь какой-нибудь код JavaScript, который выполняется во всех наших контроллерах
           // например, что-нибудь, что загружает вашу конфигурацию
       });
       </script>');
   }
   /**
    * Определяет темы лексиконов для загрузки в наш контроллер
    * @return array
    */
   public function getLanguageTopics() {
       return array('namespace:default');
   }
   /**
    * Мы можем использовать данный метод для проверки разрешения пользователя на просмотр данного контроллера
    * @return bool
    */
   public function checkPermissions() {
       return true;
   }
}
/**
* Контроллер индекса обрабатывает действие "index" — действие по умолчанию,
* которое менеджер загружает, когда пункт меню не указывает другое.
*
* Назовите класс с префиксом вашего пространства имен: "NamespaceIndexManagerController".
* Префикс обязателен; имена PHP-классов регистронезависимы, поэтому
* регистр самого "Index" не важен.
*/
class NamespaceIndexManagerController extends NamespaceManagerController {
   public function process(array $scriptProperties = array()) {
       /* При желании загрузите здесь другой контроллер; в 3.x менеджер
        * просто направляет пустой параметр &a= в действие "index",
        * поэтому пункт меню может сразу указывать на конечное действие. */
       return parent::process($scriptProperties);
   }
}
```

Так что это наш базовый контроллер индекса. Он выполняется, когда действие пункта меню — `index` (значение по умолчанию, когда параметр `&a=` не передан). Чтобы загрузить другой контроллер, передайте его действие в параметре URL `a` — либо задав поле «Action» пункта меню напрямую (например, `home`), либо добавив `&a=home` в «Parameters» пункта меню.

В этом уроке мы рассмотрим только те части, которые действительно необходимы для создания на самом деле простой страницы менеджера, но если вы хотите создать полноценную страницу менеджера с ExtJS и даже сложнее, перейдите на страницу учебника [Разработка дополнения в MODX Revolution](extending-modx/tutorials/developing-an-extra). Вы обнаружите, что эта страница и часть 2 этого учебного пособия частично совпадают, однако здесь мы ограничимся простой страницей менеджера.

## Добавление базового контроллера

Базовый контроллер - это тот контроллер, который фактически обрабатывается, когда мы открываем пункт меню.

Создайте новый файл в `core/components/namespace/controllers/home.class.php` со следующим содержимым:

```php
<?php
/**
* Название нашего контроллера основано на действии (home) и
* пространстве имен. Укажите поле Action пункта меню (или параметр &a=)
* со значением "home", чтобы загрузить этот контроллер.
*/
class NamespaceHomeManagerController extends NamespaceManagerController {
   /**
    * Любая специфическая обработка, которую мы хотим выполнить здесь. Возвращает строку или HTML код.
    * @param array $scriptProperties
    */
   public function process(array $scriptProperties = array()) {
       return '<h2 class="modx-page-header">It\'s alive!</h2><p>Это ваша первая пользовательская страница в менеджере MODX. Вы великолепны!</p>';
   }
   /**
    * Заголовок страницы для помещения в атрибут <title>.
    * @return null|string
    */
   public function getPageTitle() {
       return 'My first CMP!';
   }
   /**
    * Регистрирует необходимые ресурсы. Записи addCss/addJavascript получают
    * автоматический суффикс кэш-бusting ?mv=<version>; addLastJavascript
    * выводится как есть (без суффикса).
    */
   public function loadCustomCssJs() {
       $this->addCss('url/to/some/css_file.css');
       $this->addJavascript('url/to/some/javascript.js');
       $this->addLastJavascript('url/to/some/javascript_load_last.js');
       $this->addHtml('<script type="text/javascript">
       Ext.onReady(function() {
           // Мы могли бы запустить здесь какой-нибудь код JavaScript
       });
       </script>');
   }
}<br>
```

Мы просто возвращаем HTML код, который мы хотим добавить на страницу в функцию обработчика. Легко, правда? Откройте сейчас пункт меню, и ваша страница менеджера должна показать вам, что вы великолепны.

Если вы получаете пустую страницу, вероятно, где-то неправильно указано имя класса или путь. Если вы посмотрите журнал ошибок PHP, то увидите, какой именно, но вот несколько подсказок:

-   Ваш путь к пространству имен правильный?
-   Ваш контроллер индекса называется `NamespaceIndexManagerController`? Имя класса должно начинаться с пространства имен (с символом верхнего регистра), затем действие, затем `ManagerController` — например, для пространства имен `myns` и действия `index` роутер ищет `MynsindexManagerController` (регистронезависимо).
-   Ваш базовый контроллер называется `NamespaceHomeManagerController`? То же правило: пространство имен + действие + `ManagerController`.

### Контроллеры в MODX 3

Имена классов в этом руководстве (например, `modExtraManagerController`) — глобальные имена. В 3.x они существуют как устаревшие алиасы реальных классов (`\MODX\Revolution\modExtraManagerController` и им подобные); алиасы загружаются, пока включена настройка `load_deprecated_global_class_aliases` (по умолчанию включена), поэтому короткие формы всё ещё работают. Новый код может использовать именованные имена классов или, начиная с 3.0, PSR-4-контроллер `\MODX\Revolution\Controllers\<Action>` — этот класс менеджер ищет первым, до файлов в `controllers/`, описанных здесь.

При роутинге действия менеджер перебирает: PSR-4-класс контроллера, полное имя класса `<Namespace><action>ManagerController`, файл `controllers/<action>.class.php` и наконец `controllers/<action>/index.class.php` — в теме, `default` и корне каталога `controllers/` вашего пространства имен.

Помимо методов выше, полезные переопределяемые хуки базового класса: `failure()`, `addLexiconTopic()`, `loadWorkingContext()`, `getHelpUrl()`, а также помощники жизненного цикла `firePreRenderEvents()` / `firePostRenderEvents()`. `process()` может вернуть либо строку HTML, либо массив плейсхолдеров шаблона. Вокруг каждой страницы менеджер вызывает события `OnBeforeManagerPageInit`, `OnManagerPageInit`, `OnManagerPageBeforeRender` и `OnManagerPageAfterRender` — удобно для CMP, которым нужно подцепиться к загрузке менеджера.

### Использование файла шаблона

Для пользовательских страниц менеджера можно использовать файл шаблона. Добавьте метод getTemplateFile и верните путь к шаблону относительно каталога templates вашего пространства имен (например, `return 'welcome.tpl';`); менеджер разрешает его относительно `[namespace]/templates/`, `[namespace]/templates/default/` и `[namespace]/templates/{manager_theme}/` и загружает как шаблон Smarty. Чтобы добавить плейсхолдеры для файла шаблона, вызовите `$this->setPlaceholder($key, $value)` в функцию обработчика.

Вот пример использования плейсхолдеров в файле шаблона smarty, предполагая, что вы вызвали `$this->setPlaceholder('foo', 'Bar');`

```html
<h2 class="modx-page-header">{$foo}</h2>
```

Это вывело бы стандартный заголовок страницы менеджера MODX с надписью «Bar».

## Выход за рамки простого HTML кода

После этого урока вы создали супер простую пользовательскую страницу менеджера. Если вы хотите, теперь вы можете продолжить создавать богатый интерфейс, используя [MODExt](extending-modx/custom-manager-pages/modext "MODExt"), интеграция ExtJS в Revolution. Подробнее о MODExt можно найти [здесь](extending-modx/custom-manager-pages/modext "MODExt").

Также рекомендуется следовать [Разработка дополнения в MODX Revolution](extending-modx/tutorials/developing-an-extra) учебник, который проведет вас через каждый шаг, необходимый для создания многофункционального компонента.

Также возможно создавать компоненты с сниппетами и чанками MODX. [Смотрите анализируемый диспетчер контроллера](extending-modx/custom-manager-pages/parsed).

## Смотрите также

1. [Действия и меню](extending-modx/menus/actions)
    1. [Список действий](extending-modx/menus/action-list)
2. [Пользовательские страницы менеджера в версии 2.3](extending-modx/custom-manager-pages/tutorial)
3. [MODExt](extending-modx/custom-manager-pages/modext)
    1. [Объект MODExt MODx](extending-modx/custom-manager-pages/modext/modext-modx-object)
    2. [Учебники по MODExt](extending-modx/custom-manager-pages/modext/modext-tutorials)
        1. [Ext JS - Окна сообщений](extending-modx/custom-manager-pages/modext/modext-tutorials/1.-ext-js-tutorial-message-boxes)
        2. [Ext JS - Ajax](extending-modx/custom-manager-pages/modext/modext-tutorials/2.-ext-js-tutorial-ajax-include)
        3. [Ext JS - Анимация](extending-modx/custom-manager-pages/modext/modext-tutorials/3.-ext-js-tutorial-animation)
        4. [Ext JS - Управление узлами](extending-modx/custom-manager-pages/modext/modext-tutorials/4.-ext-js-tutorial-manipulating-nodes)
        5. [Ext JS - Панели](extending-modx/custom-manager-pages/modext/modext-tutorials/5.-ext-js-tutorial-panels)
        6. [Ext JS - Расширенная сетка](extending-modx/custom-manager-pages/modext/modext-tutorials/7.-ext-js-tutoral-advanced-grid)
        7. [Ext JS - Внутри CMP](extending-modx/custom-manager-pages/modext/modext-tutorials/8.-ext-js-tutorial-inside-a-cmp)
    3. [MODx.combo.ComboBox](extending-modx/custom-manager-pages/modext/modx.combo.combobox)
    4. [MODx.Console](extending-modx/custom-manager-pages/modext/modx.console)
    5. [MODx.FormPanel](extending-modx/custom-manager-pages/modext/modx.formpanel)
    6. [MODx.grid.Grid](extending-modx/custom-manager-pages/modext/modx.grid.grid)
    7. [MODx.grid.LocalGrid](extending-modx/custom-manager-pages/modext/modx.grid.localgrid)
    8. [MODx.msg](extending-modx/custom-manager-pages/modext/modx.msg)
    9. [MODx.tree.Tree](extending-modx/custom-manager-pages/modext/modx.tree.tree)
    10. [MODx.Window](extending-modx/custom-manager-pages/modext/modx.window)
