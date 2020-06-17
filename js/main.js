var siteURL = "http://ocean";

function goToPage(elem) {

	var link = elem.dataset.link;

	// Выполняем аякс запрос, выводим товары по выбранной ссылке
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
			page.className = "page-item active";
		}else{
			page.className = "page-item";
		}
		
	}

}