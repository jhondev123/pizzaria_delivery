
## Comandos Doctrine
* Ver Entidades mapeadas ``` php bin/doctrine.php orm:info  ```
* Ver uma Entidade mapeada ``` php bin/doctrine.php orm:mapping:describe User ```
* Ver Dump do banco de dados ``` php bin/doctrine.php orm:schema-tool:create --dump-sql ```
* Atuaizar o banco de dados ``` php bin/doctrine.php orm:schema-tool:update --dump-sql  ```
* Gerar Migrations ``` php bin/doctrine.php migrations:diff php ./vendor/bin/doctrine-migrations migrations:generate ```