phpSummerCamp Silex Workshop
============================

With some very simple examples, during **1h30**, you will discover how to :

* Run Silex locally with [Vagrant](https://www.vagrantup.com/) / [Docker](https://www.docker.com/) / [phusion](http://phusion.github.io/baseimage-docker/)
* Run Silex with [php-fpm](http://php-fpm.org/) + [nginx](http://nginx.org/)
* Build a simple navigation system from a [YAML](http://www.yaml.org/) content tree, [Twig](http://twig.sensiolabs.org/) for templating & [bootstrap](http://getbootstrap.com/) for CSS
* Use [Pimple](http://pimple.sensiolabs.org/) to inject the [YAML](http://www.yaml.org/) content within the **$app container**, and re-use everywhere
* Provide 3 ways to embed external HTML blocks : SSI / [ESI](http://fr.wikipedia.org/wiki/Edge_Side_Includes) / AJAX, with HTTP Cache TTL (use [HttpFoundation](http://symfony.com/doc/current/components/http_foundation/introduction.html))
* Create a generic [service provider](http://silex.sensiolabs.org/doc/providers.html) to compile locally the **bootstrap .less** files with cache / watch changes / compress (use [less.php](https://github.com/oyejorge/less.php))

Branch topics :
---

* Branch **master** is empty
* Branch **01-no-esi** is the starting point if the workshop. The AJAX call is in progress (/renderesi route is missing), no ESI setup, no .less compilation
* Branch **02-no-less** is the same code, containing AJAX & ESI setup example
* Branch **03-final** is the final code, containing the .less processing for bootstrap

How to run the workshop
---

#### From the Vagrant/Docker

Check Vagrant & Docker are installed & so :
```bash
vagrant up --provider=docker
```

If you are behind a **proxy**, uncomment & set your proxy values in the Vagrantfile & Dockerfile

#### From the SummerCamp VBox

With SSH go to the Silex folder :
```bash
ezsc@ezsc:/var/www/html/workshops/silex$
```

You should already be on the **01-no-esi** branch, with all vendors available,
Up to branch **02-no-less**, need to :
```bash
composer update oyejorge/less.php
```

Exercises
---

#### From 01-no-esi

* Finalize the AJAX call, add "/renderesi" route to controllers.php
* Add "/esi" route to controllers.php, with TTL cache
* Add entry to the menu.yaml
* Add template code to the main.twig

To speed up, checkout the **02-no-less** branch

#### From 02-no-less

* Add **"oyejorge/less.php": "~1.5"** to composer.json & update
* Create the **LessProvider**, both **register** & **boot** methods
* Register the provider in **app.php**
* Play with **variables.less** to check everything works fine

To speed up, checkout the **03-final** branch

Enjoy !
















