<?php
/**
 * Created by PhpStorm.
 * User: zrone
 * Date: 16/1/12
 * Time: 11:13
 */

namespace Vendor\AnnotationBundle;

use ArrayIterator;
use stdClass;

final class Configure
{
	private $annotationIni;
	private $instance;

	public function __construct()
	{
		$this->annotationIni = parse_ini_file( str_replace( "\\", "/", dirname( __FILE__ ) . "/configure/annotation.ini" ), true );

		$iterator = new ArrayIterator( $this->annotationIni );
		$stdObject = new stdClass();

		$iterator->rewind();
		while( $iterator->valid() ) {
			$key = $iterator->key();
			$value = $iterator->current();

			$sonObject = new stdClass();
			$sonIterator = new ArrayIterator( $value );
			$sonIterator->rewind();

			while( $sonIterator->valid() ) {
				$sonKey = $sonIterator->key();
				$sonObject->$sonKey = $sonIterator->current();
				$sonIterator->next();
			}

			$stdObject->$key = $sonIterator;

			$iterator->next();
		}

		$this->instance = $stdObject;
	}

	public function getInstance()
	{
		return $this->instance;
	}
}