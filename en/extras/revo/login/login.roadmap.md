---
title: "Login.Roadmap"
_old_id: "912"
_old_uri: "revo/login/login.roadmap"
---

This is a work-in-progress roadmap for Login.

Tasks in purple are already finished in Git. Ones in green are finished in beta/rc versions.

Future Versions
---------------

- None yet.

Released Versions
-----------------

### Login 1.2.0

- Add &excludeExtended property for not using specific POST vars when &useExtended is set to 1 in Register, UpdateProfile snippets
- Added new hook API methods for easier setting/retrieving of fields
- Added experimental multiple-context login support
- Fixed bug in login snippet with hard-coded action keys
- Added support to set subject in ForgotPassword email
- Added reCaptcha support to login form via a preHook
- Added preHooks and postHooks ability to Login snippet
- i18n of Snippet properties

### Login 1.1.0

- Added preHooks and postHooks to Register and UpdateProfile snippets
- Added Profile snippet for displaying Profile information
- Added syncUsername field to UpdateProfile

### Login 1.0.2

- Ensure username,password and email are always passed to register snippet to prevent blank logins

### Login 1.0.1

- Add UpdateProfile snippet to enable updating of profile from front-end

### Login 1.0.0

- Reset Password snippet
- Forgot Password snippet
- Login activation by email
- Login snippet
- Initial public release