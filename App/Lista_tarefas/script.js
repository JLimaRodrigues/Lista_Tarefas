function editar(id, txt_tarefa){
    //CRIAR UM FORM
    let form = document.createElement('form')
    form.action = "tarefa_controller.php?acao=atualizar"
    form.method = 'post'
    form.className = 'row'

    //CRIAR UM INPUT PARA A ENTRADA DE TEXTO
    let inputTarefa = document.createElement('input')
    inputTarefa.type = 'text'
    inputTarefa.name = 'tarefa'
    inputTarefa.className = 'col-9 form-control'
    inputTarefa.value = txt_tarefa

    //CRIAR UM INPUT HIDDEN PARA GUARDAR O ID DA TAREFA
    let inputId = document.createElement('input')
    inputId.type = 'hidden'
    inputId.name = 'id'
    inputId.value = id

    //CRIAR UM BUTTON PARA ENVIAR O FORM
    let button = document.createElement('button')
    button.type = 'submit'
    button.className = 'col-3 btn btn-info'
    button.innerHTML = 'Atualizar'

    //INCLUI O INPUTTAREFA NO FORM
    form.appendChild(inputTarefa)

    //INCLUI O INPUTID NO FORM
    form.appendChild(inputId)

    //INCLUI O BUTTON NO FORM
    form.appendChild(button)

    //SELECIONAR A DIV TAREFA
    let tarefa = document.getElementById('tarefa_'+id)

    //LIMPAR O TEXTO DA TAREFA PARA INCLUSÃO DO FORM
    tarefa.innerHTML = '' 

    //INCLUI FORM NA PÁGINA
    tarefa.insertBefore(form, tarefa[0])
}

function remover(id){
    location.href = 'todas_tarefas.php?acao=remover&id='+id
}

function marcarRealizada(id){
    location.href = 'todas_tarefas.php?acao=marcarRealizada&id='+id
}