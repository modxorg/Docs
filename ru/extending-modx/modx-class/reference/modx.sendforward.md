---
title: "modX.sendForward"
translation: "extending-modx/modx-class/reference/modx.sendforward"
description: "modX.sendForward перенаправляет запрос на другой ресурс без изменения URL"
---

## modX::sendForward

Перенаправляет запрос на другой ресурс без изменения URL. Если указанный идентификатор не существует, отправляет на страницу ошибки 404.

## Синтаксис

``` php
void sendForward (integer $id, [string|array $options = null], [boolean $sendErrorPage = true])
```

- `$id` _(integer)_ Цель — идентификатор ресурса, а не URL — чтобы передать значение на целевой ресурс, установите плейсхолдер через [modX.setPlaceholder](extending-modx/modx-class/reference/modx.setplaceholder "modX.setPlaceholder") и прочитайте его там.
- `$options` _(string|array)_ Строка трактуется как код ответа HTTP, например `HTTP/1.1 301 Moved Permanently`. Массив принимает следующие ключи:
    - `response_code`: код ответа
    - `error_type`: тип кода ответа, например `404`
    - `error_header`: значение поля "Header"
    - `error_pagetitle`: заголовок страницы ошибки
    - `error_message`: сообщение об ошибке
    - `merge`: способ объединения ресурса, находящегося в данный момент в `$modx->resource`, с целевым ресурсом. Значения `content`, `pub_date`, `unpub_date`, `richtext`, `_content` и `_processed` исключаются, а также значение системного параметра [forward_merge_excludes](building-sites/settings/forward_merge_excludes).
- `$sendErrorPage` _(boolean)_ Пропускать ли вызов [sendErrorPage](extending-modx/modx-class/reference/modx.senderrorpage "modX.sendErrorPage"), если ресурс не существует.
## Примеры

Отправьте пользователя на ресурс с идентификатором 234, фактически не меняя URL.

``` php
$modx->sendForward(234);
```

Отправьте пользователя на страницу ошибки 404, для фактического идентификатора страницы мы используем значение системной настройки [error_page](building-sites/settings/error_page). Если такого значения нет,
будет использовано значение переменной [site_start](building-sites/settings/site_start)

``` php
$options = array(
   'response_code' => '404 Not Found',
   'error_type' => '404',
   'error_header' => '404 Not Found',
   'error_pagetitle' => 'Ошибка 404: Страница не найдена',
   'error_message' => '<h1>Страница не найдена</h1><p>Запрошенная вами страница не найдена.</p>'
);
$modx->sendForward($modx->getOption('error_page', $options, $modx->getOption('site_start')), $options, false);
```

Выдайте заменяющую страницу, сохранив оригинальные `pagetitle`, `introtext` и другие поля. Для этого нужно просто указать дополнительный массив с ключами:

``` php
$options = array(
	'merge' => 1, // Включает механизм склейки полей
	// список оригинальных полей, которые нужно исключить из результата
	'forward_merge_excludes' => 'id,template,type,published,class_key'
);
$modx->sendForward(15, $options);
```

Такой способ полезен, если вы хотите закрывать какие-то разделы сайта, оставляя `pagetitle` и `description` для посетителей и поисковиков.

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")
- [modX.makeUrl](extending-modx/modx-class/reference/modx.makeurl "modX.makeUrl")
- [modX.sendRedirect](extending-modx/modx-class/reference/modx.sendredirect "modX.sendRedirect")
- [modX.sendErrorPage](extending-modx/modx-class/reference/modx.senderrorpage "modX.sendErrorPage")
- [modX.sendUnauthorizedPage](extending-modx/modx-class/reference/modx.sendunauthorizedpage)
- [error_page](building-sites/settings/error_page)
- [forward_merge_excludes](building-sites/settings/forward_merge_excludes)
