window.addEventListener("DOMContentLoaded", ()=> {
    
    orderContent(); //функция загрузки страницы заказа
    orderListContent(); //функция загрузки страницы со всеми заказами
    loadOrderContent(); //функция вызова функции загрузки страницы заказа
    navSelect(); //функция выбора пункта меню

    function navSelect() {
        const navItem = document.querySelectorAll('.nav a');
        navItem.forEach(Items => {
            Items.addEventListener('click',(e)=>{
                navItem.forEach(item => {
                    if (item.classList.contains('active')) {
                        item.classList.remove('active');
                    } else {
                        item.classList.add('active');
                    }
                });
            });
        });
    }

    function orderListContent(){
        let navOrderList = document.querySelector('#navOrderList');

        navOrderList.addEventListener('click', () => {
            const cont = document.querySelector('.container');
            //Динамически подгружаем страницу со всеми заказами
            $.ajax({
                url: 'pages/orderList.php',
                method: 'GET',
                success: function(datas) 
                { 
                    cont.innerHTML = datas;
                    const table = document.querySelector('table tbody');
                    //подгужаем заказы на страницу
                    $.ajax({
                        url: 'php/getOrders.php',
                        method: 'GET',
                        success: function(datas) 
                        {
                            table.innerHTML = datas;
                        }
                    });
                }
            });
        });
    }

    function loadOrderContent() {
        let navOrder = document.querySelector('#navOrder');

        navOrder.addEventListener('click', () => {
            orderContent();
        });
    }

    function orderContent() {
        const cont = document.querySelector('.container');
         //динамически подгружаем страницу заказа       
        $.ajax({
            url: 'pages/order.php',
            method: 'GET',
            success: function(datas) 
            { 
                cont.innerHTML = datas;
                const selectItem = document.querySelectorAll('.card select');
                let   fullCost = document.querySelector('#costOrder');
                //функция пересчёта стоимости заказа
                function calc() {
                    let temp=0;
                    selectItem.forEach(elem=>{
                        if (elem.options[elem.selectedIndex].text != "..."){
                            temp+=  +elem.options[elem.selectedIndex].getAttribute('data-cost');
                        }
                        fullCost.value = temp.toFixed(2);
                    });
                }
                selectItem.forEach(elem=>{
                    elem.addEventListener('change', ()=>{
                        calc();
                    });
                });
                const btnOrder = document.querySelector('#btnOrder');
                //Вешаем событие на кнопку заказа и отправляем данные заказа в бд (в php Для обработки и загрузки в бд)
                btnOrder.addEventListener('click', (e)=>{
                    $dataForm = $('form').serialize();
                    e.preventDefault();
                    let orderINFO = document.querySelector('.order figure');
                    const order = document.querySelector('.order');
                    //динамически отправляем запрос на добавление данных в бд
                    $.ajax({
                        url: 'php/setOrder.php',
                        type: 'POST',
                        data: $dataForm,
                        success: function(data) 
                        {
                            if (data != null && data!="") {
                                $().toastmessage('showErrorToast', data);
                            } else {
                                selectItem.forEach(elem => {
                                    elem.selectedIndex = 0;
                                });    
                                fullCost.value=0;
                                //подгружаем данные о последнем заказе в чек
                                $.ajax({
                                    url: 'php/getLastOrders.php',
                                    method: 'GET',
                                    success: function(datas) 
                                    {
                                        orderINFO.innerHTML = datas;
                                    }
                                });
                                order.style.display = 'block';
                            }; 
                        }
                    });
                });
            }
        }); 
    };
});