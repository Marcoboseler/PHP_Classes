<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('classes.php'); 
          session_start();
          $eventController = new eventcontroller();
          $baseController = new baseController();
          $db = $baseController->getConnection();
          $sentId = $_GET['id'];

          $eventQuery = "SELECT * FROM event WHERE id = $sentId";
          $statement = $db->prepare($eventQuery);
          $statement->execute();
          $result = $statement->fetchALL(PDO::FETCH_OBJ);
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Event name</title>
</head>
<body>
<div class="container px-10 py-10 mx-auto">
  <a href="xweb.php">Click to go back</a>
</div>

<div class="container px-5 py-24 mx-auto">
  <div class="flex flex-wrap -m-4">
    <div class="p-4 lg:w-1/2 md:w-full">
      <div class="flex border-2 rounded-lg border-gray-200 border-opacity-50 p-8 sm:flex-row flex-col">
        <div class="flex-grow">
          <h2 class="text-gray-900 text-lg title-font font-medium mb-3"><?php foreach($result as $event){echo $event->name;}?></h2>
          <p class="leading-relaxed text-base">
          <?php foreach($result as $event){
            echo "Music genre of " . $event->name . " is " . $event->genre . "<br>";
            echo "The event takes place in " . $event->location . " on " . $event->date . " and goes on for about " . $event->duration;}?><br><br><br><br>
          </p>
          <p><form method="POST">
            <label class="italic">Event name: </label> <input name="txtName" value=<?php foreach($result as $event){echo $event->name;}?> type="text" class="shadow appearance-none border rounded w-1/4 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><br>
            <label class="italic">Event genre: </label> <input name="txtGenre" value=<?php foreach($result as $event){echo $event->genre;}?> type="text" class="shadow appearance-none border rounded w-1/4 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><br>
            <label class="italic">Event location: </label> <input name="txtLocation" value=<?php foreach($result as $event){echo $event->location;}?> type="text" class="shadow appearance-none border rounded w-1/4 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><br><br>
            <input type="date" name="txtDate" value=<?php foreach($result as $event){echo $event->date;}?>>
            <input type="time" name="txtTime" value=<?php foreach($result as $event){echo $event->duration;}?>><br><br>

            <?php if(isset($_POST['btnEdit'])){$eventController->editEvent($sentId, $_POST["txtName"], $_POST["txtGenre"], $_POST["txtLocation"], $_POST["txtDate"], $_POST["txtTime"]);}?>
            <button type="submit" name="btnEdit" class="bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white py-2 px-4 border border-green-500 hover:border-transparent rounded">Edit event</button>
            <br><br><br><br>
            <?php if(isset($_POST['btnDelete'])){$eventController->deleteEvent($sentId);}?>
            <button type="submit" name="btnDelete" class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">Delete event</button>
            
            </form></p>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>