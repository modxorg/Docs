---
title: "Установка"
sortorder: "3"
_old_id: "165"
_old_uri: "2.x/getting-started/installation"
translation: "getting-started/installation"
---

Этот раздел для **новых установок**. Чтобы обновить существующий сайт MODX, см. [Обновление MODX](getting-started/maintenance/upgrading).

Перед началом убедитесь, что хостинг соответствует [требованиям к серверу](getting-started/server-requirements) (для актуальных релизов 3.x нужен PHP **8.1+**).

## Выберите способ установки

| Способ | Для кого | Руководство |
| ------ | -------- | ----------- |
| Traditional zip | Большинство пользователей, самый простой путь | [Базовая установка](getting-started/installation/standard) |
| Advanced zip | Переименование `manager/` и/или `connectors/` при установке | [Расширенная установка](getting-started/installation/advanced) |
| Git | Участники разработки и установка с последними изменениями | [Установка через Git](getting-started/installation/git) |
| Composer | Разработчики, которым удобнее `create-project` | [Установка через Composer](getting-started/installation/composer) |
| CLI | Скриптовая и автоматическая установка | [Установка из командной строки](getting-started/installation/cli) |

Пакеты скачивайте с [modx.com/download](https://modx.com/download/).

### Traditional и Advanced

- **Traditional**: полный пакет, готов к распаковке и запуску setup. Используйте его, если нет особых причин выбирать другой вариант.
- **Advanced**: меньший архив. Setup собирает/распаковывает пакет ядра и позволяет задать собственные пути для `manager/` и `connectors/`. **Каталог core в MODX 3 нельзя перемещать или переименовывать.** Если переименовываете manager/connectors, нужны SSH (или аналог) и права на запись в родительские каталоги.

## Особые случаи

- [Установка рядом с существующим сайтом](getting-started/installation/existing-site) (подкаталог, старый HTML/CMS, временный URL)
- [Устранение неполадок при установке](getting-started/installation/troubleshooting)
- После успешной установки: [Установка прошла успешно, что дальше?](getting-started/getting-started)
