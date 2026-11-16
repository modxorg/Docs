---
title: "Написание плагинов"
description: Как плагины MODX подписываются на системные события, читают имя события и возвращают или изменяют вывод, с примерами"
translation: "extending-modx/plugins"
---

## Что такое плагин?

Плагин это PHP на системном событии, а не при отрисовке страницы. Сниппет выполняется при отрисовке страницы. Плагин выполняется, когда что-то происходит: сохраняется чанк, чистится кэш, пользователь входит. Так можно менять поведение ядра без правки файлов core.

Все плагины, подписанные на сработавшее событие, выполняются сначала с меньшим числом приоритета. Затем управление возвращается вызывающему коду.

Большинство событий MODX возникает только в менеджере, поэтому плагины не ограничены публичной частью сайта. Полный список в [Системных событиях](extending-modx/plugins/system-events "MODX System Events").

При сохранении из кода плагина удаляется любой закрывающий PHP-тег `?>`. Он не нужен: при выполнении код плагина окажется внутри другого PHP-кода.

## Обработка события

Способ работы с выводом зависит от системного события. Для одних событий значение возвращается из плагина. Для других вывод берётся по ссылке и меняется.

Имя события читается из `$modx->event->name`. Плагин на несколько событий переключается по нему:

``` php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnWebPageInit':
        /* do something */
        break;
    case 'OnWebPagePrerender':
        /* do something else */
        break;
}
```

## Сообщение пользователю

Показывается на форме ресурса как свой заголовок.

**Системные события:** OnDocFormPrerender

``` php
$modx->event->output('Hi there user!');
```

## Валидация при сохранении

**Системные события:** OnBeforeDocFormSave

``` php
// Do some logical stuff.... if validation failed:
$modx->event->output('Something did not validate!');
return "This goes to the logs";
```

Текст для пользователя передавайте в **$modx->event->output()**. Сообщение в лог отправляйте через `return`. Если валидация прошла, верните `null`.

> [!WARNING]
> Вывод в **$modx->event->output()** должен быть обычным текстом, без HTML. Для OnBeforeDocFormSave этот текст становится сообщением об ошибке процессора и выводится как обычный текст.

Возвращаемое значение должно быть строкой. Если это число, склейте его с пустой строкой.

## Фильтр слов

**Системные события:** OnWebPagePrerender

``` php
$words = array("snippet", "template"); // words to filter
$output = &$modx->resource->_output; // get a reference to the output
$output = str_replace($words,"<b>[filtered]</b>",$output);
```

## Редирект при 404

**Системные события:** OnPageNotFound
**Системные настройки:** создайте `pnf.page` в «Система → Настройки». В ядре этого ключа нет. Значение: id ресурса ошибки.

``` php
if ($modx->event->name == 'OnPageNotFound') {
    $errorPage = $modx->getOption('pnf.page');
    if (empty($errorPage)) {
        $modx->sendErrorPage();
    } else {
        $modx->sendRedirect($modx->makeUrl($errorPage), ['count_attempts' => true]);
    }
}
```

На этом событии `$modx->resource` ещё не загружен. Не читайте его.

## Письмо из плагина

Почты нет, пока плагин её не запросит. `getService()` возвращает `MODX\Revolution\Mail\modPHPMailer`. Константы лежат на `MODX\Revolution\Mail\modMail`.

Создайте `pnf.mailto` и `pnf.mailfrom` в «Система → Настройки». В ядре этих ключей нет.

``` php
$mail = $modx->getService('mail', \MODX\Revolution\Mail\modPHPMailer::class);
if (!$mail) {
    return;
}
$mail->set(\MODX\Revolution\Mail\modMail::MAIL_BODY, 'Кто-то запросил несуществующую страницу.');
$mail->set(\MODX\Revolution\Mail\modMail::MAIL_FROM, $modx->getOption('pnf.mailfrom'));
$mail->set(\MODX\Revolution\Mail\modMail::MAIL_FROM_NAME, 'MODX');
$mail->set(\MODX\Revolution\Mail\modMail::MAIL_SENDER, 'MODX');
$mail->set(\MODX\Revolution\Mail\modMail::MAIL_SUBJECT, 'Страница не найдена');
$mail->address('to', $modx->getOption('pnf.mailto'));
$mail->setHTML(true);
$mail->send();
```

> [!WARNING]
> Внутри кода плагина используйте `$modx->…`, а не `$this->…`. Тело плагина подключается изнутри объекта плагина, поэтому `$this` это `modPlugin`. У него нет `makeUrl()` и методов лексикона.

## Смотрите также

- [Системные события](extending-modx/plugins/system-events)
