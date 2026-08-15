---
title: "Глоссарий MODX Revolution"
sortorder: 5
_old_id: "157"
_old_uri: "2.x/getting-started/an-overview-of-MODX/glossary-of-revolution-terms"
description: "Определения основных терминов MODX Revolution со ссылками на связанные страницы документации"
translation: "getting-started/glossary"
---

## Аутентификация

Проверка личности [пользователя](getting-started/glossary#polzovatel) при входе в Менеджер или на сайт. Ядро можно расширить собственным классом аутентификации. [Подробнее](building-sites/client-proofing/security/users)

## База данных

SQL-база (MySQL/MariaDB), где хранятся объекты MODX: ресурсы, элементы, пользователи, настройки и другое. Revolution работает с ней через xPDO.

## Базовое рабочее пространство

Именованная запись пути к установленному ядру MODX в базе данных. При установке создаётся рабочее пространство по умолчанию для выбранного ядра. Переключение нескольких рабочих пространств из Менеджера в текущих релизах Revolution не является повседневным сценарием.

## Бек-энд

Синоним интерфейса [Менеджера](getting-started/glossary#menedzher) MODX.

## Валидатор (Транспортный пакет)

Скрипт или встроенная проверка, которая выполняется до установки или удаления [транспортного контейнера](getting-started/glossary#transportnyj-kontejner). Если валидатор возвращает `true`, установка или удаление продолжается. Если `false`, MODX прерывает действие.

Валидатором проверяют доступность каталога на запись, наличие нужных элементов или версии MySQL и PHP. [Подробнее](extending-modx/transport-packages)

## Группа пользователей

Именованный набор пользователей для политик доступа и прав. [Подробнее](building-sites/client-proofing/security/user-groups)

## Дерево ресурсов

Иерархический список [ресурсов](getting-started/glossary#resurs) в Менеджере (обычно слева). Расположение родитель/потомок влияет на структуру сайта и URL.

## Документ

Тип [ресурса](getting-started/glossary#resurs) для обычной страницы сайта.

## Дополнение

Сторонний компонент MODX, который не меняет ядро и не расширяет его классы, но добавляет функции сайту.

## Дочерний ресурс

[Ресурс](getting-started/glossary#resurs), который лежит под [родительским ресурсом](getting-started/glossary#roditelskij-resurs) (часто [контейнером](getting-started/glossary#kontejner)) в [дереве ресурсов](getting-started/glossary#derevo-resursov).

## Дружественные URL-адреса, Дружественные псевдонимы

SEO-дружественные URL (в MODX часто называют ЧПУ). При включённых дружественных URL MODX строит читаемые пути из псевдонимов ресурсов вместо «сырых» ID в запросе. [Подробнее](getting-started/friendly-urls)

## Журнал ошибок

Системный журнал Менеджера, куда MODX пишет ошибки PHP и приложения. Открывается в разделе «Отчёты» → «Журнал ошибок». Путь и имя файла задают системные настройки `error_log_filepath` и `error_log_filename`.

## Идентификатор документа

См. [Идентификатор ресурса](getting-started/glossary#identifikator-resursa).

## Идентификатор ресурса

Также называют ID документа, ID ресурса или идентификатором документа: число в скобках в [дереве ресурсов](getting-started/glossary#derevo-resursov) Менеджера, однозначно указывающее на ресурс.

## Имя пользователя

Логин [пользователя](getting-started/glossary#polzovatel).

## Источник файлов

Определяет, откуда берётся медиа: локальная [файловая система](getting-started/glossary#fajlovaya-sistema), Amazon S3 или другой драйвер. В ядре есть файловая система и S3. Другие источники ставят через [управление пакетами](getting-started/glossary#upravlenie-paketami) или пишут сами. [Подробнее](building-sites/media-sources)

## Категория

Необязательная метка для [элемента](getting-started/glossary#element), [набора переменных](getting-started/glossary#nabor-peremennyh) и связанных объектов, чтобы группировать их в Менеджере.

## Компонент

Также «сторонний компонент» или 3PC. Код, расширяющий MODX: часто [дополнение](getting-started/glossary#dopolnenie), [расширение](getting-started/glossary#rasshirenie) или пакет шаблона.

## Коннектор

Точка входа для AJAX-запросов. Коннектор загружает основной класс MODX, очищает данные запроса и передаёт работу [процессору](getting-started/glossary#processor). [Подробнее](getting-started/directory-structure#connectors)

## Контейнер

[Ресурс](getting-started/glossary#resurs), отмеченный так, что в нём могут лежать [дочерние ресурсы](getting-started/glossary#dochernij-resurs) в [дереве ресурсов](getting-started/glossary#derevo-resursov). При наличии детей контейнер выступает [родительским ресурсом](getting-started/glossary#roditelskij-resurs).

## Контекст

Граница для [ресурсов](getting-started/glossary#resurs) и настроек. Контексты используют для поддоменов, языков и похожих разделений сайта.

## Контроллер

PHP-класс Менеджера, который собирает страницу Менеджера (подключает assets, выставляет плейсхолдеры, отдаёт представление). Пользовательские страницы Менеджера (CMP) строятся на контроллерах. [Подробнее](extending-modx/custom-manager-pages)

## Куки

Данные HTTP-cookie в браузере. MODX использует их вместе с [сеансом](getting-started/glossary#seans-polzovatelya) для входа и состояния запроса.

## Кэш, кэширование

Сохранённые копии данных, которые MODX переиспользует, чтобы меньше ходить в базу. Revolution кэширует на нескольких уровнях. [Подробнее](extending-modx/caching)

## Лексикон

Словарь строк по культуре (точнее, чем просто код языка, например `ru`), которым локализуют Менеджер и дополнения. Записи лексикона заменяют старые языковые файлы. Многие из них правят прямо в Менеджере.

## Менеджер

Административный интерфейс MODX (также [бек-энд](getting-started/glossary#bek-end)).

## Меню

Пункты навигации Менеджера (главное меню, меню пользователя и т. п.). Ядро и пакеты регистрируют пункты, которые открывают контроллеры.

## Медиабраузер

Также MODX Browser или файловый менеджер. Интерфейс Менеджера для просмотра и выбора файлов через [источник файлов](getting-started/glossary#istochnik-fajlov) (загрузка, папки, вставка в ресурсы и TV).

## MIME-тип

Тип содержимого файла или ответа (например `text/html`). [Тип содержимого](getting-started/glossary#tip-soderzhimogo) хранит MIME-тип для ресурсов этого вида.

## Набор переменных

Именованный набор [переменных](getting-started/glossary#peremennye) элемента. Его подключают к элементу, чтобы переопределить значения по умолчанию для конкретного вызова.

## Наборы настроек формы

Также FC Sets. Группа [правил](building-sites/client-proofing/form-customization/rules) настройки формы для одной страницы (действия) Менеджера. [Подробнее](building-sites/client-proofing/form-customization/sets)

## Настройка контекста

Параметр одного [контекста](getting-started/glossary#kontekst). Может создать новый ключ или переопределить [системную настройку](getting-started/glossary#sistemnaya-nastrojka).

## Настройка формы

Функция Менеджера: вы задаёте [правила](building-sites/client-proofing/form-customization/rules), которые меняют вид и поведение форм. [Подробнее](building-sites/client-proofing/form-customization)

## Настройки пользователя

Параметр одного [пользователя](getting-started/glossary#polzovatel). Может добавить ключ или переопределить совпадающие настройки контекста и системы.

## Настройка тегов

Теги вида `[[++SettingName]]` для [системных настроек](getting-started/glossary#sistemnaya-nastrojka), [настроек контекста](getting-started/glossary#nastrojka-konteksta) и [настроек пользователя](getting-started/glossary#nastrojki-polzovatelya).

## Объект

В терминах xPDO — PHP-объект, сопоставленный со строкой в таблице (ресурс, пользователь и т. д.). См. также [первичный ключ](getting-started/glossary#pervichnyj-klyuch).

## Параметр запроса alias

Системная настройка `request_param_alias`: имя GET-параметра для псевдонима ресурса, когда дружественные URL выключены или как запасной вариант. По умолчанию `q`. [Подробнее](building-sites/settings/request_param_alias)

## Параметр запроса id

Системная настройка `request_param_id`: имя GET-параметра для ID ресурса. По умолчанию `id`. [Подробнее](building-sites/settings/request_param_id)

## Первичная группа пользователя

Основная [группа пользователей](getting-started/glossary#gruppa-polzovatelej), назначенная пользователю. Политики доступа и значения по умолчанию часто опираются на неё.

## Первичный ключ

Столбец (или столбцы) таблицы, однозначно определяющие строку. У ресурсов это ID в [дереве ресурсов](getting-started/glossary#derevo-resursov).

## Переменные

Один именованный параметр [элемента](getting-started/glossary#element) (значение свойства сниппета, чанка и т. п.).

## Плагин

PHP-[элемент](getting-started/glossary#element), который выполняется на [системных событиях](getting-started/glossary#sistemnoe-sobytie) (сохранение чанка, очистка кэша и др.), в отличие от [сниппета](getting-started/glossary#snippet), который вызывают из контента. [Подробнее](extending-modx/plugins)

## Плейсхолдеры

Теги вида `[[+PlaceholderName]]` для значений, заданных в PHP, обычно через `$modx->setPlaceholder('placeholderName', 'value')` в [сниппете](getting-started/glossary#snippet) или [плагине](getting-started/glossary#plagin).

## Поле ресурса

Столбец строки ресурса (`site_content`): `pagetitle`, `longtitle`, `introtext`, `alias`, `menuindex` и другие. Многие видны на экране редактирования и через [теги ресурса](getting-started/glossary#tegi-resursa).

## Пользователь

Учётная запись Менеджера или фронтенда: имя, учётные данные, профиль, членство в группах. [Подробнее](building-sites/client-proofing/security/users)

## Прехуки

Хуки, которые выполняются до основной обработки FormIt (или похожего Extra). См. [Хуки](getting-started/glossary#huki).

## Процессор

PHP-скрипт одного действия Менеджера или коннектора (создать, обновить, получить список и т. д.). Коннекторы направляют AJAX к процессорам. [Подробнее](extending-modx/processors)

## Пространство имён

Метка, которой компоненты группируют записи лексикона, настройки и связанные объекты. Также указывает абсолютный путь к компоненту.

## Расширение

Также «расширение ядра». Сторонний компонент, меняющий поведение ядра: свой класс пользователя или аутентификации, провайдер кэша, классы для работы с контекстами.

## Рендерер

Код, который меняет отображение значения в гриде Менеджера или похожем UI. Свои рендереры задают, например, в Collections. [Подробнее](extras/collections)

## Ресурс

Единица контента сайта, которую разбирает парсер. Частые типы: [документ](getting-started/glossary#dokument), [ссылка на сайт](getting-started/glossary#ssylka-na-sajt), [симлинк](getting-started/glossary#simlink), [статический ресурс](getting-started/glossary#staticheskij-resurs). [Подробнее](building-sites/resources)

## Резолверы (в Транспортном пакете)

Скрипт или встроенное действие после установки или удаления [транспортного контейнера](getting-started/glossary#transportnyj-kontejner). Резолвер выполняется после сохранения объекта контейнера.

Пример PHP-резолвера: привязать события к только что установленному [плагину](getting-started/glossary#plagin).

Пример файлового резолвера: скопировать `assets/getResources` из пути vehicle в каталог `assets` сайта.

## Родительский ресурс

[Ресурс](getting-started/glossary#resurs), под которым в [дереве ресурсов](getting-started/glossary#derevo-resursov) лежат [дочерние ресурсы](getting-started/glossary#dochernij-resurs). Если родитель отмечен как контейнер, это также [контейнер](getting-started/glossary#kontejner).

## Сеанс пользователя

Серверный промежуток времени, в течение которого запросы посетителя связаны друг с другом (вход, flash-данные и т. п.), обычно вместе с [куки](getting-started/glossary#kuki).

## Сессия

См. [Сеанс пользователя](getting-started/glossary#seans-polzovatelya).

## Симлинк

Тип [ресурса](getting-started/glossary#resurs), который указывает на другой локальный ресурс и показывает его содержимое.

## Системная настройка

Параметр всего сайта. Его могут переопределить [настройки контекста](getting-started/glossary#nastrojka-konteksta) и [настройки пользователя](getting-started/glossary#nastrojki-polzovatelya).

## Системное событие

Именованная точка в коде ядра или Extra, где могут сработать [плагины](getting-started/glossary#plagin) (сохранение, удаление, очистка кэша и многое другое). [Подробнее](extending-modx/plugins/system-events)

## Сниппет

PHP-[элемент](getting-started/glossary#element), который вызывают из шаблонов, чанков или ресурсов для динамического кода. [Подробнее](building-sites/elements/snippets)

## Ссылка на сайт

Тип [ресурса](getting-started/glossary#resurs), который указывает на внешний URL или другой ресурс и перенаправляет посетителя. Цель (target) ссылки — этот URL или ресурс. Системная настройка [`use_weblink_target`](building-sites/settings/use_weblink_target) задаёт, печатают ли теги ссылок и `makeUrl()` сразу целевой URL или внутренний URL самой ссылки.

## Статический ресурс

Тип [ресурса](getting-started/glossary#resurs), указывающий на файл на сайте. Содержимое ресурса заменяется содержимым этого файла.

## Статический элемент

[Элемент](getting-started/glossary#element), исходный код которого лежит в файле на диске, а не только в базе. [Подробнее](building-sites/elements/static-elements)

## Тег чанка

Теги вида `[[$ChunkName]]`, которые вставляют [чанк](getting-started/glossary#chank).

## Теги ресурса

Теги вида `[[*fieldOrTvName]]` для [полей ресурса](getting-started/glossary#pole-resursa) или [шаблонных переменных](getting-started/glossary#shablonnye-peremennyeili-tv-parametry-ili-tv).

## Теги сниппета

Теги вида `[[SnippetName]]`, также вызов [сниппета](getting-started/glossary#snippet).

## Теги ссылки

Теги вида `[[~ResourceId]]`, которые выводят URL [ресурса](getting-started/glossary#resurs).

## Тип содержимого

Задаёт расширение, MIME-тип и двоичный флаг для [ресурса](getting-started/glossary#resurs). [Подробнее](building-sites/resources/content-types)

## Тема лексикона

Набор записей [лексикона](getting-started/glossary#leksikon) по одной теме. Revolution подгружает темы по мере необходимости.

## Транспортный пакет

ZIP с набором [транспортных контейнеров](getting-started/glossary#transportnyj-kontejner), который ставят через [управление пакетами](getting-started/glossary#upravlenie-paketami) или переносят между сайтами. [Подробнее](extending-modx/transport-packages)

## Транспортный контейнер

Единица внутри [транспортного пакета](getting-started/glossary#transportnyj-paket): объекты или файлы плюс правила установки. [Подробнее](extending-modx/transport-packages)

## Управление лексиконом

Инструменты Менеджера для просмотра и правки записей [лексикона](getting-started/glossary#leksikon) по пространству имён и [теме](getting-started/glossary#tema-leksikona). Для разработчиков см. также [интернационализацию](building-sites/i18n).

## Управление пакетами

Интерфейс и сервис Менеджера для установки [транспортных пакетов](getting-started/glossary#transportnyj-paket) (Extras) с удалённых провайдеров или из загруженного файла. Также называют установщиком Extras. [Подробнее](building-sites/extras)

## URI

Путь (и связанные идентификаторы), который MODX связывает с ресурсом для маршрутизации и дружественных URL. Связанные поля ресурса включают `uri` и `alias`.

## Установщик

См. [Управление пакетами](getting-started/glossary#upravlenie-paketami).

## Файловая система

Локальное дисковое хранилище файлов сайта. Тип [источника файлов](getting-started/glossary#istochnik-fajlov) по умолчанию читает и пишет файловую систему. [Подробнее](building-sites/media-sources/types/media-source-type-file-system)

## Файловый менеджер

См. [Медиабраузер](getting-started/glossary#mediabrauzer).

## Файловый резолвер

Тип [резолвера](getting-started/glossary#rezolvery-v-transportnom-pakete) xPDOVehicle, который копирует файлы из пути транспортного пакета в целевой путь на сайте.

## Хуки

В FormIt и похожих Extra хук — PHP после (или до, как прехук) обработки формы: письмо, редирект, антиспам, своя логика. [Подробнее](extras/formit/formit.hooks)

## Чанк

Повторно используемая разметка (часто HTML), хранимая как [элемент](getting-started/glossary#element). Вставляют чанк [тегом чанка](getting-started/glossary#teg-chanka). [Подробнее](building-sites/elements/chunks)

## ЧПУ

См. [Дружественные URL-адреса, Дружественные псевдонимы](getting-started/glossary#druzhestvennye-url-adresa-druzhestvennye-psevdonimy).

## Шаблон

Элемент с внешней разметкой для документов выбранного типа. Ресурс выбирает шаблон. В шаблоне лежат теги чанков, сниппетов и TV. [Подробнее](building-sites/elements/templates)

## Шаблонные переменные (или ТВ-параметры или TV)

Пользовательские поля ресурса на экране создания и редактирования. Выводят через [теги ресурса](getting-started/glossary#tegi-resursa). [Подробнее](building-sites/elements/template-variables)

## Элемент

Также «элементы содержимого»: [шаблон](getting-started/glossary#shablon), [шаблонная переменная](getting-started/glossary#shablonnye-peremennyeili-tv-parametry-ili-tv), [чанк](getting-started/glossary#chank), [сниппет](getting-started/glossary#snippet), [плагин](getting-started/glossary#plagin), [категория](getting-started/glossary#kategoriya) или [набор переменных](getting-started/glossary#nabor-peremennyh) в дереве элементов Менеджера.

## Языковые теги

Теги вида `[[%LanguageStringKey]]`, которые берут строки из [лексикона](getting-started/glossary#leksikon).

## Asset

Любой файловый ресурс по пути `MODX_ASSETS_PATH` (обычно `/assets`): библиотеки, изображения, CSS, JavaScript, файлы классов, пакеты Extra и подобное.

## Media Browser

См. [Медиабраузер](getting-started/glossary#mediabrauzer).

## MODX Browser

См. [Медиабраузер](getting-started/glossary#mediabrauzer).

## TV

См. [Шаблонные переменные](getting-started/glossary#shablonnye-peremennyeili-tv-parametry-ili-tv).

## xPDOVehicle

Базовый класс транспортного контейнера. Хранит экземпляры xPDOObject (строки таблиц) и атрибуты установки и удаления, включая валидаторы и резолверы.
