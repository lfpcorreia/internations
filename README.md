# Back end task solution

This my solution for the back end developer task. I found the exercise pretty easy to understand and simple to implement. As such I tried to enrich the delivery with some features I tend to find absolutely necessary. Although I didn't implement all the features I wanted, given the 4 hours time box, I believe I can mark the task as done.

I'll present a list of prioritized stories for the remaining features I would like to see before this "went into production".

# Context
The last "big" PHP project I developed from scratch and saw it going into production was around 4 years ago. Lately I've been using PHP from times to times mainly for producing some scripts in some landing pages A/B testing solution.

The aforementioned project I developed from scratch was using the Code Igniter framework. As such, I lost some "extra" time getting around Symfony, more specifically [Api-platform project](https://api-platform.com). The opted for this framework because I found it _"pretty good"_ (nice docs, lots of stackoverflow posts, lets of modularity). It also uses Symfony for the skeleton, so that was a pretty straightforward choice.

# The solution

## The backlog I imagined in my head



- [x] Select a PHP framework
- [x] Dockerize the source code
- [x] Setup my preferred relational DB, Postgres!
- [x] Design the database schema (I'm a sucker for Database first workflow)
- [x] Make the initial migrations for the db entities
- [x] Make the database seeds (fixtures)
- [x] Make Authentication a requirement
- [x] Make some functional tests (more smoke testing than anything else)
- [x] Make some validations for the POST verbs
- [ ] Prevent database erros from leaking to the client, use general error messages
- [ ] Make some tests that would prove my endpoints satisfy my interpretation of the user stories
- [ ] Refactor AUTH into a proper AUTH token with JWT or even OAUTH
- [ ] Setup a proper CI/CD environment
- [ ] Make a Kubernetes deployment script
- [ ] Battle test the thing with [Vegeta](https://github.com/tsenart/vegeta)


### Notes:

#### Api-platform was chosen although it goes against the Symfony 3 recommendation:

Well.. with JSON-LD support, varnish as cache, small footprint (my subjective opinion from the reading I did).. it was really a no-brainer choice

#### Dockerize the solution

The freedom was given by the exercise, since I believe in portable development environments using containers and have lots of experience using Docker, I opted for it!
Also the Api-platform already had most of the work done and mostly the way i like to have it. I did some personal touches but ended with something I really like: the project is agnostic to the application, so I can exchange the application code and still have a platform in a containerized setup with proxy, caching and DB already configured.

#### Database first development

I like to code around the schema and not the other way around. From my experience, the initial cost seriously pays off in the long run.

#### Authentication

I opted for using user authentication for satisfying the user stories requirements. Having a endpoint/operation segregation imbued in AUTH guarantees both security and requirements at the same time.

Given the 4 hour timebox and my lack of experience in Api-platform I choose not to go with _"serious, production grade"_ authentication. But my point is still _testable_.


#### Tests

With more time I would have written [Behat](http://docs.behat.org/en/latest/) tests for the given user stories. Instead I show only some basic functional tests to have a boilerplate starting point for further developing this in the future.

I would also test the deployed environments using _Vegeta_. My tool of choice for load testing.

#### CI/CD

I would have used Gitlab + gitscripts or Helm for kubernetes deployment.
My favorite cloud provided is AWS.


# Deploying in a local machine

For having a look at my solution in your local machine please do:

- git clone
- cd into the cloned dir
- docker-compose build
- docker-compose up
- docker-compose exec php bin/console doctrine:database:drop --force (the schema created by Doctrine is no good for our use-case)
- docker-compose exec php bin/console doctrine:database:create (re-create the db)
- docker-compose exec php bin/console doctrine:migrations:migrate (perform our database migrations)
- docker-compose exec php bin/console doctrine:fixtures:load -n (load some Star Wars themed data)
- docker-compose exec php bin/phpunit tests/FunctionalTests.php (to run the functional tests in order to ensure everything is working as I expect)
- point your browser at [localhost](http://localhost)
- to test the operation's actions I recommend using the nice interface at [http://localhost:8080](localhost:8080)

> Note: with Authentication AS IS the amdin interface won't work. To test the full client and admin interfaces from Api-platform, please comment and uncomment the necessary lines as described in /api/config/packages/security.yaml 's inline comments I added.

# DB Schema and Simple Domain Model

![DB schema screenshot](https://github.com/lfpcorreia/internations/raw/master/schema.png)


![Domain model screenshot](https://github.com/nosarthur/internations/raw/master/domainmodel.png)


