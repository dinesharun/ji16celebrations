<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <!-- Tile of the page -->
    <title> Jasmin 16th Anniversary </title>
	
	<link rel="icon" type="image /ico" href="jilogo.png" />

	<link rel="stylesheet" type="text/css" href="css/main.css" />
	<link rel="stylesheet" type="text/css" href="css/salsa.css"  />
	<link rel="stylesheet" type="text/css" href="css/offside.css" />
	<link rel="stylesheet" type="text/css" href="css/handlee.css" />
	<link rel="stylesheet" type="text/css" href="css/philosopher.css" />
	<link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.css" />
	
	<script type="text/javascript" src="scripts/jquerymin.js"></script>
	<script type="text/javascript" src="scripts/scripts.js"></script>
	<script type="text/javascript" src="scripts/jquery.mCustomScrollbar.min.js"></script>
	<script type="text/javascript" src="scripts/galleria.js"></script>
	
  </head>
   
  <?php 
	global $con;
	$useEcho  = 0;
	$mysqlerr = 0;
	$fullName = "Guest";
  $emailID  = "";
  $preLevel = 0;
	$noReg    = 1;
	$evtD     = 0;
	$evtT     = 0;
	$totEvts = 36;
	
	/* EDIT HERE for question of the day */
	//$qodId    = 14;
	//$qodQues  = "Manish is the son of Harish.. So Harish is the ________of Manish's Father?";
	
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
	
	if($noReg == 0)
	{
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
		  #mysql_select_db("jas16anniv", $con);
		  mysqli_select_db( $con,"jas16anniv");

		  if(mysqli_errno($con) != 0)
		  {
			  if($useEcho == 1) echo "Could not select Table con = " . $con . '__error = ' . mysqli_error($con) . '<br />';
			  $mysqlerr = 2;
		  }
		  else
		  {
				$query = 'SELECT UNAME, NAME, EMAIL, LEVEL FROM userinfo WHERE IPADDR="' . $ipParsed . '"';

				#$result = mysql_query($query);
				$result = mysqli_query($con,$query);

				if(mysqli_errno($con) != 0)
				{
					if($useEcho == 1) echo "result for query = " . $result . '__error = ' . mysqli_error($con) . '<br />';
					$mysqlerr = 3;
				}
				else
				{
					if($row = mysqli_fetch_array($result))
					{
						$uName = $row['UNAME'];
						$fullName = $row['NAME'];
						$emailID  = $row['EMAIL'];
						$preLevel = $row['LEVEL'];
					}
					else
					{
					  $mysqlerr = 4;
					}
				}
		  }
		}
		
		if($useEcho == 1) echo "mysqlerr = ". $mysqlerr .'<br />';
		
		if($mysqlerr != 0)
		{
			$udName = @gethostbyaddr($ipParsed);
			$names  = explode('.', $udName);
			$uName  = ucfirst($names[0]);
			$fullName = $uName;
			$emailID  = "";
			$preLevel = 0;		
		}
		
		if($useEcho == 1) echo "User Info : " . $uName . ', ' . $fullName . ', ' . $emailID . ', ' . $preLevel;
		
		echo '<body onload="onLoadEvents(' . "'" . $uName . "'," . "'" . $ipParsed . "'" . ')">'. "\r\n";
		
		/* Seems to be new user as info not in DB, so ask user to update info */
		if($mysqlerr == 4)
		{
			requestUserInfo();
		}
	}
	else
	{
		echo '<body onload="onLoadEvents(' . "' Guest '," . "' '" . ')">'. "\r\n";
	}
	
	function requestUserInfo() {
		global $uName;
		global $fullName;
		
		echo '<br /> <div class="userInfoScreen" id="uis">'. "\r\n";
		echo '<div class="userInfoForm" id="uifd">'. "\r\n";
		echo '<div class="userInfoClose" id="uic" onclick="closeUserInfoForm()"></div>'. "\r\n";
		echo '<h2> User Information </h2/>'. "\r\n";
		echo 'Welcome <span class="uName">' . $fullName . '</span>, Please update your information <br />'. "\r\n";
		echo '<span style="font-size:81%;"> (Only for registration purposes) </span> <br /><br />'. "\r\n";
		echo '<form class="ipForm" id="uif" action="saveinfo.php" method="post">'. "\r\n";
		echo 'Enter your full name : <br /><input id="uin" name="name"  class="ipText" type="text" val="" /><br />'. "\r\n";
		echo 'Enter your email-id  : <br /><input id="uie" name="email" class="ipText" type="text" val="" /><br /><br />'. "\r\n";
		echo '<button id="uib" class="ipFormBtn" type="submit" val="submit"> Save User Info </button><br />'. "\r\n";
		echo '</form>'. "\r\n";
		echo '<br /><br /></div></div>'. "\r\n";
	}
	
	function PrintEvtMembers($evtId)
	{
		global $useEcho;
		global $ipParsed;
		global $fullName;
		global $evtMemberCount;
		global $stopRegForEvt;
		global $con;
		global $noReg;
		
    if($noReg == 0)
    {
      $query = 'SELECT eventinfo.NAME, eventinfo.IPADDR, eventinfo.GROUPNAME, userinfo.EMAIL FROM eventinfo LEFT JOIN userinfo ON eventinfo.IPADDR = userinfo.IPADDR WHERE EVTID=' . $evtId . ' ORDER BY eventinfo.GROUPNAME ASC ';

      $result = mysqli_query($con, $query);

      if(mysqli_errno($con) != 0)
      {
        if($useEcho == 1) echo "result for query = " . $result . '__error = ' . mysqli_error($con) . '<br />';
        $mysqlerr = 3;
      }
      else
      {
        echo '<h3> Registration </h3>';
        echo '<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->';
        echo '<table style="width:87%;text-align:center;margin-left:3%;">';
        
        $i = 1;
        $userRegistered = 0;
        $userName = $fullName;
        $userIP   = $ipParsed;
        
        if($evtMemberCount[$evtId] == 1)
        {
          echo '<tr style="width:100%;background-color:#666666;"><td style="width:10%;border:1px solid black;color:#cccccc;vertical-align:middle;"> Sl.No. </td>';
          echo '<td style="width:30%;border:1px solid black;color:#cccccc;vertical-align:middle;"> Name </td>';
          echo '<td style="width:60%;border:1px solid black;color:#cccccc;vertical-align:middle;"> Email ID </td></tr>';
          
          while($row = mysqli_fetch_array($result))
          {
          if($ipParsed == $row['IPADDR'])
          {
            $userRegistered = 1;
            $userName = $row['NAME'];
            $userIP   = $row['IPADDR'];
          }
          echo '<tr style="width:100%;"><td style="width:10%;border:1px solid black;font-family:salsa;vertical-align:middle;">' . $i . '</td>';
          echo '<td style="width:30%;border:1px solid black;font-family:salsa;vertical-align:middle;">' . $row['NAME'] . '</td>';
          echo '<td style="width:60%;border:1px solid black;font-family:salsa;vertical-align:middle;">' . $row['EMAIL'] . '</td></tr>';
          $i++;
          }
        }
        else
        {
          echo '<tr style="width:100%;background-color:#666666;"><td style="width:6%;border:1px solid black;color:#cccccc;vertical-align:middle;"> Sl.No. </td>';
          echo '<td style="width:21%;border:1px solid black;color:#cccccc;vertical-align:middle;"> GroupName </td>';
          echo '<td style="width:21%;border:1px solid black;color:#cccccc;vertical-align:middle;"> Name </td>';
          echo '<td style="width:51%;border:1px solid black;color:#cccccc;vertical-align:middle;"> Email ID </td></tr>';
        
          $prevGroupName = "";
          $teamSize = $evtMemberCount[$evtId];
          $j = 0;
          
          while($row = mysqli_fetch_array($result))
          {
          if($ipParsed == $row['IPADDR'])
          {
            $userRegistered = 1;
            $userName = $row['NAME'];
            $userIP   = $row['IPADDR'];
          }
          if($prevGroupName != $row['GROUPNAME'])
          {
            for($j=$teamSize;$j<$evtMemberCount[$evtId];$j++)
            {
              echo '<tr style="width:100%;">';
              echo '<td style="width:21%;border:1px solid black;font-family:salsa;vertical-align:middle;"> &nbsp; </td>';
              echo '<td style="width:51%;border:1px solid black;font-family:salsa;vertical-align:middle;"> &nbsp; </td></tr>';
            }
            $teamSize = 1;
            
            echo '<tr style="width:100%;"><td style="width:6%;border:1px solid black;font-family:salsa;vertical-align:middle;" rowspan="' . $evtMemberCount[$evtId] . '">' . $i . '</td>';
            echo '<td style="width:21%;border:1px solid black;font-family:salsa;vertical-align:middle;" rowspan="' . $evtMemberCount[$evtId] . '">' . $row['GROUPNAME'] . '</td>';
            echo '<td style="width:21%;border:1px solid black;font-family:salsa;vertical-align:middle;">' . $row['NAME'] . '</td>';
            echo '<td style="width:51%;border:1px solid black;font-family:salsa;vertical-align:middle;">' . $row['EMAIL'] . '</td></tr>';
            $i++;
          }
          else
          {
            echo '<tr style="width:100%;">';
            echo '<td style="width:21%;border:1px solid black;font-family:salsa;vertical-align:middle;">' . $row['NAME'] . '</td>';
            echo '<td style="width:51%;border:1px solid black;font-family:salsa;vertical-align:middle;">' . $row['EMAIL'] . '</td></tr>';
            $teamSize++;
          }
          $prevGroupName = $row['GROUPNAME'];
          
          }
          for($j=$teamSize;$j<$evtMemberCount[$evtId];$j++)
          {
            echo '<tr style="width:100%;">';
            echo '<td style="width:21%;border:1px solid black;font-family:salsa;vertical-align:middle;"> &nbsp; </td>';
            echo '<td style="width:51%;border:1px solid black;font-family:salsa;vertical-align:middle;"> &nbsp; </td></tr>';
          }
        }
        
        echo '</table>';
        
        if($stopRegForEvt[$evtId] != 1)
        {
          /* Group Event */
          if($evtMemberCount[$evtId] != 1)
          {
          echo '<br />';
          /* echo '<span  style="margin-left:3%;">Group ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   :&nbsp;&nbsp;&nbsp;</span><input id="evt' . $evtId . 'GroupId" name="groupid"  class="ipAdText" type="text" val="" /><br />'. "\r\n"; */
          echo '<span  style="margin-left:3%;">Group Name :&nbsp;&nbsp;&nbsp;</span><input id="evt'  .$evtId . 'GroupName" name="groupname" class="ipAdText" type="text" val="" />&nbsp;&nbsp;&nbsp;'. "\r\n";
          }
          
          if($userRegistered == 0) {
          echo '<button id="evt' . $evtId . 'btn" class="evtRegBtn" type="submit" value="Reg" onclick="postRegInfo(0, ' . $evtId . ', 1, ' . "'" . $userName . "'" . ', ' . "'" . $userIP . "'" . ', 0,' . "''," . "'#evt" . $evtId . "Table'" . ')"> Register for this Event </button>'; }
          else {
          echo '<button id="evt' . $evtId . 'btn" class="evtRegBtn" style="color:#ff0000;" type="submit" value="Unreg" onclick="postRegInfo(0, ' . $evtId . ', 0, ' . "'" . $userName . "'" . ', ' . "'" . $userIP . "'" . ', 0,' . "''," . "'#evt" . $evtId . "Table'" . ')"> Unregister from this Event </button>';
          }
        }
        else
        {
          echo '<br />';
          echo '<div style="text-align:left;margin-left:3%;width:93%;color:#3333cc;font-weight:bold;"> Event Closed </div>';
        }
      }
    }
    else
    {
      $file = "data/evt_" . $evtId . ".htm";
			if(file_exists($file) == true)
			{
        echo file_get_contents($file);
		  }
    }
	}
	
function IsAnswerPresent()
{
		global $ipParsed;
		global $useEcho;
		global $qodId;
		global $con;
		$present = false;

		$query = 'SELECT NAME FROM QOD WHERE QID=' . $qodId . ' AND IPADDR="' . $ipParsed . '";';

    #$result = mysql_query($query);
		$result = mysqli_query($con,$query);

    if(mysqli_errno($con) != 0)
    {
        if($useEcho == 1) echo "result for query = " . $result . '__error = ' . mysqli_error($con) . '<br />';
        $mysqlerr = 3;
    }
    else
    {
      //if($row = mysqli_fetch_array($result))
      {
        $present = true;
      }
    }
		
  return $present;
}
	
	function AddAlbumImages()
	{
		global $useEcho;
		$albPath = "albums/";
		$noAlb   = 1;
		$i       = 0;
		$fileCnt = array();
		
		if(is_dir($albPath))
		{
			$currRootDir = opendir($albPath);
	
			while($folder = readdir($currRootDir))
			{
				if($useEcho ) { echo $folder . '  '; }
				
				$fullPath = $albPath . $folder . '/';
				
				if((is_dir($fullPath)) && ($folder != ".") && ($folder != ".."))
				{				
					if($currDir = opendir($fullPath))
					{
						echo '<div class="albName" onclick="switchAlbums(' . $i . ')">' . $folder . ' <img id="albName' . $i . '" style="float:right;width:3%;border:0px;" src="images/ua.png" /> </div>';
						echo '<div id="alb' . $i . '" class="albDiv">';
						
						$j = 0;
						
						while(($file = readdir($currDir)) != false)
						{
							if(($file != ".") && ($file != "..") && ($file != "thumbs"))
							{
								$noAlb   = 0;
								if($useEcho ) { echo $file . ' '; }
								
								if(strstr($file, ".db"))
								{
								}
								else if(strstr($file, ".mp4"))
								{
									echo '<a href="' . $fullPath . $file . '"><span class="video"> Watch the Video </span></a>';
								}
								else
								{
									echo '<a href="' . $fullPath . $file . '"><img src="' . $fullPath . "thumbs/" . $file . '" /></a>';
								}
								
								$j++;
							}
						}
						
						if($j == 0)
						{
							echo '<div style="color:#331111;text-align:center;font-weight:bold;text-shadow:0px 0px 1px #eeeeee;"> No Pictures in this Album Yet :( </div>';
						}
						$fileCnt[$i] = $j;
						
						echo '</div>';
						$i++;
					}
				}
			}
		}
		
		if($noAlb == 1)
		{
			echo '<div style="color:#aa9999;text-align:center;font-weight:bold;text-shadow:0px 0px 1px #eeeeee;"> No Albums Yet! </div>';
		}
		else
		{
			echo '<script type="text/javascript">';
			echo "Galleria.loadTheme('scripts/themes/lightbox/galleria.lightbox.js');";
			for($j=0;$j<$i;$j++)
			{
				if($fileCnt[$j] != 0)
				{
					echo "$('#alb". $j ."').galleria();";
				}
			}
			echo '</script>';
		}
		
		echo '<br /><br /><br />';
	}
	
  ?>  	
  
    <!-- Top Navigation  -->     
	<div class="ji15LogoDiv">
		<a href="http://ji16celebrations.appspot.com/" target="_blank"> 
			<img src="images/ji16.jpg" class="ji15LogoImg" /> 
		</a>
		<!--[if !IE]> --><div class="lineSepLong"></div><!-- <![endif]-->
		<a href="http://www.jasmin-infotech.com" target="_blank"> 
			<img src="images/jilogo.png" style="width:96%;margin-top:0.6%;" />
		</a>
	</div>
	<div class="topNav">
		<table style="padding-left:6%;width:100%;text-align:center;">
			<tr style="width:100%;">
				<td class="navCell" style=""> <a href="#home" class="topNavLink"> Home </a> </td>
				<td class="navCell"> <a href="#news" class="topNavLink"> News </a> </td>
				<td class="navCell"> <a href="#evts" class="topNavLink"> Events </a> </td>
        <td class="navCell"> <a href="#schd" class="topNavLink"> Schedule </a> </td>
				<td class="navCell"> <a href="#rels" class="topNavLink"> Results </a> </td>
				<td class="navCell"> <a href="#albs" class="topNavLink"> Albums  </a> </td>
				<?php if($noReg == 0) { echo '<td class="navCell"> <a href="#uscp" class="topNavLink"> UserInfo  </a> </td>'; } ?>
				<td class="navCell"> <a href="usage.html" target="_blank" class="topNavLink"> Usage Guide  </a> </td>
			</tr>
		</table>
	</div>
	
	<!-- Right Navigation -->
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
	
	<!-- Home Section -->
	<a id="home" name="home"> &nbsp; </a><br /><div class="lineSepLong"></div>
	<div class="mainHeading"> JASMIN Infotech 16th Year Anniversary Celebrations </div><div class="lineSepLong"></div><br /><br />
	<img src="images/header1.png" style="width:72%;margin-left:12%;margin-right:12%;" /><br /><br /><div class="lineSepLong"></div>

	<div class="todayDiv"> 
		<h3 style="text-align:center;">Today's Events </h3><!--[if !IE]> --><div class="lineSepLong"></div><!-- <![endif]--><br />
		
		<!-- EDIT HERE with the current date -->
		<div class="date" style="width:100%;text-align:left;"> Wednesday, 23-07-2014 </div>
		
		<!-- EDIT HERE for Events of the day -->
		<ul>
			<li>Today's Deadline : Register for Shuttle & Aim the Game ! </li>
			
		</ul>
	</div>
	<div style="float:right;width:1px;margin:1.2%;">
		<div class="lineSepVert"> <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /></div>
	</div>
	
	<br /><br /> Welcome <span class="uName" id="wun"> <?php echo $fullName; ?> </span>, browse through the site and register for events <br /><br />
	A Milestone, 16 years of Innovation..... <br /> Welcome to Jasmin's anniversary celebration spectacular.
	<br /><br /><br /><br /><br /><br /><br /><br />
	
	<?php
		if($noReg == 0)
		{
			//echo '<div class="lineSepLong"></div><h3> Question of the day </h3>';
			//echo '<div id="qodDiv">';
			//echo $qodQues . '&nbsp;:&nbsp;';
			
			//if(IsAnswerPresent() == false)
			//{
				//echo '<input id="qOfDay" name="qodAns" type="text" value="" > </input>';
				//echo '<button id="qOfDatBtn" type="submit" value="Reg" onclick="submitQODAnswer(' . $qodId . ", '" . $fullName . "', '" . $ipParsed . "'" . ')"> Submit </button><br /><br />';
			//}
			//else
			//{
				//echo '<span style="color:#666699;"> You have already anwered  the question </span>';
			//}
			//echo '</div>';
		}
	?>
	
	<!-- News Section -->
	<a id="news" name="news"> &nbsp; </a><div class="lineSepLong"></div>
	<h2> News </h2>
	
	<br />
	
	<!-- EDIT HERE for News -->
	<ol style="font-family:Handlee;">
		<li> Registrations for all events now open<img src="images/new.gif" style="" /> </li>
		<li> Web portal Usage Guide updated in the <a href="usage.html" target="_blank"> following path  </a> </li>
		<li> Web portal <a href="http://celebrations/" target="_blank"> http://celebrations/ </a> for internal users and 
		<a href="http://ji16celebrations.appspot.com/" target="_blank"> http://ji16celebrations.appspot.com/ </a> for external users.
	</ol>
	
	<br />
 	
	<!-- Events Section -->
	<a id="evts" name="evts"> &nbsp; </a><div class="lineSepLong"></div>
	<h2> Events </h2>
	
	<div class="eventsList">
		<table style="width:99%;">
			<tr style="width:100%;">
				<td style="width:9%;"> <div class="eventDiv"><a href="#evt00" class="evtListLink"> <img src="images/32.png" class="evtImgTiny" /><br /> Chess  </a> </div>
				<td style="width:9%;"> <div class="eventDiv"><a href="#evt01" class="evtListLink"> <img src="images/mehandi.png" class="evtImgTiny" /><br /> Mehandi</a> </div>
				<td style="width:9%;"> <div class="eventDiv"><a href="#evt02" class="evtListLink"> <img src="images/musicChair.png" class="evtImgTiny" /><br /> Musical Chair  </a> </div>
				<td style="width:9%;"> <div class="eventDiv"><a href="#evt03" class="evtListLink"> <img src="images/11.png" class="evtImgTiny" /><br /> Word Hint  </a> </div>
				<td style="width:9%;"> <div class="eventDiv"><a href="#evt04" class="evtListLink"> <img src="images/connexion.png" class="evtImgTiny" /><br /> Connextions </a> </div>
				<td style="width:9%;"> <div class="eventDiv"><a href="#evt05" class="evtListLink"> <img src="images/waterBallon.png" class="evtImgTiny" /><br /> Water Baloon  </a> </div>
				<td style="width:9%;"> <div class="eventDiv"><a href="#evt06" class="evtListLink"> <img src="images/1.png" class="evtImgTiny" /><br />  Aim the Game  </a> </div>
		</tr>
  	<tr style="width:100%";>
				<td style="width:9%;"> <div class="eventDiv"><a href="#evt07" class="evtListLink"> <img src="images/21.png" class="evtImgTiny" /><br /> Just A Minute  </a> </div>
				<td style="width:9%;"> <div class="eventDiv"><a href="#evt08" class="evtListLink"> <img src="images/football.png" class="evtImgTiny" /><br /> Foot Ball  </a> </div>
				<td style="width:9%;"> <div class="eventDiv"><a href="#evt09" class="evtListLink"> <img src="images/frenchCric.png" class="evtImgTiny" /><br /> French Cricket  </a> </div>
				<td style="width:9%;"> <div class="eventDiv"><a href="#evt10" class="evtListLink"> <img src="images/rangoli.png" class="evtImgTiny" /><br /> Rangoli </a> </div>
				<td style="width:9%;"> <div class="eventDiv"><a href="#evt11" class="evtListLink"> <img src="images/foe1.png" class="evtImgTiny" /><br />  Pull the Foe  </a> </div>
				<td style="width:9%;"> <div class="eventDiv"><a href="#evt12" class="evtListLink"> <img src="images/35.png" class="evtImgTiny" /><br /> Throwball (Ladies) </a> </div>
				<td style="width:9%;"> <div class="eventDiv"><a href="#evt13" class="evtListLink"> <img src="images/0.png" class="evtImgTiny" /><br />  Big Shot  </a> </div>
		</tr>
		<tr style="width:100%";>
				<td style="width:9%;"> <div class="eventDiv"><a href="#evt14" class="evtListLink"> <img src="images/8.png" class="evtImgTiny" /><br />  Jasmin's Lucky Charm  </a> </div>
				<td style="width:9%;"> <div class="eventDiv"><a href="#evt15" class="evtListLink"> <img src="images/6.png" class="evtImgTiny" /><br />  Dumb Charades  </a> </div>
				<td style="width:9%;"> <div class="eventDiv"><a href="#evt16" class="evtListLink"> <img src="images/33.png" class="evtImgTiny" /><br /> Shuttle  </a> </div>
				<td style="width:9%;"> <div class="eventDiv"><a href="#evt17" class="evtListLink"> <img src="images/15.png" class="evtImgTiny" /><br /> Slow Rider  </a> </div>
				<td style="width:9%;"> <div class="eventDiv"><a href="#evt18" class="evtListLink"> <img src="images/31.png" class="evtImgTiny" /><br /> Carrom  </a> </div>
		</tr>
		</table>
	</div>
	
	<!-- Tournaments Section -->
	<!-- <a id="tour" name="tour"> &nbsp; </a><div class="lineSepLong"></div>
	<h2> Tournaments </h2>
	
	<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
	<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
	<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /> -->
	
	<!-- Schedules Section -->
	<a id="schd" name="schd"> &nbsp; </a><div class="lineSepLong"></div>
	<h2> Schedule </h2>
	
	<table style="width:87%;margin:1%;margin-left:6%;font-size:105%;">
		<tr>
			<td colspan="7" style="border:1px solid #000000;background-color:#dddddd;text-align:center;"> 
				Legend <br /> 
				<span class="schDate"> Date </span><br />
				<span class="schReg"> Registration/Submission Deadline </span><br />
				<span class="schEvt"> Event/Polling Time </span><br />
			</td>
		</tr>
		<tr style="width:99%;">
			<td style="width:14.2%;border:1px solid #000000;background-color:#999999;text-align:center;"> Sunday </td>
			<td style="width:14.2%;border:1px solid #000000;background-color:#999999;text-align:center;"> Monday </td>
			<td style="width:14.2%;border:1px solid #000000;background-color:#999999;text-align:center;"> Tuesday </td>
			<td style="width:14.2%;border:1px solid #000000;background-color:#999999;text-align:center;"> Wednesday </td>
			<td style="width:14.2%;border:1px solid #000000;background-color:#999999;text-align:center;"> Thursday </td>
			<td style="width:14.2%;border:1px solid #000000;background-color:#999999;text-align:center;"> Friday </td>
			<td style="width:14.2%;border:1px solid #000000;background-color:#999999;text-align:center;"> Saturday </td>
		</tr> 
				
		<?php
		
			$date = 20;  /* start of week sunday */
			$mnth = 7;
			$year = 2014;
			$d    = "";
			
			for($i=0;$i<5;$i++)
			{
				echo '<tr style="width:99%;">';
				
				for($j=0;$j<7;$j++)
				{
					if($date < 10) { $d = '0'. $date; }
					else {$d = $date; }
					$d = $d . '.';
					if($mnth < 10) { $d = $d . '0'. $mnth; }
					else {$d = $d . $mnth; }
					$d = $d . '.';
					$d = $d . $year;
					
					echo '<td style="width:14.2%;border:1px solid #000000;background-color:#eeeeee;text-align:center;">';
					echo '<div class="schDate">' . $d . '</div>';
					echo '<!--[if !IE]> --><div class="lineSepLong" style="height:1px;"></div><!-- <![endif]-->';
					echo '<div class="schReg">' . FindSchReg($d) . '</div>';
					echo '<div class="schEvt">' . FindSchEvt($d) . '</div>';
					echo '</td>';
					
					$date++;
					if($date >= 32) {$date = 1; $mnth++;}
				}
				
			    echo '</tr>';
			}

			function FindSchReg($d)
			{
				global $evtSchDates;
				global $evtSchTimes;
				global $events;
				
				$respTxt = "";
				
				for($i=0;$i<count($evtSchDates);$i++)
				{
					if($evtSchDates[$i] == $d)
					{
						if($i < count($events))
						{
							$respTxt = $respTxt . $events[$i] . '@' . $evtSchTimes[$i] . ', ';
						}
					}
				}
				
				if($respTxt == "")
				{
					$respTxt = "Free";
				}
				
				return $respTxt;
			}
			
			function FindSchEvt($d)
			{
				global $evtSchDates;
				global $evtSchTimes;
				global $extraDates;
				global $events;
				
				$respTxt = "";
				
				for($i=0;$i<count($evtSchDates);$i++)
				{
					if($evtSchDates[$i] == $d)
					{
						if($i >= count($events))
						{
							$k = $i - count($events);
							$respTxt = $respTxt . $events[$k] . '@' . $evtSchTimes[$i] . ', ';
						}
					}
				}
				for($k=0;$k<count($events);$k++)
				{
					if(isset($extraDates[$k]) == true)
					{
						if(strstr($extraDates[$k], $d))
						{
							$respTxt = $respTxt . $events[$k] . '@' . $evtSchTimes[$k+count($events)] . ', ';
						}
					}
				}
				
				if($respTxt == "")
				{
					$respTxt = "Free";
				}
				
				return $respTxt;
			}
		?>
		
	</table> 
	
	<!-- Results Section -->
	<a id="rels" name="rels"> &nbsp; </a><div class="lineSepLong"></div>
	<h2> Results </h2>
	<div style="text-align:center;">Results will be updated only at the end of all events. </div><br /><br />
		
	<!-- Albums Section -->
	<a id="albs" name="albs"> &nbsp; </a><div class="lineSepLong"></div>
	<h2> Albums </h2>
	<?php AddAlbumImages(); ?>
		
	<!-- UserCP Section -->
	<?php
    if($noReg == 0)
    {
      echo '<a id="uscp" name="uscp"> &nbsp; </a><div class="lineSepLong"></div>';
      echo '<div id="userCPFrame">  </div>';
      echo '<button class="evtRegBtn" style="margin:0px;margin-left:39%;width:22%;font-size:96%;" onclick="showUserCP()"> Refresh Info </button>';
      echo '<br /><br />';
    }
  ?>
	
	<!-- Event Section -->
	<a id="evt00" name="evt00"> &nbsp; </a><div class="lineSepLong"></div>
	<h2> <img src="images/32.png" class="evtImgBig" /> &nbsp;&nbsp;&nbsp;Chess</h2>	
	<!--[if !IE]> --><div class="lineSepTiny"></div><!-- <![endif]-->
	<table style="width:100%;">
		<tr style="width:100%;">
			<td	<?php { echo 'style="width:39%;"';} ?> >
				<h3> Description </h3>
				The tournament for Chess game.
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
				<h3> Rules </h3> 
				 <ol>
					<li>Individual, live event. </li>
					<li>Seperate event for both gender.</li>
					<li>If any player,skip the match for any reason,their opponent will be declared winner for the corresponding round.</li> 
					<li>There will be 5 rounds in total.</li>
					<li>The team and match schedules will be announced once registration over.</li>
				</ol>
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
				<h3> Schedule </h3> 
				<table style="width:100%;"> 
					<tr style="width:100%;">
						<td class="timeEvt"> Registration Deadline : </td> 
						<td class="date"> <?php echo $evtSchDates[0]; ?> </td> 	
						<td class="time"> <?php echo $evtSchTimes[0]; ?> </td> 
					</tr> 
				</table>
				<table style="width:100%;"> 
					<tr style="width:100%;">
						<td class="timeEvt"> Tournaments Starts from : </td> 
						<td class="date"> <?php echo $evtSchDates[0+$totEvts] ?> </td> 
						<td class="time"> <?php echo $evtSchTimes[0+$totEvts]; ?> </td>
					</tr> 
				</table>
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
			</td>
			<td style="width:1%;vertical-align:middle;text-align:center;">
				<div class="lineSepVert"> <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /></div>
			</td>
			<td	<?php { echo 'style="width:69%;"';} ?> >
				<div id="evt0Table" style="margin-left:3%;"> <?php {PrintEvtMembers(0);} ?> </div>
			</td>
		</tr>
	</table>
  
  
	<!-- Event Section -->
	<a id="evt01" name="evt01"> &nbsp; </a><div class="lineSepLong"></div>
	<h2> <img src="images/mehandi.png" class="evtImgBig" /> &nbsp;&nbsp;&nbsp;Mehandi </h2>
	<!--[if !IE]> --><div class="lineSepTiny"></div><!-- <![endif]-->
	<table style="width:100%;">
		<tr style="width:100%;">
			<td	<?php { echo 'style="width:39%;"';} ?> >
				<h3> Description </h3>
				Interesting Game played with Music.Run around and have fun.
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
				<h3> Rules </h3> 
				 <ol>
					<li>Individual, live event . </li>
					<li>Bring your own materials . </li>
					
				</ol>
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
				<h3> Schedule </h3> 
				<table style="width:100%;"> 
					<tr style="width:100%;">
						<td class="timeEvt"> Registration Deadline : </td> 
						<td class="date"> <?php echo $evtSchDates[1]; ?> </td> 
					<td class="time"> <?php echo $evtSchTimes[1]; ?> </td>
					</tr> 
				</table>
				<table style="width:100%;"> 
					<tr style="width:100%;">
						<td class="timeEvt"> Event Time : </td> 
						<td class="date"> <?php echo $evtSchDates[1+$totEvts]; ?> </td> 
					<td class="time"> <?php echo $evtSchTimes[1+$totEvts]; ?> </td>
					</tr> 
				</table>
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
			</td>
			<td style="width:1%;vertical-align:middle;text-align:center;">
				<div class="lineSepVert"> <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /></div>
			</td>
			<td	<?php { echo 'style="width:69%;"';} ?> >
				<div id="evt1Table" style="margin-left:3%;"> <?php {PrintEvtMembers(1);} ?> </div>
			</td>
		</tr>
	</table>
		
			
		<!-- Event Section -->
	<a id="evt02" name="evt02"> &nbsp; </a><div class="lineSepLong"></div>
	<h2> <img src="images/musicChair.png" class="evtImgBig" /> &nbsp;&nbsp;&nbsp;Musical Chair </h2>
	<!--[if !IE]> --><div class="lineSepTiny"></div><!-- <![endif]-->
	<table style="width:100%;">
		<tr style="width:100%;">
			<td	<?php { echo 'style="width:39%;"';} ?> >
				<h3> Description </h3>
				Take us to the world of curves!
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
				<h3> Rules </h3> 
				 <ol>
					<li>Live event.</li>
					<li>Separate event for male/female.</li>
									
				</ol>
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
				<h3> Schedule </h3> 
				<table style="width:100%;"> 
					<tr style="width:100%;">
						<td class="timeEvt"> Registration Deadline : </td> 
						<td class="date"> <?php echo $evtSchDates[2]; ?> </td> 
						<td class="time"> <?php echo $evtSchTimes[2]; ?> </td>
					</tr> 
				</table>
				<table style="width:100%;"> 
					<tr style="width:100%;">
						<td class="timeEvt"> Event Time : </td> 
						<td class="date"> <?php echo $evtSchDates[2+$totEvts]; ?> </td> 
					<td class="time"> <?php echo $evtSchTimes[2+$totEvts]; ?> </td>
					</tr> 
				</table>
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
			</td>
			<td style="width:1%;vertical-align:middle;text-align:center;">
				<div class="lineSepVert"> <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /></div>
			</td>
			<td	<?php { echo 'style="width:69%;"';} ?> >
				<div id="evt2Table" style="margin-left:3%;"> <?php {PrintEvtMembers(2);} ?> </div>
			</td>
		</tr>
	</table>
	
	
	<!-- Event Section -->
	<a id="evt03" name="evt03">  &nbsp; </a><div class="lineSepLong"></div>
	<h2> <img src="images/11.png" class="evtImgBig" /> &nbsp;&nbsp;&nbsp;Word Hint </h2>
	<!--[if !IE]> --><div class="lineSepTiny"></div><!-- <![endif]-->
	<table style="width:100%;">
		<tr style="width:100%;">
			<td	<?php { echo 'style="width:39%;"';} ?> >
				<h3> Description </h3>
				Mind your words. Not here. Time to play with words.
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
				<h3> Rules </h3> 
				 <ol>
					<li>Two per team</li>
					<li>Common event for both gender</li>
					<li>10 words will be given per team (5 Tamil words, 5 English words) </li>
					<li>Maximum 5 clues allowed for finding a word and clues should be meaningful word</li>
					<li>Tamil clues only allowed for Tamil words and English clues for English words</li>
					<li>5 minutes will be given for finding all 10 words</li>
					<li>The hint word should not have part of the actual word</li>
					<li>The team who find the maximun words in short time will be the winner</li>
				</ol>
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
				<h3> Schedule </h3> 
				<table style="width:100%;"> 
					<tr style="width:100%;">
						<td class="timeEvt"> Registration Deadline : </td> 
						<td class="date"> <?php echo $evtSchDates[3]; ?> </td> 
						<td class="time"> <?php echo $evtSchTimes[3]; ?> </td>
					</tr> 
				</table>
				<table style="width:100%;"> 
					<tr style="width:100%;">
						<td class="timeEvt"> Event Time : </td> 
						<td class="date"> <?php echo $evtSchDates[3+$totEvts]; ?> </td> 
						<td class="time"> <?php echo $evtSchTimes[3+$totEvts]; ?> </td>
					</tr> 
				</table>
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
			</td>
			<td style="width:1%;vertical-align:middle;text-align:center;">
				<div class="lineSepVert"> <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /></div>
			</td>
			<td	<?php { echo 'style="width:69%;"';} ?> >
				<div id="evt3Table" style="margin-left:3%;"> <?php {PrintEvtMembers(3);} ?> </div>
			</td>
		</tr>
	</table>
	
	<!-- Event Section -->
	<a id="evt04" name="evt04"> &nbsp; </a><div class="lineSepLong"></div>
	<h2> <img src="images/connexion.png" class="evtImgBig" /> &nbsp;&nbsp;&nbsp;Connextions </h2>
	<!--[if !IE]> --><div class="lineSepTiny"></div><!-- <![endif]-->
	<table style="width:100%;">
		<tr style="width:100%;">
			<td	<?php { echo 'style="width:39%;"';} ?> >
				<h3> Description </h3>
				Dive into the world of pictures.
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
				<h3> Rules </h3> 
				 <ol>
					<li>Connectyour IQ with pictures seen along with you team</li>
					<li>Team up with 2 to nominate </li>
					
				</ol>
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
				<h3> Schedule </h3> 
				<table style="width:100%;"> 
					<tr style="width:100%;">
						<td class="timeEvt"> Registration Deadline : </td> 
						<td class="date"> <?php echo $evtSchDates[4]; ?> </td> 
						<td class="time"> <?php echo $evtSchTimes[4]; ?> </td>
					</tr> 
				</table>
				<table style="width:100%;"> 
					<tr style="width:100%;">
						<td class="timeEvt"> Event Time : </td> 
						<td class="date"> <?php echo $evtSchDates[4+$totEvts]; ?> </td> 
						<td class="time"> <?php echo $evtSchTimes[4+$totEvts]; ?> </td>
					</tr> 
				</table>
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
			</td>
			<td style="width:1%;vertical-align:middle;text-align:center;">
				<div class="lineSepVert"> <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /></div>
			</td>
			<td	<?php { echo 'style="width:69%;"';} ?> >
				<div id="evt4Table" style="margin-left:3%;"> <?php {PrintEvtMembers(4);} ?> </div>
			</td>
		</tr>
	</table>
			
			<!-- Event Section -->
	<a id="evt05" name="evt05"> &nbsp; </a><div class="lineSepLong"></div>
	<h2> <img src="images/waterBallon.png" class="evtImgBig" /> &nbsp;&nbsp;&nbsp;Water Ballon </h2>
	<!--[if !IE]> --><div class="lineSepTiny"></div><!-- <![endif]-->
	<table style="width:100%;">
		<tr style="width:100%;">
			<td	<?php { echo 'style="width:39%;"';} ?> >
				<h3> Description </h3>
				Handle with care !!!
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
				<h3> Rules </h3> 
				 <ol>
					<li>Partner, live event. </li>
					<li>Separate for male/female. </li>
					<li>Team with most broken balloons get washed away.</li>
					
				</ol>
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
				<h3> Schedule </h3> 
				<table style="width:100%;"> 
					<tr style="width:100%;">
						<td class="timeEvt"> Registration Deadline : </td> 
						<td class="date"> <?php echo $evtSchDates[5]; ?> </td> 
						<td class="time"> <?php echo $evtSchTimes[5]; ?> </td>
					</tr> 
				</table>
				<table style="width:100%;"> 
					<tr style="width:100%;">
						<td class="timeEvt"> Event Time : </td> 
						<td class="date"> <?php echo $evtSchDates[5+$totEvts]; ?> </td> 
						<td class="time"> <?php echo $evtSchTimes[5+$totEvts]; ?> </td>
					</tr> 
				</table>
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
			</td>
			<td style="width:1%;vertical-align:middle;text-align:center;">
				<div class="lineSepVert"> <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /></div>
			</td>
			<td	<?php { echo 'style="width:69%;"';} ?> >
				<div id="evt5Table" style="margin-left:3%;"> <?php {PrintEvtMembers(5);} ?> </div>
			</td>
		</tr>
	</table>
	
	<!-- Event Section -->
	<a id="evt06" name="evt06"> &nbsp; </a><div class="lineSepLong"></div>
	<h2> <img src="images/1.png" class="evtImgBig" /> &nbsp;&nbsp;&nbsp;Aim the Game </h2>
	<!--[if !IE]> --><div class="lineSepTiny"></div><!-- <![endif]-->
	<table style="width:100%;">
		<tr style="width:100%;">
			<td	<?php { echo 'style="width:39%;"';} ?> >
				<h3> Description </h3>
				Come with the Aim! Go with the Gain!!<br />
				Event for persons with good aiming capacity. Not only for them!!! ?
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
				<h3> Rules </h3> 
				 <ol>
					<li>Individual, live event </li>
					<li>Common event for both gender </li>
					<li>Participant has to aim and throw the dart </li>
					<li>Participant who scores more points will be the winner </li>
				</ol>
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
				<h3> Schedule </h3> 
				<table style="width:100%;"> 
					<tr style="width:100%;">
						<td class="timeEvt"> Registration Deadline : </td> 
						<td class="date"> <?php echo $evtSchDates[6]; ?> </td> 
						<td class="time"> <?php echo $evtSchTimes[6]; ?> </td>
					</tr> 
				</table>
				<table style="width:100%;"> 
					<tr style="width:100%;">
						<td class="timeEvt"> Event Time : </td> 
						<td class="date"> <?php echo $evtSchDates[6+$totEvts]; ?> </td> 
						<td class="time"> <?php echo $evtSchTimes[6+$totEvts]; ?> </td>
					</tr> 
				</table>
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
			</td>
			<td style="width:1%;vertical-align:middle;text-align:center;">
				<div class="lineSepVert"> <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /></div>
			</td>
			<td	<?php { echo 'style="width:69%;"';} ?> >
				<div id="evt6Table" style="margin-left:3%;"> <?php {PrintEvtMembers(6);} ?> </div>
			</td>
		</tr>
	</table>
	
	
	<!-- Event Section -->
	<a id="evt07" name="evt07"> &nbsp; </a><div class="lineSepLong"></div>
	<h2> <img src="images/21.png" class="evtImgBig" /> &nbsp;&nbsp;&nbsp;Just A Minute </h2>
	<!--[if !IE]> --><div class="lineSepTiny"></div><!-- <![endif]-->
	<table style="width:100%;">
		<tr style="width:100%;">
			<td	<?php { echo 'style="width:39%;"';} ?> >
				<h3> Description </h3>
				Given a minute; complete the given task. 
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
				<h3> Rules </h3> 
				 <ol>
					<li>Individual, live event </li>
					<li>Common event for both gender </li>
					<li>Judges decision will be the final</li>
				</ol>
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
				<h3> Schedule </h3> 
				<table style="width:100%;"> 
					<tr style="width:100%;">
						<td class="timeEvt"> Registration Deadline : </td> 
						<td class="date"> <?php echo $evtSchDates[7]; ?> </td> 
						<td class="time"> <?php echo $evtSchTimes[7]; ?> </td>
					</tr> 
				</table>
				<table style="width:100%;"> 
					<tr style="width:100%;">
						<td class="timeEvt"> Event Time : </td> 
						<td class="date"> <?php echo $evtSchDates[7+$totEvts]; ?> </td> 
						<td class="time"> <?php echo $evtSchTimes[7+$totEvts]; ?> </td>
					</tr> 
				</table>
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
			</td>
			<td style="width:1%;vertical-align:middle;text-align:center;">
				<div class="lineSepVert"> <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /></div>
			</td>
			<td	<?php { echo 'style="width:69%;"';} ?> >
				<div id="evt7Table" style="margin-left:3%;"> <?php {PrintEvtMembers(7);} ?> </div>
			</td>
		</tr>
	</table>
	
	<!-- Event Section -->
	<a id="evt08" name="evt08"> &nbsp; </a><div class="lineSepLong"></div>
	<h2> <img src="images/football.png" class="evtImgBig" /> &nbsp;&nbsp;&nbsp;FootBall </h2>
	<!--[if !IE]> --><div class="lineSepTiny"></div><!-- <![endif]-->
	<table style="width:100%;">
		<tr style="width:100%;">
			<td	<?php { echo 'style="width:39%;"';} ?> >
				<h3> Description </h3>
				Not only the attacker; Everybody can shoot the football.
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
				<h3> Rules </h3> 
				 <ol>
					<li>Team of 5members to get nominated. </li>
					<li>Separate event for male/female.</li>
					</ol>
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
				<h3> Schedule </h3> 
				<table style="width:100%;"> 
					<tr style="width:100%;">
						<td class="timeEvt"> Registration Deadline : </td> 
						<td class="date"> <?php echo $evtSchDates[8]; ?> </td> 
						<td class="time"> <?php echo $evtSchTimes[8]; ?> </td>
					</tr> 
				</table>
				<table style="width:100%;"> 
					<tr style="width:100%;">
						<td class="timeEvt"> Event Time : </td> 
						<td class="date"> <?php echo $evtSchDates[8+$totEvts]; ?> </td> 
						<td class="time"> <?php echo $evtSchTimes[8+$totEvts]; ?> </td>
					</tr> 
				</table>
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
			</td>
			<td style="width:1%;vertical-align:middle;text-align:center;">
				<div class="lineSepVert"> <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /></div>
			</td>
			<td	<?php { echo 'style="width:69%;"';} ?> >
				<div id="evt8Table" style="margin-left:3%;"> <?php {PrintEvtMembers(8);} ?> </div>
			</td>
		</tr>
	</table>
	
	<!-- Event Section -->
	<a id="evt09" name="evt09"> &nbsp; </a><div class="lineSepLong"></div>
	<h2> <img src="images/30.png" class="evtImgBig" /> &nbsp;&nbsp;&nbsp;French Cricket</h2>
	<!--[if !IE]> --><div class="lineSepTiny"></div><!-- <![endif]-->
	<table style="width:100%;">
		<tr style="width:100%;">
			<td	<?php { echo 'style="width:39%;"';} ?> >
				<h3> Description </h3>
				Come dude let’s play cricket!!!
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
				<h3> Rules </h3> 
				 <ol>
					<li>Team of 7 to get nominated.</li>
					<li>Seperate event for male/female. </li>
					<li>Match will be conducted in office premises.</li>
					<li></li>
				</ol>
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
				<h3> Schedule </h3> 
				<table style="width:100%;"> 
					<tr style="width:100%;">
						<td class="timeEvt"> Registration Deadline : </td> 
						<td class="date"> <?php echo $evtSchDates[9];?> </td> 
					<td class="time"> <?php echo $evtSchTimes[9]; ?> </td>
					</tr> 
				</table>
				<table style="width:100%;"> 
					<tr style="width:100%;">
						<td class="timeEvt"> Tournaments starts from : </td> 
						<td class="date"> <?php echo $evtSchDates[9+$totEvts]; ?> </td> 
					<td class="time"> <?php echo $evtSchTimes[9+$totEvts]; ?> </td>
					</tr> 
				</table>
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
			</td>
			<td style="width:1%;vertical-align:middle;text-align:center;">
				<div class="lineSepVert"> <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /></div>
			</td>
			<td	<?php { echo 'style="width:69%;"';} ?> >
				<div id="evt9Table" style="margin-left:3%;"> <?php {PrintEvtMembers(9);} ?> </div>
			</td>
		</tr>
	</table>
  
  
	<!-- Event Section -->
	<a id="evt10" name="evt10"> &nbsp; </a><div class="lineSepLong"></div>
	<h2> <img src="images/rangoli.png" class="evtImgBig" /> &nbsp;&nbsp;&nbsp;Rangoli</h2>
	<!--[if !IE]> --><div class="lineSepTiny"></div><!-- <![endif]-->
	<table style="width:100%;">
		<tr style="width:100%;">
			<td	<?php { echo 'style="width:39%;"';} ?> >
				<h3> Description </h3>
				Display your colorful thoughts.
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
				<h3> Rules </h3> 
				 <ol>
					<li>Group of 5, live event. </li>
					<li>Participants are requested to bring the required materials.</li>
				</ol>
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
				<h3> Schedule </h3> 
				<table style="width:100%;"> 
					<tr style="width:100%;">
						<td class="timeEvt"> Registration Deadline : </td> 
						<td class="date"> <?php echo $evtSchDates[10]; ?> </td> 
					<td class="time"> <?php echo $evtSchTimes[10]; ?> </td>
					</tr> 
				</table>
				<table style="width:100%;"> 
					<tr style="width:100%;">
						<td class="timeEvt"> Tournaments Starts from : </td> 
						<td class="date"> <?php echo $evtSchDates[10+$totEvts]; ?> </td> 
					<td class="time"> <?php echo $evtSchTimes[10+$totEvts]; ?> </td>
					</tr> 
				</table>
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
			</td>
			<td style="width:1%;vertical-align:middle;text-align:center;">
				<div class="lineSepVert"> <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /></div>
			</td>
			<td	<?php { echo 'style="width:69%;"';} ?> >
				<div id="evt10able" style="margin-left:3%;"> <?php {PrintEvtMembers(10);} ?> </div>
			</td>
		</tr>
	</table>
  
  
	<!-- Event Section -->
	<a id="evt11" name="evt11"> &nbsp; </a><div class="lineSepLong"></div>
	<h2> <img src="images/foe1.png" class="evtImgBig" /> &nbsp;&nbsp;&nbsp;Pull the foe </h2>
	<!--[if !IE]> --><div class="lineSepTiny"></div><!-- <![endif]-->
	<table style="width:100%;">
		<tr style="width:100%;">
			<td	<?php { echo 'style="width:39%;"';} ?> >
				<h3> Description </h3>
				Time to show your team spirit.
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
				<h3> Rules </h3> 
				 <ol>
					<li>Five per team </li>
					<li>Separate event for male/female. </li>
										
				</ol>
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
				<h3> Schedule </h3> 
				<table style="width:100%;"> 
					<tr style="width:100%;">
						<td class="timeEvt"> Registration Deadline : </td> 
						<td class="date"> <?php echo $evtSchDates[11]; ?> </td> 
						<td class="time"> <?php echo $evtSchTimes[11]; ?> </td>
					</tr> 
				</table>
				<table style="width:100%;"> 
					<tr style="width:100%;">
						<td class="timeEvt"> Event time : </td> 
						<td class="date"> <?php echo $evtSchDates[11+$totEvts]; ?> </td> 
					<td class="time"> <?php echo $evtSchTimes[11+$totEvts]; ?> </td>
					</tr> 
				</table>
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
			</td>
			<td style="width:1%;vertical-align:middle;text-align:center;">
				<div class="lineSepVert"> <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /></div>
			</td>
			<td	<?php { echo 'style="width:69%;"';} ?> >
				<div id="evt11Table" style="margin-left:3%;"> <?php {PrintEvtMembers(11);} ?> </div>
			</td>
		</tr>
	</table>
  
  
<!-- Event Section -->
	<a id="evt12" name="evt12"> &nbsp; </a><div class="lineSepLong"></div>
	<h2> <img src="images/35.png" class="evtImgBig" /> &nbsp;&nbsp;&nbsp;Throwball</h2>
	<!--[if !IE]> --><div class="lineSepTiny"></div><!-- <![endif]-->
	<table style="width:100%;">
		<tr style="width:100%;">
			<td	<?php { echo 'style="width:39%;"';} ?> >
				<h3> Description </h3>
				Event for ladies. Lets see who throw good..
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
				<h3> Rules </h3> 
				 <ol>
					<li>Event for women only </li>
					<li>Team - 8members (6 main players,maximum 2 substitute if required)</li>
					<li>Server should be in one hand,Net touch serve is not allowed,Under arm serve is not allowed </li>
					<li>The players can catch the ball in two hands and should have to throw it in one hand</li>
					<li>The players can hold the ball for 3seconds before the throw, if the time exceeds more than 3seconds will be the foul.</li>
					<li>15 points per set; Two set for a game; The team who win the two continuously will be the winner; If not one more set have to play for 10 points </li>
				</ol>
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
				<h3> Schedule </h3> 
				<table style="width:100%;"> 
					<tr style="width:100%;">
						<td class="timeEvt"> Registration Deadline : </td> 
						<td class="date"> <?php echo $evtSchDates[12]; ?> </td> 
						<td class="time"> <?php echo $evtSchTimes[12]; ?> </td>
					</tr> 
				</table>
				<table style="width:100%;"> 
					<tr style="width:100%;">
						<td class="timeEvt"> Tournaments Starts from : </td> 
						<td class="date"> <?php echo $evtSchDates[12+$totEvts]; ?> </td> 
						<td class="time"> <?php echo $evtSchTimes[12+$totEvts]; ?> </td>
					</tr> 
				</table>
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
			</td>
			<td style="width:1%;vertical-align:middle;text-align:center;">
				<div class="lineSepVert"> <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /></div>
			</td>
			<td	<?php { echo 'style="width:69%;"';} ?> >
				<div id="evt12Table" style="margin-left:3%;"> <?php {PrintEvtMembers(12);} ?> </div>
			</td>
		</tr>
	</table>	
		
	<!-- Event Section -->
	<a id="evt13" name="evt13"> &nbsp; </a><div class="lineSepLong"></div>
	<h2> <img src="images/0.png" class="evtImgBig" /> &nbsp;&nbsp;&nbsp;Big Shot </h2>
	<!--[if !IE]> --><div class="lineSepTiny"></div><!-- <![endif]-->
	<table style="width:100%;">
		<tr style="width:100%;">
			<td	<?php { echo 'style="width:39%;"';} ?> >
				<h3> Description </h3>
				Event for photo crazies.Single photo narrates thousands of meanings. Waiting for your turn !!!
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
				<h3> Rules </h3> 
				 <ol>
					<li>Individual, Polling Event</li>
					<li>Common event for both gender</li>
					<li>Participants should give recently taken photographs, not more than one month</li>
					<li>Edited photos are Rejected</li>
				</ol>
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
				<h3> Schedule </h3> 
				<table style="width:100%;"> 
					<tr style="width:100%;">
						<td class="timeEvt"> Submission Deadline : </td> 
						<td class="date"> <?php echo $evtSchDates[13]; ?> </td> 
						<td class="time"> <?php echo $evtSchTimes[13]; ?> </td>
					</tr> 
				</table>
				<table style="width:100%;"> 
					<tr style="width:100%;">
						<td class="timeEvt"> Polling Time: </td> 
						<td class="date"> <?php echo $evtSchDates[13+$totEvts]; ?> </td> 
					<td class="time"> <?php echo $evtSchTimes[13+$totEvts]; ?> </td>
					</tr> 
				</table>
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
			</td>
			<td style="width:1%;vertical-align:middle;text-align:center;">
				<div class="lineSepVert"> <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /></div>
			</td>
			<td	<?php { echo 'style="width:69%;"';} ?> >
				<div id="evt13Table" style="margin-left:3%;"> <?php {PrintEvtMembers(13);} ?> </div>
			</td>
		</tr>
	</table>	
		
  <!-- Event Section -->
	<a id="evt14" name="evt14"> &nbsp; </a><div class="lineSepLong"></div>
	<h2> <img src="images/8.png" class="evtImgBig" /> &nbsp;&nbsp;&nbsp;Jasmin's Lucky Charm </h2>
	<!--[if !IE]> --><div class="lineSepTiny"></div><!-- <![endif]-->
	<table style="width:100%;">
		<tr style="width:100%;">
			<td	<?php { echo 'style="width:39%;"';} ?> >
				<h3> Description </h3>
				Event to find the luckiest person among JASMINATES.
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
				<h3> Rules </h3> 
				 <ol>
					<li>Group live event </li>
					<li>Common event for both gender </li>
					<li>Rules will be announced on the spot</li>
					<li>The luckiest participant will get the prize</li>
					
				</ol>
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
				<h3> Schedule </h3> 
				<table style="width:100%;"> 
					<tr style="width:100%;">
						<td class="timeEvt"> Registration Deadline : </td> 
						<td class="date"> <?php echo $evtSchDates[14]; ?> </td> 
						<td class="time"> <?php echo $evtSchTimes[14]; ?> </td>
					</tr> 
				</table>
				<table style="width:100%;"> 
					<tr style="width:100%;">
						<td class="timeEvt"> Event Time : </td> 
						<td class="date"> <?php echo $evtSchDates[14+$totEvts]; ?> </td> 
						<td class="time"> <?php echo $evtSchTimes[14+$totEvts]; ?> </td>
					</tr> 
				</table>
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
			</td>
			<td style="width:1%;vertical-align:middle;text-align:center;">
				<div class="lineSepVert"> <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /></div>
			</td>
			<td	<?php { echo 'style="width:69%;"';} ?> >
				<div id="evt14Table" style="margin-left:3%;"> <?php {PrintEvtMembers(14);} ?> </div>
			</td>
		</tr>
	</table>
	
	<!-- Event Section -->
	<a id="evt15" name="evt15"> &nbsp; </a><div class="lineSepLong"></div>
	<h2> <img src="images/6.png" class="evtImgBig" /> &nbsp;&nbsp;&nbsp;Dumb Charades </h2>
	<!--[if !IE]> --><div class="lineSepTiny"></div><!-- <![endif]-->
	<table style="width:100%;">
		<tr style="width:100%;">
			<td	<?php { echo 'style="width:39%;"';} ?> >
				<h3> Description </h3>
				“Action speaks louder than words”. Show your words through actions.
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
				<h3> Rules </h3> 
				 <ol>
					<li>Two per Team, live event </li>
					<li>Common event for both gender </li>
					<li>One person from a team has to act for the word given by event organizer, another person has to find the word </li>
					<li>The person who is acting for the word should not speak and the actions are not related to letters</li>
					<li>The team which find the word within short time will be the winner</li>
				</ol>
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
				<h3> Schedule </h3> 
				<table style="width:100%;"> 
					<tr style="width:100%;">
						<td class="timeEvt"> Registration Deadline : </td> 
						<td class="date"> <?php echo $evtSchDates[15]; ?> </td> 
    				<td class="time"> <?php echo $evtSchTimes[15]; ?> </td>
					</tr> 
				</table>
				<table style="width:100%;"> 
					<tr style="width:100%;">
						<td class="timeEvt"> Event Time : </td> 
						<td class="date"> <?php echo $evtSchDates[15+$totEvts]; ?> </td> 
					<td class="time"> <?php echo $evtSchTimes[15+$totEvts]; ?> </td>
					</tr> 
				</table>
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
			</td>
			<td style="width:1%;vertical-align:middle;text-align:center;">
				<div class="lineSepVert"> <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /></div>
			</td>
			<td	<?php { echo 'style="width:69%;"';} ?> >
				<div id="evt15Table" style="margin-left:3%;"> <?php {PrintEvtMembers(15);} ?> </div>
			</td>
		</tr>
	</table>
		
	<!-- Event Section -->
	<a id="evt16" name="evt16"> &nbsp; </a><div class="lineSepLong"></div>
	<h2> <img src="images/33.png" class="evtImgBig" /> &nbsp;&nbsp;&nbsp;Shuttle </h2>
	<!--[if !IE]> --><div class="lineSepTiny"></div><!-- <![endif]-->
	<table style="width:100%;">
		<tr style="width:100%;">
			<td	<?php { echo 'style="width:39%;"';} ?> >
				<h3> Description </h3>
				The tournament for Shuttle cock game.
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
				<h3> Rules </h3> 
				 <ol>
					<li>Two per team</li>
					<li>Seperate event for both gender </li>
					<li>The team and match schedules will be announced once registration over</li>
				</ol>
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
				<h3> Schedule </h3> 
				<table style="width:100%;"> 
					<tr style="width:100%;">
						<td class="timeEvt"> Registration Deadline : </td> 
						<td class="date"> <?php echo $evtSchDates[16]; ?> </td> 
					<td class="time"> <?php echo $evtSchTimes[16]; ?> </td>
					</tr> 
				</table>
				<table style="width:100%;"> 
					<tr style="width:100%;">
						<td class="timeEvt"> Tournaments Starts from : </td> 
						<td class="date"> <?php echo $evtSchDates[16+$totEvts]; ?> </td> 
					<td class="time"> <?php echo $evtSchTimes[16+$totEvts]; ?> </td>
					</tr> 
				</table>
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
			</td>
			<td style="width:1%;vertical-align:middle;text-align:center;">
				<div class="lineSepVert"> <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /></div>
			</td>
			<td	<?php { echo 'style="width:69%;"';} ?> >
				<div id="evt16Table" style="margin-left:3%;"> <?php {PrintEvtMembers(16);} ?> </div>
			</td>
		</tr>
	</table>
		
	<!-- Event Section -->
	<a id="evt17" name="evt17"> &nbsp; </a><div class="lineSepLong"></div>
	<h2> <img src="images/15.png" class="evtImgBig" /> &nbsp;&nbsp;&nbsp;Slow Rider </h2>
	<!--[if !IE]> --><div class="lineSepTiny"></div><!-- <![endif]-->
	<table style="width:100%;">
		<tr style="width:100%;">
			<td	<?php { echo 'style="width:39%;"';} ?> >
				<h3> Description </h3>
				Event for ‘professional level’ bike riders. Try to balance by driving slow.
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
				<h3> Rules </h3> 
				 <ol>
					<li>Individual, live event </li>
					<li>Common event for both gender </li>
					<li>Participant has to ride the bike and reach the target</li>
					<li>Participants who takes more time to reach the target will be the winner</li>
				</ol>
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
				<h3> Schedule </h3> 
				<table style="width:100%;"> 
					<tr style="width:100%;">
					<td class="timeEvt"> Registration Deadline : </td> 
				  <td class="date"> <?php echo $evtSchDates[17]; ?> </td> 
					<td class="time"> <?php echo $evtSchTimes[17]; ?> </td>
					</tr> 
				</table>
				<table style="width:100%;"> 
					<tr style="width:100%;">
						<td class="timeEvt"> Event Time : </td> 
						<td class="date"> <?php echo $evtSchDates[17+$totEvts]; ?> </td> 
						<td class="time"> <?php echo $evtSchTimes[17+$totEvts]; ?> </td>
					</tr> 
				</table>
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
			</td>
			<td style="width:1%;vertical-align:middle;text-align:center;">
				<div class="lineSepVert"> <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /></div>
			</td>
			<td	<?php { echo 'style="width:69%;"';} ?> >
				<div id="evt17Table" style="margin-left:3%;"> <?php {PrintEvtMembers(17);} ?> </div>
			</td>
		</tr>
	</table>

	<!-- Event Section -->
	<a id="evt18" name="evt18"> &nbsp; </a><div class="lineSepLong"></div>
	<h2><img src="images/31.png" class="evtImgBig" /> &nbsp;&nbsp;&nbsp;Carrom </h2>
	<!--[if !IE]> --><div class="lineSepTiny"></div><!-- <![endif]-->
	<table style="width:100%;">
		<tr style="width:100%;">
			<td	<?php { echo 'style="width:39%;"';} ?> >
				<h3> Description </h3>
				The tournament for Carrom board game.
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
				<h3> Rules </h3> 
				 <ol>
					<li>Two per team</li>
					<li>Seperate event for both gender</li>
					<li>The team and match schedules will be announced once registration over</li>
				</ol>
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
				<h3> Schedule </h3> 
				<table style="width:100%;"> 
					<tr style="width:100%;">
						<td class="timeEvt"> Registration Deadline : </td> 
						<td class="date"> <?php echo $evtSchDates[18]; ?> </td> 
						<td class="time"> <?php echo $evtSchTimes[18]; ?> </td>
					</tr> 
				</table>
				<table style="width:100%;"> 
					<tr style="width:100%;">
					  <td class="timeEvt">Tournaments Starts from : </td> 
					  <td class="date"> <?php echo $evtSchDates[18+$totEvts]; ?> </td> 
					  <td class="time"> <?php echo $evtSchTimes[18+$totEvts]; ?> </td>
					</tr> 
				</table>
				<!--[if !IE]> --><div class="lineSepSmall"></div><!-- <![endif]-->
			</td>
			<td style="width:1%;vertical-align:middle;text-align:center;">
				<div class="lineSepVert"> <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /></div>
			</td>
			<td	<?php { echo 'style="width:69%;"';} ?> >
				<div id="evt18Table" style="margin-left:3%;"> <?php {PrintEvtMembers(18);} ?> </div>
			</td>
		</tr>
	</table>			
	
	<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
	<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
	
  </body>
</html>