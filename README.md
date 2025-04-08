# WDC_PHP_Basics
# PHP Simple Login System

A lightweight PHP authentication system that manages user registration and login using file-based storage.

## Overview

This system provides basic user authentication functionality with the following features:
- User registration with password hashing
- User login with session management
- Protected pages that require authentication
- Logout functionality

## Files Structure

- `index.php` - Home page with links to login/register or redirect to dashboard if logged in
- `login.php` - Handles user authentication
- `register.php` - Creates new user accounts
- `dashboard.php` - Protected page only visible to authenticated users
- `logout.php` - Handles user logout
- `hash_generator.php` - Utility script for generating password hashes
- `/auth/users.json` - JSON file that stores user data

## Installation

1. Clone or download these files to your web server directory
2. Make sure the `/auth` directory exists and is writable by your web server
3. Create an empty `users.json` file in the `/auth` directory if it doesn't exist
4. Access the application through your web browser

## Security Features

- Passwords are hashed using PHP's `password_hash()` function with `PASSWORD_DEFAULT` algorithm
- Input validation for username and password fields
- Protection against session hijacking with PHP's built-in session management
- Output escaping to prevent XSS attacks

## Usage

### User Registration
1. Navigate to the registration page
2. Enter a username and password
3. Upon successful registration, you'll be redirected to the dashboard

### User Login
1. Navigate to the login page
2. Enter your username and password
3. Upon successful authentication, you'll be redirected to the dashboard

### Logout
Click the "Logout" link on the dashboard to end your session

## Password Management

The system uses PHP's built-in password hashing functions:
- `password_hash()` - To securely hash passwords during registration
- `password_verify()` - To verify passwords during login

## Data Storage

User data is stored in a JSON file with the following structure for each user:
```json
{
    "username": "username",
    "password": "hashed_password",
    "created_at": "timestamp"
}
```

## Limitations

- File-based storage may not be suitable for high-traffic applications
- The system lacks advanced features like password reset, email verification, etc.
- Consider implementing additional security measures for production use

## Contributing

Feel free to enhance this system by adding features such as:
- Password strength requirements
- Account recovery functionality
- User profile management
- Remember me functionality
- CSRF protection

## License

Feel free to use and modify this code for your personal or commercial projects.