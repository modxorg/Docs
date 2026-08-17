---
title: "Toolbar Plugins"
description: "Кнопки на панели Element, ограничение плагинов и регистрация"
translation: "extras/fred/developer/toolbar_plugins"
---

Fred позволяет добавлять функционал отдельным Elements через новые кнопки на панели над каждым Element.

![Element Toolbar](../media/toolbar.png)

Плагины распространяют как MODX Transport Packages. Их можно опубликовать в [репозитории MODX Extras](https://modx.com/extras) или загрузить вручную через Installer в Manager. Как собирать Transport Packages, см. в [документации MODX](https://docs.modx.com/revolution/2.x/case-studies-and-tutorials/developing-an-extra-in-modx-revolution) или используйте [Git Package Management](https://theboxer.github.io/Git-Package-Management/).

## Функция init

Чтобы инициализировать плагин, создайте функцию `init`, которую вызовет Fred. `init` принимает три аргумента:

-   `fred`, ссылка на основной класс Fred
-   `ToolbarPlugin`, класс ToolbarPlugin, который должен расширять ваш плагин
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

Функция `init` должна вернуть класс, расширяющий ToolbarPlugin.

### Пример

```javascript
var TestToolbarPluginInit = function(fred, ToolbarPlugin, pluginTools) {
    class TestToolbarPlugin extends ToolbarPlugin {
        static title = "Test Plugin";
        static icon = "fred--element-settings";

        onClick() {
            console.log("Test Plugin icon pressed from the toolbar");
        }
    }

    return TestToolbarPlugin;
};
```

В конце панели появится дополнительная иконка с той же шестерёнкой, что у Settings.

## Иконки

Иконки toolbar это кнопки с определёнными классами. Кнопка удаления размечена так:

```html
<button class="fred--trash" role="button" title="Delete"></button>
```

Класс CSS `fred--trash` задаёт вид кнопки. Для своей иконки настройте псевдоэлемент `::before` в CSS плагина с inline SVG и цветом фона. При наведении можно задать другой фон:

```css
.fred--my_plugin_button::before {
    background-repeat: no-repeat;
    background-position: center center;
    background-image: url("data:image/svg+xml, %3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512' fill='%23fff'%3E%3Cpath d='M512 144v288c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V144c0-26.5 21.5-48 48-48h88l12.3-32.9c7-18.7 24.9-31.1 44.9-31.1h125.5c20 0 37.9 12.4 44.9 31.1L376 96h88c26.5 0 48 21.5 48 48zM376 288c0-66.2-53.8-120-120-120s-120 53.8-120 120 53.8 120 120 120 120-53.8 120-120zm-32 0c0 48.5-39.5 88-88 88s-88-39.5-88-88 39.5-88 88-88 88 39.5 88 88z'/%3E%3C/svg%3E");
    background-color: #e46363;
}
.fred--my_plugin_button::before:hover {
    background-color: #061323;
}
```

Кастомный CSS плагина подключают так же, как JS-файл на шаге [Register your Plugin](#register-your-plugin) ниже.

Иконки Fred по умолчанию это SVG из [Font Awesome 5](https://fontawesome.com/icons?d=gallery). SVG любой иконки можно скачать на её странице.

### Порядок Toolbar Plugin

Кнопки toolbar всегда добавляются после встроенных. Если зарегистрировано несколько Toolbar Plugins, порядок совпадает с rank MODX Plugin в Manager.

## Ограничение плагинов для Elements

По умолчанию все Toolbar Plugins регистрируются для каждого Element. Чтобы задать порядок или исключить плагины, измените [настройку Option Set](extras/fred/themer/options/settings) Element: атрибуты `plugins-include` или `plugins-exclude`.

**Note:** Имена плагинов это уникальные имена класса плагина. Обычно они совпадают с именем пакета у MODX Package Provider.

Если указан `plugins-include`, строки `plugins-exclude` игнорируются. Чтобы подключить только выбранные плагины, используйте настройку Options с `plugins-include`:

```json
{
  "toolbarPluginsInclude": ["gallery","mapmarker"],
  "settings": [
    {
        …
    }
  ]
}
```

Чтобы исключить один или несколько плагинов на Element, используйте option `plugins-exclude`:

```json
{
  "toolbarPluginsExclude": ["fredfontawesome5iconeditor"],
  "settings": [
    {
        …
    }
  ]
}
```

Чтобы полностью отключить все плагины на Element, укажите пустой массив для `plugins-include`:

```json
{
  "plugins-include": [],
  "settings": [
    {
        …
    }
  ]
}
```

**Note:** Имена плагинов это уникальные имена класса плагина. Обычно они совпадают с именем пакета у MODX Package Provider.

Если указан атрибут `pluginsInclude`, строки `pluginsExclude` игнорируются. Чтобы подключить только выбранные плагины, используйте настройку Options `pluginsInclude`:

```json
{
  "pluginsInclude": ["gallery","mapmarker"],
  "settings": [
    {
        …
    }
  ]
}
```

Чтобы исключить один или несколько плагинов на Element, используйте option `pluginsExclude`:

```json
{
  "pluginsExclude": ["fredfontawesome5iconeditor"],
  "settings": [
    {
        …
    }
  ]
}
```

Чтобы полностью отключить все плагины на Element, укажите пустой массив для `pluginsInclude`:

```json
{
  "pluginsInclude": [],
  "settings": [
    {
        …
    }
  ]
}
```

## Регистрация плагина

Когда `init` возвращает класс плагина, зарегистрируйте его для Fred через MODX Plugin на событии [FredBeforeRender](extras/fred/developer/modx_events).

Подключите JS с функцией init через [includes](extras/fred/developer/modx_events) и зарегистрируйте плагин через [`beforeRender`](extras/fred/developer/modx_events).

Для регистрации toolbar plugin вызовите у Fred `registerToolbarPlugin` с двумя аргументами:

-   `name`, уникальное имя плагина. Fred не регистрирует несколько плагинов с одним именем.
-   `init function`, функция `TestToolbarPluginInit` из шага [`Init function`](#init-function) выше

### Пример

```php
$includes = '
    <script type="text/javascript" src="/path/to/plugin/file.js"></script>
    <link rel="stylesheet" href="/path/to/stylsheet/style.css" />
';

$beforeRender = '
    this.registerToolbarPlugin("TestToolbarPlugin", TestToolbarPluginInit);
';

$modx->event->_output = [
    'includes' => $includes,
    'beforeRender' => $beforeRender
];
```

## Класс Plugin

Пример класса из шага [`Init function`](#init-function) может больше, чем `console.log`. Большая часть функционала Fred уже реализована как Plugins. Чтобы понять, как писать свои, [изучите исходники на Github](https://github.com/modxcms/fred/tree/master/_build/assets/js/Components/Sidebar/Elements/Toolbar).

### Кастомные данные

Плагин может сохранять и загружать данные при сохранении страницы. Данные сохраняются только когда пользователь сохраняет всю страницу.

#### Данные Element

Toolbar Plugins обычно меняют те Elements, на которых сработали. Данные привязаны к Fred element, где был клик по toolbar. Сохранение: `this.el.setPluginValue('Namespace', 'VariableName', 'Data')`. Три аргумента:

-   `namespace`, в большинстве случаев имя плагина или уникальный префикс
-   `name`, имя переменной для сохранения
-   `value`, сами данные

Загрузка: `this.el.getPluginValue('Namespace', 'VariableName')` с двумя аргументами:

-   `namespace`, тот же namespace, что при `setPluginValue`
-   `name`, то же имя, что при `setPluginValue`

#### Глобальные данные

Данные плагина можно сохранять глобально, не привязывая к конкретному Element. Вызовите `pluginTools.fredConfig.setPluginsData('Namespace', 'VariableName', 'Data')`. Аргументы те же, что у `this.el.setPluginValue`.

Глобальная загрузка: `pluginTools.fredConfig.getPluginsData('Namespace', 'VariableName')`. Аргументы те же, что у `this.el.getPluginValue`.
