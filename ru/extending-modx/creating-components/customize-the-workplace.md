---
title: "Настройка рабочего места: MODXCloud + PhpStorm"
translation: "extending-modx/creating-components/customize-the-workplace"
---

Для разработки нужно хорошее окружение. Лично я использую локальный веб-сервер Nginx + Php5-fpm + Mysql на MacOS X, но это далеко не обычная конфигурация.

Гораздо проще и доступнее взять любой хостинг с доступом к сайту по SFTP. Неважно какой: shared, vps или cloud.

Конкретно для нашей задачи, чтобы рабочая среда была максимально одинаковой и доступной всем участникам обучения, мы используем [бесплатный аккаунт](https://modxcloud.com/signup/lab-account.html) на MODXCloud и [30-дневную пробную IDE PhpStorm](http://www.jetbrains.com/phpstorm/download/).

## Регистрация и настройка MODXCloud

Проще некуда. Регистрируетесь, входите, создаёте облако.

![](/2.x/ru/extending-modx/creating-components/customize-the-workplace/customize-1.png)

![](/2.x/ru/extending-modx/creating-components/customize-the-workplace/customize-2.png)

![](/2.x/ru/extending-modx/creating-components/customize-the-workplace/customize-3.png)

После входа нажмите **Clouds** в верхнем меню, затем **Add new cloud**, заполните нужные поля, выберите тариф **Development** и нажмите **Complete Cloud Creation**.

![](/2.x/ru/extending-modx/creating-components/customize-the-workplace/customize-4.png)

![](/2.x/ru/extending-modx/creating-components/customize-the-workplace/customize-5.png)

![](/2.x/ru/extending-modx/creating-components/customize-the-workplace/customize-6.png)

Дальше подождите около 5 минут, пока новое облако будет готово. Вверху экрана появится уведомление, и облако окажется в списке. Зайдите в него и в самом низу найдите **доступ по SFTP**. Он нам и нужен.

![](/2.x/ru/extending-modx/creating-components/customize-the-workplace/customize-7.png)

![](/2.x/ru/extending-modx/creating-components/customize-the-workplace/customize-8.png)

![](/2.x/ru/extending-modx/creating-components/customize-the-workplace/customize-9.png)

На этом настройка хостинга закончена. Данные для входа на сайт лежат у вас в ящике уведомлений:

![](/2.x/ru/extending-modx/creating-components/customize-the-workplace/customize-10.png)

## Настройка PhpStorm

[Скачайте](http://www.jetbrains.com/phpstorm/download/) и установите PhpStorm. Скорее всего, понадобится ещё Java 7. IDE сама об этом скажет.

Вы получаете пробную версию без ограничений функциональности на 30 дней. Этого хватает, чтобы пройти весь курс и решить, покупать ли эту IDE или искать бесплатные аналоги. Лично я купил её на прошлой новогодней распродаже, кажется за $25. Надеюсь, и в этом году нас порадуют, потому что лицензию нужно продлевать =)

Запускаем IDE и создаём новый проект Sendex.

![](/2.x/ru/extending-modx/creating-components/customize-the-workplace/PhpStorm-1.png)

![](/2.x/ru/extending-modx/creating-components/customize-the-workplace/PhpStorm-2.png)

![](/2.x/ru/extending-modx/creating-components/customize-the-workplace/PhpStorm-3.png)

Лично я переношу все панели вправо, потому что я правша и так удобнее до них добираться. Сделать это просто через контекстное меню.

Для оформления я использую тему Twilight со шрифтами [Ubuntu Mono](http://font.ubuntu.com/), почти все настройки по умолчанию. Стиль кода стандартный, с одним изменением: настоящая, а не smart, табуляция. Древний холивар «табы vs пробелы» я решил для себя просто: табы.

![](/2.x/ru/extending-modx/creating-components/customize-the-workplace/PhpStorm-4.png)

![](/2.x/ru/extending-modx/creating-components/customize-the-workplace/PhpStorm-5.png)

![](/2.x/ru/extending-modx/creating-components/customize-the-workplace/PhpStorm-6.png)

Если интересно, вот [экспорт моих настроек](http://yadi.sk/d/CuMmZlEgGqq6Q). Можно импортировать себе.

Дальше настраиваем связь с сервером. Это один из самых важных моментов в дальнейшей работе. В меню выберите **Tools → Deployment → Configuration**, добавьте новый сервер и введите данные из MODXCloud:

![](/2.x/ru/extending-modx/creating-components/customize-the-workplace/PhpStorm-7.png)

![](/2.x/ru/extending-modx/creating-components/customize-the-workplace/PhpStorm-8.png)

![](/2.x/ru/extending-modx/creating-components/customize-the-workplace/PhpStorm-9.png)

Не забудьте отметить зелёную галочку в левом верхнем углу окна, чтобы новый сервер стал сервером по умолчанию для этого проекта. После настройки желательно нажать **Apply и Test SFTP connection**.

![](/2.x/ru/extending-modx/creating-components/customize-the-workplace/PhpStorm-10.png)

Если видите слово successfully, всё в порядке.

С этого момента можно спокойно работать с файлами и каталогами на сервере. Найдите справа вкладку **Remote host** и откройте её. В каталоге www лежит наш сайт. Там можно создать каталог Sendex.

![](/2.x/ru/extending-modx/creating-components/customize-the-workplace/PhpStorm-11.png)

Второй важный момент: нужно настроить синхронизацию между удалённым каталогом **Sendex** и локальным проектом. Это делается там же в настройках **Deployment**, на вкладке **Mapping**:

![](/2.x/ru/extending-modx/creating-components/customize-the-workplace/PhpStorm-12.png)

Создайте в проекте файл **test.php** и скопируйте туда код для проверки:

``` php
<?php
// We connect
define('MODX_API_MODE', true);
require '../index.php';

// Enable error handling
$modx->getService('error','error.modError');
$modx->setLogLevel(modX::LOG_LEVEL_INFO);
$modx->setLogTarget(XPDO_CLI_MODE ? 'ECHO' : 'HTML');

echo '<pre>';
print_r($modx->config);
```

Теперь синхронизируйте проект с удалённым сервером через контекстное меню. Сразу после загрузки файла его можно открыть на сервере по ссылке [c2263.paas2.ams.modxcloud.com/Sendex/test.php](c2263.paas2.ams.modxcloud.com/Sendex/test.php)

![](/2.x/ru/extending-modx/creating-components/customize-the-workplace/PhpStorm-13.png)

![](/2.x/ru/extending-modx/creating-components/customize-the-workplace/PhpStorm-14.png)

![](/2.x/ru/extending-modx/creating-components/customize-the-workplace/PhpStorm-15.png)

Лично я всегда включаю автоматическую синхронизацию, чтобы файлы обновлялись по **Ctrl+S**.

![](/2.x/ru/extending-modx/creating-components/customize-the-workplace/PhpStorm-16.png)

Как видите, мы уже работаем с ядром MODX из этого файла в проекте. Он синхронизируется с удалённым каталогом.

Одна загвоздка: в редакторе всё выглядит некрасиво и ругается на _undefined variable 'modx'_:

![](/2.x/ru/extending-modx/creating-components/customize-the-workplace/PhpStorm-17.png)

PhpStorm не знает MODX из коробки. Нужно подключить его к проекту. Тогда IDE проиндексирует файлы и начнёт понимать объявленные переменные и их методы.

Скачайте последнюю версию MODX Revolution с официального сайта, распакуйте где-нибудь на компьютере и подключите к проекту через контекстное меню **External Libraries** в окне файлов проекта:

![](/2.x/ru/extending-modx/creating-components/customize-the-workplace/PhpStorm-18.png)

![](/2.x/ru/extending-modx/creating-components/customize-the-workplace/PhpStorm-19.png)

![](/2.x/ru/extending-modx/creating-components/customize-the-workplace/PhpStorm-20.png)

Сохраните. Все ошибки, кроме невозможности открыть файл index.php, пропадут. Этого файла нет в проекте. Он лежит на сервере, поэтому просто игнорируйте предупреждение.

Обратите внимание: после подключения MODX к проекту при наборе видны все его методы. PhpStorm начинает подсказывать их.

![](/2.x/ru/extending-modx/creating-components/customize-the-workplace/PhpStorm-21.png)

Более того, по методам и переменным можно переходить простым кликом **Ctrl+B**.

## Заключение

Итак, мы создали хостинг, создали проект, настроили IDE и синхронизацию файлов. Правильное рабочее окружение очень важно. От него зависят комфорт и удовольствие при разработке.

В следующем уроке мы клонируем [modExtra из репозитория](https://github.com/bezumkin/modExtra) и разберём его структуру.
