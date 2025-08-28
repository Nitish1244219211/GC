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

## Project Structure
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

NOTE: This site works with php, mysql and hell lot of things where we will need one stop solution for stuff like database management dashboard like phpmyadmin and server.
<br>
I'll be explaining this setup to you like to a 7 year kid but still you face any challenge in this, feel free to contact me anytime :)
<br>
For that we will need to download any web server like XAMP/WAMP.
<br>
I will be using XAMP but you can use other as well.
1. **Webserver Setup & Installation**
   - Download the XAMP using browser.
   - After successful installtion & setup in your desired drive (say drive: D) search for htdocs folder in the XAMP folder created after installation.
   <br>
   eg. Path for htdocs in my system is as follow:

      ```bash
      D:\apps\xamp-new\htdocs
      ```
   - Go to htdocs and follow these steps:
      - Move the file named `index` to new folder (say real-index).
      - Create a new folder(say Site) for storing content of site.[OPTIONAL].
      <br>
      NOTE:Reason of creating this folder will be expalined later.

2. **Cloning Site from Github**   
   - Open your code editor(say VS Code).
   - Open the folder Site created in `htdocs` recently or just open `htdocs` if you didn't follow that optional step, it's completely fine. 
   - Open the terminal in the code editor.
   You can use these shortcut for this as well.
      ```bash
      Ctrl + Shift + `
      ```
      OR
      ```bash
      Ctrl + Shift + 5
      ```
   - Enter following command to clone all the files from my github repository to your local system:
       ```bash
      git clone https://github.com/Nitish1244219211/GC.git
    
      ```
   - Now all the required files and system requirements are on your local system and we are good to go even without internet which can obviously save by turning off your internet connection if you want to ;)

3. **Database & Server setup**
   - Open the XAMP and click on start button adjacent to Apache & Mysql as shown in the reference image.
   ![xamp-start](/assets/xamp-start.png) 
   **XAMP CONTROL PANEL**
   - After successfully running both now click on Admin button adjacent to Mysql to open PhpMyAdmin in your browser.
   - There create a new database named `morphed_rage`
   - Now click on the import button and search for `morphed_rage.sql` file in the files cloned from github.
   eg. Path for this file in my system is like:
      ```bash
      D:\apps\xamp-new\htdocs\Site\morphed_rage.sql
      ```
      Image for the reference in phpmyadmin is below:
       ![PhpMyAdmin](/assets/phpmyadmin.png) 
   **PhpMyAdmin**

      NOTE:This will load all the structure used in the database along with some dummies so that you didn't feel lonely over here...
4. **Run the Site**
   - Go to your browser the search for this for 
   <br>
      If folder Site is created:
   ```bash
      http://localhost/Site
   ```
      If folder Site isn't created:
   ```bash
      http://localhost/
      ```

Boooom!!! Here is your Site...

## Usage
- Register a new account (if registration is enabled).  
- Log in with your credentials.  
- Start chatting on the chat page.  

---

## Screenshots  

![Signup Page](/assets/signup.png) 
   **Signup Page**
---
![Login Page](/assets/login.png) 
   **Login Page**
--- 
![Page after login Page](/assets/page-after-login.png)  
   **Page after login Page**
---
![Chat Page](/assets/chat.png)  
   **Chat Page**
---
![SQ form Page](/assets/sq-form.png)  
   **SQ(security questionnaire) form Page**
---

## Help!!!
This is just an experimental site from my side which means it will definitely have multiple areas to work on and has huge scope for optiization like saving pics for user profile in compress format in server, more seemless and imersing experience for users.

Feel free to collaborate and contact me in my technicalities regarding this site.

Any suggestions/feedback...
I'm open to all :)
      
## FAQS & Error Debugging Recomendations
 - ##### My Apache or Mysql isn't starting at all, its showing like port being used or blocked something...
   Solution: By default, Apache use port 80 or 8080 & Mysql uses 3306 to provide it's services.
   <br>
   Most common reason for this your system is running some other not so necessary service(like Skype) through that port.
   <br>
   You can either stop that unnecessary service or change the default port of these required services.
   Follow these steps:
   
   - Open cmd(command line) and use this command to check which service is using port `80` or `3306`.
   Let's say its Mysql.
      ```bash
       netstat -ano | findstr :3306
      ```
   - This will list down the services using the `3306` port.
   Check their PID on extreme right side(say it is 4).
   - Now to check the name of the service enter:
      ```bash
      tasklist /svc /fi "pid eq 4"
      ```
      This give service name in IMAGE NAME column(say WinrRM).
   - Now to services from the start button/window button.
   A list of services running will appear.
   - Search for that specific service, click on it and click on `Stop the service`
   - Now try to start the Apache or Mysql.
   Hope this helps...