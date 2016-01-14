<?php
/**
 * Created by PhpStorm.
 * User: zrone
 * Date: 16/1/12
 * Time: 11:02
 */

namespace Vendor\AnnotationBundle;

use ReflectionClass;

class ParseDoc
{
	private $serverName;
	private $methodName;

	public $instance;

	public function __construct( $serverName, $methodName )
	{
		$this->serverName = $serverName;
		$this->methodName = $methodName;
	}

	public function parseAnnotation()
	{
		$Core = new ParseCore( $this->getAnnotationString() );
		return $Core->parseObject();
	}

	/**
	 * 获取方法Annotation
	 *
	 * @return string
	 */
	private function getAnnotationString()
	{
		$ref = new ReflectionClass( $this->serverName );

		return $ref->getMethod( $this->methodName )
				   ->getDocComment();
	}

	public function getInstance()
	{
		return $this->instance;
	}
}