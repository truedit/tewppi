#!/bin/bash

this_script="$0"
project_dir=`dirname "$this_script"`
if [ "$project_dir" == "." ]; then
	project_dir=`pwd`
fi

cd "${project_dir}/src"
echo "---------- Running composer install in src directory. ----------"
composer install

cd "${project_dir}/spa"
echo "---------- Running yarn install in spa directory. ----------"
yarn install

cd "${project_dir}"
echo "---------- Building distribution. ----------"
yarn run build

echo "---------- Done ----------"
