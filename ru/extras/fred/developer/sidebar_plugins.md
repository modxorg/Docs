---
title: "Sidebar Plugins"
description: "Создание и регистрация плагинов боковой панели Fred"
translation: "extras/fred/developer/sidebar_plugins"
---

Fred позволяет расширять Sidebar через Sidebar plugins.

Плагины распространяют как MODX Transport Packages. Их можно опубликовать в [репозитории MODX Extras](https://modx.com/extras) или загрузить вручную через Installer в Manager. Как собирать Transport Packages, см. в [документации MODX](https://docs.modx.com/revolution/2.x/case-studies-and-tutorials/developing-an-extra-in-modx-revolution) или используйте [Git Package Management](https://theboxer.github.io/Git-Package-Management/).

## Функция init

Чтобы инициализировать плагин, создайте функцию `init`, которую вызовет Fred. `init` принимает три аргумента:

-   `fred`, ссылка на основной класс Fred
-   `SidebarPlugin`, класс SidebarPlugin, который должен расширять ваш плагин
-   `pluginTools`, набор инструментов для создания контента и сохранения данных. [Список классов и функций на Github](https://github.com/modxcms/fred/blob/master/_build/assets/js/Utils.js#L374-L387), в том числе:
    -   `valueParser`, подставляет значения Template Variables (например `{{theme_dir}}`) по параметрам
    -   `ui`, набор UI-элементов и полей ввода, включая
    -   `emitter`, отправка и подписка на события
    -   `Modal`, класс модального окна
    -   `fetch`, XHR-запросы
    -   `fredConfig`, экземпляр `fredConfig`
    -   `utilitySidebar`, sidebar как у настроек Element
    -   `actions`, готовые XHR-запросы Fred
    -   `Mousetrap`, библиотека горячих клавиш

Функция `init` должна вернуть класс, расширяющий SidebarPlugin.

### Пример

```javascript
var TestSidebarPluginInit = function(fred, SidebarPlugin, pluginTools) {
    class TestSidebarPlugin extends SidebarPlugin {
        static title = "TestPlugin";
        static icon = "fred--sidebar_more";
        static expandable = true;

        init() {
            this.content = this.render();
        }

        click() {
            return this.content;
        }

        render() {
            const moreList = pluginTools.ui.els.dl();

            const helpLink = pluginTools.ui.els.a(
                "fred.fe.more.help",
                "fred.fe.more.help",
                "https://modxcms.github.io/fred/"
            );
            helpLink.target = "_blank";

            moreList.appendChild(pluginTools.ui.els.dt(helpLink));

            return moreList;
        }
    }

    return TestSidebarPlugin;
};
```

Появится дополнительная иконка sidebar перед пунктом `More` с той же иконкой «три точки».

## Иконки и меню

Иконки sidebar это элементы `dt` с определёнными классами. Кнопка Settings в Sidebar размечена так:

```html
<dt class="fred--sidebar_page_settings" tabindex="0" role="tab">Settings</dt>
```

Класс CSS `fred--sidebar_page_settings` задаёт вид кнопки. Для своей иконки toolbar настройте псевдоэлемент `::before` в CSS плагина с inline SVG как background image:

```css
.fred .fred--sidebar_page_settings:before {
    background: url(data:image/svg+xml, %3Csvg xmlns=http://www.w3.org/2000/svg viewBox=0 0 …35.888-80 80 35.888 80 80 80 80-35.888 80-80z fill=%23fff/%3E%3C/svg%3E)
        center center no-repeat;
}
```

Кастомный CSS плагина, включая иконку выше и другие стили, подключают так же, как JS-файл на шаге [Register your Plugin](#register-your-plugin) ниже.

Иконки Fred по умолчанию это SVG из [Font Awesome 5](https://fontawesome.com/icons?d=gallery). SVG любой иконки можно скачать на её странице.

### Меню

Если плагину нужно меню как у Elements или Settings, его задают внутри элементов `dd`. Меню Settings начинается так:

```html
<dd>
    <h3 class="">Settings</h3>
    <form class="fred--page_settings_form">
        <fieldset class="">
            <label class="">Page Title<input class="" type="text"/></label>
            …
        </fieldset>
    </form>
</dd>
```

### Порядок Sidebar Plugin

Кнопки sidebar всегда добавляются перед кнопкой `More`. Если зарегистрировано несколько Sidebar Plugins, порядок совпадает с rank MODX Plugin в Manager.

## Регистрация плагина

Когда `init` возвращает класс плагина, зарегистрируйте его для Fred через MODX Plugin на событии `[FredBeforeRender](extras/fred/developer/modx_events)`.

Подключите JS с функцией init через [includes](extras/fred/developer/modx_events) и зарегистрируйте плагин через [`beforeRender`](extras/fred/developer/modx_events).

Для регистрации sidebar plugin вызовите у Fred `registerSidebarPlugin` с двумя аргументами:

-   `name`, уникальное имя плагина. Fred не регистрирует несколько плагинов с одним именем.
-   `init function`, функция `TestSidebarPluginInit` из шага [`Init function`](#init-function) выше

### Пример

```php
$includes = '
    <script type="text/javascript" src="/path/to/plugin/file.js"></script>
    <link rel="stylesheet" href="/path/to/stylsheet/style.css" />
';

$beforeRender = '
    this.registerSidebarPlugin("TestSidebarPlugin", TestSidebarPluginInit);
';

$modx->event->_output = [
    'includes' => $includes,
    'beforeRender' => $beforeRender
];
```

## Класс Plugin

Пример класса из шага [`Init function`](#init-function) может больше, чем ссылка на Help. Большая часть функционала Fred уже реализована как Plugins. Чтобы понять, как писать свои, [изучите исходники на Github](https://github.com/modxcms/fred/tree/master/_build/assets/js/Components/Sidebar).

### Кастомные данные

Плагин может сохранять и загружать свои данные при сохранении страницы. Кастомные данные сохраняются только когда пользователь сохраняет всю страницу.

Чтобы сохранить данные плагина, вызовите `pluginTools.fredConfig.setPluginsData('Namespace', 'VariableName', 'Data')`. Три аргумента:

-   `namespace`, в большинстве случаев имя плагина или уникальный префикс, чтобы другой плагин не перезаписал данные
-   `name`, имя переменной для сохранения
-   `value`, сами данные

Чтобы загрузить данные, вызовите `pluginTools.fredConfig.getPluginsData('Namespace', 'VariableName')` с двумя аргументами:

-   `namespace`, тот же namespace, что при `setPluginsData`
-   `name`, то же имя, что при `setPluginsData`
