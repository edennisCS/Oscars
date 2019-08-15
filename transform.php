<html>
<body>

<?php
	// new XSLTProcessor 
	$Processor = new XsltProcessor();
    // XSLT loaded in
	$xslt = new DomDocument();
	$xslt -> load("oscars.xsl");
    // source XML document
	$xml = new DomDocument();
	$xml -> load("oscars.xml");
	
	//param define 
    $selections = $_GET['selections'];
    $yearInput = $_GET["yearInput"];
    $queryYear = $_GET["queryYear"];
	$categoryInput = $_GET["categoryInput"] ;
    $queryCategory = $_GET["queryCategory"] ;
	$nomineeInput = $_GET["nomineeInput"] ;
	$queryNominee = $_GET["queryNominee"];
	$infoInput = $_GET["queryInfo"] ;
    $queryInfo =  $_GET["queryInfo"] ;
	
	//  XSLT for transform
	$Processor -> importStylesheet($xslt);
	//set parameters
	$Processor->setParameter('', 'selections', $_GET['selections']);
	//print($_GET['selections'])
	$Processor -> setParameter('', 'queryYear',$_GET["queryYear"]);
	//echo ($_GET["queryYear"]);
	$Processor -> setParameter('', 'yearInput',$_GET["yearInput"]);
	//echo ($_GET["yearInput"]);
	$Processor-> setParameter('', 'queryCategory', $_GET["queryCategory"] );
	//echo($_GET["queryCategory"]);
	$Processor-> setParameter('', 'categoryInput', $_GET["categoryInput"] );
	//echo ($_GET["categoryInput"]);
	$Processor-> setParameter('', 'queryNominee', $_GET["queryNominee"]);
	//echo ($_GET["queryNominee"]);
	$Processor-> setParameter('', 'nomineeInput', $_GET["nomineeInput"] );
	//echo($_GET["nomineeInput"]);
	$Processor-> setParameter('', 'queryInfo', $_GET["queryInfo"] );
	//echo ($_GET["queryInfo"]);
	$Processor-> setParameter('', 'infoInput', $_GET["infoInput"] );
	//echo ($_GET["infoInput"]);
	
	// output success check
	if ($output = $Processor -> transformToXML($xml))
	{
		echo $output;
	} 
	// Output if failed
	else 
	{
		echo "<p>Failed to output</p>";
	}
	
	//secondary error check if the html form fails to filter numbers
	//code is based off https://stackoverflow.com/questions/6416763/checking-if-a-variable-is-an-integer-in-php#29018655
    if ( filter_var($yearInput, FILTER_VALIDATE_INT) === false ) {
        echo "The variable entered was not an integer";
     }

?>
</body>
</html>