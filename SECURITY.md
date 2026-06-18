Security Enhancements - Task 4

Implemented Features

1. Prepared Statements

- Used MySQLi prepared statements in registration, login, create, edit, and delete operations.
- Prevented SQL Injection attacks.

2. Server-Side Validation

- Checked for empty username and password fields.
- Ensured password length is at least 6 characters.
- Validated title and content before creating posts.

3. Client-Side Validation

- Added required attributes to form fields.
- Added minimum password length validation.

4. Password Security

- Used password_hash() to securely store passwords.
- Used password_verify() during login authentication.

5. Role-Based Access Control

- Added role column to users table.
- Admin users can create, edit, and delete posts.
- Editor users can create and edit posts but cannot delete posts.

6. Session Management

- Protected pages using PHP sessions.
- Added logout functionality to destroy active sessions.

Outcome

The Blog Application is now more secure against common vulnerabilities and supports role-based access control.