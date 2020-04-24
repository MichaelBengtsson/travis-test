#!/usr/bin/env bash
if [[ ${RUN_PHPCS} == 0 ]]; then
	git clone https://github.com/woocommerce/woocommerce.git '../woocommerce'
	/home/travis/build/MichaelBengtsson/woocommerce/composer install
	$HOME/.composer/vendor/bin/phpunit -c phpunit.xml $@
fi