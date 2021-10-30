# MODX Documentation

[![Contributors](https://img.shields.io/github/contributors/modxorg/Docs.svg?style=flat-square)](https://github.com/modxorg/Docs/graphs/contributors)
[![Contributors](https://img.shields.io/github/commit-activity/w/modxorg/Docs.svg?style=flat-square)](https://github.com/modxorg/Docs/graphs/contributors)
[![Slack Chat](https://img.shields.io/badge/chat_in_slack-online-green.svg?longCache=true&style=flat&logo=slack)](https://modx.org) 

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
