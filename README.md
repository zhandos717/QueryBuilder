SQL Query Builder
=================
<a name="block1"></a>
## 1. Installation [↑](#index_block)

```php
<?php

include 'src/QueryBuilder.php';

$config = [
        'database'=> 'database',
        'username'=> 'username',
        'password'=> 'password',
        'connection'=> 'mysql:host=localhost',
        'charset' => 'utf8' 
    ];

 $pdo =  new PDO(
            "{$config['connection']};dbname={$config['database']};charset={$config['charset']}", 
            $config['username'], 
            $config['password']
        )
        
$QueryBuilder =  new QueryBuilder($pdo);

```
<a name="block2"></a>
## 2. The Builder [↑](#index_block)

<a name="block2.1"></a>
### 2.1. Displaying all data from a table [↑](#index_block)

#### Usage:
```php
<?php
include 'src/QueryBuilder.php';
$config = [
        'database'=> 'database',
        'username'=> 'username',
        'password'=> 'password',
        'connection'=> 'mysql:host=localhost',
        'charset' => 'utf8' 
    ];
 $pdo =  new PDO(
            "{$config['connection']};dbname={$config['database']};charset={$config['charset']}", 
            $config['username'], 
            $config['password']
        )
$QueryBuilder =  new QueryBuilder($pdo);
$users = $QueryBuilder->getAll('users');

print_r($users);
```
#### Output:
```sql
SELECT * FROM users;
```
<a name="block2.2"></a>
### 2.2. get records by ID [↑](#index_block)

#### Usage:
```php
<?php
include 'src/QueryBuilder.php';
$config = [
        'database'=> 'database',
        'username'=> 'username',
        'password'=> 'password',
        'connection'=> 'mysql:host=localhost',
        'charset' => 'utf8' 
    ];
 $pdo =  new PDO(
            "{$config['connection']};dbname={$config['database']};charset={$config['charset']}", 
            $config['username'], 
            $config['password']
        )
$QueryBuilder =  new QueryBuilder($pdo);
$users = $QueryBuilder->getRecordById('users',1);

print_r($users);
```
#### Output:
```sql
SELECT * FROM users WHERE id =1;
```

<a name="block2.3"></a>
### 2.3. create a record in the table [↑](#index_block)

#### Usage:
```php
<?php
include 'src/QueryBuilder.php';
$config = [
        'database'=> 'database',
        'username'=> 'username',
        'password'=> 'password',
        'connection'=> 'mysql:host=localhost',
        'charset' => 'utf8' 
    ];
 $pdo =  new PDO(
            "{$config['connection']};dbname={$config['database']};charset={$config['charset']}", 
            $config['username'], 
            $config['password']
        )
$QueryBuilder =  new QueryBuilder($pdo);
$users = $QueryBuilder->create('users',['email'=>'examle@mail.com','name'=>'John','age'=>24]);

print_r($users);
```
#### Output:
```sql
INSERT INTO users (email,name,age) VALUES ('examle@mail.com','John','24');
```

<a name="block2.4"></a>
### 2.4. Update record by ID [↑](#index_block)

#### Usage:
```php
<?php
include 'src/QueryBuilder.php';
$config = [
        'database'=> 'database',
        'username'=> 'username',
        'password'=> 'password',
        'connection'=> 'mysql:host=localhost',
        'charset' => 'utf8' 
    ];
 $pdo =  new PDO(
            "{$config['connection']};dbname={$config['database']};charset={$config['charset']}", 
            $config['username'], 
            $config['password']
        )
$QueryBuilder =  new QueryBuilder($pdo);
$users = $QueryBuilder->updateById('users',['email'=>'john@mail.com','name'=>'John Doe'],1);

print_r($users);
```
#### Output:
```sql
UPDATE users SET email ='john@mail.com', name='John Doe' WHERE id = 1;
```

<a name="block2.5"></a>
### 2.5. Deleting a record by ID [↑](#index_block)

#### Usage:
```php
<?php
include 'src/QueryBuilder.php';
$config = [
        'database'=> 'database',
        'username'=> 'username',
        'password'=> 'password',
        'connection'=> 'mysql:host=localhost',
        'charset' => 'utf8' 
    ];
 $pdo =  new PDO(
            "{$config['connection']};dbname={$config['database']};charset={$config['charset']}", 
            $config['username'], 
            $config['password']
        )
$QueryBuilder =  new QueryBuilder($pdo);
$users = $QueryBuilder->deleteById('users',1);

print_r($users);
```
#### Output:
```sql
DELETE FROM user WHERE id = 1;
```