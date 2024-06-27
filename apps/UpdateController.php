<?php
session_start();
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

    // Membuat judul lontar dengan format yang sesuai
    $title_lontar = str_replace(' ', '_', $title);

    // Mengecek dan mengunggah gambar
    $resources = upload();
    if ($resources === false) {
        return false;
    }
    $resourcesTriples = '';
    if (is_array($resources)) {
        foreach ($resources as $resource) {
            $resourcesTriples .= "lontar:resource '$resource';\n";
        }
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
                     $resourcesTriples
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

    try {
        // Membuat objek client SPARQL
        $sparql = new \EasyRdf\Sparql\Client('http://localhost:3030/pencarian_lontar/update');

        // Melakukan permintaan update dengan kueri yang telah disiapkan
        $result = $sparql->update($query);

        // Memeriksa hasil dan memberikan respons sesuai
        if ($result) {
            $_SESSION['status_add'] = 'Data Berhasil Ditambahkan';
            $_SESSION['status_code'] = 'success';
            header('Location: http://localhost/pencarian_pintar_lontar/pages/admin/TableDataLontar.php');
        } else {
            $_SESSION['status_add'] = 'Data Gagal Ditambahkan';
            $_SESSION['status_code'] = 'error';
            header('Location: http://localhost/pencarian_pintar_lontar/pages/admin/TableDataLontar.php');
        }
    } catch (Exception $e) {
        // Menangkap pengecualian dan memberikan informasi kegagalan
        $_SESSION['status_add_error'] = 'Data Gagal Ditambahkan!';
        $_SESSION['status_text'] = $e->getMessage();
        $_SESSION['status_code'] = 'error';
        $_SESSION['status_footer'] = 'Pastikan Format Data ditambahkan Sudah Benar !';
        header('Location: http://localhost/pencarian_pintar_lontar/pages/admin/TableDataLontar.php');
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
        $_SESSION['status_delete'] = 'Data Berhasil Dihapus';
        $_SESSION['status_code'] = 'success';
        header('Location: http://localhost/pencarian_pintar_lontar/pages/admin/TableDataLontar.php');
    } else {
        $_SESSION['status_delete'] = 'Data Gagal Dihapus';
        $_SESSION['status_code'] = 'error';
        header('Location: http://localhost/pencarian_pintar_lontar/pages/admin/TableDataLontar.php');
    }
}

if (isset($_POST['EditData'])) {
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
    $placename = htmlspecialchars($_POST['tempat_penyimpanan']);
    $location = htmlspecialchars($_POST['lokasi']);
    $area = htmlspecialchars($_POST['asal']);
    $regency = htmlspecialchars($_POST['regency']);
    $gambarLama = htmlspecialchars($_POST['gambar_lama']);
    $id = $_POST['id_title'];

    // Membuat judul lontar dengan format yang sesuai
    $oldTitle_lontar = str_replace(' ', '_', $id);
    $new_title = str_replace(' ', '_', $title);

    // cek apakah user pilih gambar baru atau tidak?
    if ($_FILES['upload_image']['error'] === 4) {
        $resources = explode(',', $gambarLama);
    } else {
        $resources = upload();
        // if (!$resources) {
        //     // Handle error case if upload fails
        //     $_SESSION['status_edit'] = 'Data Gagal karena gambar harus dimasukan';
        //     $_SESSION['status_code'] = 'error';
        //     header('Location: http://localhost/pencarian_pintar_lontar/pages/admin/TableDataLontar.php');
        //     exit;
        // }
    }

    $resourceTriplesOld = '';
    $resourceTriplesNew = '';
    foreach ($resources as $resource) {
        $resourceTriplesOld .= "lontar:resource ?oldResource ;\n";
        $resourceTriplesNew .= "lontar:resource '$resource' ;\n";
    }
    // Menyiapkan query edit Data
    $query = "PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
    PREFIX lontar: <http://www.semanticweb.org/sarasvananda/ontologies/2023/5/untitled-ontology-12#>

    DELETE {
        lontar:$oldTitle_lontar rdf:type lontar:Lontar ;
                                lontar:title ?oldTitle ;
                                lontar:type ?oldType ;
                                lontar:subject ?oldSubject ;
                                lontar:classification ?oldClassification ;
                                lontar:language ?oldLanguage ;
                                lontar:collation ?oldCollation ;
                                lontar:year ?oldYear ;
                                lontar:length ?oldLength ;
                                lontar:width ?oldWidth ;
                                $resourceTriplesOld ;
                                lontar:comeFrom lontar:Origin_$oldTitle_lontar ;
                                lontar:createBy lontar:Person_$oldTitle_lontar ;
                                lontar:saveIn lontar:Place_$oldTitle_lontar .
    
        lontar:Origin_$oldTitle_lontar rdf:type lontar:Origin ;
                                       lontar:area ?oldArea ;
                                       lontar:regency ?oldRegency .
    
        lontar:Place_$oldTitle_lontar rdf:type lontar:Place ;
                                      lontar:hasSave lontar:$oldTitle_lontar ;
                                      lontar:placename ?oldPlacename ;
                                      lontar:location ?oldLocation .
    
        lontar:Person_$oldTitle_lontar rdf:type lontar:Person ;
                                       lontar:hasCreate lontar:$oldTitle_lontar ;
                                       lontar:author ?oldAuthor ;
                                       lontar:address ?oldAddress ;
                                       lontar:cv ?oldCV .
    }
    INSERT {
        lontar:$new_title rdf:type lontar:Lontar ;
                          lontar:title '$title' ;
                          lontar:type '$type' ;
                          lontar:subject '$subject' ;
                          lontar:classification '$classification' ;
                          lontar:language '$bahasa' ;
                          lontar:collation $collation ;
                          lontar:year '$tahun' ;
                          lontar:length $panjang_lontar ;
                          lontar:width $lebar_lontar ;
                          $resourceTriplesNew ;
                          lontar:comeFrom lontar:Origin_$new_title ;
                          lontar:createBy lontar:Person_$new_title ;
                          lontar:saveIn lontar:Place_$new_title .

        lontar:Origin_$new_title rdf:type lontar:Origin ;
                                 lontar:area '$area' ;
                                 lontar:regency '$regency' .

        lontar:Place_$new_title rdf:type lontar:Place ;
                                lontar:hasSave lontar:$new_title ;
                                lontar:placename '$placename' ;
                                lontar:location '$location' .

        lontar:Person_$new_title rdf:type lontar:Person ;
                                 lontar:hasCreate lontar:$new_title ;
                                 lontar:author '$author' ;
                                 lontar:address '-' ;
                                 lontar:cv '-' .
    }
    WHERE {
        lontar:$oldTitle_lontar rdf:type lontar:Lontar ;
                                lontar:title ?oldTitle ;
                                lontar:type ?oldType ;
                                lontar:subject ?oldSubject ;
                                lontar:classification ?oldClassification ;
                                lontar:language ?oldLanguage ;
                                lontar:collation ?oldCollation ;
                                lontar:year ?oldYear ;
                                lontar:length ?oldLength ;
                                lontar:width ?oldWidth ;
                                $resourceTriplesOld ;
                                lontar:comeFrom lontar:Origin_$oldTitle_lontar ;
                                lontar:createBy lontar:Person_$oldTitle_lontar ;
                                lontar:saveIn lontar:Place_$oldTitle_lontar .

        lontar:Origin_$oldTitle_lontar rdf:type lontar:Origin ;
                                       lontar:area ?oldArea ;
                                       lontar:regency ?oldRegency .

        lontar:Place_$oldTitle_lontar rdf:type lontar:Place ;
                                      lontar:hasSave lontar:$oldTitle_lontar ;
                                      lontar:placename ?oldPlacename ;
                                      lontar:location ?oldLocation .

        lontar:Person_$oldTitle_lontar rdf:type lontar:Person ;
                                       lontar:hasCreate lontar:$oldTitle_lontar ;
                                       lontar:author ?oldAuthor ;
                                       lontar:address ?oldAddress ;
                                       lontar:cv ?oldCV .
    }";


    // Membuat objek client SPARQL
    $sparql = new \EasyRdf\Sparql\Client('http://localhost:3030/pencarian_lontar/update');

    try {
        $result = $sparql->update($query);

        // Memeriksa hasil dan memberikan respons sesuai
        if ($result) {
            $_SESSION['status_edit'] = 'Data Berhasil Dirubah';
            $_SESSION['status_code'] = 'success';
            header('Location: http://localhost/pencarian_pintar_lontar/pages/admin/TableDataLontar.php');
        } else {
            $_SESSION['status_edit'] = 'Data Gagal Dirubah';
            $_SESSION['status_code'] = 'error';
            header('Location: http://localhost/pencarian_pintar_lontar/pages/admin/TableDataLontar.php');
        }
    } catch (Exception $e) {
        // Menangkap pengecualian dan memberikan informasi kegagalan
        $_SESSION['status_edit'] = 'Data Gagal Dirubah!';
        $_SESSION['status_text'] = $e->getMessage();
        $_SESSION['status_code'] = 'error';
        $_SESSION['status_footer'] = 'Pastikan Format Data ditambahkan Sudah Benar !';
        header('Location: http://localhost/pencarian_pintar_lontar/pages/admin/TableDataLontar.php');
    }
}

function upload()
{
    $uploadedFiles = [];
    $filesCount = count($_FILES['upload_image']['name']);

    for ($i = 0; $i < $filesCount; $i++) {
        $namaFile = $_FILES['upload_image']['name'][$i];
        $ukuranFile = $_FILES['upload_image']['size'][$i];
        $errorFile = $_FILES['upload_image']['error'][$i];
        $tmpName = $_FILES['upload_image']['tmp_name'][$i];

        // adakah gambar yang di upload
        if ($errorFile === 4) {
            $_SESSION['status_input_gambar'] = 'Wajib Masukan Gambar Lontar!';
            $_SESSION['status_code'] = 'error';
            header('Location: http://localhost/pencarian_pintar_lontar/pages/admin/TableDataLontar.php');
            return false;
        }

        // mengecek ekstensi gambar 
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'webp', 'svg'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            $_SESSION['status_ekstensi_gambar'] = 'Ekstensi Gambar Salah!';
            $_SESSION['status_code'] = 'error';
            header('Location: http://localhost/pencarian_pintar_lontar/pages/admin/TableDataLontar.php');
            return false;
        }

        // cek ukuran gambar jika lebih dari 2MB
        if ($ukuranFile > 2000000) {
            $_SESSION['status_size_gambar'] = 'Gambar Melebihi Ukuran 2MB!';
            $_SESSION['status_code'] = 'error';
            header('Location: http://localhost/pencarian_pintar_lontar/pages/admin/TableDataLontar.php');
            return false;
        }

        $namaFileNew = uniqid() . '.' . $ekstensiGambar;

        move_uploaded_file($tmpName, '../image_base/' . $namaFileNew);
        $uploadedFiles[] = $namaFileNew;
    }

    return $uploadedFiles;
}
