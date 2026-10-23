---
title: "Contextos"
description: "Contextos en MODX: cómo anulan los ajustes del sistema, cómo crear uno y cómo se concede el acceso."
translation: "building-sites/contexts"
---

Un contexto es un conjunto con nombre de anulaciones de configuración. La petición se ejecuta bajo ese conjunto, con sus propios ajustes, su propia rama del árbol de recursos y sus propias reglas de acceso.

MODX incluye dos contextos: `web` (Website) para la parte pública y `mgr` (Manager) para el gestor. La **clave** es el valor que se pasa a `initialize()` y a `switchContext()`. El **nombre** es una etiqueta de la interfaz.

## Crear un contexto

Abra **Administrador** (el engranaje del menú superior) → **Contextos**. **Crear** abre un formulario:

| Campo | Obligatorio | Significado |
| --- | --- | --- |
| **Clave del Contexto** | sí | el identificador del contexto |
| **Nombre** | sí | la etiqueta del gestor y del árbol de recursos |
| **Descripción** | no | texto libre |
| **Posición** | no | el orden del contexto en el árbol |

Las claves `mgr`, `web` y `root` están reservadas. La clave empieza por una letra. Después admite letras, dígitos, un guion, un punto y una barra. El guion bajo se rechaza, así que `domain_2` no se guarda.

Un contexto nuevo recibe acceso de inmediato:

- el grupo de usuarios **Administrator** recibe la política *Context*
- el usuario anónimo recibe la política *Load Only*: el derecho `load` y nada más

La entrada del anónimo aparece como **(anónimo)** en la pestaña **Permisos de Acceso** del contexto. Quítela para retirar ese acceso.

Cada contexto es una rama propia en el árbol de recursos. Arrastre un recurso a otro contexto.

**Duplicar** copia los ajustes, las reglas de acceso y las fuentes de medios. En esa ventana la casilla **Duplicar recursos** viene marcada y copia los recursos. Desmárquela para dejar los recursos donde están.

## Ajustes de contexto

Un ajuste de contexto anula el [ajuste del sistema](building-sites/settings) del mismo nombre. Un ajuste del grupo de usuarios anula el ajuste del contexto. Un ajuste de usuario anula el ajuste del grupo.

```
Ajuste del sistema → Ajuste del contexto → Ajuste del grupo de usuarios → Ajuste del usuario
```

Edite un ajuste en la pestaña **Configuraciones del Contexto**: **Contextos** → clic derecho en un contexto → **Editar**. Cambiar un ajuste borra la caché de ese contexto. No hace falta limpiar la caché a mano.

Ajustes que un contexto suele anular:

| Ajuste | Qué cambia |
| --- | --- |
| `base_url` | la ruta en las URL del contexto |
| `http_host` | el host para el que se construyen las URL |
| `site_url` | la URL completa del contexto: esquema, host y ruta |
| `site_start` | el recurso que abre el contexto |
| `cultureKey`, `locale` | el idioma y la configuración regional de la petición |

Estos ajustes configuran la cookie de sesión del contexto. Conservan los valores del núcleo salvo que el contexto los anule:

| Ajuste | Valor por defecto |
| --- | --- |
| `session_name` | vacío: PHP conserva el suyo |
| `session_cookie_path` | `MODX_BASE_URL`, o el ajuste `base_url` cuando está definido |
| `session_cookie_domain` | vacío |
| `session_cookie_secure` | `false` |
| `session_cookie_httponly` | `true` |
| `session_cookie_samesite` | vacío |
| `session_cookie_lifetime` | `604800` (7 días). Un contexto puede guardar `0`, y entonces la cookie dura hasta cerrar el navegador |

## Acceso al contexto

El acceso se concede por grupo de usuarios. Abra el icono del candado en el menú de usuario → **Listas de Control de Acceso** → un grupo de usuarios → **Permisos de Acceso** → **Contextos**.

El panel de acceso del grupo de usuarios tiene cinco pestañas: **Contextos**, **Grupos de Recursos**, **Categorías de Elementos**, **Media Sources** y **Namespaces**. La política no elige la pestaña. La plantilla de la política tiene que pertenecer al mismo grupo que la pestaña.

## Leer los ajustes de contexto

Lea el ajuste del contexto actual como cualquier otro ajuste. La llamada no muestra de qué nivel sale el valor:

``` php
[[++my_context_setting]]
```

``` php
$setting = $modx->getOption('my_context_setting');
```

Para un contexto concreto:

``` php
$setting = $modx->context->getOption('my_context_setting');
$setting = $modx->getContext('web')->getOption('my_context_setting');
```

El idioma de una petición se toma de la primera fuente que tenga valor:

1. el parámetro `cultureKey` de la petición
2. el `cultureKey` de la sesión
3. el ajuste de usuario `cultureKey`
4. el `cultureKey` del contexto
5. el ajuste del sistema `cultureKey`

Si todas las fuentes están vacías o el valor no pasa el filtro de caracteres, el idioma es `en`. Se admiten `A-Z`, `a-z`, `0-9`, `_` y `-`. En el gestor, después de eso se usa `manager_language`.

## Elegir un contexto durante la petición

Una petición empieza en el contexto que elige la puerta de entrada.

- `config.context.php`, junto a `index.php`, devuelve la clave del contexto donde empieza la petición. Ver [Servir un segundo dominio](building-sites/contexts/virtual-host).
- Un Plugin en `OnHandleRequest` llama a `switchContext()`. Ver [Uso de un Plugin de puerta](building-sites/contexts/gateway-plugin).

``` php
if ($modx->switchContext('domain2')) {
    // la petición continúa en el contexto "domain2"
}
```

`switchContext($contextKey, $reload = false)` devuelve `false` cuando el contexto no se cargó y cuando la clave ya es la actual. En el segundo caso el contexto no se vuelve a cargar. Compruebe el resultado. En una petición que ya está en `domain2`, el ejemplo toma la rama de fallo.

Cambiar el contexto durante la petición no carga un manejador de sesión propio. Tampoco cambia el idioma, la configuración regional ni la cookie de sesión. Esos valores salen del contexto con el que arrancó `index.php`. Un dominio con idioma o cookie propios usa un directorio propio con `config.context.php`. Ver [Servir un segundo dominio](building-sites/contexts/virtual-host).

## Eventos

| Evento | Cuándo se dispara |
| --- | --- |
| `OnContextInit` | se carga un contexto. Un `switchContext()` correcto hacia otro contexto lo carga. La llamada para el contexto que ya es el actual no lo carga |
| `OnContextBeforeSave` | antes de guardar un contexto |
| `OnContextSave` | después de guardar un contexto |
| `OnContextBeforeRemove` | antes de eliminar un contexto |
| `OnContextRemove` | después de eliminar un contexto |
| `OnContextFormPrerender` | antes de mostrar el formulario del contexto |
| `OnContextFormRender` | después de mostrar el formulario del contexto |

Los eventos de MODX 2 que se citan a menudo en material antiguo no existen en MODX 3: `OnContextSwitch`, `OnSiteInit`, `OnSiteRender`, `OnManagerInit` y `OnBeforeRequest`.

## Ajustes del sistema

| Ajuste | Valor por defecto | Qué hace |
| --- | --- | --- |
| `default_context` | `web` | el contexto del formulario de creación, salvo cuando el recurso se crea dentro de la rama de otro contexto. La rama del árbol fija el suyo |
| `access_context_enabled` | `true` | comprueba el acceso a un contexto en cada petición; desactivarlo ignora todas las reglas de acceso a contextos |
| `allow_forward_across_contexts` | `false` | permite que un enlace simbólico y `sendForward()` lleguen a un recurso de otro contexto |
| `cache_context_settings` | `true` | guarda en caché los ajustes de los contextos |
| `use_context_resource_table` | `true` | mantiene la tabla de recursos que pertenecen a varios contextos |
| `context_tree_sort` | `true` | activa la ordenación de los contextos del árbol de recursos. El campo lo fija `context_tree_sortby` |
| `context_tree_sortby` | `rank` | el campo por el que se ordenan los contextos del árbol |
| `context_tree_sortdir` | `ASC` | la dirección de la ordenación |

## Fuentes de medios de un contexto

La fuente de medios de un elemento se puede fijar para un contexto. El elemento usa la fuente de su propio contexto. Si el contexto no tiene ninguna, el elemento conserva su fuente por defecto.

## Un recurso en varios contextos

Un recurso pertenece normalmente a un contexto. Con `use_context_resource_table` activada, la tabla `context_resource` guarda los recursos que pertenecen a varios contextos. Cada recurso así se encuentra en todos los contextos listados.

## Ver también

1. [Servir un segundo dominio](building-sites/contexts/virtual-host)
2. [Uso de un Plugin de puerta](building-sites/contexts/gateway-plugin)
3. [Ajustes del Sistema](building-sites/settings)
4. [Listas de Control de Acceso](building-sites/client-proofing/security/policies/acls)
