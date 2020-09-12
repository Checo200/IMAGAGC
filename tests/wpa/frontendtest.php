<?php //phpcs:disable
/**
 * IMAGAGC
 *
 * Test Frontend Functionality.
 *
 * @package IMAGAGC
 * @author  IMAGA
 * @license GPL-2.0-or-later
 * @link    https://github.com/imaga/IMAGAGC
 */

use WPAcceptance\Exception\ElementNotFound as ElementNotFound;

/**
 * PHPUnit test class
 */
class HeaderTest extends \WPAcceptance\PHPUnit\TestCase {

	/**
	 * @testdox The stylesheet is properly enqueued.
	 */
	public function testStylesheetEnqueued() {
		$i = $this->openBrowserPage();
		$i->moveTo( '/' );

		// Test stylesheet is enqueued.
		try {
			$element = $i->getElement( 'link#styles-css[rel="stylesheet"]' );
		} catch ( ElementNotFound $e ) {
			// If the stylesheet doesn't exist, we catch the exception and fail the test.
			$this->assertTrue( false );
		}

		$this->assertNotEmpty( $element );
	}

	/**
	 * @testdox The frontend javascript file is properly enqueued.
	 */
	public function testJavascriptEnqueued() {
		$i = $this->openBrowserPage();
		$i->moveTo( '/' );

		// Test frontend.js is enqueued.
		try {
			$element = $i->getElement( 'script[src*="frontend.js"' );
		} catch ( ElementNotFound $e ) {
			// If the script doesn't exist, we catch the exception and fail the test.
			$this->assertTrue( false );
		}

		$this->assertNotEmpty( $element );
	}

	/**
	 * @testdox Feed links are present.
	 */
	public function testAutomaticFeedLinks() {
		$i = $this->openBrowserPage();
		$i->moveTo( '/' );

		// Test feed link is present.
		try {
			$element = $i->getElement( 'link[type="application/rss+xml"' );
		} catch ( ElementNotFound $e ) {
			// If the feed doesn't exist, we catch the exception and fail the test.
			$this->assertTrue( false );
		}

		$this->assertNotEmpty( $element );
	}

	/**
	 * @testdox The body class is dynamic.
	 */
	public function testBodyClass() {
		$i = $this->openBrowserPage();
		$i->moveTo( '/' );

		$this->assertEquals( 'home blog', $i->getElementAttribute( 'body', 'class' ) );
	}
}
