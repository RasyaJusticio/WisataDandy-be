# WisataDandy

This project is a backend API for managing destinations, developed using Laravel. The API allows users to view various destination sites, and provides admin capabilities to create, read, update, and delete (CRUD) destinations and facilities. Using token-based authentication with Sanctum. Data stored using MySQL. The API is designed to be integrated with a [frontend]().

## Features

-   User:
    -   View destination sites
-   Admin:
    -   CRUD operations for destinations
    -   CRUD operations for facilities

## Endpoints

Every endpoint starts with `{domain}/api/v1`

-   **Public**

    -   Authentication
        -   POST `/auth/register` - Creates a new account
        -   POST `/auth/login` - Log in into an existing account
    -   Destination
        -   GET `/destination/` - Gets every destinations
        -   GET `/destination/{destination_id}` - Show a specific destination
    -   Facility
        -   GET `/facility/` - Gets every facilities
        -   GET `/facility/{facility_id}` - Show a specific facility

-   **Admin Only**

    -   Authentication
        -   POST `/auth/logout` - Log out
    -   Destination
        -   POST `/destination/` - Creates a new destination
        -   POST `/destination/{destination_id}` - Updates a specific destination
        -   DELETE `/destination/{destination_id}` - Deletes a specific destination
        -   POST `/destination/{destination_id}/facility/add` - Attach facilities into a specific destination
        -   POST `/destination/{destination_id}/facility/remove` - Detach facilities into a specific destination
    -   Facility
        -   Create `/facility/` - Creates a new facility
        -   POST `/facility/{facility_id}` - Updates a specific facility
        -   DELETE `/facility/{facility_id}` - Deletes a specific facility

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

-   **[Vehikl](https://vehikl.com/)**
-   **[Tighten Co.](https://tighten.co)**
-   **[WebReinvent](https://webreinvent.com/)**
-   **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
-   **[64 Robots](https://64robots.com)**
-   **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
-   **[Cyber-Duck](https://cyber-duck.co.uk)**
-   **[DevSquad](https://devsquad.com/hire-laravel-developers)**
-   **[Jump24](https://jump24.co.uk)**
-   **[Redberry](https://redberry.international/laravel/)**
-   **[Active Logic](https://activelogic.com)**
-   **[byte5](https://byte5.de)**
-   **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
