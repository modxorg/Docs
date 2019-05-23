---
title: "Рассылка по расписанию"
translation: "extending-modx/creating-components/scheduled-newsletter"
---

Последнее занятие будет самым коротким. Неожиданно обнаружилось, что мы уже всё сделали, и осталось только добавить скрипт отправки писем по расписанию.

На всякий случай напоминаю алгоритм работы компонента:

* Создаём рассылку и указываём ей свойства. Обязательно указать шаблон или сниппет.
* Добавляем пользователей (или они добавляются самостоятельно, через сайт)
* На странице очереди писем добавляем новые, путем выбора рассылки. В зависимости от того, что в ней указано, текст письма генерируется сниппетом или шаблоном.
* Отправляем письма. Можно вручную, из админки, или скриптом, по расписанию.

Всё, кроме скрипта мы уже сделали.

## Отправка писем по расписанию

Учитывая, что все необходимое у нас уже прописано в классе `sxQueue`, нужно только подключить модель компонента, выбрать записи и вызвать метод `send()`.

``` php
<?php
// Это для вызова из директории разработки
if (file_exists(dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/config.core.php')) {
    require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/config.core.php';
}
else {
    require_once dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '/config.core.php';
}

// Получаем конфиг и вызываем MODX
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
require_once MODX_CONNECTORS_PATH . 'index.php';

// Добавляем модель
$modx->addPackage('sendex', MODX_CORE_PATH . 'components/sendex/model/');

// Выбираем 100 писем
$q = $modx->newQuery('sxQueue');
$q->limit($modx->getOption('sendex_queue_limit', null, 100, true));

// Отправляем
$queue = $modx->getCollection('sxQueue');
/** @var sxQueue $email */
foreach ($queue as $email) {
    $email->send();
}
```

После отправки письмо удаляется, так что скрипт можно запускать хоть через каждые 2 минуты — нагрузки он не создаст.

Я добавил этот файл в `/core/components/sendex/cron/send.php`, чтобы его нельзя было вызвать из браузера. Зачем давать возможность непонятно кому отправлять ваши письма?

Добавить в cron его можно или вручную (см. документацию к своему хостингу). Обычно нужно зайти на сервер через SSH и набрать **crontab -e** и в редакторе добавить:

``` php
*/2  *  * * *   php /var/www/site/www/core/components/sendex/cron/send.php
```

Сервер будет дергать файл каждые 2 минуты, и все рассылки улетят мгновенно. На лабораторном тарифе MODXCloud я не смог зайти в SSH, наверное отключено.

[Вот коммит с файлом send.php](https://github.com/bezumkin/Sendex/commit/52b15960eeddb2968bc1585f9e6f630c8b59438f).

В принципе, вот и всё последнее занятие, но добавйте еще пройдёмся по теме добавления писем в очередь через API.

## Добавление писем через API

Не знаю, как сделано в других решениях, но я не представляю, как можно автоматизировать добавление писем в рассылку.

Ведь может быть огромное количество ситуаций и условий. Рассылка новых тикетов из раздела вопросы, или новостей с шаблоном 5 из родителя 13 — это все не нарисуешь в интерфейсе.

Поэтому, автоматическое добавление писем в рассылку мы оставляем на совести разработчика сайта. Мы ему уже все подготовили:

* Создать сниппет или шаблон, который будет формировать тело письма
* Создать рассылку и указать сниппет или шаблон
* Получить объект `sxNewsletter` и вызвать метод `addQueues`

То есть, все очень просто.

На всякий случай вот код:

``` php
$modx->addPackage('sendex', MODX_CORE_PATH . 'components/sendex/model/');

/** @var sxNewsletter $newsletter */
if ($newsletter = $modx->getObject('sxNewsletter', array('name' => 'Рассылка новостей'))) {
    $newsletter->addQueues();
}
```

Можно вызывать этот код при публикации новых страниц, по расписанию или еще как то. В своем сниппете или шаблоне вы можете выбирать любые документы и по любым условиям. Вообще, можно набивать рассылки какой угодно информацией.

Я считаю, это достаточно перспективная разработка, которую будет легко и приятно использовать. Тем более, мы написали всё, чтобы управлять рассылками вручную.

## Заключение

На этом наш курс занятий заканчивается.

Задавайте вопросы, будем обсуждать непонятности. В ближайшее время я постараюсь просмотреть код, возможно немного доработать логику и выложить уже в репозиторий.

За всеми изменениями можно [следить на GitHub](https://github.com/bezumkin/Sendex/commits/master).

## Узнать больше

* [Настройка рабочего места: MODXCloud + PhpStorm](extending-modx/creating-components/customize-the-workplace)
* [Разбор структуры компонента, зачем нужны assets, core и остальные?](extending-modx/creating-components/component-structure)
* [Основы Git и первый коммит заготовки компонента на Github](extending-modx/creating-components/git-basics/)
* [Логика работы, схему и модель таблицы в БД](extending-modx/creating-components/work-logic)
* [Сборка и установка первой версии пакета](extending-modx/creating-components/package-build)
* [Пишем интерфейс: виджеты ExtJS и процессоры](extending-modx/creating-components/extjs-widgets)
* [Пишем интерфейс: таблица подписок и окошко создания](extending-modx/creating-components/letter-queue-table)
* [Пишем интерфейс: окно редактирования подписки](extending-modx/creating-components/subscription-edit-window)
* [Сниппет Sendex и формы подписки\отписки](extending-modx/creating-components/snippet-sendex)
* [Самостоятельная подписка\отписка пользователя](extending-modx/creating-components/subscription-table)
