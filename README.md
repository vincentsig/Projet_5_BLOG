# Projet_5_BLOG
Creation of a PHP blog for a school project with OpenClassrooms.

## Introduction
This is one of my projects of my apprenticeship training with OpenClassrooms to be a PHP web-developer.
The main constraint, was to not use any Framework during the developing phase.
It’s the first time I’m developing a web-site in PHP.
I tried to do as much as I could whithout using any libraries. It was important for me to understand the basic of this language and the concept of the OOP.

## Code quality

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/01f9044f353e43cdaa9ffae5e1e3c265)](https://www.codacy.com/app/vincentsig/Projet_5_BLOG?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=vincentsig/Projet_5_BLOG&amp;utm_campaign=Badge_Grade)


## Information

The MVC structure is inspired by the php courses of Grafikart:  
https://www.grafikart.fr/formations/programmation-objet-php


The Bootstrap theme used for the CSS is Clean Blog created by Start Bootstrap: 
https://github.com/BlackrockDigital/startbootstrap-clean-blog



## Installation

1. Download and clone the github repositoy:  
https://github.com/vincentsig/Projet_5_BLOG.git

2. Import the script "blog.sql" in \Database to your own database managment system.

3.  Rename the file "config_sample.php" in app\config   into "config.php" and complete

4. Open the file config.php and complete the fields beetween ** ** to configure the PDO connection and your email adresse for the contact form.

5. To use the contact form on your localserver you need to edit your php.ini :  
[mail function]
- ; For Win32 only.  
- SMTP = localhost  
- smtp_port = 25  
- ; For Win32 only.  
- ;sendmail_from = me@example.com  
- ; For Unix only.  You may supply arguments as well (default: "sendmail -t -i").  

6. Managing back office on the application  

    You need to log with the admin account already available in your database.
- username: admin
-  login: admin  
         When you are connected with this account you can access to the backoffice directly on the application, there is a link in the footer "ESPACE ADMNISTRATION". You can now managment the users right. 

    
    
