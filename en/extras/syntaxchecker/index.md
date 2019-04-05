---
title: "SyntaxChecker"
_old_id: "727"
_old_uri: "revo/syntaxchecker"
---

- [What is SyntaxChecker?](#SyntaxChecker-WhatisSyntaxChecker%3F)
  - [Requirements](#SyntaxChecker-Requirements)
  - [History](#SyntaxChecker-History)
  - [Download](#SyntaxChecker-Download)
- [Usage Examples](#SyntaxChecker-UsageExamples)
- [Troubleshooting](#SyntaxChecker-Troubleshooting)
- [See Also](#SyntaxChecker-SeeAlso)



## What is SyntaxChecker?

[SyntaxChecker](http://modx.com/extras/package/syntaxchecker) is a plugin that checks the syntax of your MODX tags and alerts you to problems. This helps ensure that your documents and templates render the way you expect them to.

### Requirements

- MODx Revolution 2.1 or later
- PHP5 or later

### History

SyntaxChecker was first released on December 20, 2011.

### Download

It can be downloaded from within the MODx Revolution manager via [Package Management](developing-in-modx/advanced-development/package-management "Package Management"), or from the MODx Extras Repository, here: <http://modx.com/extras/package/syntaxchecker>

## Usage Examples

Once you've activated the plugin, no other action is required. Just observe that if your pages or templates have glitches in their tags, you'll see an error window pop up when you try to save.

The following represents some of the conditions that are checked for (see the readme.txt file for a full list):

1. Basic integrity check: equal number of '\[\[' and '\]\]'
2. No looping conditions (e.g. where you put \[\[\*content\]\] inside your content).
3. Snippets exist? e.g. \[\[Waaaayfinder\]\]
4. Chunks exist? e.g. \[\[$mispelled\]\]
5. Resources exist? e.g. \[\[~123\]\]
6. Settings exist? e.g. \[\[++site\_url\]\]
7. Document variables exist? e.g. \[\[\*kontent\]\]
8. Property sets exist? e.g. \[\[Snippet@myPropSet\]\]
9. Output filters exist? e.g. \[\[Snippet:my\_filter\]\]
10. Parameters are prefixed with an ampersand? e.g. \[\[Snippet? whoops=`xyz`\]\]
11. Parameters delineated from the token via a question mark, e.g. \[\[Snippet &no=`question`\]\]
12. Parameter names and values are separated by an equals sign, e.g. \[\[Snippet &not`equal`\]\]
13. When saving a template, ensure that the TVs are assigned to the current template.

## Troubleshooting

- Be sure to clear your MODX error log periodically.
- File bugs at <https://github.com/fireproofsocks/SyntaxChecker>

## See Also