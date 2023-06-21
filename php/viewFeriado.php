<?php 
    $form_value = $_POST["feriado_input"] ?? '';
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="form">
                <form action="<?php echo $_SERVER['PHP_SELF'] . '?page=feriado' ?>" method="post">
                    <div class="mb-3">
                        <label class="form-label display-5 d-flex justify-content-center" for="feriado_input">Consultar Feriados</label>
                        <input class="form-control" type="number" placeholder="Digite o ano" name="feriado_input" id="feriado_input" value="<?php echo $form_value ?>">
                    </div>
                    <div class="d-flex justify-content-center">
                       <input class="btn btn-primary" type="submit" value="Consultar">
                    </div>
                </form>

                <?php 
                    @$ano = $_POST["feriado_input"];
                    
                    $url = "https://brasilapi.com.br/api/feriados/v1/$ano";
                    @$dados = json_decode(file_get_contents($url));

                    if(isset($_POST["feriado_input"]) && empty($_POST["feriado_input"])){
                        echo "<script> Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Digite um ano!',
                        })</script>";
                    }

                    if(@$dados == NULL && !empty($ano)){
                        echo "<script> Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Ano inválido!',
                        })</script>";
                    }
  
                    if(@$dados != NULL && !empty($ano)){
                        $ano = $_POST["feriado_input"];
                        echo " <div class='col-md-12'>
                        <table class='table table-striped-columns table-hover'><tbody>";
                        for($i = 0; $i < count($dados); $i++){
                            echo "
                                <tr>
                                    <td><strong>" .  ($dados)[$i]-> name . "</strong>" ." - " . date('d/m/Y', strtotime($dados[$i]->date)) . "</td>
                                </tr>     
                            ";
                        } 
                        echo "</tbody>  </table> </div>";
                    }
                ?>
            </div>
        </div>
    </div>
</div>