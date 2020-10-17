---
title: "Sintaxis de Etiquetas"
sortorder: "1"
_old_id: "302"
_old_uri: "2.x/making-sites-with-modx/tag-syntax"
---

## Variantes de etiquetas de MODX

MODX proporciona una útil variedad de etiquetas diferenciadas por un token, o un conjunto de tokens, que aparecen antes de una cadena. La siguiente tabla identifica estos tokens y dónde y cómo es probable que se utilicen.

| Tipo                                                            | Token | Ejemplo             | Uso                                                                                                |
| --------------------------------------------------------------- | ----- | ------------------- | ---------------------------------------------------------------------------------------------------- |
| Comentario                                                         | `-`   | `[[- Comentario ]]`    | Define un comentario que no se procesara.<br>*ej:* `[[- Esto es un comentario]]`                                     |
| [Campo de recurso](building-sites/tag-syntax/common)              | `*`   | `[[*nombreDeCampo]]`    | Muestra el valor de un campo relacionado con el recurso actual.<br>*ej:* `[[*pagetitle]]`              |
| [Variable de Plantilla](building-sites/elements/template-variables) | `*`   | `[[*NombreVdP]]`       | Muestra el valor de una variable de plantilla.<br>*ej:* `[[*etiquetas]]`                                        |
| [Chunk](building-sites/elements/chunks)                         | `$`   | `[[$NombreDeChunk]]`    | Muestra la salida de un chunk una vez procesado.<br>*ej:* `[[$cabecera]]`                                |
| [Snippet](building-sites/elements/snippets)                     |       | `[[nombreDelSnippet]]`   | Define un snippet de código PHP que se ejecutará.<br>*ej:* `[[getResources]]`                            |
| Marcador de posición                                                     | `+`   | `[[+placeholder]]`  | Define un marcador de posición para los valores devuetos por una consulta.<br>*ej:* `[[+pagetitle]]`             |
| Enlace                                                            | `~`   | `[[~enlace]]`         | Devuelve un enlace derivado de un valor.<br>*ej:* `[[~1? &scheme=full]]`                                 |
| [Configuración](building-sites/settings)                              | `++`  | `[[++nombreDeConfiguracion]]` | Define un marcador de posición específicamente para los valores definidos en la configuración del sistema.<br>*ej:* `[[++site_name]]` |
| [Idioma](extending-modx/internationalization)                 | `%`   | `[[%idioma]]`     | *ej:* `[[%cadena? &language=en &namespace=generic &topic=topic]]`                                    |

## Deconstrucción de una etiqueta de MODX

Una etiqueta MODX se puede ampliar con indicadores y propiedades opcionales. La siguiente tabla deconstruye una etiqueta MODX en su totalidad e ilustra cómo y dónde se podrían usar estos indicadores y propiedades opcionales.

| Tipo                      | Uso                                                                                                                                                                            |
| ------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `[[`                      | Define la apertura de una etiqueta de MODX.                                                                                                                                               |
| `!`                       | *Opcional* indicador de no almacenamiento en caché                                                                                                                                               |
| `Token`                   | *Opcional* Define el tipo de elemento.<br>`$` = Chunk,<br>`*` = Campo de recurso / Variable de Plantilla,<br>`+` = Marcador de posición *Leer arriba para más variantes*                                 |
| `Nombre`                    | Valor del nombre del elemento solicitado.                                                                                                                                                 |
| `@conjuntoPropiedades`            | Define un [conjunto de propiedades](building-sites/properties-and-property-sets) a usar.                                                                                                |
| ``` :modificador=`valor` ``` | Define un filtro o modificador de salida que se utilizará.<br>*ej:*```:gt=`0`:then=`¡Disponible!` ```                                                                                    |
| `?`                       | Indica a MODX el comienzo de una lista de propiedades pasadas a esta llamada.<br>*Required if properties present*                                                                                       |
| ``` &propiedad=`valor` ``` | Define una [propiedad](building-sites/properties-and-property-sets) y el valor de la misma para ser usado en la llamada. Cada propiedad se separa con el símbolo `&`.<br>*ej:* ``` &prop1=`1` &prop2=`2` ``` |
| `]]`                      | Define el cierre de una etiqueta de MODX.                                                                                                                                               |

## Construcción de una etiqueta de MODX

Utilizando y combinando toda la información anterior, podríamos crear una etiqueta MODX compleja que se vería así:

```php
[[!MiSnippet@miPropSet:filtro1:filtro2=`modificador`? &prop1=`x` &prop2=`y`]]
```

Sin embargo, aunque MODX permite el uso de filtros condicionales complejos, los usuarios deben tener cuidado al construir una lógica de etiquetas complicada. A diferencia de PHP, cuando tienes una sintaxis de etiqueta MODX no válida, no hay mensajes útiles con números de línea que indiquen la ubicación de un error.

Tener etiquetas que requieran depuración anula el propósito de tener una capa de vista limpia. Mantenlas limpias y simples.

Una buena regla general es que tus etiquetas deben caber en una línea, incluso si las haces en varias líneas para que sean legibles. Si dependes de declaraciones if u otros condicionales en tus etiquetas MODX, entonces puede que necesites reconsiderar la lógica de flujo.

**Nota** MODX es ambiguo con los espacios en blanco, lo que significa que los dos ejemplos siguientes serían aceptables:

```php
[[!getResources? &parents=`123` &limit=`5`]]

[[!getResources?
  &parents=`123`
  &limit=`5`
]]
```

## Propiedades

Todas las etiquetas de MODX pueden aceptar [propiedades](building-sites/properties-and-property-sets), no solo los Snippets.

En el siguiente ejemplo, tenemos un chunk simple llamado 'Hola'.

``` php
Hola [[+nombre]]!
```

Dentro de este chunk tenemos la configuración del marcador de posición `[[+nombre]]` para un valor a ser procesado. Podemos pasar este valor directamente a nuestro chunk con el siguiente código:

``` php
[[$Hola? &nombre=`Jorge`]]
```

Esta llamada produciría la siguiente salida:

``` php
Hola Jorge!
```

## Almacenamiento en caché

Cualquier etiqueta se puede llamar no almacenada en caché insertando un signo de exclamación inmediatamente después del doble corchete de apertura:

`[[!snippet]]`, `[[!$chunk]]`, `[[!+marcador_posicion]]`, `[[!*variable_plantilla]]`, etc.

Si tienes algún tipo de configuración avanzada en la que la configuración site_url se establece por solicitud, pero tus enlaces `[[~[[* id]]]]` no se generan correctamente, recuerda que cualquier etiqueta se puede llamar no almacenada en caché, incluida la etiqueta de enlace o anclaje: `[[! ~ [[* id]]]]`

Sin embargo, solo lo necesitarás cuando el site\ _url se establezca dinámicamente, puedaa diferir por solicitud y estés generando URLs completas en lugar de relativas. Cualquier uso normal se puede almacenar en caché.

### Orden de proceso

Si llamas a un Snippet no almacenado en caché, se ejecutará después de que se hayan procesado todas las etiquetas almacenadas en caché.

Si has almacenado marcadores de posición en caché despues de eso, se evaluarán antes de que se ejecute el snippet, lo que significa que obtendrán el último valor que ese fragmento almacenó en la caché anteriormente (o vacío, si aún no se ha configurado).

Si desea llamar a un fragmento no almacenado en caché que establece marcadores de posición, debes asegurarte de que los marcadores de posición también estén configurados como no almacenados en caché:

``` php
[[!Profile]]
Hola [[!+username]],
```

## Cronometraje

Hay varias etiquetas para el cronometraje en MODX:

- **\[^qt^\]** - Tiempo de consulta -Muestra cuánto tiempo tardó MODX en comunicarse con la base de datos.
- **\[^q^\]** - Recuento de consultas: -Muestra cuántas consultas a la base de datos hizo MODX
- **\[^p^\]** - Tiempo de análisis: -Muestra cuánto tiempo tardó MODX en analizar la página.
- **\[^t^\]** - Tiempo Total - Muestra el tiempo total necesario para analizar y representar la página.
- **\[^s^\]** - Fuente - Muestra la fuente de la página, ya sea la base de datos o la caché
- **\[^m^\]** - Uso de Memoria - Muestra la memoria total utilizada para analizar y representar la página

### Ayuda adicional

Debido a que la sintaxis de las etiqueta es problemática para muchos recién llegados, existen herramientas disponibles para ayudar a resaltar los problemas. Consulta el plugin [SyntaxChecker](http://modx.com/extras/package/syntaxchecker).
