<?php
require_once("../sparql-lib/sparqllib.php");
$endpointUpdate = "http://localhost:3030/lontar/update"; // untuk memanipulasi data seperti INSERT, UPDATE, DELETE

// mengecek apakah tombol tambah data ada?
if (isset($_POST['TambahData'])) {
    $title = htmlspecialchars($_POST['title']);
    $type = htmlspecialchars($_POST['type']);
    $subject = htmlspecialchars($_POST['subject']);
    $author = htmlspecialchars($_POST['penulis']);
    $classification = htmlspecialchars($_POST['klasifikasi']);
    $bahasa = htmlspecialchars($_POST['bahasa']);
    $collation = htmlspecialchars($_POST['collation']);
    $tahun = htmlspecialchars($_POST['tahun_lontar']);
    $panjang_lontar = htmlspecialchars($_POST['panjang_lontar']);
    $lebar_lontar = htmlspecialchars($_POST['lebar_lontar']);
    $placename = htmlspecialchars($_POST['nama_tempat']);
    $location = htmlspecialchars($_POST['lokasi']);
    $area = htmlspecialchars($_POST['area']);
    $regency = htmlspecialchars($_POST['regency']);
    $resource = htmlspecialchars($_POST['upload_image']);

    // var_dump($_POST);

    $title_lontar = str_replace(' ', '_', $title);
    $title_origin = $title_lontar . '_origin';
    $title_person = $title_lontar . '_person';
    $title_place = $title_lontar . '_place';
    $queryTambah = sparql_get(
        $endpointUpdate,
        "PREFIX rdf:<http://www.w3.org/1999/02/22-rdf-syntax-ns#>
        PREFIX rdfs:<http://www.w3.org/2000/01/rdf-schema#>
        PREFIX owl:<http://www.w3.org/2002/07/owl#>
        PREFIX xml:<http://www.w3.org/XML/1998/namespace#>
        PREFIX xsd:<http://www.w3.org/2001/XMLSchema#>
        PREFIX lontar:<http://www.semanticweb.org/sarasvananda/ontologies/2023/5/untitled-ontology-12#>

        INSERT DATA {
            lontar:$title_lontar rdf:type lontar:Lontar ;
                     lontar:title '$title' ;
                     lontar:type '$type' ;
                     lontar:subject '$subject' ;
                     lontar:classification '$classification' ;
                     lontar:language '$bahasa' ;
                     lontar:collation '$collation' ;
                     lontar:year $tahun ;
                     lontar:length $panjang_lontar ;
                     lontar:width $lebar_lontar ;
                     lontar:resource '$resource'.
                     lontar:comeFrom lontar:$title_origin ;
                     lontar:createBy lontar:$title_person ;
                     lontar:saveIn lontar:$title_place .

            lontar:$title_origin rdf:type lontar:Origin ;
                     lontar:area '$area';
                     lontar:regency '$regency' .

            lontar:$title_person rdf:type lontar:Person ;
                     lontar:hasCreate lontar:$title_lontar ;
                     lontar:author '$author';
                     lontar:address '-';
                     lontar:cv '-' .

            lontar:$title_place rdf:type lontar:Place;
                     lontar:hasSave lontar:$title_lontar ;
                     lontar:placename '$placename' ;
                     lontar:location '$location' .
         }"
    );

    if ($queryTambah) {
        echo "<script>
        alert('Data Berhasil Ditambahkan')
        document.location.href='http://localhost/pencarian_pintar_lontar/pages/admin/TableDataLontar.php'
    </script>";
    } else {
        echo "<script>
        alert('Data gagal ditambahkan')
        document.location.href='http://localhost/pencarian_pintar_lontar/apps/UpdateController.php'
    </script>";
    }
};
    //     // var_dump($title_place);
    //     $queryTambah = sparql_get(
    //         $endpointUpdate,
    //         'PREFIX rdf:<http://www.w3.org/1999/02/22-rdf-syntax-ns#>
    //         PREFIX rdfs:<http://www.w3.org/2000/01/rdf-schema#>
    //         PREFIX owl:<http://www.w3.org/2002/07/owl#>
    //         PREFIX xml:<http://www.w3.org/XML/1998/namespace#>
    //         PREFIX xsd:<http://www.w3.org/2001/XMLSchema#>
    //         PREFIX lontar:<http://www.semanticweb.org/sarasvananda/ontologies/2023/5/untitled-ontology-12#> 
    //         INSERT DATA {
    //             ## Menambahkan data individu Lontar
    //             lontar:saraswati rdf:type lontar:Lontar ;
    //                      lontar:title "Purwa" ;
    //                      lontar:type "Daun Rontar" ;
    //                      lontar:subject "Mantra" ;
    //                      lontar:classification "Weda" ;
    //                      lontar:language "Bahasa Kawi" ;
    //                      lontar:collation 38 ;
    //                      lontar:year "-" ;
    //                      lontar:length 37 ;
    //                      lontar:width 3.5 ;
    //                      lontar:resource "Pitra_Puja.jpg";
    //                      lontar:comeFrom lontar:saraswati_origin ;
    //                      lontar:createBy lontar:saraswati_Person ;
    //                      lontar:saveIn lontar:saraswati_Place .

    //               lontar:saraswati_origin rdf:type lontar:Origin ;
    //                      lontar:area "bangli";
    //                      lontar:regency "Bangli" .

    //               lontar:saraswati_Person rdf:type lontar:Person ;
    //                      lontar:hasCreate lontar:saraswati ;
    //                      lontar:author "Ida Kelvin" .

    //               lontar:saraswati_Place rdf:type lontar:Place;
    //                      lontar:hasSave lontar:saraswati ;
    //                      lontar:placename "Gedong Kirtya II" ;
    //                      lontar:location "Jalan Veteran No 20, Singaraja" .
    //             }'

    //     );