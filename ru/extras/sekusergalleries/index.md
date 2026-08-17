---
title: "sekUserGalleries"
description: "Менеджер галерей для загрузки и управления личными галереями пользователей в MODX"
translation: "extras/sekusergalleries/index"
---

## Что такое sekUserGalleries?

SekUserGalleries это менеджер галерей, в котором пользователи загружают и управляют личными галереями.

### Требования

- MODX Revolution 2.2.0-pl2 или новее
- PHP5 или новее
- Текущая beta-версия sekUserGalleries требует sekFancyBox. Установите через [Package Management](extending-modx/transport-packages "Package Management") или скачайте из репозитория MODX Extras: <https://modx.com/extras/package/sekfancybox>.
- Текущая beta-версия sekUserGalleries требует sekFormTools. Установите через [Package Management](extending-modx/transport-packages "Package Management") или скачайте из репозитория MODX Extras: <https://modx.com/extras/package/sekformtools>.
- Текущая beta-версия sekUserGalleries требует sekSiteTools. Установите через [Package Management](extending-modx/transport-packages "Package Management") или скачайте из репозитория MODX Extras: <https://modx.com/extras/package/seksitetools>.
- Для управления пользователями рекомендуется Login. Установите через [Package Management](extending-modx/transport-packages "Package Management") или скачайте из репозитория MODX Extras: <https://modx.com/extras/package/login> (у Login могут быть свои зависимости).

### История

SekUserGalleries написал Stephen Smith, первый релиз вышел 19 марта 2012 года.

### Загрузка

Установите через менеджер MODX Revolution в разделе [Package Management](extending-modx/transport-packages "Package Management") или скачайте из репозитория MODX Extras: <https://modx.com/extras/package/sekusergalleries>.

### Разработка и сообщения об ошибках

SekUserGalleries на GitHub: <https://github.com/insomnix/sekUserGalleries>, issues и запросы функций: <https://github.com/insomnix/sekUserGalleries/issues>.

## Использование

sekUserGalleries вызывается несколькими сниппетами (сейчас каждый сниппет лучше вызывать на отдельной странице):

- [sekUserGalleries.browse.galleries](extras/sekusergalleries/sekusergalleries.browse.galleries "sekUserGalleries.browse.galleries"). выводит все галереи.
- [sekUserGalleries.users.gallery.view](extras/sekusergalleries/sekusergalleries.users.gallery.view "sekUserGalleries.users.gallery.view"). показывает альбомы выбранной галереи. Если в URL не указана галерея, а пользователь авторизован и имеет право на галерею, откроется его галерея.
- [sekUserGalleries.users.gallery.manage](extras/sekusergalleries/sekusergalleries.users.gallery.manage "sekUserGalleries.users.gallery.manage"). позволяет менять настройки галереи, если пользователь авторизован и имеет право.
- [sekUserGalleries.album.view](extras/sekusergalleries/sekusergalleries.album.view "sekUserGalleries.album.view"). просмотр изображений в выбранном альбоме.
- [sekUserGalleries.album.manage](extras/sekusergalleries/sekusergalleries.album.manage "sekUserGalleries.album.manage"). добавление, редактирование и удаление альбомов в галерее, если пользователь авторизован и имеет право.
- [sekUserGalleries.album.items.manage](extras/sekusergalleries/sekusergalleries.album.items.manage "sekUserGalleries.album.items.manage"). добавление, редактирование и удаление элементов альбома. Сейчас настроена загрузка только изображений.
- [sekUserGalleries.album.items.helper](extras/sekusergalleries/sekusergalleries.album.items.helper "sekUserGalleries.album.items.helper"). вспомогательный сниппет для `[[album.items.manage]]`.
- [sekUserGalleries.image.information](extras/sekusergalleries/sekusergalleries.image.information "sekUserGalleries.image.information"). дополнительная информация об изображении: дата съёмки, камера и т.д.
- [sekUserGalleries.search](extras/sekusergalleries/sekusergalleries.search "sekUserGalleries.search"). поиск по заголовку, описанию и ключевым словам альбомов.
- [sekUserGalleries.directory](extras/sekusergalleries/sekusergalleries.directory "sekUserGalleries.directory"). сколько места пользователь занимает на сервере (используется мера на базе 1024: MiB, GiB и т.д.).

Укажите ID ресурса каждого сниппета в настройках (см. «Доступные настройки» ниже), чтобы страницы работали корректно.

## Доступные настройки

| Имя                                                | Описание                                                                                                                                                                                                                                                     | По умолчанию | Версия |
| --------------------------------------------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------- | ------- |
| sekusergalleries.load\_jquery                       | Включает или отключает загрузку JQuery при вызове sekUserGalleries на странице. Если JQuery уже грузится другим extra или в шаблоне, установите No/False. | Yes/True | >0.0.1  |
| sekusergalleries.browsegalleries\_resource\_id      | ID страницы со сниппетом `[[browse.galleries]]`.                                                                                                                                                                                                    |          | >0.0.1  |
| sekusergalleries.usersgallery\_resource\_id         | ID страницы со сниппетом `[[users.gallery.view]]`.                                                                                                                                                                                                  |          | >0.0.1  |
| sekusergalleries.editgallery\_resource\_id          | ID страницы со сниппетом `[[users.gallery.manage]]`.                                                                                                                                                                                                |          | >0.0.1  |
| sekusergalleries.album\_view\_resource\_id          | ID страницы со сниппетом `[[album.view]]`.                                                                                                                                                                                                          |          | >0.0.1  |
| sekusergalleries.album\_manage\_resource\_id        | ID страницы со сниппетом `[[album.manage]]`.                                                                                                                                                                                                        |          | >0.0.1  |
| sekusergalleries.items\_manage\_resource\_id        | ID страницы со сниппетом `[[album.items.manage]]`.                                                                                                                                                                                                  |          | >0.0.1  |
| sekusergalleries.items\_helper\_resource\_id        | ID страницы со сниппетом `[[album.items.helper]]`.                                                                                                                                                                                                  |          | >0.0.1  |
| sekusergalleries.album\_search\_resource\_id        | ID страницы со сниппетом `[[search]]`.                                                                                                                                                                                                              |          | >0.0.1  |
| sekusergalleries.image\_info\_resource\_id          | ID страницы со сниппетом `[[image.information]]`.                                                                                                                                                                                                   |          | >0.0.1  |
| sekusergalleries.directory\_stats\_resource\_id     | ID страницы со сниппетом `[[directory]]`.                                                                                                                                                                                                           |          | >0.0.1  |
| sekusergalleries.gallerycover\_thumb\_max\_width    | Максимальная ширина миниатюры обложки галереи в пикселях.                                                                                                                                                                                               | 150      | >0.0.1  |
| sekusergalleries.gallerycover\_thumb\_max\_height   | Максимальная высота миниатюры обложки галереи в пикселях.                                                                                                                                                                                              | 150      | >0.0.1  |
| sekusergalleries.gallerycover\_display\_max\_width  | Максимальная ширина отображаемой обложки галереи в пикселях.                                                                                                                                                                                                 | 300      | >0.0.1  |
| sekusergalleries.gallerycover\_display\_max\_height | Максимальная высота отображаемой обложки галереи в пикселях.                                                                                                                                                                                                | 300      | >0.0.1  |
| sekusergalleries.image\_thumb\_max\_width           | Максимальная ширина миниатюры изображения в пикселях.                                                                                                                                                                                                             | 150      | >0.0.1  |
| sekusergalleries.image\_thumb\_max\_height          | Максимальная высота миниатюры изображения в пикселях.                                                                                                                                                                                                            | 150      | >0.0.1  |
| sekusergalleries.max\_file\_size                    | Максимальный размер загружаемого файла в байтах.                                                                                                                                                                                                                              | 5242880  | >0.0.1  |
| sekusergalleries.min\_file\_size                    | Минимальный размер файла в байтах.                                                                                                                                                                                                                                     | 1        | >0.0.1  |
| sekusergalleries.orient\_image                      | Автоориентация изображения.                                                                                                                                                                                                                                              | 0        | >0.0.1  |
| sekusergalleries.discard\_aborted\_uploads          | Отбрасывать прерванные загрузки.                                                                                                                                                                                                                                        | 1        | >0.0.1  |

## Менеджер

### Настройки групп

Настройки групп используют группы и роли пользователей MODX для прав на галерею. По умолчанию галереи видят все, но создавать, редактировать и удалять изображения и альбомы могут только пользователи с подходящей группой и ролью из Group Settings. Подробнее о группах пользователей: раздел [User Groups](building-sites/client-proofing/security/user-groups).

| Настройка    | Описание                                                                                                                                                                                           | Версия |
| ---------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------- |
| User Group | Выберите одну группу пользователей из списка для прав на галерею.                                                                                                       | >0.0.1  |
| User Role  | Роль из групп пользователей MODX для управления правами. Выберите роль из списка.                                                                                                           | >0.0.1  |
| Amount     | Целое число: сколько места может занять пользователь с указанной группой и ролью.                                                                                                        | >0.0.1  |
| Unit       | Единица измерения выделенного места (MiB, GiB и т.д.).                                                                                                                    | >0.0.1  |
| Level      | Уровень ограничения. Soft разрешает добавлять файлы после достижения лимита. Hard блокирует загрузку при исчерпании квоты. | >0.0.1  |
| Private    | Yes: доступ к изображениям только у владельца галереи. No: файлы видны всем.                                                                         | >0.0.1  |

### Допустимые MIME-типы

Список MIME-типов, которые можно загружать. Справочник: [FeedForAll](http://www.feedforall.com/mime-types.htm).

| Настройка             | Описание                         | Версия |
| ------------------- | ----------------------------------- | ------- |
| Mime Types Accepted | Допустимый MIME-тип для загрузки.  | >0.0.1  |
| Resized File Ext    | Расширение после конвертации, например tiff в jpg. | >0.0.1  |

Пример допустимых MIME-типов.

| Mime Types Accepted | Resized File Ext |
| ------------------- | ---------------- |
| image/jpeg          | jpg              |
| image/pjpeg         | jpg              |
| image/png           | png              |

### Настройки размеров изображений

| Настройка              | Описание                                                                   | Версия |
| -------------------- | ----------------------------------------------------------------------------- | ------- |
| Name                 | Однословное имя группы размеров изображения.                                       | >0.0.1  |
| Description          | Краткое описание группы изображений.                                       | >0.0.1  |
| Max Width            | Максимальная ширина изображения.                                                   | >0.0.1  |
| Max Height           | Максимальная высота изображения.                                                  | >0.0.1  |
| Image Quality        | Качество ресайза: чем ниже число, тем меньше файл.        | >0.0.1  |
| Watermark Image      | Изображение для водяного знака.                                              | >0.0.1  |
| Watermark Brightness | Яркость водяного знака.                                              | >0.0.1  |
| Watermark Text       | Текст водяного знака. Поле игнорируется, если задан watermark image. | >0.0.1  |
| Watermark Text Color | Цвет текста водяного знака. Формат: 0,0,0                                  | >0.0.1  |
| Watermark Font       | Шрифт водяного знака.                                                         | >0.0.1  |
| Watermark Font Size  | Размер шрифта водяного знака.                                                          | >0.0.1  |
| Watermark Location   | Расположение водяного знака.                                              | >0.0.1  |
| Primary              | Только одно изображение может быть primary.                                                | >0.0.1  |
