---
title: "Building Templates"
---

## Building Templates

The integration of a site into MODX will often start with defining which elements of the site are commonly repeated from page to page. Typically repeated elements would be a header, navigation and a footer.

The example below demonstrates a simple template where content, populated in each individual resource by the content field, can be injected into the `[[*content]]` tag, which in turn is surrounded by markup defined as the [Template](building-sites/elements/templates).

``` html
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <base href="[[!++site_url]]" />
   <title>[[*pagetitle]]</title>
   <!-- Continue to insert your css, scripts and other assets here -->
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

In the case of creating a blog post we may wish to also include a side bar, and whilst there are many options available to us to add this in such as creating a [Template Variable](building-sites/elements/template-variables) to toggle the sidebar on and off, it may be more convinent for the site editor to simply select a template for blog posts which contains a sidebar already. Therefore, in this instance it may be a good idea to setup a secondary template.

``` html
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <base href="[[!++site_url]]" />
   <title>[[*pagetitle]]</title>
   <!-- Continue to insert your css, scripts and other assets here -->
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

## Using Snippets

MODX offers a lot of dynamics out of the box but [Snippets](building-sites/elements/snippets) are a way of extending that dynmaic. Inside of our `headerHTML` chunk we have a navigation which could be made and managed dynamically with the use of a snippet or extra such as [Wayfinder](extras/wayfinder) or [pdoMenu](extras/pdoTools/Snippets/pdoMenu). Both Wayfinder and pdoMenu are extras rich in functionality and can automatically populate your menu based on the resources that exist in your site, as well as handle the 'active' class as the user navigates through the site and a plethora of other functions.

``` php
[[pdoMenu?
    &parents=`0`
    &level=`1`
]]
```

*The above example uses pdoMenu. For additional functionality and properties that can be applied, including the dictation of the html output, please check the [documentation](extras/pdoTools/Snippets/pdoMenu).*

However, snippets are not limited to pre exisiting extras and can be created and then included in your template to perform any dynamic function the PHP language allows. Read more about [Snippets](building-sites/elements/snippets).

## Resources

[Video quick start series](building-sites/integrating-templates/video-quick-start)

[Named anchor](building-sites/integrating-templates/named-anchor)
