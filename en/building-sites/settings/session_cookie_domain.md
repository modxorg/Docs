---
title: "session_cookie_domain"
_old_id: "276"
_old_uri: "2.x/administering-your-site/settings/system-settings/session_cookie_domain"
---

## session\_cookie\_domain

**Name**: Session Cookie Domain
**Type**: String
**Default**: localhost

Use this setting to customize the session cookie domain.

You will need to clear your local cookies in your browser after changing this setting.

This setting is useful to change if you are running multiple Contexts on one top-level domain, but want to share logins across them. For example, changing the setting to:

> .mydomain.com

will allow all MODX sessions to persist across any \*.mydomain.com site, allowing logins to work across subdomains.

This setting isn't in MODx by default, as it's best to let PHP calculate this on its own. Only set this if you are sure of what you are doing.
