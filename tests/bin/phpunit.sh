if [[ ${RUN_PHPCS} == 0 ]]; then
	$HOME/.composer/vendor/bin/phpunit -c phpunit.xml.dist $@
fi