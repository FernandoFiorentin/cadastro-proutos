<?php

namespace App\DB;

use App\Config\ENV;
use PDO;

class DB
{
    public static function getQueryBuilder()
    {
        $connection = ENV::get('DB_CONNECTION');
        $host = ENV::get('DB_HOST');
        $database = ENV::get('DB_DATABASE');
        $user = ENV::get('DB_USER');
        $password = ENV::get('DB_PASSWORD');

        $connection = new PDO("$connection:host=$host;dbname=$database;charset=utf8", $user, $password);

        // create a new mysql query builder
        $queryBuilder = new \ClanCats\Hydrahon\Builder('mysql', function ($query, $queryString, $queryParameters) use ($connection) {
            $statement = $connection->prepare($queryString);
            $statement->execute($queryParameters);

            // when the query is fetchable return all results and let hydrahon do the rest
            // (there's no results to be fetched for an update-query for example)
            if ($query instanceof \ClanCats\Hydrahon\Query\Sql\FetchableInterface) {
                return $statement->fetchAll(\PDO::FETCH_ASSOC);
            }
            // when the query is a instance of a insert return the last inserted id  
            elseif ($query instanceof \ClanCats\Hydrahon\Query\Sql\Insert) {
                return $connection->lastInsertId();
            }
            // when the query is not a instance of insert or fetchable then
            // return the number os rows affected
            else {
                return $statement->rowCount();
            }
        });

        return $queryBuilder;
    }
}
