---
title: "Parsed Manager Controller"
translation: "extending-modx/custom-manager-pages/parsed"
---

После [руководства по пользовательским страницам Менеджера](extending-modx/custom-manager-pages/tutorial) можно собирать интерфейс CMP.

Один путь: [ExtJS/modEXT](extending-modx/custom-manager-pages/modext). С Parsed Manager Controller (с MODX 2.5) можно строить интерфейс на сниппетах и чанках MODX.

## Пример контроллера

Наследуйте `modParsedManagerController` вместо `modExtraManagerController`:

``` php
class MycmpWelcomeManagerController extends modParsedManagerController
{
    public function getPageTitle()
    {
        return 'My Test CMP';
    }

    public function process(array $scriptProperties = [])
    {
        return '[[$chunk-name]]';
    }
}
```

В чанке `chunk-name` разместите разметку компонента.

## Вид ExtJS без ExtJS

Чтобы страница была похожа на стандартный Менеджер, используйте классы, которые обычно генерирует ExtJS. Пример: заголовок страницы и панель с описанием.

``` html
<div class="container">
    <h2  class="modx-page-header">[[+ph._pagetitle]]</h2>

    <div class="x-panel-body shadowbox">
        <div class="panel-desc">Some description</div>
        <div class="x-panel main-wrapper">
            <p>Content can take place here Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa dolore minima unde voluptatem voluptates. Consequuntur delectus id quo reiciendis sapiente voluptatum. Amet dignissimos eaque eum quae. Ad eveniet minus sunt! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa debitis eligendi eveniet excepturi, fugiat harum inventore itaque laboriosam laudantium nisi repellat repellendus repudiandae tempora vel voluptatem. Aliquid deleniti laudantium ut. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto at atque commodi deserunt, dolores fugiat harum in iste laboriosam molestias officiis omnis quam reprehenderit saepe sunt veritatis voluptas voluptates?</p>

            <div>
                <span class="x-btn">
                    <button>Some button</button>
                </span>
            </div>
        </div>
    </div>
</div>

<div id="modx-action-buttons" class="x-toolbar">
    <span class="x-btn x-btn-small primary-button">
        <em class="">
            <button type="button" class="x-btn-text">Some button</button>
        </em>
    </span>
    <span class="x-btn x-btn-small">
        <em class="">
            <button type="button" class="x-btn-text">Some other button</button>
        </em>
    </span>
</div>
```

Пример взят из [MODX Cookbook](https://modxcookbook.com/customize-manager/cmps/cmp-made-easy.html).
