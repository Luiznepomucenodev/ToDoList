function editar(id, tarefaTxt) {
    let form = document.createElement('form')
    form.action = "controller.php?acao=atualizar"
    form.method = "post"
    form.className = "row"

    let input = document.createElement('input')
    input.type = "text"
    input.name = "tarefa"
    input.className = "form-control col-9"
    input.value = tarefaTxt

    let inputId = document.createElement('input')
    inputId.type = "hidden"
    inputId.name = "id"
    inputId.value = id

    let button = document.createElement('button')
    button.type = "submit"
    button.className = "btn btn-outline-info col-3"
    button.innerHTML = "Salvar"

    form.appendChild(input)
    form.appendChild(inputId)
    form.appendChild(button)

    let tarefa = document.getElementById("tarefa_" + id)

    tarefa.insertBefore(form, tarefa[0])
}

function remover(id) {
    location.href = 'todas_tarefas.php?acao=remover&id=' + id
}

function realizar(id) {
    location.href = 'todas_tarefas.php?acao=realizar&id=' + id
}