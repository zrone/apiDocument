<?php
/**
 * Created by PhpStorm.
 * User: zrone
 * Date: 16/1/12
 * Time: 10:57
 */

namespace Vendor\AnnotationBundle\Annotation;

use stdClass;

final class ParseInteger implements ParseType
{
	private $annotationString;

	// 参数名称
	private $parseName;

	// 是否必须
	private $parseRequire;

	// 参数描述信息
	private $parseOptions;

	// 参数深度
	private $parseDepth = 0;

	public function __construct( $annotationString )
	{
		$this->annotationString = $annotationString;
	}

	public function segmentString()
	{
		// TODO: Implement segmentString() method.
		preg_match( "/\{.*\}/", $this->annotationString, $optionsDocument );
		$optionsDocument = !empty( $optionsDocument ) ? $optionsDocument[ 0 ] : "";

		if( !empty( $optionsDocument ) ) {
			$this->parseOptions = json_decode( trim( $optionsDocument, '"' ) );
		}

		$this->annotationString = rtrim( trim( str_replace( $optionsDocument, "", $this->annotationString ) ), "," );

		$annotationArray = explode( ",", $this->annotationString );

		foreach( $annotationArray as $key => $value ) {

			list( $leftKey, $rightValue ) = explode( "=", trim( $value ) );

			switch( trim( $leftKey ) ) {
				case 'name':
					$this->parseName = trim( $rightValue, '"' );
					break;

				case 'require':
					$this->parseRequire = trim( $rightValue );
					break;

				case 'length':
					$this->parseLength = intval( trim( $rightValue ) );
					break;

				case 'max':
					$this->parseMax = intval( trim( $rightValue ) );
					break;

				case 'min':
					$this->parseMin = intval( trim( $rightValue ) );
					break;

				case 'depth':
					$this->parseDepth = intval( trim( $rightValue ) );
					break;

				default:
					break;
			}
		}
	}

	public function getParse()
	{
		// TODO: Implement getParse() method.
		$this->segmentString();

		$stdObject = new stdClass();

		$stdObject->name = $this->parseName;
		$stdObject->require = $this->parseRequire;
		$stdObject->options = $this->parseOptions;
		$stdObject->depth = $this->parseDepth;
		$stdObject->description = "整型";

		return $stdObject;
	}
}