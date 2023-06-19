// Habilita os tooltips do bootstrap
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))


mascaraCNPJ = () => {
    VMasker(document.querySelector("#cnpj_input")).maskPattern("99.999.999/9999-99")
}

mascaraCEP = () => {
    VMasker(document.querySelector("#cep_input")).maskPattern("99999-999")
}

mascaraGenericaCNPJ = () => {
    VMasker(document.querySelector(".cnpj-format").value).maskPattern("99.999.999/9999-99")
    
}


VMasker(document.querySelector("#soma_valor_venal")).maskMoney({
    precision: 2,
    separator: ',', 
    delimiter: '.',   
    unit: 'R$',  
    suffixUnit: 'R$',
    zeroCents: true
})



