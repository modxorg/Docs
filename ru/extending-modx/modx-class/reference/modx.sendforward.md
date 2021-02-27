---
title: "modX.sendForward"
translation: "extending-modx/modx-class/reference/modx.sendforward"
---

## modX::sendForward

Перенаправляет запрос на другой ресурс без изменения URL. Если указанный идентификатор не существует, отправляет на страницу ошибки 404.

## Синтаксис

API Doc: [modX::sendForward()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::sendForward())

``` php
void sendForward (integer $id, [string|array $options = null])
```

`$id` это идентификатор ресурса (вы не можете отправить вперед на URL адрес - если вам нужно передать какое-то значение, используйте `modX::setPlaceholder` и вызовите его на целевом ресурсе).
`$options` предполагается, что это правильный код ответа HTTP, когда он является строкой, например "HTTP/1.1 301 перемещен постоянно". Если это массив, вы можете использовать следующие параметры:

- `response_code`: то же самое, как если бы вы передали строку в `$options`
- `merge`: способ объединения ресурса, находящегося в данный момент `$modx->resource` с целевым ресурсом. content, pub\_date, unpub\_date, richtext, \_content и \_processed исключаются значения, а также Значение системного параметра `forward_merge_excludes` другого ключа опции. Я не уверен, что это должно использоваться из ядра, и, вероятно, есть лучшие способы объединить данные (например, `setPlaceholder`), а затем объединить.

## Пример

Отправьте пользователя на ресурс с идентификатором 234, фактически не меняя URL.

``` php
$modx->sendForward(234);
```

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")
- [modX.makeUrl](extending-modx/modx-class/reference/modx.makeurl "modX.makeUrl")
- [modX.sendRedirect](extending-modx/modx-class/reference/modx.sendredirect "modX.sendRedirect")
- [modX.sendErrorPage](extending-modx/modx-class/reference/modx.senderrorpage "modX.sendErrorPage")
- [modX.sendUnauthorizedPage](extending-modx/modx-class/reference/modx.sendunauthorizedpage)
