---
title: "OnRichTextEditorRegister"
translation: "extending-modx/plugins/system-events/onrichtexteditorregister"
description: "Срабатывает каждый раз, когда рендерится выпадающий список доступных визуальных редакторов."
---

## Событие: OnRichTextEditorRegister

Отрисовывается во время любого выпадающего списка или select с доступными визуальными редакторами MODX.

Если вы разрабатываете пользовательский RTE, просто верните имя RTE, которое вы разрабатываете. Затем это будет сопоставлено с системной настройкой 'which\_editor', которая позволит пользователям выбрать ваш RTE для использования.

- Служба: 1 - Parser Service Events
- Group: RichText Editor

## Параметры события

Нет.

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
