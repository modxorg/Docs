---
title: "Создание темы для Fred"
description: "Навыки, рабочий процесс и подсказки кода для авторов тем Fred"
translation: "extras/fred/themer/index"
---

Авторам тем Fred нужны базовые знания MODX, уверенная вёрстка HTML/CSS для Elements и умение создавать валидный JSON для Option Sets.

Авторы тем среднего уровня используют [Twig](https://twig.symfony.com/doc/2.x/) для условной логики в Elements. Так можно показывать или скрывать части страницы в зависимости от настроек элементов управления в Option Sets.

Продвинутым авторам тем нужен JavaScript для сложных Elements с [JS Events](extras/fred/themer/elements/js_events).

## Рекомендуемый рабочий процесс

Проще всего освоить разработку для Fred, установив тему, продублировав её и отредактировав копию, чтобы увидеть, как всё устроено. Добавление новых элементов управления Option Set и эксперименты с Twig для условного вывода помогают создавать гибкие и мощные темы.

Рекомендуем установить [Extra Ace](https://modx.com/extras/package/ace): в Manager появится удобный редактор кода с предупреждением о невалидном JSON и подсказками при создании Elements.

## Подсказки кода в Fred

Если Ace установлен, как описано выше, автодополнение атрибутов и подсказки кода доступны в Manager для Fred после установки Extra [Fred Ace Integration](https://modx.com/extras/package/fredaceintegration). При создании или редактировании Element начните вводить `data-` или `fred` и нажмите `ctrl+space`, чтобы увидеть список доступных атрибутов Fred.

![Ace Integration](../media/ace_integration_dialog.png)
