# 7_CS213_Ecomm
This contains the source code and video of a simple E-comm website made by using php, html, sql, bootstrap 4



   E-COMMERCE APPLICATION - Here's the [Link](https://youtu.be/PrTnEUWVtV8) for demo of the project.

GETTING STARTED
> To run the code, you need to first install xampp application.
> For that :-
  . Open the Apache Friends website.
  . Click the XAMPP for Windows button to save the file on your desktop.
  . Double-click the downloaded file to launch the installer.
  . Click the OK button.
  . Click the next button.
  . XAMPP offers a variety of components that you can install, such as MySQL, phpMyAdmin, PHP, Apache, and more. For the most part, you will be using most of these components, as such it’s recommended to leave the default options.
  . Click the Next button.
  . Use the default install location, or choose another folder to install the software in the “Select a folder” field.
  . Click the Next button. 
  . Clear the Learn more about Bitnami for XAMPP option.
  . Click the Next button.
  . Click the Allow access button to allow the app through the firewall (if applicable).
  . Click the Finish button.
  . Choose the language.
  . Click the save button.
Once you complete the steps, the XAMPP Control Panel will launch, and you can begin the web server environment configuration.

The XAMPP Control Panel includes three main sections. In the Modules section, you’ll find all the web services available. You can start each service by clicking the Start button.

When you start some of the services, including Apache and MySQL, on the right side, you’ll also see the process ID (PID) number and TCP/IP port (Port) numbers each service is using. For example, by default Apache uses TCP/IP port 80 and 443, while MySQL uses TCP/IP port 3306.

Now........

1.Start the Apache and MySQL by running the file "xampp-control.exe" placed in the same location where you have downloaded your xampp.Next, Download the zip folder attached and keep it in htdocs folder present inside xampp directory.

2.Extract it in the same directory.

3.Don't change the names of any files or folders.

4.Now go to browser and type - "localhost/phpmyadmin". Make a database named "users" in it. In the following database make these tables:-

5.Make table "userinfo" with fields user_name(varchar(100)), user_email(varchar(255)), user_password(int(11)), user_activation_code(varchar(80)), user_email_status(vaarchar(15)), user_mobile_number(int(10)), user_address(varchar(70)), user_role(varchar(30)).

6.Now make table "cardverify" with fields user_email(varchar(255)), user_email_verification(varchar(255)).

7.After that make table "cart" with fields useremail(varchar(255)), productname(varchar(255)), price(int(7)), companyname(varchar(255)).

8.Now make table "electronics" wit fields useremail(varchar(255)),productname(varchar(255)),companyname(varchar(255)), features(varchar(255)), quantity(int(6)), image(longblob), price(int(7)), rownumber(int(7)).

9.For payment purposes , make table "payment" with fields nameoncard(varchar(255)), cardno(bigint(16)), validity(date), cvv(int(3)), pin(int(4)), balance(int(11)).

10. After making the databases, open a new tab and type-"localhost/7_CS213". This will list all the files and folder present inside the folder.

11. Open the main.php file. It is the base file.

*As soon as you open our website to see and buy the  products sign up if you are new user or sign in if you  are already registered .

*You can register either as a seller or a buyer and fill the credentials accordingly.

*If you are new user after signing up if you have to sign in.

*Two users can't have the same email id.

*The search for now is minimal and searches using particular keyword only.

*Right now only the electronics page is enabled but the same procedure can be followed for other sections as well.

*Complete your payment method by going to the profile section.

*If you are a seller you can add product by going to profile section.

*Both buyer and seller can check their available balance by entering their pin in profile section.

*The added product appears immediately in the respected category.

*The user for now has to first add a product to cart to buy it.

*The user then has to give pin and quantity for a product.
