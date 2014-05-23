$(document).ready(function(){

	$('.Expand').live('click', function(e){
		if ($(this).parent().hasClass("ExpandOpen")) {
			$(this).parent().removeClass("ExpandOpen").addClass("ExpandClosed");			
		} else {
			loadData($(this).parent());
			$(this).parent().removeClass("ExpandClosed").addClass("ExpandOpen");
		}
		
	});

	function loadData(e) {
		type_id = e.attr('id').split('-');
		type = type_id[0];
		id = type_id[1];
		//alert(type);
		switch (type) {
			case (type === "org"):
				alert("org");
				break;
			case (type === "branch"):
				alert("branch");
				break;
			default:
				alert("none"); 		
		}
		//alert(type_id);
	}
	//Клик развернуть
	/*$('.Expand').live('click', function(e){		
		type_id = $(this).parent().attr('id').split('-');
		type = type_id[0];
		id = type_id[1];
		if ($(this).parent().hasClass("ExpandClosed")) {
			loadBranch(type,id, $(this));
		}
		/*if ($(this).parent().hasClass("ExpandClosed") && type == 'branch') {
			alert('kukuku');
		}
		//e.preventDefault();
		//alert(e);
	});*/

	function loadBranch(type, id, element) {
		$.ajax({
			type: 'GET',
			url: 'index.php?r=branch/load&id='+id,
			dataType : 'json',
			
			success:function(data) {
				if (data) {
					li = element.parent().append("<ul class='Container Branch'></ul>");
					
					$.each(data, function(){
						ul = li.find('ul');
						
						n_div = $("<div class='Expand'></div>");
						n_cb = $("<input type='checkbox'>");
						n_content = $("<div class='Content'><a href='index.php?r=branch/show&id="+this.id_branch+"'>"+this.name+"</a></div>");
						node = $("<li id=branch-"+this.id_branch+" class='Node ExpandClosed'></li>").append(n_div)
													   		 		  .append(n_cb)
															 		  .append(n_content);
						ul.append(node);
					});
				}				
			},

			failure: function() {
                alert("Ajax request broken");
            }
		});
		//return false;
	}
});

/*function tree_toggle(event) {
	//alert(event.target)
	event = event || window.event
	var clickedElem = event.target || event.srcElement

	if (!hasClass(clickedElem, 'Expand')) {
		return // клик не там
	}

	// Node, на который кликнули
	var node = clickedElem.parentNode
	if (hasClass(node, 'ExpandLeaf')) {
		return // клик на листе
	}

	// определить новый класс для узла
	var newClass = hasClass(node, 'ExpandOpen') ? 'ExpandClosed' : 'ExpandOpen'
	// заменить текущий класс на newClass
	// регексп находит отдельно стоящий open|close и меняет на newClass
	var re =  /(^|\s)(ExpandOpen|ExpandClosed)(\s|$)/
	node.className = node.className.replace(re, '$1'+newClass+'$3')

}


function hasClass(elem, className) {
	return new RegExp("(^|\\s)"+className+"(\\s|$)").test(elem.className)
}*/