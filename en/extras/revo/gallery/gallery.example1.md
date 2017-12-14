---
title: "Gallery.Example1"
_old_id: "869"
_old_uri: "revo/gallery/gallery.example1"
---

This is an example usage of Gallery. This page will first show a list of Gallery Albums, then once clicked, will load all the photos from that album. When a photo is clicked, it will show in large-form.

Simply paste this code into your Resource.

```
<pre class="brush: php">
[[!Gallery? &toPlaceholder=`gallery`]]
[[!GalleryItem]]
[[!GalleryAlbums? &toPlaceholder=`galleries`]]

<div style="float: right">
<h2>Galleries</h2>
<ul>
[[+galleries]]
</ul>
</div>

<h2>Item</h2>

[[!+galitem.image:notempty=`
<div class="image">
  <a href="[[+galitem.image]]"><img class="[[+galitem.imgCls]]" src="[[+galitem.image]]" alt="[[+galitem.name]]" /></a>
  <br />Albums: [[+galitem.albums]]
  <br />Tags: [[+galitem.tags]]
</div>
`]]


<hr />

[[!+gallery:notempty=`
<h1><a href="[[~[[*id]]]]">[[+gallery.name]]</a></h1>
<h2>[[+gallery.description]]</h2>

[[+gallery]]
`]]

```