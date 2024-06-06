<?php
require_once '../../vendor/autoload.php';

$title = $_GET['id'];
$query = "
PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
PREFIX lontar: <http://www.semanticweb.org/sarasvananda/ontologies/2023/5/untitled-ontology-12#>
SELECT DISTINCT ?recommendedLontar ?recommendedTitle
WHERE {
    ?lontar lontar:title '$title';
            lontar:subject ?subject;
            lontar:classification ?classification.
    ?recommendedLontar lontar:subject ?subject;
                    lontar:classification ?classification;
                    lontar:title ?recommendedTitle.
    FILTER (?recommendedLontar != ?lontar)
}
LIMIT 10";
