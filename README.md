Built on [Yii 2](http://www.yiiframework.com/) application best for rapidly creating small projects.

DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      migrations/         contains migration tables
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources

REQUIREMENTS
------------
The minimum requirement by this project template that your Web server supports PHP 5.4.0.
Clone the Project with URL https://www.github.com/abhishekbvs/vidyut-hackathon.git
Now you should be able to access the application through the following URL, assuming `basic` is the directory
directly under the Web root.
~~~
http://localhost/basic/web/
~~~

CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```
- Yii won't create the database for you, this has to be done manually before you can access it.
- Use the Migrations to populate tables into your Database

