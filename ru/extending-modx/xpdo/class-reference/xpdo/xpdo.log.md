---
title: "xPDO.log"
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.log"
---

## xPDO::log

Регистрирует сообщение с подробной информацией о том, где и когда произошло событие.

## Синтаксис

```php
$xpdo->log($level, $msg, $target= '', $def= '', $file= '', $line= '');
```

-   `$level` - (целое число) Уровень детализации зарегистрированного сообщения. Смотрите константы многословия ниже
-   `$msg` - (строка) Сообщение для входа.
-   `$target` - (mixed) Цель регистрации. Если это строка, это должно быть `FILE`,`HTML` или `ECHO`. Если массив, см. Примеры ниже.
-   `$def` - (строка) Имя определяющей структуры (например, класса), помогающей определить источник событий журнала.
-   `$file` - (строка) Имя файла, в котором произошло событие журнала. Обычно вы используете константу `__FILE__`.
-   `$line` - (строка) Номер строки, помогающей определить источник события. Обычно вы используете константу `__FILE__`

API Docs: [http://api.modx.com/revolution/2.2/db_core_xpdo_xpdo.class.html#%5CxPDO](http://api.modx.com/revolution/2.2/db_core_xpdo_xpdo.class.html#%5CxPDO)

```php
void log (integer $level, string $msg, [string $target = ''], [string $def = ''], [string $file = ''], [string $line = ''])
```

## Уровни журнала

Во многих случаях вы можете использовать эквивалентные константы MODX для уровней журнала.

То, что печатается, контролируется настройкой системы `log_level`. Вы можете переопределить это во время выполнения, используя метод `setLogLevel`.

## Примеры

### Просто

Простое сообщение журнала, записывает в файл журнала по умолчанию (например, `core/cache/logs/error.log`):

```php
$xpdo->log(xPDO::LOG_LEVEL_ERROR, '[Mobile Detect] An error occurred.');
```

В журналах это будет выглядеть так:

```php
[2013-09-15 14:21:25] (ERROR @ /index.php) [Mobile Detect] An error occurred.
```

### Укажите Сниппет

Поскольку приложение MODX в конечном итоге запускается через файл index.php, полезно добавить дополнительную информацию:

```php
$xpdo->log(xPDO::LOG_LEVEL_ERROR, 'An error occurred.', '', 'MySnippet');
```

```php
[2013-09-15 14:22:48] (ERROR in MySnippet @ /index.php) An error occurred
```

### Указать файл и строку

Помните, что в конечном итоге все сниппеты и плагины MODX запускаются из кэшированных файлов, поэтому в качестве исходного файла будет указан кэшированный файл.

```php
$xpdo->log(xPDO::LOG_LEVEL_ERROR, 'This is my error message...', '', 'MySnippet', __FILE__, __LINE__);
```

```php
[2013-09-15 14:48:02] (ERROR in MySnippet @ /path/to/core/cache/includes/elements/modsnippet/28.include.cache.php : 7) This is my error message...
```

### Пользовательский файл журнала

Вы можете отправить ошибки в пункт назначения, отличный от журнала ошибок MODX по умолчанию. Для этого вы должны передать массив в аргумент `$target`. Вы должны подробно указать `FILE` в качестве цели, в противном случае сообщение будет возвращено на страницу.

```php
$xpdo->log(xPDO::LOG_LEVEL_ERROR, 'Error for my custom log file', array(
    'target' => 'FILE',
    'options' => array(
        'filename' => 'custom.log'
    )
));
```

По умолчанию путь к файлам журнала - это `core/cache/logs/`, поэтому в этом примере мы находим наше сообщение журнала внутри файла `custom.log`:

```php
[2013-09-15 15:01:07] (ERROR @ /index.php) Error for my custom log file
```

При желании вы также можете указать путь через аргумент `filepath`.

Поскольку это немного многословно, вы можете найти более понятным определение цели регистрации, а затем ссылаться на массив:

```php
$log_target = array(
    'target'=>'FILE',
    'options' => array(
        'filename'=>'my_custom.log'
    )
);
$xpdo->log(xPDO::LOG_LEVEL_ERROR, 'My Error...',$log_target);
$xpdo->log(xPDO::LOG_LEVEL_ERROR, 'Some other error...',$log_target);
```

### Отладка

Вы можете изменить уровень зарегистрированного сообщения, регулируя первый параметр. Например. для записи отладочного сообщения:

```php
$xpdo->log(xPDO::LOG_LEVEL_DEBUG,'This is a debugging statement.');
```

### Пользовательское использование в сниппетах

Это может быть очень удобно для увеличения подробности регистрации для отдельного сниппета или плагина. Для этого используйте функцию `setLogLevel()`. Вы можете использовать это, чтобы переопределить глобальное значение системного параметра **log_level**:

```php
// Вызови свой сниппет так: [[mySnippet? &log_level=`4`]]
// Переопределить глобальное значение log_level
$log_level = $modx->getOption('log_level', $scriptProperties, $modx->getOption('log_level'));
$modx->setLogLevel($log_level);
```

## Константы многословия

| xPDO константа          | MODX константа         | Значение |
| ----------------------- | ---------------------- | -------- |
| `xPDO::LOG_LEVEL_FATAL` | `MODX_LOG_LEVEL_FATAL` | 0        |
| `xPDO::LOG_LEVEL_ERROR` | `MODX_LOG_LEVEL_ERROR` | 1        |
| `xPDO::LOG_LEVEL_WARN`  | `MODX_LOG_LEVEL_WARN`  | 2        |
| `xPDO::LOG_LEVEL_INFO`  | `MODX_LOG_LEVEL_INFO`  | 3        |
| `xPDO::LOG_LEVEL_DEBUG` | `MODX_LOG_LEVEL_DEBUG` | 4        |

## Смотрите также

-   **log_level** System Setting
-   **log_target** System Setting
-   [xPDO](extending-modx/xpdo "xPDO")
