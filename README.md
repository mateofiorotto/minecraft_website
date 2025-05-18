## ENG

This site is a university project. The assignment is based on a product/service offered for sale. In this case, the video game "Minecraft" with 3 editions.

The instructions specify:

### Frontend

- Offer users a service or product, such as:
  a hosting service, audit service, development service, product with subscription (e.g.: antivirus, an online app like Figma), a video game, etc. A shopping cart is not required.
- Include a blog/news/updates section that discusses the service/product or related topics.
- Include a home page that presents the product.

### Admin/Backend

- Require authentication to access.
- Provide a CRUD to manage blog/news/updates entries.

Both frontend and backend must offer semantic structure and styling.

---

### Database

- Must consist of at least 3 tables: one for users and two for blog, news or services.

In my case, the project includes 4 tables: users, categories (for posts), posts, and editions (the product).

- The user table must include at least 3 fields: an ID, a username, and a password.

In this project, the user table includes the required fields, plus a role field (as well as the default timestamps).

- At least one of the other tables must have 5 fields (excluding primary key and timestamps).

The `editions` table includes 7 fields in addition to ID and timestamps: title, subtitle, content, image (string), bestseller, price, and softDeletes (which is the `deleted_at` column).

The `posts` table also includes 7 fields: title, subtitle, content, image, active (true or false, controls whether the post is visible in the frontend), category_id (multiple posts can belong to one category), and softDeletes.

- All table creation and initial data loading must be done using migrations and seeders.

The application includes migrations and seeders to create and populate the database.  
Run the command:  
```php artisan migrate:fresh --seed```

---

### PHP

- Laravel 10 must be used, applying object-oriented programming principles and taking advantage of the framework's tools, following best practices.

This project uses Laravel 11, which is the version taught in class and the most stable recent version (the assignment instructions may be outdated).

- All views must use the Blade template engine.

All views use Blade.

- All data inputs must be validated, and any errors must be reported if present.

The `validate` method and Laravel’s built-in rules (like `required`, `min`, etc.) are used.  
Validations are also performed to check if a record is not found, redirecting to a 404 page.

- Feedback messages must be provided to the user to facilitate understanding of what happened.

The `$errors` variable is used in views to display form errors when creating or editing content.  
A 404 page is included.  
Alerts will soon be added to the respective CRUD index pages for success messages (create/edit/delete).

---

### ADDITIONAL FEATURES

- Pagination added
- phpDoc comments
- Categories table added

---

### To-Do (this section will be removed later)

- Authentication for accessing admin panel
- CRUD success/failure alerts
- Login pages
- CRUD pages for all entities
- Styling the website
- Middleware (along with auth)
- Check semantic structure
- Document everything with phpDoc
- Improve seeders content
- Ensure softDeletes don’t break anything when related to other models

---

### Evaluation criteria will also consider:

- Complexity of the implemented tasks
- Extra relational tables in the database
- Correct implementation of OOP tools (encapsulation, inheritance, etc.)
- Application of OOP best practices (e.g., Single Responsibility Principle)
- Consistent and coherent naming (variables, classes, methods, etc.)
- Correct use of HTML semantic tags
- Proper documentation using phpDoc
- Styling and visual design of the site
- Correct use of components covered in class (Models, Controllers, Middlewares, etc.)
- Code organization and cleanliness
- Project folder structure and organization

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

Se incluye una seccion "noticias" 

- Incluir una home que presente el producto.

La home presenta al videojuego en general.

### Admin/Backend
- Requerir de una autenticación para acceder.

El CRUD requiere que la persona que quiera ingresar este logueado y su rol sea "admin", de lo contrario no podra acceder al administrador.

- Proveer de un ABM para administrar las entradas del
blog/novedades/noticias

- Cuenta con un CRUD para posteos, categorias, usuarios y ediciones.

- Ambos deben ofrecer estructura semantica y estilizacion.

Ambos cuentan con estructura semantica HTML y estilizacion personalizada con bootstrap y CSS.

---

### Base de datos

- Debe constar de al menos, 3 tablas, una de usuarios y otras dos para el blog, novedades o servicios

En mi caso, el proyecto cuenta con 4 tablas: usuarios, categorias (para los posteos), posteos y ediciones (que será el producto).

- La tabla de usuario debe contar con al menos 3 campos: uno para ID, otro username y otro password.

En este proyecto el usuario cuenta con las tablas requeridas y se agrega la tabla rol (ademas de los timestamps que vienen por defecto).

- Al menos una de las otras tablas debe constituirse de 5 campos sin contar PK y los campos de fechas

La tabla de ediciones cuenta con 7 campos ademas del ID y timestamps; titulo, subtitulo, contenido, imagen (string), bestseller, precio, softDeletes (que seria deleted_at).

La tabla de posts cuenta con 7 campos también: titulo, subtitulo, contenido, imagen, activo (true or false, afecta si esta visible o no el post en el front), id de categoria (varios post pueden pertenecer a 1 categoria), softDeletes.

- Toda la creación de tablas, y la carga inicial de datos, deberá estar realizada con migrations y seeders.

La aplicación cuenta con migraciones y seeders que se encargan de realizar la creación y la carga de datos en la base de datos.
Ejecutar el comando: ````php artisan migrate:fresh --seed```

---

### PHP
- Deberá usarse el framework Laravel 10 aplicando los principios de la programación orientada a objetos, y aprovechando los mecanismos de trabajo ofrecidos por el mismo, siguiendo sus prácticas recomendadas.

En este proyecto se utiliza Laravel 11 que es lo visto en clase y es la versión nueva más estable (es posible que la pauta de parcial este desactualizada).

- Las vistas deberán utilizar el motor de template Blade para su renderizado.

Todas las vistas son Blade

- Todos los ingresos de datos deberán estar validados, e informar los errores ocurridos, en caso de haberlos.

Se utiliza el metodo validate y reglas que proporciona el framework como required, min, etc.
También se hacen validaciones por si algun registro no es encontrado, redireccionando a la página de 404.

- Debe proveerse de mensajes de feedback al usuario sobre lo ocurrido para facilitar la comprensión de la web.

Se utiliza $errors en las vistas para informar de errores al crear o editar incorrectamente. También hay una página de 404.
Se agregan alertas en el crud y el login con sweetalert2.

---

### ADICIONALES:
- Se agrego paginación
- phpDoc
- Tabla categorias
- Registro
- Alertas con sweetalert2

--- 

### Falta por hacer (esta sección sera eliminada luego):
HOY: 
- cambiar color btn hamburguesa

MAÑANA
- Info home
- Estilizacion de la web
- Chequear semantica y validar html en lo posible, no cuenta el swal2
- Hacer bien el contenido de los seeders
- Cargar imgs

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