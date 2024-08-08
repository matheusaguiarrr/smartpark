<?php
class Database {
    public static function getConnect(){
        //Caminho completo do arquivo env.ini contendo as variáveis de ambiente do banco de dados
        $envPath = realpath(dirname(__FILE__) . '/../../env.ini');
        //Carregando as variáveis de ambiente
        $env = parse_ini_file($envPath);
        try{
            $connection = new \PDO
                (
                    "{$env['DB_CONNECTION']}:
                    host={$env['DB_HOST']};
                    dbname={$env['DB_NAME']}", 
                    $env['DB_USERNAME'], 
                    $env['DB_PASSWORD']
                );
            return $connection;
        }
        catch(\PDOException $exception){
            die("Erro: " . $exception->getMessage());
        }
    }
    public static function getResultFromQuery($sql, $params = []){
        $connection = self::getConnect();
        try{
            $stmt = $connection->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetch(\PDO::FETCH_OBJ);
        } catch(\PDOException $exception){
            die("Erro: " . $exception->getMessage());
        }
    }
    public static function getResultsFromQuery($sql, $params = []){
        $connection = self::getConnect();
        try{
            $stmt = $connection->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        } catch(\PDOException $exception){
            die("Erro: " . $exception->getMessage());
        }
    }
    public static function executeSQL($sql, $params = []){
        $connection = self::getConnect();
        try{
            $stmt = $connection->prepare($sql);
            $stmt->execute($params);
        } catch(\PDOException $exception){
            die("Erro: " . $exception->getMessage());
        }
        $id = $connection->lastInsertId();
        $connection = null;
        return $id;
    }
}