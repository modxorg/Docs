---
title: "Documentation Guide"
_old_id: "1312"
_old_uri: "style-guide"
---

# Documentation Guide

 Welcome to MODX documentation guide for authors and contributors.

 This guide contains basic rules, tips, and suggestions for people writing or editing documentation for MODX. When different documents use the same guidelines, they are more user friendly, consistent and more simple to combine and reuse. We therefore strongly encourage all contributors to follow these guidelines for the benefit of the community.

 This guide does not attempt to cover all aspects of technical writing. The objective is to be concise and focused for MODX documentation writers.

 The Documentation Guide is in development. If you have suggestions for improving it, please email [hello@modx.com](http://mailto:hello@modx.com).

## Use US English

 Throughout MODX, US English is the standard for all written materials.

### General Rules

### -our vs. -or

 UK words ending in -our (such as flavour) lose their U when converted to US English. For example flavour becomes flavor, colour becomes color. The same thing usually applies to words with -our in the middle, so behaviour becomes behavior.

### Double Consonants

 When you convert a verb to its -ing form, remember that US English has a single, not a double consonant. For example travelling becomes traveling, levelling becomes leveling etc.

### List of common UK and US spellings

 For a more exhaustive list, see [Wikipedia](http://en.wikipedia.org/wiki/American_and_British_English_spelling_differences)

 | **UK English**         | **US English**       |
 | ---------------------- | -------------------- |
 | Analyse                | Analyze              |
 | Behaviour              | Behavior             |
 | Cancelling / Cancelled | Canceling / Canceled |
 | Centre                 | Center               |
 | Cheque                 | Check                |
 | Colour                 | Color                |
 | Customisation          | Customization        |
 | Customise              | Customize            |
 | Favourite              | Favorite             |
 | Labour                 | Labor                |
 | Licence                | License              |
 | Travelling             | Traveling            |

## Writing Rules

 These are som rules that make documents more clear, precise, and easy to understand.

### Keep it simple

 Use short sentences and punctuation to keep ideas clear and simple. Introduce a single idea, concept or action per sentence.

#### Wrong

 The manufacturing module allows users to define the process plans, work requirements and work efforts; this is how the processes that produce intermediate and final goods work.

#### Correct

 The manufacturing module allows users to define the process plans, work requirements and work efforts. This section describes how processes that produce intermediate and final goods function.

### Tenses

 Always use the present tense. Avoid past or future tenses if possible.

 In addition, try to refrain from using _must_, _have to_, _need to_, _will_, _should_ and similar forms.

 Keep in mind that a manual describes mandatory procedures to follow to accomplish a certain task.

#### Wrong

 You will have to press return to reboot the system.

#### Correct

 Press return to reboot the system.

### Aggressive Language

 Avoid using aggressive descriptions.

#### Wrong

 Hit return to reboot the system.

#### Correct

 Press return to reboot the system.

### Use the active voice

 Write using the active voice where possible.

#### Wrong

 The alarm was fired by the system.

#### Correct

 The system fired the alarm.

 Using the active voice makes documentation easier to read and understand. It also helps to clarify who is doing what, and that is important in user documentation.

 If you are writing an error message, it is acceptable to use the passive voice to avoid blaming the user.

### Use third person

 Where possible, use the third person imperative. For example:

#### Run the installation script

 is better than:

#### You should run the installation script

 However, so long as you don't overdo it or sound aggressive, it's fine to address the user directly using "you" if it makes the documentation easier to follow.

 Avoid referring to the user as "the user", for example: "Users should log into the system using their passwords", unless you are specifically distinguishing between users and somebody else e.g. an administrator

 The exception to these guidelines is error messages: if error messages address the user directly, they can sound blaming. For example:

 'Error: incorrect password'

 is better than:

 'Error: you have entered an invalid password'

### Punctuation

#### Exclamation marks

 There are virtually no circumstances where it is acceptable or necessary to use an exclamation mark in documentation or in error messages.

#### Abbreviations

 Do not use an apostrophe for plural abbreviations:#### Wrong: Use the Purchase Order window to create PO's **Right**: Use the Purchase Order window to create POs

### No personal opinions

 A manual or any other technical document is not the right place to make statements about what you think about competitors, products or the features described.

#### Wrong

 Select the _Report_ option to generate a full report of the customer data. Most of the time is better to export the data and generate a report from third-party applications due to the lack of configuration settings.

#### Correct

 Select the _Report_ option to generate a full report of the customer data. It is also possible to export data and generate a report from third-party applications.

 Also, be careful about expressing an opinion on whether a task is easy or not. If the user makes a mistake when you have mentioned that a task is simple, it can make them feel stupid even if the mistake is not their fault. For example, avoid expressions like:

 "It is easy to configure the application using the Wizard".

### Capitalization

 Avoid over-capitalization. It can be tempting to capitalize particular words in a sentence just because they seem important, but this looks untidy and makes it hard to maintain consistency in a long document. Only proper names, menu items and proprietary names require leading capitals.

### Avoid gender discrimination

 Readers of software documentation are men and women. Unfortunately in English there no personal or possessive pronoun that denote gender neutrality. Avoid using expressions that refer to specific gender forms. Pay special attention to the _she_, _he_, _him_ or _her_ pronouns.

#### Wrong

 Every user has his home directory.

#### Right

 Every user has a home directory.

 Although it's technically incorrect, many technical authors now use "they" or "their" as a neutral pronoun rather than "s/he" or "his or hers". It's not perfect but if you have a lot of pronouns in one sentence it can make it easier to read. In general try to rephrase the sentence to avoid the issue - see the example above.

 User stories and training scenarios are a good place to show diversity.

 Remember that in English, only people have a gender. Most other nouns are neutral.

### Only describe current functionality

 Avoid talking about future features or plans for a product or an application.

#### Wrong

 Graphics can be saved as a GIF image. Support for new formats will be added in future versions.

#### Correct

 Graphics can be saved as a GIF image.

### Terminology

#### Checkbox

 Checkbox is all one word (not check box). Checkboxes are either selected or cleared.

 For example:

 "Select the **Active** checkbox to make the field visible" "Clear the **Active** checkbox to make the field invisible".

#### Login vs Log in

 The verb is **Log in** and **Log into** "**Log in** using the password provided" "**Log into** MODX ERP" The noun or adjective is Login "You will need valid **Login** credentials to use the system"

 Not logon, log, log-in etc.

## Spanish — English False Friends and other pitfalls

 If Spanish is your first language, beware of the following common mistakes

### Dudas / doubts

 "Doubt" in english usually has quite a negative meaning. A better translation is questions or queries.

 Wrong: If you have any doubts about MODX, consult the wiki.
 Better: If you have any questions about MODX, consult the wiki.

### His / hers

 In English, only people have a gender. Things are always neutral and take the possessive pronoun "its" (without an apostrophe).

## Bold and Italics

 Because we use different documentation sources, including Mediawiki, a limited number of formatting styles are used:

- **Bold**. Use sparingly for emphasis, or to highlight file paths or option names, for example:

 From the **File** menu, select **New**.

- _Italic._ Use it when quoting a piece of a text from another source, a piece of text in another language or to give an example, such as sample text to be typed in a text field.

## File / Menu Paths

 File paths (i.e. particular file locations) should follow the standard
 "Directory/subdirectory/file.extension" format.

- For menu navigation (for example starting a new document) bold the whole thing and use > to separate the menu items.

 Orient the user by starting with the first thing the user needs to look for. For example:

 From the **File** menu, select **Document > New > Template**.

 not

 Select **Document > New > Template** from the **File** menu.

## Naming images andshots

 When uploading images or screenshots, name must be related to page's title. If same page contains more than a image, you can additionaly give a number. For example, in Payment Method page, images will be named as _paymentmethod01_, _paymentmethod02_, etc.

## Platform

 MODX runs on many different platforms. When documenting a feature that varies by platform, note the platform before the example or exception. Readers can then skip sections, rather than reading a paragraph before finding it is not relevant, and having to search for the correct section.

 Phrase language and layout in a way that allows future editors familiar with a platform to add valid examples. Platform variations are a sensitive topic, keep language neutral and factual. For example:

#### Wrong

 To start MODX POS double click start.bat

#### Correct

### Linux

 To start MODX POS run the shell script start.sh either by clicking it or by typing ./start.sh from a shell.

### Windows

 To start MODX POS run the batch file start.bat either by double clicking it or by typing start.bat from the command line.

## Other Conventions

When describing options always start from left to right and from top to bottom.

- If you have a list of items (for example a list of files to be downloaded) order them alphabetically unless there is a more obvious logical order.
- Try to be consistent with the way you describe similar processes. For example don't mix mouse navigation in with keystrokes in the same procedure unless it's really necessary. In general, pick your interaction style (menus, keystrokes etc) and stick with it throughout the document.
- Do not use contractions (don't, you're, etc)

## Writing for a global audience

## source software is global by definition. Keep in mind that people from all over the globe have access to it and its related documentation

 Some important recommendations:

- Avoid using names of people, addresses, and other sample information that are not common in the English language.

- Remember that currencies and formats to represent dates and numbers are not the same in every part of the world.

## Page Formatting and Markup

 There is a limited set of formatting elements in order to make it easy for editors and provide consistent formatting for readers. The following shows what formats are available for HTML and special formats for the MODX Documentation

### Permitted HTML Markup

 | Format Type    | Usage                                                                                                                                        | Example |
 | -------------- | -------------------------------------------------------------------------------------------------------------------------------------------- | ------- |
 | Normal Text    | This is the text format used for all paragraph text and inside tables.                                                                       |         |
 | Bold           | (TBD)                                                                                                                                        |         |
 | Italics        | (TBD)                                                                                                                                        |         |
 | Bulleted Lists | (TBD)                                                                                                                                        |         |
 | Numbered Lists | (TBD)                                                                                                                                        |         |
 | Indents        | Reserve indentation for use in creating nested or child lists. Paragraphs should not be                                                      |         |
 | Images         | (TBD)                                                                                                                                        |         |
 | Media          | (TBD)                                                                                                                                        |         |
 | Table          | (TBD)                                                                                                                                        |         |
 | Links          | (TBD)                                                                                                                                        |         |
 | Text-Alignment | Reserve text-alignment for table cells. It should not be used to center, right or jusitfy text. Paragraph and headings must be left-aligned. |         |
 | Links          | (TBD)                                                                                                                                        |         |

### Special Formats

 | Format Type | Usage                                                                                                                                                                            | Example |
 | ----------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------- |
 | PHP Code    | This is a special macro-format for wrapping code examples including PHP, HTML, CSS and Javascript. This will enable syntax highlighting and enhance the readibility of the page. |         |
 | Note        | (TBD)                                                                                                                                                                            |         |
 | Warning     | (TBD)                                                                                                                                                                            |         |
 | Danger      | (TBD)                                                                                                                                                                            |         |
 | Info        | (TBD)                                                                                                                                                                            |         |

 Other HTML elements such as divs, spans, blockquotes, address and etc. should not be used. This makes maintaining the documentations more difficult and can potentially create issues with layouts. Classes and IDs should not be used in markup. Special classes used when formatting in HTML are created by the Special Format macros listed above.

## Final checklist

 Before considering a document or change complete, it is a good idea to perform the following quick checklist:

- It is clear? Does the text follow well from paragraph to paragraph?
- It is concise? Does it have a clear communication style?
- It is coherent? Does the text jumps from topic to topic?
- It is grammatically correct? Have you spell checked the text? Have you asked a native speaker to proof-read your text
