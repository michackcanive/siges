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
                                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Operação</font></font></th>
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
                                    <button class="btn btn-danger"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Não pago</font></font></button>
                                </td>
                                <?php }

                                    ?>
                                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?=$dado_um['telefone']?></font></font></td>
                                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?=$dado_um['qtd_lugar']?></font></font></td>
                                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?=$dado_um['valor_pago']?> Kz</font></font></td>
                                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?=$dado_um['dia_actoa_actocao']?></font></font></td>

                                <?php 
                                    if($dado_um['estado_do_processo']){?>
                                    <td>
                                        <button class=" btn btn-danger"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Pago</font></font></button>
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
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.0/jspdf.umd.min.js"></script>
            <script>
                var doc = new jsPDF();          
var elementHandler = {
  '#ignorePDF': function (element, renderer) {
    return true;
  }
};
var source = window.document.getElementsByTagName("body")[0];
doc.fromHTML(
    source,
    15,
    15,
    {
      'width': 180,'elementHandlers': elementHandler
    });

doc.output("dataurlnewwindow");
            </script>