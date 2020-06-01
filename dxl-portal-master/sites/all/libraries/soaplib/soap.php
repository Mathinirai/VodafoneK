<?php

class CustomSoapClient extends SoapClient {

    function __construct($wsdl, $options) {
        parent::__construct($wsdl, $options);
    }

    function __doRequest($request, $location, $action, $version, $one_way = 0) {

        $doc = new DOMDocument; // declare a new DOMDocument Object
        $doc->preserveWhiteSpace = false;
        $doc->loadxml($request); //load the xml request

        $xpath = new DOMXPath($doc); //we use DOMXPath to edit the XML Request
         foreach( $xpath->query('//*[not(node())]') as $node ) { //create a query, looking a possible empty node(s)
            $node->parentNode->removeChild($node); //remove the node
        }
        $doc->formatOutput = true;
        $request = $doc->savexml(); //re-assigned the new XML to $request.

        //doRequest
        return parent::__doRequest($request, $location, $action, $version);
    }
}

?>