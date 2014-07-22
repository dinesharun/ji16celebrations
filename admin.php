<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">  

  <head>
  
    <!-- Tile of the page -->
    <title> Jasmin 15th Anniversary </title>
	
	<link rel="icon" type="image/ico" href="favicon.ico" />

	<link rel="stylesheet" type="text/css" href="css/main.css" />
	<link rel="stylesheet" type="text/css" href="css/salsa.css"  />
	<link rel="stylesheet" type="text/css" href="css/philosopher.css" />
	<link rel="stylesheet" type="text/css" href="css/handlee.css" />
	<link rel="stylesheet" type="text/css" href="css/philosopher.css" />
	<link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.css" />
	
	<script type="text/javascript" src="scripts/jquerymin.js"></script>
	<script type="text/javascript" src="scripts/scripts.js"></script>
	<script type="text/javascript" src="scripts/jquery.mCustomScrollbar.min.js"></script>
	
  </head>
  
  <body class="adminConBody" onload="adminInit()">
  <div class="mainHeading"> JASMIN Infotech 15th Year Anniversary Celebrations </div><div class="lineSepLong"></div><br />
  <h1> Admin Console </h1></div><div class="lineSepAdSmall"></div>
  
  <div class="rightNavHeader"> Quick Links </div>
	<div class="rightNav" id="lnd">
		<div class="evtLink"> <a href="#evt00" class="leftNavLink"> <img src="images/32.png" class="evtImgSmall" /> &nbsp;Chess  </a> </div>
		<div class="evtLink"> <a href="#evt01" class="leftNavLink"> <img src="images/mehandi.png" class="evtImgSmall" /> &nbsp;Mehandi  </a> </div> 
		<div class="evtLink"> <a href="#evt02" class="leftNavLink"> <img src="images/musicChair.png" class="evtImgSmall" /> &nbsp;Musical Chair  </a> </div>
		<div class="evtLink"> <a href="#evt03" class="leftNavLink"> <img src="images/11.png" class="evtImgSmall" /> &nbsp;Word Hint  </a> </div>
		<div class="evtLink"> <a href="#evt04" class="leftNavLink"> <img src="images/connexion.png" class="evtImgSmall" /> &nbsp;Connextions  </a> </div>
		<div class="evtLink"> <a href="#evt05" class="leftNavLink"> <img src="images/waterBallon.png" class="evtImgSmall" /> &nbsp;Water Balloon  </a> </div>
		<div class="evtLink"> <a href="#evt06" class="leftNavLink"> <img src="images/1.png" class="evtImgSmall" /> &nbsp;Aim the Game  </a> </div>
		<div class="evtLink"> <a href="#evt07" class="leftNavLink"> <img src="images/21.png" class="evtImgSmall" /> &nbsp;Just A Minute  </a> </div>
		<div class="evtLink"> <a href="#evt08" class="leftNavLink"> <img src="images/football.png" class="evtImgSmall" /> &nbsp;FootBall  </a> </div>
		<div class="evtLink"> <a href="#evt09" class="leftNavLink"> <img src="images/frenchCric.png" class="evtImgSmall" /> &nbsp;French Cricket  </a> </div>
		<div class="evtLink"> <a href="#evt10" class="leftNavLink"> <img src="images/rangoli.png" class="evtImgSmall" /> &nbsp;Rangoli </a> </div>
		<div class="evtLink"> <a href="#evt11" class="leftNavLink"> <img src="images/foe1.png" class="evtImgSmall" /> &nbsp;Pull the foe  </a> </div>
		<div class="evtLink"> <a href="#evt12" class="leftNavLink"> <img src="images/35.png" class="evtImgSmall" /> &nbsp;Throwball (Ladies) </a> </div>
		<div class="evtLink"> <a href="#evt13" class="leftNavLink"> <img src="images/0.png" class="evtImgSmall" /> &nbsp;Big Shot  </a> </div>
		<div class="evtLink"> <a href="#evt14" class="leftNavLink"> <img src="images/8.png" class="evtImgSmall" /> &nbsp;Jasmin's Lucky Charm  </a> </div>
		<div class="evtLink"> <a href="#evt15" class="leftNavLink"> <img src="images/6.png" class="evtImgSmall" /> &nbsp;Dumb Charades  </a> </div>
		<div class="evtLink"> <a href="#evt16" class="leftNavLink"> <img src="images/33.png" class="evtImgSmall" /> &nbsp;Shuttle  </a> </div>
		<div class="evtLink"> <a href="#evt17" class="leftNavLink"> <img src="images/15.png" class="evtImgSmall" /> &nbsp;Slow Rider  </a> </div>
		<div class="evtLink"> <a href="#evt18" class="leftNavLink"> <img src="images/31.png" class="evtImgSmall" /> &nbsp;Carrom  </a> </div>
	</div>  
  </div>  
  
<?php 
	global $con;
	$useEcho  = 0;
	$mysqlerr = 0;
	
	$events = array("Chess",                "Mehandi",              "Musical Chair",        "Word Hint",                "Connextions",          // 0
	                "Water Ballon ",        "Aim the Game ",        "Just A Minute",        "FootBall",                 "French Cricket",       // 1
                  "Rangoli",              "Pull the foe ",        "Throwball",            "Big Shot",        		      "Jasmin's Lucky Charm", // 2
                  "Dumb Charades",        "Shuttle",              "Slow Rider",           "Carrom",                   "To Be Named",          // 3
                  "To Be Named",          "To Be Named",          "To Be Named",          "To Be Named",              "To Be Named",          // 4
                  "To Be Named",          "To Be Named",          "To Be Named",          "To Be Named",              "To Be Named",          // 5
                  "To Be Named",          "To Be Named",          "To Be Named",          "To Be Named",              "To Be Named",          // 6
                  "To Be Named"); 
					
	$evtMemberCount = array(1, 1, 1, 2, 2, 2, 1, 1, 5, 7, 5, 5, 8, 1 ,1, 2, 2, 1, 2, 1, 1, 1, 1, 1, 1, 1 ,1, 1, 1, 1, 1, 1, 1, 1, 1, 1);
		
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
	
	$con = mysqli_connect("localhost","guest","pass");
	
	if(mysqli_errno($con) != 0)
	{
	  if($useEcho == 1) echo "No Connection con = " . $con . '__error = ' . mysqli_error($con) . '<br />';
	  $mysqlerr = 1;
	}
	else
	{
	  mysqli_select_db($con,"jas16anniv");

	  if(mysqli_errno($con) != 0)
	  {
		if($useEcho == 1) echo "Could not select Table con = " . $con . '__error = ' . mysqli_error($con) . '<br />';
		$mysqlerr = 2;
	  }
	  else
	  {
		if(($ipParsed == "127.0.0.1") || ($ipParsed == "172.16.6.60") || ($ipParsed == "172.16.6.87") || ($ipParsed == "172.16.6.115") || ($ipParsed == "172.16.6.69"))
		{
			adminConsole();
		}
		else
		{
			echo "<h2> Access Denied </h2>";
		}
	  }
	}
	
	function adminConsole()
	{
		global $events;
				
		for($i=0;$i<count($events);$i++)
		{
			printEvtInfo($i);
		}
	}
	
	function printEvtInfo($i)
	{
		global $events;
		global $evtMemberCount;
		if($i < 10)
		{
			echo '<a id="evt0' . $i . '" name="evt0' . $i . '"> &nbsp; </a><h2>' . ($i) . '.&nbsp;&nbsp;&nbsp;' . $events[$i] . '&nbsp;&nbsp;&nbsp;<span style="font-size:60%;font-weight:normal;color:#000000;font-family:philosopher;">(' . $evtMemberCount[$i] . ')</span></h2><div class="lineSepAdSmall"></div>' . "\r\n";	
		}
		else
		{
			echo '<a id="evt' . $i . '" name="evt' . $i . '"> &nbsp; </a><h2>' . ($i) . '.&nbsp;&nbsp;&nbsp;' . $events[$i] . '&nbsp;&nbsp;&nbsp;<span style="font-size:60%;font-weight:normal;color:#000000;font-family:philosopher;">(' . $evtMemberCount[$i] . ')</span></h2><div class="lineSepAdSmall"></div>' . "\r\n";
		}
		
		PrintEvtAdMembers($i);
	}
	
	function PrintEvtAdMembers($evtId)
	{
		global $useEcho;
		global $evtMemberCount;
		global $con;
		global $evtIdNewOldMap;
		
		$evtOldId = $evtIdNewOldMap[$evtId];
		
		$query = 'SELECT eventinfo.NAME, eventinfo.IPADDR, eventinfo.GROUPNAME, userinfo.EMAIL FROM eventinfo LEFT JOIN userinfo ON eventinfo.IPADDR = userinfo.IPADDR WHERE EVTID=' . $evtOldId . ' ORDER BY eventinfo.GROUPNAME ASC ';

		$result = mysqli_query($con,$query);

		if(mysqli_errno($con) != 0)
		{
			if($useEcho == 1) echo "result for query = " . $result . '__error = ' . mysqli_error($con) . '<br />' . "\r\n";
			$mysqlerr = 3;
		}
		else
		{
	    echo '<div id="evt' . $evtId . 'table">' . "\r\n";  
		  echo '<table style="width:87%;text-align:center;margin-left:6%;">' . "\r\n";
		  
		  $i = 1;
		  
		  if($evtMemberCount[$evtId] == 1)
		  {
			  echo '<tr style="width:100%;background-color:#666666;"><td style="width:6%;border:1px solid black;color:#cccccc;vertical-align:middle;"> Sl.No. </td>' . "\r\n";
			  echo '<td style="width:30%;border:1px solid black;color:#cccccc;vertical-align:middle;"> Name </td>' . "\r\n";
			  echo '<td style="width:50%;border:1px solid black;color:#cccccc;vertical-align:middle;"> Email ID </td>' . "\r\n";
			  echo '<td style="width:15%;border:1px solid black;color:#cccccc;vertical-align:middle;"> Remove </td></tr>' . "\r\n";
				
			  while($row = mysqli_fetch_array($result))
			  {
				echo '<tr style="width:100%;"><td style="width:6%;border:1px solid black;font-family:philosopher;vertical-align:middle;">' . $i . '</td>' . "\r\n";
				echo '<td style="width:30%;border:1px solid black;font-family:philosopher;vertical-align:middle;">' . $row['NAME'] . '</td>' . "\r\n";
				echo '<td style="width:50%;border:1px solid black;font-family:philosopher;vertical-align:middle;">' . $row['EMAIL'] . '</td>' . "\r\n";
				echo '<td style="width:15%;border:1px solid black;font-family:philosopher;vertical-align:middle;"> <button id="evt'. $i . 'adbtn" class="evtRegAdBtn" type="submit" value="Reg" onclick="postRegInfo(1, ' . $evtId . ', 0, ' . "'" . $row['NAME'] . "'" . ", '' , 0, '', '#evt". $evtId . "table'" . ")" . '"> Remove </button></td></tr>' . "\r\n";
			
				$i++;
			  }
		  }
		  else
		  {
			  echo '<tr style="width:100%;background-color:#666666;"><td style="width:6%;border:1px solid black;color:#cccccc;vertical-align:middle;"> Sl.No. </td>' . "\r\n";
			  echo '<td style="width:18%;border:1px solid black;color:#cccccc;vertical-align:middle;"> Group Name </td>' . "\r\n";
			  echo '<td style="width:18%;border:1px solid black;color:#cccccc;vertical-align:middle;"> Name </td>' . "\r\n";
			  echo '<td style="width:42%;border:1px solid black;color:#cccccc;vertical-align:middle;"> Email ID </td>' . "\r\n";
			  echo '<td style="width:15%;border:1px solid black;color:#cccccc;vertical-align:middle;"> Remove </td></tr>' . "\r\n";
				
			  $prevGroupName = "";
			  $teamSize = $evtMemberCount[$evtId];
			  $j = 0;
			  
			  while($row = mysqli_fetch_array($result))
			  {
				if($prevGroupName != $row['GROUPNAME'])
				{
					for($j=$teamSize;$j<$evtMemberCount[$evtId];$j++)
					{
						echo '<tr style="width:100%;">' . "\r\n";
						echo '<td style="width:18%;border:1px solid black;font-family:philosopher;vertical-align:middle;"> &nbsp; </td>' . "\r\n";
						echo '<td style="width:42%;border:1px solid black;font-family:philosopher;vertical-align:middle;"> &nbsp; </td>' . "\r\n";
						echo '<td style="width:15%;border:1px solid black;font-family:philosopher;vertical-align:middle;">  &nbsp;  </td></tr>' . "\r\n";					
					}
					$teamSize = 1;
					
					echo '<tr style="width:100%;"><td style="width:6%;border:1px solid black;font-family:philosopher;vertical-align:middle;" rowspan="' . $evtMemberCount[$evtId] . '">' . $i . '</td>' . "\r\n";
					echo '<td style="width:18%;border:1px solid black;font-family:philosopher;vertical-align:middle;" rowspan="' . $evtMemberCount[$evtId] . '">' . $row['GROUPNAME'] . '</td>' . "\r\n";
					echo '<td style="width:18%;border:1px solid black;font-family:philosopher;vertical-align:middle;">' . $row['NAME'] . '</td>' . "\r\n";
					echo '<td style="width:42%;border:1px solid black;font-family:philosopher;vertical-align:middle;">' . $row['EMAIL'] . '</td>' . "\r\n";
					echo '<td style="width:15%;border:1px solid black;font-family:philosopher;vertical-align:middle;"> <button id="evt'. $i . 'adbtn" class="evtRegAdBtn" type="submit" value="Reg" onclick="postRegInfo(1, ' . $evtId . ', 0, ' . "'" . $row['NAME'] . "'" . ", '' , 0, '', '#evt". $evtId . "table'" . ")" . '"> Remove </button></td></tr>' . "\r\n";
					$i++;
				}
				else
				{
					echo '<tr style="width:100%;">' . "\r\n";
					echo '<td style="width:18%;border:1px solid black;font-family:philosopher;vertical-align:middle;">' . $row['NAME'] . '</td>' . "\r\n";
					echo '<td style="width:42%;border:1px solid black;font-family:philosopher;vertical-align:middle;">' . $row['EMAIL'] . '</td>' . "\r\n";
					echo '<td style="width:15%;border:1px solid black;font-family:philosopher;vertical-align:middle;"> <button id="evt'. $i . 'adbtn" class="evtRegAdBtn" type="submit" value="Reg" onclick="postRegInfo(1, ' . $evtId . ', 0, ' . "'" . $row['NAME'] . "'" . ", '' , 0, '', '#evt". $evtId . "table'" . ")" . '"> Remove </button></td></tr>' . "\r\n";					
					$teamSize++;
				}
				
				$prevGroupName = $row['GROUPNAME'];
				
			  }
			  for($j=$teamSize;$j<$evtMemberCount[$evtId];$j++)
			  {
				echo '<tr style="width:100%;">' . "\r\n";
				echo '<td style="width:18%;border:1px solid black;font-family:philosopher;vertical-align:middle;"> &nbsp; </td>' . "\r\n";
				echo '<td style="width:42%;border:1px solid black;font-family:philosopher;vertical-align:middle;"> &nbsp; </td>' . "\r\n";
				echo '<td style="width:15%;border:1px solid black;font-family:philosopher;vertical-align:middle;">  &nbsp;  </td></tr>' . "\r\n";					
			  }
		  }
		  
		  echo '</table><br />' . "\r\n";
		  
		  echo '<form id="evt' . $evtId . 'Form" action="reg.php" method="post" style="margin-left:6%;">' . "\r\n";
          echo 'Name: <input id="evt' . $evtId . 'NameIp" name="name"  class="ipAdText" type="text" val="" />&nbsp;&nbsp;&nbsp;'. "\r\n";
		  echo 'Email: <input id="evt'  .$evtId . 'MailIp" name="email" class="ipAdText" type="text" val="" />&nbsp;&nbsp;&nbsp;'. "\r\n";
		  if($evtMemberCount[$evtId] != 1) { echo 'Group Name:'; $gpNameType = 'type="text"'; } else { $gpNameType = 'type="hidden"'; }
		  echo '<input id="evt'  .$evtId . 'GroupName" name="groupname" class="ipAdText" ' . $gpNameType . ' val="" />&nbsp;&nbsp;&nbsp;'. "\r\n";
		  echo '<input id="evt'  .$evtId . 'IdIp" name="evtId" class="ipAdText" type="hidden" value="'  .$evtId . '" />&nbsp;&nbsp;&nbsp;'. "\r\n";
		  echo '<button id="uib" class="ipFormAdBtn" type="submit" val="submit"> Add Name </button>&nbsp;&nbsp;&nbsp;'. "\r\n";		  
		  echo '</form>' . "\r\n";
		  echo '<br /><br /><div class="lineSepLong"></div>';
		  echo '</div>' . "\r\n";
		}
	}
	
?>		 

	<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
	<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
	<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
  </body>
 </html>