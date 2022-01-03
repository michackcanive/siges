                    <?php echo($header)?>

                      <!--ooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo-->
                      
                                <section>
                                   
                                    
                                 
                                    <div class="product-delivary ">

                                    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
            <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">
                <div class="text-center custom-login">
                    <h3 class=" text-white" style="color: white;">Novo Salão</h3>
                    <?php if(!empty($mensagem)){?>
                      <h4 class=" alert text-center " style="color: <?=$cor??''?>;"><?=$mensagem??''?></h4>
                      <?php }?>
                </div>
                <div class="hpanel">
                    <div class="panel-body">
                            <form action="/criar_sl" id="loginForm" enctype="multipart/form-data" accept="application/*.jpg " method="POST">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>Seu nome Salão </label>
                                    <input class="form-control" placeholder="Nome Salão "  required=""  name="nome_salao" id="nome" class="form-control">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Quantidade de Lugares </label>
                                    <input type="number" class="form-control"  required="" value="" name="quantidade_de_lugar" id="quantidade_de_lugar" class="form-control">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Valor/cada lugar(Kz)</label>
                                    <input class="form-control"  type="number" required=""  name="valor_cada_lugar" id="preco_cada" class="form-control" >
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Valor Padrão (Kz)</label>
                                    <input class="form-control"  type="number" required=""  name="preco_padrao" id="preco_padrao" class="form-control" >
                                </div>
                                <div class="form-group col-lg-12">
                                    
                                    <label>Seu  telefone</label>
                                    <input class="form-control"  placeholder="Telefone"  required=""  name="telefone" id="telefone" class="form-control" >
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Fale Um Puco do seu Salão</label>
                                    <textarea class="form-control"  placeholder="Fale Um Puco do seu Salão"  required="" name="discricao" id="discricao" class="form-control" ></textarea>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Foto 1</label>
                                    <input class="form-control"  type="file" placeholder="Foto1"  required=""  name="foto1" id="foto1" class="form-control" >
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Foto 2</label>
                                    <input class="form-control"  type="file" placeholder="Foto2"  required=""  name="foto2" id="foto2" class="form-control" >
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Foto 3</label>
                                    <input class="form-control"  type="file" placeholder="Foto3"  required=""  name="foto3" id="foto3" class="form-control" >
                                </div>
                                    <input  type="hidden" placeholder="id"  required="" value="<?= $_SESSION['id'] ?>" name="id_usuario" id="id_usuario" class="form-control" >
                                <div class="form-group col-lg-12">
                                    <label>Localização do Salão</label>
                                    <input class="form-control"  type="text" placeholder="Localização do Salão"  required=""  name="localizacao_sl" id="localizacao" class="form-control" >
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success loginbtn col-md-4"  >Salvar</button>
                            </div>
                    </form >
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
        </div>
       
    </div>
</div>
</section>
    <!--ooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo-->
<?php echo($footer)?>