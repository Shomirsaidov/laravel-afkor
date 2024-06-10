document.getElementById('addBasket').onclick = function() {
    let productId = document.querySelector('.prod_id').value    
    
    if(localStorage.getItem('sewingTJ')) {
        let newBasket = JSON.parse(localStorage.getItem('sewingTJ'))
        newBasket.push(productId)
        localStorage.setItem('sewingTJ', JSON.stringify(newBasket))
    } else {
        localStorage.setItem('sewingTJ', JSON.stringify([productId]))
    }
    
    
}

