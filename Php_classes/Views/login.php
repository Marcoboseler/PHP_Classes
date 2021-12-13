<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <?php 
        require_once('classes.php'); 
        $sessionController = new sessionController();
        $sessionController->startSession();
        $loginController = new loginController();
    ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    
<section>
    <div class="container px-5 py-24 mx-auto">
        <div class="w-1/4 mx-auto">
            <form action="login.php" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                        Username
                    </label>
                    <input name="txtUsername" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input name="txtPassword" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="password">
                </div>
                <div class="flex items-center justify-between">
                    <button name="btnSubmit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Sign In
                    </button>
                    Username: marco <br> Password: 123
                </div>
                <?php if(isset($_POST['btnSubmit'])){$loginController->Login($_POST["txtUsername"], $_POST["txtPassword"]);};?>
            </form>
        </div>    
    </div>
</section>

</body>
</html>

