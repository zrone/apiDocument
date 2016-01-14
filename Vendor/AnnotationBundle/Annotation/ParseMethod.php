<?php
/**
 * Created by PhpStorm.
 * User: zrone
 * Date: 16/1/12
 * Time: 19:21
 */

namespace Vendor\AnnotationBundle\Annotation;

use stdClass;

final class ParseMethod implements ParseType
{
	private $annotationString;

	// 接口名称
	private $parseMethod;

	public function __construct( $annotationString )
	{
		$this->annotationString = $annotationString;
	}

	public function segmentString()
	{
		// TODO: Implement segmentString() method.
		list( $key, $value ) = explode( "=", $this->annotationString );
		if( !empty( $key ) && trim( $key ) == "method" ) {
			$this->parseMethod = strtoupper( trim( $value, '"' ) );
		}
	}

	public function getParse()
	{
		// TODO: Implement getParse() method.
		$this->segmentString();
		$stdObject = new stdClass();
		$stdObject->method = $this->parseMethod;
		$stdObject->description = "请求方法";

		return $stdObject;
	}
}