<?php echo($header)?>

<!--ooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo-->

          <section>
             
              
           
              <div class="product-delivary ">

              <div class="container-fluid">
<div class="row">
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
<div class="col-md-6 col-md-6 col-sm-6 col-xs-12">
<div class="text-center custom-login">
<h3 class=" text-white" style="color: white;">Novo Serviço</h3>
<?php if(!empty($mensagem)){?>
<h4 class=" alert text-center " style="color: <?=$cor??''?>;"><?=$mensagem??''?></h4>

<?php }?>

</div>
<div class="hpanel">
<div class="panel-body">
  
      <?=form_open('operacaosl/criar_servicos')?>
      <div class="row">
          <div class="form-group col-lg-12">
              <label>Nome do Servicos </label>
              <input class="form-control" placeholder="Nome Serviço"  required="" value="" name="nome_servico" id="nome_servico" class="form-control">
          </div>
          <div class="form-group col-lg-12">
              
              <label>Preço do Serviço</label>
              <input class="form-control"  type="number" required="" placeholder="Preço do serviço"  name="preco_servicos" id="preco_cada" class="form-control" >
          </div>

          <div class="form-group col-lg-12">
          <select class="form-control required" name="id_salao" id="id_salao" required>
                         <option value="">TIPO DE SALÃO</option>
                 <?php foreach($dados as $dado_um){?>
            <option value="<?=$dado_um['id']?>"><?=$dado_um['nome_salao']?></option>
                 <?php } ?>
												</select>

              <input class="form-control"  type="hidden"  required="" value="<?=$_SESSION['id']??''?>" name="id_usuario" id="id_usuario" >
      </div>
      <div class="form-group col-lg-12">
      <div class="text-center">
          <button type="submit" class="btn btn-success loginbtn col-md-4"  >Salvar</button>      
      </div>
    </div>
</div>
<?=form_close()?>
</div>
</div>
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
</div>

</div>
       </div>
              
     
          </section>

<!--ooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo-->
<?php echo($footer)?>