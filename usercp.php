<?php
	$useEcho  = 1;
	$mysqlerr = 0;
	
	                     /* 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 0, 1, 2, 3, 4, 5) */  
	$evtMemberCount = array(1, 1, 1, 2, 2, 2, 1, 1, 5, 7, 5, 5, 8, 1 ,1, 2, 2, 1, 2, 1, 1, 1, 1, 1, 1, 1 ,1, 1, 1, 1, 1, 1, 1, 1, 1, 1);  
  $stopRegForEvt  = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);    
    
					   /*      0              1            2             3             4     */
	$evtSchDates = array('24.07.2014', '30.07.2014', '06.08.2014', '28.07.2014', '11.08.2014', // 0
                       '23.07.2014', '22.07.2014', '29.07.2014', '03.08.2014', '27.07.2014', // 1 
                       '31.07.2014', '04.08.2014', '06.07.2014', '05.08.2014', '10.08.2014', // 2 
                       '04.08.2014', '22.07.2014', '05.08.2014', '23.07.2014', '00.00.0000', // 3
                       '00.00.0000', '00.00.0000', '00.00.0000', '00.00.0000', '00.00.0000', // 4
                       '00.00.0000', '00.00.0000', '00.00.0000', '00.00.0000', '00.00.0000', // 5
                       '00.00.0000', '00.00.0000', '00.00.0000', '00.00.0000', '00.00.0000', // 6
                       '00.00.0000',
                       
                       '25.07.2014', '31.07.2014', '07.08.2014', '29.07.2014', '12.08.2014', // 0
                       '24.07.2014', '23.07.2014', '30.07.2014', '04.08.2014', '28.07.2014', // 1 
                       '01.08.2014', '05.08.2014', '07.08.2014', '14.08.2014', '11.08.2014', // 2 
                       '05.08.2014', '23.07.2014', '06.08.2014', '24.07.2014', '00.00.0000', // 3
                       '00.00.0000', '00.00.0000', '00.00.0000', '00.00.0000', '00.00.0000', // 4
                       '00.00.0000', '00.00.0000', '00.00.0000', '00.00.0000', '00.00.0000', // 5
                       '00.00.0000', '00.00.0000', '00.00.0000', '00.00.0000', '00.00.0000', // 6
                       '00.00.0000');                                                        // 7
							
						/*	0          1          2           3         4          5          6          7          8         9       */ 
	$evtSchTimes = array('0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM', // 0
                       '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM', // 1
                       '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM', // 2
                       '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM',                                             // 3
                       
                       '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM', // 0
                       '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM', // 1
                       '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM', // 2
                       '0:00 AM', '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM', '0:00 PM');		                                       // 3
						 
				   /*   0                         1                     2                           3                            4           */
	$events = array("Chess",                "Mehandi",              "Musical Chair",        "Word Hint",                "Connextions",          // 0
	                "Water Ballon ",        "Aim the Game ",        "Just A Minute",        "FootBall",                 "French Cricket",       // 1
                  "Rangoli",              "Pull the foe ",        "Throwball",            "Big Shot",        		      "Jasmin's Lucky Charm", // 2
                  "Dumb Charades",        "Shuttle",              "Slow Rider",           "Carrom",                   "To Be Named",          // 3
                  "To Be Named",          "To Be Named",          "To Be Named",          "To Be Named",              "To Be Named",          // 4
                  "To Be Named",          "To Be Named",          "To Be Named",          "To Be Named",              "To Be Named",          // 5
                  "To Be Named",          "To Be Named",          "To Be Named",          "To Be Named",              "To Be Named",          // 6
                  "To Be Named");  																									// 7						 
					
	$extraDates = array();
	
	$extraDates[30] = "";
	$extraDates[31] = "";
	$extraDates[32] = "";
	$extraDates[33] = "";
	$extraDates[34] = "";	
	$extraDates[35] = "";			
		
  /* Compromise to use old event ids for new events */
	                     /* 00, 01, 02, 03, 04, 05, 06, 07, 08, 09, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35) */
	$evtIdNewOldMap = array(32, 20, 17, 11,  5, 14,  1, 21, 10, 30, 34,  2, 35,  0,  8,  6, 33, 15, 31,  3,  4,  7,  9, 12, 13, 16, 18, 19, 22, 23, 24, 25, 26, 27, 28, 29);	
	
	if(isset($_SERVER["REMOTE_ADDR"])) { 
	$ipAddress = $_SERVER["REMOTE_ADDR"];
	} else if(isset($_SERVER["HTTP_X_FORWARDED_FOR"])) { 
	$ipAddress = $_SERVER["HTTP_X_FORWARDED_FOR"];
	} else if(isset($_SERVER["HTTP_CLIENT_IP"])) { 
	$ipAddress = $_SERVER["HTTP_CLIENT_IP"]; 
	}
	
	$userIPs = explode(',', $ipAddress);
	
	$ipParsed = "127.0.0.1";

	if(preg_match('/^(?:25[0-5]|2[0-4]\d|1\d\d|[1-9]\d|\d)(?:[.](?:25[0-5]|2[0-4]\d|1\d\d|[1-9]\d|\d)){3}$/', $userIPs[0]))
	{
		$ipParsed = $userIPs[0];
	}
	
	$con = mysqlI_connect("localhost","guest","pass");

	if(mysqli_errno($con) != 0)
	{
	  if($useEcho == 1) echo "No Connection con = " . $con . '__error = ' . mysqli_error($con) . '<br />';
	  $mysqlerr = 1;
	}
	else
	{
	  mysqlI_select_db( $con, "jas16anniv");

	  if(mysqli_errno($con) != 0)
	  {
		if($useEcho == 1) echo "Could not select Table con = " . $con . '__error = ' . mysqli_error($con) . '<br />';
		$mysqlerr = 2;
	  }
	  else
	  {

		$Query = 'SELECT NAME, EVTID, GROUPNAME from eventinfo WHERE IPADDR="' . $ipParsed . '" ORDER BY EVTID ASC;';

		$result = mysqlI_query($con, $Query);

		if(mysqli_errno($con) != 0)
		{
			if($useEcho == 1) echo "result for query = " . $result . '__error = ' . mysqli_error($con) . '<br />';
			$mysqlerr = 3;
		}
		else
		{		
			$i = 1;
			
			while($row = mysqlI_fetch_array($result))
			{
			  $evtId = mapOldIdToNew($row['EVTID']);
				
				if($i == 1)
				{
					echo '<h2> User Info Panel  </h2>';
					echo '<h3 style="text-align:center;font-size:87%;">(Events registered for ' . $row['NAME'] . ')</h3>';
			
					echo '<table style="width:87%;margin:6%;margin-top:1%;margin-bottom:1%;border:1px solid black;">' . "\r\n";
					echo '<tr style="width:99%;background-color:#999999;border:1px solid black;">' . "\r\n";
					echo '<td style="border:1px solid black;"> Sl.No. </td> <td style="border:1px solid black;"> Event </td> <td style="border:1px solid black;"> GroupName </td> <td style="border:1px solid black;"> Registration/Submission Deadline </td> <td style="border:1px solid black;"> Event/Polling Time </td>' . "\r\n";
					echo '</tr>' . "\r\n";			
				}
				echo '<tr style="width:99%;">' . "\r\n";
				echo '<td style="border:1px solid black;"> ' . $i . ' </td>';
				echo '<td style="border:1px solid black;"> ' . $events[$evtId] . ' </td>';
				echo '<td style="border:1px solid black;"> ' . $row['GROUPNAME'] . ' </td>';
				echo '<td style="border:1px solid black;"> ' . $evtSchDates[$evtId] . ' @ ' . $evtSchTimes[$evtId] . ' </td>';
				echo '<td style="border:1px solid black;"> ' . $evtSchDates[$evtId+count($events)] . ' @ ' . $evtSchTimes[$evtId+count($events)] . ' </td>';
				echo '</tr>' . "\r\n";
				$i++;
			}
			
			if($i == 1)
			{
				echo '<h2> User Info Panel  </h2>';
				echo '<h3 style="text-align:center;font-size:87%;">(Events registered for ' . $row['NAME'] . ')</h3>';
		
				echo '<table style="width:87%;margin:6%;margin-top:1%;margin-bottom:1%;border:1px solid black;">' . "\r\n";
				echo '<tr style="width:99%;background-color:#999999;border:1px solid black;">' . "\r\n";
				echo '<td style="border:1px solid black;"> Sl.No. </td> <td style="border:1px solid black;"> Event </td> <td style="border:1px solid black;"> GroupName </td> <td style="border:1px solid black;"> Registration/Submission Deadline </td> <td style="border:1px solid black;"> Event/Polling Time </td>' . "\r\n";
				echo '</tr>' . "\r\n";	
				echo '<tr style="width:99%;border:1px solid black;">' . "\r\n";
				echo '<td style="border:1px solid black;text-align:center;" colspan="5"> No events yet :( </td>' . "\r\n";
				echo '</tr>' . "\r\n";	
			}
			
			echo '</table>';
		}
	  }
	}
	
	function mapOldIdToNew($evtOldId)
	{
	  global $evtIdNewOldMap;
		
	  for($i=0;$i<36;$i++)
		{
		  if($evtOldId == $evtIdNewOldMap[$i])
			{
			  return $i;
			}
		}
		
		return $i;
	}
	
?>