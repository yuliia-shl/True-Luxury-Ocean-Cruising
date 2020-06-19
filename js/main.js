var siteURL = "http://ocean";

/*======================
Функция для пагинации
======================*/
function goToPage(elem) {

	var link = elem.dataset.link;

	// Выполняем аякс запрос, выводим круизы по выбранной ссылке
	var ajax = new XMLHttpRequest();
	ajax.open("GET", siteURL + link, false);
	ajax.send();

	var blockCruises = document.querySelector("#list-cruises");
		blockCruises.innerHTML = ajax.response;

	// номер выбранной странички
	var	num_page = elem.innerHTML;
	// количество страниц
	var cnt_link = document.getElementById("cnt_link").value;

	// Прописываем дизайн переключателей, при нажатии на ссылку добавляем класс active
	for (var i = 1; i <= cnt_link; i++) {

		var page = document.querySelector("#page-" + i);

		if( i == num_page ){
			page.className = "page-link active";
		}else{
			page.className = "page-link";
		}
		
	}

}

/*======================
Функция добавления выбранного круиза в корзину
======================*/
function addToBasket(btn) {

	// Делаем аякс запрос на добавление в корзину
	var ajax = new XMLHttpRequest();
		ajax.open("POST", siteURL + "/modules/basket/add_basket.php", false);
		ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		ajax.send("id=" + btn.dataset.id);

	// Преобразовывает JSON формат в js обект
	var response = JSON.parse(ajax.response);
	
	// Если такой круиз уже был, то выводим алерт
	if(response.info.echo_info != "") {
		alert(response.info.echo_info );
	}

	// Меняем значение в блоке basket-span, прописываем количество выбраных круизов
	var btnGoBasket = document.querySelector("#basket-span");
		btnGoBasket.innerText = response.info.count;
}

/*======================
Функция удаления выбранного круиза в корзине
======================*/
function deleteCruisBasket(obj, id) {

	// Делаем аякс запрос на удаение из корзины
	var ajax = new XMLHttpRequest();
		ajax.open("POST", siteURL + "/modules/basket/delete.php" , false);
		ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		ajax.send("id=" + id);

		alert("Круиз удален");

		// удаляем выбранный объект/круиз
		obj.parentNode.parentNode.remove();
		/*var cruises = document.querySelector("#cruises");
		cruises.innerText = response;*/


}

/*======================
Изменение количества билетов и общей стоимости
======================*/
function changeCountTicketsAndCosts(days, price, id){

	//создаем объект. Мы его будем передавать в аякс запросе
	let cruisInfo = new Object();
		cruisInfo = {  // объект
				    	id: id, // id круиза берем из аргумента id
						days: + days, // количество билетов берем из аргумента count
						price: price // цену берем из аргумента price
					};

	// преобразовуем объект в JSON	
	var jsonDataCruis = JSON.stringify(cruisInfo);

	var ajax = new XMLHttpRequest();
		ajax.open("POST", siteURL + "/modules/basket/change.php", false);
		ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		ajax.send("data_cruis=" + jsonDataCruis);

	// Преобразовывает JSON формат в js обект
	var response = JSON.parse(ajax.response);
	
	// Делаем перезагрузку блока с ценой
	var changeCosts = document.querySelector("#cost-" + id);
		changeCosts.innerText = response.cost;

}