# Php-Mongo-CRUD
A crud operation in php using mongodb as a database.


Installation requirements:
-------------------------
In order to run this project, php and monogodb must be installed on your system.

### Steps to install mongodb for windows users:
1. Download mongodb dll file from [https://pecl.php.net/package/mongodb](https://pecl.php.net/package/mongodb)

 Note: click on dll link to get all dll lists. Here you can download dll file according to your php version.
 In my case(i am using PHP version 5.6.20) i choosed mongodb 1.1.7 and downloaded 5.6 Thread Safe (TS) x86 [windows.php.net/downloads/pecl/releases/mongodb/1.1.7/php_mongodb-1.1.7-5.6-ts-vc11-x86.zip](windows.php.net/downloads/pecl/releases/mongodb/1.1.7/php_mongodb-1.1.7-5.6-ts-vc11-x86.zip). 
 For x86 or x64, check your architecture from phpinfo() function. Don't be confuse with windows 32 or 64 bit version. 
 
2. Now extract your zip and put php_mongodb.dll file in ext directory which is itself within php directory.

3. Add extension in new line "extension=php_mongodb.dll" in your php.ini file.

4. Now restart your php server. You have successfully installed mongodb driver.

### Steps to install mongodb for linux users:

1. Follow the link to install mongodb driver for linux - [http://php.net/manual/en/mongodb.installation.pecl.php](http://php.net/manual/en/mongodb.installation.pecl.php)





Installation:
-------------
1. Download the code from repository. 

2. Unzip the zip file.

3. Put the folder 'Php-Mongo-CRUD-master' in root directory of your xampp/wamp. In case of xampp: put it in htdocs folder.

4. Import mongo database 'users_db.json' into your mongodb.
   - mongoimport --db login_db --collection user --file users_db.json
   
5. Open browser; goto localhost/Php-Mongo-CRUD-master and press enter.

The login screen will appear.

### Login details:
User Name: 	admin

password: 	4444

login type: admin
