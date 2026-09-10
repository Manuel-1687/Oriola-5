# LavaLust CRUD Application

This workspace contains a PHP MVC-style CRUD application with an authentication gate and an SQLite local fallback for quick testing.

## Login

Use the default login values from `.env`:

- Email: `admin@lavalust.local`
- Password: `password123`

## Routes

- `/` or `/login` -> login form
- `/products` -> product list
- `/products/create` -> form for adding a product
- `/products/store` -> POST handler for create
- `/products/edit/{id}` -> editable product form
- `/products/update` -> POST handler for update
- `/products/delete/{id}` -> delete confirmation page
- `/products/delete` -> POST handler for delete

## Database

The app starts with SQLite by default in `.env`, and can be switched to Aiven MySQL by setting:

```env
DB_CONNECTION=mysql
DB_HOST=your-aiven-host
DB_PORT=3306
DB_NAME=your-database
DB_USERNAME=your-user
DB_PASSWORD=your-password
```

Ensure your table is `products` with the schema requested by the assignment.
