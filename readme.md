# Contact us Form in PHP  
Illustrate the use of TDD with a simple Contact Us form that saves the data to a MySql database.  

## Prerequisites  
- MySql server
- Setup Database running the following command  

```
mysql -u root < create-db.sql
```
- Install PHP dependencies

```
composer require phpunit/phpunit
```

- Configure PHPUnit runner with default options  

```
vendor/bin/phpunit --generate-configuration
```

- Run the tests  

```
vendor/bin/phpunit
```


## Development  
Spin up the local web server

```
php -S localhost:8000
```
