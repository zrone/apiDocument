<?php
/**
 * Created by PhpStorm.
 * User: zrone
 * Date: 16/1/12
 * Time: 13:28
 */

namespace Vendor\AnnotationBundle;

use stdClass;

class ParseCore
{
	public $annotation;

	public function __construct( $document )
	{
		$this->annotation = $document;
	}

	private function readRow()
	{
		preg_match_all( "/@zroneDoc[\s\S]*?\)/", $this->annotation, $temp );

		if( !empty( $temp ) ) {
			$this->annotation = $temp[ 0 ];
		} else {
			return FALSE;
		}
	}

	private function docDelimiter()
	{
		$stdObject = new stdClass();
		foreach( $this->annotation as $key => $value ) {

			$row = preg_replace( "/( |\*|\\n|\\n\\r)/", "", $value );

			preg_match( "/\\\(.*)\(/", $row, $result );
			preg_match( "/\([\s\S]*\)/", $row, $main );

			if( !empty( $result ) && isset( $result[ 1 ] ) && !empty( $main ) && isset( $main[ 0 ] ) ) {
				$type = ucfirst( trim( $result[ 1 ] ) );
				$main = substr( $main[ 0 ], 1, strlen( $main[ 0 ] ) - 2 );

				$stdObject->isReturn = array();
				count( explode( "_", $type ) ) > 1 && $stdObject->isReturn = array_merge( $stdObject->isReturn, array( $key ) );
				$type = ltrim( $type, "R_" );

				switch( $type ) {
					case 'Title':
						$Title = new \Vendor\AnnotationBundle\Annotation\ParseTitle( $main );

						$stdObject->title = $Title->getParse();
						break;

					case 'Comment':
						$Comment = new \Vendor\AnnotationBundle\Annotation\ParseComment( $main );

						$stdObject->comment = $Comment->getParse();
						break;

					case 'Url':
						$Url = new \Vendor\AnnotationBundle\Annotation\ParseUrl( $main );

						$stdObject->url = $Url->getParse();
						break;

					case 'Method':
						$Method = new \Vendor\AnnotationBundle\Annotation\ParseMethod( $main );

						$stdObject->method = $Method->getParse();
						break;

					case 'String':
						$String = new \Vendor\AnnotationBundle\Annotation\ParseString( $main );

						if( in_array( $key, $stdObject->isReturn ) ) {
							$stdObject->rparam[] = $String->getParse();
						} else {
							$stdObject->param[] = $String->getParse();
						}

						break;

					case 'Enum':
						$Enum = new \Vendor\AnnotationBundle\Annotation\ParseEnum( $main );

						if( in_array( $key, $stdObject->isReturn ) ) {
							$stdObject->rparam[] = $Enum->getParse();
						} else {
							$stdObject->param[] = $Enum->getParse();
						}
						break;

					case 'Integer':
						$Integer = new \Vendor\AnnotationBundle\Annotation\ParseInteger( $main );

						if( in_array( $key, $stdObject->isReturn ) ) {
							$stdObject->rparam[] = $Integer->getParse();
						} else {
							$stdObject->param[] = $Integer->getParse();
						}
						break;

					case 'Float':
						$Float = new \Vendor\AnnotationBundle\Annotation\ParseFloat( $main );

						if( in_array( $key, $stdObject->isReturn ) ) {
							$stdObject->rparam[] = $Float->getParse();
						} else {
							$stdObject->param[] = $Float->getParse();
						}
						break;

					default:
						break;
				}
			}
		}

		return $stdObject;
	}

	public function parseObject()
	{
		$this->readRow();

		return $this->docDelimiter();
	}
}