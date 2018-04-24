function deleteQuiz(id)
{
	$.ajax({
		url: "../public/responses/delete.response.php",
		data: {id},
		type: "POST",
		success: function (aaa) {
		  alert(JSON.parse(aaa));
		},
		error: function(jqXHR, textStatus, errorThrown) {
		  console.log(textStatus, errorThrown);
		}
	});
}