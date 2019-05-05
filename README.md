# MODX Documentation

This repository contains the MODX documentation in Markdown format. This is part of an effort to [replace the official documentation with a markdown-system that allows easier management and more community involvement](https://github.com/modxcms/mab-recommendations/pull/19/files).

This new documentation is currently available from [docs.modx.org](https://docs.modx.org)

## New documentation goals

The new documentation (content) should allow:

- Major Version-specific documentation, based on git branches. MODX 3 will need to have its own documentation branch that can be worked on independently from MODX 2, with the possibility for git merges to synchronise shared changes.
- Multilingual capabilities. All current documentation is in a `/en/` folder, which should allow other languages to be added.

## Serving up the documentation

The beauty of markdown is that it is independent from specific technologies or tools. **This repository therefore only has the markdown content**. How this content is served up to users, is handled in a [different repository](https://github.com/modxorg/DocsApp).

## Discussion

Please feel free to open an issue for bad markdown conversions or discussion points. There is also a relevant #documentation channel on the [MODX Community Slack](https://modx.org).

## The Conversion (Old)

The current [docs site](https://docs.modx.com) is powered by MODX, with a front-end editing utility. Documentation content is stored as HTML, while the goal is to use Markdown instead.

I've been provided with a copy of the MODX database to ease the conversion so we don't have to scrape or parse more than necessary.

To run the conversion, a convert script is included in `/convert/`. This uses a composer dependency, so `composer install` in that directory before running it (from the command line) with `php do-it.php`. The actual conversion script is in `convert/Converter.php`. It basically connects to MODX, assuming `config.core.php` in the project root to point it to a valid MODX installation, and then recursively (by parent) loops over all resources and converts the resource content and meta data into a markdown file. The markdown file is placed under `/en/`, with the naming matching the resource alias/parents.

Improvements to the conversion script are welcome.
