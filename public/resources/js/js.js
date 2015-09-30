function Sort() {
	var rows = document.getElementById("data_table").rows;
	
	for (i = 1; i < rows.length; i++)
		for (j = i+1; j < rows.length; j++) 
			if (rows[i].cells[2].innerHTML.toLowerCase() > 
					rows[j].cells[2].innerHTML.toLowerCase()) {
				tmp = rows[i].cells[2].innerHTML;
				rows[i].cells[2].innerHTML = rows[j].cells[2].innerHTML;
				rows[j].cells[2].innerHTML = tmp;
				
				tmp = rows[i].cells[1].innerHTML;
				rows[i].cells[1].innerHTML = rows[j].cells[1].innerHTML;
				rows[j].cells[1].innerHTML = tmp;
			}
}