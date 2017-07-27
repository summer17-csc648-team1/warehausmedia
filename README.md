# warehausmedia
Summer 2017 Team 1 project for CSC 648

### Initial setup
After cloning the app, you'll need to set up your database.

Run this script to get started:

```
bin/db_setup
```

This script will create your database with the user `'root'@'localhost'` using no password so that the app will automatically connect with the given configuration. It will also create all the tables and seed the Categories table as well. You should check that it worked by running these commands one at a time:

```
mysql -u root
show databases;
use warehaus_media;
show tables;
select * from Categories;
```
