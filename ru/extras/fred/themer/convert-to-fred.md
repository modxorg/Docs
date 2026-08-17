---
title: "Перевод существующего сайта MODX на Fred"
description: "Default Element, Templates и Themes при миграции контента на Fred"
translation: "extras/fred/themer/convert-to-fred"
---

Fred позволяет переводить обычные resources в Fred resources. Вы сами решаете, насколько Fred ограничивает вёрстку страницы. Можно ограничиться одной content area, как при работе с RTE.

## Советы

Ниже советы по переводу сайта на Fred.

### Default Element

При переводе страниц на Fred укажите _Default Element_ в сетке Themes, [см. документацию](extras/fred/themer/cmp/themes). Без default element контент пропадёт при переключении resource на Fred.

Default Element срабатывает, когда на странице ещё нет Fred elements: выбирается default element, а контент resource помещается в объект с атрибутом `data-fred-name`.

### Templates

Обычно при переводе контента на Fred создают новый template или дублируют существующий. Так можно держать гибридный режим и не сломать контент во время перехода.

### Themes

Несколько Templates можно привязать к одной theme, но если Fred resource переключить на Template с другой theme, elements могут пропасть. Elements привязаны к конкретной theme, и новая theme не видит старые elements.
