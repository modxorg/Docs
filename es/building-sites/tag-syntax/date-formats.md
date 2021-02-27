---
title: "Formatos de fecha"
_old_id: "91"
_old_uri: "2.x/making-sites-with-modx/commonly-used-template-tags/date-formats"
---

MODX está escrito en PHP y, como tal, se basa en las funciones de fecha subyacentes de PHP, por ej. [strftime](http://www.php.net/manual/es/function.strftime.php). La discusión aquí puede volverse bastante complicada porque las funciones [strftime](http://www.php.net/manual/es/function.strftime.php) y [strtotime](https://www.php.net/manual/es/function.strtotime.php) utilizan argumentos _similares_, pero no son idénticos.

La discusión aquí se relaciona principalmente con los siguientes campos de contenido:

- `createdon` - fecha de creación;
- `deletedon` - fecha de borrado;
- `editedon` - fecha de la última edición;
- `publishedon` - la fecha en que ha sido publicado el recurso;
- `pub_date` - la fecha en la que el recurso debe aparecer publicado;
- `unpub_date` - fecha en la que el recurso deja de estar publicado.

## Marcas de tiempo de Unix y fechas formateadas

Dependiendo de la fuente y el método de obtención de un valor, puede recibir una **marca de tiempo UNIX** o una **fecha formateada**. Una marca de tiempo Unix se reconoce como un número entero grande (que representa el número de segundos desde el 1 de enero de 1970).

En MODX, el  [modificador de salida](building-sites/tag-syntax/output-filters) `date`, que se usa para formatear fechas usando la función`strftime()` de PHP, **espera una marca de tiempo Unix**. Para convertir una fecha formateada en una marca de tiempo Unix, tendrás que usar el modificador de salida `strtotime`.

Por tanto, si un valor, digamos `[[*createdon]]`, devuelve una fecha formateada, primero debes transformarlo en una marca de tiempo Unix con `[[*createdon:strtotime]]` antes de poder formatearlo con `date`. Pero, si un valor devuelve directamente una marca de tiempo Unix, puedes omitirlo.

## Ejemplos comunes

No es posible dar todos los ejemplos posibles, pero aquí hay algunas formas comunes de formatear fechas usando los filtros de salida de MODX.

| Ejemplo de salida           | Los parámetros del filtro                                           |
| ------------------------ | --------------------------------------------------------------- |
| vi. jul. 17, 2020         | ```[[*createdon:strtotime:date=`%a %b %d, %Y`]]```              |
| 17 julio 2020            | ```[[*createdon:strtotime:date=`%d %B %Y`]]```                  |
| viernes, julio 17, 2020   | ```[[*createdon:strtotime:date=`%A, %B %d, %Y`]]```             |
| 17-07-2020               | ```[[*createdon:strtotime:date=`%d-%m-%Y`]]```                  |
| Depende de la configuración | ```[[*createdon:strtotime:date=`[[++manager_date_format]]`]]``` |

## Todos los parámetros

El modificador de salida de fecha ejecuta internamente la [función PHP strftime](https://www.php.net/manual/es/function.strftime.php), por lo que toda la documentación sobre strftime también se aplica al modificador de salida `date`.

Para cambiar el idioma usado por el modificador de salida `date` (por ejemplo, para el nombre de días y meses), ajusta la [configuración de sistema](building-sites/settings) de MODX `locale` de manera apropiada.

| Código              | Muestra                                                      | Ejemplo                 |
| ----------------- | ------------------------------------------------------------ | ----------------------- |
| %a                | Nombre corto del día de la semana                                           | Dom                     |
| %A                | Nombre completo del día de la semana                                            | Domingo                  |
| %b                | Nombre corto del mes                                             | Ene                     |
| %B                | Nombre del mes completo                                              | Enero                 |
| %c                | Fecha y hora local                                          | Mie Ene 7 00:22:10 2010 |
| %C                | Siglo (el año dividido por 100, rango de 00 a 99)            | 20                      |
| %d                | Día del mes (01 a 31)                                  | 03                      |
| %D                | Igual que %m/%d/%y                                             | 04/29/10                |
| %e                | Día del mes (1 a 31)                                   | 3                       |
| %H                | Hora (Reloj de 24 horas)                                         | 00-23                   |
| %I                | Hora (reloj de 12 horas)                                         | 01-12                   |
| %l (L minúscula) | Hora en formato de 12 horas, con un espacio antes de números de un solo dígito | 1-12                    |
| %j                | Día del año                                              | 001 a 366              |
| %m                | Mes                                                        | 01 a 12                |
| %M                | Minuto                                                       | 00 a 59                |
| %n                | Carácter de nueva línea                                            | \\n                     |
| %P                | am o pm                                                     | am                      |
| %p                | AM o PM                                                     | AM                      |
| %r                | Igual que %I:%M:%S %p                                          | 08:23:11 PM             |
| %R                | Igual que %H:%M                                                | 23:11                   |
| %S                | Segundo                                                       | 00 a 59                |
| %t                | Caracter de Tabulación                                                | \\t                     |
| %T                | Igual que %H:%M:%S                                             | 26:12:27                |
| %u                | Día de la semana (Lunes=1)                                           | 01 a 07                |
| %w                | Día de la semana (Domingo=0)                                           | 00 a 06                |
| %x                | Solo fecha                                                    | 01/25/09                |
| %X                | Solo hora                                                    | 02:58:12                |
| %y                | Año, dos dígitos                                               | 09                      |
| %Y                | Año, cuatro dígitos                                              | 2010                    |
| %Z or %z          | Desplazamiento o nombre de zona horaria                                     | -005 o EST             |
| %%                | Un carácter % literal                                        | %                       |

### Nota sobre compatibilidad del servidor

No todos los servidores admiten todos los parámetros de formato, en particular en Windows, `%e` no es compatible y`%z` y `%Z` devuelven el nombre de la zona horaria en lugar del desplazamiento. En Mac, "%P" no es compatible.  

## Ver también

- [strftime() documentation en PHP.net](https://www.php.net/manual/es/function.strftime.php)
- [Modificadores de salida](building-sites/tag-syntax/output-filters)
- [Etiquetas de plantilla comunes](building-sites/tag-syntax/common)
- [Recursos](building-sites/resources)
- [Plantillas](building-sites/elements/templates)
- [Chunks](building-sites/elements/chunks)
