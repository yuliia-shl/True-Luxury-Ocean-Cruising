var siteURL = "http://ocean";
/*======================
Сортировка по категории
======================*/
function sortCategori(elem, cat_id, cnt_cat, cnt_page) {

	var link = elem.dataset.linkcat;

	// Выполняем аякс запрос
	var ajax = new XMLHttpRequest();
	ajax.open("GET", siteURL + link, false);
	ajax.send();

	var blockCruises = document.querySelector("#list-cruises");
		blockCruises.innerHTML = ajax.response;


	// Прописываем дизайн переключателей, при нажатии на ссылку добавляем класс active
	for (var i = 0; i <= cnt_cat; i++) {

		var categori = document.querySelector("#categori-" + i);

		if ( i == cat_id ) {
			categori.className = "btn palatin-btn m-2 categori active";
		} else {
			categori.className = "btn palatin-btn m-2 categori";
		}
	}
		

	// pagination
	var pagination = document.querySelector("#pagination");

	if (cat_id == 0) {

		pagination.style.display = "flex";
		cnt_page = 2;
		for (i=1; i <= cnt_page; i++) {

			var page = document.querySelector("#page-" + i);

			if(i == 1){
				page.className = "page-link active";
			} else {
				page.className = "page-link";
			}
		}

	} else {
		pagination.style.display = "none";
	}
	
}

