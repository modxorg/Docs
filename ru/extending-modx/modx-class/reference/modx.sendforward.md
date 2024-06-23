---
title: "modX.sendForward"
translation: "extending-modx/modx-class/reference/modx.sendforward"
description: "modX.sendForward перенаправляет запрос на другой ресурс без изменения URL"
---

## modX::sendForward

Перенаправляет запрос на другой ресурс без изменения URL. Если указанный идентификатор не существует, отправляет на страницу ошибки 404.

## Синтаксис

API Doc: [modX::sendForward()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::sendForward())

``` php
void sendForward (integer $id, [string|array $options = null])
```

- `$id` это идентификатор ресурса (вы не можете перенаправить на URL адрес - если вам нужно передать какое-то значение, используйте `modX::setPlaceholder` и вызовите его на целевом ресурсе).
- `$options` предполагается, что это правильный код ответа HTTP, когда он является строкой, например "HTTP/1.1 301 Moved Permanently". Если это массив, вы можете использовать следующие параметры:
    - `response_code`: код ответа
    - `error_type`: тип ошибки, смотрите пример ниже, но, например, 404
    - `error_header`: Значение поля "Header" страницы ошибки
    - `error_pagetitle`: Имя заголовка страницы ошибки
    - `error_message`: Сообщение об ошибке
    - `merge`: способ объединения ресурса, находящегося в данный момент в `$modx->resource` с целевым ресурсом. `content`, `pub_date`, `unpub_date`, `richtext`, `_content` и `_processed` значения исключаются вместе со значением системного параметра [forward_merge_excludes](building-sites/settings/forward_merge_excludes). Я не уверен, что это должно использоваться из ядра, и, вероятно, есть лучшие способы объединить данные (например, `setPlaceholder`), а затем объединить.
- `$sendErrorPage` Следует ли пропустить выполнение [sendErrorPage](extending-modx/modx-class/reference/modx.senderrorpage "modX.sendErrorPage") если ресурс не существует.
   
## Примеры

Отправьте пользователя на ресурс с идентификатором 234, фактически не меняя URL.

``` php
$modx->sendForward(234);
```

Отправьте пользователя на страницу ошибки 404, для фактического идентификатора страницы мы используем значение системной настройки [error_page](building-sites/settings/error_page). Если такого значения нет,
будет использовано значение переменной [site_start](building-sites/settings/site_start)

``` php
$options = array(
   'response_code' => '404 Страница не найдена',
   'error_type' => '404',
   'error_header' => '404 Не найдена',
   'error_pagetitle' => 'Ошибка 404: Страница не найдена',
   'error_message' => '<h1>Страница не найдена</h1><p>Запрошенная вами страница не найдена.</p>'
);
$this->sendForward($this->getOption('error_page', $options, $this->getOption('site_start')), $options, false);
```

Выдайте заменяющую страницу, сохранив оригинальные `pagetitle`, `introtext` и другие поля. Для этого нужно просто указать дополнительный массив с ключами:

``` php
$options = array(
	'merge' => 1, // Включает механизм склейки полей
	// список оригинальных полей, которые нужно исключить из результата
	'forward_merge_excludes' => 'id,template,type,published,class_key'
);
$this->sendForward(15, $options);
```

Ключ [forward_merge_excludes](building-sites/settings/forward_merge_excludes) заведует полями исходной страницы, которые нужно исключить из результатов. К эти полям обязательно будут прибавлены еще `content,pub_date,unpub_date,richtext`

Такой способ полезен, если вы хотите закрывать какие-то разделы сайта, оставляя `pagetitle` и `description` для посетителей и поисковиков.


## Смотрите также

- [modX](extending-modx/core-model/modx "modX")
- [modX.makeUrl](extending-modx/modx-class/reference/modx.makeurl "modX.makeUrl")
- [modX.sendRedirect](extending-modx/modx-class/reference/modx.sendredirect "modX.sendRedirect")
- [modX.sendErrorPage](extending-modx/modx-class/reference/modx.senderrorpage "modX.sendErrorPage")
- [modX.sendUnauthorizedPage](extending-modx/modx-class/reference/modx.sendunauthorizedpage)
- [error_page](building-sites/settings/error_page)
- [forward_merge_excludes](building-sites/settings/forward_merge_excludes)
