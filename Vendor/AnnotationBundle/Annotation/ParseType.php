<?php
/**
 * Created by PhpStorm.
 * User: zrone
 * Date: 16/1/12
 * Time: 16:42
 */

namespace Vendor\AnnotationBundle\Annotation;


interface ParseType
{
	/**
	 * 解析annotaion
	 *
	 * @return mixed
	 */
	function segmentString();

	/**
	 * api
	 *
	 * @return mixed
	 */
	function getParse();
}