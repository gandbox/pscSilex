<?php

use Symfony\Component\HttpFoundation\Response;

$app->get('/ssi/{section}', function ($section) use ($app) {

	$sectionItem = $app['YAMLRepository']->getCurrentSectionDatas( $app['YAMLRepository']->setCurrentSection( $section ) );

    return file_get_contents( __DIR__.'/../ressources/'.$sectionItem["source"] );

});

# Route for homepage
$app->get('/{section}', function ($section) use ($app) {

	$sectionItem = $app['YAMLRepository']->getCurrentSectionDatas( $app['YAMLRepository']->setCurrentSection( $section ) );

	$response = new Response(
    	$app['twig']->render('main.twig', array(
            'menu' => $app['YAMLRepository']->getMenuArray(),
            'section' => $sectionItem,
        ))
    );

	$response->setTtl(30);

    return $response;
})
->value('section', $app['YAMLRepository']->getMenuFirst() );
