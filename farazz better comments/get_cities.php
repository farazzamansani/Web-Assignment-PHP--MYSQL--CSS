<?php
//used for the state and city dropdown menu in student feedback.php
    switch($_REQUEST['state'])
    {
        case "ACT":
        $cities = array('Please Select State', 'Adelaide', 'Brisbane', 'Canberra', 'Darwin', 'Melbourne', 'Perth', 'Sydney');
        break;
		
		 case "NSW":
        $cities = array('Please Select State', 'NT city 1', 'nt city 2', 'nt city3');
        break;
		
		 case "NT":
        $cities = array('Please Select State', 'Chicago', 'Dallas', 'Houston');
        break;  
		
		 case "QLD":
        $cities = array('Please Select State', 'qld city 1', 'qld city 2', 'qld city 3');
        break;  
		
		 case "TAS":
        $cities = array('Please Select State', 'Hobart', 'Launceston', 'Longford', 'Evandale');
        break;  
		
		 case "VIC":
        $cities = array('Please Select State', 'vic city 1', 'vic city 2');
        break;  
		
		 case "WA":
        $cities = array('Please Select State', 'western city', 'WA City 2', 'WA city 3');
        break;  
        
        default :
        $cities = false;
        break;
    }
    if(!$cities) echo "Please Select State First";
    else echo "<select name='city'><option>".
            implode('</option><option>',$cities).
            '</option></select>';
?>
