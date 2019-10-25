---
title: "MODX дополнения"
translation: "extras"
---

В этом разделе документации вы найдете информацию о дополнениях для MODX Revolution. Эти дополнения (и их документация) сделаны сторонними разработчиками, поэтому официально не поддерживаются.

## Где найти дополнения

Официальный источник дополнений **MODX.com**. Ты можешь [просматривать сотни (бесплатных) дополнений](https://modx.com/extras/), каждая установка MODX уже настроена на [загрузку и установку дополнений с MODX.com через менеджер пакетов](building-sites/extras).

Есть также сторонние источники и доступные торговые площадки, которые обычно предлагают комбинацию бесплатных и премиальных дополнений. Они включают:

| Имя                                                                         | Количество дополнений    | Поддержка                                                                                               |
| --------------------------------------------------------------------------- | ------------------------ | ------------------------------------------------------------------------------------------------------- |
| [modx.com/extras/](https://modx.com/extras/)                                | Болле **800** дополнений | [Форум сообщества](https://community.modx.com/)                                                         |
| [modstore.pro](https://en.modstore.pro/) ([Russian](https://modstore.pro/)) | 100+ (EN), 300+ (RU)     | [Форум сообщества](https://modx.pro), и создание запросов на дополнительные услуги                      |
| [modmore.com](https://www.modmore.com/extras/)                              | 20+                      | [Форум сообщества](https://forum.modmore.com) и поддержка по электронной почте для дополнительных услуг |
| [extras.io](https://extras.io/extras/)                                      | 5                        | [Email поддержка](https://extras.io/support/) для премиальных дополнений                                |
| [bobsguides.com](https://bobsguides.com/guide-to-packages.html)             | 47                       | [Email поддержка для Bob Ray's дополнений](https://bobsguides.com/contact-form.html)                    |

Чтобы использовать сторонние дополнительные провайдеры, вам обычно необходимо создать учетную запись, чтобы получить доступ к их [поставщику пакетов](building-sites/extras/providers). Вы можете найти больше информации о том, как это сделать, в документации для каждого из упомянутых поставщиков.

## Обычно используемые дополнения

Имея почти 1000 доступных дополнений, при начале работы может быть сложно определить, какие дополнения следует использовать. Дополнения в следующем списке считаются отличным выбором в зависимости от требований вашего проекта.

Это не означает, однако, что это ваши единственные варианты. Просматривайте репозиторий, читайте форумы и делитесь интересными дополнениями, которые вы найдете в сообществе.

### Навигация и контент

- [pdoTools](https://docs.modx.pro/en/components/pdotools) представляет собой набор полезных сниппетов, который призван стать современной (в основном) заменой старых (но все еще поддерживаемых) дополнений:
  - [pdoResources](https://docs.modx.pro/en/components/pdotools/snippets/pdoresources) является эквивалентом [getResources](extras/getresources), который может быть использован для перечисления ресурсов. Их также можно использовать для подачи RSS или создания Sitemap.
  - [pdoMenu](https://docs.modx.pro/en/components/pdotools/snippets/pdomenu) является эквивалентом [Wayfinder](extras/wayfinder), который используется для создания (многоуровневых) меню из вашего дерева ресурсов.
  - [pdoPage](https://docs.modx.pro/en/components/pdotools/snippets/pdopage) является эквивалентом [getPage](extras/getpage), который обертывает сниппеты, такие как getResources / pdoResources с возможностями разбиения на страницы
  - [pdoCrumbs](https://docs.modx.pro/en/components/pdotools/snippets/pdocrumbs) может быть использован аналогично[Breadcrumbs](extras/breadcrumbs) создать хлебные крошки текущего ресурса.
- [getResourceField](extras/getresourcefield), [pdoField](https://docs.modx.pro/en/components/pdotools/snippets/pdofield) или [fastField](extras/fastfield) для получения одного поля ресурса.
- [AdvSearch](extras/advsearch) или [mSearch2](https://en.modstore.pro/packages/ecommerce/msearch2) (премиум дополнение от modstore) добавляет функцию поиска на ваш сайт
- [Collections](extras/collections) используется для большого количества ресурсов, таких как блоги или списки продуктов, и будет перечислять дочерние ресурсы в сетке вместо дерева
- [NewsPublisher](https://bobsguides.com/newspublisher-tutorial.html) позволяет пользователям создавать ресурсы в front-end без необходимости доступа к MODX Manager (включая редактирование текста и браузер файлов/изображений).

### Редактирование кода/текста

- [TinyMCE RTE](https://modx.com/extras/package/tinymcerichtexteditor) это текстовый редактор на основе TinyMCE 4. (Пакет называется просто [TinyMCE](https://modx.com/extras/package/tinymce) использует более старый TinyMCE 3)
- [TinymceWrapper](https://modx.com/extras/package/tinymcewrapper) реализация TinyMCE, использующая последнюю версию CDN
- [Redactor](https://www.modmore.com/redactor/) (Премиум дополнение от Modmore) представляет собой MODX интеграцию от Redactor.
- [CKEditor](https://modx.com/extras/package/ckeditor) интегрирует CKEditor RTE в MODX.
- [Ace](https://modx.com/extras/package/ace) позволяет редактировать код для ваших элементов в менеджере.

### Медиа

- [Gallery](extras/gallery) может быть использована для добавления альбомов изображений на ваш сайт
- [MoreGallery](https://www.modmore.com/moregallery/) (премиум дополнение от Modmore)для управления галереями изображений и видео (YouTube / Vimeo), реализованными как специальный тип ресурса

### Формы

- [FormIt](extras/formit) является стандартом в обработке форм
- Formalicious ((Премиум дополнение от [modmore](https://www.modmore.com/formalicious/) и [modstore](https://en.modstore.pro/packages/users/formalicious))это конструктор форм на основе FormIt
- [SPForm](https://bobsguides.com/spform-tutorial.html) простая, защищенная от спама контактная форма

### Мультисайтовый, многоязычный, мультидоменный, контексты

- [xRouting](extras/xrouting) это гибкий контекстный маршрутизатор, который поддерживает (суб) домены и каталоги с минимальной конфигурацией
- [LangRouter](extras/langrouter) это контекстный маршрутизатор, который выбирает контекст на основе языка посетителей
- [Babel](extras/babel) используется для соединения переводов в разных контекстах

### Электронная коммерция

- [MiniShop2](https://modstore.pro/packages/ecommerce/minishop2) представляет собой мощное решение для электронной коммерции с открытым исходным кодом, со многими (платными и бесплатными) расширениями, доступными преимущественно из modstore
- [Commerce](https://www.modmore.com/commerce/) это мощное решение для электронной коммерции премиум-класса от modmore
- [SimpleCart](https://www.modmore.com/simplecart/) представляет собой более простое решение для электронной коммерции премиум-класса, изначально разработанное OostDesign и доступное в настоящее время от modmore

### Пользователи

- [Login](extras/login) представляет собой набор инструментов, которые помогут вам интегрировать функциональность интерфейсного пользователя, включая вход в систему и профили.
- [HybridAuth](extras/hybridauth) может использоваться для входа пользователей через социальные сети
- [Personalize](extras/personalize) может отображать разные чанки в зависимости от того, вошел ли пользователь в систему или нет

### Ведение блога

- [Collections](extras/collections) перечислить дочерние ресурсы в сетке в диспетчере (а не в дереве ресурсов)
- [Quip](extras/quip) и [Tickets](https://docs.modx.pro/en/components/tickets) для добавления функциональности комментирования
- [Tagger](extras/tagger) для добавления тегов, которые вы можете фильтровать и искать посты

### Управление версиями и рабочий процесс

- [VersionX](extras/versionx) хранит копию изменений ваших ресурсов и элементов для легкого восстановления.
- [Preview](https://extras.io/extras/preview/) и [Workflow](https://extras.io/extras/workflow/) (премиум дополнение от Extras.io) обеспечивают предварительный просмотр и публикацию рабочих процессов.
- [MagicPreview](https://www.modmore.com/extras/magicpreview/) (бесплатное дополнение от modmore) дает вам кнопку предварительного просмотра, которая позволяет вам видеть изменения вашего ресурса без необходимости сохранения изменений.
- [StageCoach](https://bobsguides.com/stagecoach-tutorial.html) позволяет проводить изменения страницы, чтобы они были применены в будущем.

### Инструменты разработки

- [modDevTools](https://modx.com/extras/package/moddevtools) добавляет дополнительную функциональность менеджеру, чтобы помочь разработчикам создавать сайты.
- [MyComponent](https://bobsguides.com/mycomponent-tutorial.html) это полноценная среда разработки для создания дополнений MODX.

### Инструменты для диагностики

- [SiteCheck](https://bobsguides.com/sitecheck-tutorial.html) (Премиум дополнение от Bob Ray) выполняет тысячи проверок целостности вашего сайта.

### Обновление MODX

- [UpgradeMODX](https://bobsguides.com/upgrade-modx-package.html) позволяет обновить MODX Revolution из админки MODX.
- [GoRevo](https://bobsguides.com/why-choose-gorevo.html) (Премиум дополнение от Bob Ray) предоставляет инструмент для перехода с MODX Evolution на MODX Revolution.

## Распространение ваших собственных дополнений

Перейдите на страницу [https://modx.com/extras/](https://modx.com/extras/), войдите в свою учетную запись MODX (или создайте ее), затем нажмите кнопку внизу, чтобы «Отправить дополнение».

Там вы можете загрузить MODX [транспортный пакет](extending-modx/transport-packages "Транспортный пакет"). Это специальный вид zip-файла, который гарантирует, что ваше дополнение и все его компоненты правильно установлены в целевой системе. Чтобы создать его, вам нужно создать [скрипт сборки](http://rtfm.modx.com/display/revolution20/Creating+a+3rd+Party+Component+Build+Script "Creating a 3rd Party Component Build Script")

Все дополнения, размещенные на MODX.com, проходят базовый обзор; обработка вашего заявления может занять несколько дней.
