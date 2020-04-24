#!/usr/bin/env bash
if [[ ${RUN_PHPCS} == 0 ]]; then
	git clone --depth 1 --branch $WC_VERSION git@github.com:woocommerce/woocommerce.git '../woocommerce'
	$HOME/.composer/vendor/bin/phpunit -c phpunit.xml $@
fi