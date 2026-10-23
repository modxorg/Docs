---
title: "Chunks"
sortorder: "3"
_old_id: "56"
_old_uri: "2.x/making-sites-with-modx/structuring-your-site/chunks"
---

A Chunk is reusable static text, such as a contact line or a copyright notice. A Chunk cannot contain logic. It can call a [Snippet](extending-modx/snippets "Snippets").

## Create

Before you can use a Chunk, create one from the Elements tree: **Elements** → **Chunks** → **Create Chunk**.

![](chunk_example.jpg)

## Usage

Call the Chunk by name in a Template or in Resource content:

``` php
[[$chunkName]]
```

MODX replaces that tag with the Chunk contents.

You can pass properties. For a Chunk named `intro`:

> Hello, `[[+name]]`. You have `[[+messageCount]]` messages.

``` php
[[$intro? &name=`George` &messageCount=`12`]]
```

> Hello, George. You have 12 messages.

Placeholders can also come from a [Template Variable](building-sites/elements/template-variables "Template Variables"):

``` php
[[!$intro? &name=`[[*usersName]]` &messageCount=`[[*messageCount]]`]]
```

Or put the Resource tags in the Chunk:

``` php
Hello, [[*usersName]]. You have [[*messageCount]] messages.
```

## See Also

- [modChunk](extending-modx/core-model/modchunk "modChunk")
