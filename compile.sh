VERSION=1.0.12

cd spa/ 
yarn run build-to-wp 
cd .. && mkdir -p dist/$VERSION/truedit
cp -r src/* dist/$VERSION/truedit
echo $VERSION > dist/$VERSION/truedit/VERSION.txt
cd dist/$VERSION/truedit 
sed -i -e \"s/1.0.0/$VERSION/\" truedit.php 
zip -r truedit_wppi.zip ./*
mv truedit_wppi.zip ..