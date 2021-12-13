<!DOCTYPE html>
<html lang="en">
<head>
    <?php
      require_once('classes.php');
      $eventController = new eventcontroller();
      $sessionController = new sessionController();
      $sessionController->startSession();
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Xweb</title>
</head>
<body>
    
<section class="text-gray-600 body-font overflow-hidden">
  <div class="container px-5 py-24 mx-auto">
    <div class="-my-8 divide-y-2 divide-gray-100">
      <div>
        <form method="POST">
          <?php
            $sessionController->checkSession();
            if(isset($_POST['btnLogout'])){
              $sessionController->destroySession();
              header('Location: login.php');
          }?>
          <button name="btnLogout" class="hover:bg-red-700 text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
            Log out
          </button>
        </form>
      </div>
      <div class="py-8 flex flex-wrap md:flex-nowrap">
        <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
          <span class="font-semibold title-font text-gray-700">Create new event</span>
        </div>
        <div class="md:flex-grow">
          <form action="xweb.php" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
              <?php 
                if(isset($_POST["btnSubmit"])){$eventController->addEvent($_POST["txtname"], $_POST["txtgenre"], $_POST["txtlocation"], $_POST["txtdate"], $_POST["txttime"]);
              }?> 
              <p><input type="text" name="txtname" placeholder="Name"></p>
              <p><input type="text" name="txtgenre" placeholder="Genre"></p>
              <p><input type="text" name="txtlocation" placeholder="Location"></p><br>
              <p><input type="date" name="txtdate"> <input type="time" name="txttime"></p><br>
              <p><button type="submit" name="btnSubmit" class="border p-2">Create</button></p>
          </form>
        </div>
      </div>
      <div class="py-8 flex flex-wrap md:flex-nowrap">
        <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
          <span class="font-semibold title-font text-gray-700">Events overview</span>
        </div>
        <div class="md:flex-grow bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <table>
          <tr>
            <th class="text-left px-3">Event name</th>
            <th class="text-left px-3">Location</th>
            <th class="text-left px-3">Date</th>
            <th class="text-left px-3">Event duration</th>
          </tr>
          <?php $eventController->getEvents(); ?>
        </table>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>