cd ../
composer update --no-dev
find . -type f ! -name launch.sh -exec chmod 664 {} +
find . -type d -exec chmod 775 {} +
chmod 777 qph/uploads/