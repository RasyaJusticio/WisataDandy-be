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

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
