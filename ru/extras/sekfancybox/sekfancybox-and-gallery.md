---
title: "sekFancyBox & Gallery"
description: "Пример галереи Gallery с модальными окнами sekFancyBox"
translation: "extras/sekfancybox/sekfancybox-and-gallery"
---

## sekFancyBox & Gallery

Простой пример связки sekFancyBox с Gallery для модальной галереи со слайдшоу.

### Требования

- sekFancyBox: [Package Management](extending-modx/transport-packages "Package Management") или <https://modx.com/extras/package/sekfancybox>.
- Gallery: [Package Management](extending-modx/transport-packages "Package Management") или <https://modx.com/extras/package/gallery>.
- getPage: [Package Management](extending-modx/transport-packages "Package Management") или <https://modx.com/extras/package/getpage>.

#### Вызов сниппета

На странице галереи разместите вызов через getPage. Не забудьте page.nav.

``` php
<ul class="pagination-nav">
[[!+page.nav]]
</ul>
[[!getPage?
    &elementClass=`modSnippet`
    &element=`Gallery`
    &totalVar=`gallery.total`
    &limit=`20`
    &album=`3`
    &containerTpl=`galContainer.custom`
    &thumbTpl=`galItemThumb.custom`
    &thumbWidth=`145`
    &thumbHeight=`145`
    &imageWidth=`700`
    &imageHeight=`500`
]]
<ul class="pagination-nav">
[[!+page.nav]]
</ul>
```

Чтобы пагинация работала с Gallery, добавьте строку в сниппет getPage. Я поставил на строку 41, как советовали на форуме [Revolution Gallery - how to add pagination](http://forums.modx.com/thread/37769/revolution-gallery---how-to-add-pagination).

``` php
$properties['start'] = $properties['offset'];
```

#### Чанк: galContainer.custom

Простой unordered list с CSS-классом.

``` php
<ul class="image-container">
[[+thumbnails]]
</ul>
```

#### Чанк: galItemThumb.custom

В чанке миниатюры вызов sekfancybox. buttonhelper=`1` даёт кнопку воспроизведения слайдшоу вверху экрана.

``` php
<li>
[[!sekfancybox?
    &type=`media`
    &mousewheel=`1`
    &buttonhelper=`1`
    &modalclass=`[[+cls]]`
    &group=`gal`
    &title=`[[+description]]`
    &linktext=`<img class="[[+imgCls]]" src="[[+thumbnail]]" alt="[[+name]]" [[+image_attributes]] />`
    &link=`[[+image]]`]]
</li>
```

#### CSS

CSS ниже удобен для этого способа галереи.

``` css
/* gallery images */
ul.image-container{
    margin:0;
    padding:0;
}
ul.image-container li {
    list-style:none;
    display:inline-table;
    padding:10px;
}
ul.image-container li ul{
    margin:0;
    padding: 10px 0;
}
ul.image-container li ul li{
    display:block;
    text-align:center;
    width:180px;
    padding: 0;
}
ul.image-container li ul li h5{
    margin: 0 0 2px;
    font-size: 14px;
    text-decoration:underline;
    color: #063144;
}
ul.pagination-nav li{
    list-style:none;
    display:inline-table;
    padding:10px;
}
ul.pagination-nav li a.active{
    color:#000000;
}
```

На странице это выглядит скромнее, чем в документации, но работает хорошо.
