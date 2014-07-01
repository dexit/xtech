$(document).ready(function(){

	$('.Expand').live('click', function(e){
		if ($(this).parent().hasClass("ExpandOpen")) {
			$(this).parent().removeClass("ExpandOpen").addClass("ExpandClosed");
			$(this).nextAll('ul').remove();
			//console.log($(this).nextAll('ul'));
		} else {
			loadData($(this).parent());
			$(this).parent().removeClass("ExpandClosed").addClass("ExpandOpen");
		}
		
	});

	function loadData(e) {
		type_id = e.attr('id').split('-');
		type = type_id[0];
		id = type_id[1];
		switch (type) {
			case "org":
				loadBranch(type,id,e);
				break;
			case "branch":
				loadDepartment(type,id,e);
				break;
			case "depart":
				loadCabinet(type,id,e);
				break;
			case "cabinet":
				loadEmployee(type,id,e);
				break;	
			case "employee":
				loadDevice(type,id,e);
				break;		
			default:
				alert("none"); 		
		}
	}

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
						//li.append(ul);
					});
				}				
			},

			failure: function() {
                alert("Ajax request broken");
            }
		});
	}


	function loadDepartment(type, id, element) {
		$.ajax({
			type: 'GET',
			url: 'index.php?r=department/load&id='+id,
			dataType : 'json',
			
			success:function(data) {
				if (data) {
					//li = element.parent().append("<ul class='Container Department'></ul>");
					li = element.append("<ul class='Container Department'></ul>");
					
					$.each(data, function(){
						ul = li.find('ul');
						
						n_div = $("<div class='Expand'></div>");
						n_cb = $("<input type='checkbox'>");
						n_content = $("<div class='Content'><a href='index.php?r=department/show&id="+this.id_department+"'>"+this.name+"</a></div>");
						node = $("<li id=depart-"+this.id_department+" class='Node ExpandClosed'></li>").append(n_div)
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
	}

	function loadCabinet(type, id, element) {
			$.ajax({
			type: 'GET',
			url: 'index.php?r=cabinet/load&id='+id,
			dataType : 'json',
			
			success:function(data) {
				if (data) {
					//li = element.parent().append("<ul class='Container Department'></ul>");
					li = element.append("<ul class='Container Cabinet'></ul>");
					
					$.each(data, function(){
						ul = li.find('ul');
						
						n_div = $("<div class='Expand'></div>");
						n_cb = $("<input type='checkbox'>");
						n_content = $("<div class='Content'><a href='index.php?r=cabinet/show&id="+this.id_cabinet+"'>"+this.number+"</a></div>");
						node = $("<li id=cabinet-"+this.id_cabinet+" class='Node ExpandClosed'></li>").append(n_div)
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
	}

	function loadEmployee(type, id, element) {
			$.ajax({
			type: 'GET',
			url: 'index.php?r=employee/load&id='+id,
			dataType : 'json',
			
			success:function(data) {
				if (data) {
					//li = element.parent().append("<ul class='Container Department'></ul>");
					li = element.append("<ul class='Container Employee'></ul>");
					
					$.each(data, function(){
						ul = li.find('ul');
						
						n_div = $("<div class='Expand'></div>");
						n_cb = $("<input type='checkbox'>");
						n_content = $("<div class='Content'><a href='index.php?r=employee/show&id="+this.id_employee+"'>"+this.firstname+"</a></div>");
						node = $("<li id=employee-"+this.id_employee+" class='Node ExpandClosed'></li>").append(n_div)
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
	}

	function loadDevice(type, id, element) {
			$.ajax({
			type: 'GET',
			url: 'index.php?r=device/load&id='+id,
			dataType : 'json',
			
			success:function(data) {
				if (data) {
					//li = element.parent().append("<ul class='Container Department'></ul>");
					li = element.append("<ul class='Container Device'></ul>");
					
					$.each(data, function(){
						ul = li.find('ul');
						
						n_div = $("<div class='Expand'></div>");
						n_cb = $("<input type='checkbox'>");
						n_content = $("<div class='Content'><a href='index.php?r=device/show&id="+this.id_device+"'>"+this.name+"</a></div>");
						node = $("<li id=device-"+this.id_device+" class='Node ExpandClosed'></li>").append(n_div)
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