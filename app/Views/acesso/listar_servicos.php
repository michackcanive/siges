<?php echo($header)?>

<!--ooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo-->

<div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
                            <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Lista de produtos </font></font></h4>
                            <div class="add-product">
                                <a href="<?=base_url('operacaosl/cadastrar_servicos')?>"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Adicionar Produto</font></font></a>
                            </div>
                            <table>
                                <tbody><tr>
  
                                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nome do serviço</font></font></th>
                                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Estado</font></font></th>
                                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preço</font></font></th>
                                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Data de criação</font></font></th>
                                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Contexto</font></font></th>
                                </tr>
                                <?php foreach($dados as $dado_um){?>

                             
                                <tr>
                                    
                                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?=$dado_um['nome_servico']?></font></font></td>
                                    <td>
                                        <button class="pd-setting"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ativo</font></font></button>
                                    </td>
                                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?=$dado_um['preco_servicos']?></font></font></td>
                                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?=$dado_um['data_criar']?></font></font></td>


                                    <td>
                                        <button data-toggle="tooltip"  title="" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        <button data-toggle="tooltip" id="eliminar<?=$dado_um['id']?>" onclick="eleminar_servicos_p('<?=$dado_um['id']?>','<?=$dado_um['nome_servico']?>')" title="" class="pd-setting-ed" data-original-title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </td>
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