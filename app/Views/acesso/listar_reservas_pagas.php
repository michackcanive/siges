<?php echo($header)?>

<!--ooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo-->

<div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
                            <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Lista de Reservas de Salão </font></font></h4>
                            <div class="add-product">
                                <a href="<?=base_url('/inicio')?>"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Adicionar Reserva</font></font></a>
                            </div>
                            <table>
                                <tbody><tr>
  
                                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nome do Salão</font></font></th>
                                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Estado da Reserva</font></font></th>
                                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Telefone</font></font></th>
                                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Quantidades de Lugar</font></font></th>
                                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Valor Pago</font></font></th>
                                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Dia</font></font></th>
                                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Dia Liberarado</font></font></th>
                                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Operação</font></font></th>
                                </tr>
                                <?php foreach($dados as $dado_um){?>
                                <tr>
                                    
                                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?=$dado_um['nome_salao']?></font></font></td>
                                    <?php 
                                    if($dado_um['estado_do_processo']){?>
                                    <td>
                                        <span class=" text-success"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Pago</font></font></span>
                                    </td>
                                <?php 
                                }else{
                                    ?>
                                    <td>
                                    <span class="text-success"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Não pago</font></font></span>
                                </td>
                                <?php }

                                    ?>
                                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?=$dado_um['telefone']?></font></font></td>
                                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?=$dado_um['qtd_lugar']?></font></font></td>
                                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?=$dado_um['valor_pago']?> Kz</font></font></td>
                                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?=$dado_um['dia_actoa_actocao']?></font></font></td>
                                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?=$dado_um['dia_ocupado']?></font></font></td>

                                <?php 
                                    if($dado_um['estado_do_processo']==1){?>
                                    <td>
                                    <button id="liberar<?=$dado_um['id']?>" class="pd-setting" onclick="peguntar_liberar('<?=$dado_um['id']?>','<?=$dado_um['nome_salao']?>','<?=$dado_um['dia_actoa_actocao']?>')" ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Liberar o Dia</font></font></button>
                                    </td>
                                <?php 
                                }else if($dado_um['estado_do_processo']==0){
                                    ?>
                                    <td>
                                    <span class=" text-danger" ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Pagar</font></font></span>
                                </td>
                                <?php
                                 } if($dado_um['estado_do_processo']==2){?>
                                  <td>
                                    <span class=" text-danger" ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Agendado</font></font></span>
                                </td>
                               
                                </tr>
                           <?php }
                        } ?>
                              
                                
                               
                               
                                
                            </tbody></table>
                            <div class="custom-pagination">
								<ul class="pagination">
									<li class="page-item"><a class="page-link" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Anterior</font></font></a></li>
									<li class="page-item"><a class="page-link" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1</font></font></a></li>
									<li class="page-item"><a class="page-link" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2</font></font></a></li>
									<li class="page-item"><a class="page-link" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">3</font></font></a></li>
									<li class="page-item"><a class="page-link" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Próximo</font></font></a></li>
								</ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--ooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo-->
<?php echo($footer)?>