<?php 
    $form_value = $_POST['cep_input'] ?? '';

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="form">
                <form action="<?php echo $_SERVER['PHP_SELF'] . '?page=cep'; ?>" method="post">
                    <div class="mb-3 justify-content-center">
                        <label for="cep_input" class="form-label display-5 d-flex justify-content-center">Consultar CEP</label>
                        <input type="text" class="form-control" name="cep_input" id="cep_input" placeholder="Digite um CEP" 
                        value="<?php echo $form_value ?>" onfocus="mascaraCEP()">
                    </div>
                    <div class="d-flex justify-content-center">
                        <input type="submit" value="Consultar" class="btn btn-primary">
                    </div>
                </form>
            </div>
            <?php 
                if(isset($_POST['cep_input']) && !empty($_POST['cep_input'])){
                    $cep_num = str_replace('-', '', $_POST['cep_input']);
                    $url = "https://brasilapi.com.br/api/cep/v1/$cep_num";

                    @$dados = json_decode(file_get_contents($url));


                } elseif(isset($_POST['cep_input']) && empty($_POST['cep_input'])){
                    echo "<script> Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Digite um CEP!',
                       
                      })</script>";
                }
                if(@$dados === NULL && !empty($_POST['cep_input'])){
                    echo "<script> Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'CEP inválido!',
                      })</script>";
                }
            ?>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6 mt-5">
            <p class="display-6">Cidade:</p>
            <?php 
                echo "<p>" . @$dados->city . " - " . @$dados->state . "</p>";
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mt-2">
            <p class="display-6">mysql:</p>
            <p><?php 
                $sql = "CREATE DATABASE IF NOT EXISTS mydb";
                $test = $conn->query($sql);

                
            
            ?></p>
        </div>
    </div>
</div>