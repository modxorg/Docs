---
title: "Filtros/modificadores de salida"
_old_id: "164"
_old_uri: "2.x/making-sites-with-modx/customizing-content/input-and-output-filters-(output-modifiers)"
---

## ¿Qué son los filtros?

Los filtros en Revolution te permiten manipular la forma en que se presentan o analizan los datos en una etiqueta. Te permiten modificar valores directamente desde tus plantillas.

## Filtro de entrada

[Filtro de entrada](building-sites/tag-sintax/input-filter.md)

## Filtro de salida

En Revolution, el filtro de salida aplica una o más series de modificadores de salida; su sintaxis se ve así:

``` php
[[elemento:modificador=`valor`]]
```

También se pueden encadenar (ejecutados de izquierda a derecha):

``` php
[[elemento:modificador:otromodificador=`valor`:yotromodificador:yotromas=`valor2`]]
```

También puedes utilizarlos para modificar la salida de un Snippet; ten en cuenta que el modificador viene después del nombre del Snippet y antes del signo de interrogación, por ej.

``` php
[[miSnippet:modificador=`valor`? &miSnippetParam=`algo`]]
```

Si tienes un código más largo en una declaración :then=``:else=`` y deseas hacerlo más legible colocándolo en varias líneas, debes hacerlo así:

``` php
[[+placeholder:is=`0`:then=`
 // code
`:else=`
 // code
`]]
```

## Modificadores de salida

La siguiente tabla enumera algunos de los modificadores existentes y muestra ejemplos de su uso. Aunque los ejemplos siguientes son etiquetas de marcador de posición, los modificadores de salida se pueden usar con cualquier etiqueta de MODX. **Asegúrate de que el marcador de posición utilizado esté recibiendo datos.**

### Modificadores de salida condicionales

| Modificador                                                     | Descripción                                                                                                             | Ejemplo                                                                                                      |
| ------------------------------------------------------------ | ----------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------ |
| if, input                                                    | if, input                                                                                                               | -                                                                                                            |
| or                                                           | Se puede utilizar para encadenar modificadores de salida unidos con una relación "OR".                                              | ```[[+numlibros::is=`5`:or:is=`6`:then=`¡Hay 5 o 6 libros!`:else=`No sabemos cuantos libros hay`]]```           |
| and                                                          | Se puede utilizar para encadenar modificadores de salida unidos con una relación "AND".                                             |                                                                                                              |
| isequalto, isequal, equalto, equals, is, eq                  | Se compara con un valor pasado y continúa si coincide. Usado con "then" y "else"                                  | ```[[+numlibros::isequalto=`5`:then=`¡Hay 5 libros!`:else=`No sabemos cuantos libros hay`]]```                   |
| notequalto, notequals, isnt, isnot, neq, ne                  | Se compara con un valor pasado y continúa si no coincide. Usado con "then" y "else"                             | ```[[+numlibros:notequalto=`5`:then=`No sabemos cuantos libros hay`:else=`¡Hay 5 libros!`]]```                  |
| greaterthanorequalto, equalorgreaterthen, ge, eg, isgte, gte | Se compara con un valor pasado y continúa si es mayor o igual que el valor. Se usa con "then" y "else".      | ```[[+numlibros:gte=`5`:then=`Hay 5 libros o más`:else=`Hay menos 5 libros`]]``` |
| isgreaterthan, greaterthan, isgt, gt                         | Se compara con un valor pasado y continúa si es mayor que el valor. Se usa con "then" y "else".                  | ```[[+numlibros:gt=`5`:then=`Hay más de 5 libros`:else=`Hay menos de 5 libros`]]```             |
| equaltoorlessthan, lessthanorequalto, el, le, islte, lte     | Se compara con un valor pasado y sigue adelante si es menor o igual que el valor. Se usa con "then" y "else".         | ```[[+numlibros:lte=`5`:then=`Hay 5 o menos de 5 libros`:else=`Hay más de 5 libros`]]```       |
| islowerthan, islessthan, lowerthan, lessthan, islt, lt       | Se compara con un valor pasado y sigue adelante si es menos del valor. Se usa con "then" y "else".                     | ```[[+numlibros:lt=`5`:then=`Hay menos de 5 libros`:else=`Hay más de 5 libros`]]```             |
| contains                                                     | Comprueba si el valor contiene una cadena pasada.                                                                        | ```[[+author:contains=`Samuel Clemens`:then=`Mark Twain`]]```                                                |
| containsnot                                                  | Comprueba si el valor no contiene la cadena pasada.                                                           | ```[[+author:containsnot=`Samuel Clemens`:then=`Alguien más`]]```                                          |
| in, IN, inarray, inArray                                     | Comprueba si el valor está en un array(valores separados por comas)                                                              | ```[[+id:in=`5,15,22`:then=`Sí, está en el array`]]```                                                               |
| hide                                                         | Comprobará las condiciones anteriores y ocultará el elemento si se cumplieron las condiciones.                                         | ```[[+numlibros:lt=`1`:hide]]```                                                                              |
| show                                                         | Comprobará las condiciones anteriores y mostrará el elemento si se cumplieron las condiciones.                                         | ```[[+numlibros:gt=`0`:show]]```                                                                              |
| then                                                         | Uso condicional.                                                                                                      | ```[[+numlibros:gt=`0`:then=`¡Disponible ahora!`]]```                                                             |
| else                                                         | Uso de condicional, junto con then.                                                                                  | ```[[+numlibros:gt=`0`:then=`¡Disponible ahora!`:else=`Lo sentimos, actualmente agotado.`]]```                           |
| select                                                       | Genera un reemplazo, si el valor se encuentra en la lista de valores antes del signo igual. De lo contrario, el resultado está vacío. | ```[[+numlibros:select=`0=Value 0&1=Value 1&2=Value 2`]]```                                                   |
| memberof, ismember, mo                                       | Comprueba si el usuario es miembro de los grupos especificados.                                                               | ```[[+modx.user.id:memberof=`Administrator`]]```                                                             |

### Modificadores de salida de cadena

| Modificador                                 | Descripción                                                                                                                                                                                                                                                 | Ejemplo                                                |
| ---------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------ |
| cat                                      | Agrega el valor de la opción (si no está vacío) al valor de entrada                                                                                                                                                                                                | ```[[+numlibros:cat=`libros`]]```                        |
| after, append                            | Agrega el valor de las opciones al valor de entrada (si ambos no están vacíos) Añadido en 2.6.0.                                                                                                                                                                            | ```[[+totalnumber:after=`total`]]```                   |
| before, prepend                          | Antepone el valor de las opciones al valor de entrada (si ambos no están vacíos) Añadido en 2.6.0.                                                                                                                                                                          | ```[[+booknum:before=`book #`]]```                     |
| lcase, lowercase, strtolower             | Transforma cadenas a minúsculas. Similar a la función de PHP [strtolower](http://www.php.net/manual/es/function.strtolower.php)                                                                                                                                        | `[[+titulo:lcase]]`                                     |
| ucase, uppercase, strtoupper             | Transforma cadenas a mayúsculas. Similar a la función de PHP [strtoupper](http://www.php.net/manual/es/function.strtoupper.php)                                                                                                                                        | `[[+cabecera:ucase]]`                                  |
| ucwords                                  | Transforma la primera letra de una palabra en mayúscula. Similar a la función de PHP [ucwords](http://www.php.net/manual/es/function.ucwords.php)                                                                                                                           | `[[+titulo:ucwords]]`                                   |
| ucfirst                                  | Transforma la primera letra de la cadena en mayúsculas. Similar a [ucfirst](http://www.php.net/manual/es/function.ucfirst.php)                                                                                                                       | `[[+nombre:ucfirst]]`                                    |
| htmlent, htmlentities                    | Reemplaza cualquier carácter que tenga una entidad HTML con esa entidad. Similar a la función de PHP [htmlentities](http://www.php.net/manual/es/function.htmlentities.php). Utiliza el valor actual de la configuración del sistema `modx_charset` con el indicador `ENT_QUOTES`                   | `[[+email:htmlent]]`                                   |
| esc,escape                               | Evita de forma segura los valores de los caracteres utilizando expresiones regulares y str\ _replace.                                                                                                                                                                                               | También evita \[, \] y `[[+email:escape]]`            |
| strip                                    | Reemplaza todos los saltos de línea, tabulaciones y espacios múltiples con un solo espacio.                                                                                                                                                                                      | `[[+textodocumento:strip]]`                              |
| stripString                              | Elimina la cadena del valor especificado                                                                                                                                                                                                                            | ```[[+nombre:stripString=`Sr.`]]```                      |
| replace                                  | Reemplaza un valor por otro                                                                                                                                                                                                                             | ```[[+pagetitle:replace=`Mr.==Mrs.`]]```               |
| striptags, stripTags,notags,strip\_tags  | Elimina las etiquetas HTML de la entrada. Opcionalmente acepta un valor para indicar qué etiquetas permitir. Similar a la función de PHP  [strip\ _tags](http://www.php.net/manual/es/function.strip-tags.php)                                                                          | ```[[+code:strip_tags=`  `]]```                        |
| stripmodxtags                            | Elimina las etiquetas MODX de la entrada. (añadido en v2.7)                                                                                                                                                                                                           | ```[[+code:stripmodxtags]]```                          |
| len,length, strlen                       | Cuenta la longitud de la cadena pasada. Similar a [strlen](http://www.php.net/manual/es/function.strlen.php)                                                                                                                                         | `[[+longstring:strlen]]`                               |
| reverse, strrev                          | Invierte la entrada, carácter a carácter. Similar a [strrev](http://www.php.net/manual/es/function.strrev.php)                                                                                                                                     | `[[+textoespejo:reverse]]`                              |
| wordwrap                                 | Inserta un carácter de nueva línea después de la cantidad establecida de caracteres. Similar a [wordwrap](http://www.php.net/manual/es/function.wordwrap.php). Toma un valor opcional para establecer la posición del ajuste de palabras.                                                             | ```[[+bodytext:wordwrap=`80`]]```                      |
| wordwrapcut                              | Inserta un carácter de nueva línea después de la cantidad establecida de caracteres, independientemente de los límites de las palabras. Similar a [wordwrap](http://www.php.net/manual/es/function.wordwrap.php), con el corte de palabras habilitado. Toma un valor opcional para establecer la posición del ajuste de palabras. | ```[[+bodytext:wordwrapcut=`80`]]```                   |
| limit                                    | Limita una cadena a un cierto número de caracteres. El valor predeterminado es 100.                                                                                                                                                                                         | ```[[+description:limit=`50`]]```                      |
| ellipsis                                 | Agrega puntos suspensivos y trunca una cadena si tiene más de un cierto número de caracteres. Solo usa espacios como puntos de interrupción. El valor predeterminado es 100.                                                                                                            | ```[[+description:ellipsis=`50`]]```                   |
| tag                                      | Muestra el elemento sin formato sin la etiqueta. Útil para documentación.                                                                                                                                                                                       | `[[+showThis:tag]]`                                    |
| tvLabel                                  | Muestra la Etiqueta de una VdP (*variable de plantilla*). Útil cuando se usan selectores o casillas de verificación, etc. donde se usa `Etiqueta==1&#124;&#124;Otra etiqueta==2&#124;&#124;Más opciones==3`, con lo que si el valor fuese 2, esto devolvería Otra etiqueta.                                                                         | `[[+mySelectboxTv:tvLabel]]`                           |
| math                                     | Returns the result of an advanced calculation (expensive on processor. not recommended) Removed in Revolution 2.2.6.                                                                                                                                        | ```[[+blackjack:add=`21`]]```                          |
| add,increment,incr                       | Returns input incremented by option (default: +1)                                                                                                                                                                                                           | `[[+downloads:incr]]`                                  |
| subtract,decrement,decr                  | Returns input decremented by option (default: -1)                                                                                                                                                                                                           | `[[+countdown:decr]]` ```[[+moneys:subtract=`100`]]``` |
| multiply,mpy                             | Returns input multiplied by option (default: \*2)                                                                                                                                                                                                           | ```[[+trifecta:mpy=`3`]```                             |
| divide,div                               | Returns input divided by option (default: /2) Does not accept 0.                                                                                                                                                                                            | ```[[+rating:div=`4`]]```                              |
| modulus,mod                              | Returns the option modulus on input (default: %2, returns 0 or 1)                                                                                                                                                                                           | `[[+number:mod]]` or ```[[+number:mod=`3`]]```         |
| ifempty,default,empty, isempty           | Returns the input value if empty                                                                                                                                                                                                                            | ```[[+name:default=`anonymous`]]```                    |
| notempty, !empty, ifnotempty, isnotempty | Returns the input value if not empty                                                                                                                                                                                                                        | ```[[[[+name:notempty=`Hello `[[+name]]`!`]]```        |
| nl2br                                    | Converts a new line character (\\n) to an html element. Use this if you're taking in input, you think that there should be new lines in it, and there aren't. Similar to PHP's [nl2br](http://www.php.net/manual/en/function.nl2br.php).                                                                            | `[[+textfile:nl2br]]`                                  |
| date                                     | Formats a unix timestamp into a different format. Similar to PHP's [strftime](http://www.php.net/manual/en/function.strftime.php). Value is format. See [Date Formats](building-sites/tag-syntax/date-formats "Date Formats").                              | ```[[+birthyear:date=`%Y`]]```                         |
| strtotime                                | Converts a date string into a unix timestamp. Useful to combine this with the date output filter. Similar to PHP's [strtotime](http://www.php.net/strtotime). Takes in a date. See [Date Formats](building-sites/tag-syntax/date-formats "Date Formats").   | `[[+thetime:strtotime]]`                               |
| fuzzydate                                | Returns a pretty date format with yesterday and today being filtered. Takes in a date.                                                                                                                                                                      | `[[+createdon:fuzzydate]]`                             |
| ago                                      | Returns a pretty date format in seconds, minutes, weeks or months ago. Takes in a date (strtotime).                                                                                                                                                         | ```[[+createdon:date=`%d-%m-%Y`:ago]]```               |
| md5                                      | Creates an MD5 hash of the input string. Similar to PHP's [md5](http://www.php.net/manual/en/function.md5.php).                                                                                                                                             | `[[+password:md5]]`                                    |
| cdata                                    | Wraps the text with CDATA tags                                                                                                                                                                                                                              | `[[+content:cdata]]`                                   |
| userinfo                                 | Returns the requested user data. The element must be a modUser ID. The value field is the column to grab, e.g. fullname, email. See Examples below.                                                                                                         | ```[[+modx.user.id:userinfo=`username`]]```            |
| isloggedin                               | Returns true if user is authenticated in this context.                                                                                                                                                                                                      | `[[+modx.user.id:isloggedin]]`                         |
| isnotloggedin                            | Returns true if user is not authenticated in this context.                                                                                                                                                                                                  | `[[+modx.user.id:isnotloggedin]]`                      |
| toPlaceholder                            | Puts the input value into the passed placeholder. Does not prevent the output of the TV value, so add ```[[*someTV:toPlaceholder=`placeholder`:notempty=``]]``` if you don't want to output the value of the TV itself.                                     | ```[[*someTV:toPlaceholder=`placeholder`]]```          |
| cssToHead                                | Put a `<link>` element into <head>, where the input value is placed inside the href attribute. Uses [modX.regClientCSS](extending-modx/modx-class/reference/modx.regclientcss "modX.regClientCSS").                                                                                                                                                             | `[[+cssTV:cssToHead]]`                                 |
| htmlToHead                               | Insert a block of HTML code in the header of the page, before `</head>`. Uses  [modX.regClientStartupHTMLBlock](extending-modx/modx-class/reference/modx.regclientstartuphtmlblock "modX.regClientStartupHTMLBlock")                                                                                                                       | `[[+htmlTV:htmlToHead]]`                               |
| htmlToBottom                             | Insert HTML code at the end of the page, before `</body>`. Uses [modX.regClientHTMLBlock](extending-modx/modx-class/reference/modx.regclienthtmlblock "modX.regClientHTMLBlock").                                                                           | `[[+htmlTV:htmlToBottom]]`                             |
| jsToHead                                 | Insert JS code (or a link) in the header of the page, before `</head>`. Uses [modX.regClientStartupScript](extending-modx/modx-class/reference/modx.regclientstartupscript "modX.regClientStartupScript").                                                 | `[[+jsTV:jsToHead]]`                                   |
| jsToBottom                               | Insert JS code (or a link) at the end of the page, before `</body>`. Uses [modX.regClientScript](extending-modx/modx-class/reference/modx.regclientscript "modX.regClientScript").                                                                          | `[[+jsTV:jsToBottom]]`                                 |
| urlencode                                | Converts the input into a URL-friendly string similar to how an HTML form would do so. Similar to PHP's [urlencode](http://www.php.net/manual/en/function.urlencode.php)                                                                                    | `[[+mystring:urlencode]]`                              |
| urldecode                                | Converts the input from an URL-friendly string Similar to PHP's [urldecode](http://www.php.net/manual/en/function.urldecode.php)                                                                                                                            | `[[+myparam:urldecode]]`                               |
| filterPathSegment                        | Added in 2.7. Converts the input into a URL-friendly string with the same mechanism that turns a pagetitle into an alias, including transliteration if enabled. Useful for custom urls.                                                                     | `[[+pagetitle:filterPathSegment]]`                     |

### Caching

In general, any content in a placeholder that you think **might change dynamically** should be uncached. For example:

``` php
[[+placeholder:default=`A default value!`]]
```

This means that this could **sometimes** be empty, and sometimes not. Why would you ever want that cached? That would eliminate the point of the output modifier.

Sometimes, output modifiers can be used on a cached placeholder - but only if you're calling the Snippet that sets them cached as well. Otherwise, you're performing an illogical maneuver - trying to cache statically something that was never meant to be static.

In general, the rule is: If you set a placeholder in an uncached Snippet, the placeholder needs to be uncached as well if you expect the content of the placeholder to differ.

### Using an Output Modifier with Tag Properties

If you have properties on the tag, you'll want to specify those **after** the modifier:

``` php
[[!getResources:default=`Sorry - nothing matched your search.`?
    &tplFirst=`blogTpl`
    &parents=`2,3,4,8`
    &tvFilters=`blog_tags==%[[!tag:htmlent]]%`
    &includeTVs=`1`
]]
```

### Creating a Custom Output Modifier

Also, [Snippets](extending-modx/snippets "Snippets") can be used as custom modifiers. Simply put the [Snippet](extending-modx/snippets "Snippets") name instead of the modifier. Example with a snippet named 'makeExciting' that appends a variable amount of exclamation marks:

``` php
[[*pagetitle:makeExciting=`4`]]
```

This document variable call with an output modifier will pass these properties to the snippet:

| Param   | Value                             | Example Result                        |
| ------- | --------------------------------- | ------------------------------------- |
| input   | The element's value.              | The value of `[[*pagetitle]]`         |
| options | Any value passed to the modifier. | '4'                                   |
| token   | The type of the parent element.   | \* (the token on `pagetitle`)         |
| name    | The name of the parent element.   | pagetitle                             |
| tag     | The complete parent tag.          | ```[[*pagetitle:makeExciting=`4`]]``` |

Here is a sample implementation for our snippet makeExciting:

``` php
$defaultExcitementLevel = 1;
$result = $input;
if (isset($options)) {
    $numberOfExclamations = $options;
} else {
    $numberOfExclamations = $defaultExcitementLevel;
}
for ( $i = $numberOfExclamations; $i > 0; $i-- ) {
    $result = $result . '!';
}
return $result;
```

The return value of the call will be whatever the snippet returns. For our example, the result will be the value of the pagetitle document variable appended with four exclamation marks.

The original input value will be returned if the snippet returns an empty string.

## Chaining (Multiple Output Filters)

A good example of chaining would be to format a date string to another format, like so:

``` php
[[+mydate:strtotime:date=`%Y-%m-%d`]]
```

Directly accessing the `modx_user_attributes` table in the database using output modifiers instead of a [Snippet](extending-modx/snippets "Snippets") can be accomplished simply by utilizing the userinfo modifier. Select the appropriate column from the table and specify it as the property of the output modifier, like so:

``` php
User Internal Key: [[!+modx.user.id:userinfo=`internalKey`]]<br />
User name: [[!+modx.user.id:userinfo=`username`]]<br />
Full Name: [[!+modx.user.id:userinfo=`fullname`]]<br />
Role:  [[!+modx.user.id:userinfo=`role`]]<br />
E-mail: [[!+modx.user.id:userinfo=`email`]]<br />
Phone: [[!+modx.user.id:userinfo=`phone`]]<br />
Mobile Phone: [[!+modx.user.id:userinfo=`mobilephone`]]<br />
Fax: [[!+modx.user.id:userinfo=`fax`]]<br />
Date of birth: [[!+modx.user.id:userinfo=`dob`:date=`%Y-%m-%d`]]<br />
Gender: [[!+modx.user.id:userinfo=`gender`]]<br />
Country: [[+modx.user.id:userinfo=`country`]]<br />
State: [[+modx.user.id:userinfo=`state`]]<br />
Zip Code: [[+modx.user.id:userinfo=`zip`]]<br />
Photo: [[+modx.user.id:userinfo=`photo`]]<br />
Comment: [[+modx.user.id:userinfo=`comment`]]<br />
Password: [[+modx.user.id:userinfo=`password`]]<br />
Cache Password: [[+modx.user.id:userinfo=`cachepwd`]]<br />
Last Login: [[+modx.user.id:userinfo=`lastlogin`:date=`%Y-%m-%d`]]<br />
The Login:[[+modx.user.id:userinfo=`thislogin`:date=`%Y-%m-%d`]]<br />
Number of Logins: [[+modx.user.id:userinfo=`logincount`]]
```

`[[!+modx.user.id]]` defaults to the currently logged in user ID. You can of course replace that with `[[*createdby]]` or other resource field or placeholders that return a numeric ID representing a user.

Note that the user ID and username is already available by default in MODX, so you dont need to use the "userinfo" modifier:

``` php
[[!+modx.user.id]] - Prints the ID
[[!+modx.user.username]] - Prints the username
```

You will most likely want to call these uncached (see note about caching above) to prevent unexpected results.

## See Also

- [Properties and Property Sets](building-sites/properties-and-property-sets "Properties and Property Sets")
- [Templates](building-sites/elements/templates "Templates")
- [Template Variables](building-sites/elements/template-variables "Template Variables")
- [Snippets](extending-modx/snippets "Snippets")
