# Doctrine & DBs

This library is used to work with DBs

## Doctrine Components

- Entities
- ORM (Object Relational Mapper)
- Migrations

## Entities

[- to create an entity "php bin/console make:entity"
- we can set the table name "#[ORM\Table(name: 'vinyl_mix')]", but not needed. Doctrine will use the entity name
- We can "DI" an Entity into a Controller, with a matching to entity id wildcard as url slug, and Doctrine will find it
]()
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
- Is important to define the database version in Symfony, so Doctrine can use new features
- Entities with only getters and setters are called anemic models
- Entities with more logic are called rich models

## Handling error pages

- In order to display error pages, we need to throw an exception. This will fire the logger, and the error page will be displayed
- "throw $this->createNotFoundException();" or "throw new NotFoundHttpException();" (both are equal)

## Flash Messages

- Are messages saved into the session, and displayed once
- after displaying, they are removed from the session

## Controller

- As parameter: wildcards, autowired services, entities and request object

## Libraries

- stof/doctrine-extensions-bundle (for timestampable and other functionalities)
