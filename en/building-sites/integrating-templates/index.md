---
title: "Integrating Templates"
---

## Building Templates

The integration of a site into MODX will often start with defining which elements of the site are commonly repeated from page to page. Typically, repeated elements would be a header, navigation and a footer.

The example below demonstrates a simple template where content, populated in each individual resource by the content field, can be injected into the `[[*content]]` tag, which in turn is surrounded by markup defined as the [Template](building-sites/elements/templates).

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

Additional templates may also be necessary as the structure of a page differs.

In the case of creating a blog post we may wish to also include a side bar, and whilst there are many options available to us to add this in such as creating a [Template Variable](building-sites/elements/template-variables) to toggle the sidebar on and off, it may be more convenient for the site editor to simply select a template for blog posts which contains a sidebar already. Therefore, in this instance it may be a good idea to setup a secondary template.

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
    <!-- Aside Start -->
    <aside>
        <section>
            <h4>Related posts</h4>
            <ul>
                <li><a href="#">Link</a></li>
                <li><a href="#">Link</a></li>
            </ul>
        </section>
    </aside>
    <!-- Aside End -->
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

## Using Chunks

[Chunks](building-sites/elements/chunks) offer a way of managing repeatable content in one place. In the example template above there is a static navigation in the header and footer, this may become problematic if there was a need to change the text for one of these links. Rather than change the text in each template and risk desynchronisation it would be preferable to update it once and have that change reflect on all templates. We can accomplish this by utilising chunks.

The below example illustrates placing the header, footer and aside into a chunk.

```php
[[$headerHTML]]
    <main>
        [[*content]]
    </main>
    [[$aside]]
[[$footerHTML]]
```

The `headerHTML` chunk has replaced the markup that was previously in the header, including the DOCTYPE and head tag. The `footerHTML` chunk has now replaced the footer mark up, including the closing body and html tag. In the case described above regarding the change of the link text it would now only need to be performed once in the chunk.

Chunks are not limited to a top level include, they can also be nested inside of other Chunks. In the below example we have created a new Chunk called `metaData` and filled it with some common meta data. 

``` php
  <!-- SEO Microdata (Schema.org variant) - Google, Bing, Yahoo -->
  <meta content="[[++site_name]]" itemprop="description">
  <meta content="[[++site_name]]" itemprop="name">
  <meta content="http://www.[[!++http_host]]" itemprop="url">
  <meta content="http://www.[[!++http_host]]/meta_thumbnail.png" itemprop="image">
  <meta content="info@[[!++http_host]]" itemprop="email">
  <meta content="[[++site_name]]" name="companyright">
```

We could now embed this chunk inside of our existing `headerHTML` chunk:

``` php
<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/Organization">
<head>
   <meta charset="UTF-8">
   <base href="[[!++site_url]]" />
   <title>[[*pagetitle]]</title>
   [[$metaData]]
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
```

## Using Snippets

MODX offers a lot of dynamics out of the box but [Snippets](building-sites/elements/snippets) are a way of extending that dynamic. Inside of our `headerHTML` chunk we have a navigation which could be made and managed dynamically with the use of a snippet or extra such as [Wayfinder](extras/wayfinder) or [pdoMenu](extras/pdoTools/Snippets/pdoMenu). Both Wayfinder and pdoMenu are extras rich in functionality that can automatically populate your menu based on the resources that exist in your site. In addition they can also handle the 'active' class as the user navigates through the site as well as a plethora of other functions. 

To use this Snippet insert it in replacement of the current static menu in the `headerHTML` Chunk. 

``` php
<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/Organization">
<head>
   <meta charset="UTF-8">
   <base href="[[!++site_url]]" />
   <title>[[*pagetitle]]</title>
   [[$metaData]]
   [[- Continue to insert your CSS, Scripts and other assets here. ]]
</head>
<body>
    <!-- Header Start -->
    <header>
        <nav>
            [[pdoMenu?
              &parents=`0`
              &level=`1`
            ]]
        </nav>
    </header>
    <!-- Header End -->
```

*The above example uses pdoMenu. For additional functionality and properties that can be applied, including the dictation of the html output, please check the [documentation](extras/pdoTools/Snippets/pdoMenu).*

However, Snippets are not limited to pre exisiting extras and can be created and then included in your template to perform any dynamic function the PHP language allows. For example we could create a Snippet called `getWeather` and populate it with the following code:

``` php
// Stash API URL
$jsonurl = "https://samples.openweathermap.org/data/2.5/weather?q=London,uk&appid=b6907d289e10d714a6e88b30761fae22";

// Call API
$json = file_get_contents($jsonurl);

// Stash results
$weather = json_decode($json);

// Return weather description
return $weather->weather[0]->main;
```  

From here the Snippet can be called inside of our `aside` to serve as a widget to get the current weather description. 

``` php
<aside>
    <section>
        <h4>Current Weather</h4>
        [[getWeather]]
    </section>
</aside>
```

The result of this Snippet would render on the front end like this:

``` php
<aside>
    <section>
        <h4>Current Weather</h4>
        Drizzle
    </section>
</aside>
```

The result of this Snippet at the time of writing outputs a value of `Drizzle`. This value from the API will be cached in MODX as the Snippet was called without the uncache flag `!`. However in this use case it could be problematic as the cached value `Drizzle` may persist even after the weather has changed. This particular Snippet should be called uncached using the `!` flag to prevent this issue. To call the snippet uncached place the flag in front of the Snippet name `[[!getWeather]]`. 

This snippet could also be further extended with the use of another Snippet which get's the users location from a different API. The result of which could then be passed into the `getWeather` Snippet as a parameter. 

``` php
[[!getWeather? &location=`[[!getLocation]]`]]
```

The `getWeather` Snippet could then be updated to capture the property and set the location value in the API call.

``` php
// Get properties
$location = $modx->getOption('location', $scriptProperties);

// Stash API URL
$jsonurl = "https://samples.openweathermap.org/data/2.5/weather?q=" . $location . "&appid=b6907d289e10d714a6e88b30761fae22";

// Call API
$json = file_get_contents($jsonurl);

// Stash results
$weather = json_decode($json);

// Return weather description
return $weather->weather[0]->main;

```

Read more about [Snippets](building-sites/elements/snippets).

## Resources

[Video quick start series](building-sites/integrating-templates/video-quick-start)

[Named anchor](building-sites/integrating-templates/named-anchor)
