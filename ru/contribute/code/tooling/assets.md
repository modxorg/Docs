---
title: Сборка assets
translation: "contribute/code/tooling/assets"
---

Ресурсы в MODX влияют на менеджер и включают основные файлы JavaScript и Sass/CSS.

## Расположение

Исходные ресурсы можно найти в следующих местах:

- `_build/templates/default/` содержит рабочий процесс сборки, а также `package.json`, который используется для импорта некоторых сторонних зависимостей.
- `_build/templates/default/sass/` содержит исходные файлы Sass (в формате scss),
- `manager/assets/` содержит все файлы javascript, связанные с менеджером. Файлы, необходимые на каждой странице, объединяются и сжимаются в процессе сборки в `_build/templates/default`.

## Сборка assets

[Подробную информацию об установке и запуске рабочего процесса ресурсов можно найти на GitHub](https://github.com/modxcms/revolution/blob/2.x/_build/templates/default/README.md)
