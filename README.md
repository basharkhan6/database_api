# database_api
API for connecting Database.
Currently support for MySql.
demo: https://smartedgebd.com/db_api/

Uses:


Resquest Form Data must be in JSON encoded and some operation need token for auth
Token:
"jwt": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9leGFtcGxlLm9yZyIsImF1ZCI6Imh0dHA6XC9cL2V4YW1wbGUuY29tIiwiaWF0IjoxMzU2OTk5NTI0LCJuYmYiOjEzNTcwMDAwMDAsImRhdGEiOnsiaWQiOiIxIiwiZmlyc3RuYW1lIjoiTWlrZSIsImxhc3RuYW1lIjoiRGFsaXNheSIsImVtYWlsIjoibWlrZUBjb2Rlb2ZhbmluamEuY29tIn19.4dbmSEcM9tWLM2nJff5tmzbjDzhp9ZB5nOFhKD82-wE"

Url Fromat:
Object/Operation
Example: product/read
https://smartedgebd.com/db_api/product/read

Objects:

product
Suppered operation
read - Method GET. Return product list.
read_paging - Method GET. page(optional) as url paramete. Return product list with paging.r
search - Method GET. keyword as url parameter. Return product list.
search_paging - Method GET. keyword, page(optional) as url parameter. Return product list with paging.
read_one - Method GET. id as url parameter. Return product list.
create -Method POST. name, price, description, category_id as Form Data. Return success/fail.
update -Method POST. name, price, description, category_id as Form Data. Return success/fail.
update -Method POST. id as Form Data. Return success/fail.

category
Suppered operation
read - Method GET. Return category list.

user
Suppered operation
create - Method POST. firstname, lastname, email, password as Form Data. Return success/fail.
login - Method POST. email, password as Form Data. Return user info an Token.
