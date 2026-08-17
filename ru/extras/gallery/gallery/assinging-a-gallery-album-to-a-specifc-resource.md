---
title: "Привязка альбома Gallery к конкретному ресурсу"
description: "Как привязать альбом Gallery к ресурсу через TV Listbox и EVAL-binding"
translation: "extras/gallery/gallery/assinging-a-gallery-album-to-a-specifc-resource"
---

В Gallery из коробки нет привязки альбомов к ресурсам. Чтобы получить её, создайте Listbox [tv](making-sites-with-modx/customizing-content/template-variables) и используйте [EVAL-binding](making-sites-with-modx/customizing-content/template-variables/bindings/eval-binding) для динамической генерации пунктов списка.

Чтобы привязать галерею к конкретному ресурсу, выполните следующие шаги.

1\. Установите extra [Gallery](https://rtfm.modx.com/extras/revo/gallery/gallery.gallery)

2\. Создайте несколько галерей и загрузите в них изображения.

3\. Создайте чанк, например «galleryDropdownList».

```php
[[+name]]==[[+id]]||
```

4\. Создайте новый [tv](making-sites-with-modx/customizing-content/template-variables) с именем «assignedGallery». **Параметры ввода:**

Input type = Listbox (single- или multi-, в зависимости от того, сколько галерей вы хотите привязать к ресурсу).

Input Option Values (скопируйте и вставьте следующий код):

```php
$output = $modx->runSnippet("GalleryAlbums",array("rowTpl"=>"galleryDropdownList"))."none==0"; return $output;
```

Или вместо пунктов 3 и 4 используйте этот Select как Input Option Values (плюс: не нужны @EVAL и чанк):

```sql
@SELECT GROUP_CONCAT(name, '==', id SEPARATOR '||') FROM `modx_gallery_albums` WHERE active=1
```

Default Value: 0

Enable Type-Ahead: Yes

Force Selection to List: Yes

5\. Привяжите TV к шаблонам нужных ресурсов и выберите категорию. Сохраните.

6\. Откройте целевой ресурс в менеджере, перейдите в Template Variables и найдите ваш TV. Выберите нужный альбом галереи и нажмите Save.

7\. В шаблоне страницы разместите следующий код там, где должна выводиться галерея:

```php
[[!Gallery? &album=`[[*assignedGallery]]`]]
```
