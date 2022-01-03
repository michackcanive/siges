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
											<span class="single-regular"><?=$dados[0]['preco_padrao']?> Kz</span><span class="single-old"></span>
										</div>
										<div class="single-pro-size">
											<h6>Lugar</h6>
										<span><?=$dados[0]['quantidade_de_lugar']?></span>
										</div>
										<div class="color-quality-pro">
											<div class="color-quality-details">
											<h4 class=" text-info">Cada Lugar</h4>
												<div class="quantity">
													<div class="pro-quantity-changer">
														<input type="text" value="<?=$dados[0]['valor_cada_lugar']?> Kz">
													</div>
												</div>

											</div>
											
											<div class="clear"></div>
											<div class="single-pro-button">
												<div class="pro-button">
													<a href="#">Reservar</a>
												</div>
												<div class="pro-viwer">
													
												</div>
											</div>
											<div class="clear"></div>
											
										</div>
										<div class="single-pro-cn">
											<h3>Discrioção</h3>
											<p><?=$dados[0]['discricao']?> </p>
										</div>
									</div>
								</div>
							</div>
						</div>
<!--ooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo-->
                        <?php echo($footer)?>