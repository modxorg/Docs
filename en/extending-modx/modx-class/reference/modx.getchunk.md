---
title: "modX.getChunk"
description: "Processes and returns the output from an HTML chunk by name."
_old_id: "1062"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.getchunk"
---

## modX::getChunk

Processes and returns the output from an HTML chunk by name.

**getChunk** turns the properties you pass into placeholders and lets the modChunk class `process()` them together with the chunk's own tags and filters. The properties come from the call, from default properties and from a property set. Placeholders that already exist under the same key are kept and restored after processing.

The MODX parser runs, so output filters and nested `$properties` arrays work. For plain placeholder substitution, `str_replace` is enough. [modX.parseChunk](extending-modx/modx-class/reference/modx.parsechunk "modX.parseChunk") is deprecated since 3.0 and will be removed in MODX 4.0.


## Syntax

``` php
string getChunk (string $chunkName, [array $properties = array ()])
```

A usual `$properties` array is a flat key/value list:

``` php
$properties = array('key' => 'value');
```

The values replace the `[[+key]]` placeholders.

`$properties` may also be nested, for example as returned by `getObject` or `getCollection`:

``` php
$properties = array(
    'user' => array('id' => 1),
    'document' => array('id' => 27)
);
// or:
$properties['user']['id'] = 1;
$properties['document']['id'] = 27;

// Corresponds to the following placeholders:
// [[+user.id]]
// [[+document.id]]
```

Each level of a nested array adds a dot to the placeholder name: `[[+user.id]]`, `[[+document.id]]`.

## Examples

### Simple Example

Chunk "WelcomeChunk":

``` php
<p>Welcome [[+name]]!</p>
```

Call from a Snippet:

``` php
$output = $modx->getChunk('WelcomeChunk',array(
   'name' => 'John',
));
return $output;
```

Output:

``` php
<p>Welcome John!</p>
```

### Nested $properties

Chunk "UserLink":

``` php
<a href="http://site.com/profile?user_id=[[+user.id]]">User Details</a>
```

Call from a Snippet:

``` php
$output = $modx->getChunk('UserLink',array(
   'user' => array('id' => 123)
));
return $output;
```

### Used in a Snippet

Snippets often use a Chunk as a format string; xPDO's [toArray()](extending-modx/xpdo/class-reference/xpdoobject/field-accessors/toarray "toArray") method supplies the properties.

Chunk **single\_user**:

``` php
Username: [[+username]]<br/>
Active?:  [[+active]]<br/>
<hr/>
```

In your Snippet:

``` php
$userlist = $modx->getCollection(modUser::class);

$output = '';
foreach ($userlist as $user) {
    $output .= $modx->getChunk('single_user', $user->toArray() );
}

return $output;
```

### Parsing a String

To parse a plain string with the MODX parser, create a temporary Chunk object and run `process()` on it. The parser is slower than `str_replace`, but it resolves output filters and complex placeholders such as nested Chunks.

``` php
// The formatting String
$tpl = 'Hello, my name is [[+name]]';

// Properties
$props = array('name' => 'Bob');

// Create the temporary chunk
$uniqid = uniqid();
$chunk = $modx->newObject(modChunk::class, ['name' => "{tmp}-{$uniqid}"]);
$chunk->setCacheable(false);

$output = $chunk->process($props, $tpl);
```

## See Also

- [Chunks](building-sites/elements/chunks "Chunks")
- [modX.parseChunk](extending-modx/modx-class/reference/modx.parsechunk "modX.parseChunk")
