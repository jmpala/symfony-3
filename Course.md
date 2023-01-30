# Doctrine & DBs

This library is used to work with DBs

## Doctrine Components

- Entities
- ORM (Object Relational Mapper)
- Migrations

## Entities

- to create an entity "php bin/console make:entity"
- we can set the table name "#[ORM\Table(name: 'vinyl_mix')]", but not needed. Doctrine will use the entity name

## Migrations

- we make a migration with "php bin/console make:migration"
- we apply the migration with "php bin/console doctrine:migrations:migrate"
- we can see the made migrations with "php bin/console doctrine:migrations:status"
- we can see all the migrations with "php bin/console doctrine:migrations:list
- Not all the changes applied to entities are going to reflect on a change into the DB

## Setting up the DB

- install the corresponding driver for the DB (mysql, postgres, etc)
- set "server_version" property on "config/packages/doctrine.yaml" (10.4.27-MariaDB-1:10.4.27+maria~ubu2004-log)

## Saving Data into the DB

- we use the injected EntityManagerInterface to save the data
- we can use the "persist" method to save the data (calling it multiple times on same entity will only register it once)
- we can use the "flush" method to save the data

## Useful Commands

- php bin/console doctrine:database:create (create the database)
- php bin/console make:entity (creates an entity)
- php bin/console make:migration (creates a migration)
- php bin/console doctrine:migrations:migrate (applies the migration)

## Other

- Services vs Data Classes