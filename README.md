# 7_CS213_Ecomm
This contains the source code and video of a simple E-comm website made by using php, html, sql, bootstrap 4



   E-COMMERCE APPLICATION - Here's the [Link](https://youtu.be/PrTnEUWVtV8) for demo of the project.

GETTING STARTED

1.Download the zip folder and keep it in a place where your apache server can operate upon it(if using xampp server keep in htdocs folder)

2.Exrtract it in the same directory.
// Don't forget to start your server both Apache and MySQL if using Xampp 
3.Don't change the names of any files or folders.

4.Now make database users in phpmyadmin feature of localhost.

5.Make table "userinfo" with fields user_name(varchar(100)), user_email(varchar(255)), user_password(int(11)), user_activation_code(varchar(80)), user_email_status(vaarchar(15)), user_mobile_number(int(10)), user_address(varchar(70)), user_role(varchar(30)).

6.Now make table "cardverify" with fields user_email(varchar(255)), user_email_verification(varchar(255)).

7.After that make table "cart" with fields useremail(varchar(255)), productname(varchar(255)), price(int(7)), companyname(varchar(255)).

8.Now make table "electronics" wit fields useremail(varchar(255)),productname(varchar(255)),companyname(varchar(255)), features(varchar(255)), quantity(int(6)), image(longblob), price(int(7)), rownumber(int(7)).

9.For payment purposes , make table "payment" with fields nameoncard(varchar(255)), cardno(bigint(16)), validity(date), cvv(int(3)), pin(int(4)), balance(int(11)).

10.The main page is "main.php".Open it to get to the homepage.



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
