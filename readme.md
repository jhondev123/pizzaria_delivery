
## Comandos Doctrine
* Ver Entidades mapeadas ``` php bin/doctrine.php orm:info  ```
* Ver uma Entidade mapeada ``` php bin/doctrine.php orm:mapping:describe User ```
* Ver Dump do banco de dados ``` php bin/doctrine.php orm:schema-tool:create --dump-sql ```
* Atuaizar o banco de dados ``` php bin/doctrine.php orm:schema-tool:update --dump-sql  ```
* Gerar Migrations ```  php bin/doctrine.php migrations:generate ```
* Executar Migrations ``` php bin/doctrine.php migrations:migrate ```
* Validar as entdidades mapeadas ```  php bin/doctrine.php orm:validate-schema  ```
* Validar o que vai ser alterado no banco de dados ``` php bin/doctrine.php orm:schema-tool:update --dump-sql  ```
* Atualizar o banco de dados ``` php bin/doctrine.php orm:schema-tool:update --force  ```