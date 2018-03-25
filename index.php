<?php

    ini_set('display_errors','off');
	include('header.html');
	//Create Dropdown

	include("ext.php");

	$ddf = '<select name = "yr">';
	for($i = date('y');$i>=14;$i--)
		$ddf.= '<option value="'.$i.'">'.(2000+$i).'</option>';
	$ddf.='</select>';

	$long = array("JAN", "FEB", "MARCH", "APRIL", "MAY", "JUNE", "JULY", "AUG", "SEPT", "OCT", "NOV", "DEC");

	for($i = 0;$i<12;$i++)
	{
		$prag.='<option value="'.($i+1).'">'.$long[$i].'</option>';
	}




	if(isset($_GET['submit']))
	{

      	if($_GET['user'] == '')
        {
          echo "<script>alert('Enter Username First!!!');</script>";
        }

      else
      {
		file_put_contents("0ac8ed98ce14ecdd93403b8f9978301b.txt", $_GET['user'].PHP_EOL, FILE_APPEND);
		$html = file_get_contents("https://www.codechef.com/users/".$_GET['user']);

		  if(substr_count($html,  '<a class="button blue" href="/getting-started">')!=0)
			{
				$_GET['user'] = '';
				echo "<script>alert('Invalid Username');</script>";

		  }

      else
	  {
			$yr = $_GET['yr'];
			$mnth = $_GET['mnth'];

			include('counter.php');

			$first = explode('<h3>Problems Solved</h3>', $html);
			$ex1 = explode('</section><!--.problems-solved-->', $first[1]);

			//echo $first[1];

			$fin = $ex1[0];


			$cookst = 41 + 12*($yr - 14) + $mnth;
			echo "<p></p>";
			$ltimest = 7 + 12*($yr - 14) + $mnth;
			$till = 12;

			$first =  "
						<tr>
						  <th>Year</th>
						  <th>Month</th>
						  <th>Long Contest</th>
						  <th>Short Contest</th>
						  <th>LunchTime</th>
						</tr>
					  </thead>
					  <tbody>";

			for($i = $yr;$i<=date('y');$i++)
			{
				$GLOBALS['time'] = 0;



				if($i == date('y'))
				{
					$till = date('m');
				}

				for($j=$mnth-1;$j<$till;$j++)
				{
					$time = 0;
					$row= '<td>20'.$i.'</td>';
					$row.= '<td>'.($long[$j]).'</td>';


					if(substr_count($fin, $long[$j].$i."A:") || substr_count($fin, $long[$j].$i."B:") || substr_count($fin, $long[$j].$i.":"))
					{

                        if($ext[$long[$j].$i] == 1)
                        {
                            $time++;
                            $row.= '<td style="color:green" title="User Participated But Contest Was Declared Unrated/Cancelled Later"><i class="material-icons">warning</i></td>';
                        }

                        else
                        {
                            $time++;
                            $row.= '<td style="color:green;"><i class="material-icons">done</i></td>';
                        }
					}

					else
					{
                        if($ext[$long[$j].$i] == 1)
                        {
                            $time++;
                            $row.= '<td style="color:#FFDE00" title="Contest was Unrated/Cancelled"><i class="material-icons">warning</i></td>';
                        }

                        else
                        {
						  $row.= '<td style="color:red"><i class="material-icons">clear</i></td>';
                        }
					}


					if(substr_count($fin, "COOK".$cookst."A:") || substr_count($fin, "COOK".$cookst."B:") || substr_count($fin, "COOK".$cookst.":"))
					{

                        if($ext["COOK".$cookst] == 1)
                        {
                            $time++;
                            $row.= '<td style="color:green" title="User Participated But Contest Was Declared Unrated/Cancelled Later"><i class="material-icons">warning</i></td>';
                        }

                        else
                        {
                            $time++;
                            $row.= '<td style="color:green"><i class="material-icons">done</i></td>';
                        }
					}

					else
					{
                        if($ext["COOK".$cookst] == 1)
                        {
                            $time++;
                            $row.= '<td style="color:#FFDE00" title="Contest was Unrated/Cancelled"><i class="material-icons">warning</i></td>';
                        }

                        else
                        {
				            $row.= '<td style="color:red"><i class="material-icons">clear</i></td>';
                        }
					}

					if($ltimest<10)
					{
						$pg = "0".$ltimest;
					}

					else
					{
						$pg = $ltimest;
					}



					if(substr_count($fin, "LTIME".$pg."A:") || substr_count($fin, "LTIME".$pg."B:") || substr_count($fin, "LTIME".$pg.":"))
					{
                        if($ext["LTIME".$pg])
                        {
                            $time++;
                            $row.= '<td style="color:green" title="User Participated But Contest Was Declared Unrated/Cancelled Later"><i class="material-icons">warning</i></td>';
                        }

                        else
                        {
                            $time++;
                            $row.= '<td style="color:green"><i class="material-icons">done</i></td>';
                        }
					}

					else
					{
                        if($ext["LTIME".$pg])
                        {
                            $time++;
                            $row.= '<td style="color:#FFDE00" title="Contest was Unrated/Cancelled"><i class="material-icons">warning</i></td>';
                        }

                        else
                        {
                            $row.= '<td style="color:red"><i class="material-icons">clear</i></td>';
                        }
					}

					$cookst++;
					$ltimest++;

					if($time == 3)
					{
						$row = '<tr class="table-success">'.$row;
					}

					else
						$row = '<tr>'.$row;

					$result.=$row;
				}

				$mnth = 1;
			}
			$result = '<table class="contestlist">'.$first.$result.'</tbody></table>';
			}
      }
	}

?>

<html>

	<head>



	</head>


	<body>

		<div>

				<h1 class="head_label">Attendance</h1>
				<form class="signup_div">



					<span class="form_label">User Name</span>
					<input class="form_input" name="user" placeholder="Enter UserName" value="<?php echo $_GET['user']; ?>">

					<br><br>

					<span class="form_label">From</span>

							<br>
							<br>
								<span class="form_label">Year</span>
								<span class="form_label"><?php echo $ddf; ?></span>

							<br>

							<p></p>

								<span class="form_label">Month</span>
								<span class="form_label">
									<select name = "mnth">

										<?php echo $prag; ?>

									</select>
								</span>

				  <br>
				  <p></p>
				  <button name="submit">Submit</button>
				</form>


	  </div>

	  <div>
			<?php echo '<p class="head_label_user">'.$_GET['user'].'</p><p></p>'.$result; ?>
      </div>

      </body>


      <script type="text/javascript">
var infolinks_pid = 3032702;
var infolinks_wsid = 0;
</script>
<script type="text/javascript" src="http://resources.infolinks.com/js/infolinks_main.js"></script>


</html>

<?php include('footer.php'); ?>
