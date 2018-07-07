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
echo "---------- Running npm install in spa directory. ----------"
npm install

echo "---------- Running yarn install in spa directory. ----------"
yarn

echo "---------- Running composer install in plugin directory. ----------"
cd "${project_dir}/src/web/app/plugins/truedit"
composer install

cd "${project_dir}"
echo "---------- Building distribution. ----------"
npm run build

echo "---------- Done ----------"
