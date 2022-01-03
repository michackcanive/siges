
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
                                <img width="100" src="<?= base_url()?>/assets/img/usuarios/<?=$dado_um['foto1']?>" class="img-circle circle-border m-b-md" alt="profile">
                                <div class="social-widget-result">
                                    <span>Lugares: <?=$dado_um['quantidade_de_lugar']?> </span> |
                                    <span>Preço: <?=$dado_um['preco_padrao']?> </span> |
                                    <span>Preço/cada: <?=$dado_um['valor_cada_lugar']?></span>
                                </div>
                            </div>
                            <div class="widget-text-box">
                                <h4><?=$dado_um['id']?></h4>
                                <p><?=$dado_um['discricao']?></p>
                                <div class="text-right like-love-list">
                                    <a class="pd-setting btn btn-success" href="<?=base_url('operacaosl/detalhes_sl/?id_salao='.$dado_um['id']) ?>"> Ver mais</a>
                                </div>
                            </div>
                        
                        </div>

                    </div>
    <!--//////////////////////////////////////////////////////////////////////////////////////////////////////-->
    <?php } ?>
                </div>
            </div>
        </div>

        <?php echo($footer)?>
                     