---
title: 'Write Documentation'
sortorder: 2
---

Want to help write the documentation? Please do!

The [documentation files are hosted on GitHub](https://github.com/modxorg/Docs), allowing anyone to propose changes. The documentation sources are written in Markdown.

## How to edit pages

To edit pages, you'll need a GitHub account. [Sign up if you don't already have an account](https://github.com/)

When you spot an error while browsing the documentation, you can quickly edit the right file by clicking on the _Edit this page_ link. That link is shown right below the title of the page, as well as in the footer. 

If you want to add new pages or you're [already browsing the sources on GitHub](https://github.com/modxorg/Docs), make sure to first select the right branch (2.x or 3.x). Then you can navigate the language folders to find the right directory.

## Creating new files

When creating a new file, please respect the existing standards for formatting and file naming. In particular, keep all filenames lowercase, use the `.md` extension, use dashes (`-`) instead of underscores (`_`).

For a new folder to show up in the navigation, there either needs to be an `index.md` file directly in the directory, or there should be a file with the same name as the directory with the `.md` extension. For example, in this hypothetical directory structure, `new-section` and `other-section` are both in the menu, but `hidden-section` is not because it does not have an index page:

- `new-section/`
    - `new-section/index.md`
    - `new-section/other-page.md`
- `other-section.md`
- `other-section/`
    - `other-section/greatness.md`
- `hidden-section/`
    - `hidden-section/secret.md`

## Frontmatter

To set a title and/or meta description, add front matter to the top of the file. This is strongly encouraged for all files:

``` plain
---
title: 'Excellent Documentation'
description: 'This meta data description will be used by search engines.'
---
```

### Menu ordering

To affect the order in the navigation, add a `sortorder`: 

``` plain
---
title: 'Excellent Documentation'
description: 'This meta data description will be used by search engines.'
sortorder: 3
---
```

Any document without a sortorder will be added after documents with a sortorder, and will use a natural sort based on the filename.

### Translations

To connect a translation to the original (English) version of the documentation, add a `translation` entry to the frontmatter. Provide the path, **without version or language prefix**, like:

``` plain
---
title: "Friendly URLs in my language"
translation: "getting-started/friendly-urls"
---
```

The name of your file (and thus, the documentation URL) does **not** have to match the source file.

[The application running this documentation site](https://github.com/modxorg/DocsApp) needs to reindex translations before they show up. That's done automatically when a pull request is accepted. 

To test if a translation is properly connected, you'll need to run the application on a local environment and execute `php docs.php index:translations`. See the DocsApp repository for more.

## Screencast

If you're new to git or GitHub, or more of a visual learner, the following screencast will show you how you can edit the documentation with just the browser.

<iframe sandbox="allow-same-origin allow-forms allow-popups allow-scripts" src="https://player.vimeo.com/video/330122657?byline=0" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
