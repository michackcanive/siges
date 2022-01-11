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
                                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Processo</font></font></th>
                                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Telefone</font></font></th>
                                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Quantidades de Lugar</font></font></th>
                                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Valor Pago</font></font></th>
                                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Dia</font></font></th>
                                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Imprimir</font></font></th>
                                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Add serviços</font></font></th>
                                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Estado/Reserva</font></font></th>
                                </tr>
                                <?php foreach($dados as $dado_um){?>
                                <tr>
                                    
                                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?=$dado_um['nome_salao']?></font></font></td>
                                    <?php 
                                    if($dado_um['estado_do_processo']){?>
                                    <td>
                                        <button class="pd-setting"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Pago</font></font></button>
                                    </td>
                                <?php 
                                }else{
                                    ?>
                                    <td>
                                    <button class=" text-danger"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Não pago</font></font></button>
                                </td>
                                <?php }

                                    ?>
                                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?=$dado_um['telefone']?></font></font></td>
                                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?=$dado_um['qtd_lugar']?></font></font></td>
                                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?=$dado_um['valor_pago']?> Kz</font></font></td>
                                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?=$dado_um['dia_actoa_actocao']?></font></font></td>
                                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><a  class="btn btn-primary" href="<?=base_url('operacaosl/SIGEPDF?ped='.$dado_um['id']) ?>"> <i class="fa fa-print"></i></a></font></font></td>
                                    <?php 
                                    if($dado_um['estado_do_processo']){?>
                                
                                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><span class="pd-setting btn btn-success" > Serviços </span></font></font></td>
                                    
                                <?php 
                                }else{
                                    ?>
                                    
                                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><a class="pd-setting btn-success" href="<?=base_url('operacaosl/detalhes_sl_add_servico/?id_solicitacao='.$dado_um['id'].'&id_salao='.$dado_um['id_salao']) ?>"> Add serviços</a></font></font></td>
                                
                                <?php }

                                    ?>
                              
                                    
                                <?php 
                                    if($dado_um['estado_do_processo']){?>
                                    <td>
                                        <button class=" pd-setting btn-danger"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Pago</font></font></button>
                                    </td>
                                <?php 
                                }else{
                                    ?>
                                    <td>
                                    <span class="pd-setting"  ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Pendente</font></font></span>
                                </td>
                                <?php }

                                    ?>

                                </tr>
                           <?php } ?>
                              
                                
                               
                               
                                
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