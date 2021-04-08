<!DOCTYPE html>

<html>

<head>

    <title>PHP Documentation</title>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style type="text/css">
    * {

        background: #4c4a4ae0;

        color: white;

        letter-spacing: 1px;

        border-radius: 5px;

    }



    a {

        text-decoration: none;

    }



    a:hover {

        background: white;

        color: #4c4a4ae0;

    }
    </style>

</head>



<body>

    <center>

        <h3><u><a href="index.php">php <?php echo phpversion(); ?></a></u></h3>

        <?php if (isset($_GET['ext'])) {

			echo 'Extention: ' . $_GET['ext'];
		} ?>

    </center>

    <?php



	/**

	 * documentation class

	 */

	class doc

	{



		function __construct()

		{

			if (isset($_GET['ext'])) {

				$module_name = $_GET["ext"];

				$extention_functions = get_extension_funcs($module_name);

				sort($extention_functions);

				foreach ($extention_functions as $key => $value) {

					//$value = explode('_', $value);

					$value_r = str_replace('_', '-', $value);

					echo '&nbsp;&nbsp;&nbsp;<b>' . $key . ': <a href="https://www.php.net/manual/en/function.' . $value_r . '.php" target="_blank">' . $value . '()</a></b><hr>';
				}
			} elseif (!isset($_GET['ext']) & !isset($_GET["submit"])) {

				$extentions = get_loaded_extensions();

				sort($extentions);

				foreach ($extentions as $key => $value) {

					echo '&nbsp;&nbsp;&nbsp;' . $key . ': <a href="?ext=' . $value . '">' . $value . '</a><hr>';
				}

				echo '<a href="https://www.php.net/manual/en/indexes.functions.php" target="_blank">List of all the functions and methods in the manual</a> <br>';

				echo '<a href="https://www.php.net/manual/en/indexes.examples.php" target="_blank">Example listing</a>';
			}
		}
	}





	$doc = new doc();



	?>

    <br>

    <center>php pro documentation developed by <a href="https://facebook.com/developersharif">sharif</a></center>

    <br>

</body>



</html>