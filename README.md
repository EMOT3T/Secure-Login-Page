## Secure LoginPage

This project consists of a secure login page, developed using HTML, CSS, and PHP. It includes authentication functionalities and security checks to protect against common attacks like SQL Injection and Cross-Site Scripting (XSS).

### Features

- **Secure authentication**: Login credentials are verified on the server-side to ensure security.
- **Protection against attacks**: The PHP code includes checks to block specific characters that can be used in attacks, such as SQL Injection.
- **Password hashing**: Passwords are stored securely in the database using the `password_hash` function.
- **Secure sessions**: PHP utilizes sessions to securely maintain user authentication during navigation.

### Starting the session and including the connection file

The code starts by initializing the PHP session to manage session variables and includes the `connect.php` file, which contains the database connection settings.

### Checking if the request method is POST

It verifies if the form was submitted using the POST method.

### Validation of input fields

- It checks if the email and password fields are not empty.
- It filters and sanitizes the email using `filter_input` and `sanitizeInput`.
- It sanitizes the password.

### Hashing the password

The password is converted into a secure hash using the `password_hash` function. This hash is stored in the database.

### Database query

- An SQL query is prepared to select the user with the provided email.
- The email is bound to the query parameter using `bindParam`.
- The query is executed, and the results are stored in the `$user` variable.

### Checking the password and authentication

If a user with the provided email is found in the database:

- It checks if the password provided by the user matches the hash stored in the database, using `password_verify`.
- If the passwords match, the user is authenticated:
  - The user's ID and email are stored in session variables (`$_SESSION['user_id']` and `$_SESSION['user_email']`).
  - The user is redirected to the system's main page (`../main/index.php`).
- If the passwords do not match, the user is redirected back to the login page with an error message.

### Error handling

- If the email or password is empty, the user is redirected back to the login page with an error message.
- If the request method is not POST, the user is redirected back to the login page with an error message.
