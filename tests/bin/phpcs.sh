#!/usr/bin/env bash
echo "Maybe code sniffer"
echo ${RUN_PHPCS}
echo $TRAVIS_COMMIT_RANGE
if [[ ${RUN_PHPCS} == 1 ]]; then
	echo "in if cs"
	CHANGED_FILES=`git diff --name-only --diff-filter=ACMR $TRAVIS_COMMIT_RANGE | grep \\\\.php | awk '{print}' ORS=' '`
	IGNORE="tests/cli/,includes/libraries/,includes/api/legacy/"
	echo $CHANGED_FILES
	echo $IGNORE

	if [ "$CHANGED_FILES" != "" ]; then
		echo "in if 2 cs"
		# Install wpcs globally:
    	composer require woocommerce/woocommerce-sniffs

		echo "Running Code Sniffer."
		./vendor/bin/phpcs --standard=WordPress --extensions=php --ignore=$IGNORE $CHANGED_FILES
	fi
fi