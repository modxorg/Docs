---
title: "Configurar YAMS"
_old_id: "621"
_old_uri: "evo/yams/yams-documentación-español/configurar-yams"
---

<div class="error"><span class="error">Unknown macro: {div}</span>![](/images/icons/emoticons/information.gif)**Language Variants**

<table class="tableview" width="100%"><tr><td><span class="icon icon-page">Page:</span> [YAMS Setup (de)](/extras/evo/yams/yams-deutsche-dokumentation/yams-setup-(de))</td></tr><tr><td><span class="icon icon-page">Page:</span> [Configurar YAMS](/extras/evo/yams/yams-documentación-español/configurar-yams)</td></tr><tr><td><span class="icon icon-page">Page:</span> [YAMS Setup](/extras/evo/yams/yams-english-documentation/yams-setup)</td></tr></table></div>Configurando YAMS.
==================

Estas instrucciones explican como configurar un nuevo sitio o convertir un sitio existente para ser multi-idioma de manera de que cause la menor interrupción. En teoría es posible convertir un sitio a multi-idioma sin tener que ponerlo fuera de línea con la excepción de cuando se recarga la configuración del servidor. Si todo va bien, entonces en ningún momento se debe de romper el website durante el proceso de configuración.

Estas instrucciones son para la gente que está comenzando desde cero y que quieran desarrollar un sitio multi-idoma, o para aquellos que tengan un sitio de un solo idioma y que quieran añadir idiomas adicionales.

Comenzando desde cero o desde un sitio de un idioma
---------------------------------------------------

Se asume que el módulo, el plugin y el snippet de YAMS y están instalados de acuerdo con [las instrucciones](/extras/evo/yams/yams-english-documentation/yams-installation "YAMS Installation"). La instalación del plugin [ManagerManager](http://modxcms.com/extras/package/255) y su configuración para usar las reglas de YAMS es altamente recomendable, debido a que YAMS puede usarlo para organizar lo campos de los diferentes idiomas en pestañas separadas y para esconder campos de variables de documento redundantes en la vista de documento.

YAMS ha sido diseñado para trabajar con las URLs amigables o las rutas alias amigables.

La instalación prefijada de YAMS no hace nada. La funcionalidad multi-idioma debe de ser configurada manualmente al especificar las plantillas de documento como multi-idioma.

Configuración YAMS Paso a Paso
------------------------------

<table><tbody><tr><th>Paso</th><th>Acción</th><th>Descripción</th></tr><tr><td>1</td><th>Respaldo</th><td>Siempre es sabio hacer un respaldo antes de modificar un sitio.</td></tr><tr><td>2</td><th>Decidir en el formato del URL</th><td>Antes de comenzar a configurar YAMS es necesario decidir como va a ser identificado el idioma de los documentos en el URL. YAMS operará en modos diferentes, dependiendo de como son configurados los URLs: modo **Nombre del Servidor,** modo **Nombre de la Raíz,** modo de **Aliases Multi-Idioma únicos** y modo **Parámetros de Query.** Estos modos son descritos en detalle en la [página de modos](/extras/evo/yams/yams-english-documentation/yams-language-modes "YAMS Language Modes"). Los ejemplos de como pueden ser configurados diferentes versiones de idioma de un sólo document aparecen abajo:   
### Usando Aliases Multi-Idioma únicos   
\* Cada variante de idioma es referido con un nombre diferente.

- Cada variante de idioma de cada documento tiene un nombre único.
- Puede ser usado con o sin rutas de alias amigables.
- El idioma del documento es determinado del alias del documento.**Ejemplo:**
- [http://nombre\_servidor/home.html](http://server_name/home.html)
- [http://nombre\_servidor/accueil.html](http://server_name/accueil.html)  
  ### Usando los modos de Nombre del Servidor y Nombre de la Raíz
- Puede ser usado con o sin aliases multi-idioma únicos o no-únicos.
- Puede ser usado con o sin rutas alias amigables.   
  **Ejemplos:**
- Modo de nombre de servidor solamente. Ejemplo: 
  - [http://es.nombre\_servidor.com/midoc.html](http://en.server_name.com/mydoc.html)
  - [http://fr.nombre\_servidor.com/midoc.html](http://fr.server_name.com/mydoc.html)
- Modo de nombre de la raíz solamente. Ejemplo: 
  - [http://nombre\_servidor.com/es/midoc.html](http://server_name.com/en/mydoc.html)
  - [http://nombre\_servidor.com/fr/midoc.html](http://server_name.com/fr/mydoc.html)
- Modo de nombre de la raíz solamente, con un idioma en la raíz. Ejemplo: 
  - [http://nombre\_servidor.com/midoc.html](http://server_name.com/mydoc.html)
  - [http://nombre\_servidor.com/fr/midoc.html](http://server_name.com/fr/mydoc.html)
- Modo de nombre de servidor, modo de nombre de la raíz, rutas alias amigables, aliases multi-idioma y >7bit URLs. Ejemplo: 
  - [http://es.nombre\_servidor.com/mexico/folder/midoc.html](http://en.server_name.com/england/folder/mydoc.html)
  - [http://fr.nombre\_servidor.com/la-france/répertoire/mon-doc.html](http://fr.server_name.com/la-france/r%C3%A9pertoire/mon-doc.html)  
      ### Usando el modo de parámetros Query
- Este es el modo de fallback si no es posible determinar el idioma del documento de ninguna otra manera.
- Puede ser usado con o sin aliases amigables y rutas alias amigables.
- The name of the query parameter is customisable.   
  **Ejemplo:**
- [http://nombre\_servidor.com/midoc.html?yams\_lang=es](http://server_name.com/mydoc.html?yams_lang=en)
- [http://nombre\_servidor.com/midoc.html?yams\_lang=fr](http://server_name.com/mydoc.html?yams_lang=fr)

</td></tr><tr><td>3</td><th>Configurar los Parámetros de Idioma</th><td>El segundo paso es el de configurar los parámetros de idioma para cada grupo de idiomas que será usado en documentos multi-idioma. Esto se hace en la pestaña 'Parámetros de Idioma' en la interfase del módulo.   
Cada grupo de idiomas tiene una identificación (`<em>id</em>`). Esta es usada, por ejemplo, en las versiones multi-idoma de las template variables para cada idioma. Ejemplo: `description_<em>id</em>`.   
Un grupo de idiomas puede ser configurado para representar un grupo de idiomas (es), un idioma localizado específico (es-mx) o una selección de idiomas localizados (es, es-mx, es-cl,...) especificando una lista de etiquetas de idioma separadas por comas.   
Adicionalmente al id del grupo de idiomas y a la configuración de URL para cada grupo de idiomas, es posible especificar una dirección del idioma, texto asociado con cada idioma y un nombre de idioma para MODx.   
Un grupo de idiomas debe de ser seleccionado com el grupo de idiomas prefijado. Este idioma se asumirá para documentos de un idioma.</td></tr><tr><td>4</td><th>Actualizar la configuración de URLs Amigables</th><td>Ahora el servidor necesita ser configurado para manejar la configuración del idioma seleccionado. Esto puede hacerse copiando el código generado de la pestaña 'Configurar Servidor' al archivo .htaccess. Podría ser necesario reiniciar/recargar el servidor.   
El archivo de configuración del servidor tendrá que ser actualizado cada vez que un grupo de idiomas es activado o desactivado, cuando su nombre de servidor o raiz sea cambiado o cuando el parámetro del query sea renombrado.   
En esta etapa, el sitio web todavía deberá funcionar normalmente. La configuración predeterminada hace que todas las páginas sean consideradas mono-idioma (o no-multi-idioma), así que no se verá ningún cambio en el sitio web en esta etapa.   
</td></tr><tr><td>5</td><th>Checar URLs</th><td>YAMS reconocerá y convertirá automáticamente los URLs internos con el estilo de MODx que estén rodeados por comillas a URLs multi-idioma para que apunten a la variante de idioma correcta. Los formatos de URL reconocidos y manejados automáticamente por YAMS son: "`[(site_url)][<em><sub>algo</sub></em>]`" or "`[(base_url)][<em><sub>algo</sub></em>]`" and "`[<em><sub>algo</sub></em>]`".   
Los URLs mutli-idioma generados por YAMS siempre consisten del URL completo, incluyendo el nombre del servidor y de la ruta completa. Como resultado no son afectados por la configuración de "base href". Los URLs son también configurables usando los controles en la pestaña de 'Otros Parámetros'. Por ejemplo, es posible el soliciatar que los URLs de weblinks siempre resuelvan a su URL de destino, o solicitar que el nombre de archivo del documento de inicio del sitio del lenguaje predeterminado no sea mostrado.   
Los URLs de recursos físicos como archivos de imágenes, estilo y javascript no son afectados por YAMS. Sin embargo, URLs relativos a tales recursos pueden ser afectados por la configuración "base href", especialmente cuando se use el modo de nombre del servidor. El método recomendado es usar el placeholder de (yams\_server) como sigue:   
```
<pre class="brush: php">
<base href="(yams_server)"></base>

```Para cualesquiera URLs internos que no son manejados automáticamente por MODx, el método recomendado para generar el URL multi-idioma correcto es usar los siguientes placeholders de YAMS:   
`(yams_doc:<em>docId</em>)` o `(yams_docr:<em>docId</em>)` dentro de las plantillas de documento y el contenido; y:   
`(yams_doc:[+<em>docId</em>+])` o `(yams_docr:[+<em>docId</em>+])` dentro de las plantillas de snippets.   
Favor de ver la pestaña de "Placeholders de YAMS" para todos los detalles.

</td></tr><tr><td>6</td><th>Actualizar Etiquetas de Idioma y Dirección</th><td>El siguiente paso es el de añadir los atributos de idioma y de dirección de idioma a la etiqueta inicial de html usando los placeholders de YAMS: `lang="(yams_tag)"` y/o `xml:lang="(yams_tag)"` y `dir="(yams_dir)"`</td></tr><tr><td>7</td><th>Actualizar Snippets</th><td>Cualquier snippet que produzca URLs o que directamente contenga texto multi-idioma que no esté incrustrado en placeholders multi-idioma tendrá que ser actualizado. Una guía de como hacer esto para Wayfinder, Ditto, eForm, jot y otros snippets se encuentra en la pestaña '¿Cómo se hace?'.   
Nota que el placeholder (yams\_mname) puede ser usado para pasar el idioma del admin correcto a los llamados de snippets. Por ejemplo, con los llamados de los snippets Ditto y eForm `&language=`(yams_mname)`` puede ser usado.</td></tr><tr><td>8</td><th>Estragegia de Redirección</th><td>Es ahora posible especificar ciertas plantillas como multi-idioma. Cuando esto es llevado a cabo todos los documentos asociados con esas plantillas se les darán versiones multi-idioma como está definido en la pestaña de 'Configuración de Idioma', cuyo contenido es controlable via template variables adicionales específicas para cada idioma. Además, los URLs de los documentos asociados cambiarán dependiendo del idioma. YAMS redireccionará automáticamente del URL viejo/mono-idioma a la variante de idioma correcta. Varios modos de redireccionamiento están disponibles y estos son controlados via la sección 'Configuración de Redirección de URL' en la pestaña de 'Otros parámetros'.   
Inicialmente, antes de que el contenido ha sido traducido, el modo de redirección llamado 'predeterminado' puede ser usado. Esto redirecciona a una página válida en el idioma predeterminado. Sólo cuando el contenido ha sido escrito para los otros idiomas el modo puede ser cambiado a, por ejemplo, al modo 'Actual o del Navegador'. Esto mantendrá la página el el idioma actual, si uno ha sido ya configurado (por una visita previa a la página por ejemplo), de otra manera se seleccionará un idioma apropiado basado en la configuración del navegador del usuario.   
También es posible controlar los códigos del estado de HTTP que son enviados cuando la redirección se lleva a cabo. Para sitios existentes, el código de estado para la redirección de las páginas existentes a las páginas del nuevo idioma predeterminado puede ser dejado como "Temprary" (307) hasta que un sitio esté listo, cuando esto suceda, el código de estado deberá ser cambiado a "Permanente" (301). De esa manera los buscadores sabrán re-indexar correctamente las páginas existentes. El código de estado que se debe usar cuando se redireccionen a páginas que estén en cualquier otro idioma que no sea el predeterminado pueden ser dejadas como "See Other" (303), lo cual indicará a los buscadores que la página nueva y no la vieja deberá ser indexada/cacheada.   
</td></tr><tr><td>9</td><th>Interfase del ManagerManager</th><td>Ahora es el momento para instalar ManagerManager si no se ha instalado todavía. Esto es altamente recomendable. Favor de seguir [las instrucciones en la página de Instalación](/extras/evo/yams/yams-english-documentation/yams-installation#YAMSInstallation-ManagerManagerSetup).   
Una vez que ManagerManager esté instalado es posible controlar como los campos de documentos multi-idioma están organizados cuando un documento es editado. Esto es llevado a cabo modificando la configuración en la sección de 'Configuración de la Estructura del Documento' en la pestaña de 'Otros Parametros'.   
Cuando un documento es convertido para ser un documento multi-idioma las variables de documento existentes incluyendo el pagetitle, retienen sus valores existentes. Sin embargo, todas menos pagetitle se convierten en redundantes. Un valor de configuración existe el cual permite esconder las template variables redundantes. Con YAMS, el pagetitle del documento toma el rol de un texto identificador para el documento y y todas sus variantes de idioma dentro de la parte admin de MODx. Este identificador es visible en el árbol de documentos de MODx, pero no en ninguna salida a la web. Por conveniencia, YAMS provee una opción de automáticamente actualizar este pagetitle del documento con los contenidos de la template variable de pagetitle del idioma predeterminado cuando se guarde el documento.   
</td></tr><tr><td>10</td><th>Plantillas Multi-idioma</th><td>Es posible, finalmente, configurar ciertas plantillas como multi-idioma. Esto se lleva a cabo en la pestaña 'Plantillas Multi-idioma'.   
Todo lo que se tiene que hacer es seleccionar 'si' para esas plantillas que deben de ser mutli-idioma. YAMS creará template variables multi-idioma para esas plantillas que lo requieran. Es posible experimentar, creando primero una plantilla nueva, luego seleccionarla como multi-idoma, después asociarla con un documento nuevo y por último llenandola con algún contenido predeterminado. Versiones múltiples de cada template variable serán creadas automáticamente para cada idioma. Estas estarán asociadas con las plantillas multi-idioma y el contenido del documento predeterminado será copiado dentro de las nuevas template variables del idioma predeterminado.   
</td></tr><tr><td>11</td><th>Traducir</th><td>Las versione múltiples de los documentos pueden ser vistas ahora al navegar al URL apropiado. Sin embargo, inicialmente sólo la versión del idioma predeterminado tiene contenido escrito. Ahora, cuando un documento multi-idioma es editado existirá una pestaña por idioma y el contenido puede así ser traducido. Nota que el sitio continuará viendose normal y no habrá ningún enlace apuntando a la versión del nuevo idioma hasta el paso siguiente.   
</td></tr><tr><td>12</td><th>Publicar</th><td>Una vez que el contenido ha sido traducido es posible comenzar a publicarlo. Los snippets:   
```
<pre class="brush: php">
[[YAMS? &get=`list`]]

```o

```
<pre class="brush: php">
[[YAMS? &get=`selectform`]]

```puedenser usados para incluir un idioma basado en la seleccion en una lista o en una forma en las plantillas multi-idioma. Estos llamados pueden ser modificados usando plantillas personalizadas. Ver [la página del snippet YAMS](/extras/evo/yams/yams-english-documentation/yams-snippet "YAMS Snippet") para todos los detalles.

</td></tr><tr><td>13</td><th>Terminado</th><td>El sitio es ahora corriendo como un sitio multi-idioma. El modo de redirección y los códigos de estado de HTTP pueden ser actualizados. Asegúrate de que los mapas del sitio para cualquier buscador contienen una lista de todos los documentos, y no solo los de un solo idioma. Ver la pestaña '¿Cómo se hace? para más detalles acerca de como hacer esto.   
</td></tr></tbody></table>