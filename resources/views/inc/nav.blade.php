@section('nav')
<div class="hidden md:block bg-indigo-400 p-4 lg:px-64 text-white font-bold fixed  fixed-top top-0 w-full">
        <nav class="flex w-full justify-between items-center">
            <img src="/assets/logo.png" width="40" alt="">
            <a href="/">Купить</a>
            <a href="/orders">Заказы</a>
            <a href="/profile">Профиль</a>
            <a href="/basket">Корзина</a>
        </nav>
</div>


<div style="z-index: 5;" class="md:hidden flex px-4 bg-white shadow border-t-2 w-full items-center justify-center fixed bottom-0">
    <a href="/profile">
        <div class="p-4 border-2 border-t-0 border-r-0">
            <img src="/assets/profile.svg" alt="">
        </div>
    </a>
    <a href="/">
        <div class="p-4 border-2 border-t-0 border-r-0">
            <img src="/assets/search-normal-1.svg" alt="">
        </div>
    </a>
    <a href="/">
        <div class="p-4 border-2 border-t-0 border-r-0">
            <img src="/assets/home.svg" alt="">
        </div>
    </a>
    <a href="/basket">
        <div class="p-4 border-2 border-t-0 border-r-0">
            <img src="/assets/shopping-cart.svg" alt="">
        </div>
    </a>
    <a href="/liked">
        <div class="p-4 border-2 border-t-0">
            <img src="/assets/heart.svg" alt="">
        </div>
    </a>
    
    
    
    
</div>

<div style="z-index: 5;" class="lg:px-80  fixed fixed-top top-0 w-full p-4 bg-white shadow-md">
    <div class="flex justify-between items-center">
        <div class="flex items-center space-x-2 font-bold">
            <img src="/assets/logo.png" width="40" alt="">
            <h1>Мир шитья</h1>
        </div>
        <div style="z-index: 5;" class="hidden md:flex px-4 bg-white   items-center justify-center">
            <a href="/profile">
                <div class="p-4 ">
                    <img src="/assets/profile.svg" alt="">
                </div>
            </a>
            <a href="/">
                <div class="p-4 ">
                    <img src="/assets/search-normal-1.svg" alt="">
                </div>
            </a>
            <a href="/">
                <div class="p-4">
                    <img src="/assets/home.svg" alt="">
                </div>
            </a>
            <a href="/basket">
                <div class="p-4">
                    <img src="/assets/shopping-cart.svg" alt="">
                </div>
            </a>
            <a href="/liked">
                <div class="p-4">
                    <img src="/assets/heart.svg" alt="">
                </div>
            </a>
            <a href="tel:+992883820110">
                <div class="p-4">
                    <img src="/assets/call-calling.svg"  alt="">
                </div>
            </a>
        </div>
        
        <a href="tel:+992883820110" class="md:hidden">
            <img src="/assets/call-calling.svg"  alt="">
        </a>

        <div class="flex items-center space-x-2 menu_btn">
            <img src="/assets/menu.svg" width="30" alt="">
            <h1>МЕНЮ</h1>
        </div>
    </div>


    <div style="z-index: 5;" class="catalog hidden mt-4">
        <p class="p-2 border-b-2">Каталог</p>
        <p class="p-2 border-b-2">Контакты</p>
        <p class="p-2 border-b-2">О нас</p>
        <p class="p-2 border-b-2">О разработчике</p>
        <div class="flex space-x-8 mt-4 justify-center items-center">
            <a href="">
                <img src="/assets/insta.png" width="30" alt="">
            </a>
            <a href="">
                <img src="/assets/telega.png" width="30" alt="">
            </a>
            <a href="">
                <img src="/assets/whatsapp.png" width="30" alt="">
            </a>
        </div>
    </div>


   
</div>


<script src="/js/jquery.js"></script>
<script>

    document.querySelector('.menu_btn').onclick = function() {

        $('.catalog').slideToggle();


    }


</script>