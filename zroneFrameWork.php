<?php
/**
 * Created by PhpStorm.
 * User: zrone
 * Date: 16/1/4
 * Time: 05:57
 */

defined( "APP_PATH" ) || define( "APP_PATH", dirname( __FILE__ ) );
zroneFrameWorkAutoLoad();

/**
 * 设置自动加载方法
 */
function zroneFrameWorkAutoLoad()
{
	spl_autoload_register( 'zroneClassLoader' );
}

/**
 * 自动加载
 *
 * @param $className
 */
function zroneClassLoader( $className )
{
	$path = array(
		str_replace( "\\", "/", ( dirname( __FILE__ ) . DIRECTORY_SEPARATOR . "Vendor/" ) ),
		str_replace( "\\", "/", ( dirname( __FILE__ ) . DIRECTORY_SEPARATOR . "FrameWork/" ) ),
		str_replace( "\\", "/", ( dirname( __FILE__ ) . DIRECTORY_SEPARATOR . "Application/" ) )
	);

	if( isset( $path ) && is_array( $path ) ) {
		$Iterator = new ArrayIterator( $path );

		$Iterator->rewind();
		$pathString = "";

		while( $Iterator->valid() ) {
			$pathString .= $Iterator->current() . ";";

			if( $Iterator->key() == count( $path ) - 1 ) {
				$pathString = rtrim( $pathString, ";" );
			}
			$Iterator->next();
		}

		set_include_path( $pathString );
		spl_autoload_extensions( ".php, .class.php" );
		spl_autoload( $className );
	} else {
		try {
			throw new Exception( "<code style='color: red; font-size: 22px; display: block; text-align: center; height: 40px; line-height: 40px;'>I'm sorry, my dear! The FrameWork is Wrong……😫</code>" );
		}
		catch( Exception $e ) {
			echo $e->getMessage();
		}
	}
}