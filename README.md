# Php-Mongo-CRUD
A crud operation in php using mongodb as a database.


Installation requirements:
-------------------------
In order to run this project, php and monogodb must be installed on your system. Follow the link to install mongodb driver for php - [http://php.net/manual/en/mongodb.installation.pecl.php](http://php.net/manual/en/mongodb.installation.pecl.php)

### Steps to install mongodb for windows users:
1. Download mongodb dll file from [https://pecl.php.net/package/mongodb](https://pecl.php.net/package/mongodb)

Note: click on dll link to get all dll lists. Here you can download dll file according to your php version.
In my case(i am using PHP version 5.6.20) i choosed mongodb 1.1.7 and downloaded 5.6 Thread Safe (TS) x86 [windows.php.net/downloads/pecl/releases/mongodb/1.1.7/php_mongodb-1.1.7-5.6-ts-vc11-x86.zip](windows.php.net/downloads/pecl/releases/mongodb/1.1.7/php_mongodb-1.1.7-5.6-ts-vc11-x86.zip)



Installation:
-------------
1. Download the code from repository. 

2. Unzip the zip file.

3. Put the folder 'Php-Mongo-CRUD-master' in root directory of your xampp/wamp. In case of xampp: put it in htdocs folder.

4. Import mongo database 'users_db.json' into your mongodb. 
   - sudo mongoimport --db login_db --collection user --file users_db.json
   
5. Open browser; goto localhost/Php-Mongo-CRUD-master and press enter.

The login screen will appear.

### Login details:
User Name: 	admin

password: 	4444

login type: admin
