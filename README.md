# SESNA — Entorno local con Docker

## Requisitos

- [Docker Desktop](https://www.docker.com/products/docker-desktop/)

## Primera vez

```bash
# 1. Clona el repositorio
git clone <url-del-repo>
cd SESNA

# 2. Crea tu archivo de variables de entorno
cp .env.example .env
```

Edita `.env` con tus valores:

```env
DB_NAME=sesna_db
DB_USER=admin
DB_PASSWORD=tu_password

WP_PORT=8080
WP_HOME=http://localhost:8080

WP_ADMIN_USER=tu_usuario
WP_ADMIN_PASSWORD=tu_password
WP_ADMIN_EMAIL=tu@email.com
```

### Cargar un dump de base de datos (opcional)

Coloca tu archivo en la raíz del proyecto con el nombre `init.sql`. MySQL lo importará automáticamente en el primer arranque.

> `init.sql` está en `.gitignore` y nunca se sube al repositorio.

## Levantar el entorno

```bash
docker-compose up -d
```

El sitio estará disponible en: **http://localhost:8080**  
Panel de administración: **http://localhost:8080/wp-admin**

> Al levantar, el servicio `wpcli` creará automáticamente el usuario definido en `.env` si no existe.

## Detener el entorno

```bash
docker-compose down
```

## Reiniciar desde cero (borra la base de datos)

```bash
docker-compose down -v
docker-compose up -d
```

> Útil si necesitas reimportar el `init.sql`.

## Activar el theme

1. Entra a **http://localhost:8080/wp-admin**
2. Ve a **Apariencia → Temas**
3. Busca **Sesna** y haz clic en **Activar**

El sitio en **http://localhost:8080** cargará con el theme.

## Desarrollo del theme

El theme `sesna-v2` se monta directamente desde tu carpeta local. Cualquier cambio en el código se refleja en el sitio sin reiniciar el contenedor.

```
./sesna-v2  →  /var/www/html/wp-content/themes/sesna-v2
```
