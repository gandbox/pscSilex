<?php
namespace LessProvider;

use Silex\Application;
use Silex\ServiceProviderInterface;

/**
 * Create a LESS service provider to generate CSS file from LESS files
 */
class LessProvider implements ServiceProviderInterface
{

	public function register(Application $app)
	{
		if (!class_exists( "Less_Cache" )) {
			throw new \Exception("Less_Cache is not available !\nTry to install with composer : \"require\": \"oyejorge/less.php\": \"~1.5\" ");
		}
	}

	public function boot(Application $app)
	{
		$source = $app['less.source'];
		$target = $app['less.target'];
		$towatch = $app['less.towatch'];
		$cachedir = $app['less.cachedir'];
		$compress = $app['less.compress'];

		$compiled   = '';

		$less_files = array( $source => $towatch );
		$options = array(
			'cache_dir' => $cachedir,
			'compress' => $compress
			);

		$css_file_name = \Less_Cache::Get( $less_files, $options );
		$compiled = file_get_contents( $cachedir.$css_file_name );

		if ($compiled) {
			file_put_contents($target, $compiled);
		} else {
			throw new \Exception("Looks empty. Check your .less files");
		}

	}

}