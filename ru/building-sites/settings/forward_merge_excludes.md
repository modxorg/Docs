---
title: "forward_merge_excludes"
translation: "building-sites/settings/forward_merge_excludes"
description: "Симлинк объединяет непустые значения полей со значениями в целевом Ресурсе"
---

-   **Имя**: Исключение объединения полей
-   **Тип**: Textfield
-   **По умолчанию**: type,published,class\_key
-   **Доступно в**: Revolution 2.0.8+

Симлинк объединяет непустые значения полей со значениями в целевом Ресурсе. Использование этого списка исключений, разделенных запятыми, предотвращает переопределение Симлинком указанных полей.
Что интересно, список также может быть также переопределен, например, через вызов метода `sendForward()` смотри соответствующую ссылку ниже.

``` php
$options = array(
	'merge' => 1, // Включает механизм склейки полей
	// список оригинальных полей, которые нужно исключить из результата
	'forward_merge_excludes' => 'id,template,type,published,class_key'
);
$modx->sendForward(15, $options);
```

## Cмотрите также

-   [modX.sendForward](extending-modx/modx-class/reference/modx.sendforward)
