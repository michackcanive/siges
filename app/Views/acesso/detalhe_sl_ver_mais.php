<?php echo($header)?>

<!--ooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo-->

<div class="single-product-pr">
							<div class="row">
								<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
									<div id="myTabContent1" class="tab-content">
										<div class="product-tab-list tab-pane fade active in" id="single-tab1">
											<img src="<?= base_url()?>/assets/img/usuarios/<?=$dados[0]['foto1']?>" alt="">
										</div>
										<div class="product-tab-list tab-pane fade" id="single-tab2">
											<img src="<?= base_url()?>/assets/img/usuarios/<?=$dados[0]['foto2']?>" alt="">
										</div>
										<div class="product-tab-list tab-pane fade" id="single-tab3">
											<img src="<?= base_url()?>/assets/img/usuarios/<?=$dados[0]['foto3']?>" alt="">
										</div>
									
										
									</div>
									<br>
									<ul id="single-product-tab">
										<li class="active">
											<a href="#single-tab1"><img src="<?= base_url()?>/assets/img/usuarios/<?=$dados[0]['foto1']?>" alt=""></a>
										</li>
										<li>
											<a href="#single-tab2"><img src="<?= base_url()?>/assets/img/usuarios/<?=$dados[0]['foto2']?>" alt=""></a>
										</li>
										<li>
											<a href="#single-tab3"><img src="<?= base_url()?>/assets/img/usuarios/<?=$dados[0]['foto3']?>" alt=""></a>
										</li>
										
									</ul>
								</div>
								<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
									<div class="single-product-details res-pro-tb">
										<h1><?=$dados[0]['nome_salao']??''?></h1>
										<span class="single-pro-star">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</span>
										<div class="single-pro-price">
										<h4  class="text-info"> Preço: <span id="preco_padrao<?=$dados[0]['id']?>" class="text-info"><?=$dados[0]['preco_padrao']?></span> Kz</h4>
										</div>
										<div class="single-pro-size">
											<h6>Lugar: <?=$dados[0]['quantidade_de_lugar']?></h6>
									

										<input type="hidden"  required="" value="<?=$data_mes??''?>" name="mes" id="mes<?=$dados[0]['id']??''?>" class="form-control">
                                                <input type="hidden"  required="" value="<?=$data_dia??''?>" name="dia" id="dia<?=$dados[0]['id']??''?>" class="form-control">
                                                <input type="hidden"  required="" value="<?=$dados[0]['nome_salao']??''?>" name="nome_salao<?=$dados[0]['id']??''?>" id="nome_salao<?=$dados[0]['id']??''?>" class="form-control">
                                                <input type="hidden"  required="" value="<?=$_SESSION['id']?>" name="id_usuario<?=$dados[0]['id']??''?>" id="id_usuario<?=$dados[0]['id']??''?>" class="form-control">
                                                <input type="hidden"  required="" value="<?=$dados[0]['telefone']??''?>" name="telefone<?=$dados[0]['id']??''?>" id="telefone<?=$dados[0]['id']??''?>" class="form-control">
                                                <input type="hidden"  required="" value="<?=$dados[0]['preco_padrao']?> " name="preco_padrao<?=$dados[0]['id']??''?>" id="preco_padraov<?=$dados[0]['id']?>" class="form-control">
                                                <input type="hidden"  required="" value="<?=$dados[0]['preco_padrao']?> " name="preco_padrao<?=$dados[0]['id']??''?>" id="preco_padraovv<?=$dados[0]['id']?>" class="form-control">
                                                <input type="hidden"  required="" value="<?=$dados[0]['valor_cada_lugar']?> " name="valor_cada_lugar<?=$dados[0]['id']??''?>" id="valor_cada_lugar<?=$dados[0]['id']??''?>" class="form-control">
                                                <input type="hidden"  required="" value="<?=$dados[0]['id']?> " name="id<?=$dados[0]['id']??''?>" id="id<?=$dados[0]['id']??''?>" class="form-control">
                                                

										</div>
										<div class="color-quality-pro">
											<div class="color-quality-details">
											<h4 class=" text-info">Cada Lugar: <?=$dados[0]['valor_cada_lugar']?> Kz</h4>
									
											</div>
											
											<div class="clear">
											</div>
											<hr>
											<div class="single-pro-button">
												<h3  class=" text-info">Serviços Disponivel : </h3>
											<?php foreach($servicos as $servico){?>
												<span class="pro-button text-info"  >
												<?=$servico['nome_servico']?>
												</span>
												<input type="hidden"  required="" value="<?=$servico['preco_servicos']?> "  id="valor_preco_servicov<?=$servico['id']??''?>" class="form-control">
											<?php } ?>
												<div class="pro-viwer">

												
											</div>
											<div class="clear"></div>
											
										</div>
										<hr>
										<div class="single-pro-cn">
											<h3>Discrioção</h3>
											<hr>
											<p><?=$dados[0]['discricao']?> </p>
										</div>
									</div>
									<div class="text-right like-love-list">

                   
<br><br><br>
<div class="row">    
           <div class="col-md-6">    
           <input type="date"  placeholder="Quantidade de Lugar" required=""  name="dia_actoa_actocao<?=$dados[0]['id']??''?>" id="dia_actoa_actocao<?=$dados[0]['id']??''?>" class="form-control">
               </div>
               <div class="col-md-6">    
               <input type="date"  placeholder="Quantidade de Lugar" required=""  name="dia_actoa_actocao_fim<?=$dados[0]['id']??''?>" id="dia_actoa_actocao_fim<?=$dados[0]['id']??''?>" class="form-control">
               </div>
           </div>
												
                                                
	  

					  <input type="number" title="Quantidade de lugar" onkeyup="verificar_lugar(this,'<?=$dados[0]['id']??''?>')" placeholder="Quantidade de Lugar" required="" value="" name="qtd_lugar" id="qtd_lugar<?=$dados[0]['id']??''?>" class="form-control">
					  <input type="hidden"  required="" value="<?=$dados[0]['id']??''?>" name="id_salao" id="id_salao<?=$dados[0]['id']??''?>" class="form-control">
					  <input type="hidden"  required="" value="<?=$dados[0]['nome']??''?>" name="nome" id="nome<?=$dados[0]['id']??''?>" class="form-control">
		  
					  <?php
					   
					   $data_dia= date("d"); //pegar dia actual
					   $valor_dia=$data_dia; //incio
					  
					   $data_mes=date("m");
					   //an 
					  
					  ?>

					  
					  
					  <p></p>
		  <button class=" pd-setting btn btn-success"  onclick="solicitacao('<?=$dados[0]['id']??''?>')"><i class="fa fa-thumbs-up" id="reserva<?=$dados[0]['id']?>"></i> Reservar </button>
	  </div>
	  <div id="validacao<?=$dados[0]['id']??''?>" class=" text-danger"></div>
													
												</div>
								</div>
							</div>
						</div>
<!--ooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo-->
                        <?php echo($footer)?>