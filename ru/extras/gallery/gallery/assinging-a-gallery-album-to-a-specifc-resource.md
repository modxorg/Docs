---
title: "Привязка альбома Gallery к конкретному ресурсу"
description: "Как привязать альбом Gallery к ресурсу через TV Listbox и @SELECT"
translation: "extras/gallery/gallery/assinging-a-gallery-album-to-a-specifc-resource"
---

В Gallery из коробки нет привязки альбомов к ресурсам. Сделайте Listbox TV, пункты которого берутся из таблицы альбомов.

Привязки `@EVAL` в MODX 3 удалены. Используйте `@SELECT` (ниже) или [`@SNIPPET`](building-sites/elements/template-variables/bindings/snippet-binding), который возвращает пары `label==id`.

1. Установите Extra [Gallery](extras/gallery).

2. Создайте альбомы и загрузите изображения.

3. Создайте TV типа Listbox с именем `assignedGallery` (single или multi — сколько альбомов нужно на ресурс).

**Input Option Values** — активные альбомы из таблиц Gallery (если префикс таблиц не `modx_`, поправьте его):

```sql
@SELECT GROUP_CONCAT(name, '==', id SEPARATOR '||') FROM `modx_gallery_albums` WHERE active=1
```

- Default Value: `0`
- Enable Type-Ahead: Yes
- Force Selection to List: Yes

4. Привяжите TV к шаблонам нужных ресурсов. Сохраните.

5. Откройте ресурс, вкладка Template Variables, выберите альбом, Save.

6. В шаблоне страницы выведите галерею:

```php
[[!Gallery? &album=`[[*assignedGallery]]`]]
```
