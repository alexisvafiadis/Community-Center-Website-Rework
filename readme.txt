These are just some indications in case you want to try the website.

The version of PHP is PHP 7.1.3 x86

In order to automate the mailing of the newsletter, we had to change one of the properties of php.
To make it work, uncomment extension=php_openssl.dll in (php install directory)/php.ini

All website files are in the "main" folder, if you rename the folder make the according changes to the php code in "nav.php".

To give someone admin permissions the user must be registered, and then its admin property must be set to 1.

The database information must be entered in config.php and calendar.php

saith.sql is the database and must be imported.