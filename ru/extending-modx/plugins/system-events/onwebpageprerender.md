---
title: "OnWebPagePrerender"
translation: "extending-modx/plugins/system-events/onwebpageprerender"
---

## Событие: OnWebPagePrerender

Запускается после того, как все теги на странице обработаны, но еще не переданы в браузер.

Заголовки типа содержимого еще не отправлены, а выходные данные не очищены.

Служба: 5 - Template Service Events
Группа: Нет

## Параметры события

Нет.

## Пример

**Описаниие:** Отфильтруйте слова из документа перед его отображением в Интернете
**Системное событие:** OnWebPagePrerender

``` php
$words = array("snippet", "template"); // words to filter
$output = &$modx->resource->_output; // get a reference to the output
$output = str_replace($words,"<b>[filtered]</b>",$output);
```

Будьте осторожны, если ваш плагин OnWebPagePrerender является статическим элементом и включает или требует файлы, использующие _relative paths_. Код плагина выполняется из его кэшированного файла, например `core/cache/includes/elements/modplugin/7.include.cache.php`, не из исходного файла статического элемента. Смотрите [Bug 11129](https://github.com/modxcms/revolution/issues/11129)

## Пример

Такой плагин заменит на страницах слова:

```php
<?php
switch($eventName) {
    case 'OnWebPagePrerender': 
        // слова, которые будут заменены
        $words = array("Товар", "Цена");
        // получаем доступ к содержанию страницы
        $output = &$modx->resource->_output;
        // заменяем слова
        $output = str_replace($words,"поменяли",$output); 
        break;
}
```

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")