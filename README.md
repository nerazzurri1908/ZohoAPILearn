# ZohoAPILearn


## How to Install
php composer install

create file .env in main folder

php artisan key:generate

## How to Install

1. Clone the repo : `git clone https://github.com/nerazzurri1908/ZohoAPILearn.git
2. `$ cd ZohoAPILearn`
3. `$ composer install`
4. `$ cp .env.example .env`
5. `$ php artisan key:generate`
6. `$ php artisan serve`



## Prepare for work
1. To work with the Zoho CRM API, you need to create an account at https://www.zoho.com/crm/
2. Then create applications like "Self Client" on the page https://api-console.zoho.eu/
When creating an application, the following access rights must be specified in the "scope" field:
ZohoCRM.modules.ALL, ZohoCRM.settings.ALL, Aaaserver.profile.read, ZohoCRM.users.READ, ZohoCRM.bulk.ALL
After the application is created, you need to copy the received "grant code" key along with the client_id, client_secret.
3. Now you can return to the site and go to the "/config" page of your site. 
4. There enter client_id and client_secret values into the form.
5. It remains to generate the "Access Token".
To do this, you should send the previously received "grant code" to the form, which is located on the right side of the site page.

After the "Access Token" has been created, you will have access to the zoho crm API.
