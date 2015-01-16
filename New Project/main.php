<html>
<head>
<title>Online PHP Script Execution</title>
</head>
<body>
<?php

$file = '
<ns1:Response xmlns:ns1="http://example.com/">
 <ns1:return>
   <ns1:mid>39824</ns1:mid> 
   <ns1:serverType>4</ns1:serverType> 
   <ns1:size>5</ns1:size> 
</ns1:return>
 <ns1:return>
   <ns1:mid>222</ns1:mid> 
   <ns1:serverType>4</ns1:serverType> 
   <ns1:size>5</ns1:size> 
</ns1:return>
</ns1:Response>
';


$doc = new DOMDocument();
$doc->loadXML($file);

$xpath = new DOMXPath($doc);

$query = '//ns1:Response/ns1:return/ns1:mid[../ns1:size[text()="5"]]';

$entries = $xpath->evaluate($query);

foreach ($entries as $entry) {
    echo $entry->nodeValue . "<br />";
}

?>
</body>
</html>
