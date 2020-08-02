---
title: "Instalación desde Git"
_old_id: "154"
_old_uri: "2.x/getting-started/installation/git-installation"
---

## Proceso de instalación

Aquí hay algunas notas sobre cómo participar en las pruebas y/o desarrollo de MODX Revolution. A diferencia de las versiones anteriores de MODX, Revolution no se instalará directamente desde Git. Debido a la naturaleza del nuevo sistema de empaque e instalación, primero debes crear el paquete de instalación principal utilizando un script de compilación PHP antes de ejecutar la configuración.

### Localización en Git

Git clona el repositorio de revolution que está en GitHub, en: <http://github.com/modxcms/revolution/> usando la sintaxis:

``` php
git clone http://github.com/modxcms/revolution.git
```

O, si deseas devolver contribuciones, [crea un fork en tu repositorio de GitHub](http://help.github.com/forking/) y clona ese repositorio como "origen" y agrega el repositorio modxcms/revolution como remoto llamado "upstream":

``` php
git clone git@github.com:tunombredeusuariogit/revolution.git
cd revolution
git remote add upstream -f http://github.com/modxcms/revolution.git
```

Creando un fork con tu cuenta de GitHub te permitirá contribuir con MODX enviando solicitudes haciendo clic en el botón "Pull Request" en tu página de GitHub. (Sin embargo, deberás [enviar un CLA](http://develop.modx.com/contribute/cla/) antes de que podamos aceptar tu código). Si decides hacer el fork, sería útil para ti leer nuestra [Guía de contribuidores de Git](contribute/code/contributors-guide  "Guía del colaborador de MODX en GitHub"), para obtener información detallada sobre cómo mantener su fork actualizado.

Si no estás familiarizado con Git, lee el excelente tutorial de [GitHub](http://learn.github.com/) y las [páginas de ayuda de GitHub](http://help.github.com).

A partir de ahí, asegúrate de estar trabajando en la rama **2.x**, si deseas las últimas correcciones de errores y funciones destinadas a la próxima versión. Hay dos ramas importantes en el repositorio modxcms/revolution de GitHub relacionadas con las versiones de la versión 2 de MODX Revolution:

#### Rama de versión principal

- **2.x** - La última rama de desarrollo para MODX Revolution versión 2. Todas las nuevas funciones y correcciones de errores destinadas a la próxima versión menor estarán aquí.

#### Rama de versión menor

- **2.5.x** - Una rama de versión menor para versiones estables actuales; contiene solo correcciones de errores para la próxima versión.

Para crear una rama de seguimiento local a partir de una en el origen remoto; después de la clonación, solo escriba:

``` php
git checkout -b 2.x origin/2.x
```

Y git se encargará del resto.

Puede haber otras ramas temporales en el repositorio de vez en cuando, que representan características en el desarrollo colaborativo, la preparación de versiones específicas y/o parches de errores críticos para versiones compatibles.

### Ejecuta la compilación

Si es la primera vez que está compilando desde Git, copia el archivo `**_build/build.config.sample.php**` a `**_build/build.config.php**` y edita las propiedades para apuntar a una base de datos válida con las credenciales adecuadas (desde Revolution 2.1.x, debes copiar y editar de la misma manera `**_ build/build.properties.sample.php**` a `**_ build/build.properties.php**`). NOTA: esta base de datos no tiene que contener nada; el script de compilación solo necesita poder conectarse a una base de datos MySQL.

Desde la línea de comandos, cambia su directorio de trabajo a `**_build /**` y ejecuta el comando `**php transport.core.php**`. Si el ejecutable PHP no está en tu ruta, deberás editar la ruta o proporcionar la ruta completa al ejecutable PHP en la línea de comando. El proceso de construcción puede llevar un período prolongado de tiempo (10 a 30 segundos probablemente), así que sé paciente. (Nota: en Mac Mini (1.66Ghz Intel Core Duo con 2GB de RAM) que ejecuta el entorno de desarrollo Leopard como se describe a continuación, esto solo demora de 5 a 10 segundos).

Ten en cuenta que también puedes hacerlo desde el navegador, navegando al directorio `**_ build/transport.core.php**`, si ese directorio es accesible en la configuración de tu servidor web.

Una vez que el script haya terminado de ejecutarse, confirma que ahora tienes un archivo llamado core/packages/core.transport.zip y un directorio `core/packages/core/` que contiene un manifest.php y muchos otros archivos/directorios.

### Ejecutar la instalación

Ahora estás listo para ejecutar el nuevo script de configuración en la URL de setup/ `(por ejemplo, <http://localhost/modxrevo/setup/> si está instalado en un subdirectorio de la raíz web llamado modxrevo/).

Asegúrate de marcar las opciones "El paquete principal ha sido desempaquetado manualmente" y "Los archivos ya están en su lugar" al instalar desde Git.

Si cambias alguna ruta en el paso de configuración de rutas de contexto, asegúrate de mover los directorios correspondientes según corresponda; esto está destinado a instalaciones desde el paquete principal con archivos que aún no están en su lugar, donde el instalador colocará los archivos en las ubicaciones especificadas (suponiendo que las ubicaciones permitan que el proceso PHP  escriba en ellas).

El proceso de instalación real requiere más de los 8M de memoria asignados por defecto a PHP en muchos archivos php.ini predeterminados; si obtienes una página en blanco cuando haces clic en "instalar", intenta aumentar la configuración de `memory_limit` a 32M o más (16M puede funcionar, pero ¿por qué no darle a php un poco de espacio, eh?).

## Actualización de tu repositorio local de Git después de los Commits


Simplemente, ejecuta estos dos comandos:

``` php
git fetch origin
git rebase origin/2.x
```

Y Git actualizará tu instalación. (Sustituye '2.5.x' por '2.x' si estás probando o colaborando en una rama específica de versión menor, o cualquier rama desde la que puedas estar trabajando). 

Si estás trabajando desde un fork, en lugar de directamente desde el repositorio modxcms/revolution, tendrás que buscar en el origen, en lugar de buscar en el fork. Lee la [Guía para GitHub del Colaborador de MODX](contribute/code/contributors-guide  "Guía para GitHub del Colaborador de MODX") para obtener más información.

Cuando se realiza un commit, este mensaje puede aparecer en la confirmación:

- **\[ReUp\]** - Si tus actualizaciones requieren una reconstrucción de transporte principal (como cualquier cosa modificada en el directorio `_build`, cambios en el modelo de la base de datos o cambios de datos predeterminados), entonces prefija tu mensaje del commitcon esto. Si ves este mensaje, simplemente reconstruye el transporte de core y ejecuta `setup/` nuevamente.

Si este mensaje no aparece, habrás terminado después de fetch y rebase.

### Contribuir enviando Pull Requests

Si has corregido un error o añadido una mejora, y estás trabajando en un fork del repositorio de revolution, puedes enviar un pull request a MODX y uno de los Administradores de Integración revisará tu parche.

Deberás [enviar un CLA](http://develop.modx.com/contribute/cla/) antes de que podamos aceptar tu código.

MODX te recomienda trabajar en funciones o errores en tus propias ramas separadas. De esta forma, si MODX no acepta tu solicitud de extracción exactamente como está, pero aún así actualiza esos archivos, no tendrás que 'pasar por caja' la rama de revelado (o lo que sea) nuevamente. Puedes simplemente eliminar la rama de corrección de errores/características y volver a cargarla desde tu rama de desarrollo limpia.

Por ejemplo, supongamos que deseas agregar una función para el flujo de trabajo para MODX. Crearías una rama local desde la rama '2.x' llamada 'myworkflow' con:

``` php
git checkout -b myworkflow 2.x
```

... y luego codificas allí. Una vez que hayas terminado, harías un push de esa rama a tu fork y luego enviarías el Pull Request. Una vez que MODX haya integrado tu código (o lo haya rechazado y hayas terminado con ello), puedes eliminar la rama de esta manera:

``` php
git checkout 2.x
git branch -d myworkflow
```

El primer paso nos lleva de vuelta a la rama de desarrollo, y luego elimina la rama personalizada. Esto te permite actualizar fácilmente MODX sin tener que preocuparse por confirmaciones inválidas o que ya no se usan, y mantiene limpia tu rama principal.

Siempre puedes hacer `git merge --ff-only origin/2.x` nuevos commits provenientes de 2.x (o 2.5.x, etc.) en tu rama después de ejecutar `git fetch origin` mientras haces que tu rama se desproteja.

Para obtener más información sobre el uso de los forks en GitHub, consulta la [Página de ayuda de Forks en GitHub](http://help.github.com/forking/).

### Cambio de ramas

Si deseas cambiar a una rama diferente (que ya has extraído localmente), simplemente escribe estos comandos:

``` php
git fetch upstream
git checkout 2.5.x upstream/2.5.x
```

Por supuesto, reemplazando 2.5.x con el nombre real de la rama a la que deseas cambiar. Después de hacerlo, ejecuta la compilación y ejecuta `setup/` nuevamente, ya que las diferentes ramas pueden tener diferentes bases de datos.

No siempre se recomienda volver _atrás_ ; es decir, cambiar de 2.x (las últimas características en desarrollo para la próxima versión menor) a 2.5.x (los últimos parches para la próxima versión de parche), ya que los cambios en la base de datos no se pueden ejecutar a la inversa. Si bien no deberían ocurrir problemas importantes, ten cuidado al hacer esto o mantén tu trabajo en bases de datos separadas para cada rama en la que trabajes.

## Información adicional

### Usando MAMP en Mac OS X

Si usas MAMP en Mac OS X, puedes tener problemas (errores sobre las bibliotecas DYLD no incluidas) al intentar ejecutar `transport.core.php` desde el terminal. Esto se debe a que las bibliotecas PHP MAMP no estarán en la ruta del vinculador dinámico de forma predeterminada.

Para ajustar la ruta de la biblioteca del vinculador dinámico para incluir las bibliotecas MAMP PHP, ejecuta el siguiente comando a través del terminal:

``` php
export DYLD_LIBRARY_PATH=/Applications/MAMP/Library/lib:$\{DYLD_LIBRARY_PATH\}
```

Luego puedes ejecutar `transport.core.php` utilizando la ruta absoluta al ejecutable MAMP PHP:

``` php
/Applications/MAMP/bin/php5/bin/php transport.core.php
```

### Instalar con Git para el desarrollo 3.x

Esto presupone que tienes un servidor web local, señalado en el directorio denominado "su\_directorio".

1. Localmente cd en el directorio, desde el cual deseas implementar modx en una subcarpeta: `cd /ruta/al/directorio/padre`
2. Ejecuta: `composer create-project modx/revolution tu_directorio 3.x-dev`
3. Cambia el directorio y verifica la rama 3.x: `cd your_directory && git checkout 3.x`
4. Verifica una rama de función: `git checkout -b 3.x-myfeaturebranch`

Opcionalmente, **forkea** [MODX Revolution en Github](https://github.com/modxcms/revolution/) a tu propia cuenta de Github, momento en el que querrás hacer lo siguiente:

1. `git remote add upstream https://github.com/modxcms/revolution.git` (URL diferente si estás utilizando SSH)
2. `git remote set-url origin {your github repo url}`
3. También puedes necesitar: `git remote set-url --push origin {your github repo url}`

Construye el core:

1. `cp build.config.sample.php build.config.php && cp build.properties.sample.php build.properties.php`
2. Edita esos dos archivos, agregando sus rutas y credenciales de base de datos
3. Luego ejecuta: `php transport.core.php`
4. Ejecuta el instalador en un navegador.
