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
	//alert(btn.dataset.id);
	/*
	1. 
	2. Получить данные об успешном добавлении в корзину
	3. Обновить информацию в корзине
	*/
	// Делаем аякс запрос на добавление в корзину
	var ajax = new XMLHttpRequest();
		ajax.open("POST", siteURL + "/modules/basket/add_basket.php", false);
		ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		ajax.send("id=" + btn.dataset.id);

	// Преобразовывает JSON формат в js обект
	var response = JSON.parse(ajax.response);

	// Меняем значение в блоке go-basket, прописываем количество выбраных товаров
	var btnGoBasket = document.querySelector("#basket-span");
		btnGoBasket.innerText = response.count;
}