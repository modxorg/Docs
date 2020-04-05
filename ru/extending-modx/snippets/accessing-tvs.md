---
title: "Доступ к TV данным"
translation: "extending-modx/snippets/accessing-tvs"
---

## Доступ к значениям переменных шаблона через API

Как и все в графическом интерфейсе MODX, вы можете получить доступ к переменным шаблона и их значениям через API MODX. Это зависит от метода xPDO [getObject](extending-modx/xpdo/class-reference/xpdo/xpdo.getobject "xPDO.getObject") и связанных функций, но мы демонстрируем некоторые примеры здесь, потому что это напрямую связано с переменными шаблона.

## getTVValue

```php
string|null getTVValue (str|integer $tv_name OR ID of TV)
```

Смотри **core/model/modx/modresource.class.php**

### Использование getTVValue

Допустим, у нас есть TV с именем «био», и мы собираемся получить идентификатор страницы 123, который использует этот TV. Вот как может выглядеть наш сниппет:

```php
$page = $modx->getObject('modResource', 123);
return $page->getTVValue('bio');
```

`getTVValue` извлекает значения из кэша ресурсов, когда они доступны. Эти кэши обычно очищаются при сохранении ресурса, однако, если вы обновляете значения TV с помощью метода `setTVValue`, приведенного ниже, эти значения не будут отражаться напрямую из-за кэша.
Если вам абсолютно необходимы последние данные, вы можете обойти кеш, перейдя прямо к данным и используя `getObject`, чтобы получить запись значения TV.

```php
$tvr = $modx->getObject('modTemplateVarResource', array(
  'tmplvarid' => $tvId,
  'contentid' => $resourceId
));
if ($tvr) {
  return $tvr->get('value');
}
else {
  $tv = $modx->getObject('modTemplateVar', $tvId);
  if ($tv) return $tv->get('default_text');
}
return '';
```

## setTVValue

Используйте **setTVValue**, чтобы сохранить новое значение в TV. В отличие от некоторых других методов API xPDO, этот метод немедленно сохраняет значения в базе данных, поэтому вам не нужно вызывать отдельный вызов метода **save()**. Этот метод не очищает кэш ресурсов.

```php
boolean setTVValue (str|integer $tv_name OR ID of TV, string $value)
```

Обратите внимание, что при использовании `setTVValue` возможно немедленное получение `getTVValue` для возврата кэшированного значения.

### Использование setTVValue

```php
$page = $modx->getObject('modResource', 123);
if (!$page->setTVValue('bio', 'This is my new bio...')) {
    $modx->log(xPDO::LOG_LEVEL_ERROR, 'There was a problem saving your TV...');
}
```

## Смотрите также

-   [Создание переменных шаблона](building-sites/elements/template-variables/step-by-step)
-   [Привязки](building-sites/elements/template-variables/bindings)
    -   [CHUNK привязка](building-sites/elements/template-variables/bindings/chunk-binding)
    -   [DIRECTORY привязка](building-sites/elements/template-variables/bindings/directory-binding)
    -   [EVAL привязка](building-sites/elements/template-variables/bindings/eval-binding)
    -   [FILE привязка](building-sites/elements/template-variables/bindings/file-binding)
    -   [INHERIT привязка](building-sites/elements/template-variables/bindings/inherit-binding)
    -   [RESOURCE привязка](building-sites/elements/template-variables/bindings/resource-binding)
    -   [SELECT привязка](building-sites/elements/template-variables/bindings/select-binding)
-   [Типы ввода переменных шаблона](building-sites/elements/template-variables/input-types)
-   [Типы вывода шаблонных переменных](building-sites/elements/template-variables/output-types)
    -   [Date TV тип вывода](building-sites/elements/template-variables/output-types/date)
    -   [Delimiter TV тип вывода](building-sites/elements/template-variables/output-types/delimiter)
    -   [HTML Tag TV тип вывода](building-sites/elements/template-variables/output-types/html)
    -   [Image TV тип вывода](building-sites/elements/template-variables/output-types/image)
    -   [URL TV тип вывода](building-sites/elements/template-variables/output-types/url)
-   [Добавление пользовательского типа TV - MODX 2.2](extending-modx/custom-tvs)
-   [Создание поля множественного выбора для связанных страниц в вашем шаблоне](building-sites/tutorials/multiselect-related-pages)
-   [Доступ к значениям переменных шаблона через API](extending-modx/snippets/accessing-tvs)
