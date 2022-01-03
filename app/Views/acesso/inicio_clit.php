
<?php echo($header)?>

<!--ooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo-->
    <div class="author-area-pro">
            <div class="container-fluid">
                <div class="row">   <h3 class="bread-ntd" style="color: white;">Meus salões</h3>
                <?php foreach($dados as $dado_um){?>
    <!--//////////////////////////////////////////////////////////////////////////////////////////////////////-->
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                     

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
                                <h4><?=$dado_um['id']?></h4>
                                <p><?=$dado_um['discricao']?></p>
                                <div class="text-right like-love-list">

                   
                          <br>
                                <select class="form-control required" name="dia_actoa_actocao" id="dia_actoa_actocao<?=$dado_um['id']??''?>" required>
													<option value="">Dias da realização</option>
													<option value="1"> 1 DIA</option>
                                              <option value="2"> 2 DIAS</option>
                                              <option value="3"> 3 DIAS</option>
                                              <option value="4"> 4 DIAS</option>
                                              <option value="5"> 5 DIAS</option>
                                              <option value="6"> 6 DIAS</option>
                                              <option value="7"> 7 DIAS</option>
                                              <option value="8"> 8 DIAS</option>
                                              <option value="9"> 9 DIAS</option>
                                              <option value="10"> 10 DIAS</option>
                                              <option value="11"> 11 DIAS</option>
                                              <option value="12"> 12 DIAS</option>
                                              <option value="13"> 13 DIAS</option>
                                              <option value="14"> 14 DIAS</option>
                                              <option value="15"> 15 DIAS</option>
                                              <option value="16"> 16 DIAS</option>
                                              <option value="17"> 17 DIAS</option>
                                              <option value="18"> 18 DIAS</option>
                                              <option value="19"> 19 DIAS</option>
                                              <option value="20"> 20 DIAS</option>
                                              <option value="21"> 21 DIAS</option>
                                              <option value="22"> 22 DIAS</option>
                                              <option value="23"> 23 DIAS</option>
                                              <option value="24"> 24 DIAS</option>
                                              <option value="25"> 25 DIAS</option>
                                              <option value="26"> 26 DIAS</option>
                                              <option value="27"> 27 DIAS</option>
                                              <option value="28"> 28 DIAS</option>
                                              <option value="29"> 29 DIAS</option>
                                              <option value="30"> 30 DIAS</option>
                                              <option value="30"> 31 DIAS</option>
												</select>

                                                <input type="text" title="Quantidade de lugar" placeholder="Quantidade de Lugar" required="" value="" name="qtd_lugar" id="qtd_lugar<?=$dado_um['id']??''?>" class="form-control">
                                                <input type="hidden"  required="" value="<?=$dado_um['id']??''?>" name="id_salao" id="id_salao<?=$dado_um['id']??''?>" class="form-control">
                                    
                                                <?php
                                                 
                                                 $data_dia= date("d"); //pegar dia actual
                                                 $valor_dia=$data_dia; //incio
                                                
                                                 $data_mes=date("m");
                                                 //an 
                                                
                                                ?>

                                                <input type="hidden"  required="" value="<?=$data_mes??''?>" name="mes" id="mes<?=$dado_um['id']??''?>" class="form-control">
                                                <input type="hidden"  required="" value="<?=$data_dia??''?>" name="dia" id="dia<?=$dado_um['id']??''?>" class="form-control">
                                                <input type="hidden"  required="" value="<?=$dado_um['nome_salao']??''?>" name="nome_salao<?=$dado_um['id']??''?>" id="nome_salao<?=$dado_um['id']??''?>" class="form-control">
                                                <input type="hidden"  required="" value="<?=$_SESSION['id']?>" name="id_usuario<?=$dado_um['id']??''?>" id="id_usuario<?=$dado_um['id']??''?>" class="form-control">
                                                <input type="hidden"  required="" value="<?=$dado_um['telefone']??''?>" name="telefone<?=$dado_um['id']??''?>" id="telefone<?=$dado_um['id']??''?>" class="form-control">
                                                
                                                
                                                <p></p>
                                    <button class=" pd-setting btn btn-success" onclick="solicitacao('<?=$dado_um['id']??''?>')"><i class="fa fa-thumbs-up" id="reserva<?=$dado_um['id']?>"></i> Reservar </button>
                                    <a class="pd-setting btn btn-success" href="<?=base_url('operacaosl/detalhes_sl/?id_salao='.$dado_um['id']) ?>"><i class="fa fa-heart"></i>  Ver mais</a>
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
                     