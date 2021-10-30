---
title: "xPDO.setLogTarget"
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.setlogtarget"
---

## xPDO::setLogTarget

Устанавливает цель журнала для вызовов `xPDO::_log()`.

Допустимые целевые значения включают в себя:

-   `ECHO`: возвращает вывод на STDOUT.
-   `HTML`: возвращает вывод в STDOUT с форматированием HTML.
-   `FILE`: отправляет вывод в файл журнала.
-   Массив с хотя бы одним элементом с ключом 'target', совпадающим с одной из допустимых целей журнала, перечисленных выше. Для `'target' => 'FILE'` вы можете указать второй элемент с ключом 'options' с другим ассоциативным массивом с одним или обоими элементами 'filename' и 'filepath'.

Возвращает ранее установленную цель журнала.

## Синтаксис

API Docs: <https://api.modx.com/revolution/2.2/db_core_xpdo_xpdo.class.html#\xPDO::setLogTarget()>

```php
mixed setLogTarget ([string $target = 'ECHO'], mixed 1)
```

## Примеры

Установите цель журнала для форматирования сообщений журнала в HTML и вывода в браузер.

```php
$xpdo->setLogTarget('HTML');
```

Установите цель журнала для вывода чего-либо `WARN` или выше в новый файл журнала, который установлен с помощью `install.` плюс временную метку текущего выполнения (полезно для процедур установки).

```php
$xpdo->setLogLevel(xPDO::LOG_LEVEL_WARN);
$xpdo->setLogTarget(array(
   'target' => 'FILE',
   'options' => array(
       'filename' => 'install.' . strftime('%Y-%m-%dT%H:%M:%S')
    )
));
```

## Смотрите также

-   [xPDO](extending-modx/xpdo "xPDO")
-   [xPDO.log](extending-modx/xpdo/class-reference/xpdo/xpdo.log)
