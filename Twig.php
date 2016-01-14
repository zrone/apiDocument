<?php

/**
 * Created by PhpStorm.
 * User: zrone
 * Date: 16/1/14
 * Time: 13:26
 */
class Twig extends Exception
{
	private $instance;
	private $twig;

	public function __construct()
	{
		require_once( APP_PATH . "/Vendor/autoload.php" );

		$loader = new Twig_Loader_Filesystem( APP_PATH . '/Vendor/AnnotationBundle/templates' );
		$this->twig = new Twig_Environment( $loader, array(
//			'cache' => APP_PATH . '/Vendor/AnnotationBundle/cache',
		) );
		$this->instance = &$this;
	}

	public function render( $tempName, $data )
	{
		if( !file_exists( APP_PATH . '/Vendor/AnnotationBundle/templates/' . $tempName ) ) {
			try {
				throw new Exception( "<code style='color: red; font-size: 22px; display: block; text-align: center; height: 40px; line-height: 40px;'>I'm sorry, my dear! The file is not found!……😫</code>" );
			}
			catch( Exception $e ) {
				echo $e->getMessage();
			}
		} else {
			$template = $this->twig->loadTemplate( $tempName );

			if( !is_array( $data ) ) {

				try {
					throw new Exception( "<code style='color: red; font-size: 22px; display: block; text-align: center; height: 40px; line-height: 40px;'>I'm sorry, my dear! The type of param is error!……😫</code>" );
				}
				catch( Exception $e ) {
					echo $e->getMessage();
				}
			} else {
				echo $template->render( $data );
			}
		}
	}

	public function getInstance()
	{
		return $this->instance;
	}
}