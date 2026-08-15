---
title: "FAQs & Troubleshooting"
sortorder: 2
_old_id: "1689"
_old_uri: "2.x/faqs-and-troubleshooting"
---

Common questions and quick fixes for MODX 3. For deeper troubleshooting, see the topic-specific pages below. If you still need help, ask in the [MODX Community](https://community.modx.com) or [Slack](https://modx.org).

## Related troubleshooting

- [Troubleshooting Installation](getting-started/installation/troubleshooting)
- [Troubleshooting Upgrades](getting-started/maintenance/upgrading/troubleshooting)
- [Troubleshooting Package Management](building-sites/extras/troubleshooting)
- [Troubleshooting Security](building-sites/client-proofing/security/troubleshooting-security)
- [CMP Development FAQs & Troubleshooting](extending-modx/custom-manager-pages/troubleshooting)

## 1. MODX 101

### 1.1. What is MODX?

**MODX** (also called **MODX Revolution**) is the actively developed CMS documented here. Current releases are **3.x**. See [An Overview of MODX](getting-started/what-is-modx) for concepts.

Older 1.x releases sit outside the scope of these docs.

If you are moving from **Revolution 2.x to 3.x**, start with [Upgrading from 2.x to 3.0](getting-started/upgrading-to-3.0).

### 1.2. What PHP / server version do I need?

See [Server Requirements](getting-started/server-requirements). Current MODX 3.x (**3.2 and later**) requires **PHP 8.1 or higher**. MODX 3.0 originally allowed PHP 7.2+; that floor was raised in 3.2.

### 1.3. What different tags can I use? What is `[[*pagetitle]]`, `[[Wayfinder]]`, etc.?

See [Tag Syntax](building-sites/tag-syntax). Resource fields you can use in tags are listed under [Resources](building-sites/resources).

## 2. The Manager

### 2.1. Help! Where did the sidebar / resource tree go?

You probably collapsed it. There is a small arrow on the left edge of the screen ([see this image](subtlearrow.PNG)). Click it to bring the tree back. Refresh the page if the tree stays empty after expanding.

### 2.2. How can I change which resource fields are visible when editing?

Use [Form Customization](building-sites/client-proofing/form-customization) to hide, rename, or rearrange fields on the Resource create/update screens (and to limit rules to certain user groups or templates).

### 2.3. What do modDocument / modWeblink / modSymLink / modStaticResource mean?

They are the class names for the built-in Resource types (in 3.x they live under the `MODX\Revolution\` namespace; short names are still commonly used). All appear in the Resource Tree:

- [Documents](building-sites/resources) (class `modDocument`): normal pages with content. People often say “Resource” when they mean a Document.
- [Weblinks](building-sites/resources/weblink): redirect to another Resource or an external URL
- [Symlinks](building-sites/resources/symlink): reuse another Document’s content at a different URL
- [Static Resources](building-sites/resources/static-resource): content comes from a file on the filesystem

### 2.4. What is the difference between a Resource and a Document?

Technically, a Resource (`modResource`) is the abstract base; a Document (`modDocument`) is the usual HTML page implementation. In everyday use, “Resource” often means “that page in the tree,” which might be a Document, Weblink, Symlink, or Static Resource.

### 2.5. I'm locked out of the manager / forgot my password

See [Resetting a User Password Manually](building-sites/client-proofing/security/troubleshooting-security/resetting-a-user-password-manually).

### 2.6. I get a 500 Internal Server Error in the manager

Try these first:

1. Clear or rename `core/cache/` (a corrupt cache is a frequent cause).
2. Open the manager in a private/incognito window (rules out bad cookies/sessions).
3. Confirm PHP meets [Server Requirements](getting-started/server-requirements) for your MODX version.
4. Check `core/cache/logs/error.log` for the real PHP error.

More install-time cases are covered in [Troubleshooting Installation](getting-started/installation/troubleshooting).

### 2.7. The manager is blank / shows “undefined” / broken layout

Often caused by failed JS/CSS loading or a bad cache. Clear `core/cache/`, hard-refresh the browser, and see the community checklist: [Blank manager with undefined message](https://community.modx.com/t/blank-manager-with-undefined-message/3799/20). Also review [Troubleshooting Installation](getting-started/installation/troubleshooting) (including disabling `compress_js` / `compress_css` if asset URLs are failing).

## 3. Frontend and cache issues

### 3.1. Blank frontend pages that work again after clearing the cache

On some hosts (notably certain cloud/shared setups), file locking when writing cache files can leave you with blank pages or 500s after saving until you wipe `core/cache/`.

In `core/config/config.inc.php`, disable flock by adding `use_flock` to `$config_options` and setting it to `false`:

``` php
$config_options = array(
    'use_flock' => false,
);
```

(Merge with any existing `$config_options` entries rather than replacing them.)

### 3.2. A Snippet or Plugin does nothing

Confirm it is actually installed and enabled (Extras → Installer / the Elements tree), that the tag name matches, and that you cleared the cache after installing or editing it. Cached pages will keep serving old output until cleared.

## 4. Upgrading

### 4.1. How do I upgrade within 3.x, or from 2.x to 3.x?

Follow [Upgrading MODX](getting-started/maintenance/upgrading). For any move from 2.x to 3.x, also read [Upgrading from 2.x to 3.0](getting-started/upgrading-to-3.0) before you start: class namespaces, processors, the core path, and PHP requirements all change. Remember that **3.2+ needs PHP 8.1+**.
