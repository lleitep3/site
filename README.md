para instalar
========================

    $ git clone git@bitbucket.org:leandroleite/crud_symfony.git
    $ cd crud_symfony
    $ composer install
    $ php app/console doctrine:database:create
    $ php app/console doctrine:schema:update --force
    $ php app/console server:run