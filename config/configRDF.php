<?php

// arahkan ke folder file EasyRDF
require_once "../easyrdf/lib/EasyRdf.php";
require_once "../easyrdf/examples/html_tag_helpers.php";

// Setup prefix
EasyRdf_Namespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
EasyRdf_Namespace::set('rdfs', 'http://www.w3.org/2000/01/rdf-schema#');
EasyRdf_Namespace::set('owl', 'http://www.w3.org/2002/07/owl#');
EasyRdf_Namespace::set('xml', 'http://www.w3.org/XML/1998/namespace');
EasyRdf_Namespace::set('xsd', 'http://www.w3.org/2001/XMLSchema#');
EasyRdf_Namespace::set('lontar', 'http://www.semanticweb.org/sarasvananda/ontologies/2023/5/untitled-ontology-12#');

//Setup update connection to triple store end point
$koneksi = new EasyRdf_Sparql_Client('http://localhost:3030/naskah_lontar');
$sparql = new EasyRdf_Sparql_Client('http://localhost:3030/naskah_lontar/query');
