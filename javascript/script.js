document.getElementById("remove-child")
.addEventListener("click", function(){
	 var container =
	 document.getElementById("container");
	 var children = container.children;
	 console.log(children);
	 // container.removechild(children[2]);
	 var firstChild = container.firstChild;
	 var lastchild = container.lastChild;
	 if (firstChild) {
	 container.removeChild(firstChild);
	}
});
document.getElementById("add-class").addEventListener("click", function(){
		var e = document.createElement("div");
		e.setAttribute("class", "child");
		document.getElementById("container")
		.appendChild(e);
});
document.getElementById("add-child").addEventListener("click", function(){
	var e = document.createElement("div");
	document.getElementById("container")
	 .appendChild(e);
});
var timerId,time = 0;
document.getElementById("start")
 .addEventListener("click", function(){
 	 timerId = setInterval(function(){
 	 	 document.getElementById("timer").innerHTML = time;
 	 	 time++;
	}, 1000);
 });
 document.getElementById("stop")
  .addEventListener("click", function(){
  	 clearInterval(timerId);
  	 timerId = null;
});

document.getElementById("interval")
 .addEventListener("click", function(){
 	setInterval(function(){
 		 var div = document.getElementById("div3");
 		 if (div .style.backgroundColor == "") {
 		 	 div.style.backgroundColor = "blue";
 } else {
 	 div.style.backgroundColor = "";
 }
 	}, 3000)
 });
document.getElementById("delay")
 .addEventListener("click", function(){
 	 setTimeout(function(){
 	 	 alert("naohiro");
 	 },5000);
 });

var imageIndex = 0;
document.getElementById("image")
	.addEventListener("click", function(){
		var images = ["cat.jpeg","girl.jpeg","girl2.jpeg","sexy.jpeg"];
		this.src = images[imageIndex];
		if (imageIndex < 3) {
			imageIndex++;
		} else {
			imageIndex = 0;
		}
	});
var div2 = document.getElementById("div2");
div2.addEventListener("mouseover",function(){
	this.style.backgroundColor = "red";
	this.style.fontSize ="20px";
	this.style.width = "300px"
});
var oldcolor;
var div = document.getElementById("div1")
	div1.addEventListener("mouseover",function(){
		// slementById("div1");
		oldcolor = this.style.backgroundColor; 
 		this.style.backgroundColor ="#ffcccc";
	});
	div1.addEventListener("mouseout", function(){
			this.style.backgroundColor = oldcolor;
	});
document.getElementById("open-self")
.addEventListener("click" , function(){
	location.href = "http://www.yahoo.co.jp";
});

document.getElementById("open-new")
	.addEventListener("click", function(){
		window.open("http://www.apple.com/ph");
});

document.getElementById("btn-while")
	.addEventListener('click', function(){
		var from =document.getElementById("from").value;
		var to =document.getElementById("to").value;
		if (from =="" || to == "") {
			alert("数値を入力してください");
			return;
		}
		var num = +from; 
		var total = 0;
		while(num <= +to) { 
			total = total + num;
			num++;
		}
		alert(from + "から" + to + "までの合計は" + total + "です");
	});
