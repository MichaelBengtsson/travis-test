echo "Maybe Running PHPUnit"
echo ${RUN_PHPCS}
if [[ ${RUN_PHPCS} == 0 ]]; then
	echo "Running PHPUnit"
	$HOME/.composer/vendor/bin/phpunit -c phpunit.xml $@
fi