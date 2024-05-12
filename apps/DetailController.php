<?php

require "../../vendor/autoload.php";
\EasyRdf\RdfNamespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
\EasyRdf\RdfNamespace::set('rdfs', 'http://www.w3.org/2000/01/rdf-schema#');
\EasyRdf\RdfNamespace::set('owl', 'http://www.w3.org/2002/07/owl#');
\EasyRdf\RdfNamespace::set('xml', 'http://www.w3.org/XML/1998/namespace#');
\EasyRdf\RdfNamespace::set('xsd', 'http://www.w3.org/XML/1998/namespace#');
\EasyRdf\RdfNamespace::set('lontar', 'http://www.semanticweb.org/sarasvananda/ontologies/2023/5/untitled-ontology-12#');

$title = $_GET['id'];
$sparql = new \EasyRdf\Sparql\Client('http://localhost:3030/pencarian_lontar/query');
$query = "SELECT *
WHERE {
    ?lontar lontar:title '$title';
            lontar:title ?title;
            lontar:type ?type;
            lontar:subject ?subject;
            lontar:classification ?classification;
            lontar:language ?language;
            lontar:collation ?collation;
            lontar:year ?year;
            lontar:length ?length;
            lontar:width ?width;
            lontar:resource ?resource;
            lontar:createBy ?person;
            lontar:comeFrom ?origin;
            lontar:saveIn ?place.
    ?person lontar:author ?author.
    ?origin lontar:area	?area;
            lontar:regency ?regency.
    ?place  lontar:placename ?placename;
            lontar:location ?location;
            lontar:hasSave ?lontar.	
}";
