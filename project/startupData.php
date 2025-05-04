<?php
    include 'db.php';
    function randChar() {
        return base_convert(random_int(0, 35), 10, 36);
    }
    function randId() {
        $id = '';
        for ($i=0; $i < 5; $i++)
            $id .= randChar();
        return $id;
    }
    try {
        $createTableQuery = <<<SQL
        create table if not exists inventory (
            id char(5) primary key,
            name varchar(20) not null,
            quantity int default 0,
            price decimal(10,2) default 0.00
        )
        SQL;
        $mysqli->query($createTableQuery);
        $ids = [];
        for ($i=0; $i < 5; $i++) {
            $id = randId();
            while (in_array($id,$ids))
                $id = randId();
            $ids[] = $id;
        }
        $insertQuery = <<<SQL
        insert into inventory (id,name,quantity,price) values
        ('{$ids[0]}','HP printer',30,100.00),
        ('{$ids[1]}','LG monitor',20,125.00),
        ('{$ids[2]}','Laptop',10,700.00),
        ('{$ids[3]}','Keyboard',50,30.00),
        ('{$ids[4]}','Mouse',70,30.00)
        SQL;
        $res=$mysqli->query($insertQuery);
        if ($res) {
            echo "Table created and data inserted successfully.";
        } else {
            echo "Error: " . $mysqli->error;
        }
    } catch (Throwable $th) {
        echo $th;
    }
?>