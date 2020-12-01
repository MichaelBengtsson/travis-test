<?php //// phpcs:ignore
/**
 *
 * Undocumented class
 *
 * @package category
 */

/**
 * Undocumented class
 */
class Create_Product extends WP_UnitTestCase {

	/**
	 * Test wc simple product
	 */
	public function test_product() {
		$props   = array(
			'name'          => 'Dummy Product',
			'regular_price' => 10,
			'price'         => 10,
			'sku'           => 'DUMMY SKU',
			'manage_stock'  => false,
			'tax_status'    => 'taxable',
			'downloadable'  => false,
			'virtual'       => false,
			'stock_status'  => 'instock',
			'weight'        => '1.1',
		);
		$product = ( new Krokedil_Simple_Product( $props ) )->create();
		$this->assertInstanceOf( WC_Product_Simple::class, $product );

		$name = $product->get_data()['name'];
		$this->assertSame( $props['name'], $name );
	}

	/**
	 * Test external product
	 */
	public function test_external_product() {
		$props = array(
			'name'          => 'Dummy External Product',
			'regular_price' => 10,
			'sku'           => 'DUMMY EXTERNAL SKU',
			'product_url'   => 'http://woocommerce.com',
			'button_text'   => 'Buy external product',
		);

		$product = ( new Krokedil_External_Product( $props ) )->create();
		$this->assertInstanceOf( WC_Product_External::class, $product );
	}

	/**
	 * Test grouped product
	 */
	public function test_grouped_product() {
		$props         = array(
			'name' => 'Dummy Grouped Product',
			'sku'  => 'DUMMY GROUPED SKU',
		);
		$simple_props  = array(
			'name'          => 'Dummy Product',
			'regular_price' => 10,
			'price'         => 10,
			'sku'           => 'DUMMY SKU',
			'manage_stock'  => false,
			'tax_status'    => 'taxable',
			'downloadable'  => false,
			'virtual'       => false,
			'stock_status'  => 'instock',
			'weight'        => '1.1',
		);
		$simple_props1 = array(
			'name'          => 'Dummy Product',
			'regular_price' => 11,
			'price'         => 11,
			'sku'           => 'DUMMY SKU',
			'manage_stock'  => false,
			'tax_status'    => 'taxable',
			'downloadable'  => false,
			'virtual'       => false,
			'stock_status'  => 'instock',
			'weight'        => '1.1',
		);
		$product       = ( new Krokedil_Grouped_Product(
			$props,
			array(
				( new Krokedil_Simple_Product( $simple_props ) )->create(),
				( new Krokedil_Simple_Product( $simple_props1 ) )->create(),
			)
		) )->create();

		$this->assertInstanceOf( WC_Product_Grouped::class, $product );
	}

	/**
	 * Tests wc variable product
	 */
	public function test_variable_product() {
		$attributes   = array();
		$variations   = array();
		$attributes[] = ( new Krokedil_Product_Attribute(
			'size',
			array(
				'small',
				'large',
				'huge',
			)
		) )->get_product_attribute();

		$attributes[] = ( new Krokedil_Product_Attribute(
			'colour',
			array(
				'red',
				'blue',
			)
		) )->get_product_attribute();

		$variations[] = ( new Krokedil_Variation_Product(
			array(

				'sku'           => 'DUMMY SKU VARIABLE SMALL',
				'regular_price' => 10,
			),
			array(
				'pa_size' => 'small',
			)
		) )->create();

		$variations[] = ( new Krokedil_Variation_Product(
			array(

				'sku'           => 'DUMMY SKU VARIABLE LARGE',
				'regular_price' => 15,
			),
			array(
				'pa_size' => 'large',
			)
		) )->create();

		$wc_product_props = array(
			'name' => 'Dummy Variable Product',
			'sku'  => 'DUMMY VARIABLE SKU',
		);
		$wc_product       = ( new Krokedil_Variable_Product(
			$wc_product_props,
			$attributes,
			$variations
		) )->create();

		$this->assertInstanceOf( WC_Product_Variable::class, $wc_product );

		$this->assertSame(
			array(
				'pa_size'   => array(
					'huge',
					'large',
					'small',
				),
				'pa_colour' => array(
					'blue',
					'red',
				),
			),
			$wc_product->get_variation_attributes()
		);

		$this->assertSame(
			array( 'huge', 'large', 'small' ),
			/**
			 * Term
			 *
			 * @var WP_Term $term term.
			 */
			array_map(
				static function( $term ) {
					return $term->name;
				},
				get_terms( 'pa_size' )
			)
		);

	}
}
