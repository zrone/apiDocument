<?php
/**
 * Created by PhpStorm.
 * User: zrone
 * Date: 16/1/12
 * Time: 19:20
 */

namespace Vendor\AnnotationBundle\Annotation;

use stdClass;

final class ParseUrl implements ParseType
{
	private $annotationString;

	// 接口名称
	private $parseUrl;

	public function __construct( $annotationString )
	{
		$this->annotationString = $annotationString;
	}

	public function segmentString()
	{
		// TODO: Implement segmentString() method.
		list( $key, $value ) = explode( "=", $this->annotationString );
		if( !empty( $key ) && trim( $key ) == "url" ) {
			$this->parseUrl = strtolower( trim( $value, '"' ) );
		}
	}

	public function getParse()
	{
		// TODO: Implement getParse() method.
		$this->segmentString();
		$stdObject = new stdClass();
		$stdObject->url = $this->parseUrl;
		$stdObject->description = "请求地址";

		return $stdObject;
	}
}