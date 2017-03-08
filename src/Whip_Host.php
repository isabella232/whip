<?php

/**
 * Represents a host
 */
class Whip_Host {
	const HOST_NAME_KEY = 'WHIP_NAME_OF_HOST';

	/**
	 * Retrieves the name of the host if set.
	 *
	 * @return string The name of the host.
	 */
	public static function name() {
		$name = (string) getenv( self::HOST_NAME_KEY );

		return self::filterName( $name );
	}

	/**
	 * Filters the name if we are in a WordPress context. In a non-WordPress content this function just returns the passed name.
	 *
	 * @param string $name The current name of the host.
	 * @returns string The filtered name of the host.
	 */
	private static function filterName( $name ) {
		if ( function_exists( 'apply_filters' ) ) {
			return (string) apply_filters( strtolower( self::HOST_NAME_KEY ), $name );
		}

		return $name;
	}

	/**
	 * Retrieves the message from the host if set.
	 *
	 * @param string $messageKey The key to use as the environment variable.
	 *
	 * @return string The message as set by the host.
	 */
	public static function message( $messageKey ) {
		$message = (string) getenv( $messageKey );

		return self::filterMessage( $messageKey, $message );
	}

	/**
	 * Filters the message if we are in a WordPress context. In a non-WordPress content this function just returns the passed message.
	 *
	 * @param string $messageKey The key used for the environment variable.
	 * @param string $message The current message from the host.
	 *
	 * @return string
	 */
	private static function filterMessage( $messageKey, $message ) {
		if ( function_exists( 'apply_filters' ) ) {
			return (string) apply_filters( strtolower( $messageKey ), $message );
		}

		return $message;
	}
}