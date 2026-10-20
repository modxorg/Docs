---
title: "Integrating Templates"
description: "Build a MODX template from the tags, chunks and snippets of a static HTML page: a header and a footer as chunks, a menu as a snippet, and a dynamic widget."
---

## Building Templates

Start from the static HTML page of the site. The parts that repeat from page to page — the header, the navigation, the footer — become the Template. The content of each page moves into the field that the Template reads.

In the Template below, `[[*content]]` stands where the content of the page goes. MODX replaces the tag with the content of the Resource that uses the Template.

``` html
<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/Organization">
<head>
    <meta charset="UTF-8">
    <base href="[[!++site_url]]" />
    <title>[[*pagetitle]]</title>
    [[- Continue to insert your CSS, Scripts and other assets here. ]]
</head>
<body>
    <!-- Header Start -->
    <header>
        <nav>
            <ul>
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Blog</a></li>
            </ul>
        </nav>
    </header>
    <!-- Header End -->
    <main>
        [[*content]]
    </main>
    <!-- Footer Start -->
    <footer>
        <nav>
            <ul>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms &amp; Conditions</a></li>
            </ul>
        </nav>
    </footer>
    <!-- Footer End -->
</body>
</html>
```

> [!WARNING]
> `[[!++site_url]]`, `[[!++http_host]]` and `[[!++url_scheme]]` are **config values, not system settings**. They come from `config.inc.php` and cannot be edited in the manager.

| Tag | Constant in `config.inc.php` | Value |
| --- | --- | --- |
| `[[!++site_url]]` | `MODX_SITE_URL` | the address of the site, with a trailing slash |
| `[[!++http_host]]` | `MODX_HTTP_HOST` | the host without a scheme |
| `[[!++url_scheme]]` | `MODX_URL_SCHEME` | `http://` or `https://`, with a trailing slash |

A full address is built as `[[!++url_scheme]][[!++http_host]]`.

A page with a different structure needs a second Template. For a blog post with a sidebar, create a Template that contains the sidebar and let the editor pick it for blog posts. A [TV](building-sites/elements/template-variables) that switches the sidebar on and off is the alternative, but then the choice falls on the editor for every page.

The Template for the blog post is the one above with an aside added — the head and the header stay the same:

``` html
<main>
    [[*content]]
</main>
<aside>
    <section>
        <h4>Related posts</h4>
        <ul>
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
        </ul>
    </section>
</aside>
```

## Using Chunks

[Chunks](building-sites/elements/chunks) hold the markup that repeats across Templates, so that it can be edited in one place. The header and the footer of the example above carry the navigation links. With the markup inlined in every Template, a change to the text of one link has to be made in every Template. The copies drift apart. Move the markup into Chunks and the edit happens once.

The header, the footer and the aside move into three Chunks:

``` php
[[$headerHTML]]
    <main>
        [[*content]]
    </main>
    [[$aside]]
[[$footerHTML]]
```

The `headerHTML` Chunk holds the DOCTYPE, the head and the header. The `footerHTML` Chunk holds the footer and the closing `</body>` and `</html>` tags. The text of a link is changed in the Chunk, and the change reaches every Template at once.

A Chunk can also be nested in another Chunk. The Chunk `metaData` holds the common meta data:

``` php
  <!-- SEO Microdata (Schema.org variant) - Google, Bing, Yahoo -->
  <meta content="[[++site_name]]" itemprop="description">
  <meta content="[[++site_name]]" itemprop="name">
  <meta content="[[!++url_scheme]][[!++http_host]]" itemprop="url">
  <meta content="[[!++url_scheme]][[!++http_host]]/meta_thumbnail.png" itemprop="image">
  <meta content="info@[[!++http_host]]" itemprop="email">
  <meta content="[[++site_name]]" name="companyright">
```

It can be embedded in the `headerHTML` Chunk:

``` php
<head>
   <meta charset="UTF-8">
   <base href="[[!++site_url]]" />
   <title>[[*pagetitle]]</title>
   [[$metaData]]
   [[- Continue to insert your CSS, Scripts and other assets here. ]]
</head>
```

## Using Snippets

A Snippet adds dynamic behaviour to a Template or a Chunk. Such a Snippet can also build the navigation of the `headerHTML` Chunk instead of static links. [Wayfinder](extras/wayfinder) and [pdoMenu](extras/pdoTools/Snippets/pdoMenu) both build the menu from the Resources of the site. Both mark the current Resource with the `active` class.

Replace the static links of the `headerHTML` Chunk with the call:

``` php
<nav>
    [[pdoMenu?
      &parents=`0`
      &level=`1`
    ]]
</nav>
```

*pdoMenu has more properties and its own output format — see its [documentation](extras/pdoTools/Snippets/pdoMenu).*

A Snippet of your own does any work that PHP allows. This one, called `getWeather`, reads the current weather from an API:

``` php
// Stash API URL
$jsonurl = "https://api.openweathermap.org/data/2.5/weather?q=London,uk&appid=YOUR_API_KEY";

// Call API
$json = @file_get_contents($jsonurl);
if ($json === false) {
    return 'The weather service is not available';
}

// Stash results
$weather = json_decode($json, true);
if (!isset($weather['weather'][0]['main'])) {
    return 'The weather service returned no data';
}

// Return weather description
return $weather['weather'][0]['main'];
```

> [!WARNING]
> **The API key has to be your own.** The key of the service is a free one that you get on the site of the service itself. The key that used to stand in this example no longer works. Every request without a valid key is answered with an error. That is why the Snippet above checks the answer before it reads the data.

Call the Snippet in the `aside` Chunk to serve the current weather description as a widget:

``` php
<aside>
    <section>
        <h4>Current Weather</h4>
        [[getWeather]]
    </section>
</aside>
```

The Snippet writes its answer into the page:

``` php
<aside>
    <section>
        <h4>Current Weather</h4>
        Drizzle
    </section>
</aside>
```

The value `Drizzle` is what the service returned when the example was written — the answer changes over time. MODX caches it, because the call above carries no uncache flag `!`, so the cached `Drizzle` survives the change of the weather. Call the Snippet uncached to prevent this: put the `!` in front of the Snippet name, `[[!getWeather]]`.

A Snippet can pass a parameter to another Snippet. `getLocation` reads the location of the visitor from a different API and passes it to `getWeather`:

``` php
[[!getWeather? &location=`[[!getLocation]]`]]
```

The `getWeather` Snippet captures the property and puts the location into the API call. The rest of the code stays as it was:

``` php
// Get properties
$location = $modx->getOption('location', $scriptProperties);

// Stash API URL
$jsonurl = "https://api.openweathermap.org/data/2.5/weather?q=" . $location . "&appid=YOUR_API_KEY";
```

## See Also

1. [Integrating Templates](building-sites/integrating-templates)
2. [Video Quick-Start Series](building-sites/integrating-templates/video-quick-start)
3. [Named Anchor](building-sites/integrating-templates/named-anchor)
4. [Templates](building-sites/elements/templates)
5. [Chunks](building-sites/elements/chunks)
6. [Snippets](building-sites/elements/snippets)
7. [Template Variables](building-sites/elements/template-variables)
