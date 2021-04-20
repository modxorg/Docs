---
title: "Процессоры"
translation: "extending-modx/processors"
description: "Процессоры можно сравнить с командами или действиями, это такие PHP скрипты, которые могут выполнять определенные функции"
---

## Процессоры в MODX

Процессоры можно сравнить с "командами" или "действиями". До MODX 2.2 они были "простыми" PHP-файлами, но с тех пор они были переписаны на базе `modProcessor` класса, и его различных подтипов.

Итак, мы говорим про файлы-процессоры, это такие PHP скрипты, которые могут выполнять определенные функции. Для наглядности загляните в [/core/model/modx/processors](https://github.com/modxcms/revolution/tree/2.x/core/model/modx/processors), и вы увидите, как их много.

Работать с процессорами можно из любого Cниппета или Плагина при помощи метода [runProcessor](extending-modx/processors/using-runprocessor):

``` php
$response = $modx->runProcessor('action/path/to/processor',$arrayOfProperties,$otherOptions);
```

В ответ мы получаем объект [modProcessorResponse](https://github.com/modxcms/revolution/blob/df90fecfdfcf719cabe171ea3db59e47f45d7ee9/core/model/modx/modprocessor.class.php), со всеми его методами.

## Стандартные процессоры

К примеру, в каталоге `security` есть процессоры `login` и `logout`, которые управляют авторизацией пользователей. Вот как мы можем его авторизовать:

``` php
$username = 'ivanpetrov';
$password = '*********';
$data = array(
    'username' => $username,
    'password' => $password,
    'rememberme' => 1,
    'login_context' => 'web',
);    
$response = $modx->runProcessor('/security/login', $data);
if ($response->isError()) {
    $modx->log(modX::LOG_LEVEL_ERROR, 'Ошибка авторизации. Имя пользователя: '.$username.', Сообщение: '.$response->getMessage());
}
```

Выход с сайта и того проще:

``` php
$response = $modx->runProcessor('/security/logout');
if ($response->isError()) {
    $modx->log(modX::LOG_LEVEL_ERROR, 'Ошибка разавторизации. Имя пользователя: '.$modx->user->get('username').', UID: '.$modx->user->get('id').'. Сообщение: '.$response->getMessage());
}
```

Это очень удобно и гарантирует, что компонент будет работать во всех версиях MODX. Поэтому, если возможно, всегда нужно использовать стандартные процессоры.

Конечно, стандартные процессоры не умеют работать с вашими расширениями.

## Собственные процессоры

Использование своих процессоров отличается от стандартных только тем, что нужно указать директорию, откуда их брать. Смотрим пример из [miniShop2](https://minishop2.com):

``` php
// Массив, который мы передадим в процессор, там его ловить в $scriptProperties
$processorProps = array(
    'id' => 55
);
// Массив опций для метода runProcessor
$otherProps = array(
    // Здесь указываем где лежат наши процессоры
    'processors_path' => $modx->getOption('core_path') . 'components/minishop/processors/'
);
// Запускаем
$response = $modx->runProcessor('web/orders/getlist', $processorProps, $otherProps);
// И возвращаем ответ от процессора
return $response->response;
```

Это чуть измененный пример из сниппета miniShop, где он [обрабатывает запросы личного кабинета](https://github.com/bezumkin/miniShop/blob/master/core/components/minishop/elements/snippets/minishop.php#L26).

Как вы видите, процессор для запуска указывается без расширения, путем от каталога процессоров. Если мы не указываем свой каталог, то это будет `/core/model/modx/processors/` по умолчанию. В примере выше — мы ее меняем на каталог внутри компонента miniShop.

## Стандартный процессор внутри собственного

Вот и самое интересное! Смотрим пример:

``` php
$response = $modx->runProcessor('resource/create', $_POST);
if ($response->isError()) {
    return $modx->error->failure($response->getMessage());
}

$id = $response->response['object']['id'];
```

В этом примере мы создаем стандартным процессором новый ресурс из присланных данных, и получаем из ответа `id` этого ресурса, для дальнейшей работы.
[Вот исходный код](https://github.com/bezumkin/miniShop/blob/master/core/components/minishop/processors/mgr/goods/create.php) всего процессора miniShop для создания нового товара.

При таком подходе гарантируется, что независимо от будущих изменений в MODX свой процессор будет работать во всех версиях. И, что очень важно, **будут работать плагины**, которые должны работать при создании новых ресурсов. Также будет сгенерирован `alias` (если вы их используете), причем как это указано в настройках, через транслитерацию, или нет.
Таким же образом работает и обновление товаров, а например [mSearch](https://docs.modx.pro/en/components/msearch2), ловит событие `OnDocFormSave` и индексирует этот ресурс.

Конечно, можно не использовать в таких случаях `runProcessor`, а работать через `newObject` — но тогда нужно самостоятельно генерировать события для плагинов, определять незаданные поля нового ресурса, генерировать `alias` и еще много чего.
Зачем, если MODX все это уже предусмотрел?

## Заключение

Процессоры — отличная вещь и нужно использовать их по-максимуму, везде, во всех своих Сниппетах. Если вы хотите сделать что-то с ресурсом или другим элементом — посмотрите, нет ли для этого готового процессора в системе?
Если есть — используйте его. Это оградит вас от лишней головной боли, и позволит другим расширениям и плагинам взаимодействовать с вашим кодом. 

## Смотрите также

- [Начало работы с процессорами на основе классов](https://www.markhamstra.com/xpdo/2012/getting-started-with-class-based-processors-2.2/) (at markhamstra.com)
- [Расширение modObjectGetListProcessor, мощный процессор на основе классов в MODX 2.2](https://www.markhamstra.com/xpdo/2012/modobjectgetlistprocessor-class-based-processor/) (at markhamstra.com)
- [Полный список процессоров MODX](https://bobsguides.com/modx-processor-list.html) (at bobsguides.com)
