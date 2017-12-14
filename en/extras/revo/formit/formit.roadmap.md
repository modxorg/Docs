---
title: "FormIt.Roadmap"
_old_id: "863"
_old_uri: "revo/formit/formit.roadmap"
---

This is a work-in-progress roadmap for FormIt.

Tasks in purple are already finished in Git. Ones in green are finished in beta/rc versions.

Future Versions
---------------

### FormIt 2.1/2.2

- Save form results to DB
- Iterative snippet to grab saved form results and display in table/graph format

### FormIt 3.0

- Multi-page form support

Released Versions
-----------------

### FormIt 2.0

- Complete refactoring of core processing into OOP classes to allow further extension
- Unit Testing framework to prevent regression
- File-based hooks
- Custom validator error messages per form/field
- Regexp validator

### FormIt 1.5.1

- Fixed issue where &store was not respecting values set in post-hooks
- Redirect hook now redirects **after** all other hooks execute

### FormIt 1.5.0

- Added redirectParams property, which allows a JSON object of params to be passed when using redirect hook
- Added spamCheckIp property, defaults to false, to check IP as well in spam hook
- Added sanity checks to form attachments when dealing with missing names
- Added recaptchaJS to allow for custom JS overriding of reCaptcha options var

### FormIt 1.4.1

- Added sanity check for emailHtml property on email hook
- Added sanity check for replyto/cc/bcc emails on email hook
- Added ability to change language via &language parameter

### FormIt 1.4.0

- Introduced &validate parameter for more secure validation parameters to prevent POST injection
- Added FormItIsChecked and FormItIsSelected custom output filters for easier checkbox/radio/select handling of selected values
- Added &placeholderPrefix for FormIt snippet, defaults to `fi.`

### FormIt 1.3.0

- Added FormItRetriever snippet to get data from a FormIt submission for thank you pages
- Added extra API methods for custom hooks for easier data grabbing
- Added FormItAutoResponder snippet to use as a custom hook for auto-responses
- Added &successMessage and &successMessagePlaceholder properties for easier success message handling

### FormIt 1.2.1

- Add recaptchaTheme property to allow theming of reCaptcha

### FormIt 1.2.0

- Added preHooks property to allow for custom snippets to pre-fill fields
- Added clearFieldsOnSuccess property to clear fields after a successful form submission without a redirect
- Added &customValidators property to secure forms against POST injections to run any snippet
- Added placeholder ability to any email property
- Added fiValidator::addError for easier error loading for custom validators
- Added German translation

### FormIt 1.1.3

- Fixed bug where custom validators were wonky, added 'errors' references to custom hooks/validators

### FormIt 1.1.2

- Added support for validation and emailing of file fields
- Added stripTags to all fields by default (unless 'allowTags' hook is passed') to prevent XSS

### FormIt 1.1.0

- Added reCaptcha support via the recaptcha hook

### FormIt 1.0.0

- Added 'spam' hook that utilizes StopForumSpam spam filter.
- Added fi.success placeholder to be set on a successful form submission if no redirect hook is specified
- Added default to emailTpl property so that it is now no longer required. Will send out email with just field names and values.
- Added SMTP support to FormIt email hook
- Added emailUseFieldForSubject property to FormIt snippet