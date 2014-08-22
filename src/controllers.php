<?php

use Symfony\Component\HttpFoundation\Response;

$app->get('/esi/{section}', function ($section) use ($app) {
	return "<esi:include src=\"/renderesi/".$section."\" />";
});

$app->get('/renderesi/{section}', function ($section) use ($app) {
	$sectionItem = $app['YAMLRepository']->getCurrentSectionDatas( $app['YAMLRepository']->setCurrentSection( $section ) );

	$fileContent = file_get_contents( __DIR__.'/../ressources/'.$sectionItem["source"] );
	
	$response = new Response($fileContent);
	$response->setTtl(300);

    return $response;
});

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
