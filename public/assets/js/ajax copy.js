function add_servico(id_servico,id_solicitacoa_salao,id_usuario_operacao){
  const valor_preco_servico=document.querySelector('#valor_preco_servico'+id).value;
  const preco_padrao=document.querySelector('#preco_padraovv'+id).value;

  //var valor_preco_servico=parseInt(valor_preco_servico);
  var preco_padrao=parseInt(preco_padrao);
  var resultado=valor_preco_servico+preco_padrao

    document.getElementById("preco_padrao"+id).innerHTML=resultado;
    document.getElementById("preco_padraovv"+id).value=resultado; 



    var dados={
      id_servico:id_servico,
      id_solicitacoa_salao:id_solicitacoa_salao,
      id_usuario_operacao:id_usuario_operacao,
      valor_pago:valor_pago
    }

    $.post("/add_servico_salao_solicitado", dados , (retorna)=>{

      if(retorna.length<=4){
        document.getElementById("liberar"+id).innerHTML='<span class="visually-hidden"> Adicionado!</span>';
        add_servico_solicitacao(nome_reserva)


      }else if(retorna.length>6){
        document.getElementById("liberar"+id).innerHTML='<span class="visually-hidden">Não Adicionado</span>';
        alert('Não Liberado')

      }
    });

 
}

function add_servico_solicitacao(nome_servico){ 
  Swal.fire(
      `Serviço: ${nome_servico} Adicionado` ,
  `Na SIGES todo é simplis e Rápido  !`,
  'success',
      )
}



function verificar_lugar(num,id){
if(num.value==''){
  document.getElementById("preco_padrao"+id).innerHTML=document.querySelector('#preco_padraovv'+id).value;
  document.getElementById("preco_padraov"+id).value=document.querySelector('#preco_padraovv'+id).value;
  return;
}
  const valor_cada_lugar=document.querySelector('#valor_cada_lugar'+id).value;
  var total=parseInt(num.value)
  var valor_cada=parseInt(valor_cada_lugar)
  var resu=valor_cada*total
  document.getElementById("preco_padrao"+id).innerHTML=parseInt(resu);
  document.getElementById("preco_padraov"+id).value=parseInt(resu);
 

}

function peguntar_liberar(id,nome_reserva,dia_ocupado){

  // const salao=document.querySelector('#servico'+id).value;
      //aceitar(id,numero);
  
      Swal.fire({
        title: 'Tens Acerteza ?',
        text: `Pretendes Liberar o Espaço  - ${nome_reserva+' Nº: '+id} ?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceitar',

      }).then((result) => {

            if (!result.isConfirmed) {
              //
              if(result.value){
                var dados = {
                  id_solicitacao:id,
                  dia_ocupado:dia_ocupado
                }
                $.post("/liberar_espaco", dados , (retorna)=>{
                  if(retorna.length<=4){
                    document.getElementById("liberar"+id).innerHTML='<span class="visually-hidden"> Liberado!</span>';
                    liberar_salao(nome_reserva)
                    setTimeout(function(){ window.location.reload(); }, 900);
                  }else if(retorna.length>6){
                    document.getElementById("liberar"+id).innerHTML='<span class="visually-hidden">Não Liberado</span>';
                    alert('Não Liberado')

                  }
                });
              }
            }
      })
  }


  function liberar_salao(nome_servico){ 
    Swal.fire(
        `Salão: ${nome_servico} Liberado` ,
    `Na SIGES todo é simplis e Rápido  !`,
    'success',
        )
}


function peguntar_apagar(id,nome_reserva){

  // const salao=document.querySelector('#servico'+id).value;
      //aceitar(id,numero);

  
      Swal.fire({
        title: 'Tens Acerteza ?',
        text: `Pretendes Concluir no pagamento da reserva - ${nome_reserva+' Nº: '+id} ?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceitar',

      }).then((result) => {
            if (!result.isConfirmed) {
              //
              if(result.value){
                pagar_reserva(id);
              }
            }
      })
  }


function pagar_reserva(id){
  var valor_pagar1=document.querySelector('#valor_pago'+id).value;
  Swal.fire({
    title: `Confirmar o pagamento de: ${valor_pagar1} Kz`,
    showCancelButton: true,
    confirmButtonText: 'Enviar',
    showLoaderOnConfirm: true,
    preConfirm: (valor_pagar) => {
      //
      var valor_pagar1=document.querySelector('#valor_pago'+id).value;

      let data = {
        id_solicitado:id,
        valor_pago: valor_pagar1
      }
           return r=$.post("/pagar_salao", data , (retorna)=>{
             console.log(retorna)
                return response=retorna;
            })
        },
    allowOutsideClick: () => !Swal.isLoading()
  })
  // termino

  .then((result) => {
    if (!result.isConfirmed) {
       if(result.value == null ) {
        // do somethin
        Swal.fire({
          title: `Processo cancelado`
      })
     }else{
      //
      if(result.value){

            console.log(result.value)
            if(result.value.length<=4){ 
              Swal.fire(
                'Pagemento feito com sucesso!',
            `Para mais informações contactaro suporte:`,
            'success',
                )
            }else{
              Swal.fire(
            'Erro no seu pagamento !',
            `Para mais informações contactaro suporte:`,
            'warning',
                )
            }

     setTimeout(function(){ window.location.reload(); }, 2000);
      return;

        }
      }
    }
  })// termino then

}

function eleminar_servicos_p(id,nome_servico){

    // const salao=document.querySelector('#servico'+id).value;
        //aceitar(id,numero);
    
        Swal.fire({
          title: 'Tens Acerteza ?',
          text: `Eliminar Serviço no Serviço- ${nome_servico??''} !`,
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Aceitar',
    
    
        }).then((result) => {
              if (!result.isConfirmed) {
                //
                if(result.value){
                    eliminar_servico(id,nome_servico);
                }
             
              }
        })
    }

    function eliminar_servico(id,nome_servico){

        document.getElementById("eliminar"+id).innerHTML='<div class="spinner-grow spinner-grow-sm" role="status"><span class="visually-hidden"> a eliminar...</span></div>';
        var dados = {
          id:id
        }
        $.post("/eliminar", dados , (retorna)=>{
          if(retorna.length<=4){
              console.log(retorna)
            document.getElementById("eliminar"+id).innerHTML='<span class="visually-hidden">Eliminado !</span>';
            //document.getElementById("corpo_dados").innerHTML=retorna;
            sucesso_eliminacao_servico(nome_servico)
            setTimeout(function(){ window.location.reload(); }, 900);
          }else if(retorna.length<=6){
            document.getElementById("eliminar"+id).innerHTML='<span class="visually-hidden">Não foi possível Solicitar</span>';
            alert('Erro na eliminação')
            //console.log(num+'teste')
        
          }
          
        });
    
    }

    function sucesso_eliminacao_servico(nome_servico){ 
      Swal.fire(
          `Serviço: ${nome_servico} eliminado` ,
      `Na SIGES todo é simplis e Rápido  !`,
      'success',
          )
  }
  



function reserva(id,nome_salao,id_usurio_saloa){

// const salao=document.querySelector('#servico'+id).value;
    //aceitar(id,numero);

    Swal.fire({
      title: 'Tens Acerteza ?',
      text: `Prentendes Add Serviço no Salão- ${nome_salao??''} !`,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Aceitar',


    }).then((result) => {
          if (!result.isConfirmed) {
            //
            if(result.value){
                alert('test'+nome_salao)

                add_reserva(id,id_usurio_saloa);
            }
          }
    })
}

function add_reserva(id,id_usurio_saloa){

    document.getElementById("servico"+id).innerHTML='<div class="spinner-grow spinner-grow-sm" role="status"><span class="visually-hidden"> A Reservar...</span></div>';
         
    const dia_realizacao=document.querySelector('#dia_realizacao').value;

    var dados = {
      id_salao:id,
      id_usuario:id_usuario,
      dia_realizacao:dia_realizacao
    }
    $.post("/add_servicos", dados , (retorna)=>{
      
      if(retorna.length<=4){
          console.log(retorna)
        document.getElementById("salao"+id).innerHTML='<span class="visually-hidden">Reservado !</span>';
        //document.getElementById("corpo_dados").innerHTML=retorna;
      }else if(retorna.length<=6){
        document.getElementById("salao"+id).innerHTML='<span class="visually-hidden">Não foi possível Solicitar</span>';
        console.log(retorna)
        //console.log(num+'teste')
      }
  });
}

function solicitacao(id){

    const salao=document.querySelector('#reserva'+id).value;
    const nome_salao=document.querySelector('#nome_salao'+id).value;
    const dia_actoa_actocao=document.querySelector('#dia_actoa_actocao'+id).value;
    const dia_actoa_actocao_fim=document.querySelector('#dia_actoa_actocao_fim'+id).value;
    const preco_padrao=document.querySelector('#preco_padrao'+id).value;
    const qtd_lugar=document.querySelector('#qtd_lugar'+id).value;
    
    if(dia_actoa_actocao==''){
     
      document.getElementById("validacao"+id).innerHTML='<div class="spinner-grow spinner-grow-sm" role="status"><span class="visually-hidden">Selecioneo dia do inicio</span></div>';
      return;
    }if(dia_actoa_actocao_fim==''){
      document.getElementById("validacao"+id).innerHTML='<div class="spinner-grow spinner-grow-sm" role="status"><span class="visually-hidden">Insera o fim da reserva</span></div>';
      return;
    }
    if(qtd_lugar==''){
      document.getElementById("validacao"+id).innerHTML='<div class="spinner-grow spinner-grow-sm" role="status"><span class="visually-hidden">Insera a quantidade de lugar</span></div>';
      return;
    }
    var ini=parseInt(dia_actoa_actocao)
    var fim=parseInt(dia_actoa_actocao_fim)
    if(ini > fim  ){
      document.getElementById("validacao"+id).innerHTML='<div class="spinner-grow spinner-grow-sm" role="status"><span class="visually-hidden">O data de inicio deve ser menor da data de termino</span></div>';
      return;
    }
    //solicitacao 
    //aceitar(id,numero);
    Swal.fire({
      title: 'Tens Acerteza ?',
      text: `Prentendes fazar a solicitação do Salão- ${nome_salao??''} !`,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Aceitar',

    }).then((result) => {
          if (!result.isConfirmed) {
            //
            if(result.value){
                
                soliciatar_agora(id)
            }
         
          }
    })
}

function soliciatar_agora(id){

    document.getElementById("reserva"+id).innerHTML='<div class="spinner-grow spinner-grow-sm" role="status"><span class="visually-hidden"> A Reservar...</span></div>';
    const dia_actoa_actocao=document.querySelector('#dia_actoa_actocao'+id).value; 
    const dia_actoa_actocao_fim=document.querySelector('#dia_actoa_actocao_fim'+id).value;  
    const id_salao=document.querySelector('#id_salao'+id).value;  
    const telefone=document.querySelector('#telefone'+id).value;  
    const qtd_lugar=document.querySelector('#qtd_lugar'+id).value;  
    const nome_salao=document.querySelector('#nome_salao'+id).value; 
    const nome_clit=document.querySelector('#nome'+id).value; 
    const id_usuario=document.querySelector('#id_usuario'+id).value;
    var valor_pago=document.querySelector('#preco_padraov'+id).value;
    const valor_cada_lugar=document.querySelector('#valor_cada_lugar'+id).value;
    



    const data_mes=document.querySelector('#mes'+id).value;
    const valor_dia=document.querySelector('#dia'+id).value; 
    const inicio_dia=dia_actoa_actocao


    var dados = {
      id_salao:id_salao,
      id_usuario:id_usuario,
      telefone:telefone,
      qtd_lugar:qtd_lugar, 
      nome_salao:nome_salao,
      dia_actoa_actocao:dia_actoa_actocao,
      dia_actoa_actocao_fim:dia_actoa_actocao_fim,
      valor_pago:valor_pago,
      dia_termino_acto: '1'
    }

    $.post("/solicitar_salao", dados , (retorna)=>{
      

      if(retorna.length<=4){
          console.log(retorna)
        document.getElementById("reserva"+id).innerHTML='<span class="visually-hidden">Reservado !</span>';
        //document.getElementById("corpo_dados").innerHTML=retorna;
        sucesso(telefone,nome_clit)
      }else if(retorna.length==8|| retorna.length==6){
        erro_ja_reservado(telefone,nome_clit)
        document.getElementById("reserva"+id).innerHTML='<span class="visually-hidden">Data já ocupado !</span>';
        return;
        //console.log(num+'teste')
      }else if(retorna.length==8){
        document.getElementById("reserva"+id).innerHTML='<span class="visually-hidden">Não foi possível Solicitar</span>';
        erro(telefone,nome_clit)
      }
    });
}


function sucesso(telefone,nome_vend){ 
    Swal.fire(
        ' Reserva Feita!',
    `Para mais informações contactaro Sr(a).${nome_vend}, tel: ${telefone}`,
    'success',
        )
}

function erro(telefone,nome_vend){
    Swal.fire(
        'Erro na Reserva!',
    `Para mais informações contactaro Sr(a).${nome_vend}, tel: ${telefone}`,
    'warning',
        )
}

function erro_ja_reservado(telefone,nome_vend){
  Swal.fire(
      'Data já se encontra Agendado!',
  `Para mais informações contactaro Sr(a).${nome_vend}, tel: ${telefone}`,
  'warning',
      )
}



function intermedicao_feita_1(){
    const nome_inter=document.querySelector('#nome_vend').value;
    //aceitar(id,numero);
    
    Swal.fire({
      title: 'Tens Acerteza ?',
      text: `Prentendes fazar a intermediação de Compra com ${nome_inter??''} !`,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Aceitar',

    }).then((result) => {

          if (!result.isConfirmed) {
            validar_dados_pluing()
          }

        })
      }

      

      function teste_input(){

        var dados='';
        Swal.fire({
          title: 'Seu Número Nego',
          input: 'text',
          inputAttributes: {
            autocapitalize: 'off'
          },
          showCancelButton: true,
          confirmButtonText: 'Enviar',
          showLoaderOnConfirm: true,
          preConfirm: (login) => {
            //
            const id_produto=document.querySelector('#id_produto').value;
            const codigo_gerado=document.querySelector('#codigo_gerado').value;
         
            const numvnd=document.querySelector('#numvnd').value;

            let data = {
              numero_nego:login,
              numvnd:numvnd,
              idpto: id_produto
            }
                 return r=$.post("", data , (retorna)=>{
                   console.log(retorna)
                      return response=retorna;
                      })
              },

          allowOutsideClick: () => !Swal.isLoading()

        })
        // termino

        .then((result) => {

          if (!result.isConfirmed) {
            /**
             * Codigo de confirmação
             */
             if(result.value == null ) {
              // do somethin
              Swal.fire({
                title: `Processo cancelado`
            })

           }else{
            //
            if(result.value.erro){
              Swal.fire({
                title: `${result.value.status}`,
                //imageUrl: result.value.status
            })
            return;
      }
          //
        }
            ////////////////////////////////////////////////////

             Swal.fire({
              title: ` Insira seu Código Sr.${result.value.dados[0].name}`,
              input: 'text',
              inputAttributes: {
                autocapitalize: 'off'
              },
              showCancelButton: true,
              confirmButtonText: 'Verificar',
              showLoaderOnConfirm: true,
              preConfirm: (valor) => {

                const id_reserva=document.querySelector('#id_reserva').value;


                let data = {
                  valor_pagar:valor,
                  id_salao:id_salao,
                  id_reserva:id_reserva
                }

                     return r=$.post("//link", data , (retorna)=>{

                          return response=retorna;

                          })
                        },
              allowOutsideClick: () => !Swal.isLoading()

            })
            .then((result) => {

              // alertar do codigo se esta certo ou nao
            if (!result.isConfirmed) {

              if(result.value == null ) {
                Swal.fire(
                  ' Ups o pagamento foi  cancelada',
                  ` Porque cancelou ? responde em: `,
                  'warning',
                  )
             }else{
              //
              if(!result.value.erro){

              Swal.fire(
                ' Pagemento feito com sucesso!',
            `Para mais informações contactaro suporte:`,
            'success',
                )

            setTimeout(function(){ window.location.reload(); }, 2000);
            }else{
              console.log(result.value)
              Swal.fire(
                ' O seu Código de Confirmação!',
            `Seu pamento esta incorreto tente novamente`,
            'warning',
                )
            }
          }
      }
})


          }


        })// termino then

      }