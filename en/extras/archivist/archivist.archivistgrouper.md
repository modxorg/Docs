---
title: "ArchivistGrouper"
_old_id: "778"
_old_uri: "revo/archivist/archivist.archivistgrouper"
---

ArchivistGrouper is a snippet in the [Archivist](extras/archivist) Extra. It lists Resources under one or more parents, grouped by month or year, with nested item links inside each group. Pair the group links with [getArchives](extras/archivist/archivist.getarchives) on a target Resource so filtered archive pages work.

Articles ships Archivist and uses this snippet for nested archive navigation. You can call it on any site that has the Archivist package installed.

## Usage

Place the snippet where you want the grouped archive list. Point `parents` at the blog or article containers, and `target` at the Resource that runs getArchives.

``` php
[[!ArchivistGrouper? &parents=`12` &target=`123`]]
```

Group by year instead of month:

``` php
[[!ArchivistGrouper? &parents=`12` &target=`123` &mode=`year`]]
```

## Available Properties

Defaults below match the snippet source. Empty Default means the snippet falls back as described.

| Name | Description | Default |
| ---- | ----------- | ------- |
| mode | Group Resources by `month` or `year`. | `month` |
| itemTpl | Chunk for each Resource inside a group. | `itemBrief` |
| groupTpl | Chunk for each month or year group. If empty, uses `monthContainer` when `mode` is `month`, or `yearContainer` when `mode` is `year`. | _(auto)_ |
| parents | Comma-delimited list of parent Resource IDs. If empty, uses the current Resource. Children of those parents are included down to `depth`. | current Resource |
| target | Resource ID that should handle archive filter links (usually the page with getArchives). If empty, uses the current Resource. | current Resource |
| depth | How deep to walk from each parent when collecting Resources. | `10` |
| where | Optional JSON object of extra xPDO `where` conditions, merged into the query. | |
| hideContainers | If true, skip Resources with `isfolder` set (containers). | `true` |
| sortBy | Date field used to sort and group (for example `publishedon` or `createdon`). Use a date field only. | `publishedon` |
| sortDir | Sort direction: `ASC` or `DESC`. | `DESC` |
| dateFormat | Optional PHP [`strftime`](https://www.php.net/manual/en/function.strftime.php) format for the `[[+date]]` placeholder on each item. If blank, `[[+date]]` stays empty; other date placeholders still fill. | |
| limitGroups | Maximum number of month or year groups to output. | `12` |
| limitItems | Maximum items rendered inside each group. `0` means no per-group limit. | `0` |
| resourceSeparator | String inserted between item chunks inside `[[+resources]]`. | newline |
| filterPrefix | Prefix for year/month GET (or FURL path) parameters. Use the same value on getArchives. | `arc_` |
| useFurls | If true, build pretty path-style filter URLs. If false, use query-string parameters. | `true` |
| persistGetParams | If true, merge the current page’s GET parameters into archive links. Usually leave this off. | `false` |
| extraParams | Optional query string fragment appended to each group URL. | |
| cls | CSS class on each item row. | `arc-resource-row` |
| altCls | Extra CSS class on alternate item rows. | `arc-resource-row-alt` |
| setLocale | If true, call `setlocale` so month and weekday names follow the locale. | `true` |
| locale | Locale passed to `setlocale` when `setLocale` is true. If empty, uses the site `cultureKey`. | `cultureKey` |
| toPlaceholder | If set, store the snippet output in this placeholder and return nothing. | |

The snippet also reads a property named `monthSeparator`, but current source joins groups with a hardcoded newline and never applies that property. Prefer `resourceSeparator` for item spacing inside a group.

## Chunks

### groupTpl (`monthContainer` / `yearContainer`)

Default month wrapper:

``` html
<li><a href="[[+url]]">[[+month_name]] [[+year]]</a>
<ul>
[[+resources]]
</ul>
</li>
```

Default year wrapper:

``` html
<li><a href="[[+url]]">[[+year]]</a>
<ul>
[[+resources]]
</ul>
</li>
```

`[[+resources]]` holds the rendered `itemTpl` chunks for that group. Group placeholders include `url`, `month_name`, `month`, `year`, `year_two_digit`, `day`, `weekday`, `weekday_abbr`, `weekday_idx`, `resources`, and `idx`.

### itemTpl (`itemBrief`)

Default item chunk:

``` html
<li><a href="[[~[[+id]]]]">[[+pagetitle]]</a></li>
```

Each item gets the Resource fields plus date helpers (`date`, `month_name`, `month`, `year`, and related), `cls`, `idx`, and `altCls` when the row is odd-numbered.

## See Also

- [Archivist](extras/archivist)
- [Archivist snippet](extras/archivist/archivist)
- [getArchives](extras/archivist/archivist.getarchives)
