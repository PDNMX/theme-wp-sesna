Entorno local de WordPress para desarrollo y pruebas del theme `sesna-v2`, usando Docker Compose con tres servicios: `db`, `wordpress` y `wpcli`. El sitio usa MySQL 8.4 como base de datos y WordPress con Apache, mientras que `wpcli` queda disponible para tareas manuales de administración y puesta a punto.[1][2][3][4]

## Requisitos

- [Docker Desktop](https://www.docker.com/products/docker-desktop/).
- Docker Compose compatible con archivos versión `3.3`, como `docker-compose 1.25.0`.[5][6]

## Servicios

| Servicio | Imagen | Uso |
|---|---|---|
| `db` | `mysql:8.4` | Base de datos del sitio.[1][2] |
| `wordpress` | `wordpress:6-apache` | Sitio WordPress accesible desde el navegador.[3] |
| `wpcli` | `wordpress:cli` | Comandos administrativos y de mantenimiento sobre la misma instalación.[4][7] |

## Primera instalación

```bash
# 1. Clona el repositorio
git clone <url-del-repo>
cd SESNA

# 2. Crea el archivo de entorno
cp .env.example .env
```

Edita `.env` con los valores mínimos:

```env
DB_NAME=sesna_db
DB_USER=admin
DB_PASSWORD=tu_password

WP_PORT=8080
WP_HOME=http://localhost:8080
```

## Base de datos inicial

Tienes dos formas de iniciar el sitio:

### Opción A — Instalación limpia

No montes `init.sql`. En este caso, al abrir el sitio por primera vez aparecerá el asistente `install.php` de WordPress para completar la instalación inicial desde el navegador.[8][3]

### Opción B — Restaurar un sitio existente

Coloca un archivo `init.sql` en la raíz del proyecto y descomenta esta línea del servicio `db`:

```yaml
- ./init.sql:/docker-entrypoint-initdb.d/init.sql
```

MySQL ejecuta automáticamente los archivos en `/docker-entrypoint-initdb.d/` solo cuando el volumen de datos se crea por primera vez. Si el volumen `db_data` ya existe, `init.sql` no se vuelve a importar.[9][2]

> Recomendación: deja `init.sql` fuera del repositorio y agrégalo a `.gitignore`.

## Levantar el entorno

```bash
docker-compose up -d
```

Accesos por defecto:

- Sitio: **http://localhost:8080**
- Administración: **http://localhost:8080/wp-admin**

Si cambias `WP_PORT`, ajusta también la URL correspondiente.[3]

## Detener el entorno

```bash
docker-compose down
```

Este comando detiene y elimina los contenedores, pero conserva los volúmenes. Eso significa que la base de datos y los archivos persistentes seguirán disponibles al volver a levantar el stack.[2]

## Reiniciar desde cero

```bash
docker-compose down -v
docker-compose up -d
```

Esto elimina también los volúmenes `db_data` y `wordpress_data`. Úsalo solo cuando quieras borrar completamente la instalación y volver a iniciar desde cero, por ejemplo para reimportar `init.sql`.[9][2]

## Activar el theme

Si el sitio proviene de un `init.sql`, el theme puede no quedar activo automáticamente. Para activarlo con `wpcli`:

```bash
docker-compose exec wpcli wp theme activate sesna-v2 --allow-root --path=/var/www/html
```

También puedes activarlo desde **Apariencia → Temas** en el panel de WordPress.[4][7]

## Crear un usuario administrador

Si necesitas agregar un usuario administrador adicional:

```bash
docker-compose exec wpcli wp user create usuario correo@dominio.com \
  --role=administrator \
  --user_pass="tu_password" \
  --allow-root \
  --path=/var/www/html
```

Este comando es útil cuando restauras una base y no conoces las credenciales activas, o cuando quieres crear un acceso nuevo sin entrar a la base de datos manualmente.[4][7]

## Cambiar la contraseña de un usuario

Para actualizar la contraseña de un usuario existente:

```bash
docker-compose exec wpcli wp user update usuario \
  --user_pass="nueva_password" \
  --allow-root \
  --path=/var/www/html
```

También puedes usar el ID numérico del usuario en lugar del nombre de login.[4]

## Otros comandos útiles de WP-CLI

```bash
# Verificar si WordPress está instalado
docker-compose exec wpcli wp core is-installed --allow-root --path=/var/www/html

# Listar usuarios
docker-compose exec wpcli wp user list --allow-root --path=/var/www/html

# Listar themes
docker-compose exec wpcli wp theme list --allow-root --path=/var/www/html

# Vaciar reglas de enlaces permanentes
docker-compose exec wpcli wp rewrite flush --allow-root --path=/var/www/html
```

## Desarrollo del theme

El theme `sesna-v2` se monta directamente desde tu carpeta local:

```text
./sesna-v2  ->  /var/www/html/wp-content/themes/sesna-v2
```

Esto permite hacer cambios en el código del theme y verlos reflejados en el sitio sin reconstruir la imagen. Si haces `git pull` sobre el theme, normalmente basta con recargar el navegador; si el cambio afecta caché o configuración, puede ayudar reiniciar el contenedor `wordpress`.[10][11]

## Flujo recomendado

- Usa instalación limpia cuando quieras un entorno nuevo y configurar WordPress desde el navegador.[8][3]
- Usa `init.sql` cuando necesites levantar una copia funcional del sitio desde el primer arranque.[9]
- Usa `wpcli` para tareas puntuales como activar el theme, crear usuarios o cambiar contraseñas.[4][7]
- Usa `docker-compose down -v` solo cuando realmente quieras borrar toda la instalación.[2]
