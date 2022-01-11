
<?php echo($header)?>

<!--ooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo-->
    <div class="author-area-pro">
            <div class="container-fluid">
                <div class="row">   <h3 class="bread-ntd" style="color: white;">Meus salões</h3>
                <?php foreach($dados as $dado_um){?>
                    
    <!--//////////////////////////////////////////////////////////////////////////////////////////////////////-->
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                     <hr>

                        <div class="personal-info-wrap">
                            <div class="widget-head-info-box">
                                <div class="persoanl-widget-hd">
                                    <h2><?=$dado_um['nome_salao']?></h2>
                                    <p>Local: <?=$dado_um['localizacao_sl']?></p>
                                </div>
                                <img src="<?= base_url()?>/assets/img/salao_mini/6.jpeg" class="img-circle circle-border m-b-md" alt="profile">
                                <div class="social-widget-result">
                                    <span>Lugares: <?=$dado_um['quantidade_de_lugar']?></span> |
                                    <span>Preço: <?=$dado_um['preco_padrao']?> </span> |
                                    <span>Preço/cada: <?=$dado_um['valor_cada_lugar']?></span>
                                </div>
                            </div>
                            <div class="widget-text-box">
                                <h4 > Preço: <span id="preco_padrao<?=$dado_um['id']?>"><?=$dado_um['preco_padrao']?></span> Kz</h4>
                                <p><?=$dado_um['discricao']?></p>

                                
                                <input type="hidden"  required="" value="<?=$data_mes??''?>" name="mes" id="mes<?=$dado_um['id']??''?>" class="form-control">
                                                <input type="hidden"  required="" value="<?=$data_dia??''?>" name="dia" id="dia<?=$dado_um['id']??''?>" class="form-control">
                                                <input type="hidden"  required="" value="<?=$dado_um['nome_salao']??''?>" name="nome_salao<?=$dado_um['id']??''?>" id="nome_salao<?=$dado_um['id']??''?>" class="form-control">
                                                <input type="hidden"  required="" value="<?=$_SESSION['id']?>" name="id_usuario<?=$dado_um['id']??''?>" id="id_usuario<?=$dado_um['id']??''?>" class="form-control">
                                                <input type="hidden"  required="" value="<?=$dado_um['telefone']??''?>" name="telefone<?=$dado_um['id']??''?>" id="telefone<?=$dado_um['id']??''?>" class="form-control">
                                                <input type="hidden"  required="" value="<?=$dado_um['preco_padrao']?> " name="preco_padrao<?=$dado_um['id']??''?>" id="preco_padraov<?=$dado_um['id']?>" class="form-control">
                                                <input type="hidden"  required="" value="<?=$dado_um['preco_padrao']?> " name="preco_padrao<?=$dado_um['id']??''?>" id="preco_padraovv<?=$dado_um['id']?>" class="form-control">
                                                <input type="hidden"  required="" value="<?=$dado_um['valor_cada_lugar']?> " name="valor_cada_lugar<?=$dado_um['id']??''?>" id="valor_cada_lugar<?=$dado_um['id']??''?>" class="form-control">
                                                <input type="hidden"  required="" value="<?=$dado_um['id']?> " name="id<?=$dado_um['id']??''?>" id="id<?=$dado_um['id']??''?>" class="form-control">
                                                

                                <div class="text-right like-love-list">

                   
                          <br>
           <div class="row">    
           <div class="col-md-6">    
           <input type="date"  placeholder="Quantidade de Lugar" required=""  name="dia_actoa_actocao<?=$dado_um['id']??''?>" id="dia_actoa_actocao<?=$dado_um['id']??''?>" class="form-control">
               </div>
               <div class="col-md-6">    
               <input type="date"  placeholder="Quantidade de Lugar" required=""  name="dia_actoa_actocao_fim<?=$dado_um['id']??''?>" id="dia_actoa_actocao_fim<?=$dado_um['id']??''?>" class="form-control">
               </div>
           </div>
                                               
                                      
                                            

                                                <input type="number" title="Quantidade de lugar" onkeyup="verificar_lugar(this,'<?=$dado_um['id']??''?>')" placeholder="Quantidade de Lugar" required="" value="" name="qtd_lugar" id="qtd_lugar<?=$dado_um['id']??''?>" class="form-control">
                                                <input type="hidden"  required="" value="<?=$dado_um['id']??''?>" name="id_salao" id="id_salao<?=$dado_um['id']??''?>" class="form-control">
                                                <input type="hidden"  required="" value="<?=$dado_um['nome']??''?>" name="nome" id="nome<?=$dado_um['id']??''?>" class="form-control">
                                    
                                                <?php
                                                 
                                                 $data_dia= date("d"); //pegar dia actual
                                                 $valor_dia=$data_dia; //incio
                                                
                                                 $data_mes=date("m");
                                                 //an 
                                                
                                                ?>

                                                
                                                
                                                <p></p>
                                    <button class=" pd-setting btn btn-success"  onclick="solicitacao('<?=$dado_um['id']??''?>')"><i class="fa fa-thumbs-up" id="reserva<?=$dado_um['id']?>"></i> Reservar </button>
                                    <a class="pd-setting btn btn-success" href="<?=base_url('operacaosl/detalhes_sl/?id_salao='.$dado_um['id']) ?>">Ver mais</a>
                                </div>
                                <div id="validacao<?=$dado_um['id']??''?>" class=" text-danger"></div>
                            </div>
                        
                        </div>

                    </div>
    <!--//////////////////////////////////////////////////////////////////////////////////////////////////////-->
    <?php } ?>
                </div>
            </div>
        </div>

        <?php echo($footer)?>
                     