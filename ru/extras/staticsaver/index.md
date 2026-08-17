---
title: "StaticSaver"
translation: "extras/staticsaver"
---

## Что такое StaticSaver

StaticSaver это плагин для MODX Revolution. Он сам подставляет имя файла и media source элемента (template, chunk, snippet, TV или plugin), когда вы делаете элемент static. Простой помощник для разработчиков MODX.

## Установка

Сначала поставьте пакет через Package Management или скачайте из [Repository](https://modx.com/extras/package/staticsaver).

Дальше настройте [Media Sources](building-sites/media-sources) и [System Settings](building-sites/settings). Отфильтруйте системные настройки по namespace `staticsaver`.

Подробное видео настройки: [StaticSaver на YouTube](http://www.youtube.com/watch?v=l3ObHPfFKTM).

## Системные настройки StaticSaver

| System setting                                | Description                                                                                                                                                   | Default |
| --------------------------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------- |
| staticsaver.include\_category                 | Добавить папку категории в путь элемента. Например, Snippet MySnippet в категории MyCategory попадёт в path\_to\_media\_source/MyCategory/MySnippet.php | false   |
| staticsaver.static\_default                   | При открытии формы элемента сразу ставить все элементы static.                                                                                                   | false   |
| staticsaver.static\_file\_extension           | Расширение для всех элементов. Высокий приоритет. Оставьте пустым, если нужны разные расширения для разных типов.                | php     |
| staticsaver.static\_chunk\_file\_extension    | Расширение chunks. См. static\_file\_extension.                                                                                             | php     |
| staticsaver.static\_plugin\_file\_extension   | Расширение plugins. См. static\_file\_extension.                                                                                            | php     |
| staticsaver.static\_snippet\_file\_extension  | Расширение snippets. См. static\_file\_extension.                                                                                           | php     |
| staticsaver.static\_template\_file\_extension | Расширение templates. См. static\_file\_extension.                                                                                          | php     |
| staticsaver.static\_tv\_file\_extension       | Расширение template variables. См. static\_file\_extension.                                                                                 | php     |
| staticsaver.static\_chunk\_media\_source      | Media source для chunks.                                                                                                                                  | 1       |
| staticsaver.static\_plugin\_media\_source     | Media source для plugins.                                                                                                                                 | 1       |
| staticsaver.static\_snippet\_media\_source    | Media source для snippets.                                                                                                                                | 1       |
| staticsaver.static\_template\_media\_source   | Media source для templates.                                                                                                                              | 1       |
| staticsaver.static\_tv\_media\_source         | Media source для template variables.                                                                                                                      | 1       |
