<?php 	/* 	Created : Des 4th 2014, Anwar Pasaribu		Memperoleh data kamar yang sudah dikelompokkan berdasarkan tipe kamar.		Data digunakan oleh Home.java.		*/		require('../Connections/antares_conn.php');	include("show_message.php");	include("helper_function.php");	header('Content-type: application/json');		$TABLE_KAMAR 	= "kamar";	$LIMIT_DATA		= 10;		$header_returned_data_kamar = "KAMAR";			$QUERY_KAMAR = "SELECT * FROM ".$TABLE_KAMAR." GROUP BY tipe LIMIT " . $LIMIT_DATA; 			//Array utk menampung data dari database	$data_kamar = array();		//Pilih database 	mysql_select_db($database_antares_conn, $antares_conn);		$data_kamar = getMySQLData($QUERY_KAMAR); //Fungsi getMySQLData mengembalikan Array		//Jika array yag dikembalikan salah satu data == null, tampilkan pesan error.	if($data_kamar == null) {		errorMassage();		return;	}	//Final data will send to client side	$data = sprintf(		'{ 		"%s" : %s		} ', 			$header_returned_data_kamar, json_encode($data_kamar, true)	);			print_r($data);		//Informasi yg dikirimkan kepada client	?>