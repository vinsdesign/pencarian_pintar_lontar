<?php

// arahkan ke folder file sparql-lib
require_once("../../sparql-lib/sparqllib.php");

$sparql = sparql_get(
    "http://localhost:3030/naskah_lontar/query",
    "PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
    PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
    PREFIX owl: <http://www.w3.org/2002/07/owl#>
    PREFIX xml: <http://www.w3.org/XML/1998/namespace#>
    PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>
    PREFIX lontar: <http://www.semanticweb.org/sarasvananda/ontologies/2023/5/untitled-ontology-12#>

    SELECT ?title ?type ?classification
    WHERE {
        ?lontar rdf:type lontar:Lontar ;
                lontar:title ?title ;
                lontar:type ?type ;
                lontar:classification ?classification .
    }"
);
