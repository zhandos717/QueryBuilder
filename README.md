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
SELECT user.* FROM user;
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
SELECT user.* FROM user id =1;
```
