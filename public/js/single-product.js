document.getElementById('addBasket').onclick = function() {
    let productId = document.querySelector('.prod_id').value    
    
    if(localStorage.getItem('sewingTJ')) {
        let newBasket = JSON.parse(localStorage.getItem('sewingTJ'))
        newBasket.push(productId)
        localStorage.setItem('sewingTJ', JSON.stringify(newBasket))
        document.getElementById('addBasket').textContent = 'Добавлено'
        document.getElementById('addBasket').style.background = '#071952'
    } else {
        localStorage.setItem('sewingTJ', JSON.stringify([productId]))
    }
    
    
}



