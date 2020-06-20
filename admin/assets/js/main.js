
function changeStatus(id, status){
    
    // Меняем дизайн ссылок
    var ordersNew = document.querySelector("#orders-new-" + id);
    var ordersSent = document.querySelector("#orders-sent-" + id);

    if(status == 0) {
        ordersNew.className = "btn btn-success";
        ordersSent.className = "btn btn-danger";
    } else if (status == 1) {
        ordersNew.className = "btn btn-danger";
        ordersSent.className = "btn btn-success";
    }

    //создаем объект
    var orderInfo = new Object();
        orderInfo = {  // объект
                        id: + id, 
                          status: + status   
                    };

    // преобразовуем объект в JSON  
    var jsonDataOrder = JSON.stringify(orderInfo);

    // делаем ajax запрос на изменение status в БД
    var ajax = new XMLHttpRequest();
        ajax.open("POST", "http://ocean/admin/modules/orders/change_status.php", false);
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajax.send("data_order=" + jsonDataOrder);


   
}