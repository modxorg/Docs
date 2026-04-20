---
title: "session_cookie_domain"
description: "Session Cookie Domain setting"

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

This setting isn't in MODX by default, as it's best to let PHP calculate this on its own. Only set this if you are sure of what you are doing.

### Important note for IDN (internationalized) domains

When using the `session_cookie_domain` setting with internationalized domain names (IDN), such as domains containing umlauts (e.g. `müller-example.de`), session handling may fail depending on the server and PHP configuration.

HTTP cookies (including session cookies) are based on ASCII-compatible domain names. In practice, this means that IDN domains are typically represented in **punycode (A-label)** form when used at the protocol level.

Example:
- Unicode: `müller-example.de`
- Punycode: `xn--mller-example-9db.de`

In testing, the following behavior was observed:
- ASCII domain - works as expected
- Unicode IDN domain in `session_cookie_domain` - may break sessions
- Empty `session_cookie_domain` - works reliably

**Recommendations:**
- Avoid setting `session_cookie_domain` unless explicitly required, leave it empty to let PHP handle it automatically
- If using IDN domains, prefer the punycode (ASCII) representation

Note: Behavior may vary depending on PHP version, browser, and server configuration.
