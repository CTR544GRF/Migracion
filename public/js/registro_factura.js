function totalArticulos() {

    let pu = document.querySelectorAll(".pu")
    let vc = document.querySelectorAll(".vc")
    let vi = document.querySelectorAll(".vi")
    let sumaTotal = []
    let ivaTotal = []
    for (let index = 0; index < pu.length; index++) {
        const elementPu = pu[index].value;
        const elementVc = vc[index].value;
        const elementVi = vi[index].value;
        let suma = parseInt(elementPu) * parseInt(elementVc)
        let iva = ((suma * elementVi)/100)
        sumaTotal.push(suma)
        ivaTotal.push(iva)
    }
    sumWithTotal = sumaTotal.reduce(
        (accumulator, currentValue) => accumulator + currentValue);
    ivaTotalArticles = ivaTotal.reduce(
            (accumulator, currentValue) => accumulator + currentValue);
    console.log(ivaTotal)
    document.getElementById('resultado_sub_total').value = sumWithTotal;
    document.getElementById('resultado_iva').value = ivaTotalArticles;
    document.getElementById('resultado_total').value = ivaTotalArticles + sumWithTotal;


}

/* function itemCreate()
{   
    console.log(true)
   $('.form_factura_prueba:first').clone().appendTo('.container_section_three');
} */
var contador = 0;

function itemCreate() {
    let article = document.querySelector('.form_factura_prueba');
    let articleChield = article.cloneNode(true)
    let container_article = document.querySelector('.container_section_three')
    container_article.appendChild(articleChield);

    let ca = document.querySelectorAll('.ca');
    let pu = document.querySelectorAll('.pu');
    let vc = document.querySelectorAll('.vc');
    let vi = document.querySelectorAll('.vi');

    /* cod_articulo precio_unitario valor_cantidad valor_iva*/
    for (let index = 0; index < ca.length; index++) {
        if ( contador < index  ) {
            pu[index].value = 0; 
            vc[index].value = 0;
            vi[index].value = 0;
        }
        
        ca[index].setAttribute('name', 'ca[]');
        pu[index].setAttribute('name', 'pu[]');
        vc[index].setAttribute('name', 'vc[]');
        vi[index].setAttribute('name', 'vi[]');
        console.log("contador: "+ contador+ " index :" + index)   
    }
    contador++
}