Yii2 Frontend Controller
========================
A special controller for your frontend department that allows for easy access to any view/layout combination without going through their respective controllers (avoiding the need to login or have a db).

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist degordian/yii2-frontend-controller "*"
```

or add

```
"degordian/yii2-frontend-controller": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= \degordian\frontendController\AutoloadExample::widget(); ?>```