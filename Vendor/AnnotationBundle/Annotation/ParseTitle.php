<?php
/**
 * Created by PhpStorm.
 * User: zrone
 * Date: 16/1/12
 * Time: 13:57
 */

namespace Vendor\AnnotationBundle\Annotation;

use stdClass;

class ParseTitle implements ParseType
{
	private $annotationString;

	// 接口名称
	private $parseTitle;

	public function __construct( $annotationString )
	{
		$this->annotationString = $annotationString;
	}

	public function segmentString()
	{
		// TODO: Implement segmentString() method.
		list( $key, $value ) = explode( "=", $this->annotationString );
		if( !empty( $key ) && trim( $key ) == "name" ) {
			$this->parseTitle = trim( $value, '"' );
		}
	}

	public function getParse()
	{
		// TODO: Implement getParse() method.
		$this->segmentString();
		$stdObject = new stdClass();
		$stdObject->title = $this->parseTitle;
		$stdObject->description = "标题";

		return $stdObject;
	}
}