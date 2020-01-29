<?php

class DataBaseAccessor extends PostgreSQLConnector implements DataBaseInterface
{
    private static $conn;

    public function __construct()
    {
        $this->conn = $this->getConnection();
    }

    private function excecuteQueryStatement($preparedStatement)
    {
        return pg_query($this->conn,$preparedStatement);
    }

    final public function select($fields, $tableName)
    {
        $fields = implode(",", $fields);
        $query="SELECT $fields FROM $tableName";
        return $this->excecuteQueryStatement($query);
    }

    final public function selectUsingCondition($fields, $tableName, $whereFiled, $whereValue)
    {
        $fields = implode(",", $fields);
        $query= "SELECT $fields FROM $tableName WHERE $whereFiled = $whereValue";
        return $this->excecuteQueryStatement($query);
    }

    final public function selectByJoin($fields, $tableNameOne, $tableNameTwo, $onCondition){
        $fields = implode(",", $fields);
        $query="select $fields from $tableNameOne join $tableNameTwo on $onCondition";
        return $this->excecuteQueryStatement($query);
    }

    final public function insert($tableName, $fields, $vallues)
    {
        $fields = implode(",", $fields);
        $values = "'" . implode("', '", $vallues) . "'";
        $query="INSERT INTO $tableName($fields) VALUES ($values)";
        pg_query($this->conn,$query);
    }

    final public function __destruct()
    {
        pg_close($this->conn);
    }
}
