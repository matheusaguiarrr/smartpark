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
    public static function getResultFromQuery($sql, $params = [], $personalizado = false){
        $connection = self::getConnect();
        try{
            $stmt = $connection->prepare($sql);
            $stmt->execute($params);
            if($personalizado == true){
                return $stmt;
            }
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
            if($stmt->rowCount() == 0){
                return null;
            }
            if($stmt->rowCount() == 1){
                return $stmt->fetch(\PDO::FETCH_OBJ);
            }
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

    public static function executeSQLWithTransaction($sql1, $sql2, $params1 = [], $params2 = []){
        $connection = self::getConnect();
        try {
            // Iniciar a transação
            $connection->beginTransaction();
            $updateStmt = $connection->prepare($sql1);
            $updateStmt->execute($params1);
            $insertStmt = $connection->prepare($sql2);
            $insertStmt->execute($params2);
            // Se tudo deu certo, confirmar a transação
            $connection->commit();
            echo "Operação realizada com sucesso!";
        } catch (Exception $e) {
            // Se ocorrer qualquer erro, reverter as alterações
            $connection->rollBack();
            echo "Falha na operação: " . $e->getMessage();
        }
    }
}