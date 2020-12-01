<?php // phpcs:ignore
/**
 *
 * Undocumented class
 *
 * @package category
 */

/**
 * Undocumented class
 */
class Def_Product extends WP_UnitTestCase {

	/**
	 * Test wc simple product
	 */
	public function test_simple_product() {
		$simple_product = ( new Krokedil_Simple_Product(
			array(
				'name'          => 'Dummy Product',
				'regular_price' => 1000,
			)
		) )->create();

		// test instance.
		$this->assertInstanceOf( WC_Product_Simple::class, $simple_product );

		// test product name.
		$this->assertSame( 'Dummy Product', $simple_product->get_name() );

		// test price.
		$this->assertSame( 1000, (int) $simple_product->get_regular_price() );

		// test sale price.
		$this->assertSame( 100, (int) $simple_product->get_sale_price() );

	}

	/**
	 * Test external product.
	 */
	public function test_external_product() {
		$external_product = ( new Krokedil_External_Product(
			array(
				'sale_price' => 8,
				'name'       => 'Dummy External Product',
			)
		) )->create();
		// test instance.
		$this->assertInstanceOf( WC_Product_External::class, $external_product );
		// test name.
		$this->assertSame( 'Dummy External Product', $external_product->get_name() );
	}

	/**
	 * Test grouped product
	 */
	public function test_grouped_product() {
		$product = ( new Krokedil_Grouped_Product(
			array(
				'regular_price' => 2000,
				'sale_price'    => 15000,
				'name'          => 'Dummy grouped product',
			)
		) )->create();

		$this->assertSame( 'Dummy grouped product', $product->get_title() );
	}

	/**
	 * Test variable product
	 */
	public function test_variable_product() {
		$product = ( new Krokedil_Variable_Product(
			array(
				'name' => 'Dummy Variable Product',
			)
		) )->create();

		$this->assertInstanceOf( WC_Product_Variable::class, $product );

		$this->assertSame(
			array(
				'pa_size'   => array(
					'huge',
					'large',
					'small',
				),
				'pa_colour' => array(
					'blue',
					'green',
					'red',
				),
			),
			$product->get_variation_attributes()
		);

	}



}
