<?php include('php/header.php'); ?>
<?php include('php/navbar.php'); ?>


<?php 
    $url_img = 'https://shibe.online/api/shibes?count=1&urls=true&httpsUrls=false';
    @$dados_img = json_decode(file_get_contents($url_img));

    include('php/db/config.php');
    switch (@$_REQUEST["page"]) {
        case 'cnpj':
            include('php/viewCNPJ.php');
            break;
        case 'cep':
            include('php/viewCEP.php');
            break;
        case 'ajuda':
            include('php/help.php');
            break;       
        default:
            echo "<div class='d-flex justify-content-center'><h1 class='display-4 mt-3'>Bem vindo ao site!</h1></div>";
            echo "<div class='d-flex justify-content-center'><figure class='figure mt-1 mb-5 justify-content-center'><img src='$dados_img[0]' alt='Foto de um gatinho aleatário' class='rounded mx-auto d-block'><figcaption class='figure-caption text-center'>Foto de um gatinho aleatório.</figcaption></figure></div>";
    }

?>


<?php include('php/footer.php'); ?>

