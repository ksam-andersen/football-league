# football-league

````
composer install
````

- Apply migrations
````
php bin/console doctrine:migrations:migrate
````
- Load fixtures:
````
php bin/console doctrine:fixtures:load
````

- Generate the keys:
````
$ mkdir -p config/jwt # For Symfony3+, no need of the -p option
$ openssl genrsa -out config/jwt/private.pem -aes256 4096
$ openssl rsa -pubout -in config/jwt/private.pem -out config/jwt/public.pem
````

- put the pass phrase to JWT_PASSPHRASE in the .env

***Auth***

````
    POST http://YOUR_DOMAIN/login_check
    @headers:
        Content-Type: application/json
    @body:
        {"username":"johndoe","password":"test"}
    @response:
        { "token": <token> }
 ````       
 
 ***League***   
    
 ````      
    GET http://YOUR_DOMAIN/api/v1/leagues
    @params:
        limit:  5
        offset: 0
    @headers:
        Authorization: Bearer <token>
 ````       
 ````    
    DELETE http://YOUR_DOMAIN/api/v1/leagues/{id}
    @params:
        *{id}: <league_id>
    @headers:
        Authorization: Bearer <token>
````

***Team***   
     
````        
    GET http://YOUR_DOMAIN/api/v1/leagues/{league_id}/teams
    @params:
        *league_id: <league_id>
        limit:  5
        offset: 0
    @headers:
        Authorization: Bearer <token>
 ````       
 ````    
    POST http://YOUR_DOMAIN/api/v1/leagues/{league_id}/teams/
    @params:
        *name: <name>
        strip: <strip>
        *league_id: <league_id>
    @headers:
        Authorization: Bearer <token>
 ````       
 ````    
    PUT http://YOUR_DOMAIN/api/v1/leagues/{league_id}/teams/{id}
    @params:
        *{id}: <team_id>
        name: <name>
        strip: <strip>
        league_id: <league_id>
    @headers:
        Authorization: Bearer <token>
````
````
* - required fields
````