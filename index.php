<?php
/**
 * Created by PhpStorm.
 * User: zrone
 * Date: 16/1/4
 * Time: 06:09
 */

use Vendor\LogBundle\LogUtils;
use Vendor\AnnotationBundle\AnnotationUtils;
use Vendor\AnnotationBundle\ParseDoc;
use Vendor\AnnotationBundle\Configure;

require_once( "zroneFrameWork.php" );

$anno = new ParseDoc( 'Vendor\LogBundle\LogUtils', 'log' );

$data = json_decode( json_encode( $anno->parseAnnotation() ), TRUE );

//echo "<pre>";
//var_dump($data);

$twig = new Twig();
$twig->render( "apiDoc.html.twig", $data );