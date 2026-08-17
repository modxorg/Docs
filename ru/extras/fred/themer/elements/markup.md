---
title: "HTML markup в Fred Elements"
description: "Атрибуты data-fred-name, Twig и placeholder template.theme_dir"
translation: "extras/fred/themer/elements/markup"
---

Fred Elements состоят из HTML с определёнными атрибутами. Markup можно расширять Twig и [Settings](extras/fred/themer/options) Elements.

## Пользовательские теги

### themplate.theme_dir

Для переносимости тем в element используйте `{{template.theme_dir}}` как динамическую ссылку на каталог темы template, например `/assets/theme/default/`.

## Примеры markup

```html
<!-- Simple Element -->
<div class="panel">
    <p data-fred-name="header_text">Default Value</p>
    <img
        src="http://via.placeholder.com/450x150"
        data-fred-name="header_image"
    />
</div>

<!-- Enhanced Element -->
<div class="panel {{ panel_class }}">
    <p data-fred-name="panel_text">Default Value</p>

    {% if cta_link %}
    <a class="btn {{ cta_class }}" href="{{ cta_link }}">{{ cta_text }}</a>
    {% endif %}
</div>
```
