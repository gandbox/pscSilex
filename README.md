phpSummerCamp Silex Workshop
============================

With some very simple exemples, during 1:30h, you will discover how to :

* Run Silex with Vagrant / Docker / phusion ( php-fpm + nginx)
* Build a simple navigation system from a YAML content tree, Twig for templating & bootstrap for CSS
* Use Pimple to inject the YAML content within the $app container, and ruese everywhere
* Provide 3 ways to embed extrernal HTML blocks : SSI / ESI / AJAX, with differents HTTP Cache TTL (use HttpFoundation)
* Create a generic "service provider" to compile locally the bootstrap .less files with cache / watch changes / compress (use oyejorge/less.php)

1) Branch topics :
------------------

* Branch "master" is empty
* Branch "01-no-esi" is the project with all features, except the HTTP Cache / ESI setup & exemples
* Branch "02-noless" is the same code, containing HTTP Cache / ESI setup & exemples
* Branch "03-withless" is the final code exemple, containing the .less processing for boostrap


