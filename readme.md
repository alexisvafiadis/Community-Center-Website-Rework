# Community Center Website Rework

## Introduction

This project was developed as part of a university module aimed at redesigning the website for the **Saith Seren Community Center**, located in Wrexham. The center promotes Welsh culture and language through events, activities, and community engagement. The existing website had several design and usability issues, including a lack of responsiveness, poor layout, and non-intuitive mix of Welsh and English text.
  - Link to the website to rework: [Saith Seren](http://www.saithseren.org.uk/)

Our task was to **completely rework the website** to improve its user experience, design, and functionality. The project involved transforming the site into an intuitive and bilingual platform, with many functionalities useful to the center, that could be managed by the staff through a robust administrative system.

---


## Features & Functionality

The new Saith Seren website includes the following key features:

- **Bilingual Support**: Seamless switching between Welsh and English content.
- **Event Management System**: Staff can add, modify, and delete events directly through the website.
- **Newsletter Management**: Users can subscribe to the newsletter, and admins can manage subscribers, upload newsletters to the website content and send them via email.
- **Room Booking System**: Users can submit room booking requests through the website, and admins can manage these requests.
- **Gallery**: A picture gallery that allows users to view, expand, and navigate through images uploaded by the admin.
- **Administrative Panel**: A back-end system where administrators can manage the website's content, including events, gallery, newsletters, and user data.

---


## Project Structure

The project is organized into several directories and files that handle different aspects of the website's functionality. Here's a structured breakdown:

### 1. Core Files
These files are located in the root directory and contain the core functionality for the website:

- **index.php**: The main entry point of the website. Displays the homepage, including an introduction to Saith Seren and news updates.
- **config.php**: Contains database configuration settings (e.g., host, username, password).
- **nav.php**: The navigation bar that is included on all pages.
- **footer.html**: Footer section used across the website.
- **style.css**: Global CSS file for styling the main reused elements across the entire website.

### 2. Calendar System
The calendar system allows the management of events. Files related to the calendar are:

- **calendar.php**: Manages the display and backend logic of the event calendar, including adding, updating, and deleting events.
- **calendar.css**: Stylesheet for the event calendar.
- **calendarajax.php**: Handles AJAX requests for adding, updating, and deleting events without refreshing the page.
- **calendarjs.php**: JavaScript file that handles frontend calendar interactions, such as drawing the calendar and showing event details.

### 3. Contact & Support
Files related to contacting Saith Seren and providing support:

- **contact.html**: Contact page where users can submit inquiries.
- **contact.css**: Stylesheet for the contact page.
- **support.php**: Provides additional support or help information.

### 4. Event Management
Files related to displaying and managing events:

- **events.php**: Displays the list of events.
- **events.css**: Stylesheet for the events page.

### 5. Gallery
The gallery displays images related to events at Saith Seren. Files related to the gallery:

- **gallery.php**: Manages the display of images in a thumbnail gallery format.
- **gallery.css**: Stylesheet for the gallery page.
- **gallery.js**: Handles JavaScript interactions for the gallery (e.g., image zooming).

### 6. User Management
These files handle user registration, login, profiles, and password reset:

- **register.php**: Page for new users to register.
- **profile.php**: Displays the profile page for logged-in users.
- **resetpassword.php**: Allows users to reset their password.

### 7. Administrative System
The administrative system allows staff to manage different aspects of the website, including events, users, and content:

- **panel.php**: Main administrative panel where admins can manage users, send newsletters, and upload images to the gallery.
- **roomrequest.php**: Form that allows users to request room bookings.
- **roomrequests.php**: Admin page to manage room booking requests.

### 8. Content Display & Management
These files are responsible for displaying dynamic content and interacting with the database:

- **contentdisplayer.php**: Handles the display of content from the database (e.g., news updates).
- **fetchdata.php**: Fetches data from the database to be displayed on the website.

### 9. Classes
The `classes/` directory contains reusable PHP classes for handling user authentication and registration:

- **classes/Login.php**: Handles the login functionality for users.
- **classes/Registration.php**: Manages user registration, including adding new users to the database.

### 10. Views
The `views/` directory contains different views depending on whether the user is logged in or not:

- **views/logged_in.php**: View for logged-in users used when accessing the profile page through the navigation bar.
- **views/not_logged_in.php**: View for users who are not logged in  when accessing the profile page through the navigation bar.
- **views/register.php**: The registration form view.

### 11. Gallery Images
The `gallery/` directory stores images used n the gallery section.

### 12. Newsletters
The `newsletters/` directory stores PDF files of newsletters that are uploaded by admins to be sent to subscribers.

---


## Technologies Used

This project utilized a variety of technologies and libraries.

### 1. **Front-End**
- **HTML5 & CSS3**: Used for the structure and styling of the web pages, ensuring that the website is user-friendly and responsive across devices.
- **JavaScript**: Handles interactivity on the client side, especially for the event calendar and gallery features.
- **jQuery**: Simplifies DOM manipulation and event handling in several parts of the site, including the gallery and calendar.

### 2. **Back-End**
- **PHP**: Serves as the core back-end language used to interact with the MySQL database, manage session control, handle form submissions, and more.
  - Classes (`Login.php`, `Registration.php`): Custom PHP classes to manage user authentication and registration processes.
- **MySQL**: The relational database used to store user information, event details, room booking requests, and other dynamic content managed by the admin panel.

### 3. **Third-Party Libraries**
- **PHPMailer**: Handles email functionality in the project, such as sending newsletters to subscribers and confirmation emails during registration.

### 4. **Development Tools**
- **DevServer (Wamp/XAMPP)**: A local server environment used for testing and developing the website, including database management with MySQL and hosting PHP scripts.

---


## Setup & Installation

Follow these steps to set up the Saith Seren website locally and get it running:

### 1. Prerequisites

Make sure you have the following installed on your machine:

- **PHP 7.1.3 or higher**: The website is developed with PHP, and the version used is **PHP 7.1.3 x86**.
- **MySQL**: For database management.
- **Apache** or **Nginx**: For hosting the website locally. Tools like **WAMP** or **XAMPP** are recommended as they provide an all-in-one solution for PHP, MySQL, and Apache.
- **DevServer**: Used for local development and database management.

### 2. PHP Configuration

To enable automatic mailing functionality (for sending newsletters), you will need to modify the PHP configuration:

1. Open your PHP installation directory, find the `php.ini` file, and edit it.
2. Uncomment the following line by removing the semicolon (`;`) in front of it:
     ```ini
     extension=php_openssl.dll
  This allows the PHPMailer library to send emails over secure connections.

### 3. Database Setup

1. Locate the `saith.sql` file (the database schema) and import it into your MySQL server. You can do this using a tool like **phpMyAdmin** or through the MySQL command line:
    ```
    mysql -u username -p saith < saith.sql
    ```

2. Update the database connection details in the following files:

- `config.php`: Enter your database credentials (host, database name, user, password) to connect to MySQL.
- `calendar.php`: Update the database connection information here as well to enable event management functionality.

### 4. File Setup

1. Clone or download the repository to your local machine:
    ```
    git clone https://github.com/YourUsername/saith-seren.git
    ```

3. All website files are stored in the `main` folder. If you rename the `main` folder, ensure that you update the file paths in `nav.php` to reflect the new folder name.

4. Place the project folder in the `www` directory of your local server setup (WAMP/XAMPP/DevServer).

### 5. Running the Website Locally

1. Start your local server (WAMP, XAMPP, or DevServer).

2. Open your browser and navigate to:
    ```
    http://localhost/your-folder-name/index.php
    ```

Replace `your-folder-name` with the actual directory name where your project is stored.

### 6. Admin Setup

To grant admin permissions to a user:

1. Ensure the user is registered via the registration page.
2. Once registered, open your MySQL database and set the `admin` field of the corresponding user to `1` in the `users` table. This will give the user full administrative access to manage content, events, and room requests.

### 7. Mailing System Setup

1. The website uses **PHPMailer** to handle email functionalities, such as sending newsletters and registration confirmations.

2. Ensure your SMTP settings are correctly configured in `panel.php` to send emails:
- Set the appropriate `Host`, `Username`, `Password`, and `Port` for the SMTP server you are using (e.g., Gmail SMTP).

### 8. Troubleshooting

- If you encounter issues with sending emails, verify that your server allows outgoing SMTP connections.
- Check that you have properly set up the `php_openssl.dll` extension in your `php.ini` file to allow secure email transmission. I had this issue.
- If there are any database connection errors, ensure that the credentials in `config.php` and `calendar.php` are correct and that your MySQL server is running.

