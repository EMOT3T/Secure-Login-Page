## Secure login page

This project presents features and logic to make your login screen and system more secure. However, it is important to note that this content is only an introduction to the topic of "hashing, salting, and data verification and manipulation".

Developed in HTML, CSS and PHP, the project includes authentication features and security checks to protect against common attacks, such as SQL Injection and Cross-Site Scripting (XSS).

### Characteristics

- **Attack Protection**: The PHP code has checks to block specific characters that can be used in attacks, such as simple SQL Injection.
- **Password hashing**: Passwords are stored securely in the database using the `password_hash` function.
- **Secure sessions**: PHP uses sessions to maintain user authentication securely during browsing.

### Validation of input fields

- Check to ensure that the email and password fields are not empty.
- Filtering and sanitizing email using `filter_input` and `sanitizeInput`.
- Password sanitization.

### Password hashing and salting

In the code, the concept of <salt> was implemented for secure password storage and protection against dictionary attacks. The password is converted into a secure hash using the `password_hash` function. This hash is stored in the database along with that user's specific salt.