Add your values to environnement.php (ip, user, password, nameofbdd, smtp-server, emaildomain and passwordrofyouremail),
You can use your super-agence.SQL to configure PHPMyadmin,
Change email on user table with role=admin to be admin,
http://mydomain"/index.php?action=admin" is the path for your url to access your admin,
create a user (anyone) in the register page and copy the password field value that you'd created in your table user to your admin user field (now you are admin with a right password),
don't forget to delete created user,
test and enjoy
