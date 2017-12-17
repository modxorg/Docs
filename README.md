MODX Documentation
==================

This repository contains the MODX documentation in Markdown format. This is part of an effort to [replace the official documentation with a markdown-system that allows easier management and more community involvement](https://github.com/modxcms/mab-recommendations/pull/19/files). 

**Please do not submit changes to the markdown files yet.** This project is in a very early state, and is expected that we'll run the automatic current-to-markdown conversion script several more times down the road, which will overwrite any manual changes. 

## The Conversion

The current [docs site](https://docs.modx.com) is powered by MODX, with a front-end editing utility. Documentation content is stored as HTML, while the goal is to use Markdown instead.
 
I've been provided with a copy of the MODX database to ease the conversion so we don't have to scrape or parse more than necessary.
 
To run the conversion, a convert script is included in `/convert/`. This uses a composer dependency, so `composer install` in that directory before running it (from the command line) with `php do-it.php`. The actual conversion script is in `convert/Converter.php`. It basically connects to MODX, assuming `config.core.php` in the project root to point it to a valid MODX installation, and then recursively (by parent) loops over all resources and converts the resource content and meta data into a markdown file. The markdown file is placed under `/en/`, with the naming matching the resource alias/parents. 

Improvements to the conversion script are welcome. 

## New documentation goals

The new documentation (content) should allow:

- Major Version-specific documentation, based on git branches. MODX 3 will need to have its own documentation branch that can be worked on independently from MODX 2, with the possibility for git merges to synchronise shared changes.
- Multilingual capabilities. All current documentation is in a `/en/` folder, which should allow other languages to be added.

## Serving up the documentation

The beauty of markdown is that it is independent from specific technologies or tools. **This repository therefore only has the markdown content**. How this content is to be served up to users, is to be handled in a different repository.

Some options include:

- Building a static site with a tool like [Daux](http://daux.io). This is used by the [modmore docs site](https://docs.modmore.com/) for example. There are lots of different static site generators available.
- Integrating with a MODX installation. For example [MODX.pro Docs](https://docs.modx.pro) uses a custom script that creates resources from the [markdown source], allowing MODX extras for searching/navigation to be used.
- Building a custom app based on [Slim](https://www.slimframework.com/).

In order to present some functional documentation and to move this project along, I'm intending to go with the last option of building a light-weight dynamic site based on the markdown source. That is not necessarily the best or final solution, but will allow some quick results and experimentation.

## Discussion

Please feel free to open an issue for bad markdown conversions or discussion points. There is also a relevant #documentation channel on the [MODX Community Slack](https://modx.org).
