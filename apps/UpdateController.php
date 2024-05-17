<?php
require "../vendor/autoload.php";

// Definisikan namespace yang Anda butuhkan
\EasyRdf\RdfNamespace::set('lontar', 'http://www.semanticweb.org/sarasvananda/ontologies/2023/5/untitled-ontology-12#');

// Mengecek apakah tombol tambah data ada
if (isset($_POST['TambahData'])) {
    // Ambil semua data dari form
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
    // $resource = htmlspecialchars($_POST['upload_image']);

    // Membuat judul lontar dengan format yang sesuai
    $title_lontar = str_replace(' ', '_', $title);

    // mengecek gambar
    $resource = upload();
    if (!$resource) {
        return false;
    }
    // Menyiapkan kueri INSERT data
    $query = "
        PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
        PREFIX lontar: <http://www.semanticweb.org/sarasvananda/ontologies/2023/5/untitled-ontology-12#>

        INSERT DATA {
            lontar:$title_lontar rdf:type lontar:Lontar ;
                     lontar:title '$title' ;
                     lontar:type '$type' ;
                     lontar:subject '$subject' ;
                     lontar:classification '$classification' ;
                     lontar:language '$bahasa' ;
                     lontar:collation '$collation' ;
                     lontar:year '$tahun' ;
                     lontar:length $panjang_lontar ;
                     lontar:width $lebar_lontar ;
                     lontar:resource '$resource';
                     lontar:comeFrom lontar:Origin_$title_lontar;
                     lontar:createBy lontar:Person_$title_lontar ;
                     lontar:saveIn lontar:Place_$title_lontar .

            lontar:Origin_$title_lontar rdf:type lontar:Origin ;
                     lontar:area '$area';
                     lontar:regency '$regency' .

            lontar:Place_$title_lontar rdf:type lontar:Place ;
                     lontar:hasSave lontar:$title_lontar ;
                     lontar:placename '$placename' ;
                     lontar:location '$location' .

            lontar:Person_$title_lontar rdf:type lontar:Person ;
                    lontar:hasCreate lontar:$title_lontar ;
                    lontar:author '$author';
                    lontar:address '-';
                    lontar:cv '-' .

        }
    ";

    // Membuat objek client SPARQL
    $sparql = new \EasyRdf\Sparql\Client('http://localhost:3030/pencarian_lontar/update');

    // Melakukan permintaan update dengan kueri yang telah disiapkan
    $result = $sparql->update($query);

    // Memeriksa hasil dan memberikan respons sesuai
    if ($result) {
        echo "<script>
            alert('Data Berhasil Ditambahkan')
            document.location.href='http://localhost/pencarian_pintar_lontar/pages/admin/TableDataLontar.php'
        </script>";
    } else {
        echo "<script>
            alert('Gagal menambahkan data. Silakan coba lagi.')
            document.location.href='http://localhost/pencarian_pintar_lontar/apps/TableDataLontar.php'
        </script>";
    }
}
if (isset($_POST['HapusData'])) {
    $id = $_POST['id_title'];
    $query = "
        PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
        PREFIX lontar: <http://www.semanticweb.org/sarasvananda/ontologies/2023/5/untitled-ontology-12#>

        DELETE WHERE {
            ?lontar lontar:title '$id';
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
            ?origin lontar:area ?area;
                    lontar:regency ?regency.
            ?place  lontar:placename ?placename;
                    lontar:location ?location;
                    lontar:hasSave ?lontar.
        }
    ";

    // Membuat objek client SPARQL
    $sparql = new \EasyRdf\Sparql\Client('http://localhost:3030/pencarian_lontar/update');

    // Melakukan permintaan update dengan kueri yang telah disiapkan
    $result = $sparql->update($query);

    // Memeriksa hasil dan memberikan respons sesuai
    if ($result) {
        echo "<script>
            alert('Data Berhasil Dihapus')
            document.location.href='http://localhost/pencarian_pintar_lontar/pages/admin/TableDataLontar.php'
        </script>";
    } else {
        echo "<script>
            alert('Gagal menambahkan data. Silakan coba lagi.')
            document.location.href='http://localhost/pencarian_pintar_lontar/pages/admin/TableDataLontar.php'
        </script>";
    }
}

if (isset($_POST['EditData'])) {
}


function upload()
{
    $namaFile = $_FILES['upload_image']['name'];
    $ukuranFile = $_FILES['upload_image']['size'];
    $errorFIle = $_FILES['upload_image']['error'];
    $tmpName = $_FILES['upload_image']['tmp_name'];

    // adakah gambar yang di upload
    if ($errorFIle === 4) {
        echo "<script>
        alert('Masukan Gambar Lontar!')
             document.location.href='http://localhost/pencarian_pintar_lontar/pages/admin/TableDataLontar.php'
        </script>";
        return false;
    }
    // mengecek ekstensi gambar 
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'webp', 'svg'];
    $ekstensiGambar = explode('.', $namaFile); // memecah antara ekstensi dan nama file dalam array
    $ekstensiGambar = strtolower(end($ekstensiGambar)); // mengambil array paling akhir
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
        alert('Ekstensi Gambar Salah!')
             
        </script>";
        return false;
    }
    // cek ukuran gambar jika lebih dari 5MB
    if ($ukuranFile > 2000000) {
        echo "<script>
        alert('Gambar melebihi ukuran 1MB!')
             document.location.href='http://localhost/pencarian_pintar_lontar/pages/admin/TableDataAdmin.php'
        </script>";
        return false;
    }
    $namaFileNew = uniqid();
    $namaFileNew .= '.';
    $namaFileNew .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../image_base/' . $namaFileNew);
    return $namaFileNew;
}



















// // var_dump($title_place);
// $queryTambah = sparql_get(
// $endpointUpdate,
// 'PREFIX rdf:<http: //www.w3.org/1999/02/22-rdf-syntax-ns#>
    // PREFIX rdfs:<http: //www.w3.org/2000/01/rdf-schema#>
        // PREFIX owl:<http: //www.w3.org/2002/07/owl#>
            // PREFIX xml:<http: //www.w3.org/XML/1998/namespace#>
                // PREFIX xsd:<http: //www.w3.org/2001/XMLSchema#>
                    // PREFIX lontar:<http: //www.semanticweb.org/sarasvananda/ontologies/2023/5/untitled-ontology-12#>
                        // INSERT DATA {
                        // ## Menambahkan data individu Lontar
                        // lontar:saraswati rdf:type lontar:Lontar ;
                        // lontar:title "Purwa" ;
                        // lontar:type "Daun Rontar" ;
                        // lontar:subject "Mantra" ;
                        // lontar:classification "Weda" ;
                        // lontar:language "Bahasa Kawi" ;
                        // lontar:collation 38 ;
                        // lontar:year "-" ;
                        // lontar:length 37 ;
                        // lontar:width 3.5 ;
                        // lontar:resource "Pitra_Puja.jpg";
                        // lontar:comeFrom lontar:saraswati_origin ;
                        // lontar:createBy lontar:saraswati_Person ;
                        // lontar:saveIn lontar:saraswati_Place .

                        // lontar:saraswati_origin rdf:type lontar:Origin ;
                        // lontar:area "bangli";
                        // lontar:regency "Bangli" .

                        // lontar:saraswati_Person rdf:type lontar:Person ;
                        // lontar:hasCreate lontar:saraswati ;
                        // lontar:author "Ida Kelvin" .

                        // lontar:saraswati_Place rdf:type lontar:Place;
                        // lontar:hasSave lontar:saraswati ;
                        // lontar:placename "Gedong Kirtya II" ;
                        // lontar:location "Jalan Veteran No 20, Singaraja" .
                        // }'

                        // );