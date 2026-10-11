---
title: "Parsed Manager Controller"
---

Besides [ExtJS/modEXT](extending-modx/custom-manager-pages/modext), a CMP can be built from Snippets and Chunks: extend `modParsedManagerController` (added in 2.5) instead of `modExtraManagerController`.

## Controller Example

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

The chunk `chunk-name` holds whatever the component displays.

The parsed controller exposes extra data to your chunks and tags:

- Placeholders set with `$this->setPlaceholder()` are copied into the `ph.` placeholder namespace, so `[[+ph.foo]]` (and `[[+ph._pagetitle]]` for the page title) work inside parsed output.
- The request's script properties are exposed in the `prop.` namespace — e.g. `[[+prop.id]]` for `?a=welcome&id=5`.
- The output is run through the MODX parser automatically (`processElementTags`), so snippets and tags in your chunks are evaluated.
- The controller stores the request HTTP method in `$this->method` (`GET`, `POST`, …), which you can branch on in `process()` — handy for rendering a form on GET and handling its submit on POST.

## ExtJS look, without the ExtJS

To resemble standard manager styling, use the classes ExtJS generates. The example below adds the page title, a panel with a description block, and a bottom button toolbar:


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


Thanks to the [MODX Cookbook](https://modxcookbook.com/customize-manager/cmps/cmp-made-easy.html) for this example.
