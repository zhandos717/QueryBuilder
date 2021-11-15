<?php 

class QueryBuilder{
    protected $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    /**
     * Discriptions: Displaying all data from a table
     * @param string table Name
     * @param array  data 
     * @return array of data from the table
     */
    public function getAll(string $table): array
    {
        $sql = "SELECT * FROM {$table}";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return  $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    /**
     * Discriptions: get records by ID
     * @param string table Name
     * @return array of data from the table
     */
    public function getRecordById(string $table,int $id): array
    {
        $sql = "SELECT * FROM {$table} WHERE id = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute(['id'=> $id]);
        return  $statement->fetch(PDO::FETCH_ASSOC);
    }
    /**
     * Discriptions: create record
     * @param string table Name
     * @param array  data update
     * @return void 
     */
    public function create(string $table,array $data): void
    {
        $keys = implode(',', array_keys($data));
        $tags = ':'.implode(',:', array_keys($data));
        $sql = "INSERT INTO {$table} ({$keys}) VALUES  ({$tags})";
        $statement =  $this->pdo->prepare($sql);
        $statement->execute($data);
    }
    /**
     * Discriptions: Update record by ID
     * @param string table Name
     * @param array  data update
     * @param int    id record
     * @return void 
     */
    public function updateById(string $table, array  $data,int $id): void
    {
        $keys = array_keys($data);
        $string = '';
        foreach($keys as $key){
            $string = $key . '=:'. $key.',';
        };
        $keys = rtrim($string,',');
        $data['id'] = $id;
        $sql = "UPDATE {$table}  SET {$keys}  WHERE id=:id";
        $statement =  $this->pdo->prepare($sql);
        $statement->execute($data);
    }
    /**
     * Discriptions: Deleting a record by ID
     * @param string table Name
     * @param int    id record
     * @return void 
     */
    public function deleteById(string  $table, int $id): void
    {
        $sql = "DELETE FROM {$table} WHERE id = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute(['id' => $id]);
    }

}