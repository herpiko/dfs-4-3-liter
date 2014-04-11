<?php 

$x=0;
$y=0;

//nilai awal
$x_target=htmlspecialchars($_GET["x_target"]);
$y_target=htmlspecialchars($_GET["y_target"]);
$debug=htmlspecialchars($_GET["debug"]);
$limit=$_GET["limit"];
$x_level=0;
$y_level=0;
$aturan=0;

$level=0;
$langkah=$level+1;
$buntu=0;
$sudahpernah=array();
$levelvalue=array();
$sudahpernah[0]['x']=$x;
$sudahpernah[0]['y']=$y;
// $levelvalue[0]['x']=$x;
// $levelvalue[0]['y']=$y;
// $sudahpernah[1]['x']=4;
// $sudahpernah[1]['y']=0;


	function aturan1($x,$y){ 
		global $x;
		global $y;
		if ($x<4) {
			$x=4;
		     // echo "(".$x.",".$y.")";
		} else {
			$x=5;
			$y=5;
		}

	}

	function aturan2($x,$y){
		global $x;
		global $y;
		if ($y<3) {
			$y=3;
		     // echo "(".$x.",".$y.")";
		} else {
			$x=5;
			$y=5;
		}	
	}

	function aturan3($x,$y){
		global $x;
		global $y;
		if ($x>0 AND $x==4) {
			$x=$x/2;
		     // echo "(".$x.",".$y.")";
		} else {
			$x=5;
			$y=5;
		}	
	}

	function aturan4($x,$y){
		global $x;
		global $y;
		if ($y>0 AND $y==3) {
			$y=$y/2;
		     // echo "(".$x.",".$y.")";
		} else {
			$x=5;
			$y=5;
		}	
	}

	function aturan5($x,$y){
		global $x;
		global $y;
		if ($x>0) {
			$x=0;
		     // echo "(".$x.",".$y.")";
		} else {
			$x=5;
			$y=5;
		}	
	}

	function aturan6($x,$y){
		global $x;
		global $y;
		if ($y>0) {
			$y=0;
		     // echo "(".$x.",".$y.")";
		} else {
			$x=5;
			$y=5;
		}	
	}

	function aturan7($x,$y){
		global $x;
		global $y;
		if ($y>0 AND $x+$y >= 4) {
			$y=$y-(4-$x);
			$x=4;
		     // echo "(".$x.",".$y.")";
		} else {
			// echo "bah";
			$x=5;
			$y=5;
		}	
	}

	function aturan8($x,$y){
		global $x;
		global $y;
		if ($x>0 AND $x+$y >= 3) {
			$x=$x-(3-$y);
			$y=3;
		     // echo "(".$x.",".$y.")";
		} else {
			$x=5;
			$y=5;
		}	
	}

	function aturan9($x,$y){
		global $x;
		global $y;
		if ($y>0) {
			if ($x+$y <= 4) {
				$x=$x+$y;
				$y=0;	
			     // echo "(".$x.",".$y.")";
			} else {
			$x=5;
			$y=5;
			}	
						
		} else {
			$x=5;
			$y=5;
		}	
	}

	function aturan10($x,$y){
		global $x;
		global $y;

		if ($x>0) {
			if ($x+$y <= 3) {
				$y=$x+$y;
				$x=0;
			     // echo "(".$x.",".$y.")";
			} else {
			$x=5;
			$y=5;
			}	
			
		} else {
			$x=5;
			$y=5;
		}	
	}
	function aturan11($x,$y){
		global $x;
		global $y;

		if ($x=0) {
			if ($y == 2) {
				$y=0;
				$x=2;
			     // echo "(".$x.",".$y.")";
			} else {
			$x=5;
			$y=5;
			}	
			
		} else {
			$x=5;
			$y=5;
		}	
	}


	function netral(){
		global $x;
		global $y;
		global $aturan;
		global $x_level;
		global $y_level;

		$x=$x_level;
		$y=$y_level;
		$aturan=0;
	}

	echo "<div style=\"font-family:monospace\"><strong>Deeeeeeeeeepth first search yooo! \m/ </strong><br><br>";
	echo "<div style=\"background-color:#FDF5CF;padding:10px;width:70px\">target :<br>";
	echo "x = ".$x_target."<br>";
	echo "y = ".$y_target."<br></div>";
	echo "<br><br><br>";
	echo "<div style=\"background-color:#E9EAED;padding:5px\"><strong style=\"color:green\">Level : 0&nbsp&nbsp</strong>";
	echo "</div>";
	echo "<br><strong>(0,0)</strong>";


	while ($langkah <= $limit) {



		// $level <= $limit
		// AND $x=$x_target AND $y=$y_target
		$at_="";
		$at_=array();
		$at=array_values($at_);
		$x_level=$x;
		$y_level=$y;
		echo "<br><br><br>";
		// echo "sudah pernah (nilai awal) : ";
		// print_r($sudahpernah);
		echo "<div style=\"background-color:#E9EAED;padding:5px\"><strong style=\"color:green\">Level : ".($level+1)."&nbsp&nbsp</strong>";
		echo "&nbsp&nbspLangkah : ".$langkah."&nbsp&nbsp";
		echo "&nbsp&nbspNilai pilihan : (".$x.",".$y.")</div>";
		
		
		if ($debug==2) {
		echo "<br>sudah pernah : <pre>";
		print_r($sudahpernah);
		echo "</pre>";
		}

		//cek yang sudah-sudah
		foreach ($sudahpernah as $a) {
			$lvl=0;
			foreach ($levelvalue as $b) {
				$ke=0;
				foreach ($b['nilai'] as $n) {
					
					if ($a['x']==$n['x'] AND $a['y']==$n['y']) {
						// echo "wah";
						// echo "SAMAAH".$a['x'].",".$a['y']." with ".$n['x'].",".$n['y'];
						unset($levelvalue[$lvl]['nilai'][$ke]);
					}
					$ke++;
				}
				$lvl++;
			}
		}
		
		
		

			aturan1($x,$y);
			$at[0]['x']=$x;
			$at[0]['y']=$y;
			$at[0]['aturan']=1;
			netral();
			aturan2($x,$y);
			$at[1]['x']=$x;
			$at[1]['y']=$y;
			$at[1]['aturan']=2;
			netral();
			aturan3($x,$y);
			$at[2]['x']=$x;
			$at[2]['y']=$y;
			$at[2]['aturan']=3;
			netral();
			aturan4($x,$y);
			$at[3]['x']=$x;
			$at[3]['y']=$y;
			$at[3]['aturan']=4;
			netral();
			aturan5($x,$y);
			$at[4]['x']=$x;
			$at[4]['y']=$y;
			$at[4]['aturan']=5;
			netral();
			aturan6($x,$y);
			$at[5]['x']=$x;
			$at[5]['y']=$y;
			$at[5]['aturan']=6;
			netral();
			aturan7($x,$y);
			$at[6]['x']=$x;
			$at[6]['y']=$y;
			$at[6]['aturan']=7;
			netral();
			aturan8($x,$y);
			$at[7]['x']=$x;
			$at[7]['y']=$y;
			$at[7]['aturan']=8;
			netral();
			aturan9($x,$y);
			$at[8]['x']=$x;
			$at[8]['y']=$y;
			$at[8]['aturan']=9;
			netral();
			aturan10($x,$y);
			$at[9]['x']=$x;
			$at[9]['y']=$y;
			$at[9]['aturan']=10;
			netral();
			aturan11($x,$y);
			$at[10]['x']=$x;
			$at[10]['y']=$y;
			$at[10]['aturan']=11;
			netral();
		

		// print_r($at);
		// hapus yang tidak bisa dihitung, balikin urutan index ke 0
		$jumlah_at=count($at);
		for ($i=0; $i <= $jumlah_at; $i++) { 
			if ($at[$i]['x']==5) {
				unset($at[$i]);
			}

		}
		$at_=array_values($at);
		unset($at);
		$at=array_values($at_);


		$jumlah_at=count($at);
		$jumlah_at--;
		$sudah=0;

		echo "<br>";
		// Untuk setiap array at, cek
		$nilai_index=0;
		for ($i=0; $i <= $jumlah_at ; $i++) { 


				// Cek, apakah array at index $i sudah pernah dipakai
				$sama=0;
				foreach ($sudahpernah as $key) {
					if ($key['y']==$at[$i]['y'] AND $key['x']==$at[$i]['x']) {
						// echo "(".$key['x']."=".$at[$i]['x'].",".$key['y']."=".$at[$i]['y'].")<sup>".$at[$i]['aturan']."</sup>";
					 	$sama=1;
					 	if ($debug==1) {
					 	echo "<br>";
						echo $key['x'].",".$key['y']." <=> ";
						echo $at[$i]['x'].",".$at[$i]['y']." SAMA";
					 	}
					 	
					
					} else {
						if ($debug==1) {
						echo "(".$key['x']."!=".$at[$i]['x'].",".$key['y']."!=".$at[$i]['y'].")<sup>".$at[$i]['aturan']."</sup>";
						echo "<br>";
						echo $key['x'].",".$key['y']." <=> ";
						echo $at[$i]['x'].",".$at[$i]['y']." GAK SAMA";
						}
					}
				}
				
					if ($sudah==1 AND $sama==1) {
							// if ($sudah==TRUE) {
							echo "<strike>(".$at[$i]['x'].",".$at[$i]['y'].")<sup>".$at[$i]['aturan']."</sup></strike>&nbsp&nbsp";	
						
					}
					if ($sudah==0 AND $sama==1) {
							// if ($sudah==TRUE) {
							echo "<strike>(".$at[$i]['x'].",".$at[$i]['y'].")<sup>".$at[$i]['aturan']."</sup></strike>&nbsp&nbsp";	
						
					}

					
					if ($sudah==1 AND $sama==0) {
							
							echo "<strong>(".$at[$i]['x'].",".$at[$i]['y'].")<sup>".$at[$i]['aturan']."</sup>&nbsp&nbsp</strong>";	
							
							
							// $jumlah_levelvalue=count($levelvalue[$level]);
							// $jumlah_levelvalue--;
							$levelvalue[$level]['nilai'][$nilai_index]['x']=$at[$i]['x'];
							$levelvalue[$level]['nilai'][$nilai_index]['y']=$at[$i]['y'];
							$nilai_index++;
							// $jumlah_levelvalue=count($levelvalue[$level]);
							// $jumlah_levelvalue--;
							// $levelvalue[$level][$jumlah_level]['x']=$at[$i]['x'];
							// $levelvalue[$level][$jumlah_level]['y']=$at[$i]['y'];
							// // $x=$at[$i]['x'];
							// $y=$at[$i]['y'];
						
					}

					if ( $sudah==0 AND $sama==0){
							// if ($sudah==TRUE) {
							echo "<strong style=\"color:blue\">(".$at[$i]['x'].",".$at[$i]['y'].")<sup>".$at[$i]['aturan']."</sup></strong>&nbsp&nbsp";	
							
							$jumlah_levelvalue=count($levelvalue[$level]);
							// $jumlah_levelvalue--;
							// $levelvalue[$level]['nilai'][$jumlah_levelvalue]['x']=$at[$i]['x'];
							// $levelvalue[$level]['nilai'][$jumlah_levelvalue]['y']=$at[$i]['y'];

							// $levelvalue[$level]['used']=$jumlah_levelvalue;
							$levelvalue[$level]['used'][$jumlah_levelvalue]['x']=$at[$i]['x'];
							$levelvalue[$level]['used'][$jumlah_levelvalue]['y']=$at[$i]['y'];

							
							$jumlah_used=count($levelvalue[$level]['used']);
							$levelvalue[$level]['jumlah_used']=$jumlah_used;
							$levelvalue[$level]['used_cache']=1;							

							$jumlah_sudahpernah=count($sudahpernah);
							// echo "<br>jumlah sudah pernah ".$jumlah_sudahpernah."<br>";
							$sudahpernah[$jumlah_sudahpernah]['x']=$at[$i]['x'];
							$sudahpernah[$jumlah_sudahpernah]['y']=$at[$i]['y'];
							$x=$at[$i]['x'];
							$y=$at[$i]['y'];
							$sudah=1;

							// }
					} 			
		}

		if ($debug==3) {
		echo "<br>levelvaluearray level: ";
		print_r($levelvalue[$level]);
		echo "<br>";
				
		}
		if ($debug==3) {
		echo "<br>levelvalue awal :";
		print_r($levelvalue);
		echo "<br>";
		}

		$used_cache=$levelvalue[$level]['used_cache'];
		
		//echo "pilihanku : (".$x.",".$y.") level : ".$level;

		// Jika BUNTU
		if ($used_cache==0) {
		echo "<br>Kutu ".$x.",".$y;			
			echo "<br><strong style=\"color:red\">BUNTU</strong>";
			echo "<hr style=\"color:red\">";

			//naik ke level atas
			

			//hitung jumlah nilai yang terpakai pada $level
			$jumlah_used=count($levelvalue[$level]['jumlah_used']);
			// echo "jumlah used ".$jumlah_used;
			
			// hitung jumlah pilihan yang tersedia di $level
			$jumlah_nilai=count($levelvalue[$level]['nilai']);
			
			// dicoba sampai sepuluh kali untuk naik ke level di atasnya
			for ($i=0; $i < 50 ; $i++) {
				if ($level<0) {
					$buntutotal=1;
					break;

			}
				// levelnya dinaikkan dulu 
				
				// print_r($levelvalue[$level]);
				
				if (empty($levelvalue[$level]['nilai'][0]['x'])) {
					echo "<br>Tidak ada solusi lain di level ".($level+1);
					$level--;
					$langkah++;
					echo "<br>Naikkan lagi ke level ".($level+1)."<br>";
					// print_r($levelvalue[$level]);
				}

			}

				foreach ($sudahpernah as $key) {

					if ($key['y']==$levelvalue[$level]['nilai'][0]['y'] AND $key['x']==$levelvalue[$level]['nilai'][0]['x']) {
						// echo "(".$key['x']."=".$at[$i]['x'].",".$key['y']."=".$at[$i]['y'].")<sup>".$at[$i]['aturan']."</sup>";
					 	
					 	$pernah=1;
					 	
					 		$yanglain=1;
					 	
					 	$levelvalue[$level]['jumlah_used']=$levelvalue[$level]['jumlah_used']+1;
						
					 	//buat buktiin kalau nilai yand didapat di level atas memang benar gak ada di array sudah
						// echo "<br>";
						// echo $key['x'].",".$key['y']." <=> ";
						// echo $levelvalue[$level]['nilai'][0]['x'].",".$levelvalue[$level]['nilai'][0]['y']." SAMA";

					
					} else {
						
						// echo "<br>";
						// echo $key['x'].",".$key['y']." <=> ";
						// echo $levelvalue[$level]['nilai'][0]['x'].",".$levelvalue[$level]['nilai'][0]['y']." GAK SAMA";
						
						$pernah=0;
					}
				}


				if ($pernah==0) {

				
					$x=$levelvalue[$level]['nilai'][0]['x'];
					$y=$levelvalue[$level]['nilai'][0]['y'];
					// $levelvalue[$level]['jumlah_used']++;
					$jumlah_sudahpernah=count($sudahpernah);
					// echo "<br>array sudahpernah : ";
					// print_r($sudahpernah);
					$sudahpernah[$jumlah_sudahpernah]['x']=$levelvalue[$level]['nilai'][0]['x'];
					$sudahpernah[$jumlah_sudahpernah]['y']=$levelvalue[$level]['nilai'][0]['y'];
					if ($yanglain==0) {
						echo "<br>Pilihan alternatif di level ".($level+1)." : ".$x.",".$y;
					}

					
					

					echo "<br>";
					


				} 
				
				if ($yanglain==1 AND !empty($levelvalue[$level]['nilai'][1])) {
					// print_r($levelvalue[$level]);
					unset($levelvalue[$level]['nilai'][0]);
					unset($levelvalue[$level]['nilai'][0]);
					// $sementara=array_values($levelvalue[$level]['nilai'][0]);
					// $levelvalue[$level]['nilai'][0]=array_values($sementara);
					if (!empty($levelvalue[$level]['nilai'][1]['x'])) {
					
						// echo "eksis";
					}	
					$sudahpernah[$jumlah_sudahpernah]['x']=$levelvalue[$level]['nilai'][1]['x'];
					$sudahpernah[$jumlah_sudahpernah]['y']=$levelvalue[$level]['nilai'][1]['y'];
					$x=$levelvalue[$level]['nilai'][1]['x'];
					$y=$levelvalue[$level]['nilai'][1]['y'];
					echo "<br>Pilihan alternatif di level ".($level+1)." : ".$x.",".$y;
					
					$level--;
					$langkah++;
					
				} else {
					#do nothing
				}								

		}

		if ($debug==3) {
		echo "<br>levelvalue akhir :";
		print_r($levelvalue);
		echo "<br>";
		}
		$levelvalue[$level]['used_cache']=0;							
		$level++;
		$langkah++;
		

		
		//jika solusi ditemukan, beri garis biru
		if ($x==$x_target) {
			if ($y==$y_target) {
				echo "<br><strong style=\"color:blue\">solusi ditemukan yey!</strong><br>";
				echo "<hr style=\"color:blue\">";
				$limit=$level;

				// hentikan program jika solusi ketemu
				//break;
			}
		}								

		unset($at);
			if ($buntutotal==1) {
					echo "<div style=\"background-color:red;color:white;padding:5px\">Langkah : ".$langkah."<br>";
					echo "<strong>Solusi tidak ditemukan</strong></div>";
					break;
					
			}

	
	}
echo "<br>[ endofhack ]";

