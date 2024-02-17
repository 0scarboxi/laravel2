# Desarrollo de una aplicacion web en laravel sobre las relaciones de ventas y clientes

Este es un proyecto increíble que hace X, Y, Z.

## Instalación


1. Clona este repositorio en tu máquina local:

URL del repositorio: https://github.com/0scarboxi/laravel2.git

    ```bash
    git clone https://github.com/0scarboxi/laravel2.git
    ```

2. Navega al directorio del proyecto:

    ```bash
    cd laravel2
    ```

3. Instala las dependencias PHP:

    ```bash
    composer install
    npm install
    ```

4. Ejecuta las migraciones para crear las tablas de la base de datos:

    ```bash
    php artisan migrate
    ```

5. Rellena las tablas con :

    ```bash
    php artisan db:seed
    ```

6. Abre tu navegador web y navega a la siguiente URL para acceder a la aplicación web:

    ```
    http://laravel2.local
    ```

   Asegúrate de que el dominio `laravel2.local` esté configurado en tu archivo de hosts y apunte a `127.0.0.1`.

## Uso

Este proyecto de Desarrollo Web en Entorno Servidor, su uso esta pensado para facilitar la gestión de un sistema de ventas según los requerimientos especificados en el enunciado 2 del Grupo F.

El sistema permite llevar un control detallado de los siguientes elementos:

Proveedores: Se registran con su RUT, nombre, dirección, teléfono y página web.

Clientes: Cuentan con RUT, nombre y dirección, y tienen la capacidad de tener múltiples números de contacto. La dirección se compone de calle, número, comuna y ciudad.

Productos: Cada producto posee un identificador único, nombre, precio actual, stock y proveedor asociado. Están categorizados, y cada producto pertenece a una sola categoría. Las categorías se identifican por un ID, nombre y descripción.

Ventas: Se registra la información de cada venta, incluyendo un ID único, fecha, cliente, descuento y monto final. Además, se almacena el precio al momento de la venta, la cantidad vendida y el monto total por producto.

Con esta aplicación, los usuarios pueden realizar tareas como la gestión de clientes y análisis de las ventas realizadas a cada cliente.


## Programadores

Christian Tomás

Carlos Enguita

__Oscar Carreras__ (lo he subido yo a git)


