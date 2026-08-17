---
title: "Friendly URLs on IIS"
sortorder: "3"
---

Use this guide when you run MODX on Microsoft IIS and need Friendly URLs (FURLs). Apache uses `ht.access` / `.htaccess`. On IIS you use a `web.config` file with the [URL Rewrite](https://www.iis.net/downloads/microsoft/url-rewrite) module.

The community thread that prompted this page covers IIS 8 on Windows Server 2012 R2 and multi-language routing. The same baseline rules apply on later IIS versions.

## Requirements

1. Install the **IIS URL Rewrite** module on the server if it is missing. Without it, IIS ignores rewrite rules in `web.config`.
2. Place `web.config` in the **web root** next to `index.php` (same level as `assets/`, `manager/`, and `connectors/`). Do **not** put it under `core/`. Rules there never rewrite public page requests.
3. Confirm that the IIS site / application points at that web root.

## Sample `web.config`

Create `web.config` in the web root (or merge these rules into an existing file). The Friendly URLs rule mirrors the core of Revolution’s root `ht.access`: send unknown paths to `index.php?q=…`.

```xml
<?xml version="1.0" encoding="UTF-8"?>
<configuration>
  <system.webServer>
    <rewrite>
      <rules>
        <!-- Optional: block Apache-style internal dummy connections if you see them in logs -->
        <rule name="Block internal dummy connection" stopProcessing="true">
          <match url=".*" />
          <conditions>
            <add input="{HTTP_USER_AGENT}" pattern="internal dummy connection" />
          </conditions>
          <action type="CustomResponse" statusCode="403"
            statusReason="Forbidden" statusDescription="Forbidden" />
        </rule>

        <rule name="MODX Friendly URLs" stopProcessing="true">
          <match url="^(.*)$" />
          <conditions logicalGrouping="MatchAll">
            <add input="{REQUEST_FILENAME}" matchType="IsFile" negate="true" />
            <add input="{REQUEST_FILENAME}" matchType="IsDirectory" negate="true" />
          </conditions>
          <action type="Rewrite" url="index.php?q={R:1}" appendQueryString="true" />
        </rule>
      </rules>
    </rewrite>
  </system.webServer>
</configuration>
```

If MODX lives in a subdirectory (for example `/modx`), adjust the rewrite `url` so it still targets that folder’s `index.php`, or set the IIS application root to the MODX web root so the sample above works unchanged.

## Enable Friendly URLs in MODX

Turn on FURLs in the Manager **after** the rewrite rule works.

1. Open a non-file URL in the browser (for example `/about`) and confirm IIS rewrites it to MODX instead of returning a static 404.
2. In **System Settings**, set `friendly_urls` to Yes.
3. Clear the site cache.
4. In your template(s), set the base URL so CSS and JS keep loading, for example:

```html
<base href="[[!++site_url]]" />
```

If you enable `friendly_urls` before rewrite works, resource links look “pretty” while assets break. Fix rewrite first, then flip the setting.

## Multi-language sites

Extras such as Babel or XRouting need working FURLs first. After the baseline rule above works, add any extra IIS rewrite rules those extras document for language prefixes or domains. The community case for multi-language on IIS failed until URL Rewrite and a root `web.config` were in place.

## Related pages

- [Using Friendly URLs](getting-started/friendly-urls)
- [Advanced Installation](getting-started/installation/advanced)
- [Friendly URLs on nginx](getting-started/friendly-urls/nginx)
- [Friendly URLs on lighttpd](getting-started/friendly-urls/lighttpd)
