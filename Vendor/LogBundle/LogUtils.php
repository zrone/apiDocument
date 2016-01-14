<?php

namespace Vendor\LogBundle;

class LogUtils
{
	const ERROR   = 0;
	const SUCCESS = 1;
	const OTHER   = 2;
	const NOTIFY  = 3;

	/**
	 * @zroneDoc\Title(name="记录日志")
	 * @zroneDoc\Comment(content="这是一块木疙瘩，这不是一头鳄鱼！")
	 * @zroneDoc\Url(url="http://www.baidu.com")
	 * @zroneDoc\Method(method="post")
	 * @zroneDoc\String(name="message", require=true, length="", max="", min="", options={"default": "",
	 *                                  "comment":"消息1"})
	 * @zroneDoc\Integer(name="message", require=true, length="", max="", min="", options={"default": "",
	 *                                  "comment":"消息2"})
	 *
	 * @zroneDoc\Float(name="message", require=true, length="", max="", min="", tags="web|wap|ios|android", options={"default": "",
	 *                                  "comment":"消息3"})
	 *
	 * @zroneDoc\R_Enum(name="return", require=true, length="", max="", min="", tags="web|wap|ios|android", options={"default": "",
	 *                                  "comment":"消息4"})
	 *
	 * @param     $message
	 * @param int $type
	 */
	public static function log( $message, $type = 1 )
	{
		$file = str_replace( "\\", "/", APP_PATH . "/log/" );

		if( $type == self::SUCCESS ) {
			$fp = fopen( $file . "success.log", "a" );
		} else if( $type == self::OTHER ) {
			$fp = fopen( $file . "other.log", "a" );
		} else if( $type == self::NOTIFY ) {
			$fp = fopen( $file . "notify.log", "a" );
		} else {
			$fp = fopen( $file . "error.log", "a" );
		}

		fwrite( $fp, PHP_EOL . date( "Y-m-d H:i:s", $_SERVER[ 'REQUEST_TIME' ] ) . PHP_EOL . trim( $message ) . PHP_EOL );
		fclose( $fp );
	}
}