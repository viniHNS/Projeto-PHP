<?php 
    $form_value = $_POST['cnpj_input'] ?? '';
?>

<div class="container mt-5 ">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="form">
                <form action="<?php echo $_SERVER['PHP_SELF'] . '?page=cnpj' ?>" method="post">
                    <div class="mb-3 justify-content-center">
                        <label for="cnpj_input" class="form-label display-5 d-flex justify-content-center">Consultar CNPJ</label>
                        <input type="text" class="form-control" name="cnpj_input" id="cnpj_input" placeholder="Digite um CNPJ" 
                        value="<?php echo $form_value ?>" onfocus="mascaraCNPJ()">
                    </div>
                    <div class="d-flex justify-content-center">
                        <input type="submit" value="Consultar" class="btn btn-primary">
                    </div>
                    
                </form>
            </div>
            <?php
                if(isset($_POST['cnpj_input']) && !empty($_POST['cnpj_input'])){
                    $cnpj_num_raw =  $_POST['cnpj_input'];
                    $cnpj_num =  $_POST['cnpj_input'];
                    $cnpj_num = str_replace(".", "", $cnpj_num);
                    $cnpj_num = str_replace("/", "", $cnpj_num);
                    $cnpj_num = str_replace("-", "", $cnpj_num);

                    $url = "https://brasilapi.com.br/api/cnpj/v1/$cnpj_num";

                    @$dados = json_decode(file_get_contents($url));

                    $simples = $dados->opcao_pelo_simples == NULL ? "Não" : "Sim";
                    $mei = $dados->opcao_pelo_mei == NULL ? "Não" : "Sim";
            
                                  
                    echo "<div class='container' >
                    <div class='row'>
                        <div class='col-md-12 mt-5 '>
                            <table class='table table-striped-columns table-hover'>
                                <tbody>
                                    <tr>
                                        <th scope='row'>CNPJ</th>
                                        <td>  $cnpj_num_raw  </td>
                                    </tr>
                                    <tr>
                                        <th scope='row'>Razão Social</th>
                                        <td>  $dados->razao_social  </td>     
                                    </tr>
                                    <tr>
                                        <th scope='row'>Nome fantasia</th>
                                        <td>  $dados->nome_fantasia  </td>
                                    </tr>
                                    <tr>
                                        <th scope='row'>Situação</th>
                                        <td>  $dados->descricao_situacao_cadastral  </td>
                                    </tr>
                                    <tr>
                                        <th scope='row'>Simples Nacional</th>
                                        <td>  $simples   </td>
                                    </tr>
                                    <tr>
                                        <th scope='row'>MEI</th>
                                        <td>  $mei  </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>";

                

                } elseif(isset($_POST['cnpj_input']) && empty($_POST['cnpj_input'])){
                    echo "<script> Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Digite um CNPJ!',
                       
                      })</script>";
                }
                if(@$dados === NULL && !empty($_POST['cnpj_input'])){
                    echo "<script> Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'CNPJ inválido!',
                      })</script>";
                } 
          
            ?>
            
        </div>
    </div>
</div>


