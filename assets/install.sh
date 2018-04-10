if($1 = 'production'); then
   composer install --no-dev
else
    composer install
fi

find . -type f ! -name launch.sh -exec chmod 664 {} +
find . -type d -exec chmod 775 {} +

# QPH
ln -s "$(pwd)"/vendor/stickymediadevelopment/qph/web/ web/qph
chmod 777 qph/uploads/