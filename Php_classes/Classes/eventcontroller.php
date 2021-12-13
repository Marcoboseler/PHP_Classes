<?php

require_once('classes.php');

class Eventcontroller {
    
    function addEvent($eventname, $eventgenre, $eventlocation, $eventdate, $eventtime){

        $baseController = new baseController();
        $db = $baseController->getConnection();
        
        $insertQuery = "INSERT INTO event (name, genre, date, location, duration) VALUES ('$eventname', '$eventgenre', '$eventdate', '$eventlocation', '$eventtime')";
        $statement = $db->prepare($insertQuery);
        if(!$statement->execute()){

            echo "Something went wrong.";
        }
    }

    function getEvents(){

        $baseController = new baseController();
        $db = $baseController->getConnection();

        $getQuery = "SELECT * FROM event ORDER BY date ASC";
        $statement = $db->prepare($getQuery);
        $statement->execute();
        $results = $statement->fetchALL(PDO::FETCH_OBJ);

        foreach($results as $result){
            
            echo "<tr>
                    <td class='px-3'><a href='event.php?id=$result->id'>$result->name</a></td>
                    <td class='px-3'>$result->location</td>
                    <td class='px-3'>$result->date</td>
                    <td class='px-3'>$result->duration</td>
                  </tr>";
        }
    }

    function deleteEvent($sentId){

        $baseController = new baseController();
        $db = $baseController->getConnection();
        $deleteQuery = "DELETE FROM event WHERE id = $sentId";
        $statement = $db->prepare($deleteQuery);
        
        if($statement->execute()){

            header("Location: xweb.php");
        }else{

            echo "Something went wrong.";
        }
    }

    function editEvent($id, $eventname, $eventgenre, $eventlocation, $eventdate, $eventtime){
        
        $baseController = new baseController();
        $db = $baseController->getConnection();
        $editQuery = "UPDATE event SET name='$eventname', genre='$eventgenre', date='$eventdate', location='$eventlocation', duration='$eventtime' WHERE id = $id";
        $statement = $db->prepare($editQuery);
        
        if($statement->execute()){

            echo "Edit succesful.";
        }else{

            echo "Something went wrong.";
        }
    }

}