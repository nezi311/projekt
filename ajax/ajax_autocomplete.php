<?php
	require_once('../vendor/autoload.php');
	\Config\Database\DBConfig::setDBConfig();
	$data = array();


	if(isset($_GET['term']))
	{
    $Model = new Models\Towar;
    $data = $Model->search($_GET['term']);
    $data=$data['towary'];

		$towary=array();
    foreach ($data as $value)
		{
      $towary[$value['IdTowar']]=$value['NazwaTowaru'];
		}
		//wydruk tablicy w formacie typu json
		echo json_encode($towary);
	}
	else
		echo "[]";
?>
