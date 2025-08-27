# GC Chatting Site

A simple **PHP & MySQL based chatting website** where users can register, log in, and chat with each other.
---

## Features
- User registration & login system  
- Profile management  
- Secure password reset with security questions  
- Chatroom functionality  
- Responsive design with custom CSS  

---

## Technologies Used
- **Frontend**: HTML, CSS and JavaScript
- **Backend**: PHP  
- **Database**: MySQL (schema included in `morphed_rage.sql`)  

---

## 📂 Project Structure
```
GC/
upload/               # Folder for profile images (including default image)
chat.php              # Main chat page
dbconnect.php         # Database connection
index.php             # Landing page
login.php             # Login page
logout.php            # Logout script
process.php           # Handles login/registration logic
submit_message.php    # Handles message submission
reset_pwd.php         # Password reset
profile.php           # User profile part
welcome.css           # Stylesheet for page after login
morphed_rage.sql      # Database schema
pxl.png               # Background image for security form
get_sq_form.css       # Stylesheet for security form
nav.css               # Stylesheet for navigation bar
profile.css           # Stylesheet for profile page
style.css             # Main css file
ck_sq.php             # Checks sq form
ck-upload-size.php    # This file isn't ready yet(help!!! contact me)
nomsg.php             # Content to display if not messaged her yet...
dpusrdt.php           # Checks database for duplicate User signup
R.php                 # Just a welcome script 
footer.php            # Footer element 
set_sq.php            # Processing sq form 
nav.php               # Navbar
welcome.php           # Page after login
dpusralert.php        # Alert for duplicate User login 
navchat.php           # Navbar used in chatting room                                                 
```

---

## Installation & Setup

1. **Clone the repository**  
   ```bash
   git clone <repo-link>
   cd GC
   ```

2. **Import the database schema**  
   - Open phpMyAdmin (or MySQL CLI)  
   - Create a database, e.g. `gc_chat`  
   - Import `morphed_rage.sql` 

3. **Configure database connection**  
   - Open `dbconnect.php`  
   - Update DB credentials:  
     ```php
     $servername = "localhost";
     $username   = "root";
     $password   = "";
     $dbname     = "morphed_rage";
     ```

4. **Run the project**  
   - Place the `GC` folder in your web server root (e.g., `htdocs` for XAMPP, `www` for WAMP, or `/var/www/html` for Apache).  
   - Start Apache & MySQL from XAMPP/WAMP.  
   - Open in browser:  
     ```
     http://localhost/GC/index.php
     ```

---

## Usage
- Register a new account (if registration is enabled).  
- Log in with your credentials.  
- Start chatting on the chat page.  

---

## Screenshots
You can add images/screenshots here to showcase the site:  

![Signup Page](/assets/signup.png) 
---
![Login Page](/assets/login.png) 
--- 
![Page after login Page](/assets/page-after-login.png)  
---
![Chat Page](/assets/chat.png)  
---
![SQ form Page](/assets/sq-form.png)  
---

*(Store your images inside `GC/assets/images/` and update the paths above.)*  

---

## Help!!!
this is just an experiment site from my side which means it will definetly have multiple areas to work on and has huge scope for optiization like saving pics for user profile in compress format in server, more seemless and imersing experience for users.

Feel free to collaborate and contact me in my technicalities regarding this site.

Any suggestions/feedback...
I'm open to all :)
      
