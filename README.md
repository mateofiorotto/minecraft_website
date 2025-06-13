# Minecraft Website

## Used Technologies / Tecnologias Utilizadas

<p class="technologies">
  <a href="https://skillicons.dev">
    <img src="https://skillicons.dev/icons?i=laravel,php,html,css,bootstrap,javascript" />
  </a>
</p>

- JavaScript
- Laravel
  - Eloquent ORM
- PHP
- HTML5
- CCS3
- BOOTSTRAP 5
- XAMPP (Development Environment, Apache, phpmyadmin)

---

### [Go to documentation in English](#ENG)

<br>

### [Ir a documentación en Español](#ESP)

## ENG

This site is a project for university. The assignment is based on a product/service offered for sale. In this case, the video game "Minecraft" with 3 editions.

The guideline states:

### Frontend

- Offer users a service or product, such as:
  a hosting service, auditing service, development service,
  a subscription product (e.g., an antivirus, an online app like
  Figma), a video game, etc. A shopping cart is **not** required.

My website is about the video game Minecraft. The idea is that users can purchase any of the published editions.

- Include a blog/news/updates section that discusses the
  product/service or related topics.

A "news" section is included, which also features categories.

- Include a homepage that presents the product.

The homepage introduces the video game in general and features a CTA button that leads the user to the editions.

### Admin/Backend

- Require authentication to access.

The CRUD system requires the user to be logged in and have an "admin" role; otherwise, they won't be able to access the admin area.
Users can register, but only as regular users. Admin creation must be done manually via seeder or directly in the database.

- Provide CRUD operations to manage blog/news/updates entries.

Includes a CRUD for posts, categories, users, and editions. It handles images, relationships, and validations.

- Both frontend and backend must use semantic structure and styling.

Both have semantic HTML structure, using `section`, `nav`, `footer`, `header`, and properly ordered heading tags.
It also includes custom styling with Bootstrap and CSS.

---

### Database

- Must include at least 3 tables: one for users and two others for blog, news, or services.

In this project, the database includes 4 tables: users, categories (1:N for posts), posts, and editions (the product).

- The user table must include at least 3 fields: ID, username, and password.

In this project, the user table includes the required fields, plus `name` and `role` (along with Laravel's default timestamps).

- At least one of the other tables must contain 5 fields excluding PK and timestamps.

The `editions` table contains 7 fields besides ID and timestamps: `title`, `subtitle`, `content`, `image` (string), `bestseller`, `price`, and `softDeletes` (`deleted_at`).

The `posts` table also has 7 fields: `title`, `subtitle`, `content`, `image`, `active` (true/false — controls visibility), `category_id` (many posts can belong to one category), and `softDeletes`.

- Table creation and initial data population must be done with migrations and seeders.

The app includes migrations and seeders to handle table creation and data seeding.  
Run command: ```php artisan migrate:fresh --seed```

---

### PHP

- The Laravel 10 framework must be used, applying object-oriented principles and leveraging its built-in features, following best practices.

This project uses **Laravel 11**, which was covered in class and is currently the latest stable version (the assignment guideline might be outdated).

- Views must be rendered using the Blade template engine.

All views are built with Blade and use its built-in tools.

- All data input must be validated, and errors must be reported when present.

The project uses Laravel's `validate` method with rules like `required`, `min`, etc.  
It also handles "resource not found" errors with redirects to a 404 page.  
Errors are shown as part of user feedback (explained below).

- Feedback messages must be provided to help the user understand what happened.

`$errors` is used in views to show field-specific validation messages.  
A custom 404 page is displayed if a resource is not found.  
SweetAlert2 is used for alerts in the CRUD and login areas.

---

### ADDITIONAL FEATURES

- Pagination  
- phpDoc  
- Categories table  
- User registration  
- SweetAlert2 alerts  
- SoftDeletes  

---

### The following will also be considered during evaluation:

- Complexity of the task completed.  
- Additional relationship tables in the database.  
- Correct implementation of OOP principles (encapsulation, inheritance, etc.).  
- Application of OOP best practices (e.g., Single Responsibility Principle).  
- Consistency in naming conventions (variables, classes, methods, etc.).  
- Proper use of semantic HTML tags.  
- Appropriate documentation using phpDoc.  
- Styling quality.  
- Proper use of Laravel components (Models, Controllers, Middleware, etc.).  
- Code cleanliness and organization.  
- Project folder structure organization.  

### How to use

1. Clone the repository

 ```
  git clone https://github.com/mateofiorotto/minecraft_website
  cd minecraft_website
  ```

2. Open XAMPP

Run the Apache and MySQL Services.

3. Check .env.example

Create and set your environment variables correctly (.env, mail + db)

4. Enter to the project folder (with the CLI) and run: <br>

```composer install```

```php artisan migrate```

```php artisan db:seed```

```php artisan storage:link```

```npm install```

If the CLI ask you to create a database, write yes

5. Start local server

Run:

```php artisan serve```

And enter to the local server (for default is the URL 127.0.0.1:8000)

**NOTE:** Feel free to adjust any settings to fit your local environment.

---

## ESP

Este sitio es un proyecto para la facultad. La consigna se basa en un producto/servicio que se ofrezca para la venta. En este caso, el videojuego "Minecraft" con 3 ediciones.

La pauta dice:

### Frontend

- Ofrecer a los usuarios algún servicio o producto, como por ejemplo:
un servicio de hosting, servicio de auditoría, servicio de desarrollo,
producto con suscripción (ej: un antivirus, una app online como
Figma), un videojuego, etc. No es necesaria la implementación de
un carrito de compras.

Mi sitio web es acerca del videojuego Minecraft. La idea de la web es que se pueda vender cualquiera de las ediciones publicadas.

- Incluir una sección de blog/novedades/noticias donde se hable del
servicio/producto o de temas relacionados.

Se incluye una seccion "noticias" que tambien tiene categorias.

- Incluir una home que presente el producto.

La home presenta al videojuego en general y tiene un boton que hace de CTA para llevar al usuario hacia las ediciones.

### Admin/Backend
- Requerir de una autenticación para acceder.

El CRUD requiere que la persona que quiera ingresar este logueado y su rol sea "admin", de lo contrario no podra acceder al administrador.
El usuario puede registrarse, pero solo como Usuario normal. La creación de usuarios administradores debe ser manual mediante seeder o desde la base de datos.

- Proveer de un ABM para administrar las entradas del
blog/novedades/noticias

Cuenta con un CRUD para posteos, categorias, usuarios y ediciones. El CRUD cuenta con manejo de imagenes, relaciones y validaciones.

- Ambos deben ofrecer estructura semantica y estilizacion.

Ambos cuentan con estructura semantica HTML, utilizando sections, nav, footer, header y etiquetas headers con respeto de jerarquia.
También tiene estilización personalizada con bootstrap y CSS.

---

### Base de datos

- Debe constar de al menos, 3 tablas, una de usuarios y otras dos para el blog, novedades o servicios

En mi caso, el proyecto cuenta con 4 tablas: usuarios, categorias (1:N para los posteos), posteos y ediciones (que será el producto).

- La tabla de usuario debe contar con al menos 3 campos: uno para ID, otro username y otro password.

En este proyecto el usuario cuenta con los campos requeridos y se agregan los campos nombre y rol (ademas de los timestamps que vienen por defecto).

- Al menos una de las otras tablas debe constituirse de 5 campos sin contar PK y los campos de fechas

La tabla de ediciones cuenta con 7 campos ademas del ID y timestamps; titulo, subtitulo, contenido, imagen (string), bestseller, precio, softDeletes (que seria deleted_at).

La tabla de posts cuenta con 7 campos también: titulo, subtitulo, contenido, imagen, activo (true or false, afecta si esta visible o no el post en el front), id de categoria (varios post pueden pertenecer a 1 categoria), softDeletes.

- Toda la creación de tablas, y la carga inicial de datos, deberá estar realizada con migrations y seeders.

La aplicación cuenta con migraciones y seeders que se encargan de realizar la creación y la carga de datos en la base de datos.
Ejecutar el comando: ```php artisan migrate:fresh --seed```

---

### PHP
- Deberá usarse el framework Laravel 10 aplicando los principios de la programación orientada a objetos, y aprovechando los mecanismos de trabajo ofrecidos por el mismo, siguiendo sus prácticas recomendadas.

En este proyecto se utiliza Laravel 11 que es lo visto en clase y es la versión nueva más estable (es posible que la pauta de parcial este desactualizada).

- Las vistas deberán utilizar el motor de template Blade para su renderizado.

Todas las vistas son Blade y utilizan las herramientas proporcionada por el motor de plantillas.

- Todos los ingresos de datos deberán estar validados, e informar los errores ocurridos, en caso de haberlos.

Se utiliza el metodo validate y reglas que proporciona el framework como required, min, etc.
También se hacen validaciones por si algun registro no es encontrado, redireccionando a la página de 404.
Se muestran errores como parte de feedback (explicado abajo).

- Debe proveerse de mensajes de feedback al usuario sobre lo ocurrido para facilitar la comprensión de la web.

Se utiliza $errors en las vistas para informar de errores debajo de cada campo. También hay una página de 404 si un recurso no es encontrado. Se agregan alertas en el CRUD y el Login con sweetalert2.

---

### ADICIONALES:
- Se agrego paginación
- phpDoc
- Tabla Categorias
- Registro
- Alertas con sweetalert2
- SoftDeletes

Se evaluará y tendrá impacto en la nota también:
- Complejidad de la tarea realizada.
- Tablas de relaciones extras en la base de datos.
- Correcta implementación de las herramientas de la Orientación a Objetos (encapsulamiento, herencia, etc).
- Implementación de buenas prácticas para la Programación Orientada a Objetos (ej: Principio de Responsabilidad Única).
- Coherencia en los nombres de variables, clases, métodos, etc.
- Uso correcto de las etiquetas semánticas de HTML.
- Documentación apropiada usando phpDoc.
- Estilización del sitio.
- Buena aplicación de los distintos tipos de componentes vistos en clase (Models, Controllers, Middlewares, etc).
- Prolijidad en el código.
- Prolijidad en la organización de la carpeta del proyecto.

### How to use

1. Clona el repositorio

 ```
  git clone https://github.com/mateofiorotto/minecraft_website
  cd minecraft_website
  ```

2. Abri XAMPP

Inicia los servicios Apache y MySQL

3. Chequea .env.example

Crea y pone tus variables de entorno correcamente (.env, mail + bd)

4. Entra a la carpeta del proyecto (con la CLI) y ejecuta: <br>

```composer install```

```php artisan migrate```

```php artisan db:seed```

```php artisan storage:link```

```npm install```

Si la CLI the pregunta para crear una base de datos, escribi yes

5. Iniciar servidor local

Ejecuta:

```php artisan serve```

Y entra al servidor local (por defecto la URL es 127.0.0.1:8000)

**NOTA:** Edita librementa cualquier configuración para ajustarla a tu entorno local.