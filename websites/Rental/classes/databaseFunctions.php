<?php
namespace classes;
class databaseFunctions
{
    //Private variables so nothing is overwritten,cant be acsessed from outside the class, saves $pdo
    private $pdo;
    private $table;
    private $primaryKey;
    private $entityClass;
    private $entityConstructor;

    //Was set to public due to errors, Contruct runs everytime the class is called. Assigns $this-> to a variable for use later.
    public function __construct($pdo, $table, $primaryKey, $entityClass = 'stdclass', $entityConstructor = [])
    {
        $this->pdo = $pdo;
        $this->table = $table;
        $this->primaryKey = $primaryKey;
        $this->entityClass = $entityClass;
        $this->entityConstructor = $entityConstructor;
    }
    //Query Function for prepared statements
    // Functions provided by Tom Butler & Kevin Yank from the book PHP & MYSQL: Novice to Ninja however with adjustments made to suit this assigment
    public function query($sql, $parameters = [])
    {
        $query = $this->pdo->prepare($sql);
        $query->setFetchMode(\PDO::FETCH_CLASS, $this->entityClass, $this->entityConstructor);
        $query->execute($parameters);
        return $query;
    }

    //Find all database function, limit to 10 rows returned
    public function findAll()
    {
        $query = $this->query('Select * from ' . $this->table);
        return $query->fetchAll();
    }

    //Select function with options $and variable to return two columns
    //Function provided by Tom Butler & Kevin Yank from the book PHP & MYSQL: Novice to Ninja however with adjustments made to suit this assigment
    public function find($field, $value, $and = null, $var = null)
    {
        $query = ('Select * from ' . $this->table . ' WHERE ' . $field . ' = ' . ':value ');
        if($and != null)
        {
            $query.= ' AND ' . $and . ' = ' . "'" . $var . "'";
        }
        $parameters = [
            'value' => $value,
        ];
        $query = $this->query($query, $parameters);
        return $query->fetchAll();
    }

    //Function to return the Highest id inside a database table (Last insert)
    public function maxId ()
    {
        $query = $this->query('SELECT MAX(id) FROM ' . $this->table);
        //Return a string not an array
        return $query->fetchColumn(0);
    }

    // Insert function
    public function insert($fields)
    {
        $query = 'INSERT INTO ' . $this->table . '(';
        foreach ($fields as $key => $value)
        {
            $query .= $key . ',';
        }
        $query = rtrim($query, ','); // Strips away from end of index
        $query .= ') VALUES (';
        foreach ($fields as $key => $value)
        {
            $query .= ':' . $key . ',';
        }
        // Needed for getting date
        foreach ($fields as $key => $value)
        {
            if ($value instanceof \DateTime)
            {
                $fields[$key] = $value->format('Y-m-d');
            }
        }
        $query = rtrim($query, ",'");
        $query .= ')';
        $this->query($query, $fields);
    }

    // Delete function
    public function delete($parameters)
{
    $this->query('DELETE FROM ' . $this->table . ' WHERE ' . $this->primaryKey . ' = :id', $parameters);
}


//Delete image function (Didn't want to go back and replace each database delete function )

public function deleteImage($column,$parameters)
{
     $this->query('DELETE FROM ' . $this->table . ' WHERE ' . $column . ' = ' . $parameters);
}


//Update function, will remove keys if array is empty.
public function update($id,$fields)
{
    $query = ' UPDATE ' . $this->table .' SET ';

//Removes if the array is empty
if(count($fields) > 1){
    $fields = array_filter($fields);
}

    foreach ($fields as $key => $value) {
        $query .= '' . $key . ' = :' . $key . ',';
    }
    $query = rtrim($query, ',');
    $query .= ' WHERE ' . $this->primaryKey . ' = ' . $this->primaryKey;
    // Set the :primaryKey variable
    // $fields['primaryKey'] = $fields['id'];    

    var_dump($query);
    var_dump($fields);
    $this->query($query, $fields);
}





// Delete with forign Key

public function deleteWithFKey ($vars){



}
}
?>
