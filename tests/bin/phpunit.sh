if [[ ${RUN_PHPCS} == 1 ]]; then
	exit
fi

$HOME/.composer/vendor/bin/phpunit -c phpunit.xml $@
