---
title: "NewsPublisher"
description: "Extra для создания и редактирования ресурсов на фронтенде без входа в менеджер MODX"
translation: "extras/newspublisher/index"
---

## Что такое NewsPublisher?

NewsPublisher позволяет пользователям создавать и редактировать ресурсы на фронтенде без входа в менеджер MODX. Редактируются все поля ресурса (кроме id) и любые Template Variables, привязанные к ресурсу. Вы выбираете, какие поля показывать, и можете сделать большинство read-only. Полноценное Rich Text редактирование доступно для content, description, summary (introtext) и rich text TV через TinyMCE 4. NewsPublisher включает просмотр изображений и файлов, а также редактирование изображений через elFinder.

3.0.x -- Новые возможности -- Больше нет extJS/modExt. Больше нет зависимости от extra MODX TinyMCE. Использует браузер elFinder. Редактирование изображений (crop, rotate, resize) в браузере. Загружает TinyMCE 4 с tinymce.com. Автоматический redirect на страницу Login для неавторизованных. Полный список в changelog.

NewsPublisher показывает настраиваемую форму для создания и редактирования ресурсов на фронтенде. Также включён сниппет NpEditThisButton с кнопкой запуска NewsPublisher для текущей страницы.

NewsPublisher учитывает права безопасности MODX для страницы. Пользователи без прав не могут создавать или редактировать страницы, к которым нет доступа.

Теперь на одной странице может быть несколько кнопок редактирования. Кнопки можно разместить в Tpl-чанке getResources или другого aggregator-сниппета.

Установите через Package Manager и прочитайте туториал на [Bobs Guides](https://bobsguides.com/newspublisher-tutorial.html)

## Сведения о пакете

- Загрузок: 9 424
- Лицензия: GPLv2
- Требуется: Revolution 2.2.x или новее
- Поддерживает: mysql, sqlsrv

## История

- Автор Evolution: Raymond Irving [SlideShare](https://www.slideshare.net/xwisdom)
- Автор Revolution: Bob Ray [Bob's Guides](https://bobsguides.com)
- Участники: Markus Schlegel, donshakespeare, Bruno17, Gregor Šekoranja, Alberto Ramacciotti и другие внесли исправления, улучшения и функции.

Эту версию extra NewsPublisher разработал Bob Ray. Первый коммит на GitHub: 9 ноября 2010 года. На 22 июня 2017 года последнее обновление было 22 июня 2017 года, 714 коммитов, 9 424 загрузки. Пакет NewsPublisher состоит из 3 801 файла и 144 524 строк кода.

Сейчас проект поддерживает Bob Ray.

## Загрузка

NewsPublisher устанавливается через менеджер MODX Revolution в [Менеджере пакетов](developing-in-modx/advanced-development/package-management "Package Manager") (Extras -> Installer) или из [репозитория MODX Extras](https://modx.com/extras/package/newspublisher).

## Разработка и сообщения об ошибках

NewsPublisher хранится и развивается на GitHub: [главная страница NewsPublisher на GitHub](https://github.com/BobRay/newspublisher).

Ошибки и запросы функций: [страница issues NewsPublisher](https://github.com/BobRay/newspublisher/issues).

Вопросы по использованию NewsPublisher задавайте на [форумах MODX](https://forums.modx.com).

## Документация

Полная документация на сайте автора (Bob's Guides): [документация NewsPublisher](https://bobsguides.com/newspublisher-tutorial.html).
