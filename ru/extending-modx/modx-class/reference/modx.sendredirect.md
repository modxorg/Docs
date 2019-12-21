---
title: "modX.sendRedirect"
translation: "extending-modx/modx-class/reference/modx.sendredirect"
---

## modX::sendRedirect

Отправляет перенаправление на указанный URL-адрес с помощью указанного метода.

## Syntax

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::sendRedirect()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::sendRedirect())

``` php
void sendRedirect (string $url, [array $options = false], [string $type = ''], [string $responseCode])
```

Обратите внимание, что `$type` и `$responseCode` устарели и, скорее всего, будут удалены в следующем выпуске. **Не полагайтесь на них**.

`$url` должен быть правильным url-адресом,который может быть сгенерирован с помощью `modX::makeUrl` для перенаправления.
`$options` принимает массив с одной или несколькими из следующих пар ключ/значение:

- `type`, введите одно из следующих значений (по умолчанию используется `REDIRECT_HEADER`):
    - `REDIRECT_REFRESH` - использует метод обновления заголовка
    - `REDIRECT_META` - отправляет на выход тег META HTTP-EQUIV="Refresh"
    - `REDIRECT_HEADER` - использует метод расположения заголовка
- `responseCode`, который должен быть правильным ответом HTTP, так что не только "301" или "302". По умолчанию "HTTP/1.1 302 перемещается временно", но вы можете установить его в "HTTP/1.1 301 перемещается постоянно" для перенаправления в стиле 301.
- `count_attempts` указывает количество попыток перенаправления перед остановкой.

$type, который является устаревшим и не должен использоваться, совпадает с типом ключа массива $options.
$responseCode, который является устаревшим и не должен использоваться, совпадает с ключом массива responseCode $options

## Примеры

Отправьте запрос перенаправления на ресурс с идентификатором 54.

``` php
$url = $modx->makeUrl(54);
$modx->sendRedirect($url);
```

Отправить редирект на modx.com. сделайте это с помощью метатега HTTP-EQUIV refresh.

``` php
$modx->sendRedirect('http://modx.com',array('type' => 'REDIRECT_META'));
```

Отправьте код ответа "301 перемещенный постоянно" вместо кода ответа "302 перемещенного временно" по умолчанию.

``` php
$modx->sendRedirect('http://modx.com',array('responseCode' => 'HTTP/1.1 301 Moved Permanently'));
```

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")
- [modX.makeUrl](extending-modx/modx-class/reference/modx.makeurl "modX.makeUrl")
- [modX.sendForward](extending-modx/modx-class/reference/modx.sendforward "modX.sendForward")
- [modX.sendErrorPage](extending-modx/modx-class/reference/modx.senderrorpage "modX.sendErrorPage")
